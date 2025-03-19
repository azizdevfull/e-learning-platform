<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function tests()
    {
        return $this->hasMany(Test::class);
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // public function students()
    // {
    //     return $this->belongsToMany(User::class, 'enrollments');
    // }
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id');
    }

}
