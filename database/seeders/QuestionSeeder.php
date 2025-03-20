<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'test_id' => 1, // PHP Asoslari Testi
                'question_text' => 'PHP nima?',
            ],
            [
                'test_id' => 1,
                'question_text' => 'O‘zgaruvchi nima?',
            ],
            [
                'test_id' => 2, // Dizayn Testi
                'question_text' => 'Rang nazariyasi nima?',
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
