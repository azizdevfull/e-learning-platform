<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [
            // PHP nima? (question_id: 1)
            ['question_id' => 1, 'answer_text' => 'Dasturlash tili', 'is_correct' => true],
            ['question_id' => 1, 'answer_text' => 'Operatsion tizim', 'is_correct' => false],
            ['question_id' => 1, 'answer_text' => 'Ma’lumotlar bazasi', 'is_correct' => false],
            // O‘zgaruvchi nima? (question_id: 2)
            ['question_id' => 2, 'answer_text' => 'Ma’lumot saqlash uchun', 'is_correct' => true],
            ['question_id' => 2, 'answer_text' => 'Funktsiya', 'is_correct' => false],
            ['question_id' => 2, 'answer_text' => 'Shart operatori', 'is_correct' => false],
            // Rang nazariyasi nima? (question_id: 3)
            ['question_id' => 3, 'answer_text' => 'Ranglar haqidagi fan', 'is_correct' => true],
            ['question_id' => 3, 'answer_text' => 'Dizayn dasturi', 'is_correct' => false],
        ];

        foreach ($answers as $answer) {
            Answer::create($answer);
        }
    }
}
