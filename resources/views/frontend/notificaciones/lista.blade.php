@extends('frontend.layout.mail')
@section('content')
    <div class="section">
        <h3>{{ $nombre }}:</h3>
        <p>
            Has sido agregado a la lista de espera para la incripci&oacute;n a la carrera seleccionada: {{ $carrera }}
        </p>
        <p>
            En el momento de habilitarse un lugar en la misma, ser&aacute;s contactado por un representante del Instituto a
            trav&eacute;s de los medios apropiados.
        </p>
    </div>
    <div class="section">
        <p>
            De ser convocado, deber&aacute;s presentar la siguiente documentaci&oacute;n:
        </p>
        <ul>
            <li>Original y fotocopia de Certificado de Estudio Secundario Completo (Certificado Anal&iacute;tico) o de t&iacute;tulo en
                tr&aacute;mite.</li>
            <li>Certificado de finalizaci&oacute;n y materias adeudadas, expedido por la Escuela Secundaria de la que egresaste.
            </li>
            <li>Original y fotocopia del DNI.</li>
            <li>Dos fotos tamaño 4 x 4 cm.</li>
            <li>Fotocopia de partida de Nacimiento.</li>
            <li>Colaboraci&oacute;n de Asociaci&oacute;n Cooperadora: $35.000 a abonar hasta en 3 pagos (el monto se actualizar&aacute; en Mayo/2025).</li>
        </ul>
    </div>
@endsection
