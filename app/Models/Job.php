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

    public function getListaTiposAttribute($value) {

        if(!is_null($value)) {

            return explode("|", $value);
        }
    }

    public function autonomia() {
        return $this->belongsTo(Autonomia::class);

    }

    public function provincia() {
        return $this->belongsTo(Provincia::class);

    }
    public function localidad() {
        return $this->belongsTo(Localidade::class);

    }
    public function tipoTodos() {
        return $this->belongsTo(Tipotodos::class);

    }
    public function tipoDiscapacidad() {
        return $this->belongsTo(Tipodiscapacidad::class);

    }

    public function tipoPractica() {
        return $this->belongsTo(Tipopractica::class);
    }

    public function tipoTeletrabajo() {
        return $this->belongsTo(Tipoteletrabajo::class);

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
