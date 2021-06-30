<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use App\Models\Autonomia;
use App\Models\Provincia;
use App\Models\Localidade;
use App\Models\Tipojob;
use App\Models\Job;


use SebastianBergmann\Environment\Console;

class LocationFilters extends Component
{

    public $autonomia = null;
    public $elegidaAutonomia ="Todas las Autonomías";

    public $provincia =null;
    public $elegidaProvincia = "Todas las Provincias";
    public $provincias;

    public $localidad = null;
    public $elegidaLocalidad = "Todas las Localidades";
    public $localidades;

    public $tipoTrabajo = null;
    public $elegidaTiposTrabajo = "Todos los trabajos";

    public function render()
    {

        if (Cache::has('todasAutonomias')) {
            $autonomias = Cache::get('todasAutonomias');
        } else {
            $autonomias = Autonomia::orderBy('name')->get();
            Cache::put('todasAutonomias', $autonomias);
        }

        if (Cache::has('todosTiposTrabajo')) {
            $tiposTrabajo = Cache::get('todosTiposTrabajo');
        } else {
            $tiposTrabajo = Tipojob::orderBy('name')->get();
            Cache::put('todosTiposTrabajo', $tiposTrabajo);
        }

        //$autonomias = Autonomia::all();

        //$tiposTrabajo = Tipojob::with('jobs')->get();

        if ($this->tipoTrabajo == null) {
            $this->tipoTrabajo = Tipojob::with('jobs')
            ->find(1);
        }

        if(isset($this->autonomia->id)) {
            $searchAutonomia = $this->autonomia->id;
        } else {
            $searchAutonomia = null;
        }

        if(isset($this->provincia->id)) {
            $searchProvincia = $this->provincia->id;
        } else {
            $searchProvincia = null;
        }
        if(isset($this->localidad->id)) {
            $searchLocalidad = $this->localidad->id;
        } else {
            $searchLocalidad = null;
        }

        $jobs= $this->tipoTrabajo->jobs()->with('tipojobs')
        ->with('autonomia')
        ->with('provincia')
        ->with('localidad')
        ->autonomia($searchAutonomia)
        ->provincia($searchProvincia)
        ->localidad($searchLocalidad)
        ->get();

        return view('livewire.location-filters',compact('autonomias','tiposTrabajo','jobs'));



    }
    public function autonomiaClick(Autonomia $autonomia) {
        if($autonomia == null) {
            $this->elegidaAutonomia = "Todas las Autonomías";
        } else {
            $this->autonomia = $autonomia;
            $this->elegidaAutonomia = $autonomia->name;
            $this->provincias = $autonomia->provincias()->get();
        }

        $this->elegidaProvincia = "Todas las Provincias";
        $this->localidades = null;
        $this->elegidaLocalidad = "Todas las Localidades";

    }
    public function provinciaClick(Provincia $provincia) {
        if($provincia == null) {
            $this->elegidaProvincia = "Todas las Provincias";
        } else {
            $this->provincia = $provincia;
            $this->elegidaProvincia = $provincia->name;
            $this->localidades = $provincia->localidades()->get();
            $this->localidades = null;
            $this->elegidaLocalidad = "Todas las Localidades";
        }

    }
    public function localidadClick(Localidade $localidad) {
        if($localidad == null) {
            $this->elegidaLocalidad ="Todas las Localidades";
        } else {
            $this->localidad = $localidad;
            $this->elegidaLocalidad = $localidad->name;
        }



    }
    public function tipoTrabajoClick(Tipojob $tipo) {
        $this->elegidaTiposTrabajo = $tipo->name;
        $this->tipoTrabajo = $tipo;
    }

}
