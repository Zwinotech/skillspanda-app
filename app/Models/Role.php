<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function getSlugAttribute() {
        return Str::slug($this->name);
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
