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
Route::post('/register', 'Auth\RegisterController@register');

//Route qui permet d'afficher le formulaire de connexion du site. Cette fonction est appellé lorsque l'URL est '/login'
Route::get('/login', 'VisiteurController@login');

//Route qui permet de se connecter au site. Cette fonction est appelé lorsque l'URL est '/login' et que le l'utilisateur post des données.
Route::post('/login', 'Auth\LoginController@doLogin');

//Route qui permet de se deconnecter du site. Cette fonction est appelé lorsque l'URL est '/logout'
Route::get('/logout', 'Auth\LoginController@doLogout');

//Route qui permet d'afficher le compte de l'utilisateur. Cette fonction est appelé lorsque l'URL est '/account'
Route::get('/account', 'ConnectedController@account');

//Route qui permet d'ajouter une série à la liste des séries visionnées par l'utilisateur. Cette fonction est appelé lorsque l'URL est '/addWatchedSerie'
Route::post('/addWatchedSerie', 'ConnectedController@addWatchedSerie');

//Route qui permet de proposer des recommandation de séries basées sur les préférences utilisateur. Cette fonction est appelé lorsque l'URL est '/recommandationGenre'
Route::post('/recommandationGenre', 'ConnectedController@recommandationGenre');

//Route qui permet de proposer des recommandation de séries basées sur les préférences utilisateur. Cette fonction est appelé lorsque l'URL est '/recommandationCompanies'
Route::post('/recommandationCompanies', 'ConnectedController@recommandationCompanies');