<?php

namespace App\View\Components;

use App\Models\CarouselIndex as ModelsCarouselIndex;
use ArrayObject;
use Illuminate\View\Component;

class CarouselIndex extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $urls = []; 
    public function __construct()
    {
        //
        $carousel = ModelsCarouselIndex::all();

        foreach ($carousel as $item) {
            array_push($this->urls, $item->url);
        }
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carousel-index');
    }
}
