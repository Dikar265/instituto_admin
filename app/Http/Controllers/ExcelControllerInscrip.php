<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Registro;
use Illuminate\Support\Facades\Storage;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use Mpdf\Mpdf;
use Illuminate\Support\Stringable;
use Illuminate\Support\Str;

class ExcelControllerInscrip extends Controller
{

  public function edit()
  {
    $alumno = Registro::find(2);
    $filePath = storage_path('Libro1.xlsx');


    $spreadsheet = IOFactory::load($filePath);


    $worksheet = $spreadsheet->getActiveSheet();
    $worksheet->setCellValue('A1', $alumno->nombre);
    $worksheet->setCellValue('A2', $alumno->apellido);


    $writer = new Xlsx($spreadsheet);
    $filePath = storage_path('sample4.xlsx');
    $writer->save($filePath);

    return 'Excel file edited and saved successfully.';
  }


  public function downloadFile()
  {
    $filePath = storage_path('sample3.xlsx');
    $fileName = 'sample4.xlsx';

    return response()->download($filePath, $fileName);

  }


  public function pdf()
  {

    // Path to the Excel file

    $filePath = storage_path('sample3.xlsx');

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
    $carrera = Carrera::find($alumno->carrera_id);
    $filePath = storage_path('Sin titulo 2.xlsx');


    $spreadsheet = IOFactory::load($filePath);


    $worksheet = $spreadsheet->getActiveSheet();

    $nombre = $alumno->nombre . " " . $alumno->apellido;
    $worksheet->setCellValue('C19', $nombre);
    $worksheet->setCellValue('J19', $alumno->sexo);
    $worksheet->setCellValue('B20', $alumno->dni);
    $worksheet->setCellValue('H20', $alumno->fec_nac);
    $worksheet->setCellValue('B21', $alumno->est_civil);
    $worksheet->setCellValue('H21', $alumno->hijos);
    $worksheet->setCellValue('K21', $alumno->fam_a_cargo);
    $worksheet->setCellValue('B22', $alumno->domicilio);
    //$worksheet->setCellValue('G22',$alumno->num);
//$worksheet->setCellValue('K22',$alumno->depto);
    $worksheet->setCellValue('B23', $alumno->barrio);
    $worksheet->setCellValue('H23', $alumno->ciudad);
    $worksheet->setCellValue('B24', $alumno->cod_postal);
    $worksheet->setCellValue('D24', $alumno->celular);
    $worksheet->setCellValue('I24', $alumno->tel_alternativo);
    $worksheet->setCellValue('B25', $alumno->tel_alt_pertenece);
    $worksheet->setCellValue('H25', $alumno->email);
    $worksheet->setCellValue('D29', $alumno->titulo_intermedio);
    $worksheet->setCellValue('K29', $alumno->anio_egreso);
    $worksheet->setCellValue('B30', $alumno->escuela_egreso);
    $worksheet->setCellValue('I30', $alumno->distrito_egreso);
    $estudios = $alumno->otro_estudio . " " . $alumno->otro_estudio2;
    $worksheet->setCellValue('B31', $alumno->$estudios);
    $worksheet->setCellValue('B32', $alumno->otro_estudio_inst);
    $worksheet->setCellValue('K32', $alumno->otro_estudio_egreso);
    $worksheet->setCellValue('B32', $alumno->otro_estudio_inst2);
    $worksheet->setCellValue('K32', $alumno->otro_estudio_egreso2);
    $worksheet->setCellValue('D38', $alumno->actividad_trabajo);
    $worksheet->setCellValue('B39', $alumno->horario_trabajo);
    $worksheet->setCellValue('G39', $alumno->obra_social);
    $worksheet->setCellValue('D47', $nombre);
    $worksheet->setCellValue('B48', $alumno->visado_por);
    $worksheet->setCellValue('B54', $nombre);
    $worksheet->setCellValue('A55', $carrera->descripcion);
    $worksheet->setCellValue('C59', $alumno->fotoc_dni_ok ? "si" : "no");
    $worksheet->setCellValue('C60', $alumno->fotoc_titulo_ok ? "si" : "no");
    $worksheet->setCellValue('C61', $alumno->certificado_sec_ok ? "si" : "no");
    $worksheet->setCellValue('C62', $alumno->foto_ok ? "si" : "no");
    $worksheet->setCellValue('B147', $alumno->dni);

    $writer = new Xlsx($spreadsheet);
    $filePath = storage_path('ALUMNOS INSCRIPCIÓN.xlsx');
    //$filePath = storage_path($alumno->apellido . ', '. $alumno->nombre . '.xlsx');u
    $writer->save($filePath);





    $writer = IOFactory::createWriter($spreadsheet, 'Mpdf');

    $pdf_path = storage_path('ALUMNOS INSCRIPCIÓN.pdf');

    $writer->save($pdf_path);

    return "PDF Downloaded successfully";

  }


