<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

use App\Models\Autonomia;
use App\Models\Localidade;
use App\Models\Provincia;
use App\Models\Tipojob;



class Filters extends Component
{
    public $autonomias = null;
    public $elegidaAutonomia = "Todas las Autonomías";
    public $anteriorAutonomia = null;

    public $provincias = null;
    public $elegidaProvincia = "Todas las Provincias";
    public $anteriorProvincia = null;

    public $localidades = null;
    public $elegidaLocalidad = "Todas las Localidades";
    public $anteriorLocalidad = null;

    public $tiposTrabajo = null;
    public $elegidaTiposTrabajo = "Todos los trabajos";
    public $anteriorTipoTrabajo = null;

    public $autonomiaActual = null;
    public $provinciaActual = null;
    public $localidadActual = null;
    public $tipoJobActual = null;

    public function render()
    {
        return view('livewire.filters');
    }

    public function mount()
    {
        $autonomias = Cache::rememberForever('todasAutonomias', function () {
           return Autonomia::orderBy('name')->get();
        });

        $tiposTrabajo = Cache::rememberForever('todosTiposTrabajo', function () {
            return Tipojob::orderBy('name','DESC')->get();
        });

        $this->tiposTrabajo = $tiposTrabajo;
        $this->autonomias = $autonomias;
    }

    public function autonomiaClick(Autonomia $autonomia)
    {


        if ($this->anteriorAutonomia <> $autonomia->name) {
            $key = $autonomia->name . 'PROVINCIAS';
            $autonomiaProvincias = Cache::rememberForever($key, function () use($autonomia) {
                return $autonomia->provincias()->orderBy('name')->get();
             });
            $this->provincias = $autonomiaProvincias;
            $this->anteriorProvincia = "Todas las Provincias";
            $this->elegidaAutonomia = $autonomia->name;
            $this->anteriorAutonomia = $autonomia->name;
        }

        $this->autonomiaActual = $autonomia;
        $this->emitTo('jobs','filtersEmit',$this->autonomiaActual->name,$this->provinciaActual,$this->localidadActual,$this->tipoJobActual);

    }

    public function autonomiaTodasClick()
    {
        $this->localidades = null;
        $this->provincias = null;
        $this->reset(['elegidaAutonomia', 'anteriorAutonomia','autonomiaActual','elegidaProvincia','anteriorProvincia','provinciaActual','elegidaLocalidad','anteriorLocalidad']);
    }

    public function provinciaClick(Provincia $provincia)
    {
        if ($this->anteriorProvincia <> $provincia->name) {

            $key = $provincia->name . 'LOCALIDADES';

            $provinciaLocalidades = Cache::rememberForever($key, function () use($provincia) {
                return $provincia->localidades()->orderBy('name')->get();;
             });
            $this->localidades = $provinciaLocalidades;
            $this->anteriorProvincia = "Todas las Provincias";
            $this->elegidaProvincia = $provincia->name;
            $this->anteriorProvincia = $provincia->name;

        }
        $this->provinciaActual = $provincia;
        $this->emitTo('jobs','muestraJobs',$this->autonomiaActual,$this->provinciaActual,$this->localidadActual,$this->tipoJobActual);
    }

    public function provinciaTodasClick()
    {
        $this->localidades = null;
        $this->reset(['elegidaProvincia', 'anteriorProvincia','provinciaActual','elegidaLocalidad','anteriorLocalidad','localidadActual']);
    }


    public function localidadClick(Localidade $localidad)
    {
        if ($this->anteriorLocalidad <> $localidad->name) {
            $this->anteriorLocalidad= "Todas las Localidades";
            $this->elegidaLocalidad = $localidad->name;
            $this->anteriorLocalidad = $localidad->name;
        }
        $this->localidadActual = $localidad;
        $this->emitTo('jobs','muestraJobs',$this->autonomiaActual,$this->provinciaActual,$this->localidadActual,$this->tipoJobActual);
    }

    public function localidadTodasClick()
    {

        $this->reset(['elegidaLocalidad','anteriorLocalidad','localidadActual']);
    }

    public function tipoTrabajoClick(Tipojob $tipoJob) {

        if ($this->anteriorTipoTrabajo <> $tipoJob->name) {
            $this->anteriorTipoTrabajo= "Todos Trabajos";
            $this->elegidaTiposTrabajo = $tipoJob->name;
            $this->anteriorTipoTrabajo = $tipoJob->name;
        }
        $this->tipoJobActual = $tipoJob;
        $this->emitTo('jobs','muestraJobs',$this->autonomiaActual,$this->provinciaActual,$this->localidadActual,$this->tipoJobActual);
    }

}
