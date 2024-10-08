<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    
    public function index(){
        $userImage = auth()->user()->profile->image;
        return view('pages.profile',[
            'userImage' => $userImage
        ]);
    }
}
