<?php

namespace App\Livewire\Order;

use App\Models\Subject;
use App\Models\WorkType;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class NewOrder extends Component
{
    public $todayFormatted;
    public $title, $work_type, $subject, $description, $deadline, $price, $file;
    //for mount
    public $work_types,$subjects;


    public function mount(){
        $this->work_types = WorkType::where('status',true)->orderBy('order')->get();
        $this->subjects = Subject::where('status',true)->orderBy('order')->get();

        $this->todayFormatted = now()->format('Y-m-d');
    }

    public function render()
    {
        sleep(1);
        return view('livewire.order.new-order');
    }

    public function orderSave(){

        $validated = Validator::make(
            // Data to validate...
            [
                'title' => $this->title, 'work_type' => $this->work_type, 'subject' => $this->subject,
                'deadline' => $this->deadline, 'description' => $this->description, 'price' => $this->price, 
            ],
            // Validation rules to apply...
            [
                'title' => 'required|string|min:3', 'work_type' => 'required|string|min:3', 'subject' => 'required|string|min:3', 
                'deadline' => 'required|date|after:today','description' => 'nullable|string|min:6', 'price' => 'nullable|integer|min:2',
            ],
            // Custom validation messages...
            [
                'required' => 'Поле является обязательным.', 'deadline' => 'Поле срока выполнения должно быть датой после сегодняшнего дня.'
            ],
         )->validate();

        $validated['client_id'] = auth()->user()->id;

        auth()->user()->task()->create($validated);
        session()->flash('success', 'order created successfully!');
        $this->reset('title','work_type','subject','deadline', 'description', 'price');
        redirect()->route('order.index');
    }
}
