<?php

namespace App\Http\Livewire;


use Livewire\Component;



use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Type;
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

    public $visualiza = false;

    public $contadorRender = 0;

    protected $listeners = [
        'filtersEmit' => 'filtersEmit',
    ];

    public function render()
    {
        $ofertas = [];
        $pp=0;
        if($this->readyToLoad) {
            $this->contadorRender +=1;
            $pp = $this->contadorRender;



            switch ($this->tipoTrabajo) {
                case 'Todos los trabajos':
                    $ofertas = $this->buscaRegistros("jobs_todos");
                    break;
                case 'Discapacidad':
                    $ofertas = DB::table('jobs_discapacidads')->paginate(15);
                    /*$ofertas = $this->buscaRegistros("jobs_discapacidads");*/
                    break;
                case 'Prácticas':
                    $ofertas = $this->buscaRegistros("jobs_practicas");
                    break;
                case 'Teletrabajo':
                    $ofertas = $this->buscaRegistros("jobs_teletrabajos");
                    break;
                default:
                    dd("ERROR");
            }

            if($ofertas->total()==0) {

                $this->emit('showNOrecords', $this->search);
            }

            $this->emit('cabecerah1', $ofertas->total());


        } else {
            $ofertas = [];
        }



        return view('livewire.jobs',compact('ofertas','pp'));
    }

    public function mount(){
        $this->tipoTrabajo = "Todos los trabajos";

    }



    public function loadEmpleos() {
        $this->readyToLoad = true;
        $this->showSearch = true;
    }

    /*
    public function updatingSearch() {
        $this->resetPage();
    }
    */



    public function filtersEmit($autonomiaId,$provinciaId,$localidadId,$tipoTrabajo,$texto) {

        $this->reset(['autonomia','provincia','localidad','tipoTrabajo']);
        $this->tipoTrabajo = $tipoTrabajo;
        $this->search = $texto;
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
        //$this->readyToLoad = true;
    }



    public function buscaRegistros($tabla) {

        $resultado = DB::table($tabla)
        ->orderBy("orden")
        ->where(function($query) {
            if ($this->autonomia) {
                $query->where('autonomia_id','=',$this->autonomia);

            }

            if ($this->provincia) {
                $query->where('provincia_id','=',$this->provincia);

            }
            if ($this->localidad) {
                $query->where('localidad_id','=',$this->localidad);
            }
            if ($this->search) {
                $query->where('title','like','%'.' '.$this->search.' '.'%')
                ->orWhere('excerpt','like','%'.' '.$this->search.' '.'%');
            }

        })->paginate(15);

        return $resultado;
    }

    public function dameTextoH1() {
        $lugar = "";
        $en = "";
        $tipo = "";

        if ($this->tipoTrabajo != "Todos los trabajos") {
            $tipo = " con " + $this->tipoTrabajo;
            $tipo = strtolower($tipo);
        }

        if ($this->localidad != "Todas las Localidades") {
            $lugar = $this->localidad;
            $en = " en ";
        } else if ($this->provincia != 'Todas las Provincias') {
            $lugar = $this->provincia;
            $en = " en ";
        }   else if ($this->autonomia != 'Todas las Autonomias') {
            $lugar = $this->autonomia;
            $en = " en ";
        }
        $textoh1 = "Esto es una prueba";
        //$textoh1 = "Ofertas de XXXXX trabajo " + strval($tipo) + strval($en) + strval($lugar) ;
        return $textoh1;
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
