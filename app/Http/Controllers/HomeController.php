<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class HomeController extends Controller
{
    public function __invoke()
    {
        $totalRecords =Job::count();
        return view('welcome',compact('totalRecords'));
    }
}
