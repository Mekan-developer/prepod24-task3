<?php

namespace App\Http\Controllers;

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
        return view('pages.order.new-order',['userImage' => $data['userImage'],'task' => $data['task']]);
    }

    public function lookingPerformer(Task $task){
        $userImage = auth()->user()->profile->image;
        return view('pages.order.looking-performers',[
            'userImage' => $userImage,
            'task' => $task
        ]);
    }
}
