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

        // Получаем все сообщения по этому заданию
        $messages = Message::where('task_id', $taskId)->orderBy('created_at')->get();

        return view('pages.messages.index', compact('task', 'messages','bid'));
    }
}
