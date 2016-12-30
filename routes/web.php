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

//Route qui appelle le controller qui construit la page d'acceuil du site. Cette fonction est appelée quand l'URL est '/'
Route::get('/', 'VisiteurController@accueil');

//Route qui appelle le controller qui construit la page à propos du site. Cette fonction est appelée quand l'URL est '/propos'
Route::get('/about', 'VisiteurController@about');

//Route qui permet d'appeler le controller qui construira la page de recherche de séries. Cette fonction eest appelé quand l'URL est '/series'
Route::get('/series', 'RechercheSerieController@create');

//Route qui permet de faire le traitement concernant une recherche de série. Cette fonction eest appelé quand l'URL est '/series'
Route::post('/series', 'RechercheSerieController@store');

//Route qui permet d'afficher le formulaire d'inscription du site. Cette fonction est appellé lorsque l'URL est '/signin'
Route::get('/signin', 'VisiteurController@signin');

//Route qui permet d'ajouter un nouvel utilisateur dans la base de données. Cette fonction est appellé lorsque l'URL est '/register'
Route::post('/registrer', 'Auth\RegisterController@register');

//Route qui permet d'afficher le formulaire de connexion du site. Cette fonction est appellé lorsque l'URL est '/login'
Route::get('/login', 'VisiteurController@login');

Route::post('/authenticate', 'Auth\LoginController@username');

Route::get('/dasboard', function(){
   echo "connected";
});