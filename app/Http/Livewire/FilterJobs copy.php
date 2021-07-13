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

    public $selectedTipoTrabajo = null, $selectedAutonomia = null, $selectedProvincia = null, $selectedLocalidad = null;
    public $tiposTrabajos = null, $autonomias = null,$provincias = null, $localidades = null;
    public $contador = 0;



    public function render()
    {
        $this->contador += 1;
        return view('livewire.filter-jobs');
    }
    public function mount(){
        $this->autonomias = Cache::rememberForever('TodasAutonomias', function () {
            return Autonomia::orderBy('name')->get();
         });

         $this->tiposTrabajos = Cache::rememberForever('TodosTiposTrabajo', function () {
            return Tipojob::orderBy('name','DESC')->get();
        });
        $this->selectedTipoTrabajo = '1';

    }

    public function updatedselectedTipoTrabajo($tipoTrabajo_id) {
        $this->emitTo('jobs','filtersEmit',null,null,null,$tipoTrabajo_id);
    }

    public function updatedSelectedAutonomia($autonomia) {

        if($autonomia) {
            $autonomiaJson = json_decode($autonomia, true);
            $this->provincias = Autonomia::find($autonomiaJson['id'])->provincias;
            /*
            $this->provincias = Cache::rememberForever('TodasProvinciasDE'.$autonomiaJson['name'], function () use($autonomiaJson) {
                return Autonomia::find($autonomiaJson['id'])->provincias;
            });
            */
            $autonomiaSeleccionada = $autonomiaJson['name'];

        } else {
            $this->provincias = null;
            $this->selectedProvincia =null;
            $this->localidades = null;
            $this->selectedLocalidad = null;
            $autonomiaSeleccionada = null;
        }

        $this->emitTo('jobs','filtersEmit',$autonomiaSeleccionada,null,null,$this->selectedTipoTrabajo);
    }




    public function updatedSelectedProvincia($provincia) {

        if($provincia) {
            $provinciaJson = json_decode($provincia, true);
            $this->localidades = Cache::rememberForever('TodasLocalidadesDE'.$provinciaJson['name'], function () use($provinciaJson) {
                return Provincia::find($provinciaJson['id'])->localidades;
            });
            $provinciaSeleccionada = $provinciaJson['name'];

        } else {
            $this->localidades = null;
            $this->selectedLocalidad = null;
            $provinciaSeleccionada = null;
        }

        $this->emitTo('jobs','filtersEmit',null,$provinciaSeleccionada,null,$this->selectedTipoTrabajo);
    }

    public function updatedSelectedLocalidad($localidad) {

        if($localidad) {
            $localidadJson = json_decode($localidad, true);
            $localidadSeleccionada = $localidadJson['name'];
        } else {
            $localidadSeleccionada = null;
        }

        $this->emitTo('jobs','filtersEmit',null,null,$localidadSeleccionada,$this->selectedTipoTrabajo);

    }




}
