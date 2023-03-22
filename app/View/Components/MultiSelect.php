<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MultiSelect extends Component
{
    public $name;
    public $id;
    public $label;
    public $placeholder;
    public $options;
    public $required;
    public $disabled;

    public function __construct($name, $id, $label, $placeholder, $options, $required = false, $disabled = false)
    {
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->required = $required;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.multi-select');
    }
}
