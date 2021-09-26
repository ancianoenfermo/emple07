<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntrevistasController extends Controller
{
    public function index() {
        return view('entrevistas');
    }
}
