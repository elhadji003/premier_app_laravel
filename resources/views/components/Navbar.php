<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $links;

    public function __construct($links = [])
    {
        $this->links = $links;
    }

    public function render()
    {
        return view('components.navbar');
    }
}
