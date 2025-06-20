<?php
/*
|--------------------------------------------------------------------------
| Proyecto realizado por:
| - Herrera Guillermo
| - Auce Ailen
| - Urbine Valentin
fotoc_dni_ok
fotoc_titulo_op
certificado_sec_ok
foto_ok
|--------------------------------------------------------------------------
*/
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\isftController;
use App\Http\Controllers\PdfController;
use App\Models\Registro;
use App\Models\Turno;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExcelControllerInscrip;
use App\Http\Controllers\ExcelControllerLegajo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Carrera;

// Rutas principales
Route::get('/alumno/{hash}', [isftController::class, 'index'])->name('inscripcion');
// Route::get('/prueba', [isftController::class, 'prueba'])->name('prueba');
// Route::get('/registro/{id}', [isftController::class, 'mostrar_datos'])->name('mostrarDatosAspirante');
Route::post('/guardar', [isftController::class, 'guardar'])->name('registrar');
// Route::post('/probar', [isftController::class, 'guardar_prueba'])->name('probar');

Route::delete('/eliminar-registro/{id}', [isftController::class, 'eliminar'])->name('');

// Rutas autenticadas
Route::middleware(['director'])->group(function () {
    Route::get('/preinscriptos/{date?}', [isftController::class, 'admin'])->name('ir_admin');
    Route::post('/preinscriptos', [isftController::class, 'admin_search'])->name('ir_admin_post');
    Route::delete('/eliminar-registro/{id}', [isftController::class, 'eliminar'])->name('registro.eliminar');

    Route::get('/editar-registro/{id}', [isftController::class, 'editar'])->name('registro.editar');
    Route::put('/editar-registro/{id}', [isftController::class, 'update'])->name('registro.actualizar');

    Route::put('/agregar_cambio/{id}', [isftController::class, 'check_fotoc_dni'])->name('check.fotoc.dni');

    Route::put('/agregar_cambio2/{id}', [isftController::class, 'check_fotoc_titulo'])->name('check.fotoc.titulo');
    Route::put('/agregar_cambio3/{id}', [isftController::class, 'check_certif_secund'])->name('check.certif.secund');
    Route::put('/agregar_cambio4/{id}', [isftController::class, 'check_foto'])->name('check.foto');
    Route::put('/agregar_cambio5/{id}', [isftController::class, 'check_part_nac'])->name('check.part.nac');
    Route::put('/agregar_cambio6/{id}', [isftController::class, 'check_confirmado'])->name('check.confirmado');

Route::get('/turnossindatos/{carrera_id?}', function ($carrera_id = 0) {
   if($carrera_id == 0){
    return view('backend.alumnos.lista');
   }
   else{
    $carrera = Carrera::where('id', $carrera_id)->first();
    if($carrera){
    $dia = date('Y-m-d');
     $html = "<h3>$carrera->descripcion</h3><br><table border =  1>
     <tr>    <th>    Dia y Hora  </th><th>DNI    </th> <th>Correo   </th><th>   Link    </th><th>    </th></tr>";
    $sin_datos = DB::select("select * from turnos where carrera_id = $carrera_id and dni is not null and dia_hora > '$dia' and dni not in ( SELECT dni FROM registros where carrera_id = $carrera_id)");
    foreach ($sin_datos as $turno) {
       $html = $html . " <tr>    <td>  $turno->dia_hora </td><td>  $turno->dni   </td><td>  $turno->email   </td> <td>   <a target='_blank' href='" . Route('inscripcion', $turno->hash ) . "'>" .  Route('inscripcion', $turno->hash ) . "</a><br>     </td>
       <td>
                  <a href='https://mail.google.com/mail/u/0/?source=mailto&to=$turno->email &su=Pre-inscripciones ISFT 38&body=Hola, vimos que no completaste tu pre-inscripción. DNI $turno->dni con turno registrado para el $turno->dia_hora. Por favor ingresá al siguiente link ".Route('inscripcion', $turno->hash) ." y completá el proceso. Al finalizar recibirás un mail de confirmación. Saludos cordiales.&fs=1&tf=cm' rel='nofollow noopener noreferrer' target='_blank'>Enviar correo</a>
       </td>
       </tr>";
       ;
    };
   $html = $html .  "</table>";
    return $html;
    }
   }


})->name('errores');
});

Route::get('/formularioA1/{hash}', [PdfController::class, 'fillPDF'])->name('solic.alumno');


Route::controller(App\Http\Controllers\PdfController::class)->name('pdf.')->group(function () {
    Route::get('/pdf/lista/{dni}', 'pdfLista')->name('lista');
    Route::get('/pdf/turno/{hash}', 'pdfTurno')->name('turno');
    Route::get('/mail/turno/{dni}', 'mailTurno')->name('turno.mail');
    // Route::get('/formularioA1/{hash}', 'fillPDF')->name('solic.alumno');
});

// Route::post('/home', [isftController::class, 'cargar_carrera'])->name('cargar.carrera');
// Route::post('/home2', [isftController::class, 'cargar_asignatura'])->name('cargar.asignatura');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['director'])->group(function () {
    Route::get('foto/{filename}', function ($filename) {
        $path = storage_path('fotos/' . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });
});

