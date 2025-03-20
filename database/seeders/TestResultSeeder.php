<?php

namespace Database\Seeders;

use App\Models\TestResult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testResults = [
            [
                'user_id' => 2, // Student One
                'test_id' => 1, // PHP Asoslari Testi
                'score' => 50,
                // 'answers' => json_encode([1 => 1, 2 => 5]), // To‘g‘ri (1) va noto‘g‘ri (5)
            ],
            [
                'user_id' => 3, // Student Two
                'test_id' => 2, // Dizayn Testi
                'score' => 100,
                // 'answers' => json_encode([3 => 7]), // To‘g‘ri javob
            ],
        ];

        foreach ($testResults as $result) {
            TestResult::create($result);
        }
    }
}
