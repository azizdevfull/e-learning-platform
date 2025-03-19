<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Question;
use Illuminate\Http\Request;

class TestSubmissionController extends Controller
{
    public function show(Test $test)
    {
        $questions = $test->questions()->with('answers')->inRandomOrder()->get();
        return view('student.tests.show', compact('test', 'questions'));
    }

    public function submit(Request $request, Test $test)
    {
        $score = 0;
        $correctAnswers = 0;

        foreach ($request->answers as $question_id => $answer_id) {
            $question = Question::find($question_id);

            if ($question && $question->answers()->where('id', $answer_id)->where('is_correct', true)->exists()) {
                $correctAnswers++;
            }
        }

        $score = round(($correctAnswers / $test->questions->count()) * 100);

        return redirect()->route('student.tests.result', [$test->id, 'score' => $score]);
    }

    public function result(Test $test, Request $request)
    {
        $score = $request->query('score');
        return view('student.tests.result', compact('test', 'score'));
    }
}
