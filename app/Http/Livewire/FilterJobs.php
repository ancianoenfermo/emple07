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
    public $tiposTrabajos = null;
    public $autonomias = null;
    public $provincias = null;
    public $localidades = null;

    public $contador = 0;




    public function render()
    {
        $this->contador += 1;

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
    }


    public function updatedselectedTipoTrabajo()
    {
        $this->reset(['autonomias', 'selectedAutonomia', 'provincias', 'selectedProvincia','selectedLocalidad','localidades']);
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
        $this->emitTo('jobs','filtersEmit',null,null,null,$this->selectedTipoTrabajo);
    }

    public function updatedSelectedAutonomia($autonomia_id)
    {
        $this->reset(['provincias', 'selectedProvincia','localidades','selectedLocalidad']);

        switch ($this->selectedTipoTrabajo) {
            case 'Todos los trabajos':
                $this->provincias = Cache::rememberForever('TodasProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return Provinciatodo::where('autonomiatodo_id',$autonomia_id)->get();
                 });
                break;
            case 'Discapacidad':
                $this->provincias = Cache::rememberForever('DiscapacidadProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return  Provinciadiscapacidad::where('autonomiadiscapacidad_id',$autonomia_id)->get();
                 });
                break;
            case 'Prácticas':
                $this->provincias = Cache::rememberForever('PracticasProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return  Provinciapractica::where('autonomiapractica_id',$autonomia_id)->get();
                 });
                break;
            case 'Teletrabajo':
                $this->provincias = Cache::rememberForever('PracticasProvinciasDeAutonomia'.$autonomia_id, function () use($autonomia_id) {
                    return  Provinciateletrabajo::where('autonomiateletrabajo_id',$autonomia_id)->get();
                 });
                break;
            default:
                dd("error en updatedselectedTipoTrabajo");
        }

        $this->emitTo('jobs','filtersEmit',$autonomia_id,null,null,$this->selectedTipoTrabajo);
    }

    public function updatedSelectedProvincia($provincia_id)
    {

        $this->reset(['localidades','selectedLocalidad']);

        switch ($this->selectedTipoTrabajo) {
            case 'Todos los trabajos':
                $this->localidades = Cache::rememberForever('TodosLocalidadesDeProvincia'.$provincia_id, function () use($provincia_id) {
                    return  Localidadtodo::where('provinciatodo_id',$provincia_id)->get();
                 });
                break;
            case 'Discapacidad':
                $this->localidades = Cache::rememberForever('DiscapacidadLocalidadesDeProvincia'.$provincia_id, function () use($provincia_id) {
                    return  Localidaddiscapacidad::where('provinciadiscapacidad_id',$provincia_id)->get();
                 });
                break;
            case 'Prácticas':
                $this->localidades = Cache::rememberForever('PracticasLocalidadesDeProvincia'.$provincia_id, function () use($provincia_id) {
                    return  Localidadpractica::where('provinciapractica_id',$provincia_id)->get();
                 });
                break;
            case 'Teletrabajo':
                $this->localidades = Cache::rememberForever('TeletrabajoLocalidadesDeProvincia'.$provincia_id, function () use($provincia_id) {
                    return  Localidadteletrabajo::where('provinciateletrabajo_id',$provincia_id)->get();
                 });
                break;
            default:
                dd("error en updatedselectedTipoTrabajo");
        }

        $this->emitTo('jobs','filtersEmit',null,$provincia_id,null,$this->selectedTipoTrabajo);





        /*
if ($provincia_id == "todas") {
            $this->reset(['selectedLocalidad','localidades']);
        } else {
            switch ($this->selectedTipoTrabajo) {
                case 'Todos los trabajos':
                    $this->localidades = Tipotodo::find(1)->autonomias->where('id', '=', $provincia_id);
                    break;
                case 'Discapacidad':
                    $this->localidades = Tipodiscapacidad::find(1)->autonomias->where('id', '=', $provincia_id);
                    break;
                case 'Prácticas':
                    $this->localidades = Tipopractica::find(1)->autonomias->where('id', '=', $provincia_id);;
                    break;
                case 'Teletrabajo':
                    $this->localidades = Tipoteletrabajo::find(1)->autonomias->where('id', '=', $provincia_id);;
                    break;
                default:
                    dd("error en updatedselectedTipoTrabajo");
            }
            $this->reset(['selectedProvincia']);

        }

        */



















        /*
        if ($provincia_id != 'todas') {
            $this->localidades = Provincia::find($this->selectedProvincia)->localidades;
        }
        $this->reset(['selectedLocalidad', 'localidades']);
        */



        /*
        if($provincia_id != "todas") {
            $this->localidades = Cache::rememberForever('TodasLocalidadesDE'.$provincia_id, function () use($provincia_id) {
                return Provincia::find($provincia_id)->localidades;
            });
            $this->reset('selectedLocalidad');
        } else {
            $provincia_id = null;
        }
        */
        //$this->emitTo('jobs','filtersEmit',null,$provincia_id,null,$this->selectedTipoTrabajo);
    }

    public function updatedSelectedLocalidad($localidad_id)
    {

        if ($localidad_id == "todas") {
            $localidad_id = null;
        }

        $this->emitTo('jobs','filtersEmit',null,null,$localidad_id,$this->selectedTipoTrabajo);

    }
}
