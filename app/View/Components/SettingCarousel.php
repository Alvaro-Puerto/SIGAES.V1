<?php

namespace App\View\Components;

use App\Models\CarouselIndex;
use Illuminate\View\Component;

class SettingCarousel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sliders = [];

    public function __construct()
    {
        $this->sliders = CarouselIndex::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.setting-carousel');
    }
}
