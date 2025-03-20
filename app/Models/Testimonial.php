<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Testimonial extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'course', 'comment', 'rating', 'image'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'course', 'comment', 'rating', 'image'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Fikr {$eventName} qilindi");
    }
}
