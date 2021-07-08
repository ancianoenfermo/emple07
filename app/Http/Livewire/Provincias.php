<?php

namespace App\Http\Livewire;

use App\Models\Autonomia;
use App\Models\Provincia;

use Livewire\Component;

class Provincias extends Component
{

    protected $listeners = [
        'ElegidaAutonomia' => 'ElegidaAutonomia',
        'ElegidaTodasAutonomias' => 'ElegidaTodasAutonomias'
    ];
    public $provincias = null;
    public $elegidaProvincia = "Todas las Provincias";
    public $anteriorProvincia = "uyyyyyy";
    public $borrar =null;
    public $borrar2 =null;

    public function render()
    {
        return view('livewire.provincias');
    }
    public function ElegidaAutonomia(Autonomia $autonomia)
    {
        $this->provincias = $autonomia->provincias()->orderBy('name')->get();
        $this->anteriorProvincia = "Todas las Provincias";
    }
    public function ElegidaTodasAutonomias()
    {
        $this->provincias = null;
        $this->reset(['elegidaProvincia','anteriorProvincia']);
    }

    function provinciaTodasClick()
    {
        $this->reset(['elegidaProvincia']);
        $this->emitTo('localidades', 'ElegidaTodasProvincias');
    }

    public function provinciaClick(Provincia $provincia)
    {
        if ($this->anteriorProvincia <> $provincia->name) {
            $this->borrar2 ='Entrada'.$this->anteriorProvincia .'-'.$provincia->name;
            $this->elegidaProvincia = $provincia->name;
            //$this->emitTo('localidades', 'ElegidaProvincia', $provincia);
            $a = $provincia->name;
            $this->anteriorProvincia = $a;
            $this->borrar =$this->anteriorProvincia .'-'.$provincia->name;
        }

    }
}
