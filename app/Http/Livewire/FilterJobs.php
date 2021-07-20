<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;


class FilterJobs extends Component
{

    public $selectedTipoTrabajo = null;
    public $selectedAutonomia = "todas";
    public $selectedProvincia = "todas";
    public $selectedLocalidad = "todas";
    public $tiposTrabajos = null;
    public $autonomias = "hola";
    public $provincias = null;
    public $localidades = null;

    public $contador = 0;




    public function render()
    {
        $this->contador += 1;

        if($this->contador == 9) {
            dd($this->autonomias);
            /*
            foreach($this->autonomias as $item){
                dd($item->id);
            }
            */
            dd(var_dump($this->autonomias));
        }

        return view('livewire.filter-jobs');
    }
    public function mount($tipoTrabajo = null)
    {


        $a = DB::table('autonomiatodos')->get();
        $this->autonomias = $a;
        $this->selectedTipoTrabajo = 'Todos los trabajos';
        $this->tiposTrabajos = array('Todos los trabajos', 'Discapacidad', 'Prácticas', 'Teletrabajo');

    }


    public function updatedselectedTipoTrabajo()
    {
        //$this->reset('autonomias');
        switch ($this->selectedTipoTrabajo) {
            case 'Todos los trabajos':
                /*
                $this->autonomias = Cache::rememberForever('autonomiasTiposTodos', function () {
                    return DB::table('autonomiatodos')->get();
                });
                */
                $this->autonomias = DB::table('autonomiatodos')->get();
                break;
            case 'Discapacidad':
                /*
                $this->autonomias = Cache::rememberForever('autonomiasDiscapacidad', function () {
                    return DB::table('autonomiadiscapacidads')->select(['id','name'])->get();
                });
                */
                $this->autonomias =  DB::table('autonomiadiscapacidads')->get();
                break;
            case 'Prácticas':
                $this->autonomias = Cache::rememberForever('autonomiasPractica', function () {
                    return DB::table('autonomiapracticas')->get();
                });
                break;
            case 'Teletrabajo':
                $this->autonomias = Cache::rememberForever('autonomiasTeletrabajo', function () {
                    return DB::table('autonomiateletrabajos')->get();
                });
                break;
            default:
                dd("error en updatedselectedTipoTrabajo");
        }

        //$this->reset(['selectedProvincia', 'provincias', 'selectedLocalidad', 'localidades']);
        //$this->reset(['selectedAutonomia','selectedProvincia', 'provincias', 'selectedLocalidad', 'localidades']);



        //$this->emitTo('jobs','filtersEmit',null,null,null,$tipoTrabajo);
    }

    public function updatedSelectedAutonomia($autonomia_id)
    {

        if ($autonomia_id == "todas") {
            //$this->reset(['selectedProvincia', 'provincias', 'selectedLocalidad', 'localidades']);

        } else {
            switch ($this->selectedTipoTrabajo) {
                case 'Todos los trabajos':
                    $this->provincias = DB::table('provinciatodos')->where('autonomiatodo_id','=',$autonomia_id)->get();
                    //$this->autonomias = DB::table('autonomiatodos')->select(['id','name'])->get();

                    break;
                case 'Discapacidad':
                    /*
                    $key = "provinciasautonomia".$autonomia_id."Discapacidad";

                    $this->provincias = Cache::rememberForever($key, function () use($autonomia_id){
                        return Autonomiadiscapacidad::find($autonomia_id)->provincias;
                    });
                    */
                    //$this->provincias = DB::table('provinciadiscapacidads')->where('autonomiadiscapacidad_id','=',$autonomia_id)->get();
                    //$this->autonomias = DB::table('autonomiadiscapacidads')->select(['id','name'])->get();


                    //$this->provincias = Autonomiadiscapacidad::find($autonomia_id)->provincias;
                    break;
                case 'Prácticas':
                    $this->provincias = DB::table('provinciapracticas')->where('autonomiapractica_id','=',$autonomia_id)->get();
                    //$this->autonomias = DB::table('autonomiapracticas')->select(['id','name'])->get();
                    /*
                    $key = "provinciasautonomia".$autonomia_id."Practicas";
                    $this->provincias = Cache::rememberForever($key, function () use($autonomia_id){
                        return Autonomiapractica::find($autonomia_id)->provincias;
                    });
                    */
                    //$this->provincias = Autonomiapractica::find($autonomia_id)->provincias;
                    break;
                case 'Teletrabajo':
                    $this->provincias = DB::table('provinciateletrabajos')->where('autonomiateletrabajo_id','=',$autonomia_id)->get();
                    //$this->autonomias = DB::table('autonomiatyeletrabajos')->select(['id','name'])->get();

                    /*
                    $key = "provinciasautonomia".$autonomia_id."Teletrabajo";
                    $this->provincias = Cache::rememberForever($key, function () use($autonomia_id){
                        return Autonomiateletrabajo::find($autonomia_id)->provincias;
                    });
                    */
                    //$this->provincias = Autonomiateletrabajo::find($autonomia_id)->provincias;
                    break;
                default:
                    dd("error en updatedselectedTipoTrabajo");
            }

        }

        //$this->emitTo('jobs','filtersEmit',$autonomia_id,null,null,$this->selectedTipoTrabajo);
    }

    public function updatedSelectedProvincia($provincia_id)
    {

        dd("22222222222222222");
            switch ($this->selectedTipoTrabajo) {
                case 'Todos los trabajos':
                    /*
                    $key = "localidadesprovincia".$provincia_id."TodosTrabajos";
                    $this->localidades = Cache::rememberForever($key, function () use($provincia_id){
                        return Provinciatodo::find($provincia_id)->localidades;
                    });
                    */
                    $this->localidades =  DB::table('localidadtodos')->where('provinciatoda_id','=',$provincia_id)->get();

                    //$this->localidades = Provinciatodo::find($provincia_id)->localidades;
                    break;
                case 'Discapacidad':
                    /*
                    $key = "localidadesprovincia".$provincia_id."Discapacidad";
                    $this->localidades = Cache::rememberForever($key, function () use($provincia_id){
                        return Provinciadiscapacidad::find($provincia_id)->localidades;
                    });
                    */
                    $this->localidades =  DB::table('localidaddiscapacidads')->where('provinciadiscapacidad_id','=',$provincia_id)->get();


                    //$this->localidades = Provinciadiscapacidad::find($provincia_id)->localidades;
                    break;
                case 'Prácticas':
                    $this->localidades =  DB::table('localidadpracticas')->where('provinciapractica_id','=',$provincia_id)->get();
                    /*
                    $key = "localidadesprovincia".$provincia_id."Practicas";
                    $this->localidades = Cache::rememberForever($key, function () use($provincia_id){
                        return Provinciapractica::find($provincia_id)->localidades;
                    });
                    */
                    //$this->localidades = Provinciapractica::find($provincia_id)->localidades;
                    break;
                case 'Teletrabajo':
                    /*
                    $key = "localidadesprovincia".$provincia_id."Teletrabajo";
                    $this->localidades = Cache::rememberForever($key, function () use($provincia_id){
                        return Provinciateletrabajo::find($provincia_id)->localidades;
                    });
                    */
                    $this->localidades =  DB::table('localidadteletrabajos')->where('provinciateletrabajo_id','=',$provincia_id)->get();
                    //$this->localidades = Provinciateletrabajo::find($provincia_id)->localidades;
                    break;
                default:
                    dd("error en updatedselectedTipoTrabajo");

        }







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

        //$this->emitTo('jobs','filtersEmit',null,null,$localidad_id,$this->selectedTipoTrabajo);

    }
}
