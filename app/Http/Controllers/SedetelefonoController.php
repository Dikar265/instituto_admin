<?php

namespace App\Http\Controllers;

use App\Models\Sedetelefono;
use Illuminate\Http\Request;

class SedetelefonoController extends Controller
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
        $validatedData = $request->validate(
            [ 'caracteristica' => 'required',
              'numero' => 'required']
         );
         
        $telef = new Sedetelefono(); 
        $telef->caracteristica = $request->input('caracteristica');
        $telef->numero = $request->input('numero');
        $telef->sede_id = $request->input('sede_id');
        
        $telef->save();
       return redirect()->route('sede.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sedetelefono  $sedetelefono
     * @return \Illuminate\Http\Response
     */
    public function show(Sedetelefono $sedetelefono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sedetelefono  $sedetelefono
     * @return \Illuminate\Http\Response
     */
    public function edit(Sedetelefono $sedetelefono)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sedetelefono  $sedetelefono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sedetelefono $sedetelefono)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sedetelefono  $sedetelefono
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $telef = Sedetelefono::findOrFail($id);    
        $telef->delete();
        return redirect()->route('sede.index');
    }
}
