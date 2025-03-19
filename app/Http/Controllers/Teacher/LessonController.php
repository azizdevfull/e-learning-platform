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


    public function store(Request $request, $course_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'video_url' => 'nullable|url'
        ]);

        Lesson::create([
            'title' => $request->title,
            'content' => $request->content,
            'video_url' => $request->video_url,
            'course_id' => $course_id
        ]);

        return redirect()->route('teacher.courses.lessons.index', $course_id);
    }

    public function edit($course_id, $lesson_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        return view('teacher.lessons.edit', compact('lesson'));
    }


    public function update(Request $request, $course_id, $lesson_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'video_url' => 'nullable|url'
        ]);

        $lesson = Lesson::findOrFail($lesson_id);
        $lesson->update($request->only(['title', 'content', 'video_url']));

        return redirect()->route('teacher.courses.lessons.index', $course_id);
    }

    public function destroy($course_id, $lesson_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $lesson->delete();

        return redirect()->route('teacher.courses.lessons.index', $course_id);
    }
}
