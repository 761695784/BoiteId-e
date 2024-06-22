<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/idee', [IdeeController::class, 'accueil']);

Route::get('/ajout_categorie', [CategorieController::class, 'ajouter_categorie']);
Route::post('/ajouter_categorie_traitement', [CategorieController::class, 'ajouter_categorie_traitement']);
Route::get('/kategorie', [CategorieController::class, 'afficher_categorie']);
Route::get('/supprimer_categorie/{id}', [CategorieController::class,'supprimer_categorie']);
Route::get('/modifier_categorie/{id}', [CategorieController::class,'modifier_categorie']);
Route::post('/modifier_categorie_traitement/{id}', [CategorieController::class,'modifier_categorie_traitement']);

Route::get('/ajouter', [IdeeController::class, 'ajouter_idee']);
Route::get('/liste', [IdeeController::class, 'liste']);
Route::post('/ajouter_traitement', [IdeeController::class, 'ajouter_idee_traitement']);
Route::get('/details/{id}', [IdeeController::class, 'details'])->name('details');
