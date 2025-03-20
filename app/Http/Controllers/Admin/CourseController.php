<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['teacher', 'category'])->latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();
        $teachers = User::whereHas('role', fn($q) => $q->where('name', 'teacher'))->get();
        return view('admin.courses.create', compact('categories', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'required|exists:users,id',
            'image' => 'nullable|image|max:2048', // 2MB chegarasi
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Kurs muvaffaqiyatli qo‘shildi.');
    }

    public function show(Course $course)
    {
        $course->load(['teacher', 'category']);
        $students = $course->students()->latest()->paginate(10);
        return view('admin.courses.show', compact('course', 'students'));
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        $teachers = User::whereHas('role', fn($q) => $q->where('name', 'teacher'))->get();
        return view('admin.courses.edit', compact('course', 'categories', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'teacher_id' => 'required|exists:users,id',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($course->image) {
                $this->deletePhoto($course->image);
            }
            $data['image'] = $this->uploadFile($request->file('image'), 'courses');
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Kurs muvaffaqiyatli yangilandi.');
    }

    public function destroy(Course $course)
    {
        if ($course->enrollments()->exists()) {
            return redirect()->route('admin.courses.index')->with('error', 'Bu kursga talabalar yozilgan, o‘chirib bo‘lmaydi.');
        }

        if ($course->image) {
            $this->deletePhoto($course->image);
        }
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Kurs muvaffaqiyatli o‘chirildi.');
    }

    public function removeStudent(Course $course, User $student)
    {
        if (!$student->isStudent()) {
            return redirect()->route('admin.courses.show', $course)->with('error', 'Bu foydalanuvchi talaba emas.');
        }

        $course->students()->detach($student->id);
        return redirect()->route('admin.courses.show', $course)->with('success', 'Talaba kursdan chiqarildi.');
    }
}