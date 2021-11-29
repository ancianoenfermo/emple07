<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excerpt extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function empleo() {
        return $this->belongsTo(Empleo::class);
    }
}
