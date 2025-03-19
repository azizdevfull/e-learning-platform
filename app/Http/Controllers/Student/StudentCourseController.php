<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    // Kurslar ro'yxati
    public function index()
    {
        $categories = Category::with('courses')->get();
        return view('student.courses.index', compact('categories'));
    }

    // Kurs detallari
    public function show(Course $course)
    {
        $lessons = $course->lessons;
        return view('student.courses.show', compact('course', 'lessons'));
    }
}
