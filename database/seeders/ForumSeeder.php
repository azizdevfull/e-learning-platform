<?php

namespace Database\Seeders;

use App\Models\ForumPost;
use App\Models\ForumThread;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $threads = [
            [
                'course_id' => 1,
                'user_id' => 2,
                'title' => 'PHP’da o‘zgaruvchilar qanday ishlaydi?',
            ],
            [
                'course_id' => 2,
                'user_id' => 3,
                'title' => 'Rang nazariyasini qanday o‘rganish kerak?',
            ],
        ];

        foreach ($threads as $threadData) {
            $thread = ForumThread::create($threadData);
            ForumPost::create([
                'thread_id' => $thread->id,
                'user_id' => 1, // Teacher One
                'content' => 'Bu savolga javob sifatida darsdagi materiallarni ko‘rib chiqishingizni tavsiya qilaman.',
            ]);
        }
    }
}
