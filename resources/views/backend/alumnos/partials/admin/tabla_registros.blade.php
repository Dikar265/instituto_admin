<div class="tabla">
    <style>
        tr td {
            text-align: center
        }
    </style>
    <table id="tabla-registros" class="table table-dark table-striped ">

        <thead>
            {{--  <td>ID</td>  --}}
            <td>N°</td> 
            <td>Día y Hora</td>
            <td>DNI</td>
            <td>Foto</td>
            <td>Nombre</td>
            <td>Apelido</td>
            <td>Carrera</td>
            <td></td>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr>
                    @php $date = new DateTime($registro->dia_hora); @endphp
                    <td> {{ $loop->index + 1}} </td>
                    <td> {{ $date->format('d-m H:i') }} </td>
                    <td> {{ $registro->dni }} </td>
                    <td> <img src="{{ url('foto/' . $registro->foto) }}" alt="Foto aspirante" width="70px" height="70px">
                    </td>
                    <td>{{ $registro->nombre }} </td>
                    <td>{{ $registro->apellido }}</td>
                    {{--  <td> {{ $registro->dni }} </td>  --}}

                    <select style="display: none" disabled class="form-select form-select-sm  btn-danger"
                        style="cursor: pointer" id="carrera_a_estudiar" name="carrera_elegida_aspirante">


                        @foreach ($carreras as $carrera)
                            <option value="{{ $carrera->id }}"
                                {{ $registro->carrera_id == $carrera->id ? 'selected' : '' }}>
                                {{ $carrera->descripcion }}
                                {{ $registro->carrera_id == $carrera->id ? ($variable = $carrera->descripcion) : '' }}
                            </option>
                        @endforeach


                    </select>
                    <td> {{ $variable }}</td>

                    <td style="width:240px">
                        {{--  <a href="{{ route('mostrarDatosAspirante', $registro->id) }} " class="btn btn-info btn-md">
                            <i class="fa-solid fa-eye"></i>
                        </a>  --}}

                        <a href="{{ route('registro.editar', $registro->id) }}" class="btn btn-primary btn-md"
                            title="Editar">

                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                         @if (Auth::user()->is_admin == 1 )
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $registro->id }}">

                            <i class="fa-solid fa-trash"></i>
                        </button>
                    @endif


                        {{-- <a href="#" id="eliminar-usuario" data-usuario-id="1" data-toggle="modal" data-target="#confirmar-modal">Eliminar Usuario</a>  --}}
                        {{-- <form action="{{ route('registro.eliminar', $registro->id) }}" class="d-inline" method="POST">
                     @method('DELETE')
                     @csrf
                       @if (Auth::user()->is_admin == 1 )
                       <button type="submit" class="btn btn-danger btn-sm"title="Eliminar">
                        Eliminar
                        <i class="fa-solid fa-trash"></i>
                     </button>
                     @endif
                  </form>  --}}



                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
</div>
{{-- 
<div class="tabla">
      <table class="table table-dark table-striped" style="width:100%;">
         <thead>
         <td>ID</td>
         <td>FOTO</td>
         <td>NOMBRES</td>
         <td>APELLIDOS</td>
         <td>DNI</td>
         <td>CELULAR</td>
         <td>CARRERA ELEGIDA</td>
         <td>ACCION</td>
         </thead>
         <tbody>
            @foreach ($registros as $registro)
               <tr>
                  <td> {{ $registro->id }} </td>
                  <td> <img src="{{url('foto/'. $registro->foto) }}" alt="Foto aspirante" width="70px" height="70px"> </td>
                  <td> {{ $registro->nombre }} </td>
                  <td> {{ $registro->apellido }} </td>
                  <td> {{ number_format($registro->dni, 0, ',', '.') }} </td>
                  <td> {{ $registro->celular }} </td>
                  <select style="display: none" disabled class="form-select form-select-sm  btn-danger" style="cursor: pointer"   id="carrera_a_estudiar" name="carrera_elegida_aspirante" >


                     @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ $registro->carrera_id == $carrera->id ? 'selected' : '' }} >
                           {{ $carrera->descripcion }}   
                           {{ $registro->carrera_id == $carrera->id ? $variable=$carrera->descripcion : '' }}
                        </option>
                     @endforeach
                     
                     
                  </select>
                  <td> {{$variable}}</td>

                  <td style="width:240px">

                     <a href="{{ route('registro.editar', $registro->id) }}" class="btn btn-success btn-sm"  title="Editar">
                        Editar
                        <i class="fa-solid fa-pen-to-square"></i>
                     </a>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$registro->id}}">
                        Eliminar
                        <i class="fa-solid fa-trash"></i>
                     </button>



                     {{-- <a href="#" id="eliminar-usuario" data-usuario-id="1" data-toggle="modal" data-target="#confirmar-modal">Eliminar Usuario</a>  --}}
{{-- <form action="{{ route('registro.eliminar', $registro->id) }}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"title="Eliminar">
                           Eliminar
                           <i class="fa-solid fa-trash"></i>
                        </button>
                     </form>  
                     <a href="{{ route('mostrarDatosAspirante', $registro->id) }} " class="btn btn-secondary btn-sm">
                        Ver <i class="fa-solid fa-eye"></i>
                     </a>

                     
                  </td>
               </tr>
            @endforeach

       </tbody>
       
    </table>
</div>  --}}
@foreach ($registros as $registro)
    <!-- Modal -->
    <div class="modal fade" id="modal{{ $registro->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmar-modal-label">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>DNI</strong>: {{ number_format($registro->dni, 0, ',', '.') }} ({{ $registro->nombre }}
                    {{ $registro->apellido }})<br>
                    ¿Estás seguro de que deseas eliminar a este usuario?


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>


                    <form action="{{ route('registro.eliminar', $registro->id) }}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"title="Eliminar">
                            Eliminar
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endforeach
