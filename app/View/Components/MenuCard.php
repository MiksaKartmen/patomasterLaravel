<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories;
    public $mainCategories;
    public $items;


    public function __construct($categories,$mainCategories,$items)
    {
        $this->categories=$categories;
        $this->mainCategories=$mainCategories;
        $this->items=$items;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-card');
    }
}
