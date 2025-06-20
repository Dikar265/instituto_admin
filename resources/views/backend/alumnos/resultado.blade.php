<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Gestion De Alumno</title>
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-dark bg-dark d-flex justify-content-center ">
  <a class="navbar-brand mb-100 text-center h1" style="font-size:300%">
                                                               Gestion Del Alumno  <img src="https://cdn-icons-png.flaticon.com/512/8920/8920475.png" width="100" height="100" style="filter: invert(100%)"alt="">
  </a>
  </nav>
        
        <div class="row">
            <div class="col-lg-15">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <th>Opciones</th>
                        <th>Opciones2</th>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nacionalidad</th>
                        <th>Sexo</th>
                        <th>E-mail</th>
                        <th>Ciudad</th>
                        <th>Domicilio</th>
                        <th>FotocopiaDNI</th>
                        <th>Fot.Del Tit/Sec.Polimodal</th>
                        <th>Cert.Secundario</th>
                        <th>Foto</th>
                        <th>Part.Nacimiento</th>
                        <th></th>

                        
                    </thead>
                    <tbody>
                 

                @if ($alumno)
                    <td>
                        {{ Form::model($alumno, [ 'method' => 'get' , 'route' => ['legajo', 'id' => $alumno->id],  'files' => true]) }}
    @csrf
 <button type="submit" href="{{route('legajo',$alumno->id)}}" class="btn btn-success btn-block container-fluid p-55">{{__('Guardar Legajo')}}</button>
</div>
{!!Form::close()!!}
                    
                    </td>
                                        <td>
                        {{ Form::model($alumno, [ 'method' => 'get' , 'route' => ['solic', 'id' => $alumno->id],  'files' => true]) }}
    @csrf
  <button type="submit" href="{{route('solic',$alumno->id)}}" class="btn btn-success btn-block container-fluid p-55">{{__('Guardar Inscripcion')}}</button>
</div>
{!!Form::close()!!}
                    
                    </td>
{{ Form::model($alumno, [ 'method' => 'post' , 'route' => ['alumnos.documentacion', ["id" => $alumno->id]],  'files' => true]) }}
@csrf


                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->dni }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>{{ $alumno->nacionalidad }}</td>
                    <td>{{ $alumno->sexo }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->ciudad }}</td>
                    <td>{{ $alumno->domicilio }}</td>
                    <td style="text-align:center;"><input name="fotoc_dni_ok" type="checkbox"/></td>
                    <td style="text-align:center;"><input name="fotoc_titulo_ok" type="checkbox"/></td>
                    <td style="text-align:center;"><input name="certificado_sec_ok"  type="checkbox"/></td>
                    <td style="text-align:center;"><input name="foto_ok"  type="checkbox"/></td>
                    <td style="text-align:center;"><input name="partida_nac_ok"  type="checkbox"/></td>
                    <td style="text-align:center;"><button type="submit" class="btn btn-success">{{ __('Enviar') }}</button></td>

                    {!!Form::close()!!}
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>
                    @else
                    <tr>
                    <td colspan="18">No se encontro el DNI</td>
                    </tr>
                    @endif
</html>