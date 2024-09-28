<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component
{

    public $maskedEmail;
    
    public function mount($maskedEmail){
        $this->maskedEmail = $maskedEmail;
    }

    public function render()
    {
        
        return view('livewire.profile');
    }
}
