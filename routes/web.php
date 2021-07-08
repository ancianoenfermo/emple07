<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfertasController;
use App\Http\Livewire\LocationFilters;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');
//Route::get('/ofertas', [OfertasController::class,'index'])->name('ofertas');
Route::get('/ofertas-trabajo/',[OfertasController::class,'index'])->name('ofertas');
//Route::get('/ofertas-trabajo/',LocationFilters::class)->name('ofertas');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/redis', function(){
    print_r(app()->make('redis'));
});
