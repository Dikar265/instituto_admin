@extends('frontend.layout.main')
@section('title', 'Inscripciones')
@section('content')

    <div class="links">
        <form action="{{ route('turno.destroy', $hash) }}" method="GET">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Cancelar Preinscipción</button>
        </form>
        <script>
            function confirmDelete() {
                if (window.confirm('Está seguro de eliminar el turno para la preinscripción?')) {
                    // If the user confirms, submit the form
                    document.querySelector('form').submit();
                }
            }
        </script>

    </div>
@endsection
