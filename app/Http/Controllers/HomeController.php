<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $role = auth()->user()->role->name;
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