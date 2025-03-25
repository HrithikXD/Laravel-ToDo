<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('task.index');
});


Route::PUT('/task/{task}/complete', [TaskController::class, 'complete'])->name('task.complete');

Route::GET('/task/completed', [TaskController::class, 'completedTask'])->name('task.complete.list');

Route::resource('task', TaskController::class);

Route::fallback(function(){
    return redirect()->route('task.index');;
});

?>
