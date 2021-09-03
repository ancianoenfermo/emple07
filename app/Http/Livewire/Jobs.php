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
                    $jobs = $this->buscaRegistros("jobs_todos","");

                    break;
                case 'Discapacidad':
                    $jobs = $this->buscaRegistros("jobs_discapacidads","con discapacidad");
                    break;
                case 'Prácticas':
                    $jobs = $this->buscaRegistros("jobs_practicas","en prácticas");
                    break;
                case 'Teletrabajo':
                    $jobs = $this->buscaRegistros("jobs_teletrabajos","con teletrabajo");
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

    public function buscaRegistros($tabla,$tipo) {
        $this->emitTo('cabecera-ofertas','CambiaCabeceraH1','<p class="text-3xl underline">Empleo en España</p><p class="mt-3 text-2xl" >Ofertas de trabajo '.$tipo.'</p>');
        $jobs = DB::table($tabla)
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
            if ($this->search) {
                $query->where('title','like','%'.' '.$this->search.' '.'%')
                ->orWhere('excerpt','like','%'.' '.$this->search.' '.'%');
            }
        })->paginate(15);

        return $jobs;
    }

}

/*
case 'Todos los trabajos':
                    $this->emitTo('cabecera-ofertas','CambiaCabeceraH1','<p class="text-3xl underline">Empleo en España</p><p class="mt-3 text-2xl" >Ofertas de trabajo</p>');
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
                            $query->Orwhere('excerpt','like','%'.$this->search.'%');
                        }
                    })
                    ->paginate(15);

                    break;
*/
