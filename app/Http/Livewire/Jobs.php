<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tipojob;
use App\Models\Job;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class Jobs extends Component
{
    use WithPagination;

    public $tipoTrabajo = null;
    public $autonomia = null;
    public $provincia = null;
    public $localidad = null;

    public $readyToLoad = false;

    protected $listeners = [
        'filtersEmit' => 'filtersEmit',
    ];

    public function render()
    {
        if($this->readyToLoad) {

            $jobs = $this->tipoTrabajo->jobs()
            ->autonomia($this->autonomia)
            ->paginate(10);


        } else {
            $jobs = [];
        }

        return view('livewire.jobs',compact('jobs'));
    }

    public function loadEmpleos() {
        $this->readyToLoad = true;
    }

    public function filtersEmit($autonomia,$provincia,$localidad,$tipoTrabajo) {
        $this->autonomia = $autonomia;
        $this->resetPage();
    }



}
