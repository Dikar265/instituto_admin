<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historias = Historia::all();
        return view ('backend.historia.index', compact('historias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.historia.create');
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
            [ 'historia' => 'required']
         );

     $historia = new Historia();
     $historia->historia = $request->input('historia');
     $historia->save();
     $request->session()->flash('status', 'Se guardó correctamente la Historia ');
     return redirect()->route('historia.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historia = Historia::findOrFail($id);
        return view('backend.historia.show', compact('historia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historia = Historia::findOrFail($id);
        return view('backend.historia.edit', compact('historia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $historia = Historia::findOrFail($id);
        $validatedData = $request->validate(
               [ 'historia' => 'required']);
            $historia->update($validatedData);

            $historia->historia = $request->input('historia');

            $historia->save();
            
            return redirect()->route('historia.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historia = Historia::findOrFail($id);
         $historia->delete();
         return redirect()->route('historia.index');
    }
}
