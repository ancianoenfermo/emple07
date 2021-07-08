<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provincia;
use NunoMaduro\Collision\Contracts\Provider;

class Localidades extends Component
{
    public $localidades = null;
    public $elegidaLocalidad = "Todas las Localidades";
    protected $listeners = [
        'ElegidaProvincia' => 'ElegidaProvincia',
        'ElegidaTodasProvincias' => 'ElegidaTodasProvincias'
    ];

    public function render()
    {
        return view('livewire.localidades');
    }
    public function ElegidaProvincia(Provincia $provincia)
    {
        $this->localidades = $provincia->localidades()->orderBy('name')->get();


    }
    public function ElegidaTodasProvincias()
    {
        $this->localidades = null;
        $this->reset(['elegidaLocalidad']);
    }


}
