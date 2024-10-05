<?php

namespace App\Livewire\stages\first;

use App\Models\Subject;
use App\Models\WorkType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTask extends Component
{
    use WithFileUploads;
    public $fileChooseValidation = 'Файл не выбран';
    public $title, $work_type, $subject, $description, $deadline, $price, $taskFile;
    //for mount
    public $work_types,$subjects,$task,$todayFormatted;

    public function mount($task){

        $this->task = $task;
        $this->title= $task->title;$this->work_type = $task->work_type;$this->subject=$task->subject;
        $this->description=$task->description;$this->price=$task->price;

        $this->work_types = WorkType::where('status',true)->orderBy('order')->get();
        $this->subjects = Subject::where('status',true)->orderBy('order')->get();

        $this->todayFormatted = $task->deadline;
    }
    public function render()
    {
        return view('livewire.stages.first.edit-task');
    }
    public function updatedTaskFile(){
        $this->fileChooseValidation = 'Файл выбран';
    }

    public function orderUpdate(){
        $validated = Validator::make(
            [
                'title' => $this->title,'work_type' => $this->work_type,'subject' => $this->subject,
                 'description' => $this->description, 'price' => $this->price
            ],
            [
                'title' => 'required|string|min:3', 'work_type' => 'nullable','subject' => 'nullable',
                'description' => 'nullable|string|min:6', 'price' => 'nullable|integer|min:2'
            ],
            [
                'required' => 'Поле является обязательным.'
            ]
         )->validate();

         if(isset($this->deadline)){
            $validated = Validator::make(
                [
                    'deadline' => $this->deadline
                ],
                [
                    'deadline' => 'nullable|date|after:'.$this->task->deadline
                ],
                [
                    'deadline' => 'Поле срока выполнения должно быть больше из старого крайнего Срока.'
                ]
            )->validate();
         }

        $validated['client_id'] = auth()->user()->id;
        if($this->taskFile){
            $fileName = $this->uploadFile($this->taskFile);
            $validated['file_path'] = $fileName;
        }

        $this->task->update($validated);
        session()->flash('success', 'order updated successfully!');
        $this->reset('title','work_type','subject','deadline', 'description', 'price');
        redirect()->route('order.index');
    }

    public function uploadFile($file)
    {
        if($this->task->file_path)
            $this->removeFile($this->task->file_path);    
        
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::random(10) . '.' . $extension;

        // Storing the image
        $file->storeAs('', $fileName, 'taskFile');
        return $fileName;

    }
    public function removeFile($path){
        if (Storage::disk('taskFile')->exists($path)) 
            Storage::disk('taskFile')->delete($path);
    }

    #[On('editCustomInput')]
    public function editCustomInput(){
        $this->subject = '';
    }



    // public function updatedTaskFile(){
    //     $this->fileChooseValidation = 'Файл выбран';
    // }
}
