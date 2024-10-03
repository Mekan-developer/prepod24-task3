<?php

namespace App\Livewire\Order;

use App\Models\Bid;
use App\Models\Order;
use App\Models\Task;
use Livewire\Component;

class MyOrders extends Component
{
    public $tasks;

    public function mount(){
        $this->tasks = Task::where('client_id',auth()->user()->id)->get();
    }



    public function render()
    {
        $user_tasks = $this->tasks; $this->reset('tasks');

        $new_bids = Bid::where('showed_client', 0)
        ->whereHas('getTask', function ($query) {
            $query->where('client_id', auth()->user()->id);
        })
        ->get();


        return view('livewire.order.my-orders',[
            'user_tasks' => $user_tasks,
            'new_bids' => $new_bids
        ]);
    }
}
