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
    public $selectedOptions = [];

    public function __construct($name, $id, $label, $placeholder, $options, $required = false, $disabled = false, $selectedOptions = [])
    {
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->options = $options;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->selectedOptions = $selectedOptions;
    }

    public function render()
    {
        return view('components.multi-select');
    }
}
