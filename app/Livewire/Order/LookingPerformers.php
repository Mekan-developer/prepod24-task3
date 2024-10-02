<?php

namespace App\Livewire\Order;

use Livewire\Component;
use Livewire\WithFileUploads;


class LookingPerformers extends Component
{
    use WithFileUploads;
    public $fileChooseValidation = 'Прикрепить файл';
    public $task,$sendFile;

    public function mount($task)
    {
        sleep(0.5);
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.order.looking-performers');
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
