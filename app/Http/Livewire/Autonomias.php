<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Models\Autonomia;
use SebastianBergmann\Environment\Console;

class Autonomias extends Component
{
    public $autonomias = null;
    public $elegidaAutonomia = "Todas las Autonomías";
    public $anteriorAutonomia = null;

    public function render()
    {
        return view('livewire.autonomias');
    }
    public function mount()
    {
        if (Cache::has('todasAutonomias')) {
            $autonomias = Cache::get('todasAutonomias');
        } else {
            $autonomias = Autonomia::orderBy('name')->get();
            Cache::put('todasAutonomias', $autonomias);
        }
        $this->autonomias = $autonomias;
    }

    public function autonomiaClick(Autonomia $autonomia)
    {
        if ($this->anteriorAutonomia <> $autonomia->name) {
            $this->elegidaAutonomia = $autonomia->name;
            $this->emitTo('provincias', 'ElegidaAutonomia', $autonomia);
            $this->anteriorAutonomia = $autonomia->name;
        }
    }

    public function autonomiaTodasClick()
    {
        $this->reset(['elegidaAutonomia','anteriorAutonomia']);
        $this->emitTo('provincias', 'ElegidaTodasAutonomias');
    }
}
