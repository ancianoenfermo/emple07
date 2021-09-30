<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscarEmpleoController extends Controller
{
    public function index() {
        return view('buscarempleo');
    }
}
