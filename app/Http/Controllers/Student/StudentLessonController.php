<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class StudentLessonController extends Controller
{
    // Bitta darsni ko‘rish
    public function show(Course $course, Lesson $lesson)
    {
        return view('student.lessons.show', compact('course', 'lesson'));
    }
}
