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
        return $this->belongsToMany(Tipojob::class)->withPivot('tipojob_id');
    }



    public function scopeAutonomia($query, $autonomia) {
        if($autonomia) {
            return $query->where('autonomia',$autonomia);
        }
    }
    public function scopeProvincia($query, $provincia) {
        if($provincia) {
            return $query->where('name',$provincia);
        }
    }
    public function scopeLocalidad($query, $localidad) {
        if($localidad) {
            return $query->where('name',$localidad);
        }
    }



}
