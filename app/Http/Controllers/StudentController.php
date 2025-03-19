<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        // Mavjud kurslarni olish (avval kurslar moduli yozilgan)
        $courses = Course::with('tests')->get();

        return view('student.index', compact('courses'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Siz muvaffaqiyatli logout qildingiz!');
    }
}
