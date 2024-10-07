<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Task;
use Illuminate\Http\Request;

class BidController extends Controller
{
 
    public function store(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);

        // Проверяем, подавал ли этот пользователь уже заявку на это задание
        $existingBid = Bid::where('task_id', $taskId)->where('executor_id', auth()->user()->id)->first();
        if ($existingBid) {
            return redirect()->route('tasks.show', $taskId);
        }

        // Создаем заявку
        $bid = new Bid();
        $bid->task_id = $task->id;
        $bid->performer_id = auth()->user()->id;
        $bid->message = $request->input('message');
        $bid->bid_amount = $request->input('bid_amount');
        $bid->status = 'pending';
        $bid->save();

        return redirect()->route('messages.index', $task->id)->with('success', 'Заявка отправлена.');
    }

}
