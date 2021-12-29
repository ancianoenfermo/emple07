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
    public $dataFilter = ['autonomia'=>null,'provincia'=>null,'localidad'=>null,
     'contrato'=>null,'jornada'=>null,'experiencia'=>null, 'solo discapacidad'=>null,
     'solo prácticas'=>null, 'solo teletrabajo'=> null, 'solo 100% teletrabajo' =>null, 'solo ett'=>null,'solo sin tipo' => null,
     'solo salario anual'=>null, 'solo salario mensual'=>null, 'solo salario por hora'=>null,'solo salario según convenio'=>null,"solo con salario"=>null,
     'h1'=>null];





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
            //dd($this->dataFilter);
        }
        $h1Title = "Ofertas de trabajo en España";

        $empleos =Empleo::orderby('orden')

            ->isAutonomia($this->dataFilter['autonomia'])
            ->isProvincia($this->dataFilter['provincia'])
            ->isLocalidad($this->dataFilter['localidad'])
            ->isContrato($this->dataFilter['contrato'])
            ->isJornada($this->dataFilter['jornada'])
            ->NoExperiencia($this->dataFilter['experiencia'])
            ->IsSalarioAnual($this->dataFilter['solo salario anual'])
            ->IsSalarioMes($this->dataFilter['solo salario mensual'])
            ->IsSalarioHoras($this->dataFilter['solo salario por hora'])
            ->IsSalarioConvenio($this->dataFilter['solo salario según convenio'])
            ->IsSalarioCon($this->dataFilter['solo con salario'])


            ->NoTipo($this->dataFilter['solo sin tipo'])
            ->NoDiscapacidad($this->dataFilter['solo discapacidad'])
            ->NoPracticas($this->dataFilter['solo prácticas'])
            ->NoTeletrabajo($this->dataFilter['solo teletrabajo'])
            ->No100Teletrabajo($this->dataFilter['solo 100% teletrabajo'])
            ->NoEtt($this->dataFilter['solo ett'])
            ->paginate(25);
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
        $this->filters = [];
        foreach ($dataFilter as $key => $value){
            if (!is_null($value)) {
                if ($key =="h1"){
                    continue;
                }
                if ($key == "autonomia" or $key =='provincia' or $key =='localidad' or $key =='contrato' or $key =='jornada' ) {
                    array_push($this->filters,$value);
                } else {
                    array_push($this->filters,$key);
                }
            }
         }

    }

}
/*
->NoExperiencia($this->dataFilter['experiencia'])
            ->NoDiscapacidad($this->dataFilter['no discapacidad'])
            ->NoPracticas($this->dataFilter['no practicas'])
            ->NoTeletrabajo($this->dataFilter['no teletrabajo'])
            ->No100Teletrabajo($this->dataFilter['no 100%teletrabajo'])
            ->NoEtt($this->dataFilter['no ett'])
            ->NoTipo($this->dataFilter['no sin tipo'])

*/
