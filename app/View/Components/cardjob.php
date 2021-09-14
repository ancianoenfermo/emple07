<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardjob extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $job;
    public $index;

    public function __construct($job, $index)
    {
        $this->job = $job;
        $this->index = $index;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cardjob');
    }
}
