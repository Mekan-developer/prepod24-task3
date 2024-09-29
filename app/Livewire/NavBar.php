<?php

namespace App\Livewire;

use Livewire\Component;

class NavBar extends Component
{

    public $currentComponent = 'home'; // Default Livewire component to load

    public function loadComponent($component)
    {
        $this->currentComponent = $component;  // Switch the component to render
        
    }

    public function render()
    {
        return view('livewire.nav-bar');
    }

    public function testGet(){
        dd('terr');
    }
}
