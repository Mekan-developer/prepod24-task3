<?php

namespace App\Livewire\Pages\Messages;

use App\Models\Message;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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

        // Проверяем, что текущий пользователь является участником (либо заказчиком, либо исполнителем)
        // if (Auth::user()->id !== $task->client_id && Auth::user()->id !== $task->performer_id) {
        //     abort(403, 'У вас нет доступа к этому чату.');
        // }

        // Определяем, кто является получателем
        // $receiverId = (Auth::user()->id === $task->client_id) ? $task->performer_id : $task->client_id;

        // Сохраняем сообщение
        $message = new Message();
        $message->task_id = $taskId;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $task->client_id;
        $message->message = $this->message;
        
        $message->save();
        $this->getMessagess($taskId);

        // return redirect()->route('messages.index', $taskId)->with('success', 'Сообщение отправлено.');
    }

    public function getMessagess($id){
        
        $this->messages = Message::where('task_id', $id)->orderBy('created_at')->get();
    }
}
