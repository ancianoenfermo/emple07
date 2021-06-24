<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    public function localidades() {
        return $this->hasMany('App\Models\Localidade');
    }

    public function jobs() {
        return $this->hasManyThrough('App\Models\Job','App\Models\Localidade');
    }
}
