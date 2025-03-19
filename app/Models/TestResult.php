<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'test_id', 'score'];

    // Test bilan bog'lanish
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    // O'quvchi bilan bog'lanish
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
