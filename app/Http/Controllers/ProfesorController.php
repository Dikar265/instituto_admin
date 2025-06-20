<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Profesor;
use App\Models\Programa;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::all();
        return view('backend.profesor.index', compact('profesores'));
    }

    public function login()
    {
        return view('frontend.profesor.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Profesor::all();
        return view('backend.profesor.create', compact('profesores'));
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
                'nombre' => ['required'],
                'apellido' => ['required']
            ]
        );

        $profesor = new Profesor();

        $profesor->nombre = $request->input('nombre');
        $profesor->apellido = $request->input('apellido');
        $profesor->save();
        $request->session()->flash('status', 'Se guardó correctamente el profesor ' . $profesor->apellido);
        return redirect()->route('profesor.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$profesor = Profesor::all();
        //return view('backend.profesor.show', compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor = Profesor::findOrFail($id);
        return view('backend.profesor.edit', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profesor = Profesor::findOrFail($id);

        $validateData = $request->validate(
            [
                'nombre' => ['required'],
                'apellido' => ['required']
            ]
        );

        $profesor->nombre = $request->input('nombre');
        $profesor->apellido = $request->input('apellido');
        $profesor->save();
        $request->session()->flash('status', 'Se guardó correctamente el profesor ' . $profesor->apellido);
        return redirect()->route('profesor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor = Profesor::findOrFail($id);
        $horarios = Horario::where('profesor_id', $profesor->id)->first();
        $programas = Programa::where('profesor_id', $profesor->id)->first();
        if (empty($horarios) && empty($programas)) {
            $profesor->delete();
        } else if (!empty($horarios) || !empty($programas)){
            session()->flash('status', 'No se puede eliminar el profesor porque tiene información asociada.');
        }

        return redirect()->route('profesor.index');
    }
}
