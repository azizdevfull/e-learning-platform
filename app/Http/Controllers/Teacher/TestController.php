<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Course;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the tests.
     */
    public function index()
    {
        $tests = Test::with('course')->get();
        return view('teacher.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new test.
     */
    public function create()
    {
        $courses = Course::all();
        // dd($courses);
        return view('teacher.tests.create', compact('courses'));
    }

    /**
     * Store a newly created test in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Test::create($request->all());

        return redirect()->route('teacher.tests.index')->with('success', 'Test muvaffaqiyatli yaratildi!');
    }

    /**
     * Display the specified test.
     */
    public function show(Test $test)
    {
        // Savollarni va javoblarni birgalikda yuklash
        $questions = $test->questions()->with('answers')->paginate(10);

        return view('teacher.tests.show', compact('test', 'questions'));
    }

    /**
     * Show the form for editing the specified test.
     */
    public function edit(Test $test)
    {
        $courses = Course::all();
        return view('teacher.tests.edit', compact('test', 'courses'));
    }

    /**
     * Update the specified test in the database.
     */
    public function update(Request $request, Test $test)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $test->update($request->all());

        return redirect()->route('teacher.tests.index')->with('success', 'Test muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified test from the database.
     */
    public function destroy(Test $test)
    {
        $test->delete();

        return redirect()->route('teacher.tests.index')->with('success', 'Test muvaffaqiyatli o‘chirildi!');
    }
}
