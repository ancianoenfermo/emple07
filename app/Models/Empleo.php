<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function autonomia() {
        return $this->belongsTo(Autonomia::class);

    }
    public function provincia() {
        return $this->belongsTo(Provincia::class);
    }
    public function localidad() {
        return $this->belongsTo(Localidad::class);
    }
    public function excerpt() {
        return $this->hasOne(Excerpt::class);

    }



    public function scopeIsEtt($query, $isEtt) {
        if($isEtt){
            return $query->where('Tett','=',"1");
        }
    }
    public function scopeIsExperiencia($query, $isExperiencia) {
        if($isExperiencia){
            return $query->where('Texperiencia','=',"1");
        }
    }
    public function scopeIsDiscapacidad($query, $isDiscapacidad) {
        if($isDiscapacidad){
            return $query->where('Tdiscapacidad','=',"1");
        }
    }
    public function scopeIsTeletrabajo($query, $isTeletrabajo) {
        if($isTeletrabajo){
            return $query->where('Tteletrabajo','=',"1");
        }
    }

    public function scopeIsPracticas($query, $isPracticas) {
        if($isPracticas){
            return $query->where('Tpracticas','=',"1");
        }
    }
    public function scopeIsSalarioConvenio($query, $isSalarioConvenio) {
        if($isSalarioConvenio){
            return $query->where('TsalarioConvenio','=',"1");
        }
    }
    public function scopeIsSalarioHoras($query, $IsSalarioHoras) {
        if($IsSalarioHoras){
            return $query->where('TsalarioHoras','=',"1");
        }
    }
    public function scopeIsAutonomia($query, $IsAutonomia) {
        if($IsAutonomia){
            return $query->where('autonomia','=',$IsAutonomia);
        }
    }
    public function scopeIsProvincia($query, $IsProvincia) {
        if($IsProvincia){
            return $query->where('provincia','=',$IsProvincia);
        }
    }
    public function scopeIsLocalidad($query, $IsLocalidad) {
        if($IsLocalidad){
            return $query->where('localidad','=',$IsLocalidad);
        }
    }
    public function scopeIsJornada($query, $IsJornada) {
        if($IsJornada){
            return $query->where('jornada','=',$IsJornada);
        }
    }
    public function scopeIsContrato($query, $IsContrato) {
        if($IsContrato){
            return $query->where('contrato','=',$IsContrato);
        }
    }
    public function scopeIsVacantes($query, $IsVacantes) {
        if($IsVacantes){
            return $query->where('vacantes','=',$IsVacantes);
        }
    }

}
