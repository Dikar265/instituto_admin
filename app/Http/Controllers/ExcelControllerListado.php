<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Registro;
use App\Models\Materia;
use App\Models\Carrera;
use Illuminate\Support\Facades\Storage;
use \PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use Mpdf\Mpdf;
use Illuminate\Support\Stringable;
use Illuminate\Support\Str;

class ExcelControllerListado extends Controller
{
    public function listado($id)
    {
        $alumnos = Registro::where('carrera_id', '=', $id)
            ->where('confirmado', '=', 1)
            ->orderBy('apellido')
            ->orderBy('nombre')
            ->get();
        if ($alumnos) {
            $filePath = storage_path('Listados.xlsx');
            $spreadsheet = IOFactory::load($filePath);
            $worksheet = $spreadsheet->getActiveSheet();
            $carrera = Carrera::findOrFail($id);
            $worksheet->setCellValue('A8', 'Carrera: ' . Str::upper($carrera->descripcion) . ' - R.M. N° ' . $carrera->resolucion);
            $i = 14;
            foreach ($alumnos as $alumno) {
                $nombre = Str::upper($alumno->apellido) . ' ' . $alumno->nombre;
                $worksheet->setCellValue("B$i", $nombre);
                $worksheet->setCellValue("C$i", $alumno->dni . " ");
                $worksheet->setCellValue("N$i", $alumno->email . " ");
                $worksheet->setCellValue("O$i", $alumno->celular . " ");
                $worksheet->setCellValue("P$i", $alumno->tel_fijo . " ");
                $worksheet->setCellValue("Q$i", $alumno->tel_alternativo. " ");                
                $i++;
            }

            $writer = new Xlsx($spreadsheet);
            $fecha_actual = date("d-m-Y his");
            $file_alumnos = $carrera->descripcion . ' ' . $fecha_actual . '.xlsx';
            $filePath = storage_path('listados/' . $carrera->descripcion . '.xlsx');
            $writer->save($filePath);
            $file_alumnos = 'Listado ' . $file_alumnos;

            return response()->file($filePath, [
                'Content-Type' => 'application/octet-stream',
                'Content-Disposition' => 'attachment; filename="' . $file_alumnos . '"',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                'Cache-Control' => 'post-check=0, pre-check=0',
                'Pragma' => 'no-cache',
            ]);

        }

    }



}