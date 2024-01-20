<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Livewire\Offerings;
use App\Livewire\Museum;
use App\Livewire\Characters;
use App\Livewire\Recipes;


Route::get('/', function () {
   return view('welcome');
});

Route::get('offerings', Offerings::class);
Route::get('museum', Museum::class);
Route::get('characters', Characters::class);
Route::get('recipes', Recipes::class);