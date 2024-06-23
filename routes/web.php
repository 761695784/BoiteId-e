<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [IdeeController::class, 'index']);

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


Route::get('/supprimer/{id}', [IdeeController::class,'supprimer_idee'])->name('suppression');
Route::get('/mod/{id}', [IdeeController::class, 'modifier_idee'])->name('modifier');
Route::post('/mod_traitement/{id}', [IdeeController::class, 'modifier_idee_traitement'])->name('modifier_traitement');

Route::post('/store', [CommentaireController::class, 'store'])->name('store');

//Route::post('/email/{action}', [IdeeController::class, 'updateStatus'])->name('candidatures.updateStatus');
//Route::post('/email/{id}/approuvée', [IdeeController::class, 'updateStatus'])->name('email.approuve');
//Route::post('/email/{id}/inapprouvée', [IdeeController::class, 'updateStatus'])->name('email.inapprouve');


Route::post('/email/{id}/{action}', [IdeeController::class, 'ideeAction'])->name('email.action');

// Route::post('/email/{id}/approve', [IdeeController::class, 'updateStatus'])->name('email.approve');
// Route::post('/email/{id}/reject', [IdeeController::class, 'updateStatus'])->name('email.reject');

