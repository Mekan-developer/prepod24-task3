<?php

namespace App\Livewire;

use App\Models\Bid;
use Livewire\Component;

class delete_NavBar extends Component
{

    public $currentComponent = 'home', $userImage; // Default Livewire component to load

    public function loadComponent($component)
    {
        $this->currentComponent = $component;  // Switch the component to render
        
    }

    public function mount(){
        $this->userImage = auth()->user()->profile->image;
    }

    public function render()
    {
        $new_bids_count = Bid::where('showed_client',0)->count();

        return view('livewire.nav-bar',[
            'new_bids_count' => $$new_bids_count
        ]);
    }
}
