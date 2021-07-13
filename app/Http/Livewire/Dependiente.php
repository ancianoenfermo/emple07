<?php

namespace App\Http\Livewire;
use App\Models\Autonomia;
use App\Models\Provincia;
use App\Models\Localidade;

use Livewire\Component;

class Dependiente extends Component
{
    public $selectedAutonomia = null, $selectedProvincia = null, $selectedLocalidad = null;
    public $autonomias = null, $provincias = null, $localidades = null;

    public function render()
    {
        return view('livewire.dependiente');
    }
    public function mount() {
        $this->autonomias = Autonomia::all();
    }

    public function updatedSelectedAutonomia($autonomia_id) {
        if ($autonomia_id) {
            $this->reset('selectedProvincia');
            $this->reset('provincias');
            $this->provincias = Provincia::where('autonomia_id',$autonomia_id)->get();
        } else {
            $this->reset('selectedProvincia');
            $this->reset('provincias');
        }

    }
}
