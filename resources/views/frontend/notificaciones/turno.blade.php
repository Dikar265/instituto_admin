@extends('frontend.layout.mail')
@section('content')
    <div class="section">
        <h3>{{ $nombre }}:</h3>
        <p>
            Este documento es v&aacute;lido (impreso o en formato digital) como comprobante de tu preinscripci&oacute;n en
            el
            ISFT N&ordm; 38 y del turno obtenido para entregar documentaci&oacute;n en Secretar&iacute;a.
        </p>
        <p>
            Tu turno en Secretar&iacute;a (presentate en la Biblioteca del ISFT N&ordm; 38) es el
            {{ $dia }} a las {{ $hora }}.
        </p>
        <p>
            En caso de querer solicitar la cancelación del turno, por favor dirigirse al siguiente link: <a
                href="{{ Route('inscripciones.cancelar', $hash) }}" target="_blank"
                rel="noopener noreferrer">{{ Route('inscripciones.cancelar', $hash) }}</a>
        </p>
    </div>
    <div class="section">
        <p>
            Cuando concurr&aacute;s a tu turno, no olvid&eacute;s llevar la siguiente documentaci&oacute;n:
        </p>
        <ul>
            <li>Original y fotocopia de Certificado de Estudio Secundario Completo (Certificado Anal&iacute;tico) o de
                t&iacute;tulo en tr&aacute;mite.</li>
            <li>Certificado de finalizaci&oacute;n y materias adeudadas, expedido por la Escuela Secundaria de la que
                egresaste.</li>
            <li>Original y fotocopia del DNI.</li>
            <li>Dos fotos tamaño 4 x 4 cm.</li>
            <li>Fotocopia de Partida de Nacimiento.</li>
            <li>Colaboraci&oacute;n de Asociaci&oacute;n Cooperadora: $35.000 a abonar hasta en 3 pagos (el monto se actualizar&aacute; en Mayo/2025).</li>
        </ul> 
        <p>
            IMPORTANTE!!! Para agilizar el tr&aacute;mite llev&aacute; la planilla de Solicitud de Inscripci&oacute;n impresa y completa, desde el siguiente link: <br>
            <a
                href="https://abc.gob.ar/secretarias/sites/default/files/2023-08/Formacion%20Docente%20inicial%2C%20Tecnica%20y%20Artistica%20-%20Planilla%20de%20inscripci%C3%B3n%20-%20Educaci%C3%B3n%20Superior_1.pdf"
                target="_blank" rel="noopener noreferrer">Solicitud de Inscripci&oacute;n Nivel Superior</a>

            {{--  IMPORTANTE!!! Si quer&eacute;s agilizar el tr&aacute;mite de inscripci&oacute;n, pod&eacute;s descargar,
            imprimir y
            completar la Solicitud de Inscripción para tu carrera en la página <a
                href="https://www.cfg.com.ar/turnos/descargar.html" target="_blank"
                rel="noopener noreferrer">https://www.cfg.com.ar/turnos/descargar.html</a>.  --}}
        </p>
        <p>
            Nuevamente te damos la bienvenida y te deseamos el mayor de los &eacute;xitos!
        </p>
    </div>
@endsection
