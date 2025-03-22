<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($course_id)
    {
        $course = Course::findOrFail($course_id);
        $lessons = $course->lessons;

        return view('teacher.lessons.index', compact('course', 'lessons'));
    }

    public function create($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('teacher.lessons.create', compact('course'));
    }


    public function store(Request $request, $courseId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,docx,mp4,jpg,png|max:20480',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $this->uploadFile($request->file('file'));
        }

        Lesson::create([
            'title' => $request->title,
            'content' => $request->content,
            'file_path' => $filePath,
            'course_id' => $courseId,
        ]);

        return redirect()->route('teacher.courses.lessons.index', $courseId)
            ->with('success', 'Dars muvaffaqiyatli qo‘shildi!');
    }

    public function show($courseId, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $course = Course::findOrFail($courseId);
        return view('teacher.lessons.show', compact('lesson', 'course'));
    }
    public function edit($courseId, $lessonId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);

        return view('teacher.lessons.edit', compact('course', 'lesson'));
    }



    public function update(Request $request, $courseId, $lessonId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,docx,mp4,jpg,png|max:20480',
        ]);

        $lesson = Lesson::findOrFail($lessonId);

        $filePath = $lesson->file_path;
        if ($request->hasFile('file')) {
            if ($filePath) {
                $this->deletePhoto($lesson->file_path);
            }
            $filePath = $this->uploadFile($request->file('file'));
        }

        $lesson->update([
            'title' => $request->title,
            'content' => $request->content,
            'file_path' => $filePath,
        ]);

        return redirect()->route('teacher.courses.lessons.index', $courseId)
            ->with('success', 'Dars muvaffaqiyatli yangilandi!');
    }


    public function destroy($course_id, $lesson_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $this->deletePhoto($lesson->file_path);
        $lesson->delete();

        return redirect()->route('teacher.courses.lessons.index', $course_id);
    }
}
