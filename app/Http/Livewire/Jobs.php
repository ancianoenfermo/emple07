<?php

namespace App\Http\Livewire;

use App\Models\Autonomia;
use Livewire\Component;
use App\Models\Tipojob;
use App\Models\Job;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class Jobs extends Component
{
    use WithPagination;
    public $search;
    public $cant = 10;
    public $tipoTrabajo = null;
    public $autonomia = null;
    public $provincia = null;
    public $localidad = null;

    public $readyToLoad = false;
    public $showSearch = false;

    protected $listeners = [
        'filtersEmit' => 'filtersEmit',
    ];

    public function render()
    {

        if($this->readyToLoad) {
            $jobs = Job::whereHas(
                'tipojobs', function($q){
                    $q->where('tipojob_id', $this->tipoTrabajo);
                }
            )
            ->with('tipojobs')
            ->where('title','like','%'.$this->search.'%')
            ->Orwhere('excerpt','like','%'.$this->search.'%')
            ->autonomia($this->autonomia)
            ->provincia($this->provincia)
            ->localidad($this->localidad)
            ->orderBy('orden')
            ->paginate($this->cant);



            /*

            $jobs = $this->tipoTrabajo->jobs()
            ->with('tipojobs')
            ->where('title','like','%'.$this->search.'%')
            ->Orwhere('excerpt','like','%'.$this->search.'%')
            ->autonomia($this->autonomia)
            ->provincia($this->provincia)
            ->localidad($this->localidad)
            ->paginate($this->cant);
            */


        } else {
            $jobs = [];
        }

        return view('livewire.jobs',compact('jobs'));
    }


    public function loadEmpleos() {
        $this->readyToLoad = true;
        $this->showSearch = true;
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function filtersEmit($autonomiaId,$provinciaId,$localidadId,$tipoTrabajo) {
        if ($autonomiaId) {
            $nombreAutonomia = Cache::rememberForever('AutonomiaNombreId'.$autonomiaId, function () use($autonomiaId) {
                return Autonomia::where('id',$autonomiaId)->get()->pluck('name')->toArray();
            });
        $this->autonomia = $nombreAutonomia[0];
        }

        // Viene id
        /*
        $this->tipoTrabajo = Cache::rememberForever('TipoTrabajoID'.$tipoTrabajo, function () use($tipoTrabajo) {
            return Tipojob::with('jobs')->find($tipoTrabajo);
         });

        $this->tipoTrabajo = $tipoTrabajo;
        $this->autonomia = $autonomiaName;
        $this->provincia = $provinciaName;
        $this->localidad = $localidadName;
         */
        $this->resetPage();
    }



}
