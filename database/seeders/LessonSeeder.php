<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = [
            [
                'title' => 'PHP Kirish',
                'content' => 'PHP haqida umumiy ma’lumot va uning tarixi.',
                'video_url' => 'https://example.com/videos/php_intro.mp4',
                'file_path' => 'files/php_intro.pdf',
                'course_id' => 1, // PHP Asoslari
            ],
            [
                'title' => 'O‘zgaruvchilar bilan ishlash',
                'content' => 'PHP’da o‘zgaruvchilarni aniqlash va ulardan foydalanish.',
                'video_url' => 'https://example.com/videos/php_variables.mp4',
                'file_path' => 'files/php_variables.pdf',
                'course_id' => 1,
            ],
            [
                'title' => 'Dizayn asoslari',
                'content' => 'Grafik dizaynning asosiy tamoyillari va vositalari.',
                'video_url' => 'https://example.com/videos/design_basics.mp4',
                'file_path' => 'files/design_basics.pdf',
                'course_id' => 2, // Grafik Dizayn
            ],
        ];

        foreach ($lessons as $lesson) {
            Lesson::create($lesson);
        }
    }
}
