<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        // O'quvchining yozilgan kurslari
        $courses = Auth::user()->courses;

        return view('student.dashboard', compact('courses'));
    }

    public function showCourse($courseId)
    {
        $course = Course::with('lessons')->findOrFail($courseId);

        // Kursga yozilganini tekshirish
        if (!Auth::user()->courses->contains($course)) {
            abort(403, 'Siz bu kursga yozilmagansiz!');
        }

        return view('student.course', compact('course'));
    }

    public function showLesson($courseId, $lessonId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = $course->lessons()->findOrFail($lessonId);

        return view('student.lesson', compact('course', 'lesson'));
    }
}
