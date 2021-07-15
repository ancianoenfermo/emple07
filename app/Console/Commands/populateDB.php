<?php

namespace App\Console\Commands;

use App\Models\Autonomia;
use App\Models\Provincia;
use App\Models\Localidade;
use App\Models\Tipodiscapacidad;
use App\Models\Tipopractica;
use App\Models\Tipoteletrabajo;
use App\Models\Tipotodos;

use App\Models\Tipojob;
use App\Models\Job;


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
        $tipos = new Tipotodos();
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
        global $logoFuente;

        $autonomia = Autonomia::where('name', $empleo['autonomia'])->first();
        if ($autonomia == null) {
            $newAutonomia = new Autonomia();
            $newAutonomia->name = $empleo['autonomia'];
            $newAutonomia->slug = Str::slug($empleo['autonomia'], '-');
            $autonomia = $newAutonomia;
            $autonomia->save();
        }

        $provincia = Provincia::where('name', $empleo['provincia'])->first();
        if ($provincia == null) {
            $newProvincia = new Provincia();
            $newProvincia->name = $empleo['provincia'];
            $newProvincia->slug = Str::slug($empleo['provincia'], '-');
            $newProvincia->autonomia_id = $autonomia->id;
            $provincia = $newProvincia;
            $provincia->save();
        }

        $localidad = Localidade::where('name', $empleo['localidad'])->first();
        if ($localidad == null) {
            $newLocalidad = new Localidade();
            $newLocalidad->name = $empleo['localidad'];
            $newLocalidad->slug = Str::slug($empleo['localidad'], '-');
            $newLocalidad->provincia_id = $provincia->id;
            $localidad = $newLocalidad;
            $localidad->save();
        }
        $listaTipos ="";
        $empleo["discapacidad"] = "1";
        $empleo["teletrabajo"] = "1";
        $empleo["practicas"] = "1";

        if (isset($empleo['discapacidad'])) {
            $tipoDiscapacidad = Tipodiscapacidad::first();
            $listaTipos = $listaTipos . 'Discapacidad|';
        }

        if (isset($empleo['practicas'])) {
            $tipoPracticas = Tipopractica::first();;
            $listaTipos = $listaTipos . 'Practicas|';
        }

        if (isset($empleo['teletrabajo'])) {
            $tipoTeletrabajo = Tipoteletrabajo::first();
            $listaTipos = $listaTipos . 'Teletrabajo|';
        }

        $tipoTodos = Tipotodos::first();

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

        $newJob->autonomia_id = $autonomia->id;
        $newJob->provincia_id = $provincia->id;
        $newJob->localidad_id = $localidad->id;


        $newJob->tipotodos_id = $tipoTodos->id;




        if (isset($empleo['discapacidad'])) {
            $newJob->tipodiscapacidad_id = $tipoDiscapacidad->id;
        }
        if (isset($empleo['teletrabajo'])) {
            $newJob->tipoteletrabajo_id = $tipoTeletrabajo->id;
        }

        if (isset($empleo['practicas'])) {
            $newJob->tipopractica_id = $tipoPracticas->id;
        }

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
