<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AlumnosExport;

class AlumnoController extends Controller
{

    public function index()
    {
        $alumnos = Registro::all();

        return view('backend.alumnos.index', compact('alumnos'));


    }

    public function buscar(Request $request)
    {
        $numeroDocumento = $request->input('dni');

        $alumno = Registro::where('dni', $numeroDocumento)->first();
        //dd($alumno);
        return view('backend.alumnos.resultado', compact('alumno'));

        if ($numeroDocumento) {
            // Actualizar el archivo Excel
            $this->actualizarExcel($numeroDocumento);
        } else {
            return redirect()->back()->with('error', 'DNI no encontrado');
        }
    }

    private function actualizarExcel($numeroDocumento)
    {
        // Cargar el archivo Excel existente
        $excelFilePath = storage_path('app/public/plantilla.xlsx');

        Excel::import(new ActualizarHoja1Export($numeroDocumento), $excelFilePath);

        return response()->download($excelFilePath, 'archivo_actualizado.xlsx');
    }

    public function store_inscp(Request $request, $id)
    {
        $alumno = Registro::findOrFail($id);
        if ($request->input('fotoc_dni_ok') == 'on') {
            $alumno->fotoc_dni_ok = 1;
        } else {
            $alumno->fotoc_dni_ok = 0;
        }

        if ($request->input('fotoc_titulo_ok') == 'on') {
            $alumno->fotoc_titulo_ok = 1;
        } else {
            $alumno->fotoc_titulo_ok = 0;
        }

        if ($request->input('certificado_sec_ok') == 'on') {
            $alumno->certificado_sec_ok = 1;
        } else {
            $alumno->certificado_sec_ok = 0;
        }

        if ($request->input('foto_ok') == 'on') {
            $alumno->foto_ok = 1;
        } else {
            $alumno->foto_ok = 0;
        }

        if ($request->input('partida_nac_ok') == 'on') {
            $alumno->partida_nac_ok = 1;
        } else {
            $alumno->partida_nac_ok = 0;
        }


        // $alumno->fotoc_titulo_ok = $request->input('fotoc_titulo_ok');
        // $alumno->certificado_sec_ok = $request->input('certificado_sec_ok');
        // $alumno->foto_ok = $request->input('foto_ok');
        // $alumno->partida_nac_ok = $request->input('partida_nac_ok');


        $alumno->save();
        //dd($alumno);
        //php artisan storage:link

        $request->session()->flash('status', 'Se guardó correctamente el dato del alumno ' . $alumno->nomnbre . ' ' . $alumno->apellido);
        return redirect()->route('alumnos.index');
    }

}