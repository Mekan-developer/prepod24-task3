<?php

use App\Http\Controllers\Auth\OTPController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


// Route::post('/create-user',[RegisterController::class,'createUser'])->name('register.user');

// 
// Route::post('send-otp',[RegisterController::class,'sendOTP'])->name('send.otp');
// Route::get('verify-OTP',function (){return view('auth.otp-verify');})->name('otp.verify');
// Route::post('test',[OTPController::class,'test'])->name('test');
// 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


