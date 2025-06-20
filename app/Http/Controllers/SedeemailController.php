<?php

namespace App\Http\Controllers;

use App\Models\Sedeemail;
use Illuminate\Http\Request;

class SedeemailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            [ 'email' => 'required']
         );
         
        $email = new Sedeemail(); 
        $email->email = $request->input('email');
        $email->sede_id = $request->input('sede_id');
        
        $email->save();
       return redirect()->route('sede.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sedeemail  $sedeemail
     * @return \Illuminate\Http\Response
     */
    public function show(Sedeemail $sedeemail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sedeemail  $sedeemail
     * @return \Illuminate\Http\Response
     */
    public function edit(Sedeemail $sedeemail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sedeemail  $sedeemail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sedeemail $sedeemail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sedeemail  $sedeemail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Sedeemail::findOrFail($id);    
        $email->delete();
        return redirect()->route('sede.index');
    }
}