  public function legajo($id)
  {

    $alumno = Registro::findOrFail($id);

    $filePath = storage_path('Legajo (1).xlsx');
    $spreadsheet = IOFactory::load($filePath);

    $worksheet = $spreadsheet->getActiveSheet();
    $nombre = $alumno->nombre . " " . $alumno->apellido;
    $worksheet->setCellValue('C5', $nombre);
    $worksheet->setCellValue('F5', $alumno->dni);


    /*
    $writer = new Xlsx($spreadsheet);
    $filePath = storage_path('LEGAJO INSCRIPCIONES.xlsx');
    $writer->save($filePath);
    */


    return "Excel downloaded successfully";
  }


  public function solic($id)
  {

    $alumno = Registro::find($id);
    $carrera = Carrera::find($alumno->carrera_id);
    $filePath = storage_path('Solicitud.xlsx');

    $spreadsheet = IOFactory::load($filePath);

    $worksheet = $spreadsheet->getActiveSheet();

    //Foto
    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $archivo_foto = file_exists(storage_path('fotos/' . $alumno->foto) );
    if($archivo_foto == 1){    
    $drawing->setName('Foto');
    $drawing->setDescription('Foto');
    $drawing->setPath(storage_path('fotos/' . $alumno->foto)); /* put your path and image here */
    $drawing->setCoordinates('G3');
    $drawing->setOffsetY(7);
    $drawing->setHeight(151);
    $drawing->setWidth(151);
    $drawing->getShadow()->setVisible(true);
    $drawing->setWorksheet($spreadsheet->getActiveSheet());
}
    //DATOS PERSONALES
    $worksheet->setCellValue('A11', Str::upper($carrera->descripcion) . ' - R.M. N° ' . $carrera->resolucion);
    $nombre = Str::upper($alumno->apellido) . ' ' . $alumno->nombre;
    $worksheet->setCellValue('C14', $nombre);
    $worksheet->setCellValue('G14', $alumno->sexo);
    $worksheet->setCellValue('C15', $alumno->lug_nac);
    $worksheet->setCellValue('G15', $alumno->prov_nac);
    $worksheet->setCellValue('B16', $alumno->dni);
    $worksheet->setCellValue('D16', date('d/m/Y', strtotime($alumno->fec_nac)));
    $worksheet->setCellValue('G16', $alumno->cuil);
    $worksheet->setCellValue('B17', $alumno->est_civil);
    $worksheet->setCellValue('D17', $alumno->hijos);
    $worksheet->setCellValue('F17', $alumno->fam_a_cargo);
    $domicilio = $alumno->domicilio . ' ' . $alumno->numero;
    if ($alumno->piso <> "") {
      $domicilio = $domicilio . ' Piso: ' . $alumno->piso;
    }
    if ($alumno->depto <> "") {
      $domicilio = $domicilio . ' Depto: ' . $alumno->depto;
    }
    $worksheet->setCellValue('B18', $domicilio);
    $worksheet->setCellValue('F18', $alumno->provincia);
    $worksheet->setCellValue('B19', $alumno->barrio);
    $worksheet->setCellValue('F19', $alumno->ciudad);
    $worksheet->setCellValue('B20', $alumno->cod_postal);
    $worksheet->setCellValue('D20', $alumno->tel_fijo . " ");
    $worksheet->setCellValue('F20', $alumno->celular . " ");
    $worksheet->setCellValue('C21', $alumno->tel_alternativo . " ");
    $worksheet->setCellValue('F21', $alumno->pertenece_a);
    $worksheet->setCellValue('C22', $alumno->email);

    // //ESTUDIOS CURSADOS
    $worksheet->setCellValue('D26', $alumno->titulo_intermedio);
    $worksheet->setCellValue('C27', $alumno->año_egreso);
    $worksheet->setCellValue('E27', $alumno->escuela_egreso);
    $worksheet->setCellValue('C28', $alumno->otro_estudio);
    $worksheet->setCellValue('B29', $alumno->otro_estudio_inst);
    $worksheet->setCellValue('G29', $alumno->otro_estudio_egreso);
    $worksheet->setCellValue('C30', $alumno->otro_estudio2);
    $worksheet->setCellValue('B31', $alumno->otro_estudio_inst2);
    $worksheet->setCellValue('G31', $alumno->otro_estudio_egreso2);

    // //DATOS LABORALES
    $worksheet->setCellValue('B34', $alumno->trabaja ? "SI" : "NO");
    $worksheet->setCellValue('D34', $alumno->actividad_trabajo);
    $worksheet->setCellValue('B35', $alumno->horario_trabajo);
    $worksheet->setCellValue('E35', $alumno->obra_social);
    //Presento Documentación?
    //$worksheet->setCellValue('C43', $nombre);
    $worksheet->setCellValue('F43', $alumno->visado_por);
    $worksheet->setCellValue('C47', $nombre);
    //$worksheet->setCellValue('D48', $alumno->carrera);
    $worksheet->setCellValue('D51', $alumno->fotoc_dni_ok ? "SI" : "NO");
    $worksheet->setCellValue('D52', $alumno->fotoc_titulo_ok ? "SI" : "NO");
    $worksheet->setCellValue('D53', $alumno->certificado_sec_ok ? "SI" : "NO");
    $worksheet->setCellValue('D54', $alumno->foto_ok ? "SI" : "NO");
    $worksheet->setCellValue('D55', $alumno->partida_nac_ok ? "SI" : "NO");

    $writer = new Xlsx($spreadsheet);
    //$filePath = storage_path('SOLICITUD INSCRIPCIONES.xlsx');
    $fecha_actual = date("d-m-Y his");
    $file_alumno = $alumno->dni . " " . $fecha_actual . '.xlsx';
    $filePath = storage_path('inscripciones/' . $alumno->dni . $fecha_actual . '.xlsx');
    $writer->save($filePath);
    $file_alumno = 'Solicitud ' . $file_alumno;
    return response()->file($filePath, [
      'Content-Type' => 'application/octet-stream',
      'Content-Disposition' => 'attachment; filename="' . $file_alumno . '"',
      'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
      'Cache-Control' => 'post-check=0, pre-check=0',
      'Pragma' => 'no-cache',
    ]);

    // return response()->download($filePath, $file_alumno);
    //return 'Excel descargado satisfactoriamente.';

  }

 
  public static function solicitud_backup($id)
  {

    $alumno = Registro::find($id);
    $carrera = Carrera::find($alumno->carrera_id);
    $filePath = storage_path('Solicitud.xlsx');

    $spreadsheet = IOFactory::load($filePath);

    $worksheet = $spreadsheet->getActiveSheet();

    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    //Foto
    /*$archivo_foto = file_exists(storage_path('fotos/' . $alumno->foto) );
    if($archivo_foto == 1){
    $drawing->setName('Foto');
    $drawing->setDescription('Foto');
    $drawing->setPath(storage_path('fotos/' . $alumno->foto));  
    $drawing->setCoordinates('G3');
    $drawing->setOffsetY(7);
    $drawing->setHeight(151);
    $drawing->setWidth(151);
    $drawing->getShadow()->setVisible(true);
    $drawing->setWorksheet($spreadsheet->getActiveSheet());
   }*/

    //DATOS PERSONALES
    $worksheet->setCellValue('A11', Str::upper($carrera->descripcion) . ' - R.M. N° ' . $carrera->resolucion);
    $nombre = Str::upper($alumno->apellido) . ' ' . $alumno->nombre;
    $worksheet->setCellValue('C14', $nombre);
    $worksheet->setCellValue('G14', $alumno->sexo);
    $worksheet->setCellValue('C15', $alumno->lug_nac);
    $worksheet->setCellValue('G15', $alumno->prov_nac);
    $worksheet->setCellValue('B16', $alumno->dni);
    $worksheet->setCellValue('D16', date('d/m/Y', strtotime($alumno->fec_nac)));
    $worksheet->setCellValue('G16', $alumno->cuil);
    $worksheet->setCellValue('B17', $alumno->est_civil);
    $worksheet->setCellValue('D17', $alumno->hijos);
    $worksheet->setCellValue('F17', $alumno->fam_a_cargo);
    $domicilio = $alumno->domicilio . ' ' . $alumno->numero;
    if ($alumno->piso <> "") {
      $domicilio = $domicilio . ' Piso: ' . $alumno->piso;
    }
    if ($alumno->depto <> "") {
      $domicilio = $domicilio . ' Depto: ' . $alumno->depto;
    }
    $worksheet->setCellValue('B18', $domicilio);
    $worksheet->setCellValue('F18', $alumno->provincia);
    $worksheet->setCellValue('B19', $alumno->barrio);
    $worksheet->setCellValue('F19', $alumno->ciudad);
    $worksheet->setCellValue('B20', $alumno->cod_postal);
    $worksheet->setCellValue('D20', $alumno->tel_fijo . " ");
    $worksheet->setCellValue('F20', $alumno->celular . " ");
    $worksheet->setCellValue('C21', $alumno->tel_alternativo . " ");
    $worksheet->setCellValue('F21', $alumno->pertenece_a);
    $worksheet->setCellValue('C22', $alumno->email);

    // //ESTUDIOS CURSADOS
    $worksheet->setCellValue('D26', $alumno->titulo_intermedio);
    $worksheet->setCellValue('C27', $alumno->año_egreso);
    $worksheet->setCellValue('E27', $alumno->escuela_egreso);
    $worksheet->setCellValue('C28', $alumno->otro_estudio);
    $worksheet->setCellValue('B29', $alumno->otro_estudio_inst);
    $worksheet->setCellValue('G29', $alumno->otro_estudio_egreso);
    $worksheet->setCellValue('C30', $alumno->otro_estudio2);
    $worksheet->setCellValue('B31', $alumno->otro_estudio_inst2);
    $worksheet->setCellValue('G31', $alumno->otro_estudio_egreso2);

    // //DATOS LABORALES
    $worksheet->setCellValue('B34', $alumno->trabaja ? "SI" : "NO");
    $worksheet->setCellValue('D34', $alumno->actividad_trabajo);
    $worksheet->setCellValue('B35', $alumno->horario_trabajo);
    $worksheet->setCellValue('E35', $alumno->obra_social);
    //Presento Documentación?
    //$worksheet->setCellValue('C43', $nombre);
    $worksheet->setCellValue('F43', $alumno->visado_por);
    $worksheet->setCellValue('C47', $nombre);
    //$worksheet->setCellValue('D48', $alumno->carrera);
    $worksheet->setCellValue('D51', $alumno->fotoc_dni_ok ? "SI" : "NO");
    $worksheet->setCellValue('D52', $alumno->fotoc_titulo_ok ? "SI" : "NO");
    $worksheet->setCellValue('D53', $alumno->certificado_sec_ok ? "SI" : "NO");
    $worksheet->setCellValue('D54', $alumno->foto_ok ? "SI" : "NO");
    $worksheet->setCellValue('D55', $alumno->partida_nac_ok ? "SI" : "NO");

    $writer = new Xlsx($spreadsheet);
    //$filePath = storage_path('SOLICITUD INSCRIPCIONES.xlsx');
    $fecha_actual = date("d-m-Y his");
    $file_alumno = $alumno->dni . " " . $fecha_actual . '.xlsx';
    $filePath = storage_path('inscripciones/' . $alumno->dni . $fecha_actual . '.xlsx');
    $writer->save($filePath);
    $file_alumno = 'Solicitud ' . $file_alumno;
    // return response()->file($filePath, [
    //   'Content-Type' => 'application/octet-stream',
    //   'Content-Disposition' => 'attachment; filename="' . $file_alumno . '"',
    //   'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
    //   'Cache-Control' => 'post-check=0, pre-check=0',
    //   'Pragma' => 'no-cache',
    // ]);


    // // Recipient 
    // $to = '@';
    // //$to = '@';

    // // Sender 
    // $from = '@';
    // $fromName = 'I.S.F.T. N° 38';

    // // Email subject 
    // $subject = 'Solicitud ' . $alumno->dni;

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
    //   "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

    // // Preparing attachment 
    // if (!empty($file) > 0) {
    //   if (is_file($file)) {
    //     $message .= "--{$mime_boundary}\n";
    //     $fp = @fopen($file, "rb");
    //     $data = @fread($fp, filesize($file));

    //     @fclose($fp);
    //     $data = chunk_split(base64_encode($data));
    //     $message .= "Content-Type: application/octet-stream; name=\"" . basename($file) . "\"\n" .
    //       "Content-Description: " . basename($file) . "\n" .
    //       "Content-Disposition: attachment;\n" . " filename=\"" . basename($file) . "\"; size=" . filesize($file) . ";\n" .
    //       "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    //   }
    // }
    // $message .= "--{$mime_boundary}--";
    // $returnpath = "-f" . $from;

    // // Send email 
    // $mail = @mail($to, $subject, $message, $headers, $returnpath);

    // $alumno = Registro::find($id);

    $email_message = "";
    $email_to = '@';
    $email_from = '@';
    $email_subject = 'Solicitud ' . $alumno->dni;
    $email_txt = "Back up from ";
    $fileatt = $filePath;
    $fileatt_type = "application/xlsx"; // File Type
    $fileatt_name = $filePath; // Filename that will be used for the file as the attachment
    $file = fopen($fileatt, 'rb');
    $data = fread($file, filesize($fileatt));
    fclose($file);
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
    $data = chunk_split(base64_encode($data));
    $email_message .= "--{$mime_boundary}\n" .
      "Content-Type: {$fileatt_type};\n" .
      " name=\"{$fileatt_name}\"\n" .
      "Content-Transfer-Encoding: base64\n\n" .
      $data . "\n\n" .
      "--{$mime_boundary}--\n";

    //$mail = mail($email_to, $email_subject, $email_message, $headers);


    //$mail ? $alumno->backup = true : $alumno->backup = null;
    $alumno->backup = null;
    //$alumno->backup = true;
    $alumno->save();

    // return response()->download($filePath, $file_alumno);
    //return 'Excel descargado satisfactoriamente.';

  }

}