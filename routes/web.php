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
Route::get('/student/preview/{id}', [StudentController::class, 'preview'])->name('student.preview');
Route::get('/student/download/{id}', [StudentController::class, 'download'])->name('student.download');