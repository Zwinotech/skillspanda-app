<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'details',
        'price',
        'difficulty',
        'runtime',
        'graphic',
        'brochure',
        'video',
        'course_category_id',
        'facilitator_id'
    ];

//    protected $with = ['facilitator', 'category'];

    public function course_category_id() {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function facilitator_id() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
