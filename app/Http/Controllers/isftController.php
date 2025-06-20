<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;
use App\Models\Asignatura;
use App\Models\Registro;
use App\Models\Prueba;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App;
use Illuminate\Support\Arr;
use App\Models\Turno;
use App\Models\Cupo;
use DataTables;
use App\Models\ConcatenatedData;
use Auth;

class isftController extends Controller
{
    public function index($hash)
    {
        $carreras = Carrera::all();
        $turno = Turno::where('hash', '=', $hash)->first();

        if ($turno ) {
        	$alumno = Registro::where('dni', '=', $turno->dni)->first();
        if ($alumno) {
                //app(PdfController::class)->pdfTurno($registroNuevo->dni);
                app(PdfController::class)->mailTurno($turno->dni);
                //  app(PdfController::class)->mailTurno($registroNuevo->dni);
                return app(PdfController::class)->pdfTurno($turno->hash);
        	// return "Los datos pertenecientes al DNI $turno->dni ya fueron registrados.";
        }
        else 
        {
            // $carreras = DB::select('SELECT carreras.id ,  CONCAT(carreras.descripcion, " (", carreras.resolucion, ")") AS descripcion FROM carreras where carreras.id  in (select cupos.carrera_id from cupos where reservados < cupos)');
            // $date = \Carbon\Carbon::createFromDate($turno->dia_hora);
            // if($date->format('m') == '12'){
            $carreras = DB::select('SELECT carreras.id ,  CONCAT(carreras.descripcion, " (", carreras.resolucion, ")") AS descripcion FROM carreras where carreras.id = ' . $turno->carrera_id);
            // }
            // else
            // {
            //  $carreras = DB::select('SELECT carreras.id ,  CONCAT(carreras.descripcion, " (", carreras.resolucion, ")") AS descripcion FROM carreras where carreras.id  in (select cupos.carrera_id from cupos where reservados < cupos)');            	
            // }
            //$carreras = Arr::pluck($carrerasDB, 'descripcion', 'id');
            $registros = Registro::all();
            $dni = $turno->dni;
            //   app(PdfController::class)->mailTurnoSeguir($turno->dni) ;
            $carrera_id = $turno->carrera_id;
            return view('frontend.alumnos.index', compact('carreras', 'registros', 'dni', 'carrera_id'));
        }
        }
        if (Auth::user()) {
            if ($hash = "admin" && Auth::user()->is_admin <> '') {
                $dni = "";
                $carrera_id = 0;
                $carreras = DB::select('SELECT carreras.id ,  CONCAT(carreras.descripcion, " (", carreras.resolucion, ")") AS descripcion FROM carreras ');
                // where carreras.id  in (select cupos.carrera_id from cupos where reservados < cupos)');
                //$carreras = Arr::pluck($carrerasDB, 'descripcion', 'id');
                $registros = Registro::all();
                return view('frontend.alumnos.index', compact('carreras', 'registros', 'dni', 'carrera_id'));
            }
        }

    }

    public function admin($date = 'false')
    {
        // if($request->ajax()){
        //     $registros_ajax = DB::select('select * from registros');
        //     return DataTables::of($registros_ajax)
        //             ->addColumn('action', function($registros_ajax){
        //                 $acciones = '<a href="#" class="btn btn-success btn-sm"  title="Editar"> Editar <i class="fa-solid fa-pen-to-square"></i> </a>;'
        //                 $acciones .= '<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$registro->id}}">Eliminar <i class="fa-solid fa-trash"></i></button>'
        //                 return $acciones;
        //             })
        //             ->rawColumns(['actions'])
        //             ->make(true);
        // }

        // dd($date);
        $carreras_sel = Carrera::pluck('descripcion', 'id');
        $carreras = Carrera::all();
        if ($date == 'false') {
            $dia = date('Y-m-d');
            $registros = DB::select("SELECT * from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE DATE(dia_hora) = '" . $dia . "' and turnos.dni IS NOT NULL ");
        } else if ($date == 'todos') {
            $registros = DB::select("SELECT * from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE turnos.dni IS NOT NULL ");
        } else {
            $turno = Turno::where('dni', '=', $date)->first();
            if ($turno) {
                $registros = DB::select("SELECT * from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE turnos.dni = '$date' ");
            } else {
                $dia = date('Y-m-d');
                // $dia = '2023-11-01';
                $dia = $date;
                $registros = DB::select("SELECT * from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE DATE(dia_hora) = '" . $dia . "' and turnos.dni IS NOT NULL ");
            }
        }

        return view('backend/alumnos/admin', compact('carreras', 'registros', 'carreras_sel'));
    }

