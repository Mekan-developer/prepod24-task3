<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Task;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $userImage = auth()->user()->profile->image;
        return view('pages.order.my-orders',[
            'userImage' => $userImage,
        ]);
    }

    public function create(){
        $userImage = auth()->user()->profile->image;
        return view('pages.order.new-order',[
            'userImage' => $userImage
        ]);
    }

    public function lookingPerformer(Task $task){
        $userImage = auth()->user()->profile->image;
        return view('pages.order.looking-performers',[
            'userImage' => $userImage,
            'task' => $task
        ]);
    }
}
