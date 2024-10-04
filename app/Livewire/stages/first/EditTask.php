<?php

namespace App\Livewire\stages\first;

use App\Models\Subject;
use App\Models\WorkType;
use Livewire\Component;

class EditTask extends Component
{
    public $fileChooseValidation = 'Файл не выбран';
    public $title, $work_type, $subject, $description, $deadline, $price, $taskFile;
    //for mount
    public $work_types,$subjects,$task,$todayFormatted;

    public function mount($task){

        $this->task = $task;
        $this->title= $task->title;$this->work_type = $task->work_type;$this->subject=$task->subject;
        $this->description=$task->description;$this->price=$task->price;$this->deadline=$task->deadline;

        $this->work_types = WorkType::where('status',true)->orderBy('order')->get();
        $this->subjects = Subject::where('status',true)->orderBy('order')->get();

        $this->todayFormatted = $task->deadline;
    }
    public function render()
    {
        sleep(2);
        return view('livewire.stages.first.edit-task');
    }

    // public function updatedTaskFile(){
    //     $this->fileChooseValidation = 'Файл выбран';
    // }
}
