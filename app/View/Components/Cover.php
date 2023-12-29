<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cover extends Component
{
    /**
     * Create a new component instance.
     */
    public $cover ;
    public function __construct($cover)
    {
        $this->cover = $cover; 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cover');
    }
}
