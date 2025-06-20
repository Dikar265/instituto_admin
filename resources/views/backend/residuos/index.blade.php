@extends('backend.layouts.main')
@section('title', 'Residuos')
@section('content')
<div class="container-fluid mt-3">

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

<!-- --------------------Primer tabla------------------------- -->
    <div class="row justify-content-center align-middle">
        <div class="col-3">
            @forelse($pesosMes as $residuo)
            
            @if($loop->first)
            @php
                
                $numero = 1;
                
            @endphp
                <table class="table  container table-bordered border border-2 border-dark">
                    <thead class="thead-dark">
                        <tr>
                            <td colspan="2" class="justify-content-center align-middle fs-5 table-dark">
                               mes de {{$ultimoMes}}
                            </td>
                            <td colspan="1" class="justify-content-center align-middle table-dark">
                            <a href="{{ route('show_mes', ['mes' => $mes , 'anio' => $anio]) }}" class="btn btn-success"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
                            </td>
                        </tr>
                        <tr>
                            <th class="align-middle">#</th>
                            <th class="align-middle">Nombre</th>
                            <th class="align-middle">Peso</th>
                            
                        </tr>
                    </thead>
            @endif
                <tbody>        
                    <tr>
                        <td>{{ $numero }}</td>@php $numero++; @endphp
                        <td>{{ $residuo->nombre }}</td>
                        <td>{{ $residuo->peso }}</td>
                        
                    </tr>
            @if($loop->last)
                        <tr>    
                            <td colspan="2">Total</td>
                            <td>{{$totalMes[0]->peso}}</td>
                        </tr>
                    </tbody>  
                </table>
               {{--  {!! $pesosMes->links() !!} --}}
            @endif
            @empty
            <table class="table container">
                
                <tr>
                    <td class="align-middle">No hay nada cargado</td>
                </tr>
            </table>
            
            @endforelse
        </div>
        <!-- --------------------Segunda tabla------------------------- -->
        <div class="col-3">

            @forelse($pesosAnio as $residuo)
            
                @if($loop->first)
                @php
                    $numero = 1;
                @endphp
                    <table class="table container table-bordered border border-2 border-dark">
                        <thead>
                            <tr>
                                <td colspan="2" class="justify-content-center align-middle fs-5 table-dark">
                                Año actual {{$anio}} 
                                </td>
                                <td colspan="1" class="justify-content-center align-middle table-dark">
                                    <a href="{{ route('show_anio', $anio) }}" class="btn btn-success"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">#</th>
                                <th class="align-middle">Nombre</th>
                                <th class="align-middle">Peso</th>
                                
                            </tr>
                        </thead>
                @endif
                    <tbody>        
                        <tr>
                            <td>{{ $numero }}</td>@php $numero++; @endphp
                            <td>{{ $residuo->nombre }}</td>
                            <td>{{ $residuo->peso }}</td>
                        </tr>
                            

                @if($loop->last)
                    </tbody>  
                        <tr>
                            
                            <td colspan="2">Total</td>
                            
                            <td>{{$totalAnio[0]->peso}}</td>
                        
                        </tr>
                    </table>
                @endif

                @empty
                <table class="table container">
                    
                    <tr>
                        <td class="align-middle">No hay nada cargado</td>
                    </tr>
                </table>
            @endforelse
        </div>    
        
    </div>

  <div class="d-flex justify-content-center align-middle">
    <div>
        <a class="btn btn-success m-1" href="{{ route('residuos.create') }}">
        <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
        Cargar peso</a>
    </div>

    <div class="d-flex justify-content-end align-middle">
        <a class="btn btn-primary m-1" href="{{ route('categoriaresiduos.index') }}">
        <img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Ver" title="Ver">
        Ver categorias</a>
    </div>
    <div class="d-flex justify-content-end align-middle">
        <a class="btn btn-success m-1" href="{{ route('historico') }}">
        <img src="{{ asset('svg/historia.svg') }}" width="20" height="20" alt="Ver" title="Ver">
        Histórico</a>
    </div>
    
  </div>
</div>
@endsection