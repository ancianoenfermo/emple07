<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Cache;
use App\Models\Tipojob;


class OfertasController extends Controller
{
    public function index() {
        $tipoTrabajo = Cache::rememberForever('Todoslostrabajos', function () {
            return Tipojob::with('jobs')->find(1);
         });
        $tipoTrabajo = Tipojob::find(1);
        return view('ofertas',compact('tipoTrabajo'));
    }
}
