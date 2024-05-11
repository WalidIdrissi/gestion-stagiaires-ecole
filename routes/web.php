<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\FiliereController;

//index
Route::get('/', function () {return view('login');});

Route::prefix('admin')->middleware('auth')->group(function(){

//home
Route::get('/home', function () {return view('home');});

//filiere
Route::get('/filiere', FiliereController::class .'@index')->name('filiere.index');
Route::get('/filiere/create', FiliereController::class . '@create')->name('filiere.create');
Route::put('/filiere/{filiere}', FiliereController::class .'@update')->name('filiere.update');
Route::get('/filiere/{filiere}/edit', FiliereController::class .'@edit')->name('filiere.edit');
Route::delete('/filiere/{filiere}', FiliereController::class .'@destroy')->name('filiere.destroy');
Route::post('/filiere', FiliereController::class .'@store')->name('filiere.store');
Route::get('/filiere/{filiere}/groupes', FiliereController::class .'@show')->name('filiere.show');

//groupe
Route::get('/groupe', GroupeController::class .'@index')->name('groupe.index');
Route::get('/groupe/create/{filiere_id}', GroupeController::class . '@create')->name('groupe.create');
Route::put('/groupe/{groupe}', GroupeController::class .'@update')->name('groupe.update');
Route::get('/groupe/{groupe}/edit', GroupeController::class .'@edit')->name('groupe.edit');
Route::delete('/groupe/{groupe}', GroupeController::class .'@destroy')->name('groupe.destroy');
Route::post('/groupe', GroupeController::class .'@store')->name('groupe.store');
Route::get('/groupe/{groupe}/stagiaires', GroupeController::class .'@show')->name('groupe.show');

//module
Route::get('/module', ModuleController::class .'@index')->name('module.index');
Route::get('/module/create', ModuleController::class . '@create')->name('module.create');
Route::put('/module/{module}', ModuleController::class .'@update')->name('module.update');
Route::get('/module/{module}/edit', ModuleController::class .'@edit')->name('module.edit');
Route::delete('/module/{module}', ModuleController::class .'@destroy')->name('module.destroy');
Route::post('/module', ModuleController::class .'@store')->name('module.store');
Route::get('/module/{module}', ModuleController::class .'@show')->name('module.show');


//stagiaire
Route::get('/stagiaire', StagiaireController::class .'@index')->name('stagiaire.index');
Route::get('/stagiaire/create/{groupe_id}', StagiaireController::class . '@create')->name('stagiaire.create');
Route::put('/stagiaire/{stagiaire}', StagiaireController::class .'@update')->name('stagiaire.update');
Route::get('/stagiaire/{stagiaire}/edit', StagiaireController::class .'@edit')->name('stagiaire.edit');
Route::delete('/stagiaire/{stagiaire}', StagiaireController::class .'@destroy')->name('stagiaire.destroy');
Route::post('/stagiaire', StagiaireController::class .'@store')->name('stagiaire.store');
Route::get('/stagiaire/{stagiaire}', StagiaireController::class .'@show')->name('stagiaire.show');


//note
Route::get('/note', NoteController::class .'@index')->name('note.index');
Route::get('/note/create/{stagiaire_id}', NoteController::class . '@create')->name('note.create');
Route::put('/note/{note}', NoteController::class .'@update')->name('note.update');
Route::get('/note/{note}/edit', NoteController::class .'@edit')->name('note.edit');
Route::delete('/note/{note}', NoteController::class .'@destroy')->name('note.destroy');
Route::post('/note', NoteController::class .'@store')->name('note.store');
Route::get('/note/{note}', NoteController::class .'@show')->name('note.show');

});