    public function admin_search(Request $request)
    {
        $date = "";
        $fecha = "";
        $carrera_id = "";
        $where = "";

        $carreras = Carrera::all();
        $carreras_sel = Carrera::pluck('descripcion', 'id');

        if ($request->dni) {
            $date = $request->dni;
        }
        if ($request->fecha) {
            $fecha = $request->fecha;
        }
        if ($request->carrera_id) {
            $carrera_id = $request->carrera_id;
        }
        if ($date || $fecha || $carrera_id) {
            $select = "SELECT * from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE ";
            // $turno = Turno::where('dni', '=', $date)->first();
            if ($date) {
                // $registros = DB::select("SELECT * from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE turnos.dni = '$date' ");
                $where = " turnos.dni = '$date'";
            }
            if ($carrera_id) {
                //$registros = DB::select("SELECT * from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE carrera_id = '$carrera_id' ");
                if ($where <> "") {
                    $where = $where . ' AND ';
                }
                $where = $where . " registros.carrera_id = '$carrera_id'";
            }
            if ($fecha) {
                if ($where <> "") {
                    $where = $where . ' AND ';
                }
                $where = $where . " DATE(dia_hora) = '" . $fecha . "' and turnos.dni IS NOT NULL ";
                //$registros = DB::select("SELECT * from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE DATE(dia_hora) = '" . $dia . "' and turnos.dni IS NOT NULL ");
            }
            $select = $select . $where;
            $registros = DB::select($select);
            return view('backend/alumnos/admin', compact('carreras', 'registros', 'carreras_sel'));
        } else {
            return redirect()->back(); // Redirige de vuelta a la página anterior
        }

    }


    public function check_fotoc_dni(Request $request, $id)
    {

        $registro = Registro::find($id);
        if (!$registro) {
            abort(404);
        } // ISO 1207: ESTANDAR PARA LOS PROCESOS DE CICLO DE VIDA DEL SOFTWARE (NO ESPECIFICA QUE SEA LO UNICO O LO NECESARIO)
        $entrega = $request->has('valor_booleano');
        if ($entrega) {
            $entrega_fotocopia = 1;
            $registro->fotoc_dni_ok = $entrega_fotocopia;
        } else {
            $entrega_fotocopia = 0;
            $registro->fotoc_dni_ok = $entrega_fotocopia;
        }
        $registro->save();

        return redirect()->back(); // Redirige de vuelta a la página anterior
    }
    public function check_fotoc_titulo(Request $request, $id)
    {

        $registro = Registro::find($id);
        if (!$registro) {
            abort(404);
        } // ISO 1207: ESTANDAR PARA LOS PROCESOS DE CICLO DE VIDA DEL SOFTWARE (NO ESPECIFICA QUE SEA LO UNICO O LO NECESARIO)
        $entrega2 = $request->has('valor_booleano2');
        if ($entrega2) {
            $entrega_fotocopia2 = 1;
            $registro->fotoc_titulo_ok = $entrega_fotocopia2;
        } else {
            $entrega_fotocopia2 = 0;
            $registro->fotoc_titulo_ok = $entrega_fotocopia2;
        }
        $registro->save();

        return redirect()->back(); // Redirige de vuelta a la página anterior
    }
    public function check_certif_secund(Request $request, $id)
    {
        $registro = Registro::find($id);
        if (!$registro) {
            abort(404);
        }
        $entrega3 = $request->has('valor_booleano3');
        if ($entrega3) {
            $entrega_fotocopia3 = 1;
            $registro->certificado_sec_ok = $entrega_fotocopia3;
        } else {
            $entrega_fotocopia3 = 0;
            $registro->certificado_sec_ok = $entrega_fotocopia3;
        }
        $registro->save();
        return redirect()->back(); // Redirige de vuelta a la página anterior
    }
    public function check_foto(Request $request, $id)
    {
        $registro = Registro::find($id);
        if (!$registro) {
            abort(404);
        }
        $entrega4 = $request->has('valor_booleano4');
        if ($entrega4) {
            $entrega_fotocopia4 = 1;
            $registro->foto_ok = $entrega_fotocopia4;
        } else {
            $entrega_fotocopia4 = 0;
            $registro->foto_ok = $entrega_fotocopia4;
        }
        $registro->save();
        return redirect()->back(); // Redirige de vuelta a la página anterior
    }
    public function check_part_nac(Request $request, $id)
    {

        $registro = Registro::find($id);
        if (!$registro) {
            abort(404);
        }
        $entrega5 = $request->has('valor_booleano5');
        if ($entrega5) {
            $entrega_fotocopia5 = 1;
            $registro->partida_nac_ok = $entrega_fotocopia5;
        } else {
            $entrega_fotocopia5 = 0;
            $registro->partida_nac_ok = $entrega_fotocopia5;
        }
        $registro->save();
        return redirect()->back(); // Redirige de vuelta a la página anterior
    }

