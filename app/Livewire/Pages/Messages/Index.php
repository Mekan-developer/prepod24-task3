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

        // Сохраняем сообщение
        $message = new Message();
        $message->task_id = $taskId;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $task->client_id;
        $message->message = $this->message;
        
        $message->save();
        $this->getMessagess($taskId);
        $this->message = '';
    }

    
    public function getMessagess($id){
        $this->messages = Message::where('task_id', $id)->orderBy('created_at')->get();
        $this->dispatch('messageSent');
    }

    
}
