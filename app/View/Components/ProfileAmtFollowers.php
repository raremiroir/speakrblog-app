<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileAmtFollowers extends Component
{

    public $user;
    public $extend = false;

    /**
     * Create a new component instance.
     */
    public function __construct($user, $extend = false)
    {
        $this->user = $user;
        $this->extend = $extend;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('profile.info.amt-followers');
    }
}