    public function check_confirmado(Request $request, $id)
    {

        $registro = Registro::find($id);
        if (!$registro) {
            abort(404);
        }
        $entrega6 = $request->has('valor_booleano6');

        if ($entrega6) {
            $entrega_fotocopia6 = 1;
            $registro->confirmado = $entrega_fotocopia6;
        } else {
            $entrega_fotocopia6 = 0;
            $registro->confirmado = $entrega_fotocopia6;
        }
        $registro->save();
        return redirect()->back(); // Redirige de vuelta a la página anterior
    }

    public function prueba()
    {

        $pruebas = Prueba::all();
        return view('prueba', compact('pruebas'));
    }

    // Inscripción
    public function guardar(Request $request)
    {
        $registroNuevo = Registro::where('dni', '=', $request->dni_aspirante)->first();
        if ($registroNuevo) {

        } else {
            $registroNuevo = new Registro;
            // Datos personales[1/5]
            if ($request->hasFile('foto_aspirante')) {
                $file = $request->file('foto_aspirante');
                $carpetaDestino = storage_path('fotos');
                //$filename = $file->getClientOriginalName();
                $filename = $request->dni_aspirante . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $uploadSuccess = $request->file('foto_aspirante')->move($carpetaDestino, $filename);
                $registroNuevo->foto = $filename;
            }
            $registroNuevo->nombre = $request->nombre_aspirante;
            $registroNuevo->apellido = $request->apellido_aspirante;
            $registroNuevo->est_civil = $request->estado_civil_aspirante;
            $registroNuevo->sexo = $request->sexo_aspirante;
            $registroNuevo->dni = $request->dni_aspirante;
            $registroNuevo->cuil = $request->cuil_aspirante;

            // Datos Nacimiento [2/5]
            $registroNuevo->lug_nac = $request->ciudad_nac_aspirante;
            $registroNuevo->prov_nac = $request->prov_nac_aspirante;
            $registroNuevo->nacionalidad = $request->pais_nac_aspirante;
            $registroNuevo->fec_nac = $request->fecha_nac_aspirante;

            // Datos de residencia [3/5]
            $registroNuevo->domicilio = $request->domicilio_aspirante;
            $registroNuevo->numero = $request->domicilio_nro;
            $registroNuevo->piso = $request->domicilio_piso;
            $registroNuevo->depto = $request->domicilio_depto;
            $registroNuevo->barrio = $request->barrio_aspirante;
            $registroNuevo->ciudad = $request->ciudad_aspirante;
            $registroNuevo->partido = $request->partido_aspirante;
            $registroNuevo->provincia = $request->provincia_aspirante;
            $registroNuevo->cod_postal = $request->cod_post_ciud_aspirante;

            // Datos de contactos [4/5]
            $registroNuevo->email = $request->correo_aspirante;
            $registroNuevo->celular = $request->celular_aspirante;
            $registroNuevo->tel_fijo = $request->tel_fijo_aspirante;
            $registroNuevo->tel_alternativo = $request->tel_alterno_aspirante;
            $registroNuevo->pertenece_a = $request->tel_alterno_aspirante_pertenece_a;

            // Algunas preguntas [5/5]
            $registroNuevo->hijos = $request->aspirante_tiene_hijos;
            if ($request->fam_a_cargo_aspirante == "") {
                $request->fam_a_cargo_aspirante = 'No';
            }
            $registroNuevo->fam_a_cargo = $request->fam_a_cargo_aspirante;
            $registroNuevo->carrera_id = $request->carrera_elejida_aspirante;

            // Datos académicos [1/1]
            $registroNuevo->titulo_intermedio = $request->titulo_secundario;
            $registroNuevo->escuela_egreso = $request->escuela_egreso_secundaria;
            $registroNuevo->año_egreso = $request->año_egreso_secundaria;
            $registroNuevo->distrito_egreso = $request->ciudad_egreso_secundaria;
            $registroNuevo->materias_adeudadas = $request->materias_adeudadas;

            // Titulo opcional - 1
            $registroNuevo->otro_estudio = $request->titulo_otro_estudio1;
            $registroNuevo->otro_estudio_inst = $request->instituto_otro_estudio1;
            $registroNuevo->otro_estudio_egreso_dist = $request->ciudad_egreso_otro_estudio1;
            $registroNuevo->otro_estudio_egreso = $request->año_egreso_otro_estudio1;

            // Titulo opcional - 2
            $registroNuevo->otro_estudio2 = $request->titulo_otro_estudio2;
            $registroNuevo->otro_estudio_inst2 = $request->instituto_otro_estudio2;
            $registroNuevo->otro_estudio_egreso_dist2 = $request->ciudad_egreso_otro_estudio2;
            $registroNuevo->otro_estudio_egreso2 = $request->año_egreso_otro_estudio2;

            // Último - Datos laborales
            if ($request->aspirante_obra_social == "") {
                $request->aspirante_obra_social = 'No';
            }
            $registroNuevo->obra_social = $request->aspirante_obra_social;
            $registroNuevo->trabaja = $request->aspirante_trabaja;
            $registroNuevo->actividad_trabajo = $request->rol_trabajo;

            $turnos_rotativos = $request->input('turnos_rotativos');
            if ($turnos_rotativos === '1') {
                $registroNuevo->horario_trabajo = $request->horarios_rotativos_asp;
            } else {
                $entrada = $request->input('entrada');
                $salida = $request->input('salida');
                $horarios_fijos = 'De ' . $entrada . ' a ' . $salida . ' hs.';
                $registroNuevo->horario_trabajo = $horarios_fijos;
            }
            $registroNuevo->save();

            $turno = Turno::where('dni', '=', $registroNuevo->dni)->first();
            if ($turno) {
                //app(PdfController::class)->pdfTurno($registroNuevo->dni);
                app(PdfController::class)->mailTurno($registroNuevo->dni);
                //  app(PdfController::class)->mailTurno($registroNuevo->dni);

             $alumnos = Registro::where('dni', $registroNuevo->dni)->get();
              if (!$alumnos->isEmpty()) {
              foreach ($alumnos as $alumno) {
            //   ExcelControllerInscrip::solicitud_backup($alumno->id);
                ExcelControllerLegajo::legajo_backup($alumno->id);
               }
           }

                return app(PdfController::class)->pdfTurno($turno->hash);
            } else {
                $turno = new Turno();
                $now = date('Y-m-d H:i:s');
                $turno->dia_hora = $now;
                $turno->carrera_id = $registroNuevo->carrera_id;
                $turno->dni = $registroNuevo->dni;
                $hash = $registroNuevo->dni . $turno->dia_hora;
                $turno->hash = md5($hash);
                $turno->save();

             $alumnos = Registro::where('dni', $registroNuevo->dni)->get();
              if (!$alumnos->isEmpty()) {
              foreach ($alumnos as $alumno) {
            //   ExcelControllerInscrip::solicitud_backup($alumno->id);
                ExcelControllerLegajo::legajo_backup($alumno->id);
               }
           }
           
                return redirect()->route('ir_admin');
            }

        }

        //return back()->with('mensaje', 'Te inscribiste con éxito.');
    }

