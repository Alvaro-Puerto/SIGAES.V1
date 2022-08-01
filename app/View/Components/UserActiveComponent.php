<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserActiveComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public bool $status;

    public int $id;

    public function __construct($status, $id)
    {
        $this->status = $status;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-active-component');
    }
}
