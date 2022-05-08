<?php

namespace App\View\Components;

use App\Models\SchoolInformation;
use App\Models\SchoolYear;
use Illuminate\View\Component;

class LogoComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public string $logo;

    public function __construct()
    {
        //
        $school = SchoolInformation::offset(0)->limit(1)->first();
        if(!$school) {
            $this->logo = '';
        } else {
            $this->logo = $school->logo;
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo-component');
    }
}
