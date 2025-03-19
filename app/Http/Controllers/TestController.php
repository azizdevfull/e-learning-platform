<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($courseId)
    {
        $tests = Test::where('course_id', $courseId)->with('questions.answers')->get();
        return view('tests.index', compact('tests'));
    }

    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('tests.create', compact('course'));
    }

    public function store(Request $request, $courseId)
    {
        $request->validate(['title' => 'required|string|max:255']);

        Test::create([
            'title' => $request->title,
            'course_id' => $courseId,
        ]);

        return redirect()->route('courses.tests.index', $courseId);
    }
}