    public function mostrar_datos($id)
    {
        $registro = Registro::find($id);
        $carreras = Carrera::all();
        return view('backend/alumnos/ver_aspirante', compact('carreras'))->with('registro', $registro);
    }
    // Eliminar
    public function eliminar($id)
    {
        $registroEliminar = Registro::findOrFail($id);
        $registroEliminar->delete();
        return back()->with('mensaje2', 'Registro eliminado');
    }
    // editar
    public function editar($id)
    {
        $carreras = Carrera::all();
        $registro = Registro::findOrFail($id);

        $registro->nombre = ucwords($registro->nombre);
        $registro->apellido = ucwords($registro->apellido);
        $registro->est_civil = ucwords($registro->est_civil);
        $registro->sexo = ucwords($registro->sexo);

        // Datos Nacimiento [2/5]
        $registro->lug_nac = ucwords($registro->lug_nac);
        $registro->prov_nac = ucwords($registro->prov_nac);
        $registro->nacionalidad = ucwords($registro->nacionalidad);


        // Datos de residencia [3/5]
        $registro->domicilio = ucwords($registro->domicilio);
        $registro->barrio = ucwords($registro->barrio);
        $registro->ciudad = ucwords($registro->ciudad);
        $registro->partido = ucwords($registro->partido);
        $registro->provincia = ucwords($registro->provincia);
        $registro->obra_social = ucwords($registro->obra_social);

        // Datos de contactos [4/5]
        $registro->pertenece_a = ucwords($registro->pertenece_a);


        // Datos académicos [1/1]
        $registro->titulo_intermedio = ucwords($registro->titulo_intermedio);
        $registro->escuela_egreso = ucwords($registro->escuela_egreso);
        $registro->distrito_egreso = ucwords($registro->distrito_egreso);

        // Titulo opcional - 1
        $registro->otro_estudio = ucwords($registro->otro_estudio);
        $registro->otro_estudio_inst = ucwords($registro->otro_estudio_inst);
        $registro->otro_estudio_egreso_dist = ucwords($registro->otro_estudio_egreso_dist);

        // Titulo opcional - 2
        $registro->otro_estudio2 = ucwords($registro->otro_estudio2);
        $registro->otro_estudio_inst2 = ucwords($registro->otro_estudio_inst2);
        $registro->otro_estudio_egreso_dist2 = ucwords($registro->otro_estudio_egreso_dist2);
        $registro->otro_estudio_egreso2 = ucwords($registro->otro_estudio_egreso2);


        return view('backend/alumnos/editar_aspirante', compact('registro', 'carreras'));

        // $registro = TuModelo::find($id);
        $opcionesSelect = ['opcion1', 'opcion2', 'opcion3']; // Aquí debes obtener las opciones disponibles desde tu base de datos
        return view('tu_vista_de_edicion', compact('registro', 'opcionesSelect'));


    }

