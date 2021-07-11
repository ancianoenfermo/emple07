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
        return $this->belongsToMany(Tipojob::class);
    }



    public function scopeAutonomia($query, $autonomiaName) {
        if($autonomiaName) {
            return $query->where('autonomia',$autonomiaName);
        }
    }
    public function scopeProvincia($query, $provinciaName) {
        if($provinciaName) {
            return $query->where('provincia',$provinciaName);
        }
    }
    public function scopeLocalidad($query, $localidadName) {
        if($localidadName) {
            return $query->where('localidad',$localidadName);
        }
    }





}
