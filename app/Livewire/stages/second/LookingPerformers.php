<?php

namespace App\Livewire\stages\second;

use App\Models\Message;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class LookingPerformers extends Component
{
    use WithFileUploads;
    public $fileChooseValidation = 'Прикрепить файл';
    public $task,$bids,$sendFile, $visibleDivId=null;

    // for chatt
    public $performer_id,$messages = null,$message;

    public function mount($task,$bids)
    {
        sleep(0.5);
        $this->bids = $bids;
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.stages.second.looking-performers');
    }

    public function toggleMessageDiv($id){
        if($this->visibleDivId == $id){
            $this->visibleDivId = null;
            $sms_performer_id = null;
            $sms_client_id = null;
            $this->messages = null;
        }else{
            $this->performer_id = $id;
            $sms_performer_id = $id;
            $sms_client_id = $this->task->client_id;
            $this->visibleDivId = $id;
            $this->messages = Message::where('task_id', $this->task->id)
                ->where(function ($query) use ($sms_performer_id, $sms_client_id) {
                    $query->where('sender_id', $sms_performer_id)
                        ->where('receiver_id', $sms_client_id);
                })
                ->orWhere(function ($query) use ($sms_performer_id, $sms_client_id) {
                    $query->where('sender_id', $sms_client_id)
                        ->where('receiver_id', $sms_performer_id);
                })->get();
        }
    }
    public function updatedSendFile()
    {
        // Perform validation or any action when a file is selected
        if ($this->sendFile) {
            $this->fileChooseValidation = 'Файл прикреплен';
        } else {
            $this->fileChooseValidation = null;
        }
    }

    public function storeChat($taskId){
        
        // Получаем задание
        // $task = Task::findOrFail($taskId);

        // Определяем, кто является получателем
        // $receiverId = (Auth::user()->id === $task->client_id) ? $this->performer_id : $task->client_id;
        // Сохраняем сообщение
        $message = new Message();
        $message->task_id = $taskId;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $this->performer_id;
        $message->message = $this->message;
        
        $message->save();

        $sms_performer_id = $this->performer_id;
        $sms_client_id = Auth::user()->id;
        $this->messages = Message::where('task_id', $this->task->id)
                ->where(function ($query) use ($sms_performer_id, $sms_client_id) {
                    $query->where('sender_id', $sms_performer_id)
                        ->where('receiver_id', $sms_client_id);
                })
                ->orWhere(function ($query) use ($sms_performer_id, $sms_client_id) {
                    $query->where('sender_id', $sms_client_id)
                        ->where('receiver_id', $sms_performer_id);
                })->get();
                $this->message = '';
        // return redirect()->route('messages.index', $taskId)->with('success', 'Сообщение отправлено.');
    }
}
