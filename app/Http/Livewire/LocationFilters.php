<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Autonomia;
use App\Models\Provincia;
use App\Models\Localidade;
use App\Models\Tipojob;
use SebastianBergmann\Environment\Console;

class LocationFilters extends Component
{
    public $autonomia;
    public $elegidaAutonomia ="Todas las Autonomías";

    public $provincia;
    public $elegidaProvincia = "Todas las Provincias";
    public $provincias;

    public $localidad;
    public $elegidaLocalidad = "Todas las Localidades";
    public $localidades;

    public $elegidaTiposTrabajo = "Todos los trabajos";

    public function render()
    {
        $autonomias = Autonomia::all();
        $tiposTrabajo = Tipojob::all();
        return view('livewire.location-filters',compact('autonomias','tiposTrabajo'));
    }
    public function autonomiaClick(Autonomia $autonomia) {
        $this->autonomia = $autonomia;
        $this->elegidaAutonomia = $autonomia->name;
        $this->provincias = $autonomia->provincias()->get();
    }
    public function provinciaClick(Provincia $provincia) {
        $this->provinvia = $provincia;
        $this->elegidaProvincia = $provincia->name;
        $this->localidades = $provincia->localidades()->get();
    }
    public function localidadClick(Localidade $localidad) {
        $this->localidad = $localidad;
        $this->elegidaLocalidad = $localidad->name;
    }
    public function tipoTrabajoClick(Tipojob $tipo) {
        $this->elegidaTiposTrabajo = $tipo->name;
    }

}
