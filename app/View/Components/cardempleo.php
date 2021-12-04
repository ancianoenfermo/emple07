<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardempleo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $empleo;
    public $index;


    public function __construct($empleo,$index)
    {
       
        $this->empleo = $empleo;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cardempleo');
    }
}
