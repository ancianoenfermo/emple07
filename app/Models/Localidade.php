<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function provincia() {
        return $this->belongsTo('App\Models\Provincia');
    }
}
