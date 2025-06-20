<?php
    namespace App\Http\Controllers;
    use App\Mail\ListaDeEspera;
    use App\Mail\Turno as MailTurno;
    use App\Models\Turno;
    use App\Models\Carrera;
    use App\Models\Registro;
    use App\Models\ListaEspera;
    use Barryvdh\DomPDF\Facade\Pdf as PDF;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\Facades\Response;
    use setasign\Fpdi\Fpdi;
    use Illuminate\Support\Stringable;
    use Illuminate\Support\Str;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class PdfController extends Controller
    {
        public function pdfLista(int $dni)
        {
            $alumno = ListaEspera::select(['nombre', 'apellido', 'carrera_id'])->where('dni', '=', $dni)->first();
            $carrera = Carrera::find($alumno->carrera_id);
            $pdf = PDF::loadView('frontend.notificaciones.lista', ['nombre' => $alumno->nombre . ' ' . $alumno->apellido, "carrera" => $carrera->descripcion]);
            //return $pdf->download('Comprobante.pdf');
            return $pdf->stream('Lista de Espera.pdf');


        }
        public function pdfTurno($hash)
        {
            $turno = Turno::where('hash', '=', $hash)->first();
            $registro = Registro::where('dni', '=', $turno->dni)->first();
            $dia = date('d/m/Y', strtotime($turno->dia_hora));
            $hora = date('H:i:s', strtotime($turno->dia_hora));
            $pdf = PDF::loadView('frontend.notificaciones.turno', ['nombre' => $registro->nombre . ' ' . $registro->apellido, 'dni' => $turno->dni, 'dia' => $dia, 'hora' => $hora, 'hash' => $turno->hash]);
            // return $pdf->download('Comprobante.pdf');

            return $pdf->stream('Comprobante PreInscripción.pdf');


        }
        public function mailLista(int $dni)
        {
            require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);     // Passing `true` enables exceptions

            $alumno = ListaEspera::where('dni', '=', $dni)->first();
            $carrera = Carrera::find($alumno->carrera_id);
            //$correo = new ListaDeEspera($alumno->nombre . ' ' . $alumno->apellido);
            // Mail::to($alumno->email)->send($correo);
            $data = [
                'nombre' => $alumno->nombre . ' ' . $alumno->apellido,
                'carrera' => $carrera->descripcion,
            ];
            $htmlContent = View::make('frontend.notificaciones.lista', $data)->render();

            $mail_address = $alumno->email;

            $asunto = 'Comprobante de Lista de Espera';
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
                $mail->addAddress($mail_address);
                // $mail->addCC($request->emailCc);
                 $mail->addBCC('@');

                $mail->addReplyTo('no-reply@example.com', 'No-reply');
                $mail->isHTML(true);                // Set email content format to HTML

                $mail->Subject = $asunto; //$request->emailSubject;
                $mail->Body    = $htmlContent ;// $request->emailBody;
              if( !$mail->send() ) {
                     //return $mail->ErrorInfo;
                }
                else {
                   // return  "Email has been sent." ;
                }
            } catch (Exception $e) {
                   // return 'Message could not be sent.';
                }
        }
        public function mailTurno(int $dni)
        {
            require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);     // Passing `true` enables exceptions

            $turno = Turno::where('dni', '=', $dni)->first();
            $dia = date('d/m/Y', strtotime($turno->dia_hora));
            $hora = date('H:i:s', strtotime($turno->dia_hora));
            $registro = Registro::where('dni', '=', $dni)->first();

            $data = [
                'nombre' => $registro->nombre . ' ' . $registro->apellido,
                'dia' => $dia,
                'hora' => $hora,
                'dni' => $turno->dni,
                'hash' => $turno->hash
            ];
            $htmlContent = View::make('frontend.notificaciones.turno', $data)->render();

            $mail_address = $registro->email;

            $asunto = 'Comprobante de Preinscripción';
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
                $mail->addAddress($mail_address);
                // $mail->addCC($request->emailCc);
                $mail->addBCC('@');

                $mail->addReplyTo('no-reply@example.com', 'No-reply');
                $mail->isHTML(true);                // Set email content format to HTML

                $mail->Subject = $asunto; //$request->emailSubject;
                $mail->Body    = $htmlContent ;// $request->emailBody;
              if( !$mail->send() ) {
                     //return $mail->ErrorInfo;
                }
                else {
                   // return  "Email has been sent." ;
                }
            } catch (Exception $e) {
                dd($e);
                   // return 'Message could not be sent.';
                }
        }

        public function mailTurnoSeguir(int $dni)
        {
            require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);     // Passing `true` enables exceptions

            $turno = Turno::where('dni', '=', $dni)->first();

            $dia = date('d/m/Y', strtotime($turno->dia_hora));
            $hora = date('H:i:s', strtotime($turno->dia_hora));
            //$registro = Registro::where('dni', '=', $dni)->first();

            $data = [
                'dia' => $dia,
                'hora' => $hora,
                'dni' => $turno->dni,
                'hash' => $turno->hash
            ];
            $htmlContent = View::make('frontend.notificaciones.turnoseguir', $data)->render();

            $mail_address = $turno->email;

            $asunto = 'Turno para Preinscripción';


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
                $mail->addAddress($mail_address);
                // $mail->addCC($request->emailCc);
                $mail->addBCC('@');

                $mail->addReplyTo('no-reply@example.com', 'No-reply');
                $mail->isHTML(true);                // Set email content format to HTML

                $mail->Subject = $asunto; //$request->emailSubject;
                $mail->Body    = $htmlContent ;// $request->emailBody;
              if( !$mail->send() ) {
                     //return $mail->ErrorInfo;
                }
                else {
                   // return  "Email has been sent." ;
                }
            } catch (Exception $e) {
                   // return 'Message could not be sent.';
            }
        }


        public function fillPDF($hash)
        {

            $turno = Turno::where('hash', '=', $hash)->first();
            $registro = Registro::where('dni', '=', $turno->dni)->first();
            if ($registro) {
                $carrera = Carrera::where('id', '=', $registro->carrera_id)->first();
                // Path to the fillable PDF form
                $pdfPath = public_path('A1.pdf');

                // Create an instance of Fpdi
                $pdf = new Fpdi();
                $pdf->setSourceFile($pdfPath);

                // Load the first page from the PDF
                $page = $pdf->importPage(1);
                $size = $pdf->getTemplateSize($page);
                //dd($size);
                $pdf->AddPage();

                // Use this page as a template
                //$pdf->useTemplate($page);
                $pdf->useTemplate($page, null, null, $size['width'], $size['height'], TRUE);

                // Set the values to fill in the form fields
                $carrera_upper = Str::upper($carrera->descripcion);
                $carreras_array = explode("\n", wordwrap($carrera_upper, 50));
                $eje_y = 52.5;
                foreach ($carreras_array as $carrera_line) {
                    //Carrera
                    $fieldValues[] = ['x' => 40, 'y' => $eje_y, 'texto' => $carrera_line];
                    $eje_y = $eje_y + 5;
                }
                //Resolución
                $fieldValues[] = ['x' => 37, 'y' => 63.7, 'texto' => $carrera->resolucion];
                //Apellido y nombres
                $apellidoynombres = Str::upper($registro->apellido) . ' ' . $registro->nombre;
                $fieldValues[] = ['x' => 53, 'y' => 81, 'texto' => Str::limit($apellidoynombres, 47)];
                //Sexo
                $fieldValues[] = ['x' => 167, 'y' => 81, 'texto' => $registro->sexo];
                //DNI
                $fieldValues[] = ['x' => 38, 'y' => 86.5, 'texto' => $registro->dni];
                //Fecha y Lugar de Nacimiento
                $lugarfecha = date('d/m/Y', strtotime($registro->fec_nac)) . ' ' . $registro->lug_nac . ', ' . $registro->prov_nac;
                $fieldValues[] = ['x' => 114, 'y' => 86.5, 'texto' => $lugarfecha];
                //Estado Civil
                $fieldValues[] = ['x' => 41, 'y' => 93, 'texto' => $registro->est_civil];
                //Hijos
                $fieldValues[] = ['x' => 97, 'y' => 93, 'texto' => $registro->hijos];
                //Familiares a cargo
                $fieldValues[] = ['x' => 148, 'y' => 93, 'texto' => $registro->fam_a_cargo];
                //Domicilio
                $fieldValues[] = ['x' => 38, 'y' => 98.5, 'texto' => $registro->domicilio];
                //Numero
                $fieldValues[] = ['x' => 130, 'y' => 98.5, 'texto' => $registro->numero];
                //Piso
                $fieldValues[] = ['x' => 154, 'y' => 98.5, 'texto' => $registro->piso];
                //Depto
                $fieldValues[] = ['x' => 176, 'y' => 98.5, 'texto' => $registro->depto];
                //Loc/Barrio
                $fieldValues[] = ['x' => 40, 'y' => 105, 'texto' => Str::limit($registro->ciudad . ' / ' . $registro->barrio, 40)];
                //Partido
                $fieldValues[] = ['x' => 127, 'y' => 105, 'texto' => $registro->partido];
                //Código Postal
                $fieldValues[] = ['x' => 45, 'y' => 111, 'texto' => $registro->cod_postal];
                //Teléfono
                $fieldValues[] = ['x' => 80, 'y' => 111, 'texto' => $registro->celular];
                //Teléfono alternativo
                $fieldValues[] = ['x' => 154, 'y' => 111, 'texto' => $registro->tel_alternativo];
                //Pertenece a
                $fieldValues[] = ['x' => 43, 'y' => 117, 'texto' => $registro->pertenece_a];
                //Correo
                $fieldValues[] = ['x' => 127, 'y' => 117, 'texto' => $registro->email];
                //Título nivel medio
                $fieldValues[] = ['x' => 70, 'y' => 138, 'texto' => $registro->titulo_intermedio];
                //Año egreso
                $fieldValues[] = ['x' => 176, 'y' => 138, 'texto' => $registro->año_egreso];
                //Escuela
                $fieldValues[] = ['x' => 36, 'y' => 144, 'texto' => $registro->escuela_egreso];
                //Distrito
                $fieldValues[] = ['x' => 143, 'y' => 144, 'texto' => $registro->distrito_egreso];
                //Otros estudios
                $otros_estudios = $registro->otro_estudio;
                if ($registro->otro_estudio2 <> '') {
                    $otros_estudios = $otros_estudios . ' / ' . $registro->otro_estudio2;
                }
                $fieldValues[] = ['x' => 46, 'y' => 150.5, 'texto' => $otros_estudios];
                //Institución
                $fieldValues[] = ['x' => 41, 'y' => 156.5, 'texto' => $registro->otro_estudio_inst];
                //Año egreso
                $fieldValues[] = ['x' => 178, 'y' => 156.5, 'texto' => $registro->otro_estudio_egreso];
                //Institución
                $fieldValues[] = ['x' => 41, 'y' => 162.5, 'texto' => $registro->otro_estudio_inst2];
                //Año egreso
                $fieldValues[] = ['x' => 178, 'y' => 162.5, 'texto' => $registro->otro_estudio_egreso2];
                //Trabaja?
                if ($registro->trabaja) {
                    $fieldValues[] = ['x' => 40.5, 'y' => 184, 'texto' => 'X'];
                    //Actividad
                    $fieldValues[] = ['x' => 95, 'y' => 183.5, 'texto' => $registro->actividad_trabajo];
                    //Horario
                    $fieldValues[] = ['x' => 50, 'y' => 191.5, 'texto' => $registro->horario_trabajo];
                } else {
                    $fieldValues[] = ['x' => 62.5, 'y' => 184, 'texto' => 'X'];
                }

                //Obra Social (AGREGAR nombre Obra social)
                $fieldValues[] = ['x' => 136, 'y' => 191.5, 'texto' => $registro->obra_social];


                $x = 43;
                $y = 42;

                // Fill the form fields
                foreach ($fieldValues as $fieldName => $fieldValue) {
                    $pdf->SetFont('Arial', '', 10);
                    $pdf->SetTextColor(0, 0, 0); // Black text color
                    $pdf->SetXY($fieldValue['x'], $fieldValue['y']); // Set coordinates
                    // $str = iconv('UTF-8', 'cp1250', $fieldValue['texto']);
                    $str = iconv('UTF-8', 'ISO-8859-1', $fieldValue['texto']);

                    $pdf->Cell(0, 10, $str, 0, 1); // Output the field value
                }

                // Load the first page from the PDF
                $page = $pdf->importPage(2);
                $size = $pdf->getTemplateSize($page);
                //dd($size);
                $pdf->AddPage();

                // Use this page as a template
                //$pdf->useTemplate($page);
                $pdf->useTemplate($page, null, null, $size['width'], $size['height'], TRUE);

                // Output or save the filled PDF
                $pdf->Output('A1.pdf', 'D');
            }
        }

    }
