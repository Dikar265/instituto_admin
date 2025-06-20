<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Registro;
use App\Models\Materia;
use App\Models\Carrera;
use Illuminate\Support\Facades\Storage;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use Mpdf\Mpdf;
use Illuminate\Support\Stringable;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;

class ExcelControllerLegajo extends Controller
{
    public function legajo($id)
    {
        $alumno = Registro::findOrFail($id);
        $filePath = storage_path('Legajo.xlsx');
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $carrera = Carrera::find($alumno->carrera_id);
        $nombre = Str::upper($alumno->apellido) . ' ' . $alumno->nombre;

        //Foto
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $archivo_foto = file_exists(storage_path('fotos/' . $alumno->foto) );
       if($archivo_foto == 1){
        $drawing->setName('Foto');
        $drawing->setDescription('Foto');
        $drawing->setPath(storage_path('fotos/' . $alumno->foto)); /* put your path and image here */
        $drawing->setCoordinates('L1');
        $drawing->setOffsetX(20);
        $drawing->setOffsetY(10);
        $drawing->setHeight(151);
        $drawing->setWidth(151);
        $drawing->getShadow()->setVisible(true);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
}

        $worksheet->setCellValue('B8', Str::upper($carrera->descripcion) . ' - R.M. N° ' . $carrera->resolucion);
        $worksheet->setCellValue('D11', $nombre);
        $worksheet->setCellValue('H11', $alumno->dni . " ");
        $worksheet->setCellValue('J11', $alumno->nacionalidad);
        $worksheet->setCellValue('L11', date('d/m/Y', strtotime($alumno->fec_nac)));
        $worksheet->setCellValue('D13', $alumno->provincia);
        $worksheet->setCellValue('F13', $alumno->ciudad);
        $worksheet->setCellValue('I13', $alumno->barrio);
        $worksheet->setCellValue('K13', $alumno->domicilio);
        $worksheet->setCellValue('D15', $alumno->lug_nac);
        $worksheet->setCellValue('H15', $alumno->provincia);
        $worksheet->setCellValue('J15', $alumno->tel_alternativo . " ");
        $worksheet->setCellValue('L15', $alumno->celular . " ");
        $worksheet->setCellValue('F16', $alumno->escuela_egreso);
        $worksheet->setCellValue('L16', $alumno->año_egreso);
        $worksheet->setCellValue('F17', $alumno->titulo_intermedio);
        $worksheet->setCellValue('L17', $alumno->email);


        $materias1 = Materia::where('carrera_id', $alumno->carrera_id)
            ->where('anio_id', 1)->orderBy('orden')->get();
        $materias2 = Materia::where('carrera_id', $alumno->carrera_id)
            ->where('anio_id', 2)->orderBy('orden')->get();
        $materias3 = Materia::where('carrera_id', $alumno->carrera_id)
            ->where('anio_id', 3)->orderBy('orden')->get();

        $i = 20;
        $n = 1;
        foreach ($materias1 as $materia) {
            $cell = 'C' . $i;
            $cellN = 'B' . $i;
            $worksheet->setCellValue($cell, Str::upper($materia->descripcion));
            $worksheet->setCellValue($cellN, $n);

            $i++;
            $n++;
        }

        $i = 34;
        foreach ($materias2 as $materia) {
            $cell = 'C' . $i;
            $cellN = 'B' . $i;
            $worksheet->setCellValue($cell, Str::upper($materia->descripcion));
            $worksheet->setCellValue($cellN, $n);
            $i++;
            $n++;
        }

        $i = 49;
        foreach ($materias3 as $materia) {
            $cell = 'C' . $i;
            $cellN = 'B' . $i;
            $worksheet->setCellValue($cell, Str::upper($materia->descripcion));
            $worksheet->setCellValue($cellN, $n);
            $i++;
            $n++;
        }

        $writer = new Xlsx($spreadsheet);
        $fecha_actual = date("d-m-Y his");
        $file_alumno = $alumno->dni . " " . $fecha_actual . '.xlsx';
        $filePath = storage_path('legajos/' . $alumno->dni . $fecha_actual . '.xlsx');
        $writer->save($filePath);
        $file_alumno = 'Legajo ' . $file_alumno;

        return response()->file($filePath, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $file_alumno . '"',
            'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            'Cache-Control' => 'post-check=0, pre-check=0',
            'Pragma' => 'no-cache',
        ]);

        //return response()->download($filePath, $file_alumno);

