<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::with('course')->latest()->paginate(10);
        return view('admin.tests.index', compact('tests'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.tests.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Test::create($request->only('title', 'course_id'));

        return redirect()->route('admin.tests.index')->with('success', 'Test muvaffaqiyatli qo‘shildi.');
    }

    public function show(Test $test)
    {
        $test->load(['course', 'questions.answers']);
        return view('admin.tests.show', compact('test'));
    }

    public function edit(Test $test)
    {
        $courses = Course::all();
        return view('admin.tests.edit', compact('test', 'courses'));
    }

    public function update(Request $request, Test $test)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $test->update($request->only('title', 'course_id'));

        return redirect()->route('admin.tests.index')->with('success', 'Test muvaffaqiyatli yangilandi.');
    }

    public function destroy(Test $test)
    {
        $test->delete();
        return redirect()->route('admin.tests.index')->with('success', 'Test muvaffaqiyatli o‘chirildi.');
    }

    // Savol qo‘shish
    public function createQuestion(Test $test)
    {
        return view('admin.tests.questions.create', compact('test'));
    }

    public function storeQuestion(Request $request, Test $test)
    {
        $request->validate([
            'question_text' => 'required|string',
            'answers' => 'required|array|min:2',
            'answers.*.answer_text' => 'required|string',
            'answers.*.is_correct' => 'nullable|boolean',
        ]);

        $question = $test->questions()->create([
            'question_text' => $request->question_text,
        ]);

        $correctCount = array_sum(array_column($request->answers, 'is_correct'));
        if ($correctCount === 0) {
            $question->delete();
            return back()->withErrors(['answers' => 'Kamida bitta to‘g‘ri javob bo‘lishi kerak.']);
        }

        foreach ($request->answers as $answer) {
            $question->answers()->create([
                'answer_text' => $answer['answer_text'],
                'is_correct' => $answer['is_correct'] ?? false,
            ]);
        }

        return redirect()->route('admin.tests.show', $test)->with('success', 'Savol muvaffaqiyatli qo‘shildi.');
    }

    // Savolni tahrirlash
    public function editQuestion(Test $test, Question $question)
    {
        $question->load('answers');
        return view('admin.tests.questions.edit', compact('test', 'question'));
    }

    public function updateQuestion(Request $request, Test $test, Question $question)
    {
        $request->validate([
            'question_text' => 'required|string',
            'answers' => 'required|array|min:2',
            'answers.*.answer_text' => 'required|string',
            'answers.*.is_correct' => 'required|boolean',
        ]);

        $correctCount = array_sum(array_column($request->answers, 'is_correct'));
        if ($correctCount === 0) {
            return back()->withErrors(['answers' => 'Kamida bitta to‘g‘ri javob bo‘lishi kerak.']);
        }

        $question->update(['question_text' => $request->question_text]);
        $question->answers()->delete(); // Eski javoblarni o‘chirish
        foreach ($request->answers as $answer) {
            $question->answers()->create([
                'answer_text' => $answer['answer_text'],
                'is_correct' => $answer['is_correct'],
            ]);
        }

        return redirect()->route('admin.tests.show', $test)->with('success', 'Savol muvaffaqiyatli yangilandi.');
    }

    public function destroyQuestion(Test $test, Question $question)
    {
        $question->delete();
        return redirect()->route('admin.tests.show', $test)->with('success', 'Savol muvaffaqiyatli o‘chirildi.');
    }
}