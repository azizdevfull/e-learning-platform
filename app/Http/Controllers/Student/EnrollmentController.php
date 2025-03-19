<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $categories = Category::all();
        return view('student.courses.index', compact('courses', 'categories'));
    }

    public function enroll($courseId)
    {
        $user = auth()->user();

        // Avval yozilganligini tekshirish
        if ($user->enrollments()->where('course_id', $courseId)->exists()) {
            return redirect()->back()->with('message', 'Siz allaqachon bu kursga yozilgansiz.');
        }

        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $courseId,
        ]);

        return redirect()->route('student.dashboard')->with('message', 'Kursga muvaffaqiyatli yozildingiz!');
    }
}
