<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        })->latest()->paginate(10);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $studentRole = Role::where('name', 'student')->firstOrFail();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $studentRole->id,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Talaba muvaffaqiyatli qo‘shildi.');
    }

    public function edit(User $student)
    {
        if (!$student->isStudent()) {
            return redirect()->route('admin.students.index')->with('error', 'Bu foydalanuvchi talaba emas.');
        }
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, User $student)
    {
        if (!$student->isStudent()) {
            return redirect()->route('admin.students.index')->with('error', 'Bu foydalanuvchi talaba emas.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? bcrypt($request->password) : $student->password,
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Talaba muvaffaqiyatli yangilandi.');
    }

    public function destroy(User $student)
    {
        if (!$student->isStudent()) {
            return redirect()->route('admin.students.index')->with('error', 'Bu foydalanuvchi talaba emas.');
        }

        if ($student->enrollments()->exists()) {
            return redirect()->route('admin.students.index')->with('error', 'Bu talabaga tegishli kurslar mavjud, o‘chirib bo‘lmaydi.');
        }

        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Talaba muvaffaqiyatli o‘chirildi.');
    }
}