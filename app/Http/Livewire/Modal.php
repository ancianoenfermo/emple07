<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $open = false;
    protected $listeners = ['showModal','showModal'];

    public function render()
    {
        return view('livewire.modal');
    }

    public function showModal() {
        dd("Estoy en showModal");
    }
}
