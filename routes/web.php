<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\UniverseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SuperHeroController;
use App\Models\Universe;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('gender', GenderController::class);
Route::resource('superheroes', SuperHeroController::class) ;
Route::resource('universes', UniverseController::class);
Route::resource('genders', GenderController::class);