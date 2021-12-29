<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Mail;
use App\Mail\populateEmpleos;
use App\Models\Autonomia;
use App\Models\Provincia;
use App\Models\Localidad;
use App\Models\Empleo;
use App\Models\Excerpt;


use App\Models\Jornada;
use App\Models\Contrato;
use phpDocumentor\Reflection\PseudoTypes\True_;

use function PHPUnit\Framework\isNull;

class populateDB extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:empleos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Llena de empleos la Base de Datos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        global $tipoTodos, $tipoDiscapacidad, $tipoPracticas,$tipoTeletrabajo;
        $timeStart = Carbon::now();
        $logoFunte = array();
        // Comprueba si hay un nuevo fichero de empleos
        if (!file_exists(public_path("Empleos.json"))) {
            $this->output->write('FICHERO INEXISTENTE', false);
            return 0;
        }
        // Activa el modo mantenimiento
        #$inicio = now();
        #Artisan::call('down', ['--redirect' => null, '--retry' => null, '--secret' => null, '--status' => '503']);
        //borra la Cache
        Cache::flush();
        // Lee el json de empleos

        $path = public_path() . "/Empleos.json";

        $json = json_decode(file_get_contents($path), true);
        $json = File::get($path);
        $empleos = json_decode($json, true);
        $this->vaciaTablas();
        #$this->output->write(gettype($empleos), false);

        foreach ($empleos as $empleo) {
            $this->trata_empleo($empleo);
        }
    }

    public function trata_empleo($empleo) {

        $autonomia = Autonomia::where('name',$empleo['autonomia'])->first();
        if($autonomia == null) {
            $autonomia = new Autonomia;
            $autonomia->name = $empleo['autonomia'];
            $autonomia->save();
        }
        $provincia = Provincia::where('name',$empleo['provincia'])->first();
        if($provincia == null) {
            $provincia = new Provincia;
            $provincia->name = $empleo['provincia'];
            $provincia->autonomia_id = $autonomia->id;
            $provincia->save();
        }

        $localidad = Localidad::where('name',$empleo['localidad'])->first();
        if($localidad == null) {
            $localidad = new Localidad;
            $localidad->name = $empleo['localidad'];
            $localidad->provincia_id = $provincia->id;
            $localidad->save();
        }

        $excerpt = new Excerpt;
        $excerpt->excerpt = $empleo['excerpt'];
        $excerpt->save();

        if (isset($empleo['jornada'])) {
            $jornada = Jornada::where('name',$empleo['jornada'])->first();
            if($jornada == null) {
                $jornada = new Jornada;
                $jornada->name = $empleo['jornada'];
                $jornada->save();
            }
        }

        if (isset($empleo['contrato'])) {
            $contrato = Contrato::where('name',$empleo['contrato'])->first();
            if($contrato == null) {
                $contrato = new Contrato();
                $contrato->name = $empleo['contrato'];
                $contrato->save();
            }
        }


        $newJob = new Empleo;

        $newJob->orden = $empleo['orden'];
        $newJob->datePosted = Carbon::createFromFormat('d/m/Y', $empleo['datePosted']);;
        $newJob->title = $empleo['title'];
        $newJob->excerptCorto = $empleo['excerptCorto'];
        if ($newJob->excerptCorto == null) {
            $newJob->excerptCorto ="**** VENIA NULL";
        }
        $newJob->JobFuente = $empleo['JobFuente'];

        $newJob->JobUrl = $empleo['JobUrl'];
        $newJob->autonomia = $autonomia->name;
        $newJob->autonomia_id = $autonomia->id;
        $newJob->provincia = $provincia->name;
        $newJob->provincia_id = $provincia->id;
        $newJob->localidad = $localidad->name;
        $newJob->localidad_id = $localidad->id;
        $newJob->excerpt_id = $excerpt->id;
        if (!empty($empleo['salario'])) {
            $newJob->salario = $empleo['salario'];
            $newJob->TsalarioCon = true;
        }
        if (isset($empleo['jornada'])) {
            $newJob->jornada = $empleo['jornada'];
        }
        if (isset($empleo['contrato'])) {
            $newJob->contrato = $empleo['contrato'];
        }
        if (isset($empleo['vacantes'])) {
            $newJob->vacantes = $empleo['vacantes'];
        }
        $tipos = "";

        if (!empty($empleo['experiencia'])) {
            $newJob->Texperiencia = true;

            $newJob->Ttipos = true;
        }
        if ($empleo['Tett']==TRUE) {
            $newJob->Tett = true;
            $tipos = $tipos . "Ett,";
            $newJob->Ttipos = true;
        }
        if ($empleo['Tdiscapacidad']==TRUE) {
            $newJob->Tdiscapacidad = true;
            $tipos = $tipos . "Discapacidad,";
            $newJob->Ttipos = true;
        }
        if ($empleo['Tteletrabajo']==TRUE) {
            $newJob->Tteletrabajo = true;
            $tipos = $tipos . "Teletrabajo,";
            $newJob->Ttipos = true;
        }
        if ($empleo['Tpracticas']==TRUE) {
            $newJob->Tpracticas = true;
            $tipos = $tipos . "Prácticas,";
            $newJob->Ttipos = true;
        }
        if ($empleo['T100teletrabajo']==TRUE) {
            $newJob->T100teletrabajo = true;
            $tipos = $tipos . "100% Teletrabajo,";
            $newJob->Ttipos = true;
        }
        if ($empleo['TsalarioConvenio']==TRUE) {
            $newJob->TsalarioConvenio = true;
        }
        if ($empleo['TsalarioHoras']==TRUE) {
            $newJob->TsalarioHoras = true;
        }
        if ($empleo['TsalarioMes']==TRUE) {
            $newJob->TsalarioMes = true;
        }
        if ($empleo['TsalarioAno']==TRUE) {
            $newJob->TsalarioAno = true;
        }



        if(strlen($tipos)>1){
            $newJob->tipos=substr($tipos, 0, -1);
        }



        $newJob->save();










    }

    public function autonomia($autonomia) {
        $this->output->write($autonomia, true);
    }

    public function vaciaTablas()
    {
        DB::statement("SET foreign_key_checks=0");
        $databaseName = DB::getDatabaseName();
        $tables = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '$databaseName'");
        foreach ($tables as $table) {
            $name = $table->TABLE_NAME;
            //if you don't want to truncate migrations
            if ($name == 'migrations' || $name == 'failed_jobs' || $name == 'password_resets' || $name == 'personal_access_tokens' || $name == 'sessions' || $name == 'users') {
                continue;
            }
            DB::table($name)->truncate();
        }
        DB::statement("SET foreign_key_checks=1");
    }


}
