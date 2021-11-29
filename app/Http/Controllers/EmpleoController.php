<?php

namespace App\Http\Controllers;
use App\Models\Empleo;
use App\Models\Jornada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleoController extends Controller
{
    public function __invoke()
    {


        return view('empleo');
    }
}
