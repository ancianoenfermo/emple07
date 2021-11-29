<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function provincia() {
        return $this->belongsTo(Provincia::class);

    }

    public function empleos() {
        return $this->hasMany(Empleo::class);

    }
}
