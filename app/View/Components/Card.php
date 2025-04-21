<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $count;
    public $href;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $count, $href)
    {
        $this->title = $title;
        $this->count = $count;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
