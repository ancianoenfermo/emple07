<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autonomia extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function provincias() {
        return $this->hasMany('App\Models\Provincia');
    }

}
