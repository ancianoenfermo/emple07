<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartapresentacionController extends Controller
{
    public function index() {
        return view('cartapresentacion');
    }
}
