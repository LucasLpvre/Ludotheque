<?php

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

Route::get('/jeux', 'JeuController@index')->name('jeux.index');
Route::resource('jeux', 'JeuController');
Route::get('/tag/{idJeu}/asso', 'TagController@assoJeu')->name('tag.asso_jeux');
Route::post('/tags/{id}/asso','TagController@store_asso_jeu')->name('tag.store_asso_jeu');
Route::any('/', 'HomeController@index')->name('acceuil');
Route::any('/apropos', 'HomeController@aPropos')->name('home.aPropos');
Route::any('/contact', 'HomeController@contact')->name('home.contact');
Route::get('/master', function (){
    return view('layout.master');
});
