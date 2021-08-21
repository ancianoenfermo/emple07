<?php

namespace App\Http\Livewire;


use Livewire\Component;



use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

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

    public $showModal ="hidden";
    public $modalOpen = false;

    protected $listeners = [
        'filtersEmit' => 'filtersEmit',
    ];

    public function render()
    {
        if($this->readyToLoad) {

            switch ($this->tipoTrabajo) {
                case 'Todos los trabajos':
                    $this->emitTo('cabecera-ofertas','CambiaCabeceraH1',"Empleo en España: Ofertas de trabajo publicadas");
                    $jobs = DB::table('jobs_todos')
                    ->orderBy("orden")
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
                    $this->emitTo('cabecera-ofertas','CambiaCabeceraH1',"Empleo para personas con discapacidad: Ofertas de trabajo publicadas");
                    $jobs = DB::table('jobs_discapacidads')
                    ->orderBy("orden")
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
                    $this->emitTo('cabecera-ofertas','CambiaCabeceraH1',"Empleo en prácticas: Ofertas de trabajo publicadas");
                    $jobs = DB::table('jobs_practicas')
                    ->orderBy("orden")
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
                    $this->emitTo('cabecera-ofertas','CambiaCabeceraH1',"Empleo con teletrabajo: Ofertas de trabajo publicadas");
                    $jobs = DB::table('jobs_teletrabajos')
                    ->orderBy("orden")
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

    public function search() {

    }

    public function clickFavoritos() {
        dd("Estoy");
    }

    public function filtersEmit($autonomiaId,$provinciaId,$localidadId,$tipoTrabajo) {

        $this->reset(['autonomia','provincia','localidad','tipoTrabajo']);
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

    public function showModal($mesaje){
        dd($mesaje);
    }



}
