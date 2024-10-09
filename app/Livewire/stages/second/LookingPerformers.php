<?php

namespace App\Livewire\stages\second;


use App\Models\Message;
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
            $this->messages = null;
        }else{
            $this->performer_id = $id;
            $this->visibleDivId = $id;
            
            $this->getChatMessages($id);
            $this->dispatch('scrollDown');
            
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
        $message = new Message();
        $message->task_id = $taskId;
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $this->performer_id;
        $message->message = $this->message;
        
        $message->save();
        $this->getChatMessages($this->performer_id);
        
        $this->dispatch('scrollDown');
    }

    public function getChatMessages($sms_performer_id){
        

        $task_id = $this->task->id;
        $auth_user = auth()->user()->id;

        // Get all messages related to this task between the client and authenticated user
        $this->messages = Message::where(function ($query) use ($task_id, $auth_user, $sms_performer_id) {
            $query->where('task_id', $task_id)
                ->where('sender_id', $auth_user)
                ->where('receiver_id', $sms_performer_id);
        })->orWhere(function ($query) use ($task_id, $auth_user, $sms_performer_id) {
            $query->where('task_id', $task_id)
                ->where('sender_id', $sms_performer_id)
                ->where('receiver_id', $auth_user);
        })->orderBy('created_at')->get();


        // online user start
        $user = Auth::user();
        $user->last_active_at = now();
        $user->save();
        // online user end
    }
}
