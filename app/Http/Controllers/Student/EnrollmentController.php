<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with('category', 'lessons', 'teacher', 'students');

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        $courses = $query->paginate(6);
        $categories = Category::all();

        return view('courses.index', compact('courses', 'categories'));
    }


    public function enroll($courseId)
    {
        $user = Auth::user();

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
