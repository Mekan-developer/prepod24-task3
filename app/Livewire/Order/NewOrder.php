<?php

namespace App\Livewire\Order;

use App\Models\Subject;
use App\Models\WorkType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewOrder extends Component
{
    use WithFileUploads;

    public $todayFormatted, $fileChooseValidation = 'Файл не выбран';
    public $title, $work_type, $subject, $description, $deadline, $price, $taskFile;
    //for mount
    public $work_types,$subjects;
    // editing
    public $task;


    public function mount($task){
        if($task){
            $this->task = $task;
        }

        $this->work_types = WorkType::where('status',true)->orderBy('order')->get();
        $this->subjects = Subject::where('status',true)->orderBy('order')->get();

        $this->todayFormatted = now()->format('Y-m-d');
    }

    public function render()
    {
        sleep(0.5);
        return view('livewire.order.new-order');
    }

    public function updatedTaskFile(){
        $this->fileChooseValidation = 'Файл выбран';
    }

    public function orderSave(){
        $validated = Validator::make(
            [
                'title' => $this->title, 'work_type' => $this->work_type, 'subject' => $this->subject,
                'deadline' => $this->deadline, 'description' => $this->description, 'price' => $this->price, 
            ],
            [
                'title' => 'required|string|min:3', 'work_type' => 'required|string|min:3', 'subject' => 'required|string|min:3', 
                'deadline' => 'required|date|after:today','description' => 'nullable|string|min:6', 'price' => 'nullable|integer|min:2',
            ],
            [
                'required' => 'Поле является обязательным.', 'deadline' => 'Поле срока выполнения должно быть датой после сегодняшнего дня.'
            ],
         )->validate();

        $validated['client_id'] = auth()->user()->id;
        if($this->taskFile){
            $fileName = $this->uploadFile($this->taskFile);
            $validated['file_path'] = $fileName;
        }


        auth()->user()->task()->create($validated);
        session()->flash('success', 'order created successfully!');
        $this->reset('title','work_type','subject','deadline', 'description', 'price');
        redirect()->route('order.index');
    }


    public function uploadFile($file)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::random(10) . '.' . $extension;

        // Storing the image
        $file->storeAs('', $fileName, 'taskFile');
        return $fileName;

    }
}
