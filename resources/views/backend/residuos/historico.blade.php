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

<!-- -------------------- Historico / Una tabla por cada año ------------------------- -->
    <div class="row justify-content-center align-middle">
       
        <div class="col-8">
            @if(sizeof($pesosAnio) == 0)
                <table class="table container"> 
                    <tr>
                        <td class="align-middle">No hay nada cargado</td>
                    </tr>
                </table>
            @else      
                          
                @for($i = 0 ; $i < sizeof($pesosAnio) ; $i++)
                    @php
                        $numero = 1;
                    @endphp
                    @if($i % 2 == 0)<div class="row">@endif
                        <div class="col-md-6">
                            <table class="table container table-bordered border border-2 border-dark">
                                <thead>
                                    <tr>
                                        <td colspan="2" class="justify-content-center align-middle fs-5 table-dark">
                                        Año {{$pesosAnio[$i][0]->anio}} 
                                        </td>
                                        <td colspan="1" class="justify-content-center align-middle table-dark">
                                            <a href="{{ route('show_anio', $pesosAnio[$i][0]->anio) }}" class="btn btn-success"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="align-middle">#</th>
                                        <th class="align-middle">Nombre</th>
                                        <th class="align-middle">Peso</th>
                                        
                                    </tr>
                                </thead>
                        @for($j = 0 ; $j < sizeof($pesosAnio[$i]) ; $j++)
                                <tbody>        
                                    <tr>
                                        <td>{{ $numero }}</td>@php $numero++; @endphp
                                        <td>{{ $pesosAnio[$i][$j]->nombre }}</td>
                                        <td>{{ $pesosAnio[$i][$j]->peso }}</td>
                                    </tr>
                                </tbody> 
                                
                        @endfor
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{$totalAnio[$i][0]->peso}}</td>
                            </tr>
                            </table>
                        </div>
                    @if($i % 2 != 0)</div><hr>@endif
                @endfor

            @endif
            
        </div> 
        <div class="d-flex justify-content-center align-middle">
            <div class="d-flex justify-content-end align-middle">
                <a class="btn btn-success m-1" href="{{ route('residuos.index') }}">Volver</a>
            </div>
        </div>
    </div>

</div>
@endsection