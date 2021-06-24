<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipojob extends Model
{
    use HasFactory;
    public function jobs() {
        return $this->belongsToMany('App\Models\Job');
    }
}
