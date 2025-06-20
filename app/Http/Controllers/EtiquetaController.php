<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $etiquetas = Etiqueta::paginate(10);
       return view('backend.etiqueta.etiquetas', compact('etiquetas'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.etiqueta.create');  
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
               [ 'nombre' => 'required|unique:etiquetas',
                 'descripcion' => 'required']
            );

        $etiqueta = new Etiqueta(); 
        $etiqueta->nombre = $request->input('nombre');
        $etiqueta->descripcion = $request->input('descripcion');
        $etiqueta->save();   
        $request->session()->flash('status', 'Se guardó correctamente la etiqueta '. $etiqueta->nombre);
        return redirect()->route('etiquetas.create'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('backend.etiqueta.show', compact('etiqueta')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('backend.etiqueta.edit', compact('etiqueta'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $etiqueta = Etiqueta::findOrFail($id);
       $validatedData = $request->validate(
               [ 'nombre' => 'required|unique:etiquetas,nombre,'. $id,
                 'descripcion' => 'required']
            );

       $etiqueta->update($validatedData);
       $etiqueta->nombre = $request->input('nombre');
       $etiqueta->descripcion = $request->input('descripcion'); 
       $etiqueta->save();   
       $request->session()->flash('status', 'Se modificó correctamente la etiqueta '. $etiqueta->etiqueta);
        return redirect()->route('etiquetas.edit', $etiqueta->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $etiqueta = Etiqueta::findOrFail($id);
         $etiqueta->delete();
         return redirect()->route('etiquetas.index');
    }
}
