<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Task;

class TaskController extends Controller
{


    public function showTasks(){
         // Get all tasks that are "Looking for performer" and don't have an assigned performer yet
        $tasks = Task::where('status', 'Looking for performer')
        ->whereNull('performer_id')->where('client_id','!=', auth()->user()->id)
        ->with('getClient') // Assuming you have a relationship to get the client
        ->get();
    
        return view('pages.stages.second.all-tasks', compact('tasks'));
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
