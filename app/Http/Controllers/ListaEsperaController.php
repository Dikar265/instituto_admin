<?php

namespace App\Http\Controllers;

use App\Models\ListaEspera;
use App\Models\Carrera;
use App\Models\Cupo;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListaEsperaController extends Controller
{
    public function index()
    {

        // $espera = ListaEspera::orderBy('id', 'asc')->get();
        // $espera = ListaEspera::join('turnos', 'turnos.dni', '=', 'lista_espera.dni')->select('lista_espera.*', 'turnos.*')->orderBy('lista_espera.id', 'asc')->get();
        $espera = ListaEspera::select(
            'lista_espera.id',
            'lista_espera.carrera_id',
            'lista_espera.nombre',
            'lista_espera.apellido',
            'lista_espera.dni',
            'lista_espera.telefono',
            'lista_espera.tel_alternativo',
            'lista_espera.email',
            'turnos.dia_hora',
            'turnos.hash',
            'turnos.carrera_id as carrera_id_orig'
        )
            ->leftjoin('turnos', 'turnos.dni', '=', 'lista_espera.dni')
            ->orderBy('lista_espera.id', 'asc')->get();

        $carreras = Carrera::pluck('descripcion', 'id');

        return view('backend.lista_espera.index', compact('espera', 'carreras'));
    }

    public function create()
    {

        //$cupos = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->whereColumn('reservados', '<=', 'cupos')->get()->pluck('descripcion', 'carrera_id');
        $cupos = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->whereColumn('reservados', '>=', 'cupos')->get()->pluck('descripcion', 'carrera_id');
        return view('backend.lista_espera.create', compact('cupos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'carrera_id' => 'required|int',
                'nombre' => 'required|string',
                'apellido' => 'required|string',
                'dni' => 'required|int|digits:8',
                'caractel' => 'required|int|digits:3',
                'telefono' => 'required|int|digits:7',
                'caractalt' => 'nullable|int|digits:3',
                'tel_alternativo' => 'nullable|int|digits:7',
                'email' => 'required|email',
            ]
        );
        //-----Aumentar la cantidad de cupos en la tabla cupos
        $id = $request->input('carrera_id');
        $reservados = Cupo::select('id', 'reservados')->where('carrera_id', '=', $id)->get();

        foreach ($reservados as $cupos) {
            $cupoid = $cupos['id'];
            $cupoAnt = $cupos['reservados'];
        }
        $cupoNuevo = $cupoAnt + 1;

        $cupo = Cupo::findOrFail($cupoid);

        //dd($cupo);
        //-----Aumentar la cantidad de cupos en la tabla cupos

        $espera = new ListaEspera();
        $espera->carrera_id = $request->input('carrera_id');
        $espera->nombre = $request->input('nombre');
        $espera->apellido = $request->input('apellido');
        $espera->dni = $request->input('dni');
        $espera->telefono = $request->input('caractel') . $request->input('telefono');
        $espera->tel_alternativo = $request->input('caractalt') . $request->input('tel_alternativo');
        $espera->email = $request->input('email');
        $espera->save();

        $cupo->reservados = $cupoNuevo;
        //$cupo->save();
        //php artisan storage:link

        return redirect()->route('espera.create');
    }

    public function show(string $id)
    {
        //$carreras = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->whereColumn('reservados', '<=', 'cupos')->get()->pluck('descripcion', 'carrera_id');
        $carreras = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->whereColumn('reservados', '>=', 'cupos')->get()->pluck('descripcion', 'carrera_id');
        $espera = ListaEspera::findOrFail($id);
        return view('backend.lista_espera.editar', compact('espera', 'carreras'));
    }

    public function edit(string $id)
    {
        //$carreras = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->whereColumn('reservados', '<=', 'cupos')->get()->pluck('descripcion', 'carrera_id');
        // $carreras = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->whereColumn('reservados', '>=', 'cupos')->get()->pluck('descripcion', 'carrera_id');

        $espera = ListaEspera::findOrFail($id);
        $carreras = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->where('carrera_id', $espera->carrera_id)->get()->pluck('descripcion', 'carrera_id');      
        return view('backend.lista_espera.turno', compact('espera', 'carreras'));
    }

    public function update(Request $request, string $listaEspera)
    {

        $espera = ListaEspera::findOrFail($listaEspera);
        $validatedData = $request->validate(
            [
                'carrera_id' => 'required|int',
                'nombre' => 'required|string',
                'apellido' => 'required|string',
                'dni' => 'required|int|digits:8',
                'telefono' => 'required|int|digits:10',
                'tel_alternativo' => 'nullable|int|digits:10',
                'email' => 'required|email',
            ]
        );
        //-----Modificar cupos si cambia la carrera
        //------Liberar cupo a la carrera anterior
        $idCarreras = ListaEspera::select('carrera_id')->where('id', '=', $listaEspera)->get();
        foreach ($idCarreras as $datosAnt) {
            $esperaAnt = $datosAnt['carrera_id'];
        }
        $reservadosAnt = Cupo::select('id', 'reservados')->where('carrera_id', '=', $esperaAnt)->get();
        foreach ($reservadosAnt as $cuposAnt) {
            $cupoIdAnt = $cuposAnt['id'];
            $cupoAntViejo = $cuposAnt['reservados'];
        }
        $cupoAntNuevo = $cupoAntViejo - 1;
        $actualizaCupoAnt = Cupo::findOrFail($cupoIdAnt);
        $actualizaCupoAnt->reservados = $cupoAntNuevo;
        //------Liberar cupo a la carrera anterior


        //------Reserva cupo de la nueva seleccion
        $id = $request->input('carrera_id');
        $reservadosNuevo = Cupo::select('id', 'reservados')->where('carrera_id', '=', $id)->get();
        foreach ($reservadosNuevo as $cuposNuevo) {
            $cupoIdNuevo = $cuposNuevo['id'];
            $cupoAntNuevo = $cuposNuevo['reservados'];
        }
        $cupoNuevo = $cupoAntNuevo + 1;

        $actualizaCupoNuevo = Cupo::findOrFail($cupoIdNuevo);
        $actualizaCupoNuevo->reservados = $cupoNuevo;
        //------Reserva cupo de la nueva seleccion

        //dd($cupoIdNuevo);

        //-----Modificar cupos si cambia la carrera


        $espera->carrera_id = $request->input('carrera_id');
        $espera->nombre = $request->input('nombre');
        $espera->apellido = $request->input('apellido');
        $espera->dni = $request->input('dni');
        $espera->telefono = $request->input('telefono');
        $espera->tel_alternativo = $request->input('tel_alternativo');
        $espera->email = $request->input('email');
        //$actualizaCupoAnt->save();
        //$actualizaCupoNuevo->save();
        $espera->save();

        $request->session()->flash('status', 'Se modificó correctamente el usuario ' . $espera->name);
        return redirect()->route('espera.index', $espera->id);
    }


    public function destroy(int $id)
    {

        $espera = ListaEspera::findOrFail($id);

        //-----Restar la cantidad de cupos en la tabla cupos

        $idCarreras = ListaEspera::select('carrera_id')->where('id', '=', $id)->get();
        foreach ($idCarreras as $idCarrera) {
            $carreraId = $idCarrera['carrera_id'];
        }
        $reservados = Cupo::select('id', 'reservados')->where('carrera_id', '=', $carreraId)->get();

        foreach ($reservados as $cupos) {
            $cupoid = $cupos['id'];
            $cupoAnt = $cupos['reservados'];
        }
        $cupoNuevo = $cupoAnt - 1;

        $cupo = Cupo::findOrFail($cupoid);

        $cupo->reservados = $cupoNuevo;
        // $cupo->save();
        //dd($cupo);
        //-----Restar la cantidad de cupos en la tabla cupos

        $espera->delete();
        return redirect()->route('espera.index');
    }

    public function filtrar(Request $request)
    {
        // $espera = ListaEspera::orderBy('id', 'asc')->where('carrera_id', $request->input('carrera_id'))->get();
        $espera = ListaEspera::select(
            'lista_espera.id',
            'lista_espera.carrera_id',
            'lista_espera.nombre',
            'lista_espera.apellido',
            'lista_espera.dni',
            'lista_espera.telefono',
            'lista_espera.tel_alternativo',
            'lista_espera.email',
            'turnos.dia_hora',
            'turnos.hash',
            'turnos.carrera_id as carrera_id_orig'
        )
            ->leftjoin('turnos', 'turnos.dni', '=', 'lista_espera.dni')
            ->orderBy('lista_espera.id', 'asc')->where('lista_espera.carrera_id', $request->input('carrera_id'))->get();

        $carreras = Carrera::pluck('descripcion', 'id');
        return view('backend.lista_espera.index', compact('espera', 'carreras'));
    }

    public function create_espera()
    {
        $cupos = array();
        $cupos_aux = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->whereColumn('reservados', '>=', 'cupos')->get();
        $cupos_pluck = Cupo::join('carreras', 'cupos.carrera_id', '=', 'carreras.id')->select('descripcion', 'carrera_id', 'cupos')->whereColumn('reservados', '>=', 'cupos')->get()->pluck('descripcion', 'carrera_id');

        foreach ($cupos_aux as $key => $cupo) {

            // dd($cupos[$cupo->carrera_id]);
            $espera = ListaEspera::select(
                'lista_espera.id',
                'lista_espera.carrera_id',
                'lista_espera.dni'
            )->where('lista_espera.carrera_id', $cupo->carrera_id)->get();
            $cantidad = count($espera);
            $tope = DB::table('listatope')->get();

            $cEspera = $cupo->cupos * ($tope[0]->number / 100);
            //dd($cEspera);
            if ($cantidad <= $cEspera) {
            	//dd($cupo->carrera_id . $cupos_pluck[$cupo->carrera_id]);
                $cupos[$cupo->carrera_id] = $cupos_pluck[$cupo->carrera_id];
            }

        }

        return view('frontend.lista_espera.create', compact('cupos'));
    }

    public function store_espera(Request $request)
    {
        $validatedData = $request->validate(
            [
                'carrera_id' => 'required|int',
                'nombre' => 'required|string',
                'apellido' => 'required|string',
                'dni' => 'required|int|digits:8',
                'caractel' => 'required|int|digits:3',
                'telefono' => 'required|int|digits:7',
                'caractalt' => 'nullable|int|digits:3',
                'tel_alternativo' => 'nullable|int|digits:7',
                'email' => 'required|email',
            ]
        );

        $espera_existe = ListaEspera::where('dni', $request->input('dni'))
            ->where('carrera_id', $request->input('carrera_id'))
            ->first();

        if ($espera_existe) {
            return ("Ud ya figura en la lista de espera");
        } else {
            //-----Aumentar la cantidad de cupos en la tabla cupos
            $id = $request->input('carrera_id');
            $reservados = Cupo::select('id', 'reservados')->where('carrera_id', '=', $id)->get();

            foreach ($reservados as $cupos) {
                $cupoid = $cupos['id'];
                $cupoAnt = $cupos['reservados'];
            }
            $cupoNuevo = $cupoAnt + 1;

            $cupo = Cupo::findOrFail($cupoid);

            //dd($cupo);
            //-----Aumentar la cantidad de cupos en la tabla cupos

            $espera = new ListaEspera();
            $espera->carrera_id = $request->input('carrera_id');
            $espera->nombre = $request->input('nombre');
            $espera->apellido = $request->input('apellido');
            $espera->dni = $request->input('dni');
            $espera->telefono = $request->input('caractel') . $request->input('telefono');
            $espera->tel_alternativo = $request->input('caractalt') . $request->input('tel_alternativo');
            $espera->email = $request->input('email');
            $espera->save();

            $cupo->reservados = $cupoNuevo;
            //$cupo->save();

            //php artisan storage:link

            // return redirect()->route('lista.espera');
            //app(PdfController::class)->pdfTurno($registroNuevo->dni);
            app(PdfController::class)->mailLista($espera->dni);
            //app(PdfController::class)->mailLista($espera->dni);
            return app(PdfController::class)->pdfLista($espera->dni);
        }
    }

    public function turno(Request $request, string $listaEspera)
    {

        $espera = ListaEspera::findOrFail($listaEspera);
        $validatedData = $request->validate(
            [
                'fecha' => 'required',
                'hora' => 'required ',
            ]
        );

        $turno = new Turno();
        // string que contiene la fecha y la hora de inicio de los turnos
        $dia_hora = $request->input('fecha') . " " . $request->input('hora');
        $turno->dia_hora = \Carbon\Carbon::create($dia_hora);
        $turno->dni = $request->input('dni');
        $turno->carrera_id = $request->input('carrera_id');
        $turno->email = $request->input('email');
        $hash = $request->input('dni') . $turno;
        $turno->hash = md5($hash);
        $turno->save();

        $request->session()->flash('status', 'Se asignó el turno para el DNI ' . $espera->dni);
        return redirect()->route('espera.index', $espera->id);
    }


}