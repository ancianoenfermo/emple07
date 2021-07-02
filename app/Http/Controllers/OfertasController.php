<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class OfertasController extends Controller
{
    public function index() {
        $totalRecords =Job::count();
        return view('ofertas',compact('totalRecords'));
    }
}
