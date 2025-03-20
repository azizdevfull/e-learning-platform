<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'PHP Asoslari',
                'description' => 'PHP dasturlash tilini o‘rganish uchun boshlang‘ich kurs.',
                'category_id' => 1, // Dasturlash
                'teacher_id' => 1,  // Teacher One
                'image' => 'php_course.jpg',
            ],
            [
                'title' => 'Grafik Dizayn',
                'description' => 'Grafik dizayn asoslarini o‘rganish.',
                'category_id' => 2, // Dizayn
                'teacher_id' => 1,
                'image' => 'design_course.jpg',
            ],
            [
                'title' => 'Raqamli Marketing',
                'description' => 'Onlayn marketing strategiyalari.',
                'category_id' => 3, // Marketing
                'teacher_id' => 1,
                'image' => 'marketing_course.jpg',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
