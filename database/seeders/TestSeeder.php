<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = [
            [
                'title' => 'PHP Asoslari Testi',
                'course_id' => 1, // PHP Asoslari
            ],
            [
                'title' => 'Dizayn Testi',
                'course_id' => 2, // Grafik Dizayn
            ],
        ];

        foreach ($tests as $test) {
            Test::create($test);
        }
    }
}
