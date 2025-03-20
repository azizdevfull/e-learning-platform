<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\TestController;
use App\Http\Controllers\Teacher\ForumController as TeacherForumController;
use App\Http\Controllers\Student\ForumController;
use App\Http\Controllers\Teacher\AnswerController;

use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Teacher\LessonController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Teacher\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Teacher\QuestionController;
use App\Http\Controllers\Student\EnrollmentController;
use App\Http\Controllers\Student\TestResultController;
use App\Http\Controllers\Student\StudentTestController;
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Student\StudentLessonController;
use App\Http\Controllers\Student\TestSubmissionController;
use App\Http\Controllers\Teacher\CourseStatisticsController;
use App\Http\Controllers\Teacher\StudentController as TeacherStudentController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\TestController as AdminTestController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('home');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [UserController::class, 'tests'])->name('profile');
        Route::resource('users', UserController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('teachers', AdminTeacherController::class);
        Route::resource('students', AdminStudentController::class);
        Route::resource('courses', AdminCourseController::class);
        Route::delete('/courses/{course}/students/{student}', [AdminCourseController::class, 'removeStudent'])->name('courses.remove-student');
        Route::resource('testimonials', TestimonialController::class);
        // testlar
        Route::resource('tests', AdminTestController::class);
        // Route::resource('tests.questions', QuestionController::class);

        // Savollar uchun route’lar
        Route::get('/tests/{test}/questions/create', [AdminTestController::class, 'createQuestion'])->name('tests.questions.create');
        Route::post('/tests/{test}/questions', [AdminTestController::class, 'storeQuestion'])->name('tests.questions.store');
        Route::get('/tests/{test}/questions/{question}/edit', [AdminTestController::class, 'editQuestion'])->name('tests.questions.edit');
        Route::put('/tests/{test}/questions/{question}', [AdminTestController::class, 'updateQuestion'])->name('tests.questions.update');
        Route::delete('/tests/{test}/questions/{question}', [AdminTestController::class, 'destroyQuestion'])->name('tests.questions.destroy');
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
            Route::get('/profile', [TeacherController::class, 'profile'])->name('profile');
            Route::post('/profile/update', [TeacherController::class, 'updateProfile'])->name('profile.update');

            Route::get('/courses/{course}/forum', [TeacherForumController::class, 'index'])->name('forum.index');
            Route::get('/courses/{course}/forum/{thread}', [TeacherForumController::class, 'show'])->name('forum.show');
            Route::post('/courses/{course}/forum/{thread}/posts', [TeacherForumController::class, 'storePost'])->name('forum.post.store');
            Route::delete('/courses/{course}/forum/{thread}/posts/{post}', [TeacherForumController::class, 'destroyPost'])->name('forum.post.destroy');
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
            Route::get('/all-courses', [StudentCourseController::class, 'allCourses'])->name('all.courses');

            // Bitta kursni ko‘rish
            Route::get('/courses/{course}', [StudentCourseController::class, 'show'])->name('courses.show');

            // Darslarni ko‘rish
            Route::get('/courses/{course}/lessons/{lesson}', [StudentLessonController::class, 'show'])->name('lessons.show');

            // Testlar
            Route::get('/tests', [StudentTestController::class, 'index'])->name('tests.index');
            // Route::get('/tests/{test}/result', [StudentTestController::class, 'result'])->name('tests.result');
            Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
            Route::post('/profile', [StudentController::class, 'updateProfile'])->name('profile.update');
            Route::get('/courses/{course}/forum', [ForumController::class, 'index'])->name('forum.index');
            Route::post('/courses/{course}/forum', [ForumController::class, 'storeThread'])->name('forum.store');
            Route::get('/courses/{course}/forum/{thread}', [ForumController::class, 'show'])->name('forum.show');
            Route::post('/courses/{course}/forum/{thread}/posts', [ForumController::class, 'storePost'])->name('forum.post.store');

            Route::put('/courses/{course}/forum/{thread}/posts/{post}', [ForumController::class, 'updatePost'])->name('forum.post.update');

        });
    });
});
// xamma kurslar ro'yxati qoshilish uchun
Route::get('/courses', [EnrollmentController::class, 'index'])->name('courses.index');



Route::prefix('courses/{course}/tests')->group(function () {
    Route::get('/', [TestController::class, 'index'])->name('courses.tests.index');
    Route::get('/create', [TestController::class, 'create'])->name('courses.tests.create');
    Route::post('/store', [TestController::class, 'store'])->name('courses.tests.store');
});
require __DIR__ . '/auth.php';