        // return 'Excel descargado satisfactoriamente.';
        //return redirect()->route('alumnos.index');
    }

    public static function legajo_backup($id)
    {
        $alumno = Registro::findOrFail($id);
        $filePath = storage_path('Legajo.xlsx');
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $carrera = Carrera::find($alumno->carrera_id);
        $nombre = Str::upper($alumno->apellido) . ' ' . $alumno->nombre;

        //Foto
        /*$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
   $archivo_foto = file_exists(storage_path('fotos/' . $alumno->foto) );
    if($archivo_foto == 1){        
        $drawing->setName('Foto');
        $drawing->setDescription('Foto');
        $drawing->setPath(storage_path('fotos/' . $alumno->foto));  
        $drawing->setCoordinates('L1');
        $drawing->setOffsetX(20);
        $drawing->setOffsetY(10);
        $drawing->setHeight(151);
        $drawing->setWidth(151);
        $drawing->getShadow()->setVisible(true);
        $drawing->setWorksheet($spreadsheet->getActiveSheet());
}*/

        $worksheet->setCellValue('B8', Str::upper($carrera->descripcion) . ' - R.M. N° ' . $carrera->resolucion);
        $worksheet->setCellValue('D11', $nombre);
        $worksheet->setCellValue('H11', $alumno->dni . " ");
        $worksheet->setCellValue('J11', $alumno->nacionalidad);
        $worksheet->setCellValue('L11', date('d/m/Y', strtotime($alumno->fec_nac)));
        $worksheet->setCellValue('D13', $alumno->provincia);
        $worksheet->setCellValue('F13', $alumno->ciudad);
        $worksheet->setCellValue('I13', $alumno->barrio);
        $worksheet->setCellValue('K13', $alumno->domicilio);
        $worksheet->setCellValue('D15', $alumno->lug_nac);
        $worksheet->setCellValue('H15', $alumno->provincia);
        $worksheet->setCellValue('J15', $alumno->tel_alternativo . " ");
        $worksheet->setCellValue('L15', $alumno->celular . " ");
        $worksheet->setCellValue('F16', $alumno->escuela_egreso);
        $worksheet->setCellValue('L16', $alumno->año_egreso);
        $worksheet->setCellValue('F17', $alumno->titulo_intermedio);
        $worksheet->setCellValue('L17', $alumno->email);


        $materias1 = Materia::where('carrera_id', $alumno->carrera_id)
            ->where('anio_id', 1)->orderBy('orden')->get();
        $materias2 = Materia::where('carrera_id', $alumno->carrera_id)
            ->where('anio_id', 2)->orderBy('orden')->get();
        $materias3 = Materia::where('carrera_id', $alumno->carrera_id)
            ->where('anio_id', 3)->orderBy('orden')->get();

        $i = 20;
        $n = 1;
        foreach ($materias1 as $materia) {
            $cell = 'C' . $i;
            $cellN = 'B' . $i;
            $worksheet->setCellValue($cell, Str::upper($materia->descripcion));
            $worksheet->setCellValue($cellN, $n);

            $i++;
            $n++;
        }

        $i = 34;
        foreach ($materias2 as $materia) {
            $cell = 'C' . $i;
            $cellN = 'B' . $i;
            $worksheet->setCellValue($cell, Str::upper($materia->descripcion));
            $worksheet->setCellValue($cellN, $n);
            $i++;
            $n++;
        }

        $i = 49;
        foreach ($materias3 as $materia) {
            $cell = 'C' . $i;
            $cellN = 'B' . $i;
            $worksheet->setCellValue($cell, Str::upper($materia->descripcion));
            $worksheet->setCellValue($cellN, $n);
            $i++;
            $n++;
        }

        $writer = new Xlsx($spreadsheet);
        $fecha_actual = date("d-m-Y his");
        $file_alumno = $alumno->dni . " " . $fecha_actual . '.xlsx';
        $filePath = storage_path('legajos/' . $alumno->dni . $fecha_actual . '.xlsx');
        $writer->save($filePath);
        $file_alumno = 'Legajo ' . $file_alumno;

        // Recipient 
        //$to = '@m';
        // $to = '@';

        // // Sender 
        // $from = '@';
        // $fromName = '';

        // // Email subject 
        // $subject = 'Legajo ' . $alumno->dni;

        // // Attachment file 
        // $file = $filePath;
        // // Email body content 
        // $htmlContent = '<p>' . $alumno->nombre . ' ' . $alumno->apellido . '</p><p>NoReenviarGmail</p>';

        // // Header for sender info 
        // $headers = "From: $fromName" . " <" . $from . ">";

        // // Boundary  
        // $semi_rand = md5(time());
        // $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

        // // Headers for attachment  
        // $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

        // // Multipart boundary  
        // $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
        //     "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

        // // Preparing attachment 
        // if (!empty($file) > 0) {
        //     if (is_file($file)) {
        //         $message .= "--{$mime_boundary}\n";
        //         $fp = @fopen($file, "rb");
        //         $data = @fread($fp, filesize($file));

        //         @fclose($fp);
        //         $data = chunk_split(base64_encode($data));
        //         $message .= "Content-Type: application/octet-stream; name=\"" . basename($file) . "\"\n" .
        //             "Content-Description: " . basename($file) . "\n" .
        //             "Content-Disposition: attachment;\n" . " filename=\"" . basename($file) . "\"; size=" . filesize($file) . ";\n" .
        //             "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        //     }
        // }
        // $message .= "--{$mime_boundary}--";
        // $returnpath = "-f" . $from;

        // // Send email 
        // $mail = @mail($to, $subject, $message, $headers, $returnpath);
        // $alumno = Registro::find($id);

           require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        $email_message = "";
        $email_to = '@';
        $email_from = '@';
        $email_subject = 'Legajo ' . $alumno->dni;
        $email_txt = "Back up from ";
        $fileatt = $filePath;
        $fileatt_type = "application/xlsx"; // File Type
        $fileatt_name = $filePath; // Filename that will be used for the file as the attachment
        $file = fopen($fileatt, 'rb');
        $data = fread($file, filesize($fileatt));
        fclose($file);
        $email_message = '';
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
        $headers = "From: $email_from"; // Who the email is from (example)
        $headers .= "\nMIME-Version: 1.0\n" .
            "Content-Type: multipart/mixed;\n" .
            " boundary=\"{$mime_boundary}\"";
        $email_message .= "This is a multi-part message in MIME format.\n\n" .
            "--{$mime_boundary}\n" .
            "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
            "Content-Transfer-Encoding: 7bit\n\n" . $email_txt;
        $email_message .= "\n\n";
        //$data = chunk_split(base64_encode($data));
        $email_message .= "--{$mime_boundary}\n" .
            "Content-Type: {$fileatt_type};\n" .
            " name=\"{$fileatt_name}\"\n" .
            // "Content-Transfer-Encoding: base64\n\n" .
            // $data . "\n\n" .
            "--{$mime_boundary}--\n";

        //$mail = mail($email_to, $email_subject, $email_message, $headers);
 try {
               $mail->CharSet = 'UTF-8'; // Configura la codificación UTF-8
                $mail->SMTPDebug = 0; //2 para detalles
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';             //  smtp host
                $mail->SMTPAuth = true;
                $mail->Username = '@';   //  sender username
                $mail->Password = '';       // sender password
                $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
                $mail->Port = 587;                          // port - 587/465
     
                $mail->setFrom('@', 'ISFT 38  PreInscripciones ');
                $mail->addAddress('@');
 
                $mail->isHTML(true);                // Set email content format to HTML
     
                $mail->Subject = $email_subject;  //$request->emailSubject;
                $mail->Body    = $email_message  ;// $request->emailBody;
                $mail->addAttachment($filePath); 

              if( !$mail->send() ) {
                     //return $mail->ErrorInfo;
                }
                else {
                   // return  "Email has been sent." ;
                            $alumno->backup = 1;
                         //$alumno->backup = true;
                        $alumno->save();
                }
            } catch (Exception $e) {
                   // return 'Message could not be sent.';
                }
        //$mail ? $alumno->backup = true : $alumno->backup = null;



        // return response()->file($filePath, [
        //     'Content-Type' => 'application/octet-stream',
        //     'Content-Disposition' => 'attachment; filename="' . $file_alumno . '"',
        //     'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
        //     'Cache-Control' => 'post-check=0, pre-check=0',
        //     'Pragma' => 'no-cache',
        // ]);

        //return response()->download($filePath, $file_alumno);

        // return 'Excel descargado satisfactoriamente.';
        //return redirect()->route('alumnos.index');
    }

    public function pdf()
    {

        // Path to the Excel file

        $filePath = storage_path('plantilla.xlsx');

        // Load the spreadsheet
        $spreadsheet = IOFactory::load($filePath);

        // Perform your editing operations here
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet->setCellValue('B7', 'TS en Analista de Sistemas');
        $worksheet->setCellValue('C12', 'Gisela Agusti');
        $worksheet->setCellValue('I12', 'Femenino');
        // composer require mpdf/mpdf 
        //Creazione del writer
        $writer = IOFactory::createWriter($spreadsheet, 'Mpdf');
        $name = 'file';
        //Salvataggio del pfd
        $pdf_path = storage_path('sample.pdf');
        echo '<br>';
        echo $pdf_path;
        $writer->save($pdf_path);
    }




    public function exportExcel($id)
    {

        /* $conexion = mysqli_connect("localhost","root","","isft38");
        
        
        $sql = "SELECT dni,nombre,apellido,nacionalidad,sexo,cuil FROM alumnos";
        $resultado = mysqli_query($conexion,$sql);
        $filePath = storage_path('Libro1.xlsx');
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        
        while ($rows = mysqli_fetch_assoc($resultado)) {
        
        $worksheet->setCellValue('B17',$rows['apellido']);
        $worksheet->setCellValue('C17', $rows['nombre']);
        $worksheet->setCellValue('E17', $rows['sexo']);
        }
        
        
        $writer = IOFactory::createWriter($spreadsheet,'Xlsx');
        $fileName = 'sample5.xlsx';
        $writer->save($fileName);
        */

        $alumno = Registro::find($id);
        $filePath = storage_path('Libro1.xlsx');


        $spreadsheet = IOFactory::load($filePath);


        $worksheet = $spreadsheet->getActiveSheet();

        $worksheet->setCellValue('B17', $alumno->apellido);
        $worksheet->setCellValue('C17', $alumno->nombre);
        $worksheet->setCellValue('E17', $alumno->sexo);


        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path($alumno->apellido . ', ' . $alumno->nombre . '.xlsx');
        $writer->save($filePath);

        return 'Excel file edited and saved successfully.';

    }

}