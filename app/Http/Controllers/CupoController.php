<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Cupo;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class CupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupos = Cupo::all();
        foreach ($cupos as $cupo) {
            $registros = Registro::where('confirmado', 1)
                ->where('carrera_id', $cupo->carrera_id)
                ->count();
            $cupo->inscriptos = $registros;
            $dia = date('Y-m-d');

            $perdidos = array();
            $query = "SELECT dia_hora from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE DATE(dia_hora) < '" . $dia . "' and turnos.dni IS NOT NULL and registros.carrera_id = ". $cupo->carrera_id . " and ( registros.confirmado = 0 OR  registros.confirmado IS NULL )";
            $perdidos = DB::select($query);
            $cupo->perdidos = count($perdidos);

            // $query = "SELECT dia_hora from turnos  WHERE DATE(dia_hora) < '" . $dia . "' and turnos.dni IS NOT NULL and turnos.carrera_id = ". $cupo->carrera_id  ;
            // $perdidos_sd = DB::select($query);            
           // $cupo->perdidos = count($perdidos_sd) - $registros;
           //  $cupo->perdidos =  count($perdidos_sd);
            
            $pendientes = array();
            $pendientes = DB::select("SELECT dia_hora from turnos INNER JOIN registros on turnos.dni = registros.dni  WHERE DATE(dia_hora) >= '" . $dia . "' and turnos.dni IS NOT NULL and registros.carrera_id = ". $cupo->carrera_id  . " and ( registros.confirmado = 0 OR  registros.confirmado IS NULL )"); 
            $cupo->pendientes = count($pendientes); 
            // $pendientes_sd = DB::select("SELECT dia_hora from turnos    WHERE DATE(dia_hora) >= '" . $dia . "' and turnos.dni IS NOT NULL and turnos.carrera_id = ". $cupo->carrera_id  );
            // $cupo->pendientes_sd = count($pendientes_sd) - count($pendientes);   
            $pendientes_sd = DB::select("select * from turnos where carrera_id = $cupo->carrera_id and dni is not null and dia_hora > '$dia' and dni not in ( SELECT dni FROM registros where carrera_id = $cupo->carrera_id)"); 
            $cupo->pendientes_sd = count($pendientes_sd);    
         
            $cupo->save();
        }
        return view('backend.cupos.index', compact('cupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrerasDB = DB::select('SELECT carreras.id , carreras.descripcion FROM carreras where carreras.id not in (select cupos.carrera_id from cupos)');
        $carreras = Arr::pluck($carrerasDB, 'descripcion', 'id');
        return view('backend.cupos.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'carreras' => 'required',
                'cupos' => 'required'
            ]
        );

        $cupo = new Cupo();
        $cupo->carrera_id = $request->input('carreras');
        $cupo->cupos = $request->input('cupos');
        $cupo->reservados = 0;
        $cupo->inscriptos = 0;
        $cupo->save();

        $request->session()->flash('status', 'Se guardaron correctamente los cupos de ' . $cupo->carrera->descripcion);
        return redirect()->route('cupos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cupo = Cupo::findOrFail($id);
        return view('backend.cupos.show', compact('cupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cupo = Cupo::findOrFail($id);
        return view('backend.cupos.edit', compact('cupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cupos' => 'required',
            'reservados' => 'required',
            'inscriptos' => 'required',
        ]);

        if ($request->input('cupos') < $request->input('reservados')) {
            return back()->with('warning', 'La cantidad de reservados no puede ser mayor a la cantidad de cupos');
        }

        if ($request->input('cupos') < $request->input('inscriptos')) {
            return back()->with('warning', 'La cantidad de inscriptos no puede ser mayor a la cantidad de cupos');
        }

        $cupo = Cupo::findOrFail($id);

        $cupo->fill($request->only([
            'cupos',
            'reservados',
            'inscriptos'
        ]));

        if ($cupo->isClean()) {
            return back()->with('warning', 'Debe realizar al menos un cambio para actualizar');
        }

        $cupo->update($request->all());

        $request->session()->flash('success', 'Se guardaron correctamente los cupos de ' . $cupo->carrera->descripcion);
        return redirect()->route('cupos.edit', compact('cupo'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cupo = Cupo::findOrFail($id);
        $cupo->delete();
        return redirect()->route('cupos.index')->with('deleted', 'Se borró correctamente el cupo');
    }
}