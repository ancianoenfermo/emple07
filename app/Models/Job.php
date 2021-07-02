<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Job extends Model
{
    use HasFactory;
    public function getDateHumanaAttribute() {
        Carbon::setLocale('es');
        return Carbon::create($this->datePosted)->diffForHumans();
    }

    public function autonomia(){
        return $this->belongsTo('App\Models\Autonomia');
    }
    public function provincia(){
        return $this->belongsTo('App\Models\Provincia');
    }
    public function localidad(){
        return $this->belongsTo('App\Models\Localidade');
    }

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

    // Relación Muchos a Muchos
    public function tipojobs() {
        return $this->belongsToMany('App\Models\Tipojob');
    }



    public function scopeAutonomia($query, $autonomia_id) {
        if($autonomia_id) {
            return $query->where('autonomia_id',$autonomia_id);
        }
    }
    public function scopeProvincia($query, $provincia_id) {
        if($provincia_id) {
            return $query->where('provincia_id',$provincia_id);
        }
    }
    public function scopeLocalidad($query, $localidad_id) {
        if($localidad_id) {
            return $query->where('localidad_id',$localidad_id);
        }
    }

}
