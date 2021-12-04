<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardempleo2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $empleo;
    

    public function __construct($empleo, $index)
    {
       dd("paso");
        $this->empleo = empleo;
        $this->index = $data->index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cardempleo2');
    }
}
