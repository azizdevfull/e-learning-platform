<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{
    // Kurslar ro'yxati
    public function index()
    {
        $courses = Auth::user()->courses()->with('category')->paginate(10);
        return view('student.courses.index', compact('courses'));
    }
    public function allCourses()
    {
        // Talabaning enroll qilgan kurslarining ID’larini olish
        $enrolledCourseIds = Auth::user()->courses()->pluck('courses.id')->toArray();

        // Barcha kurslardan enroll qilinganlarni chiqarib tashlash
        $courses = Course::with('category')
            ->whereNotIn('id', $enrolledCourseIds)
            ->paginate(10);

        return view('student.all-courses.index', compact('courses'));
    }
    // Kurs detallari
    public function show(Course $course)
    {
        $lessons = $course->lessons;
        return view('student.courses.show', compact('course', 'lessons'));
    }
}
