<?php


// use App\Http\Controllers\OrderController;
// use App\Http\Controllers\ProfileController;
use App\Livewire\NavBar;
use App\Livewire\Order\NewOrder;
use App\Livewire\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/profile',function(){return view('pages.profile');})->name('profile');

Route::get('/order',function(){return view('pages.order.new-order');})->name('create.order');


Auth::routes();

// Route::get('/home',NavBar::class)->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


