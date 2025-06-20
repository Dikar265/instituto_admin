<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriasResiduo;
use App\Models\Residuo;
use Illuminate\Support\Facades\DB;

class CategoriaResiduoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        //$categoriasResiduo = CategoriasResiduo::orderBy('id','ASC')->paginate(15);
        //$categoriasResiduo = DB::select('SELECT categorias_residuos.id, nombre, SUM(peso) as peso FROM categorias_residuos INNER JOIN residuos on categorias_residuos.id = residuos.categoria_id GROUP BY residuos.categoria_id'); 
        $categoriasResiduo = CategoriasResiduo::select('categorias_residuos.id', 'nombre')->paginate(15);
        return view ('backend.categoriaresiduos.index', compact('categoriasResiduo')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('backend.categoriaresiduos.create');
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
                'nombre' => 'required',
            ]
        );

        $categoriasResiduo = new CategoriasResiduo();
        $categoriasResiduo->nombre = $request->input('nombre');
        $categoriasResiduo->save();

        $request->session()->flash('success', 'Se guardó correctamente la categoria "'. $categoriasResiduo->nombre .'"');
        return redirect()->route('categoriaresiduos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriasResiduo = CategoriasResiduo::findOrFail($id);
        return view('backend.categoriaresiduos.edit', compact('categoriasResiduo'));
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
            'nombre' => 'required',
        ]); 
        $categoriasResiduo = CategoriasResiduo::findOrFail($id);
        $nombreOriginal = $categoriasResiduo->nombre;

        $categoriasResiduo->fill($request->only([
            'nombre'
        ]));

        if($categoriasResiduo->isClean()){
            return back()->with('warning','Debe realizar al menos un cambio para actualizar');
        } 
        
        $categoriasResiduo->nombre = $request->input('nombre');
        $categoriasResiduo->update();
     
        //return back()->with('success','Se cambió correctamente el nombre de la categoria por '. $categoriasResiduo->nombre);
        return redirect()->route('categoriaresiduos.index')->with('success','Se cambió correctamente el nombre de la categoria "'.$nombreOriginal. '" por "'. $categoriasResiduo->nombre .'"');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoriasResiduo = CategoriasResiduo::findOrFail($id);
        $categoriasResiduo->delete();
        return redirect()->route('categoriaresiduos.index')->with('deleted','Se borró correctamente la categoria "'.$categoriasResiduo->nombre. '"');
    }

  
}
