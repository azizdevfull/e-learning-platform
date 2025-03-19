<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::with('question')->get();
        return view('teacher.answers.index', compact('answers'));
    }

    public function create()
    {
        $questions = Question::with('test.course')->get();
        return view('teacher.answers.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'answer_text' => 'required|string|max:255',
            'is_correct' => 'required|boolean',
            'question_id' => 'required|exists:questions,id',
        ]);

        Answer::create($request->all());

        return redirect()->route('teacher.answers.index')
            ->with('success', 'Javob muvaffaqiyatli qo‘shildi!');
    }

    public function edit(Answer $answer)
    {
        $questions = Question::with('test.course')->get();
        return view('teacher.answers.edit', compact('answer', 'questions'));
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'answer_text' => 'required|string|max:255',
            'is_correct' => 'required|boolean',
            'question_id' => 'required|exists:questions,id',
        ]);

        $answer->update($request->all());

        return redirect()->route('teacher.answers.index')
            ->with('success', 'Javob muvaffaqiyatli yangilandi!');
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('teacher.answers.index')
            ->with('success', 'Javob o‘chirildi!');
    }
    public function destroyApi($id)
    {
        info($id);
        $answer = Answer::find($id);
        $answer->delete();
        return response()->json(['success' => true]);
    }
}