    public function update(Request $request, $id)
    {

        // Datos Nacimiento [1/5]
        $registro = Registro::findOrFail($id);
        // dd($request);
        if ($request->hasFile('foto_aspirante')) {
            $file = $request->file('foto_aspirante');
            $carpetaDestino = storage_path('fotos');
            $filename = $request->dni_aspirante . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $uploadSuccess = $request->file('foto_aspirante')->move($carpetaDestino, $filename);
            $registro->foto = $filename;
        }
        $registro->nombre = $request->nombre_aspirante;
        $registro->apellido = $request->apellido_aspirante;
        $registro->est_civil = $request->estado_civil_aspirante;
        $registro->sexo = $request->sexo_aspirante;
        $registro->dni = $request->dni_aspirante;
        $registro->cuil = $request->cuil_aspirante;

        // Datos Nacimiento [2/5]
        $registro->lug_nac = $request->ciudad_nac_aspirante;
        $registro->prov_nac = $request->prov_nac_aspirante;
        $registro->nacionalidad = $request->pais_nac_aspirante;
        $registro->fec_nac = $request->fecha_nac_aspirante;

        // Datos de residencia [3/5]
        $registro->domicilio = $request->domicilio_aspirante;
        $registro->numero = $request->numero;
        $registro->piso = $request->piso;
        $registro->depto = $request->depto;
        $registro->barrio = $request->barrio_aspirante;
        $registro->ciudad = $request->ciudad_aspirante;
        $registro->partido = $request->partido;
        $registro->provincia = $request->provincia_aspirante;
        $registro->obra_social = $request->obra_social;
        $registro->cod_postal = $request->cod_post_ciud_aspirante;

        // Datos de contactos [4/5]
        $registro->email = $request->correo_aspirante;
        $registro->celular = $request->celular_aspirante;
        $registro->tel_fijo = $request->tel_fijo_aspirante;
        $registro->tel_alternativo = $request->tel_alterno_aspirante;
        $registro->pertenece_a = $request->tel_alterno_aspirante_pertenece_a;


        // Datos académicos [1/1]
        $registro->titulo_intermedio = $request->titulo_secundario;
        $registro->escuela_egreso = $request->escuela_egreso_secundaria;
        $registro->año_egreso = $request->año_egreso_secundaria;
        $registro->distrito_egreso = $request->ciudad_egreso_secundaria;
        $registro->carrera_id = $request->carrera_elegida_aspirante;
        $registro->materias_adeudadas = $request->materias_adeudadas;

        // Titulo opcional - 1
        $registro->otro_estudio = $request->titulo_otro_estudio1;
        $registro->otro_estudio_inst = $request->instituto_otro_estudio1;
        $registro->otro_estudio_egreso_dist = $request->ciudad_egreso_otro_estudio1;
        $registro->otro_estudio_egreso = $request->año_egreso_otro_estudio1;

        // Titulo opcional - 2
        $registro->otro_estudio2 = $request->titulo_otro_estudio2;
        $registro->otro_estudio_inst2 = $request->instituto_otro_estudio2;
        $registro->otro_estudio_egreso_dist2 = $request->ciudad_egreso_otro_estudio2;
        $registro->otro_estudio_egreso2 = $request->año_egreso_otro_estudio2;
        // Preguntas
        // $tiene_fam_cargo = $request->has('fam_a_cargo');
        // if ($tiene_fam_cargo) {
        //     $fam_cargo = 1;
        //     $registro->fam_a_cargo = $fam_cargo;
        // } else {
        //     $fam_cargo = 0;
        //     $registro->fam_a_cargo = $fam_cargo;
        // }
        $registro->fam_a_cargo = $request->fam_a_cargo;

        // $tiene_hijos_update = $request->has('tiene_hijos');
        // if ($tiene_hijos_update) {
        //     $hijos = 1;
        //     $registro->hijos = $hijos;
        // } else {
        //     $hijos = 0;
        //     $registro->hijos = $hijos;
        // }
        $registro->hijos = $request->tiene_hijos;

        // $tiene_obra_social = $request->has('obra_social');
        // if ($tiene_obra_social) {
        //     $obraSocial = 1;
        //     $registro->obra_social = $obraSocial;
        // } else {
        //     $obraSocial = 0;
        //     $registro->obra_social = $obraSocial;
        // }
        $registro->obra_social = $request->obra_social;

        $trabaja_update = $request->has('trabaja');
        if ($trabaja_update) {
            $trabaja = 1;
            $registro->trabaja = $trabaja;
            $registro->actividad_trabajo = $request->rol_trabajo;
            $registro->horario_trabajo = $request->horarios;

        } else {
            $trabaja = 0;
            $rol = '';
            $horarios = '';
            $registro->trabaja = $trabaja;
            $registro->actividad_trabajo = $rol;
            $registro->horario_trabajo = $horarios;
        }
        $registro->save();

        return back()->with('mensaje', 'registro actualizado');
    }

    // Crear carrera
    public function cargar_carrera(Request $request)
    {
        $carreraNueva = new Carrera;
        $carreraNueva->carrera = $request->carrera;
        $carreraNueva->años_duracion = $request->anios_duracion;
        $carreraNueva->resolucion = $request->resolucion;
        $carreraNueva->descripcion = $request->descripcion;
        $carreraNueva->save();
        return back()->with('mensaje', 'Carrera Agregada');
    }
    // Crear asignatura
    public function cargar_asignatura(Request $request)
    {
        $asignaturaNueva = new Asignatura;
        $asignaturaNueva->id_carrera = $request->id_carrera;
        $asignaturaNueva->asignatura = $request->asignatura;
        $asignaturaNueva->año = $request->año;
        $asignaturaNueva->save();
        return back()->with('mensaje_asignatura', 'Nueva Asignatura');
    }
}