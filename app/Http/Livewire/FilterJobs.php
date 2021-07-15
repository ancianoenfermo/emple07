<?php

namespace App\Http\Livewire;
use App\Models\Autonomia;
use App\Models\Provincia;
use App\Models\Localidade;
use App\Models\Tipojob;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;


class FilterJobs extends Component
{

    public $selectedTipoTrabajo = null, $selectedAutonomia = "todas", $selectedProvincia = "todas", $selectedLocalidad = "todas";
    public $tiposTrabajos = null, $autonomias = null, $provincias = null, $localidades = null;
    public $contador = 0;



    public function render()
    {
        $this->contador += 1;
        return view('livewire.filter-jobs');
    }
    public function mount($tipoTrabajo = null ){
        $this->autonomias = Cache::rememberForever('TodasAutonomias', function () {
            return Autonomia::orderBy('name')->get();
         });

        $this->selectedTipoTrabajo = 'Todos los trabajos';
        $this->tiposTrabajos = array('Todos los trabajos','Discapacidad','Prácticas','Prácticas');

    }

    public function updatedselectedTipoTrabajo($tipoTrabajo) {
        $this->emitTo('jobs','filtersEmit',null,null,null,$tipoTrabajo);
    }

    public function updatedSelectedAutonomia($autonomia_id) {
        if($autonomia_id != "todas") {
            $this->provincias = Cache::rememberForever('TodasProvinciasDE'.$autonomia_id, function () use($autonomia_id) {
                return Autonomia::find($autonomia_id)->provincias;
            });
            $this->reset('selectedProvincia');
        } else {
            $this->reset(['provincias','selectedProvincia','localidades','selectedLocalidad']);
            $autonomia_id = null;
        }

        $this->emitTo('jobs','filtersEmit',$autonomia_id,null,null,$this->selectedTipoTrabajo);
    }




    public function updatedSelectedProvincia($provincia_id) {
        if($provincia_id != "todas") {
            $this->localidades = Cache::rememberForever('TodasLocalidadesDE'.$provincia_id, function () use($provincia_id) {
                return Provincia::find($provincia_id)->localidades;
            });
            $this->reset('selectedLocalidad');
        } else {
            $provincia_id = null;
        }

        $this->emitTo('jobs','filtersEmit',null,$provincia_id,null,$this->selectedTipoTrabajo);
    }

    public function updatedSelectedLocalidad($localidad_id) {

        if($localidad_id == "todas") {
            $localidad_id = null;
        }

        $this->emitTo('jobs','filtersEmit',null,null,$localidad_id,$this->selectedTipoTrabajo);

    }




}
