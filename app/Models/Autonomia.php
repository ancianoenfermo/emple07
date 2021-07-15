<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomia extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function provincias() {
        return $this->hasMany(Provincia::class);

    }
    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
