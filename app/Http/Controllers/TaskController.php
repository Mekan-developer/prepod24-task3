<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Task;

class TaskController extends Controller
{
    public function showTasks(){
        $userImage = auth()->user()->profile->image;
         // Get all tasks that are "Looking for performer" and don't have an assigned performer yet
        $tasks = Task::where('status', 'Looking for performer')
        ->whereNull('performer_id')->where('client_id','!=', auth()->user()->id)
        ->with('getClient') // Assuming you have a relationship to get the client
        ->paginate(10);
    
        return view('pages.performer.all-tasks', compact('tasks','userImage'));
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        // Проверяем статус задания
        if ($task->status !== 'Looking for performer') {
            return redirect()->route('tasks.showTasks')->with('error', 'Это задание недоступно.');
        }

        $performer_id = auth()->user()->id;
        $bid = Bid::where('task_id', $id)->where('performer_id', $performer_id)->first();
        if(is_null($bid)){
            return view('pages.performer.show', compact('task'));
        }

        return redirect()->route('messages.index',['taskId' => $id,'bid'=> $bid]);
        
    }


    public function edit(Task $task){
        $user_task = $task;
        return view('pages.stages.first.edit-task', [
            'task' =>$user_task
        ]);
    }

    public function index(){
        $userImage = auth()->user()->profile->image;
        return view('pages.order.my-orders',[
            'userImage' => $userImage,
        ]);
    }

    public function create(Task $task){
        $userImage = auth()->user()->profile->image;
        $data = ['userImage' => $userImage];
        
        if($task){
            $data['task'] = $task;
        }
        return view('pages.stages.first.new-order',['userImage' => $data['userImage'],'task' => $data['task']]);
    }

    public function lookingPerformer(Task $task){

        Bid::where('task_id', $task->id)->update(['showed_client' => 1]);
        $bids = Bid::where('task_id', $task->id)->with('getPerformer')->get();

        $userImage = auth()->user()->profile->image;
        return view('pages.stages.second.looking-performers',[
            'userImage' => $userImage,
            'task' => $task,
            'bids' => $bids
        ]);
    }
}
