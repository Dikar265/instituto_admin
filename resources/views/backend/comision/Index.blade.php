@extends('backend.layouts.main')
@section('title', 'Comisiones')

@section('content')

  <table class="table texto-tabla mb-0 container">
    <div class="algo">
      <tr class="text-dark text-center mb-0">
        <th class="text-left" scope="col">Comisión</th>
        <td class="">
          <a href="{{ route('comision.create') }}" class="btn btn-success">
            <img src="{{ asset('svg/new.svg') }}" height="20" width="20" alt="Crear" title="Crear">
            Crear comisión
          </a>
        </td>
      </tr>
    </div>

    @foreach($comisiones as $comision)
    <tr>
      <td class="text-center align-middle">{{$comision->comision}}</td>
      <td class="align-middle">
        {{ Form::model($comision, [ 'method' => 'delete' , 'route' => ['comision.destroy', $comision->id] ]) }}
        @csrf
        <a href="{{ route('comision.edit', ['comision' => $comision->id ]) }}" class="btn btn-primary ">
          <img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar">
        </a>
        <button type="submit" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la comisión?')) return false;">
          <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar">
        </button>
</div>
{!!Form::close()!!}
</tr>
@endforeach
</table>

@endsection