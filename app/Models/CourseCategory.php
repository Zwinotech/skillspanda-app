<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_id'];

    public function subcategory()
    {
        return $this->hasMany(\App\Models\CourseCategory::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\CourseCategory::class, 'parent_id');
    }
}
