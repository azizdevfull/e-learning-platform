<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::whereHas('role', function ($query) {
            $query->where('name', 'teacher');
        })->latest()->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $teacherRole = Role::where('name', 'teacher')->firstOrFail();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $teacherRole->id,
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'O‘qituvchi muvaffaqiyatli qo‘shildi.');
    }

    public function edit(User $teacher)
    {
        if (!$teacher->isTeacher()) {
            return redirect()->route('admin.teachers.index')->with('error', 'Bu foydalanuvchi o‘qituvchi emas.');
        }
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, User $teacher)
    {
        if (!$teacher->isTeacher()) {
            return redirect()->route('admin.teachers.index')->with('error', 'Bu foydalanuvchi o‘qituvchi emas.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $teacher->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $teacher->password,
        ]);

        return redirect()->route('admin.teachers.index')->with('success', 'O‘qituvchi muvaffaqiyatli yangilandi.');
    }

    public function destroy(User $teacher)
    {
        if (!$teacher->isTeacher()) {
            return redirect()->route('admin.teachers.index')->with('error', 'Bu foydalanuvchi o‘qituvchi emas.');
        }

        if ($teacher->teacherCourses()->exists()) {
            return redirect()->route('admin.teachers.index')->with('error', 'Bu o‘qituvchiga tegishli kurslar mavjud, o‘chirib bo‘lmaydi.');
        }

        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'O‘qituvchi muvaffaqiyatli o‘chirildi.');
    }
}