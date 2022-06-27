<?php

namespace App\View\Components;

use App\Models\SchoolInformation;
use Illuminate\View\Component;

class InformationSchoolComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public string $information;
    public function __construct()
    {
        $school = SchoolInformation::offset(0)->limit(1)->first();
        if(!$school) {
            return redirect('/school/setting');
        } else {
          
                $this->information = $school->name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.information-school-component');
    }
}
