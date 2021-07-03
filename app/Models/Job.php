<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Job extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function getDateHumanaAttribute() {
        Carbon::setLocale('es');
        return Carbon::create($this->datePosted)->diffForHumans();
    }


    // Relación Muchos a Muchos
    public function tipojobs() {
        return $this->belongsToMany('App\Models\Tipojob');
    }

    public function scopeAutonomia($query, $autonomia_name) {
        if($autonomia_name) {
            return $query->where('autonomia',$autonomia_name);
        }
    }
    public function scopeProvincia($query, $provincia_name) {
        if($provincia_name) {
            return $query->where('provincia',$provincia_name);
        }
    }
    public function scopeLocalidad($query, $localidad_name) {
        if($localidad_name) {
            return $query->where('localidad',$localidad_name);
        }
    }

}
