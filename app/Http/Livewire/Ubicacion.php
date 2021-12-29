<?php

namespace App\Http\Livewire;

use App\Models\Autonomia;
use App\Models\Provincia;
use App\Models\Localidad;
use App\Models\Contrato;
use App\Models\Jornada;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Ubicacion extends Component
{
    public $autonomias = null;
    public $provincias = null;
    public $localidades = null;
    public $contratos = null;
    public $jornadas = null;
    public $experiencias = null;
    public $tiposempleo = null;
    public $tipossalario = null;

    public $selectedAutonomia = "Todas";
    public $selectedProvincia = "Todas";
    public $selectedLocalidad = "Todas";
    public $selectedContrato = "Todos";
    public $selectedJornada = "Todas";
    public $selectedExperiencia = "Todo";
    public $selectedTiposalario = "Todos";
    public function mount()
    {

        $this->autonomias = Cache::rememberForever('TodasAutonomias', function () {
            return Autonomia::all();
        });


        $this->contratos = Cache::rememberForever('TodosContratos', function () {
            return Contrato::all();
        });

        $this->jornadas = Cache::rememberForever('TodosJornadas', function () {
            return Jornada::all();
        });

        $this->experiencias = ['Con experiencia','Sin experiencia'];
        $this->tiposempleo = ['Discapacidad','Prácticas','Teletrabajo','100% Teletrabajo','Ett','Sin tipo'];
        $this->tipossalario = ['Salario anual', 'Salario mensual','Salario por horas','Según convenio','Con Salario'];
    }
    public function render()
    {
        return view('livewire.ubicacion');
    }
    public function updatedSelectedAutonomia($autonomia_id)
    {

        $this->reset(['provincias','selectedProvincia','selectedLocalidad']);
        $this->provincias = Provincia::where('autonomia_id', $autonomia_id)->get();
       /*
        $this->provincias = Cache::rememberForever('TodasProvinciasDeAutonomia' . $autonomia_id, function () use ($autonomia_id) {
            return Provincia::where('autonomia_id', '1')->get();
        });
        */
    }




    public function updatedSelectedProvincia($provincia_id)
    {
        $this->reset(['localidades','selectedLocalidad']);
        $this->localidades = Localidad::where('provincia_id', $provincia_id)->get();

        /*
        $this->localidades = Cache::rememberForever('TodasLocalidadesDeProvincia' . $provincia_id, function () use ($provincia_id) {
            return Localidad::where('provincia_id', $provincia_id)->get();
        });
        */
    }
    public function updatedSelectedLocalidad($provincia_id)
    {

    }
}
