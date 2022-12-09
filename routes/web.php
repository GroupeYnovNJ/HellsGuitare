<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\InstrumentController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function(){

    // Instruments

    Route::get('/instruments', [\App\Http\Controllers\InstrumentController::class,'index'])
        ->name('instruments.index');

    Route::get('/instruments/create', [\App\Http\Controllers\InstrumentController::class,'create'])
        ->name('instrument.create');

    Route::post('/instruments', [\App\Http\Controllers\InstrumentController::class,'store'])
        ->name('instrument.store');

    Route::get('/instrument/{instrument}', [\App\Http\Controllers\InstrumentController::class,'show'])
        ->where('instrument', '[0-9]+')
        ->name('instrument.show');

    Route::get('/instrument/{instrument}/edit', [\App\Http\Controllers\InstrumentController::class, 'edit'])
        ->where('instrument', '[0-9]+')
        ->name('instrument.edit');

    Route::patch('/instrument/{instrument}', [InstrumentController::class, 'update'])
        ->where('instrument', '[0-9]+')
        ->name('instrument.update');

    Route::delete('/instrument/{instrument}', [InstrumentController::class, 'destroy'])
        ->where('instrument', '[0-9]+')
        ->name('instrument.delete');
    
    // Marques

    Route::get('/marques', [\App\Http\Controllers\MarqueController::class,'index'])
        ->name('marques.index');

    Route::get('/marques/create', [\App\Http\Controllers\MarqueController::class,'create'])
        ->name('marque.create');

    Route::post('/marques', [\App\Http\Controllers\MarqueController::class,'store'])
        ->name('marque.store');

    Route::get('/marque/{marque}', [\App\Http\Controllers\MarqueController::class,'show'])
        ->where('marque', '[0-9]+')
        ->name('marque.show');

    Route::get('/marque/{marque}/edit', [\App\Http\Controllers\MarqueController::class, 'edit'])
        ->where('marque', '[0-9]+')
        ->name('marque.edit');

    Route::patch('/marque/{marque}', [MarqueController::class, 'update'])
        ->where('marque', '[0-9]+')
        ->name('marque.update');

    Route::delete('/marque/{marque}', [\App\Http\Controllers\MarqueController::class, 'destroy'])
        ->where('marque', '[0-9]+')
        ->name('marque.delete');
    
    //Catégories

    Route::get('/categories', [\App\Http\Controllers\CategorieController::class,'index'])
        ->name('categories.index');

    Route::get('/categories/create', [\App\Http\Controllers\CategorieController::class,'create'])
        ->name('categorie.create');

    Route::post('/categories', [\App\Http\Controllers\CategorieController::class,'store'])
        ->name('categorie.store');

    Route::get('/categorie/{categorie}', [\App\Http\Controllers\CategorieController::class,'show'])
        ->where('categorie', '[0-9]+')
        ->name('categorie.show');

    Route::get('/categorie/{categorie}/edit', [\App\Http\Controllers\CategorieController::class, 'edit'])
        ->where('categorie', '[0-9]+')
        ->name('categorie.edit');

    Route::patch('/categorie/{categorie}', [CategorieController::class, 'update'])
        ->where('categorie', '[0-9]+')
        ->name('categorie.update');

    Route::delete('/categorie/{categorie}', [CategorieController::class, 'destroy'])
        ->where('categorie', '[0-9]+')
        ->name('categorie.delete');

    //Employés

    Route::get('/employes', [\App\Http\Controllers\EmployeController::class,'index'])
        ->name('employes.index');

    Route::get('/employes/create', [\App\Http\Controllers\EmployeController::class,'create'])
        ->name('employe.create');

    Route::post('/employes', [\App\Http\Controllers\EmployeController::class,'store'])
        ->name('employe.store');

    Route::get('/employe/{employe}', [\App\Http\Controllers\EmployeController::class,'show'])
        ->where('employe', '[0-9]+')
        ->name('employe.show');

    Route::get('/employe/{employe}/edit', [\App\Http\Controllers\EmployeController::class, 'edit'])
        ->where('employe', '[0-9]+')
        ->name('employe.edit');

    Route::patch('/employe/{employe}', [EmployeController::class, 'update'])
        ->where('employe', '[0-9]+')
        ->name('employe.update');

    Route::delete('/employe/{employe}', [EmployeController::class, 'destroy'])
        ->where('employe', '[0-9]+')
        ->name('employe.delete');

    // Promotions

    Route::get('/promotions', [\App\Http\Controllers\PromotionController::class,'index'])
        ->name('promotions.index');

    Route::get('/promotions/create', [\App\Http\Controllers\PromotionController::class,'create'])
        ->name('promotion.create');

    Route::post('/promotions', [\App\Http\Controllers\PromotionController::class,'store'])
        ->name('promotion.store');

    Route::get('/promotion/{promotion}', [\App\Http\Controllers\PromotionController::class,'show'])
        ->where('promotion', '[0-9]+')
        ->name('promotion.show');

    Route::get('/promotion/{promotion}/edit', [\App\Http\Controllers\PromotionController::class, 'edit'])
        ->where('promotion', '[0-9]+')
        ->name('promotion.edit');
        
    Route::patch('/promotion/{promotion}', [PromotionController::class, 'update'])
        ->where('promotion', '[0-9]+')
        ->name('promotion.update');

    Route::delete('/promotion/{promotion}', [PromotionController::class, 'destroy'])
        ->where('promotion', '[0-9]+')
        ->name('promotion.delete');

    // Rayons

    Route::get('/rayons', [\App\Http\Controllers\RayonController::class,'index'])
        ->name('rayons.index');

    Route::get('/rayons/create', [\App\Http\Controllers\RayonController::class,'create'])
        ->name('rayon.create');

    Route::post('/rayons', [\App\Http\Controllers\RayonController::class,'store'])
        ->name('rayon.store');

    Route::get('/rayon/{rayon}', [\App\Http\Controllers\RayonController::class,'show'])
        ->where('rayon', '[0-9]+')
        ->name('rayon.show');

    Route::get('/rayon/{rayon}/edit', [\App\Http\Controllers\RayonController::class, 'edit'])
        ->where('rayon', '[0-9]+')
        ->name('rayon.edit');

    Route::patch('/rayon/{rayon}', [RayonController::class, 'update'])
        ->where('rayon', '[0-9]+')
        ->name('rayon.update');

    Route::delete('/rayon/{rayon}', [RayonController::class, 'destroy'])
        ->where('rayon', '[0-9]+')
        ->name('rayon.delete');

    //Users
        
    Route::get('/users', [\App\Http\Controllers\UserController::class,'index'])
        ->name('users.index');

    Route::get('/user/{user}/edit', [UserController::class, 'edit']) #utilise la méthode edit de la classe Usercontroller
        ->where('user', '[0-9]+')
        ->name('user.edit');

    Route::patch('/user/{user}', [UserController::class, 'update'])
        ->where('user', '[0-9]+')
        ->name('user.update');
});
