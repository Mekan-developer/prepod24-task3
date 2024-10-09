<?php

namespace App\Livewire\Pages\Messages;

use App\Models\Message;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class Index extends Component
{
    public $task,$bid,$messages;

    public $message;
    public function mount($task,$bid,$messages){
        $this->task = $task;$this->bid = $bid;$this->messages=$messages;
    }
    public function render()
    {
        return view('livewire.pages.messages.index');
    }


    public function store($taskId){
        
        // Получаем задание
        $task = Task::findOrFail($taskId);
        $client_id = $task->client_id;
        // Сохраняем сообщение
        $message = new Message();
        $message->task_id = $taskId;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $task->client_id;
        $message->message = $this->message;
        
        $message->save();
        $this->getMessagess($taskId,$client_id);
        $this->message = '';
    }

    
    public function getMessagess($id,$client_id){
        // online user start
        $user = Auth::user();
        $user->last_active_at = now();
        $user->save();
        // online user end
        
        $task_id = $id;
        $auth_user_id = auth()->user()->id;

        // Get all messages related to this task between the client and authenticated user
        $this->messages = Message::where(function ($query) use ($task_id, $client_id, $auth_user_id) {
            $query->where('task_id', $task_id)
                ->where('sender_id', $client_id)
                ->where('receiver_id', $auth_user_id);
        })->orWhere(function ($query) use ($task_id, $client_id, $auth_user_id) {
            $query->where('task_id', $task_id)
                ->where('sender_id', $auth_user_id)
                ->where('receiver_id', $client_id);
        })->orderBy('created_at')->get();

// 
        $this->dispatch('messageSent');
    }

    
}
