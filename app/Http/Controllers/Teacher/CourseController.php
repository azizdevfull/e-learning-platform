<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Course'lar ro‘yxati
    public function index()
    {
        $courses = Course::with('category')->get();
        return view('teacher.courses.index', compact('courses'));
    }

    // Yangi course yaratish formasi
    public function create()
    {
        $categories = Category::all();
        return view('teacher.courses.create', compact('categories'));
    }

    // Yangi course ma'lumotlarini saqlash
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'teacher_id' => auth()->id()
        ]);

        return redirect()->route('teacher.courses.index')->with('success', 'Course muvaffaqiyatli yaratildi!');
    }

    // Course'ni tahrirlash formasi
    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('teacher.courses.edit', compact('course', 'categories'));
    }

    // Course ma'lumotlarini yangilash
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('teacher.courses.index')->with('success', 'Course muvaffaqiyatli yangilandi!');
    }

    // Course'ni o‘chirish
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('teacher.courses.index')->with('success', 'Course muvaffaqiyatli o‘chirildi!');
    }
}
