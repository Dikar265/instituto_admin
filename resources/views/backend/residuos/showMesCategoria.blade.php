@extends('backend.layouts.main')
@section('title', 'Residuos')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center align-middle">
        <div class="col-3">
        @forelse($pesosMesCategoria as $residuo)
                
                @if($loop->first)
                @php
                $numero = 1;

                @endphp
                    <table class="table container table-bordered border border-2 border-dark">
                        <thead>
                            <tr>
                                <td colspan="4" class="justify-content-center align-middle table-dark  fs-5">
                                {{$mespedido}} {{$anio}} - {{$categoriaTitulo->nombre}}
                                </td>                     
                            </tr>
                            <tr>
                                <th class="align-middle">#</th>
                                <th class="align-middle">Peso</th>
                                <th class="align-middle">Fecha</th>
                            </tr>
                        </thead>
                @endif
                    <tbody>        
                        <tr>
                            <td>{{ $numero }}</td>@php $numero++; @endphp
                            <td>{{ $residuo->peso }}</td>
                            <td>{{ $residuo->fecha }}

                                {{ Form::model($pesosMesCategoria, [ 'method' => 'delete' , 'route' => ['residuos.destroy', $residuo->id] ]) }}
                                    @csrf
                                    <a href="{{ route('residuos.edit', ['residuo' => $residuo->id ]) }}" class="btn btn-primary"><img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar"></a>
                                    <button type="submit" name="borrar{{ $residuo->peso }}" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la carga?')) return false;"><img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar"></button>
                                {!!Form::close()!!}
                            </td>
                            
                        </tr>
                @if($loop->last)
                        
                        </tbody>  
                    </table>
                    {!! $pesosMesCategoria->links() !!}
                @endif
                
                @empty
                <table class="table container">
                    
                    <tr>
                        <td class="align-middle  text-center">No hay nada cargado</td>
                    </tr>
                </table>
                
                @endforelse
                <div class="col text-center mt-3">
                    <a class="btn btn-success center" href="{{ route('show_anio', $anio) }}">Volver</a>  
                </div>
               
            </div>
        </div>
    </div>
</div> 
@endsection