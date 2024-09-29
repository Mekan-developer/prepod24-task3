<?php

namespace App\Livewire\Order;

use Livewire\Component;

class NewOrder extends Component
{

    public $todayFormatted;
    public function mount(){
        $this->todayFormatted = now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.order.new-order');
    }
}
