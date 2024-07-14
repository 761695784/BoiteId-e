<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;





Route::get('/idee', [IdeeController::class, 'accueil']);
Route::post('/store', [CommentaireController::class, 'store'])->name('store');


Route::group(['middleware' => 'auth'], function() {

Route::get('/ajout_categorie', [CategorieController::class, 'ajouter_categorie']);
Route::post('/ajouter_categorie_traitement', [CategorieController::class, 'ajouter_categorie_traitement']);
Route::get('/kategorie', [CategorieController::class, 'afficher_categorie']);
Route::get('/supprimer_categorie/{id}', [CategorieController::class,'supprimer_categorie']);
Route::get('/modifier_categorie/{id}', [CategorieController::class,'modifier_categorie']);
Route::post('/modifier_categorie_traitement/{id}', [CategorieController::class,'modifier_categorie_traitement']);
Route::post('/email/{id}/{action}', [IdeeController::class, 'ideeAction'])->name('email.action');
Route::get('/email-logs', [IdeeController::class, 'emailLogs'])->name('email.logs');
Route::get('/supprimer/{id}', [IdeeController::class,'supprimer_idee'])->name('suppression');
Route::get('/mod/{id}', [IdeeController::class, 'modifier_idee'])->name('modifier');
Route::post('/mod_traitement/{id}', [IdeeController::class, 'modifier_idee_traitement'])->name('modifier_traitement');
Route::get('/index', [IdeeController::class, 'index']);

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

});



Route::get('/ajouter', [IdeeController::class, 'ajouter_idee']);
Route::get('/', [IdeeController::class, 'liste']);
Route::post('/ajouter_traitement', [IdeeController::class, 'ajouter_idee_traitement']);
Route::get('/details/{id}', [IdeeController::class, 'details'])->name('details');






//Route::group(['middleware' => 'guest'], function() {

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAdd'])->name('register');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

//});
