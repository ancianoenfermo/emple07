<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CabeceraOfertas extends Component
{
    protected $listeners = [
        'CambiaCabeceraH1' => 'CambiaCabeceraH1',
    ];


    public $h1Cabecera = "Empleo en España";
    public function render()
    {
        return view('livewire.cabecera-ofertas');
    }

    public function CambiaCabeceraH1($cabecera) {
        $this->h1Cabecera = $cabecera;
    }
}
