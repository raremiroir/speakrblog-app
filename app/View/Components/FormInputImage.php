<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInputImage extends Component
{
    public $label = "Upload an Image";

    /**
     * Create a new component instance.
     */
    public function __construct($label = "Upload an Image")
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.image');
    }
}
