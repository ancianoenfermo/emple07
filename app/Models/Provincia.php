<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    public function jobs() {
        return $this->hasMany('App\Models\Job');
    }

    public function localidades() {
        return $this->hasMany('App\Models\Localidade');
    }

    public function autonomia() {
        return $this->belongsTo('App\Models\Autonomia');
    }
}
