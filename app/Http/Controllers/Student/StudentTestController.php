<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentTestController extends Controller
{
    public function index()
    {
        $studentId = Auth::id();

        // Faqat obuna bo'lgan kurslar
        $enrolledCourses = Enrollment::where('user_id', $studentId)->with('course.tests')->get();

        return view('student.tests.index', compact('enrolledCourses'));
    }

    public function result(Test $test)
    {
        // Test natijalarini olish (Misol uchun: foydalanuvchining to'g'ri javoblari)
        $studentId = Auth::id();
        $correctAnswers = $test->questions()->whereHas('answers', function ($query) use ($studentId) {
            $query->where('is_correct', true)
                ->where('student_id', $studentId);
        })->count();

        $totalQuestions = $test->questions->count();
        $score = ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0;

        return view('student.tests.result', compact('test', 'score'));
    }

}
