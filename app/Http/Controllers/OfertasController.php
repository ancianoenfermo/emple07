<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Cache;
use App\Models\Tipojob;


class OfertasController extends Controller
{
    public function index() {

        return view('ofertas');
    }
}
