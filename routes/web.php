<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\EnrollmentController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\TestSubmissionController;
use App\Http\Controllers\Teacher\AnswerController;
use App\Http\Controllers\Teacher\CategoryController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\LessonController;
use App\Http\Controllers\Teacher\QuestionController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\TestController;
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
        Route::prefix('teacher')->name('teacher.')->middleware('auth')->group(function () {
            Route::get('/', [TeacherController::class, 'index'])->name('dashboard');
            Route::resource('categories', CategoryController::class);
            Route::resource('courses', CourseController::class);
            Route::resource('courses.lessons', LessonController::class);

            Route::resource('tests', TestController::class);


            Route::resource('questions', QuestionController::class);
            Route::resource('answers', AnswerController::class);

        });
    });

    Route::middleware('role:student')->group(function () {
        Route::prefix('student')->name('student.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('dashboard');
            Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
            Route::get('/tests/{test}', [TestSubmissionController::class, 'show'])->name('tests.show');
            Route::post('/tests/{test}/submit', [TestSubmissionController::class, 'submit'])->name('tests.submit');
            Route::get('/tests/{test}/result', [TestSubmissionController::class, 'result'])->name('tests.result');

            Route::get('/courses', [EnrollmentController::class, 'index'])->name('courses.index');
            Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
        });
    });
});
Route::resource('courses', CourseController::class)->middleware('auth');
Route::prefix('courses/{course}/tests')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('courses.tests.index');
    Route::get('/create', [TestController::class, 'create'])->name('courses.tests.create');
    Route::post('/store', [TestController::class, 'store'])->name('courses.tests.store');
});
require __DIR__ . '/auth.php';
