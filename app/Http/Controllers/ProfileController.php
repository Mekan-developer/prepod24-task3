<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        $email = auth()->user()->email;

        // Split the email into two parts: local part (before @) and domain part (after @)
        list($localPart, $domainPart) = explode('@', $email);

        // Take the first 4 characters of the local part and append '****'
        $maskedEmail = substr($localPart, 0, 4) . '****@' . $domainPart;

        return view('pages.profile',compact('maskedEmail'));
    }
}
