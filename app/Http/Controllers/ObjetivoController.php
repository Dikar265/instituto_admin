<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetivos = Objetivo::all();
        return view ('backend.objetivo.index', compact('objetivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.objetivo.create');
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
            [ 'objetivo' => 'required']
         );

     $objetivo = new Objetivo();
     $objetivo->objetivo = $request->input('objetivo');
     $objetivo->save();
     $request->session()->flash('status', 'Se guardó correctamente el Objetivo ');
     return redirect()->route('objetivo.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        return view('backend.objetivo.show', compact('objetivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        return view('backend.objetivo.edit', compact('objetivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $validatedData = $request->validate(
               [ 'objetivo' => 'required']);
            $objetivo->update($validatedData);

            $objetivo->objetivo = $request->input('objetivo');

            $objetivo->save();

            return redirect()->route('objetivo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objetivo  $objetivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $objetivo->delete();
        return redirect()->route('objetivo.index');
    }
}
