<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $userImage = auth()->user()->profile->image;
        return view('pages.order.new-order',[
            'userImage' => $userImage
        ]);
    }
}
