<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Turno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Registro;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos = Turno::orderBy('id', 'ASC')->paginate(15);
        return view('backend.turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::pluck('descripcion', 'id');
        return view('backend.turnos.create', compact('carreras'));
    }

    public function store(Request $request)
    {

        $rules = [
            'fechainicio' => 'required',
            'fechafin' => 'required',
            'horainicio' => 'required',
            'horafin' => 'required',
            'espacioanotados' => 'required'
        ];

        $messages = [
            'espacioanotados.required' => 'El campo TIEMPO ENTRE ANOTADOS (EN MINUTOS) es requerido..',
        ];

        $this->validate($request, $rules, $messages);

        if ($request->input('fechainicio') > $request->input('fechafin')) {
            return back()->with('warning', 'La fecha de inicio no puede ser posterior a la fecha de fin');
        }

        $nombre_dia_primero = date('w', strtotime($request->input('fechainicio')));

        if ($nombre_dia_primero == 0 || $nombre_dia_primero == 6) {
            return back()->with('warning', 'El dia de la fecha de inicio no puede ser un Sabado o Domingo');
        }

        $nombre_dia_ultimo = date('w', strtotime($request->input('fechafin')));

        if ($nombre_dia_ultimo == 0 || $nombre_dia_ultimo == 6) {
            return back()->with('warning', 'El dia de la fecha de fin no puede ser un Sabado o Domingo');
        }


        // string que contiene la fecha y la hora de inicio de los turnos
        $dia_hora_inicial = $request->input('fechainicio') . " " . $request->input('horainicio');
        // creacion de un objeto carbon con la fecha y hora de inicio 
        $dia_hora_comenzar = \Carbon\Carbon::create($dia_hora_inicial);

        // string que contiene la fecha y la hora de finalizacion de turnos
        $dia_hora_final = $request->input('fechafin') . " " . $request->input('horafin');
        // creacion de un objeto carbon con la fecha y hora de fin
        $dia_hora_terminar = \Carbon\Carbon::create($dia_hora_final);

        // creacion de un objeto carbon con la fecha y hora de inicio pero se modifica para realizar comparaciones
        $dia_hora_comparar = \Carbon\Carbon::create($dia_hora_inicial);

        // se guarda la cantidad de tiempo entre cada turno
        $espacioanotados = $request->input('espacioanotados');

        $contador = 0;
        $turnos_creados = 0;

        while ($dia_hora_comparar->toDateString() <= $dia_hora_terminar->toDateString()) {

            // obtiene un numero que representa el dia de la semana
            // 0 domingo
            // 1 lunes
            // 2 martes
            // 3 miercoles
            // 4 jueves
            // 5 viernes
            // 6 sabado
            $nombre_dia = date('w', strtotime($dia_hora_comparar->toDateString()));

            if ($nombre_dia != 0 && $nombre_dia != 6) {

                while ($dia_hora_comparar->toTimeString() <= $dia_hora_terminar->toTimeString()) {
                    //creo un turno
                    $turno = new Turno();
                    //se le aseginga el dia con la hora al campo correspondiente
                    $turno->dia_hora = $dia_hora_comparar->toDateTimeString();
                    //se guarda en la base de datos
                    $turno->save();

                    $turnos_creados++;

                    //se agrega el tiempo entre anotados
                    $dia_hora_comparar = $dia_hora_comparar->addMinutes($espacioanotados);
                }

            }

            $contador++;
            $dia_hora_comparar = $dia_hora_comenzar->addDays($contador);
            $dia_hora_comenzar = \Carbon\Carbon::create($dia_hora_inicial);

        }

        if ($turnos_creados == 0) {
            return back()->with('warning', 'No se ha creado ningun turno');
        }

        $request->session()->flash('status', 'Se crearon correctamente los turnos. Total ' . $turnos_creados . " turnos");
        return redirect()->route('turnos.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turno = Turno::findOrFail($id);
        return view('backend.turnos.show', compact('turno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turno = Turno::findOrFail($id);
        $carrerasDB = DB::select('SELECT carreras.id , carreras.descripcion FROM carreras where carreras.id  in (select cupos.carrera_id from cupos where reservados < cupos)');
        $carreras = Arr::pluck($carrerasDB, 'descripcion', 'id');

        return view('backend.turnos.edit', compact('turno', 'carreras'));
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
            'nueva_fecha' => 'required',
            'nueva_hora' => 'required',
            'dni' => 'required',
            'carrera_id' => 'required'

        ]);


        //si la nueva fecha es sabado o domingo, le decis que no da 
        $nombre_dia = date('w', strtotime($request->input('nueva_fecha')));

        if ($nombre_dia == 0) {
            return back()->with('warning', 'El dia de la nueva fecha no puede ser un Domingo');
        } else if ($nombre_dia == 6) {
            return back()->with('warning', 'El dia de la nueva fecha no puede ser un Sabado');
        }
        //busco el turno que se actualizó y sino me da error
        $turno = Turno::findOrFail($id);
        //le asigno la nuevo hora y fecha al turno a actualizar
        $turno->dia_hora = $request->input('nueva_fecha') . " " . $request->input('nueva_hora');

        //revisa si hay algun cambio, sino manda error
        $turno->fill($request->only([
            'dia_hora',
            'dni',
            'carrera_id'
        ]));

        if ($turno->isClean()) {
            return back()->with('warning', 'Debe realizar al menos un cambio para actualizar');
        }


        //el turno ya se actualizó y abajo los mensajes correspondientes
        $turno->update($request->all());

        $request->session()->flash('success', 'Se guardaron correctamente los cambios del turno');
        return redirect()->route('turnos.edit', compact('turno'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno = Turno::findOrFail($id);
        $turno->delete();
        return redirect()->route('turnos.index')->with('deleted', 'Se borró correctamente el turno');
    }
}