<?php


// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserProfileController;
use App\Livewire\NavBar;
use App\Livewire\Order\NewOrder;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/profile',[UserProfileController::class,'index'])->name('profile')->middleware('auth');

Route::get('/order',[OrderController::class,'index'])->name('create.order')->middleware('auth');


Auth::routes();

// Route::get('/home',NavBar::class)->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


