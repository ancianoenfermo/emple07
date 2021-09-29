<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\MisofertasController;
use App\Http\Controllers\EntrevistasController;
use App\Http\Controllers\curriculumController;

Route::get('/', HomeController::class)->name('home');
Route::get('/ofertas-trabajo/{tipoTrabajo?}',[OfertasController::class,'index'])->name('ofertas');
Route::get('/mis-ofertas',[MisofertasController::class,'index'])->name('misofertas');
Route::get('/entrevista-de-trabajo',[EntrevistasController::class,'index'])->name('entrevista');
Route::get('/curriculum-vitae',[curriculumController::class,'index'])->name('curriculum');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/redis', function(){
    print_r(app()->make('redis'));
});

