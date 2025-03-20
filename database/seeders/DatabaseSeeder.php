<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            CourseSeeder::class,
            LessonSeeder::class,
            TestSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            EnrollmentSeeder::class,
            TestResultSeeder::class,
            ForumSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
