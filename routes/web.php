<?php
use App\Http\Controllers\BidController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => ['auth','checkActivity']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile',[UserProfileController::class,'index'])->name('profile');

    
    Route::get('/order',[TaskController::class,'create'])->name('order.create');
    Route::get('/my-orders',[TaskController::class,'index'])->name('order.index');
    Route::get('/tasks', [TaskController::class, 'showTasks'])->name('tasks.showTasks');
    Route::get('/task/{id}', [TaskController::class, 'show'])->name('task.show');
    Route::post('/task/{id}/bids', [BidController::class, 'store'])->name('bids.store');

    Route::get('/tasks/{taskId}/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/tasks/{taskId}/messages', [MessageController::class, 'store'])->name('messages.store');


    Route::get('/edit-order/{task}',[TaskController::class,'edit'])->name('order.edit');
    Route::get('/looking-performers/{task}',[TaskController::class,'lookingPerformer'])->name('order.looking');
});


Auth::routes();



