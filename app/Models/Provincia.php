<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function localidades() {
        return $this->hasMany('App\Models\Localidade');
    }

    public function autonomia() {
        return $this->belongsTo('App\Models\Autonomia');
    }
}
