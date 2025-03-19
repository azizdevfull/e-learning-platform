<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('test.course')->get();
        return view('teacher.questions.index', compact('questions'));
    }
    public function show(Question $question)
    {
        $question->load('answers'); // Question bilan birga Answer'larni yuklaymiz
        return view('teacher.questions.show', compact('question'));
    }

    public function create()
    {
        $tests = Test::with('course')->get();
        return view('teacher.questions.create', compact('tests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string|max:255',
            'test_id' => 'required|exists:tests,id',
        ]);

        Question::create($request->only('question_text', 'test_id'));

        return redirect()->route('teacher.questions.index')
            ->with('success', 'Savol muvaffaqiyatli qo‘shildi!');
    }

    public function edit(Question $question)
    {
        $tests = Test::with('course')->get();
        return view('teacher.questions.edit', compact('question', 'tests'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'question_text' => 'required|string|max:255',
            'test_id' => 'required|exists:tests,id',
        ]);

        $question->update($request->only('question_text', 'test_id'));

        return redirect()->route('teacher.questions.index')
            ->with('success', 'Savol muvaffaqiyatli yangilandi!');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('teacher.questions.index')
            ->with('success', 'Savol o‘chirildi!');
    }
}
