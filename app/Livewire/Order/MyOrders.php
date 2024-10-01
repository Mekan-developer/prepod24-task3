<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\Task;
use Livewire\Component;

class MyOrders extends Component
{
    public $tasks;

    public function mount(){
        $user_id = auth()->user()->id;
        $this->tasks = Task::where('client_id',$user_id)->get();
    }



    public function render()
    {
        $user_tasks = $this->tasks;
        $this->reset('tasks');

        return view('livewire.order.my-orders',[
            'user_tasks' => $user_tasks
        ]);
    }
}
