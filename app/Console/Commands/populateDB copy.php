<?php

namespace App\Console\Commands;

use App\Models\Autonomiadiscapacidad;


use App\Models\Localidaddiscapacidad;
use App\Models\Provinciadiscapacidad;
use App\Models\Autonomiateletrabajo;
use App\Models\Provinciateletrabajo;
use App\Models\Localidadteletrabajo;

use App\Models\Autonomiapractica;
use App\Models\Provinciapractica;
use App\Models\Localidadpractica;


use App\Models\Autonomiatodo;
use App\Models\Localidadtodo;
use App\Models\Provinciatodo;

use App\Models\Tipodiscapacidad;
use App\Models\Tipopractica;
use App\Models\Tipoteletrabajo;
use App\Models\Tipotodo;


use App\Models\Job;
use App\Models\JobsPractica;
use App\Models\JobsDiscapacidad;
use App\Models\JobsTeletrabajo;


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

        $logoFunte = array();
        // Comprueba si hay un nuevo fichero de empleos
        if (!file_exists(public_path("collection.json"))) {
            return 0;
        }
        // Activa el modo mantenimiento
        $inicio = now();
        Artisan::call('down', ['--redirect' => null, '--retry' => null, '--secret' => null, '--status' => '503']);
        //borra la Cache
        Cache::flush();
        // Lee el json de empleos
        $path = public_path() . "/collection.json";
        $json = File::get($path);
        $empleos = json_decode($json, true);



        // Vacia las tablas

        $this->vaciaTablas();



        // Crear tipos
        /*
        $tipos = new Tipotodo();
        $tipos->name = "Todos los trabajos";
        $tipos->save();

        $tipos = new Tipodiscapacidad();
        $tipos->name = "Discapacidad";
        $tipos->save();

        $tipos = new Tipoteletrabajo();
        $tipos->name = "Teletrabajo";
        $tipos->save();

        $tipos = new Tipopractica();
        $tipos->name = "Practicas";
        $tipos->save();
        */


        $tipoTodos =  DB::table('tipotodos')->insert(['name' => "Todos los trabajos"]);
        $tipoDiscapacidad = DB::table('tipodiscapacidads')->insert(['name' => "Discapacidad"]);
        $tipoPracticas = DB::table('tipoteletrabajos')->insert(['name' => "Teletrabajo"]);
        $tipoTeletrabajo =  DB::table('tipopracticas')->insert(['name' => "Prácticas"]);




        foreach ($empleos as $empleo) {
            $this->trata_empleo($empleo);
        }


        // Desacctiva el modo mantenimiento
        Artisan::call('up');
        $fin = now();
        echo "acabe";
        //File::delete($path);
        return 0;
    }
    public function trata_empleo($empleo)
    {
       global $tipoTodos, $tipoDiscapacidad, $tipoPracticas,$tipoTeletrabajo;

        /*
        $tipoTodos = Tipotodo::first();
        $tipoDiscapacidad = Tipodiscapacidad::first();
        $tipoPracticas = Tipopractica::first();
        $tipoTeletrabajo = Tipoteletrabajo::first();
        */


        //$autonomia = Autonomiatodo::where('name', $empleo['autonomia'])->first();
        $autonomia = DB::table('autonomiatodos')->where('name','=',$empleo['autonomia'])->get();
        if ($autonomia->isEmpty()) {
            $slug = Str::slug($empleo['autonomia'], '-');
            $newAutonomia = DB::table('autonomiatodos')->insert(
                [
                'name' => $empleo['autonomia'],
                'slug' => $slug,
                'tipotodo_id' => $tipoTodos,
                ]
            );


        }




        if ($autonomia == null) {
            dd("es null");
            $newAutonomia = new Autonomiatodo();
            $newAutonomia->name = $empleo['autonomia'];
            $newAutonomia->slug = Str::slug($empleo['autonomia'], '-');
            $newAutonomia->tipotodo_id = $tipoTodos->id;
            $autonomia = $newAutonomia;
            $autonomia->save();
        }
        dd("sigue");
        $provincia = Provinciatodo::where('name', $empleo['provincia'])->first();
        if ($provincia == null) {
            $newProvincia = new Provinciatodo();
            $newProvincia->name = $empleo['provincia'];
            $newProvincia->slug = Str::slug($empleo['provincia'], '-');
            $newProvincia->autonomiatodo_id = $autonomia->id;
            $provincia = $newProvincia;
            $provincia->save();
        }

        $localidad = Localidadtodo::where('name', $empleo['localidad'])->first();
        if ($localidad == null) {
            $newLocalidad = new Localidadtodo();
            $newLocalidad->name = $empleo['localidad'];
            $newLocalidad->slug = Str::slug($empleo['localidad'], '-');
            $newLocalidad->provinciatodo_id = $provincia->id;
            $localidad = $newLocalidad;
            $localidad->save();
        }

        $listaTipos ="";
        /*
        $empleo["discapacidad"] = "1";
        $empleo["teletrabajo"] = "1";
        $empleo["practicas"] = "1";
        */
        if (isset($empleo['discapacidad'])) {
            $tipoDiscapacidad = Tipodiscapacidad::first();
            $listaTipos = $listaTipos . 'Discapacidad|';

        }

        if (isset($empleo['practicas'])) {
            //$tipoPracticas = Tipopractica::first();;
            $listaTipos = $listaTipos . 'Practicas|';
        }

        if (isset($empleo['teletrabajo'])) {
            //$tipoTeletrabajo = Tipoteletrabajo::first();
            $listaTipos = $listaTipos . 'Teletrabajo|';
        }


        $newJob = new Job;

        // DEBEN EXISTIR

        $date = Carbon::createFromFormat('d/m/Y', $empleo['datePosted']);
        $dateNow = Carbon::now();
        $cantidadDias = $date->diffInDays($dateNow);
        $llave = strval($cantidadDias);
        if (strlen($llave) == 1) {
            $llave = "0" . $llave;
        }
        $randon = rand(10, 100000);
        $llave = $llave . strval($randon);
        $newJob->orden = $llave;
        //echo $llave.PHP_EOL;
        $newJob->datePosted = $date;
        $newJob->title = $empleo['title'];
        $newJob->jobFuente = $empleo['JobFuente'];
        $newJob->jobUrl = $empleo['JobUrl'];

        if (isset($empleo['excerpt'])) {
            $newJob->excerpt = $empleo['excerpt'];
        }

        if (isset($empleo['vacantes'])) {
            $newJob->vacantes = $empleo['vacantes'];
        }

        if (isset($empleo['salario'])) {
            $newJob->salario = $empleo['salario'];
        }

        if (isset($empleo['ett'])) {
            $newJob->ett = $empleo['ett'];
        }

        if (isset($empleo['contrato'])) {
            $newJob->contrato = $empleo['contrato'];
        }

        if (isset($empleo['jornada'])) {
            $newJob->jornada = $empleo['jornada'];
        }
        if (isset($empleo['experiencia'])) {
            $newJob->experiencia = $empleo['experiencia'];
        }

        $listaTipos = substr($listaTipos, 0, -1);
        $newJob->listaTipos = $listaTipos;


        $newJob->autonomia = $autonomia->name;
        $newJob->provincia = $provincia->name;
        $newJob->localidad = $localidad->name;


        if (isset($empleo['discapacidad'])) {
            $this->create_discapacidad($newJob, $tipoDiscapacidad,$listaTipos );

        }

        if (isset($empleo['teletrabajo'])) {

            $this->create_teletrabajo($newJob, $tipoTeletrabajo,$listaTipos );


        }

        if (isset($empleo['practicas'])) {
            $this->create_practicas($newJob, $tipoPracticas,$listaTipos );
        }

        $newJob->autonomiatodo_id = $autonomia->id;
        $newJob->provinciatodo_id = $provincia->id;
        $newJob->localidadtodo_id = $localidad->id;
        $newJob->save();

    }

    public function create_discapacidad($job, $tipoDiscapacidad, $listaTipos) {
        $autonomia = Autonomiadiscapacidad::where('name', $job->autonomia)->first();
        if ($autonomia == null) {
            $newAutonomia = new Autonomiadiscapacidad();
            $newAutonomia->name = $job->autonomia;
            $newAutonomia->slug = Str::slug($job->autonomia, '-');
            $newAutonomia->tipodiscapacidad_id = $tipoDiscapacidad->id;
            $autonomia = $newAutonomia;
            $autonomia->save();
        }

        $provincia = Provinciadiscapacidad::where('name', $job->provincia)->first();
        if ($provincia == null) {
            $newProvincia = new Provinciadiscapacidad();
            $newProvincia->name = $job->provincia;
            $newProvincia->slug = Str::slug($job->provincia, '-');
            $newProvincia->autonomiadiscapacidad_id = $autonomia->id;
            $provincia = $newProvincia;
            $provincia->save();
        }

        $localidad = Localidaddiscapacidad::where('name', $job->localidad)->first();
        if ($localidad == null) {
            $newLocalidad = new Localidaddiscapacidad();
            $newLocalidad->name = $job->localidad;
            $newLocalidad->slug = Str::slug($job->localidad, '-');
            $newLocalidad->provinciadiscapacidad_id = $provincia->id;
            $localidad = $newLocalidad;
            $localidad->save();
        }
        $newJob = new JobsDiscapacidad;

        $newJob->orden = $job->orden;
        $newJob->datePosted = $job->datePosted;
        $newJob->title = $job->title;
        $newJob->excerpt = $job->excerpt;
        $newJob->vacantes = $job->vacantes;
        $newJob->ett = $job->ett;
        $newJob->salario = $job->salario;
        $newJob->contrato = $job->contrato;
        $newJob->jornada = $job->jornada;
        $newJob->experiencia = $job->experiencia;
        $newJob->listaTipos = $listaTipos;
        $newJob->jobUrl = $job->jobUrl;
        $newJob->jobFuente = $job->jobFuente;
        $newJob->autonomia = $job->autonomia;
        $newJob->provincia = $job->provincia;
        $newJob->localidad = $job->localidad;

        $newJob->autonomiadiscapacidad_id = $autonomia->id;
        $newJob->provinciadiscapacidad_id = $provincia->id;
        $newJob->localidaddiscapacidad_id = $localidad->id;
        $newJob->save();
    }
    public function create_teletrabajo($job, $tipoTeletrabajo, $listaTipos) {
        $autonomia = Autonomiateletrabajo::where('name', $job->autonomia)->first();
        if ($autonomia == null) {
            $newAutonomia = new Autonomiateletrabajo();
            $newAutonomia->name = $job->autonomia;
            $newAutonomia->slug = Str::slug($job->autonomia, '-');
            $newAutonomia->tipoteletrabajo_id = $tipoTeletrabajo->id;
            $autonomia = $newAutonomia;
            $autonomia->save();
        }

        $provincia = Provinciateletrabajo::where('name', $job->provincia)->first();
        if ($provincia == null) {
            $newProvincia = new Provinciateletrabajo();
            $newProvincia->name = $job->provincia;
            $newProvincia->slug = Str::slug($job->provincia, '-');
            $newProvincia->autonomiateletrabajo_id = $autonomia->id;
            $provincia = $newProvincia;
            $provincia->save();

        }

        $localidad = Localidadteletrabajo::where('name', $job->localidad)->first();
        if ($localidad == null) {
            $newLocalidad = new Localidadteletrabajo();
            $newLocalidad->name = $job->localidad;
            $newLocalidad->slug = Str::slug($job->localidad, '-');
            $newLocalidad->provinciateletrabajo_id = $provincia->id;
            $localidad = $newLocalidad;
            $localidad->save();
        }
        $newJob = new JobsTeletrabajo;

        $newJob->orden = $job->orden;
        $newJob->datePosted = $job->datePosted;
        $newJob->title = $job->title;
        $newJob->excerpt = $job->excerpt;
        $newJob->vacantes = $job->vacantes;
        $newJob->ett = $job->ett;
        $newJob->salario = $job->salario;
        $newJob->contrato = $job->contrato;
        $newJob->jornada = $job->jornada;
        $newJob->experiencia = $job->experiencia;
        $newJob->listaTipos = $listaTipos;
        $newJob->jobUrl = $job->jobUrl;
        $newJob->jobFuente = $job->jobFuente;
        $newJob->autonomia = $job->autonomia;
        $newJob->provincia = $job->provincia;
        $newJob->localidad = $job->localidad;

        $newJob->autonomiateletrabajo_id = $autonomia->id;
        $newJob->provinciateletrabajo_id = $provincia->id;
        $newJob->localidadteletrabajo_id = $localidad->id;
        $newJob->save();
    }
    public function create_practicas($job, $tipoPracticas, $listaTipos) {
        $autonomia = Autonomiapractica::where('name', $job->autonomia)->first();
        if ($autonomia == null) {
            $newAutonomia = new Autonomiapractica();
            $newAutonomia->name = $job->autonomia;
            $newAutonomia->slug = Str::slug($job->autonomia, '-');
            $newAutonomia->tipopractica_id = $tipoPracticas->id;
            $autonomia = $newAutonomia;
            $autonomia->save();
        }

        $provincia = Provinciapractica::where('name', $job->provincia)->first();
        if ($provincia == null) {
            $newProvincia = new Provinciapractica();
            $newProvincia->name = $job->provincia;
            $newProvincia->slug = Str::slug($job->provincia, '-');
            $newProvincia->autonomiapractica_id = $autonomia->id;
            $provincia = $newProvincia;
            $provincia->save();
        }

        $localidad = Localidadpractica::where('name', $job->localidad)->first();
        if ($localidad == null) {
            $newLocalidad = new Localidadpractica();
            $newLocalidad->name = $job->localidad;
            $newLocalidad->slug = Str::slug($job->localidad, '-');
            $newLocalidad->provinciapractica_id = $provincia->id;
            $localidad = $newLocalidad;
            $localidad->save();
        }
        $newJob = new JobsPractica();

        $newJob->orden = $job->orden;
        $newJob->datePosted = $job->datePosted;
        $newJob->title = $job->title;
        $newJob->excerpt = $job->excerpt;
        $newJob->vacantes = $job->vacantes;
        $newJob->ett = $job->ett;
        $newJob->salario = $job->salario;
        $newJob->contrato = $job->contrato;
        $newJob->jornada = $job->jornada;
        $newJob->experiencia = $job->experiencia;
        $newJob->listaTipos = $listaTipos;
        $newJob->jobUrl = $job->jobUrl;
        $newJob->jobFuente = $job->jobFuente;
        $newJob->autonomia = $job->autonomia;
        $newJob->provincia = $job->provincia;
        $newJob->localidad = $job->localidad;

        $newJob->autonomiapractica_id = $autonomia->id;
        $newJob->provinciapractica_id = $provincia->id;
        $newJob->localidadpractica_id = $localidad->id;
        $newJob->save();
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
        $pathDirectory = storage_path("app/public/logo_images");
        if (File::exists($pathDirectory)) {
            File::deleteDirectory($pathDirectory);
            File::makeDirectory($pathDirectory);
        } else {
            File::makeDirectory($pathDirectory);
        }
    }

    public function descargarLogo($url)
    {
        $extension = pathinfo(storage_path($url), PATHINFO_EXTENSION);
        $filename = Str::uuid() . '.' . $extension;
        $logo = Image::make($url);
        $logo->resize(70, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $logo->save(storage_path('app/public/logo_images/' . $filename));


        /*
        Image::make($url)->save(storage_path('app/public/logo_images/' . $filename));
        */
        return $filename;
    }
}
