<?php

namespace App\Livewire\Order;

use App\Models\Subject;
use App\Models\WorkType;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class NewOrder extends Component
{
    public $todayFormatted;
    public $work_topic, $work_type, $subject, $explanation, $due_date, $budget, $file;
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
            ['work_topic' => $this->work_topic, 'work_type' => $this->work_type, 'subject' => $this->subject,'due_date' => $this->due_date,],
            // Validation rules to apply...
            [
                'work_topic' => 'required|string|min:3', 'work_type' => 'required|string|min:3', 'subject' => 'required|string|min:3', 'due_date' => 'required|date|after:today',
                'explanation' => 'nullable|string|min:10', 'budget' => 'nullable|file|min:5120',
            ],
            // Custom validation messages...
            ['required' => 'Поле является обязательным.'],
         )->validate();

        auth()->user()->order()->create($validated);
        $this->reset('work_topic','work_type','subject','due_date');
    }
}
