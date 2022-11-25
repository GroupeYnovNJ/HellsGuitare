<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarqueController;

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

Route::get('/marques', [\App\Http\Controllers\MarqueController::class,'index'] );
Route::get('/marque/{marque}', [\App\Http\Controllers\MarqueController::class,'show'])->where('marque', '[0-9]+');
Route::get('/marques/create', [\App\Http\Controllers\MarqueController::class,'create']);

Route::post('/marque', [\App\Http\Controllers\MarqueController::class,'store'])
    ->name('store.marque');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('test', [HomeController::class, 'test']);
    Route::get('/marque/{marque}/edit', [\App\Http\Controllers\MarqueController::class, 'edit']);
    Route::put('/marque/{marque}', [\App\Http\Controllers\MarqueController::class, 'update'])->name("marque.update");
});
