<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Message;
use App\Models\Task;


class MessageController extends Controller
{
    public function index($taskId)
    {
        // Получаем задание
        $task = Task::findOrFail($taskId);

        $performer_id = auth()->user()->id;
        $bid = Bid::where('task_id', $taskId)->where('performer_id', $performer_id)->first();

        // Проверяем, что текущий пользователь является участником (либо заказчиком, либо исполнителем)
        // if (Auth::user()->id !== $task->client_id && Auth::user()->id !== $task->performer_id) {
        //     abort(403, 'У вас нет доступа к этому чату.');
        // }

        $task_id = $task->id;
        $client_id = $task->client_id;
        $auth_user_id = auth()->user()->id;
        
        // Get all messages related to this task between the client and authenticated user
        $messages = Message::where(function ($query) use ($task_id, $client_id, $auth_user_id) {
            $query->where('task_id', $task_id)
                  ->where('sender_id', $client_id)
                  ->where('receiver_id', $auth_user_id);
        })->orWhere(function ($query) use ($task_id, $client_id, $auth_user_id) {
            $query->where('task_id', $task_id)
                  ->where('sender_id', $auth_user_id)
                  ->where('receiver_id', $client_id);
        })->orderBy('created_at')->get();
        

        return view('pages.messages.index', compact('task', 'messages','bid'));
    }
}
