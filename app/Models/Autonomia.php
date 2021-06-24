<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomia extends Model
{
    use HasFactory;
    public function provincias() {
        return $this->hasMany('App\Models\Provincia');
    }

    public function jobs() {
        return $this->hasManyThrough('App\Models\Job','App\Models\Provincia');
    }
}
