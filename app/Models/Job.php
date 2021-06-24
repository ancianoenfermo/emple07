<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public function contrato(){
        return $this->belongsTo('App\Models\Contrato');
    }
    public function experiencia() {
        return $this->belongsTo('\App\Models\Experiencia');
    }
    public function fuente() {
        return $this->belongsTo('App\Models\Fuente');
    }
    public function jornada() {
        return $this->belongsTo('App\Models\Jornada');
    }
    public function localidade() {
        return $this->belongsTo('App\Models\Localidade');
    }
    public function tipojobs() {
        return $this->belongsToMany('App\Models\Tipojob');
    }
}
