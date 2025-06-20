@extends('backend.layouts.main')
@section('title', 'Inscripciones')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('registro.actualizar', $registro->id) }}"
        id="form-update" class="container-fluid d-flex"
        style="display: flex; justify-content: space-around; align-items:flex-start">

        @method('PUT')
        @csrf

        <style>
            .article {
                margin: 5px;
                padding: 0px;
                border: 2px solid rgba(175, 175, 175, 0.514);
                border-radius: 10px;
            }

            h4 {
                margin-left: 5px;
                margin-top: 5px;
                font-weight: bold;
            }

            label {
                font-weight: 600;
            }

            .switches {
                font-weight: 100;
                margin: 0;
                padding: 0;
            }

            .comunacho {
                max-height: fit-content;
            }
        </style>

        <div class="d-flex" style="flex-direction: column;">
            @if (session('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Alerta:</strong> Cambios realizados exitosamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-3">
                    <h2 class="">Editar registro</h2>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success form-control mt-1">Guardar</button>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('ir_admin', $registro->dni) }}" class="btn btn-secondary mt-1 mr-1">Volver</a>
                </div>
            </div>

            <div class="row">
                <div class="comunacho" style="width:49%">
                    <div class="article">

                        <div class="container-fluid d-flex justify-content-center"
                            style="height: 200px ;border-radius: 0px; display:flex; justify-content: center;  background:#ffffff">
                            <img src="{{ url('foto/' . $registro->foto) }}" style="width: auto " draggable="false"
                                id="imgPreview">
                        </div>
                        {{--  <label class="custom-file-upload">  --}}
                        <input type="file" id="foto_aspirante" class="btn btn-secondary form-control"
                            name="foto_aspirante" onchange="previewImage(event, '#imgPreview')">
                        {{--  </label>  --}}
                        <div class="py-2">
                            <div style="border: none; border-top: 2px solid #c9c9c9; ">
                                <div class="form-floating ">

                                    <select class="form-select form-select-sm  btn-danger" style="cursor: pointer"
                                        id="carrera_a_estudiar" name="carrera_elegida_aspirante">

                                        @foreach ($carreras as $carrera)
                                            <option value="{{ $carrera->id }}"
                                                {{ $registro->carrera_id == $carrera->id ? 'selected' : '' }}>
                                                {{ $carrera->descripcion }}
                                                {{ $registro->carrera_id == $carrera->id ? '(original)' : '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for=""
                                        style="font-size: 1.1em; padding-left: 6px; color:#fff; opacity: 100;">Carrrera
                                        elegida del instituto</label>
                                </div>

                            </div>

                            <h4 style="margin-top: 5px">Datos personales</h4>

                            <div class="row">

                                <div class="mx-1 col-5">
                                    <label for="">Apellido</label><br>
                                    <input required type="text" class="form-control" name="apellido_aspirante"
                                        value="{{ $registro->apellido }}">
                                </div>

                                <div class="mx-1 col-6">
                                    <label for="">Nombres</label><br>
                                    <input required type="text" class="form-control" name="nombre_aspirante"
                                        value="{{ $registro->nombre }}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="mx-1 col-5">
                                    <label for="">Sexo</label><br>
                                    <input required type="text" class="form-control" name="sexo_aspirante"
                                        value="{{ $registro->sexo }}">
                                </div>
                                <div class="mx-1 col-6">
                                    <label for="estado-civil"> Estado civil</label>
                                    <input required type="text" class="form-control" name="estado_civil_aspirante"
                                        value="{{ $registro->est_civil }}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-5 mx-1">
                                    <label for="">DNI</label><br>
                                    <input required type="text" class="form-control numeric-input" name="dni_aspirante"
                                        value="{{ $registro->dni }}">
                                </div>
                                <div class="col-6 mx-1">
                                    <label for="">CUIL</label><br>
                                    <input required type="text" class="form-control numeric-input" name="cuil_aspirante"
                                        value="{{ $registro->cuil }}">
                                </div>
                            </div>


                        </div>
                        <div style="border: none; border-top: 2px solid #c9c9c9; border-radius: 0px; margin-bottom:10px;">
                            <h4 class=" mt-2">Datos de nacimiento</h4>

                            <div class="row">
                                <div class="mx-1 col-5">
                                    <label for="">Fecha nacimiento</label><br>
                                    <input required type="date" class="form-control" name="fecha_nac_aspirante"
                                        value="{{ $registro->fec_nac }}">
                                </div>
                                <div class="mx-1 col-6">
                                    <label for="estado-civil">País</label>
                                    <input required type="text" class="form-control" name="pais_nac_aspirante"
                                        value="{{ $registro->nacionalidad }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-1 col-11">
                                    <label for="">Ciudad</label><br>
                                    <input required type="text" class="form-control" name="ciudad_nac_aspirante"
                                        value="{{ $registro->ciudad }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-1 col-11">
                                    <label for="">Provincia</label><br>
                                    <input required type="text" class="form-control" name="prov_nac_aspirante"
                                        value="{{ $registro->provincia }}">
                                </div>


                            </div>
                        </div>


                    </div>

                </div>

                <div class="article comunacho" style="width:49%;">

                    <div class="">

                        <div class="mb-3">
                            <h4>Datos de residencia</h4>

                            <div class="row">
                                <div class="mx-1 col-6">
                                    <label for="">Calle</label><br>
                                    <input required type="text" class="form-control" name="domicilio_aspirante"
                                        value="{{ $registro->domicilio }}">
                                </div>
                                <div class="mx-1 col-3">
                                    <label for="">Nro.</label><br>
                                    <input type="text" class="form-control" name="numero"
                                        value="{{ $registro->numero }}">
                                </div>
                                <div class="mx-1 col-2">
                                    <label for="">Piso</label><br>
                                    <input type="text" class="form-control" name="piso"
                                        value="{{ $registro->piso }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-1 col-3">
                                    <label for="">Depto</label><br>
                                    <input type="text" class="form-control" name="depto"
                                        value="{{ $registro->depto }}">
                                </div>
                                <div class="mx-1 col-8">
                                    <label for="">Barrio</label><br>
                                    <input type="text" class="form-control" name="barrio_aspirante"
                                        value="{{ $registro->barrio }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-1 col-11">
                                    <label for="ciudad">Ciudad </label>
                                    <input required type="text" class="form-control" name="ciudad_aspirante"
                                        value="{{ $registro->ciudad }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-1 col-11">
                                    <label for="partido">Partido </label>
                                    <input required type="text" class="form-control" name="partido"
                                        value="{{ $registro->partido }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mx-1 col-7">
                                    <label for="">Provincia</label><br>
                                    <input required type="text" class="form-control" name="provincia_aspirante"
                                        value="{{ $registro->provincia }}">
                                </div>

                                <div class="mx-1 col-4">
                                    <label for="">Código Postal</label><br>
                                    <input required type="text" class="form-control numeric-input"
                                        name="cod_post_ciud_aspirante" value="{{ $registro->cod_postal }}">
                                </div>
                            </div>
                        </div>
                        <div style="border: none; border-top: 2px solid #c9c9c9; border-radius: 0px">
                            <div class="left ml-4 col-12 mb-3">
                                <h4>Datos de contacto</h4>

                                <div class="">
                                    <div class="mx-1">
                                        <label for="">Correo electrónico</label><br>
                                        <input required type="email" class="form-control form-control-sm"
                                            name="correo_aspirante" value="{{ $registro->email }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mx-1 col-5">
                                        <label for="">Celular</label>
                                        <input required type="text" class="form-control form-control-sm numeric-input"
                                            name="celular_aspirante" value="{{ $registro->celular }}">
                                    </div>
                                    <div class="mx-1 col-5">
                                        <label for="">Tel fijo </label><br>
                                        <input type="text" class="form-control form-control-sm numeric-input"
                                            name="tel_fijo_aspirante" value="{{ $registro->tel_fijo }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mx-1 col-5">
                                        <label for="">Tel alternativo</label>
                                        <input type="text" class="form-control form-control-sm numeric-input"
                                            name="tel_alterno_aspirante" value="{{ $registro->tel_alternativo }}">
                                    </div>
                                    <div class="mx-1 col-6">
                                        <label for="">Pertenece a</label><br>
                                        <input type="text" class="form-control form-control-sm"
                                            name="tel_alterno_aspirante_pertenece_a"
                                            value="{{ $registro->pertenece_a }}">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div style="border: none; border-top: 2px solid #c9c9c9; border-radius: 0px">
                            <div class="left ml-4 col-12 mb-3">
                                <h4>Datos académicos</h4>

                                <div>
                                    <div class="mx-1">
                                        <label for="">Titulo secundario</label><br>
                                        <input required type="text" class="form-control form-control-sm"
                                            name="titulo_secundario" value="{{ $registro->titulo_intermedio }}">
                                    </div>

                                </div>
                                <div>
                                    <div class="mx-1">
                                        <label for="estado-civil">Escuela de egreso</label>
                                        <input required type="text" class="form-control form-control-sm"
                                            name="escuela_egreso_secundaria" value="{{ $registro->escuela_egreso }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mx-1 col-3">
                                        <label for="">Año Egreso</label><br>
                                        <input required type="text" class="form-control form-control-sm numeric-input"
                                            name="año_egreso_secundaria" value="{{ $registro->año_egreso }}">
                                    </div>
                                    <div class="mx-1 col-8">
                                        <label for="ciudad_egreso_secundaria">Ciudad</label>
                                        <input required type="text" class="form-control form-control-sm"
                                            name="ciudad_egreso_secundaria" value="{{ $registro->distrito_egreso }}">
                                    </div>
                                    <div class="mx-1 col-8">
                                        <label for="materias_adeudadas">Materias Adeudadas</label>
                                        <input required type="text" class="form-control form-control-sm"
                                            name="materias_adeudadas" value="{{ $registro->materias_adeudadas }}">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>



                </div>
                <div class="comunacho" style="width:99%; margin-bottom: 20px;">
                    <div class="left ml-4 col-12 mb-3 article">
                        <div class="row col-12">
                            <div class="left ml-4 col-6 mb-3">
                                <h4 class="">Familia y Trabajo</h4>
                                <div class="px-1 row">
                                    <div class="col-6">
                                        <label for="act">Familiares a cargo</label>
                                        <input type="text" class="form-control" name="fam_a_cargo" id="fam_a_cargo"
                                            value="{{ $registro->fam_a_cargo }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="act">Hijos</label>
                                        <input type="number" class="form-control" name="tiene_hijos" id="tiene_hijos"
                                            value="{{ $registro->fam_a_cargo }}">
                                    </div>
                                    {{--  <label for="estado-civil">Tiene familiares a cargo: </label>
                                    <div class="form-check form-switch" style="margin: 2px 0px 0px 4px">
                                        @if ($registro->fam_a_cargo == true)
                                            <input class="form-check-input" name="fam_a_cargo" type="checkbox"
                                                id="familia_a_cargo" checked>
                                            <label for="" class="switches" id="si_familia_a_cargo">SÍ
                                                (original)</label>
                                            <label for="" class="switches" id="no_familia_a_cargo"
                                                style="display: none">NO</label>
                                        @else
                                            <input class="form-check-input" name="fam_a_cargo" type="checkbox"
                                                id="familia_a_cargo">
                                            <label for="" class="switches" id="si_familia_a_cargo"
                                                style="display: none">SÍ </label>
                                            <label for="" class="switches" id="no_familia_a_cargo">NO
                                                (original)</label>
                                        @endif
                                    </div>  --}}
                                    {{--  </div>  --}}
                                    {{--  <div class="px-1 d-flex">  --}}
                                    {{--  <label for="estado-civil">Tiene hijos: </label>
                                    <div class="form-check form-switch" style="margin: 2px 0px 0px 4px">
                                        @if ($registro->hijos == true)
                                            <input class="form-check-input" name="tiene_hijos" type="checkbox"
                                                id="tiene_hijos" checked>
                                            <label for="" class="switches" id="si_tiene_hijos">SÍ
                                                (original)</label>
                                            <label for="" class="switches" id="no_tiene_hijos"
                                                style="display: none">NO</label>
                                        @else
                                            <input class="form-check-input" name="tiene_hijos" type="checkbox"
                                                id="tiene_hijos">
                                            <label for="" class="switches" id="si_tiene_hijos"
                                                style="display: none">SÍ </label>
                                            <label for="" class="switches" id="no_tiene_hijos">NO
                                                (original)</label>
                                        @endif
                                    </div>  --}}
                                </div>

                                <div class="px-1 row ">
                                    <div class="col-12">
                                        <label for="act">Obra Social</label>
                                        <input type="text" class="form-control" name="obra_social" id="obra_social"
                                            value="{{ $registro->obra_social }}">
                                    </div>
                                    {{--  <label for="estado-civil">Obra social: </label>
                                    <div class="form-check form-switch" style="margin: 2px 0px 0px 4px">
                                        @if ($registro->obra_social == true)
                                            <input class="form-check-input" name="obra_social" type="checkbox"
                                                id="obraSocial" checked>
                                            <label for="" class="switches" id="si_obraSocial">SÍ
                                                (original)</label>
                                            <label for="" class="switches" id="no_obraSocial"
                                                style="display: none">NO</label>
                                        @else
                                            <input class="form-check-input" name="obra_social" type="checkbox"
                                                id="obraSocial">
                                            <label for="" class="switches" id="si_obraSocial"
                                                style="display: none">SÍ </label>
                                            <label for="" class="switches" id="no_obraSocial">NO
                                                (original)</label>
                                        @endif
                                    </div>  --}}
                                </div>
                            </div>
                            <div class="right ml-4 col-6 mb-3">
                                <div class="mx-1 d-flex">

                                    <label for="estado-civil">Trabaja? </label>
                                    <div class="form-check form-switch" style="margin: 2px 0px 0px 4px;  ">
                                        @if ($registro->trabaja == true)
                                            <input class="form-check-input" name="trabaja" type="checkbox"
                                                id="trabaja" checked>
                                            <label for="" class="switches" class="switches" id="si_trabaja">SÍ
                                                (original)</label>
                                            <label for="" class="switches" id="no_trabaja"
                                                style="display: none">NO</label>
                                        @else
                                            <input class="form-check-input" name="trabaja" type="checkbox"
                                                id="trabaja">
                                            <label for="" class="switches" id="si_trabaja"
                                                style="display: none">SÍ
                                            </label>
                                            <label for="" class="switches" id="no_trabaja">NO
                                                (original)</label>
                                        @endif
                                    </div>


                                </div>

                                @if ($registro->trabaja == true)
                                    <div id="horarios_trabajo" class="mx-1" style="display: block">
                                        <div>
                                            <label for="act">Actividad en el trabajo</label>
                                            <input type="text" class="form-control" name="rol_trabajo" id="act"
                                                value="{{ $registro->actividad_trabajo }}">
                                        </div>
                                        <div class="">
                                            <label for="act">Horarios de trabajo</label>
                                            <textarea name="horarios" class="mb-2 form-control form-control-sm" id="descripcion_carr"
                                                placeholder='Detallá los horarios de trabajo. Si son horarios fijos, basta con ingresar "De (horario de entrada) a (horario de salida)". (Por Ejemplo: de 8 a 16hs)'
                                                style="height:75px">{{ $registro->horario_trabajo }}</textarea>
                                        </div>
                                    </div>
                                @else
                                    <div id="horarios_trabajo" class="mx-1" style="display: none">
                                        <div id="horarios_trabajo" class="mx-1">
                                            <div>
                                                <label for="act">Actividad en el trabajo</label>
                                                <input type="text" class="form-control" name="rol_trabajo"
                                                    id="act">
                                            </div>
                                            <div class="">
                                                <label for="act">Horarios de trabajo</label>
                                                <textarea name="horarios" class="mb-2 form-control form-control-sm" id="descripcion_carr"
                                                    placeholder='Detallá los horarios de trabajo. Si son horarios fijos, basta con ingresar "De (horario de entrada) a (horario de salida)". (Por Ejemplo: de 8 a 16hs)'
                                                    style="height:75px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>

                    <div class="article row col-12">
                        <div class="col-6">


                            {{--  <h2 class="accordion-header">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    ESTUDIOS ADICIONALES
                                </button>
                            </h2>  --}}
                            {{--  <div id="flush-collapseThree" data-bs-parent="#accordionFlushExample">  --}}

                            <div class="left ml-4 col-12 mb-3">
                                <h4 class="mt-1 p-1">Estudios Adicionales (1)</h4>

                                <div>
                                    <div class="mx-1">
                                        <label for="">Título</label><br>
                                        <input type="text" class="form-control form-control-sm"
                                            name="titulo_otro_estudio1" value="{{ $registro->otro_estudio }}">
                                    </div>

                                </div>
                                <div>
                                    <div class="mx-1">
                                        <label for="estado-civil">Instituto de egreso</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="instituto_otro_estudio1" value="{{ $registro->otro_estudio_inst }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mx-1 col-3">
                                        <label for="">Año Egreso</label><br>
                                        <input type="text" class="form-control form-control-sm numeric-input"
                                            name="año_egreso_otro_estudio1" value="{{ $registro->otro_estudio_egreso }}">
                                    </div>
                                    <div class="mx-1 col-8">
                                        <label for="estado-civil">Ciudad</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name=" ciudad_egreso_otro_estudio1"
                                            value="{{ $registro->otro_estudio_egreso_dist }}">
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="right ml-4 col-6 mb-3" style="margin-bottom:10px;">
                            <div class="left ml-4  mb-3">
                                <h4 class="mt-1 p-1">Estudios Adicionales (2)</h4>

                                <div>
                                    <div class="mx-1">
                                        <label for="">Título</label><br>
                                        <input type="text" class="form-control form-control-sm"
                                            name="titulo_otro_estudio2" value="{{ $registro->otro_estudio2 }}">
                                    </div>

                                </div>
                                <div>
                                    <div class="mx-1">
                                        <label for="estado-civil">Instituto de egreso</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="instituto_otro_estudio2" value="{{ $registro->otro_estudio_inst2 }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mx-1 col-3">
                                        <label for="">Año Egreso</label><br>
                                        <input type="text" class="form-control form-control-sm numeric-input"
                                            name="año_egreso_otro_estudio2"
                                            value="{{ $registro->otro_estudio_egreso2 }}">
                                    </div>
                                    <div class="mx-1 col-8">
                                        <label for="estado-civil">Ciudad</label>
                                        <input type="text" class="form-control form-control-sm "
                                            name="ciudad_egreso_otro_estudio2"
                                            value="{{ $registro->otro_estudio_egreso_dist2 }}">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>



        </div>
    </form>

    </div>

    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        var numericInputs = document.querySelectorAll('.numeric-input');
        numericInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
        $(document).ready(function() {
            // Después de recibir una respuesta exitosa del servidor
            $.ajax({
                success: function(response) {
                    if (response.message) {
                        $('#myModal').modal('show'); // Muestra el modal
                    }
                }
            });
            // Después de recibir la respuesta del controlador
            $("#obraSocial").change(function() {
                if (this.checked) {
                    $("#si_obraSocial").show();
                    $("#no_obraSocial").hide();
                } else {

                    $("#no_obraSocial").show();
                    $("#si_obraSocial").hide();
                }
            });

            $("#trabaja").change(function() {
                if (this.checked) {
                    $("#si_trabaja").show();
                    $("#horarios_trabajo").show();
                    $("#no_trabaja").hide();

                } else {
                    $("#no_trabaja").show();
                    $("#si_trabaja").hide();
                    $("#horarios_trabajo").hide();
                }
            });
            $("#familia_a_cargo").change(function() {
                if (this.checked) {
                    $("#si_familia_a_cargo").show();
                    $("#no_familia_a_cargo").hide();
                } else {
                    $("#si_familia_a_cargo").hide();
                    $("#no_familia_a_cargo").show();
                }
            });

            $("#tiene_hijos").change(function() {
                if (this.checked) {
                    $("#si_tiene_hijos").show();
                    $("#no_tiene_hijos").hide();
                } else {
                    $("#si_tiene_hijos").hide();
                    $("#no_tiene_hijos").show();
                }
            });
        });

        function previewImage(event, querySelector) {

            //Recuperamos el input que desencadeno la acción
            const input = event.target;

            //Recuperamos la etiqueta img donde cargaremos la imagen
            $imgPreview = document.querySelector(querySelector);

            // Verificamos si existe una imagen seleccionada
            if (!input.files.length) return

            //Recuperamos el archivo subido
            file = input.files[0];

            //Creamos la url
            objectURL = URL.createObjectURL(file);

            //Modificamos el atributo src de la etiqueta img
            $imgPreview.src = objectURL;

        }
    </script>
@endsection
