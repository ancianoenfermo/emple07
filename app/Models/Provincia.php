<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function autonomia() {
        return $this->belongsTo(Autonomia::class);
    }


    public function localidades() {
        return $this->hasMany(Localidade::class);
    }
    public function jobs() {
        return $this->hasMany(Job::class);
    }

}
