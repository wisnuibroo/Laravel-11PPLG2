<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\StudentAdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\Admin\GradeAdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Admin\DepartmentAdminController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin',);
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/student', [StudentController::class, 'index']);
Route::get('/student-admin', [StudentAdminController::class, 'index']);

Route::get('/grade', [GradeController::class, 'index']);
Route::get('/grade-admin', [GradeAdminController::class, 'index']);

Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department-admin', [DepartmentAdminController::class, 'index']);


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('student')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\StudentAdminController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\StudentAdminController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\Admin\StudentAdminController::class, 'store']);
        Route::get('/edit/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'edit']);
        Route::put('/update/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'update']);
        Route::delete('/delete/{student}', [\App\Http\Controllers\Admin\StudentAdminController::class, 'destroy']);
    });
    // Grade Routes
    Route::prefix('grade')->group(function () {
        Route::get('/', [GradeAdminController::class, 'index'])->name('admin.grades.index');
        Route::get('/create', [GradeAdminController::class, 'create'])->name('admin.grades.create');
        Route::post('/store', [GradeAdminController::class, 'store'])->name('admin.grades.store');
        Route::get('/edit/{grade}', [GradeAdminController::class, 'edit'])->name('admin.grades.edit');
        Route::put('/update/{grade}', [GradeAdminController::class, 'update'])->name('admin.grades.update');
        Route::delete('/delete/{grade}', [GradeAdminController::class, 'destroy'])->name('admin.grades.destroy');
    });
    Route::prefix('department')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'store']);
        Route::get('/edit/{department}', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'edit']);
        Route::put('/update/{department}', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'update']);
        Route::delete('/delete/{department}', [\App\Http\Controllers\Admin\DepartmentAdminController::class, 'destroy']);
    });
});



