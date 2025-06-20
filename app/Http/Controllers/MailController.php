<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email() {
    // Cabecera del mail
    $mail = "@";
$asunto    = 'Consulta desde la web';
$noreply   = 'no-reply@example.com';
$respuesta = "@";
$nombre = 'test';
$mensaje1 = "Hola";
// Remitente, respuesta y configuraci�n del mail
$headers = "";
$headers .= "From: I.S.F.T N38 <".$noreply.">\r\n";
$headers .= "Reply-To: ".$nombre." <".$respuesta.">\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Mensaje
$mensaje2  = "<strong>Consulta realizada por ".$nombre.": \r\n </strong>";
$mensaje2 .= '<br> <br>';
$mensaje2 .= nl2br($mensaje1);


// Funcion de env�o de mail
$resultado= mail($mail, $asunto, $mensaje2, $headers);

if ($resultado == true)
{
 $mensaje = 1; //Correo enviado correctamente.
}
else
{
$mensaje = 2; //Error en el envio.
}

   }
   public function html_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('@', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('info@expample.com','ISFT 38');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('@', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('info@expample.com','ISFT 38');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
