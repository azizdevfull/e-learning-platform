<?php
// App/Http/Controllers/Student/TestSubmissionController.php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestSubmissionController extends Controller
{
    public function show(Test $test)
    {
        $questions = $test->questions()->with('answers')->get();

        return view('student.tests.show', compact('test', 'questions'));
    }

    public function submit(Request $request, Test $test)
    {
        $correctAnswers = 0;

        foreach ($test->questions as $question) {
            $selectedAnswer = $request->input('question_' . $question->id);

            if ($selectedAnswer) {
                $answer = Answer::find($selectedAnswer);
                if ($answer && $answer->is_correct) {
                    $correctAnswers++;
                }
            }
        }

        $totalQuestions = $test->questions->count();
        $score = ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0;

        return redirect()->route('student.tests.result', $test)->with('score', $score);
    }

    public function result(Test $test)
    {
        $score = session('score');

        return view('student.tests.result', compact('test', 'score'));
    }
}
