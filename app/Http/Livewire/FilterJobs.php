<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

use App\Models\Autonomiatodo;
use App\Models\Provinciatodo;
use App\Models\Localidadtodo;

use App\Models\Autonomiadiscapacidad;
use App\Models\Provinciadiscapacidad;
use App\Models\Localidaddiscapacidad;

use App\Models\Autonomiapractica;
use App\Models\Provinciapractica;
use App\Models\Localidadpractica;

use App\Models\Autonomiateletrabajo;
use App\Models\Provinciateletrabajo;
use App\Models\Localidadteletrabajo;



class FilterJobs extends Component
{

    public $selectedTipoTrabajo = "Todos los trabajos";
    public $selectedAutonomia = "todas";
    public $selectedProvincia = "todas";
    public $selectedLocalidad = "todas";
    public $textoBuscar = "";
    public $tiposTrabajos = null;
    public $autonomias = null;
    public $provincias = null;
    public $localidades = null;

    public $contador = "filtros";
    public $blur = "NO";



    public function render()
    {
        //$this->contador += 1;

        return view('livewire.filter-jobs');
    }
    public function mount($tipoTrabajo = null)
    {
        $this->autonomias = Cache::rememberForever('TodasAutonomias', function () {
            return Autonomiatodo::all();
         });

        //$this->autonomias = DB::table('autonomiatodos')->get();;
        $this->selectedTipoTrabajo = "Todos los trabajos";
        $this->tiposTrabajos = array('Todos los trabajos', 'Discapacidad', 'Prácticas', 'Teletrabajo');
        $this->blur = "SI";
    }


    public function updatedselectedTipoTrabajo()
    {
        $this->reset(['blur','autonomias', 'selectedAutonomia', 'provincias', 'selectedProvincia','selectedLocalidad','localidades']);
        switch ($this->selectedTipoTrabajo) {
            case 'Todos los trabajos':
                $this->autonomias = Cache::rememberForever('TodasAutonomias', function () {
                    return Autonomiatodo::all();
                 });
                break;
            case 'Discapacidad':
                $this->autonomias = Cache::rememberForever('DiscapacidadAutonomias', function () {
                    return Autonomiadiscapacidad::all();
                 });
                break;
            case 'Prácticas':
                $this->autonomias = Cache::rememberForever('PracticasAutonomias', function () {
                    return Autonomiapractica::all();
                 });
                break;
            case 'Teletrabajo':
                $this->autonomias = Cache::rememberForever('TeletrabajoAutonomias', function () {
                    return Autonomiateletrabajo::all();
                 });
                break;
            default:
                dd("error en updatedselectedTipoTrabajo");
        }
        //$this->emitTo('jobs','filtersEmit',null,null,null,$this->selectedTipoTrabajo);
    }

    public function updatedSelectedAutonomia($autonomia_id)
    {

        $this->reset(['blur','provincias', 'selectedProvincia','localidades','selectedLocalidad']);

        switch ($this->selectedTipoTrabajo) {
            case 'Todos los trabajos':
                $this->provincias = Cache::rememberForever('TodasProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return Provinciatodo::where('autonomia_id',$autonomia_id)->get();
                 });
                /*
                $this->provincias = Cache::rememberForever('TodasProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return Provinciatodo::where('autonomia_id',$autonomia_id)->get();
                 });

                */

                break;
            case 'Discapacidad':
                $this->provincias = Cache::rememberForever('DiscapacidadProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return  Provinciadiscapacidad::where('autonomia_id',$autonomia_id)->get();
                 });
                break;
            case 'Prácticas':
                $this->provincias = Cache::rememberForever('PracticasProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return  Provinciapractica::where('autonomia_id',$autonomia_id)->get();
                 });
                break;
            case 'Teletrabajo':
                $this->provincias = Cache::rememberForever('PracticasProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return  Provinciateletrabajo::where('autonomia_id',$autonomia_id)->get();
                 });
                break;
            default:
                dd("error en updatedselectedTipoTrabajo");
        }

        //$this->emitTo('jobs','filtersEmit',$autonomia_id,null,null,$this->selectedTipoTrabajo);
    }

    public function updatedSelectedProvincia($provincia_id)
    {

        $this->reset(['blur','localidades','selectedLocalidad']);

        switch ($this->selectedTipoTrabajo) {
            case 'Todos los trabajos':
                $this->localidades = Cache::rememberForever('TodosLocalidadesDeProvincia'.$provincia_id, function () use($provincia_id) {
                    return  Localidadtodo::where('provincia_id',$provincia_id)->get();
                 });
                break;
            case 'Discapacidad':
                $this->localidades = Cache::rememberForever('DiscapacidadLocalidadesDeProvincia'.$provincia_id, function () use($provincia_id) {
                    return  Localidaddiscapacidad::where('provincia_id',$provincia_id)->get();
                 });
                break;
            case 'Prácticas':
                $this->localidades = Cache::rememberForever('PracticasLocalidadesDeProvincia'.$provincia_id, function () use($provincia_id) {
                    return  Localidadpractica::where('provincia_id',$provincia_id)->get();
                 });
                break;
            case 'Teletrabajo':
                $this->localidades = Cache::rememberForever('TeletrabajoLocalidadesDeProvincia'.$provincia_id, function () use($provincia_id) {
                    return  Localidadteletrabajo::where('provincia_id',$provincia_id)->get();
                 });
                break;
            default:
                dd("error en updatedselectedTipoTrabajo");
        }

        //$this->emitTo('jobs','filtersEmit',null,$provincia_id,null,$this->selectedTipoTrabajo);

    }

    public function updatedSelectedLocalidad($localidad_id)
    {
        $this->reset(['blur']);

        if ($localidad_id == "todas") {
            $localidad_id = null;
        }

        //$this->emitTo('jobs','filtersEmit',null,null,$localidad_id,$this->selectedTipoTrabajo);

    }

    public function clickBuscar($texto) {

        $this->blur = "SI";
        if ($this->selectedLocalidad != "todas") {
            $this->emitTo('jobs','filtersEmit',null,null,$this->selectedLocalidad,$this->selectedTipoTrabajo,$texto);
            return;
        }
        if ($this->selectedProvincia != "todas") {
            $this->emitTo('jobs','filtersEmit',null,$this->selectedProvincia,null,$this->selectedTipoTrabajo,$texto);
            return;
        }
        if ($this->selectedAutonomia != "todas") {
            $this->emitTo('jobs','filtersEmit',$this->selectedAutonomia,null,null,$this->selectedTipoTrabajo,$texto);
            return;
        }

        $this->emitTo('jobs','filtersEmit',null,null,null,$this->selectedTipoTrabajo,$texto);

    }
}
