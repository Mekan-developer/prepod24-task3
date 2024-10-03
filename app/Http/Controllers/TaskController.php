<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $userImage = auth()->user()->profile->image;
        return view('pages.order.my-orders',[
            'userImage' => $userImage,
        ]);
    }

    public function create(Task $task){
        $userImage = auth()->user()->profile->image;
        $data = [
            'userImage' => $userImage
        ];
        
        if($task){
            $data['task'] = $task;
        }
        return view('pages.stages.first.new-order',['userImage' => $data['userImage'],'task' => $data['task']]);
    }

    public function lookingPerformer(Task $task){

        Bid::where('task_id', $task->id)->update(['showed_client' => 1]);
        $bids = Bid::where('task_id', $task->id)->get();


        $userImage = auth()->user()->profile->image;
        return view('pages.stages.second.looking-performers',[
            'userImage' => $userImage,
            'task' => $task,
            'bids' => $bids
        ]);
    }
}
