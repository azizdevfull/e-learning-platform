<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $teacher = Auth::user(); // Teacher
        $students = Enrollment::whereHas('course', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })->with('user')
            ->latest()
            ->paginate(10);

        $students = $students->pluck('user')->unique(); // Takroriylarni olib tashlash
        return view('teacher.students.index', compact('students'));
    }
    public function show($id)
    {
        // dd($id);
        $student = User::with(['courses', 'enrollments.course', 'testResults.test'])
            // ->where('role_id', 3) // 3 — Student roli deb olamiz
            ->findOrFail($id);

        return view('teacher.students.show', compact('student'));
    }



}
