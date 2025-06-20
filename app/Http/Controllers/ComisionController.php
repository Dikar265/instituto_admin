<?php

namespace App\Http\Controllers;

use App\Models\Comision;
use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Sede;
use App\Models\Programa;
use App\Models\Horario;
class ComisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comisiones = Comision::all();
        return view('backend.comision.Index', compact('comisiones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $comisions = Comision::pluck('comision', 'id');

        // $comision = $request->input('comision');
    
        return view('backend.comision.create', compact('comisions'));
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
            'comision' => 'required'
            ]
         );

         $comision = new Comision(); 
         $comision->comision = $request->input('comision');
         $comision->save();
         $request->session()->flash('status', 'Se guardó correctamente la comision ');

         return redirect()->route('comision.index'); 
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function show(Comision $comision)
    {
        //
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comision = Comision::findOrFail($id);
        return view('backend.comision.edit', compact('comision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comision = Comision::findOrFail($id);
        $validatedData = $request->validate(
            [
                'comision' => ['required']
            ]
        );

        $comision->comision = $request->input('comision'); 
        $comision->save($validatedData);    
        
        return redirect()->route('comision.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comision  $comision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comision = Comision::FindOrFail($id);
        $horarios = Horario::where('comision_id', $comision->id)->first();
        $programas = Programa::where('comision_id', $comision->id)->first();
        if (empty($horarios) || empty($programas)) {
            $comision -> delete();
        } else {
            session()->flash('status', 'No se puede eliminar la comisión porque tiene información asociada.');
        }
        return redirect()->route('comision.index');
        // return redirect()->route('backend.comision.index', ['sede' => $sede, 'carrera' => $carrera, 'comision' => $comision]);
    }
}
