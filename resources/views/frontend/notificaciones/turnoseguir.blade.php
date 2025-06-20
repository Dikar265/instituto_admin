@extends('frontend.layout.mail')
@section('content')
    <div class="section">
        <h3>DNI: {{ $dni }}</h3>
        <p>
            Tu turno es el {{ $dia }} a las {{ $hora }}.
        </p>
        <p>
            En caso de querer solicitar la cancelación del turno, por favor dirigirse a <a
                href="{{ Route('inscripciones.cancelar', $hash) }}" target="_blank"
                rel="noopener noreferrer">{{ Route('inscripciones.cancelar', $hash) }}</a>
        </p>
    </div>
    <div class="section">
        <p>
            IMPORTANTE!!! Si todavía no lo hiciste, ten&eacute;s que completar tus datos en el siguiente link: <a
                href="{{ Route('inscripcion', $hash) }}" target="_blank" rel="noopener noreferrer">
                {{ Route('inscripcion', $hash) }}</a>

            {{--  IMPORTANTE!!! Si quer&eacute;s agilizar el tr&aacute;mite de inscripci&oacute;n, pod&eacute;s descargar,
            imprimir y
            completar la Solicitud de Inscripción para tu carrera en la página <a
                href="https://www.cfg.com.ar/turnos/descargar.html" target="_blank"
                rel="noopener noreferrer">https://www.cfg.com.ar/turnos/descargar.html</a>.  --}}
        </p>
        <p>
            Luego recibir&aacute;s otro correo con el detalle la documentación necesaria para la inscripci&oacute;n.
        </p>
    </div>
@endsection
