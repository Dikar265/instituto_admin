@extends('backend.layouts.main')
@section('title', 'Residuos')
@section('content')

    <style>
        a{
            text-decoration: none;
            color: black;
        }
        td.resaltar a:hover{
            text-decoration: none;
            color: black;
            font-weight: 1000;
        }
    </style>

    <div class="container mt-3">
    @forelse($pesosAnioMeses as $residuo)
            
            @if($loop->first)
            @php
            $numero = 1;
           
            @endphp
                <table  class="table container table-bordered border border-2 border-dark ">
                    <thead>
                        <tr>
                            <td colspan="14" class="justify-content-around align-center text-center fs-5 table-dark ">
                                {{$anio}}
                            </td>     
                        </tr>
                        
                        <tr>
                            <th class="align-middle">#</th>
                            <th class="align-middle">Nombre</th>
                            <th class="align-middle">Ene</th>
                            <th class="align-middle">Feb</th>
                            <th class="align-middle">Mar</th>
                            <th class="align-middle">Abr</th>
                            <th class="align-middle">May</th>
                            <th class="align-middle">Jun</th>
                            <th class="align-middle">Jul</th>
                            <th class="align-middle">Ago</th>
                            <th class="align-middle">Sep</th>
                            <th class="align-middle">Oct</th>
                            <th class="align-middle">Nov</th>
                            <th class="align-middle">Dic</th>
                            
                        </tr>
                    </thead>
            @endif
                <tbody>        
                    <tr>
                        <td>{{ $numero }}</td>@php $numero++; @endphp
                        <td>{{ $residuo->nombre }}</td>
                       
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 1 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Ene }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 2 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Feb }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 3 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Mar }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 4 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Abr }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 5 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->May }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 6 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Jun }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 7 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Jul }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 8 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Ago }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 9 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Sep }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 10 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Oct }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 11 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Nov }}</a></span></td>
                        <td class="resaltar"><a href="{{ route('show_mes_categoria', ['mes' => 12 , 'anio' => $anio , 'categoria' => $residuo->id]) }}">{{ $residuo->Dic }}</a></span></td>

                        
                    </tr>
            @if($loop->last)
                       
                    </tbody>  
                </table>
                {{-- {!! $pesosAnio->links() !!} --}}
            @endif
            
            @empty
            <table class="table container">
                
                <tr>
                    <td class="align-middle">No hay nada cargado</td>
                </tr>
            </table>
            
            @endforelse

            <div class="d-flex justify-content-center align-middle">
                <div class="d-flex justify-content-end align-middle">
                    <a class="btn btn-success m-1" href="{{ route('residuos.index') }}">Inicio</a>
                </div>
                <div class="d-flex justify-content-end align-middle">
                    <a class="btn btn-success m-1" href="{{ route('historico') }}">
                    <img src="{{ asset('svg/historia.svg') }}" width="20" height="20" alt="Ver" title="Ver">
                    Histórico</a>
                </div> 
            </div>
        </div>
    </div>
@endsection