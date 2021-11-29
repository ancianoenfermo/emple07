<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleo;
use App\Models\Excerpt;
use Livewire\WithPagination;

use function PHPUnit\Framework\isNull;

class EmpleosLivewire extends Component
{
    use WithPagination;
    public $dataFilter = ['autonomia'=>null,'provincia'=>null,'localidad'=>null, 'contrato'=>null,'jornada'=>null,'experiencia'=>null,'h1'=>null];

    public $open=false;
    public $excerpt;
    public $title;
    public $h1Title = "Ofertas de trabajo en España";
    public $totalEmpleos = null;
    public $filters =[];
    public $cont =0;
    protected $listeners = [
        'clickUbicacionBuscar'
    ];


    public function render()
    {
        $this->cont += 1;


        if(is_null($this->dataFilter['h1'])) {
            $this->h1Title = "Ofertas de trabajo en España";
        } else {
            $this->h1Title= $this->dataFilter['h1'];
        }

        if($this->cont > 1) {
            //dd($this->filters);
        }
        $h1Title = "Ofertas de trabajo en España";

        $empleos =Empleo::orderby('orden')
            ->isAutonomia($this->dataFilter['autonomia'])
            ->isProvincia($this->dataFilter['provincia'])
            ->isLocalidad($this->dataFilter['localidad'])
            ->isContrato($this->dataFilter['contrato'])
            ->isJornada($this->dataFilter['jornada'])
            ->isExperiencia($this->dataFilter['experiencia'])
            ->paginate(10);
        $this->totalEmpleos = $empleos->total();
        return view('livewire.empleos-livewire', compact('empleos'));
    }
    public function showExceprt(Empleo $empleo) {

        $this->title = $empleo->title;
        $a = Excerpt::where('id',$empleo->excerpt_id)->first();
        $this->excerpt = $a->excerpt;
        $this->open = true;
    }
    public function clickUbicacionBuscar($dataFilter) {
        $this->resetPage();
        $this->dataFilter = $dataFilter;

        foreach ($dataFilter as $key => $value){
            if (!is_null($value)) {
                if ($key =="h1"){
                    continue;
                }

                array_push($this->filters,$key);
            }
         }

    }

}
