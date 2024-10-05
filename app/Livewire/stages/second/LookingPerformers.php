<?php

namespace App\Livewire\stages\second;

use Livewire\Component;
use Livewire\WithFileUploads;


class LookingPerformers extends Component
{
    use WithFileUploads;
    public $fileChooseValidation = 'Прикрепить файл';
    public $task,$bids,$sendFile, $visibleDivId=null;

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
        }else{
            $this->visibleDivId = $id;
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
}
