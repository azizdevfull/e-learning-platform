<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // Course'lar ro‘yxati
    public function index()
    {
        $courses = Course::with('category')->get();
        return view('teacher.courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('teacher.courses.show', compact('course'));
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
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'teacher_id' => Auth::id(),
            'image' => $this->uploadFile($request->file('image'), 'courses')
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
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $this->deletePhoto($course->image);
            $course->update([
                'image' => $this->uploadFile($request->file('image'), 'courses')
            ]);
        }

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
        $this->deletePhoto($course->image);
        $course->delete();

        return redirect()->route('teacher.courses.index')->with('success', 'Course muvaffaqiyatli o‘chirildi!');
    }
}
