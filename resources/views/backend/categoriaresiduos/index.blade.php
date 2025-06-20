@extends('backend.layouts.main')
@section('title', 'Categoria de Residuos')
@section('content')
<div class="container mt-3">

    @if(session('deleted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('deleted')}}
        </div>
    @endif
    @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
    @endif
    <div class="row justify-content-center align-middle">
        <div class="col-6">
            @forelse($categoriasResiduo as $residuo)
            @if($loop->first)
            @php
                $numero = 1;
            @endphp
            <table class="table container table-bordered border border-2 border-dark">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="2" class="justify-content-center align-middle table-dark">Categorias</th>
                        <th  class="justify-content-center align-middle table-dark">
                            <a class="btn btn-success " href="{{ route('categoriaresiduos.create') }}">
                                <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
                                Crear
                            </a>
                        </th>
                        <tr>
                            <th class="align-middle">#</th>
                            <th class="align-middle">Nombre</th>
                            <th class="align-middle">Opciones</th> 
                        </tr>
                    </tr>
                </thead>
                @endif
                <tbody>
                    <tr>
                        <td>{{ $numero }}</td>@php $numero++; @endphp
                        <td>{{ $residuo->nombre }}</td>
                        <td>
                        {{ Form::model($categoriasResiduo, [ 'method' => 'delete' , 'route' => ['categoriaresiduos.destroy', $residuo->id] ]) }}
                        @csrf
                        <a href="{{ route('categoriaresiduos.edit', ['categoriaresiduo' => $residuo->id ]) }}" class="btn btn-primary m-1"><img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar"></a>
                        <button type="submit" name="borrar{{ $residuo->id }}" class="btn btn-danger m-1" onclick="if (!confirm('Está seguro de borrar la categoria?')) return false;"><img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar"></button>
                        {!!Form::close()!!}
                        </td>
                    </tr>
                </tbody>  
            @if($loop->last)
            </table>

            <div class="d-flex justify-content-center align-middle m-3">
                <div class="d-flex justify-content-end align-middle">
                    <a class="btn btn-success" href="{{ route('residuos.index') }}">
                    Volver</a>
                </div>
            </div>
        </div>
    </div>
    {!! $categoriasResiduo->links() !!}
    @endif
    @empty
    <p class="align-middle fs-4">
        No hay turnos categorias de residuos creados. Para crear haga click aqui 
        <a class="btn btn-success" href="{{ route('categoriaresiduos.create') }}">
            <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
            Crear Categoria
        </a>
    </p>
    
    @endforelse
</div>
@endsection
