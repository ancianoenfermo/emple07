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




    public function scopeNoExperiencia($query, $noExperiencia) {
        if(!is_null($noExperiencia)){
            return $query->where('Texperiencia',$noExperiencia);
        }
    }
    public function scopeNoDiscapacidad($query, $noDiscapacidad) {

        if(!is_null($noDiscapacidad)){

            return $query->where('Tdiscapacidad',$noDiscapacidad);
        }
    }
    public function scopeNoEtt($query, $noEtt) {
        if(!is_null($noEtt)){
            return $query->where('Tett',$noEtt);
        }
    }

    public function scopeNoPracticas($query, $noPracticas) {
        if(!is_null($noPracticas)){
            return $query->orWhere('Tpracticas',$noPracticas);
        }
    }
    public function scopeNoTeletrabajo($query, $noTeletrabajo) {
        if(!is_null($noTeletrabajo)){
            return $query->orWhere('Tteletrabajo',$noTeletrabajo);
        }
    }

    public function scopeNo100Teletrabajo($query, $no100Teletrabajo) {
        if(!is_null($no100Teletrabajo)){
            return $query->orWhere('T100teletrabajo',$no100Teletrabajo);
        }
    }
    public function scopeNoTipo($query, $noTipo) {
        if(!is_null($noTipo)){
            return $query->where('Ttipos',0);
        }
    }



    public function scopeIsSalarioConvenio($query, $isSalarioConvenio) {
        if($isSalarioConvenio){
            return $query->where('TsalarioConvenio',1);
        }
    }
    public function scopeIsSalarioHoras($query, $IsSalarioHoras) {
        if($IsSalarioHoras){
            return $query->where('TsalarioHoras',1);
        }
    }
    public function scopeIsSalarioMes($query, $IsSalarioMes) {
        if($IsSalarioMes){
            return $query->where('TsalarioMes',1);
        }
    }

    public function scopeIsSalarioAnual($query, $IsSalarioAnual) {
        if($IsSalarioAnual){
            return $query->where('TsalarioAno',1);
        }
    }

    public function scopeIsSalarioCon($query, $IsSalarioCon) {
        if($IsSalarioCon){
            return $query->where('TsalarioCon',1);
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
