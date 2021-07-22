<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Autonomiatodo;
use App\Models\Provinciatodo;
use App\Models\Localidadtodo;

class Filters2 extends Component
{
    public $selectedAutonomia = null, $selectedProvincia = null, $selectedLocalidad= null;
    public $autonomias = null;
    public $provincias = null;
    public $localidades = null;
    public $count;
    public function render()
    {
        $this->count += 1;
        return view('livewire.filters2');
    }

    public function mount() {
        $this->autonomias = Autonomiatodo::all();
    }

    public function updatedSelectedAutonomia($autonomia_id) {

        $this->provincias =Provinciatodo::where('autonomiatodo_id',$autonomia_id)->get();
        //$this->provincias = DB::table('provinciatodos')->where('autonomiatodo_id',$autonomia_id)->get();

    }

    public function updatedSelectedProvincia($provincia_id) {

        $this->localidades = Localidadtodo::where('provinciatodo_id',$provincia_id)->get();
    }
}
