<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('teacher.tests.show', $request->test_id)
            ->with('success', 'Savol muvaffaqiyatli qo‘shildi!');
    }

    public function edit(Question $question)
    {
        $tests = Test::with('course')->whereHas('course', function ($query) {
            $query->where('teacher_id', Auth::id());
        })->get();
        return view('teacher.questions.edit', compact('question', 'tests'));
    }

    public function update(Request $request, Question $question)
    {
        if ($question->test->course->teacher_id !== Auth::id()) {
            abort(403, 'Bu savol sizga tegishli emas');
        }

        $request->validate([
            'question_text' => 'required|string|max:255',
            'test_id' => 'required|exists:tests,id',
            'answers' => 'nullable|array',
            'answers.*.answer_text' => 'required|string|max:255',
            'answers.*.is_correct' => 'nullable|boolean',
            'new_answers' => 'nullable|array',
            'new_answers.*.answer_text' => 'nullable|string|max:255',
            'new_answers.*.is_correct' => 'nullable|boolean',
        ]);

        // Savolni yangilash
        $question->update([
            'question_text' => $request->question_text,
            'test_id' => $request->test_id,
        ]);

        // Mavjud variantlarni yangilash
        if ($request->has('answers')) {
            foreach ($request->answers as $answerId => $data) {
                $answer = Answer::find($answerId);
                if ($answer && $answer->question_id == $question->id) {
                    $answer->update([
                        'answer_text' => $data['answer_text'],
                        'is_correct' => isset($data['is_correct']) ? 1 : 0,
                    ]);
                }
            }
        }

        // O‘chirilgan variantlarni aniqlash va o‘chirish (yangi qo‘shilishdan oldin)
        $existingAnswerIds = $request->has('answers') ? array_keys($request->answers) : [];
        $question->answers()->whereNotIn('id', $existingAnswerIds)->delete();

        // Yangi variantlarni qo‘shish
        if ($request->has('new_answers')) {
            foreach ($request->new_answers as $data) {
                if (!empty($data['answer_text'])) { // Faqat bo‘sh bo‘lmaganlarni qo‘shamiz
                    $question->answers()->create([
                        'answer_text' => $data['answer_text'],
                        'is_correct' => isset($data['is_correct']) ? 1 : 0,
                    ]);
                }
            }
        }

        return redirect()->route('teacher.questions.show', $question->id)
            ->with('success', 'Savol va variantlar muvaffaqiyatli yangilandi!');
    }
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('teacher.questions.index')
            ->with('success', 'Savol o‘chirildi!');
    }
}
