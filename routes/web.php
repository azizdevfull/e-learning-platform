<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [HomeController::class, 'admin'])->name('admin.dashboard');
    });

    Route::middleware('role:teacher')->group(function () {
        Route::get('/teacher', [HomeController::class, 'teacher'])->name('teacher.dashboard');
    });

    Route::middleware('role:student')->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
        Route::post('/student/logout', [StudentController::class, 'logout'])->name('student.logout');

    });
});
Route::resource('courses', CourseController::class)->middleware('auth');
Route::prefix('courses/{course}/tests')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('courses.tests.index');
    Route::get('/create', [TestController::class, 'create'])->name('courses.tests.create');
    Route::post('/store', [TestController::class, 'store'])->name('courses.tests.store');
});
require __DIR__ . '/auth.php';