Route::middleware(['admin'])->group(function () {
    Route::get('/backup', function () {
        $alumnos = Registro::where('backup', null)->get();
        $turnos = Turno::where('dni', '<>', '')->orderBy('dia_hora', 'ASC')->get();
        $htmlContent = "";
        //if (!$alumnos->isEmpty()) {
        foreach ($alumnos as $alumno) {
            ExcelControllerInscrip::solicitud_backup($alumno->id);
            ExcelControllerLegajo::legajo_backup($alumno->id);
        }
        foreach ($turnos as $turno) {
            $htmlContent = $htmlContent . $turno->dia_hora . " | " .
                $turno->dni . " | " .
                $turno->carrera->descripcion . "<br>";
        }
        $htmlContent = $htmlContent . '<br>NoReenviarGmail';
        $asunto = 'Turnos';
        $mail = '@';
        $noreply = 'no-reply@example.com';
        $headers = "";
        $headers .= "From: I.S.F.T N° 38 <" . $noreply . ">\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $resultado = mail($mail, $asunto, $htmlContent, $headers);
        return redirect()->away("");
        // }
    });
});

Route::middleware(['admin'])->group(function () {
    Route::get('/backup_solicitud', function () {
        //$alumnos = Registro::where('backup', null)->get();
        $alumnos = Registro::where('id', '>' , 1 )->get();

        $turnos = Turno::where('dni', '<>', '')->orderBy('dia_hora', 'ASC')->get();
        $htmlContent = "";

        //if (!$alumnos->isEmpty()) {
        foreach ($alumnos as $alumno) {

            ExcelControllerInscrip::solicitud_backup($alumno->id);

            ExcelControllerLegajo::legajo_backup($alumno->id);

        }

        foreach ($turnos as $turno) {
            $htmlContent = $htmlContent . $turno->dia_hora . " | " .
                $turno->dni . " | " .
                $turno->carrera->descripcion . "<br>";
        }
        $htmlContent = $htmlContent . '<br>NoReenviarGmail';
        $asunto = 'Turnos';
        $mail = '@';
        $noreply = 'no-reply@example.com';
        $headers = "";
        $headers .= "From: I.S.F.T N° 38 <" . $noreply . ">\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $resultado = mail($mail, $asunto, $htmlContent, $headers);
        return 'Backup Terminado';
        // }
    });
});

//Route::middleware(['admin'])->group(function () {
// Route::get('/dump', function () {

//     return redirect()->away");

// });
//});

// <?php
// error_reporting(E_USER_ERROR);

// function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {

// $email_to = $mailto;
// $email_from = $from_mail;
// $email_subject = $subject;
// $email_txt = $message;
// $fileatt =  $filename;
// $fileatt_type = "application/sql"; // File Type
// $fileatt_name = $filename; // Filename that will be used for the file as the attachment
// $file = fopen($fileatt,'rb');
// $data = fread($file,filesize($fileatt));
// fclose($file);
// $semi_rand = md5(time());
// $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
// $headers="From: $email_from"; // Who the email is from (example)
// $headers .= "\nMIME-Version: 1.0\n" .
// "Content-Type: multipart/mixed;\n" .
// " boundary=\"{$mime_boundary}\"";
// $email_message .= "This is a multi-part message in MIME format.\n\n" .
// "--{$mime_boundary}\n" .
// "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
// "Content-Transfer-Encoding: 7bit\n\n" . $email_txt;
// $email_message .= "\n\n";
// $data = chunk_split(base64_encode($data));
// $email_message .= "--{$mime_boundary}\n" .
// "Content-Type: {$fileatt_type};\n" .
// " name=\"{$fileatt_name}\"\n" .
// "Content-Transfer-Encoding: base64\n\n" .
// $data . "\n\n" .
// "--{$mime_boundary}--\n";

// mail($email_to,$email_subject,$email_message,$headers);
// }

// // Create the mysql backup file
// // edit this section
// $dbhost = ""; // usually localhost
// $dbuser = "root";
// $dbpass = "";
// $dbname = "isft38";

// $backupfile = "backup/" . $dbname . date("Y-m-d") . '.sql';
// system("mysqldump -h $dbhost -u $dbuser -p$dbpass $dbname > $backupfile");

// // Mail the file

// 	$my_file = $backupfile;
// 	$my_path = $_SERVER['DOCUMENT_ROOT']."/administrar/backup/";

// 	// Who email is FROM
// 	$my_name    = "";
// 	$my_mail    = "@";
// 	$my_replyto = "@";

// 	// Whe email is going TO
// 	$to_email   = '@';

// 	// Subject line of email
// 	$my_subject = "Backup file.";

// 	// Content of email message (Text only)
// 	$requester   = "";
// 	$message     = "Back up from ";

// 	// Call function to send email
// 	//mail_attachment($my_file, $my_path, $to_email, $my_mail, $my_name, $my_replyto, $my_subject, $message);
// ?>
