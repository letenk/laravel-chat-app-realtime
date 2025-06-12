<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/', HomeController::class)->name('dashboard');

    Route::get('/chat/{user:username}', [ChatController::class, 'show'])->name('chats.show');
    Route::post('/chat/{user:username}', [ChatController::class, 'store'])->name('chats.store');
});

Route::get('/broadcast-test', function () {
    broadcast(new \App\Events\MessageSent('Hello from backend!'));
    return 'event sent';
});

require __DIR__.'/auth.php';
