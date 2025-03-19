<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $courses = Auth::user()->courses;

        return view('student.dashboard', compact('courses'));
    }
    public function index()
    {
        $student = Auth::user();

        // Talabaning kurslari
        $courses = $student->courses()->get();

        // Test natijalari (oxirgi 7 kun ichidagi)
        $recentTests = $student->testResults()
            ->with('test')
            ->where('created_at', '>=', now()->subDays(7))
            ->latest()
            ->get();

        // Statistikalar
        $totalCourses = $courses->count();
        $totalTests = $student->testResults()->count();
        $averageScore = $student->testResults()->avg('score'); // Foiz sifatida

        return view('student.dashboard', compact(
            'student',
            'courses',
            'recentTests',
            'totalCourses',
            'totalTests',
            'averageScore'
        ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
