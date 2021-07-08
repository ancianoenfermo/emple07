<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipojob extends Model
{
    use HasFactory;
    public $timestamps = false;
    //Relación Muchos a Muchos
    public function jobs() {
        return $this->belongsToMany(Job::class)->withPivot('id','job_id','tipojob_id');
    }
}
