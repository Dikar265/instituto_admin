<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sede::all();
        return view('frontend.sede.contacto', compact('sedes'));
    }
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//Agregar mensajes de error en vista y mostrar mensaje flash
        $validatedData = $request->validate(
            [
                'nombre' => 'required',
                'email' => 'required',
                'sede' => 'required',
                'mensaje' => 'required'
            ]
        );

        $nombre = $request->input('nombre');
        $respuesta = $request->input('email');
        $mensaje = $request->input('mensaje');
        //$mail = $request->input('sede');
        $mail = 'isft38sannicolas@abc.gob.ar';

        $asunto    = 'Consulta desde la web';
        $noreply   = $respuesta;
        $mensaje1 = $request->input('mensaje');

        $headers = "";
        $headers .= "From: I.S.F.T N° 38 <" . $noreply . ">\r\n";
        $headers .= "Reply-To: " . $nombre . " <" . $respuesta . ">\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $mensaje2  = "<strong>Consulta realizada por " . $nombre . ": \r\n </strong>";
        $mensaje2 .= '<br> <br>';
        $mensaje2 .= nl2br($mensaje1);

        $resultado = mail($mail, $asunto, $mensaje2, $headers);

        if ($resultado == true) {
            $request->session()->flash('status', 'Mensaje enviado');
        } else {
            $request->session()->flash('status', 'Error al enviar el mensaje');
        }
        return redirect()->route('contacto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
