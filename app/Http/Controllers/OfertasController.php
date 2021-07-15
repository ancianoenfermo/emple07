<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tipotodos;
use Illuminate\Support\Facades\Cache;



class OfertasController extends Controller
{
    public function index() {
        $tiposTrabajo = TipoTodos::find(1);

        return view('ofertas',compact('tiposTrabajo'));
    }
}
