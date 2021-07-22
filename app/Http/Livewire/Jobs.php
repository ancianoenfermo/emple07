<?php

namespace App\Http\Livewire;

use App\Models\Autonomia;
use Livewire\Component;
use App\Models\Tipotodos;
use App\Models\Tipodiscapacidad;
use App\Models\Tipopractica;
use App\Models\Tipoteletrabajo;
use App\Models\Job;
use App\Models\Tipotodo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Jobs extends Component
{
    use WithPagination;
    public $search = null;
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

            switch ($this->tipoTrabajo) {
                case 'Todos los trabajos':
                    $jobs = DB::table('jobs')
                    ->where(function($query) {
                        if ($this->autonomia) {
                            $query->where('autonomiatodo_id','=',$this->autonomia);
                        }
                        if ($this->provincia) {
                            $query->where('provinciatodo_id','=',$this->provincia);
                        }
                        if ($this->localidad) {
                            $query->where('localidadtodo_id','=',$this->localidad);
                        }
                    })
                    ->where(function($query) {
                        if ($this->search) {
                            $query->where('title','like','%'.$this->search.'%');
                        }
                    })
                    ->paginate(15);
                    break;
                case 'Discapacidad':
                    $jobs = DB::table('jobs_discapacidads')
                    ->where(function($query) {
                        if ($this->autonomia) {
                            $query->where('autonomiadiscapacidad_id','=',$this->autonomia);
                        }
                        if ($this->provincia) {
                            $query->where('provinciadiscapacidad_id','=',$this->provincia);
                        }
                        if ($this->localidad) {
                            $query->where('localidaddiscapacidad_id','=',$this->localidad);
                        }
                    })
                    ->where(function($query) {
                        if ($this->search) {
                            $query->where('title','like','%'.$this->search.'%');
                        }
                    })
                    ->paginate(15);
                    break;
                case 'Prácticas':
                    $jobs = DB::table('jobs_practicas')
                    ->where(function($query) {
                        if ($this->autonomia) {
                            $query->where('autonomiapractica_id','=',$this->autonomia);
                        }
                        if ($this->provincia) {
                            $query->where('provinciapractica_id','=',$this->provincia);
                        }
                        if ($this->localidad) {
                            $query->where('localidadpractica_id','=',$this->localidad);
                        }
                    })
                    ->where(function($query) {
                        if ($this->search) {
                            $query->where('title','like','%'.$this->search.'%');
                        }
                    })
                    ->paginate(15);
                    break;



                case 'Teletrabajo':
                    $jobs = DB::table('jobs_teletrabajos')
                    ->where(function($query) {
                        if ($this->autonomia) {
                            $query->where('autonomiateletrabajo_id','=',$this->autonomia);
                        }
                        if ($this->provincia) {
                            $query->where('provinciateletrabajo_id','=',$this->provincia);
                        }
                        if ($this->localidad) {
                            $query->where('localidadteletrabajo_id','=',$this->localidad);
                        }
                    })
                    ->where(function($query) {
                        if ($this->search) {
                            $query->where('title','like','%'.$this->search.'%');
                        }
                    })
                    ->paginate(15);
                    break;

            }
           /*
                         $jobs = $table
                    ->Orwhere($nameIdAutonomia, $this->autonomia)
                    ->Orwhere($nameIdProvincia, $this->provincia)
                    ->Orwhere($nameIdLocalidad, $this->localidad)
                    ->where('title','like','%'.$this->search.'%')
                    ->Orwhere('excerpt','like','%'.$this->search.'%')
                    ->paginate(15);
            */


            /*
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
            */


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

    public function mount(){
        $this->tipoTrabajo = "Todos los trabajos";

    }

    public function loadEmpleos() {
        $this->readyToLoad = true;
        $this->showSearch = true;
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function filtersEmit($autonomiaId,$provinciaId,$localidadId,$tipoTrabajo) {

        $this->tipoTrabajo = $tipoTrabajo;
        if ($autonomiaId) {
            $this->autonomia = $autonomiaId;
        }
        if ($provinciaId) {
            $this->provincia = $provinciaId;
        }
        if($localidadId) {
            $this->localidad = $localidadId;
        }

        $this->resetPage();
    }



}
