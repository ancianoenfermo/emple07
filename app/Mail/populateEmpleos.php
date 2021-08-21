<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class populateEmpleos extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $duration;
    public $fechaUpdate;
    public function __construct($duration)
    {
        $this->duration = $duration;
        $this->fechaUpdate = Carbon::now()->format('d-m-Y');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.populate')->subject('Actualización de Empleos el '.$this->fechaUpdate);
    }
}
