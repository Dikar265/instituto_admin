<?php

namespace App\Http\Controllers;

use App\Models\Carrerasede;
use Illuminate\Http\Request;

class CarrerasedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

     $Carrerasede = new Carrerasede(); 
     $Carrerasede->nombre = $request->input('sede_id');
     $Carrerasede->descripcion = $request->input('carrera_id');
     $Carrerasede->save();   
     $request->session()->flash('status', 'Se guardó correctamente la etiqueta '. $Carrerasede->nombre);
     return redirect()->route('etiquetas.create'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrerasede  $carrerasede
     * @return \Illuminate\Http\Response
     */
    public function show(Carrerasede $carrerasede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrerasede  $carrerasede
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrerasede $carrerasede)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrerasede  $carrerasede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrerasede $carrerasede)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrerasede  $carrerasede
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrerasede $carrerasede)
    {
        //
    }
}
