<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Course;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($course_id)
    {
        $course = Course::findOrFail($course_id);
        $tests = $course->tests;

        return view('teacher.tests.index', compact('course', 'tests'));
    }

    public function create($course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('teacher.tests.create', compact('course'));
    }

    public function store(Request $request, $course_id)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        Test::create([
            'title' => $request->title,
            'course_id' => $course_id
        ]);

        return redirect()->route('teacher.courses.tests.index', $course_id);
    }

    public function edit($course_id, $test_id)
    {
        $test = Test::findOrFail($test_id);
        return view('teacher.tests.edit', compact('test'));
    }

    public function update(Request $request, $course_id, $test_id)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $test = Test::findOrFail($test_id);
        $test->update($request->only('title'));

        return redirect()->route('teacher.courses.tests.index', $course_id);
    }

    public function destroy($course_id, $test_id)
    {
        $test = Test::findOrFail($test_id);
        $test->delete();

        return redirect()->route('teacher.courses.tests.index', $course_id);
    }
}
