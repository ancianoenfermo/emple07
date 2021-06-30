<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    use HasFactory;
    public function jobs() {
        return $this->hasMany('App\Models\Job');
    }

    public function provincia() {
        return $this->belongsTo('App\Models\Provincia');
    }
}
