<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return redirect('/student');
});

Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/add', [StudentController::class, 'create']);
Route::post('/student/add', [StudentController::class, 'store']);
Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::put('/student/edit/{id}', [StudentController::class, 'update']);
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy']);