<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class Turno extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $dni;
    public $dia;
    public $hora;
    public $hash;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $dni, $dia, $hora, $hash )
    {
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->hash = $hash;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('frontend.notificaciones.turno');
    }
}
