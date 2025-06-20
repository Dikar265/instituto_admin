<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Carrera;
use App\Models\Anio;
use App\Models\Profesor;
use App\Models\Programa;
use App\Models\Horario;
use App\Models\DB;
use Illuminate\Http\Request;

class materiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::orderBy('carrera_id', 'ASC')->orderBy('anio_id', 'ASC')->orderBy('orden', 'ASC')->get();
        return view('backend.materia.index', compact('materias'));
    }
    public function create()
    {
        //$materias = Materia::pluck('descripcion','id');
        $anios = Anio::pluck('anio', 'id');
        $carreras = Carrera::pluck('descripcion', 'id');
        $profesores = Profesor::pluck('nombre', 'id');
        return view('backend.materia.create', compact('anios', 'carreras', 'profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'descripcion' => 'required',
                'carrera_id' => 'required',
                'anio_id' => 'required',
                'orden' => 'required'
            ]
        );
        $materia = new Materia();
        $materia->descripcion = $request->input('descripcion');
        $materia->carrera_id = $request->input('carrera_id');
        $materia->anio_id = $request->input('anio_id');
        $materia->orden = $request->input('orden');
        $materia->save();

        $request->session()->flash('status', 'Se guardó correctamente la materia ' . $materia->descripcion);
        return redirect()->route('materia.create');
    }

    /**
     *
     * @param  \App\Models\materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show() {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\materia  $materia
     * @return \Illuminate\Http\Response
     */

    public function getMaterias($carrera_id = 0)
    {
        $materias['data'] = Materia::join('carrerasedes', 'materias.carrera_id', '=', 'carrerasedes.carrera_id')
            ->select('materias.id', 'materias.descripcion')
            ->where('materias.carrera_id', $carrera_id)
            ->get();
        return response()->json($materias);
    }


    public function filterCarrera($carrera_id)
    {
        $materias = Materia::orderBy('carrera_id', 'ASC')->orderBy('anio_id', 'ASC')->orderBy('orden', 'ASC')->where('carrera_id', $carrera_id)->get();
        return view('backend.materia.index', compact('materias'));
    }


    public function edit($id)
    {
        $materias = materia::findOrFail($id);
        $anios = Anio::pluck('anio', 'id');
        $carreras = Carrera::pluck('descripcion', 'id');
        $programas = Programa::pluck('ruta', 'id');
        return view('backend.materia.edit', compact('materias', 'anios', 'carreras', 'programas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $materia = materia::findOrFail($id);
        $validatedData = $request->validate(
            [
                'descripcion' => 'required',
                'carrera_id' => 'required',
                'anio_id' => 'required',
                'orden' => 'required'
            ]
        );
        $materia->descripcion = $request->input('descripcion');
        $materia->carrera_id = $request->input('carrera_id');
        $materia->anio_id = $request->input('anio_id');
        $materia->orden = $request->input('orden');
        $materia->save($validatedData);
        return redirect()->route('carrera.materias', ['carrera_id' => $materia->carrera_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $programas = Programa::where('materia_id', $materia->id)->first();
        $horarios = Horario::where('materia_id', $materia->id)->first();
        if (empty($programas) && empty($horarios)) {
            $materia->delete();
        } else {
            session()->flash('status', 'Esta materia tiene horarios y/o programas relacionados');
        }
        return redirect()->route('materia.index');
    }
}
