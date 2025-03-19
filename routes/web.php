<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\EnrollmentController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\StudentController as TeacherStudentController;

use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Student\StudentLessonController;
use App\Http\Controllers\Student\StudentTestController;
use App\Http\Controllers\Student\TestResultController;
use App\Http\Controllers\Student\TestSubmissionController;
use App\Http\Controllers\Teacher\AnswerController;
use App\Http\Controllers\Teacher\CategoryController;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\CourseStatisticsController;
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
            Route::get('/students', [TeacherStudentController::class, 'index'])->name('students.index');
            Route::get('/students/{id}', [TeacherStudentController::class, 'show'])->name('students.show');

            Route::resource('questions', QuestionController::class);
            Route::resource('answers', AnswerController::class);
            Route::delete('/answers-api/{answer}', [AnswerController::class, 'destroy'])->name('answers.api.destroy');
            Route::get('/statistics', [CourseStatisticsController::class, 'index'])->name('statistics.index');
            Route::get('/statistics/course/{course}', [CourseStatisticsController::class, 'courseDetails'])->name('statistics.course.details');
            Route::get('/statistics/test/{test}', [CourseStatisticsController::class, 'testStatistics'])->name('statistics.test.details');

        });
    });

    Route::middleware('role:student')->group(function () {
        Route::prefix('student')->name('student.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('dashboard');
            Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
            Route::get('/tests/{test}', [TestSubmissionController::class, 'show'])->name('tests.show');
            Route::post('/tests/{test}/submit', [TestSubmissionController::class, 'submit'])->name('tests.submit');
            Route::get('/tests/{test}/result', [TestSubmissionController::class, 'result'])->name('tests.result');

            // xamma kurslar ro'yxati qoshilish uchun
            // Route::get('/courses', [EnrollmentController::class, 'index'])->name('courses.index');
            Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
            Route::get('/results', [TestResultController::class, 'index'])->name('results.index');

            // Kurslar ro'yxati
            Route::get('/courses', [StudentCourseController::class, 'index'])->name('courses.index');

            // Bitta kursni ko‘rish
            Route::get('/courses/{course}', [StudentCourseController::class, 'show'])->name('courses.show');

            // Darslarni ko‘rish
            Route::get('/courses/{course}/lessons/{lesson}', [StudentLessonController::class, 'show'])->name('lessons.show');

            // Testlar
            Route::get('/tests', [StudentTestController::class, 'index'])->name('tests.index');
            // Route::get('/tests/{test}/result', [StudentTestController::class, 'result'])->name('tests.result');

        });
    });


});
// Route::resource('courses', CourseController::class)->middleware('auth');

Route::get('/courses', [EnrollmentController::class, 'index'])->name('courses.index');



Route::prefix('courses/{course}/tests')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('courses.tests.index');
    Route::get('/create', [TestController::class, 'create'])->name('courses.tests.create');
    Route::post('/store', [TestController::class, 'store'])->name('courses.tests.store');
});
require __DIR__ . '/auth.php';
