<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Horario;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::all();
        return view('backend.modulo.index', compact('modulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = Modulo::all();
        return view('backend.modulo.create', compact('modulos'));
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
                'horainicio' => ['required','unique:modulos'],
                'horafin' => ['required'],
                'duracion' => ['required', 'numeric', 'max:60']
            ]
        );

        $modulo = new Modulo();

        $modulo->horainicio = $request->input('horainicio');
        $modulo->horafin = $request->input('horafin');
        $modulo->duracion = $request->input('duracion');
        $modulo->save();
        $request->session()->flash('status', 'Se guardó correctamente el módulo');
        return redirect()->route('modulo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modulo = Modulo::findOrFail($id);
        return view('backend.modulo.edit', compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modulo = Modulo::findOrFail($id);

        $validateData = $request->validate(
            [
                'horainicio' => ['required'],
                'horafin' => ['required'],
                'duracion' => ['required', 'numeric', 'max:60']
            ]
        );

        $modulo->horainicio = $request->input('horainicio');
        $modulo->horafin = $request->input('horafin');
        $modulo->duracion = $request->input('duracion');
        $modulo->save();
        $request->session()->flash('status', 'Se guardó correctamente el módulo');
        return redirect()->route('modulo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modulo = Modulo::findOrFail($id);
        $horarios = Horario::where('modulohorario_id', $modulo->id)->first();
        if (empty($horarios)) {
            $modulo->delete();
        } else {
            session()->flash('status', 'No se puede eliminar el módulo porque tiene horarios asociados.');
        }
        return redirect()->route('modulo.index');
    }
}
