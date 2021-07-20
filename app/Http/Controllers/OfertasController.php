<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;



class OfertasController extends Controller
{
    public function index() {


        return view('ofertas');
    }
}
