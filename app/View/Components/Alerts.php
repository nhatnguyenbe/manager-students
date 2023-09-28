<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alerts extends Component
{
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $message;
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alerts');
    }
}
