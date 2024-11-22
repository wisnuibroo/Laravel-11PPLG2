<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DepartmentController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin',);
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/student', [StudentController::class, 'index']);

Route::get('/grade', [GradeController::class, 'index']);

Route::get('/department', [DepartmentController::class, 'index']);



