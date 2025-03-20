<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $studentRole = Role::where("name", "student")->first();
        $teacherRole = Role::where("name", "teacher")->first();
        // dd($studentRole);
        $categories = Category::all();
        $courses = Course::with('category', 'lessons', 'students', 'teacher')->get();
        $students_count = User::where('role_id', $studentRole->id)->count();
        $teachers_count = User::where('role_id', $studentRole->id)->count();

        return view('welcome', compact('categories', 'courses', 'students_count', 'teachers_count'));
    }

    public function dashboard()
    {
        $role = Auth::user()->role->name;
        // dd($role);
        if ($role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role == 'teacher') {
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->route('student.dashboard');
        }
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function teacher()
    {
        return view('teacher.dashboard');
    }

    public function student()
    {
        return view('student.dashboard');
    }
}