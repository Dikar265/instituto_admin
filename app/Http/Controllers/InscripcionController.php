<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Cupo;
use Illuminate\Http\Request;
use App\Models\Turno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Registro;
use Auth;


class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $targetDate = \Carbon\Carbon::create(2024, 10, 31, 23, 59, 59);
        $currentDate = \Carbon\Carbon::now();

        if (
            Auth::user() &&
            (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
        ) {
            $currentDate = \Carbon\Carbon::create(2024, 11, 02, 0, 0, 0);
        }

        if ($currentDate->greaterThan($targetDate)) {
            /////////////////////////////////////////////////////////
             $alumnos = Registro::where('backup', null)->get();
               if (!$alumnos->isEmpty()) {
               foreach ($alumnos as $alumno) {
            // //   ExcelControllerInscrip::solicitud_backup($alumno->id);
                 ExcelControllerLegajo::legajo_backup($alumno->id);
                }
             }
            ////////////////////////////////////////////////////////

            //traemos solamente la fecha sin la hora.
            $turnos = DB::select('SELECT CAST(dia_hora AS DATE) as dias from turnos where id >= 956 and id <= 1125 group by dias ');
            //dd(($turnos));
            if (sizeof($turnos) == 0) {
       return "<br><img src=''><ul> <li class='text-start'>Pre-Inscripciones Ingreso 1º año 2025: 01/11/24 al 07/03/25 (Virtual - Sistema de Turnos)</li> </ul>";
            }

            $html_available = 0;
            $html2_available = 0;

            // $date = '2024/03/1';
            //date guarda el dia del primer turno
            $date = empty($date) ? \Carbon\Carbon::create($turnos[0]->dias) : \Carbon\Carbon::createFromDate($date);
            //comienzo del calendario del primer mes
            $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(\Carbon\Carbon::SUNDAY);
            //fin del calendario del primer mes
            $endOfCalendar = $date->copy()->lastOfMonth()->endOfMonth(\Carbon\Carbon::SATURDAY);

/*sacar*/
// $date = '2025/02/26';

            $html = "<style>
     .calendar {
        display: flex;
        position: relative;
        padding: 20px;
        margin: 0 auto;
        max-width: 800px;
        background: white;
        border-radius: 4px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .month-year {
        position: absolute;
        bottom:62px;
        right: -27px;
        font-size: 2rem;
        line-height: 1;
        font-weight: 300;
        color: #94A3B8;
        transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
    }

    .year {
        margin-left: 4px;
        color: #CBD5E1;
    }

    .days_red {
        display: flex;
        flex-wrap: wrap;
        flex-grow: 1;
        margin-right: 46px;
        color: red;
    }


    .day-label {
        text-align: center;
        position: relative;
        flex-basis: calc(14.286% - 2px);
        margin: 1px 1px 12px 1px;
        font-weight: 700;
        font-size: 0.65rem;
        text-transform: uppercase;
        color: #1E293B;
    }

    .day {
        position: relative;
        flex-basis: calc(14.286% - 2px);
        margin: 1px;
        border-radius: 999px;
        cursor: pointer;
        font-weight: 300;
    }

    .day.dull {
        color: #94A3B8;

    }
    //estos son los de los turnos que si existen en la bd.

    .today {
        color: green;
        font-weight: 600;
    }
    span a {
        text-decoration:none;
        color: green;
        font-weight: 600;
        font-size: 20px;
    }

    span a:hover {
        text-decoration:none;
        color: black;
        font-weight: 1000;
        font-size: 30px;
    }

    .day::before {
        content: '';
        display: block;
        padding-top: 100%;
    }



    .day .content {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }</style>";

            $html2 = $html;

            $html .= '<h1 class="calendar text-success">
        <img style="margin-right:5px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA90lEQVR4nO2awQ6CMBBE9/O8Sef/Typ+A64HTCM22EosgtkW5iV7ANJtZ6ctEBDJ5O7cQYGzAv0QJ38ut711/oBPPOokdCaV5A+8kk8dl56/PiGdc+4GXD/Y+xZxR2uHZOb3Y+2AJhGSI6IkIfqMdtLayoT0FKJ/cmKpgwHrAVFIjHVl6QgpHS1gviu33xHWlaUjMdaVpSMxPzf88ja39JrOHQ+FCB0RTi2ssEZKC9m9EOH2m8LFDt4Qsb1HFC0sZPdCZCtTSygkhY6AUwvm26xy+4V9tZWOwL7CSkcG/Md36+rq3HDuIjH+d4jKxLRd0xwTIUTK4AGONeEm/pc9JAAAAABJRU5ErkJggg==">
         Turnos para Inscripciones 2025</h1>';

            $html .= '<div class="calendar">';

            $html .= '<div class="month-year">';
            $html .= '<span class="month">' . $date->format('M') . '</span>';
            $html .= '<span class="year">' . $date->format('Y') . '</span>';
            $html .= '</div>';



            $html .= '<div class="days_red">';

            $dayLabels = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            foreach ($dayLabels as $dayLabel) {
                $html .= '<span class="day-label d-none d-md-block" >' . $dayLabel . '</span>';
            }

            $dayLabelsMob = ['D', 'L', 'M', 'X', 'J', 'V', 'S'];
            foreach ($dayLabelsMob as $dayLabel) {
                $html .= '<span class="day-label d-md-none" >' . $dayLabel . '</span>';
            }

            while ($startOfCalendar <= $endOfCalendar) {
                $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
                // $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
                //    $html .= "<a href='http://isft38.test/inscripciones/".$startOfCalendar->format("j").'><span class="day '.$extraClass.'></a><span class="content">' . $startOfCalendar->format('j') . '</span></span>';
                $disponible = DB::select("SELECT CAST(dia_hora AS DATE) as dias from turnos WHERE DATE(dia_hora) = '" . $startOfCalendar->format('Y-m-d') . "' and dni IS NULL and id >= 956 and id <= 1125 group by dias ");
                //  $a = "SELECT CAST(dia_hora AS DATE) as dias from turnos WHERE DATE(dia_hora) = '" .$startOfCalendar->format('Y-m-d')."' group by dias ";
                if (!empty($disponible)) {
                    $extraClass = "today";
                    $html_available = 1;
                }
                $html .= '<span class="day ' . $extraClass . '"><span class="content">';
                if (!empty($disponible)) {
                    $dia = $startOfCalendar->format('Y-m-d');

                    /*  $html .=  "<a href='http://isft38.test/inscripciones/".$startOfCalendar->format('Y-m-d')."'>";
                    $html .=  "<a href= ".route('inscripciones.create' , ['turno' , $dia ]) .">"; */

                    $html .= '<a href="' . route('inscripciones.edit', ['inscripcione' => $dia]) . '">';

                }


                $html .= $startOfCalendar->format('j');
                if (!empty($disponible)) {
                    $html .= '</a>';
                }

                $html .= '</span></span>';

                $startOfCalendar->addDay();
            }

            $html .= '</div></div>';


            //obtengo el ultimo dia de las inscripciones (segundo mes)
            $date2 = empty($date2) ? \Carbon\Carbon::create($turnos[sizeof($turnos) - 1]->dias) : \Carbon\Carbon::createFromDate($date2);

            /*sacar*/
// $date2 = '2025/02/28';

            if ($date->format('m') <> $date2->format('m')) {

                $startOfCalendar2 = $date2->copy()->firstOfMonth()->startOfWeek(\Carbon\Carbon::SUNDAY);
                $endOfCalendar2 = $date2->copy()->lastOfMonth()->endOfWeek(\Carbon\Carbon::SATURDAY);
                //$endOfCalendar = $date->copy()->endOfWeek(\Carbon\Carbon::SATURDAY);



                $html2 .= '<div class="calendar">';

                $html2 .= '<div class="month-year">';
                $html2 .= '<span class="month">' . $date2->format('M') . '</span>';
                $html2 .= '<span class="year">' . $date2->format('Y') . '</span>';
                $html2 .= '</div>';

                $html2 .= '<div class="days_red">';


                $dayLabels = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                foreach ($dayLabels as $dayLabel) {
                    $html2 .= '<span class="day-label d-none d-md-block" >' . $dayLabel . '</span>';
                }

                $dayLabelsMob = ['D', 'L', 'M', 'X', 'J', 'V', 'S'];
                foreach ($dayLabelsMob as $dayLabel) {
                    $html2 .= '<span class="day-label d-md-none" >' . $dayLabel . '</span>';
                }

                while ($startOfCalendar2 <= $endOfCalendar2) {
                    $extraClass = $startOfCalendar2->format('m') != $date->format('m') ? 'dull' : '';
                    $extraClass = $startOfCalendar2->format('m') != $date2->format('m') ? 'dull' : '';
                    // $extraClass .= $startOfCalendar->isToday() ? ' today' : '';
                    //    $html2 .= "<a href='http://isft38.test/inscripciones/".$startOfCalendar->format("j").'><span class="day '.$extraClass.'></a><span class="content">' . $startOfCalendar->format('j') . '</span></span>';
                    $disponible = DB::select("SELECT CAST(dia_hora AS DATE) as dias from turnos WHERE DATE(dia_hora) = '" . $startOfCalendar2->format('Y-m-d') . "' and dni IS NULL and id >= 956 and id <= 1125 group by dias ");
                    //  $a = "SELECT CAST(dia_hora AS DATE) as dias from turnos WHERE DATE(dia_hora) = '" .$startOfCalendar->format('Y-m-d')."' group by dias ";
                    if (!empty($disponible)) {
                        $extraClass = "today";
                        $html2_available = 1;
                    }
                    $html2 .= '<span class="day ' . $extraClass . '"><span class="content">';
                    if (!empty($disponible)) {
                        $dia = $startOfCalendar2->format('Y-m-d');

                        /*  $html2 .=  "<a href='http://isft38.test/inscripciones/".$startOfCalendar->format('Y-m-d')."'>";
                        $html2 .=  "<a href= ".route('inscripciones.create' , ['turno' , $dia ]) .">"; */

                        $html2 .= '<a href="' . route('inscripciones.edit', ['inscripcione' => $dia]) . '">';

                    }


                    $html2 .= $startOfCalendar2->format('j');
                    if (!empty($disponible)) {
                        $html2 .= '</a>';
                    }

                    $html2 .= '</span></span>';

                    $startOfCalendar2->addDay();
                }

                $html2 .= '</div></div>';
                if ($html2_available <> 1) {
                    // $html2 = '';
                }
            }
            if ($html_available <> 1) {
                $html = '';
            }



            return view('frontend.inscripciones.index ', compact('html', 'html2'));

        } else {

            // return "<br><img src='under_construction.jpg'><ul> <li class='text-start'>Pre-Inscripciones Ingreso 1º año 2025: 01/11/24 al 07/03/25 (Virtual - Sistema de Turnos)</li>
            // <li class='text-start'>Inscripciones Ingreso 1º año 2025: 05/12/24 al 07/03/25 (Presencial)</li>
            // </ul>";

         return "<br><img src='/'><ul> <li class='text-start'>Pre-Inscripciones Ingreso 1º año 2025: 01/11/24 al 07/03/25 (Virtual - Sistema de Turnos)</li> </ul>";

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function controlar($html = "")
    {

        return view('frontend.inscripciones.confirmar ', compact('html'));

    }

    public function confirmar(Request $request)
    {

        $dni = $request->input('dni');
        $html = "<br>";
        if ($dni <> 0) {
            $turno = Turno::where('dni', '=', $dni)->first();
            if (!empty($turno)) {
                $carrera = Carrera::findOrFail($turno->carrera_id);
                $date = \Carbon\Carbon::create($turno->dia_hora);
                $dia_turno = $date->format('d-m-Y H:i');
                $html = $html . "DNI <b>$dni</b> con turno registrado para el <b>$dia_turno</b>.<br>Carrera: $carrera->descripcion<br>";
                $registro = Registro::where('dni', '=', $dni)->first();
                if (!empty($registro)) {
                    $html = $html . "<b>Sus datos están registrados en el sistema.</b><br>";
                } else {
                    $html = $html . "<b>Sus datos no están completos.</b><br> Por favor ingrese al siguiente link <b> " .
                    Route('inscripcion', $turno->hash ) . "</b> y complete el proceso. Al finalizar recibirá un mail de confirmación.";
                    $html = $html . "<br><a class='btn btn-primary'  href='"
                     . Route('inscripcion', $turno->hash ) . "'>Completar datos</a>";
                }
            } else {
                $html = "DNI $dni sin Turno registrado";
            }
        }
        return view('frontend.inscripciones.confirmar ', compact('html'));

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fecha)
    {
        $turnosDB = DB::select("SELECT id, dia_hora FROM `turnos` WHERE DATE(dia_hora) = '" . $fecha . "' and dni is null");
        $turnos = Arr::pluck($turnosDB, 'dia_hora', 'id');
        $carrerasDB = DB::select('SELECT carreras.id ,  CONCAT(carreras.descripcion, " (", carreras.resolucion, ")") AS descripcion FROM carreras where carreras.id  in (select cupos.carrera_id from cupos where reservados < cupos)');
        $carreras = Arr::pluck($carrerasDB, 'descripcion', 'id');
        return view('frontend.inscripciones.edit', compact('turnos', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $turno)
    {
        // $turno viene como 2023-12-05 19:00:00 <- Ejemplo
        // $request->input('turnos') viene el id del turno elegido <- id 318

        $rules = [
            'turnos' => 'required',
            'carreras' => 'required',
            'dni' => 'required|unique:turnos',
            'email' => 'required',
        ];

        $messages = [
            'dni.unique' => 'Este DNI ya se encuentra en uso',
        ];

        $this->validate($request, $rules, $messages);
        $turno = Turno::findOrFail($request->input('turnos'));
        if ($turno->dni != null) {
            return redirect()->route('inscripciones.index')->with('warning', 'Ocurrio un error, intente otra vez');

        }

        $cupoDB = DB::select("SELECT id FROM `cupos` WHERE carrera_id = '" . $request->input('carreras') . "'");
        $cupo = Cupo::findOrFail($cupoDB[0]->id);

        $cupo->reservados = $cupo->reservados + 1;
        $cupo->update($request->all());
        $hash = $request->input('dni') . $turno;
        $hash = md5($hash);


        $turno->dni = $request->input('dni');
        $turno->carrera_id = $request->input('carreras');
        $turno->email = $request->input('email');
        $turno->hash = $hash;
        $turno->update($request->all());


         app(PdfController::class)->mailTurnoSeguir($turno->dni);


        $request->session()->flash('success', 'Se asignó correctamente su turno el día ' . $turno->dia_hora);
        //return redirect()->route('inscripciones.index');
        return redirect()->route('inscripcion', ['hash' => $hash]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mostrar()
    {

        return "hola";

    }

    public function cancelar($hash)
    {
        return view('frontend.inscripciones.cancel', ['hash' => $hash]);

    }

    public function cancelar_confirm($hash)
    {
        //$eliminar = DB::select("SELECT id, dni,carrera_id,hash from turnos WHERE hash = '" .$hash."' ");

        $turno = Turno::where('hash', $hash)->first();

        if (!empty($turno)) {

            $cupoDB = DB::select("SELECT id FROM `cupos` WHERE carrera_id = '" . $turno->carrera_id . "'");
            $cupo = Cupo::findOrFail($cupoDB[0]->id);
            $cupo->reservados = $cupo->reservados - 1;



            $turno->dni = null;

            $turno->carrera_id = null;
            $turno->hash = null;
            $turno->update();
            $cupo->update();

            $registro = Registro::where('dni', '=', $turno->dni)->first();
            if (!empty($registro)) {
                $registro->delete();
            }

            return redirect()->route('inscripciones.index')->with('success', 'El turno se eliminó correctamente ');

        } else {
            return 'Turno inexistente';
        }

    }
}
