<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;



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

    // public function store(Request $request, $taskId)
    // {
    //     // Получаем задание
    //     $task = Task::findOrFail($taskId);

    //     // Проверяем, что текущий пользователь является участником (либо заказчиком, либо исполнителем)
    //     // if (Auth::user()->id !== $task->client_id && Auth::user()->id !== $task->performer_id) {
    //     //     abort(403, 'У вас нет доступа к этому чату.');
    //     // }

    //     // Определяем, кто является получателем
    //     $receiverId = (Auth::user()->id === $task->client_id) ? $task->performer_id : $task->client_id;

    //     // Сохраняем сообщение
    //     $message = new Message();
    //     $message->task_id = $taskId;
    //     $message->sender_id = Auth::user()->id;
    //     $message->receiver_id = $receiverId;
    //     $message->message = $request->input('message');
    //     $message->save();

    //     return redirect()->route('messages.index', $taskId)->with('success', 'Сообщение отправлено.');
    // }
}
