<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Alisher Karimov',
                'course' => "Web dasturlash kursi o'quvchisi",
                'comment' => "EduTeach platformasi orqali web dasturlashni o'rgandim va hozirda o'z loyihalarim ustida ishlayapman. Kurslar juda tushunarli va amaliy ko'nikmalarni rivojlantiradi.",
                'rating' => 5,
            ],
            [
                'name' => 'Rustam Ismoilov',
                'course' => "Matematika kursi o'quvchisi",
                'comment' => "Matematika kursini o'qib, oliy ta'lim muassasasiga kirish imtihonlarini a'lo darajada topshirdim. Murakkab mavzular ham juda tushunarli qilib tushuntirilgan.",
                'rating' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

    }
}
