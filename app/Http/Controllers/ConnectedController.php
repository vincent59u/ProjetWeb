<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConnectedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function account(){
        //Requête qui récupère une images aléatoirement. Elle constituera le background de la page d'accueil.
        $image = DB::table('series')->whereNotNull('backdrop_path')->inRandomOrder()->first();

        $series = DB::table('series')->join('usersseries', 'usersseries.serie_id', '=', 'series.id')
                                     ->where('usersseries.user_id', '=', Auth::user()->id)->get();
        //Appel de la vue account qui utilisera l'image aléatoire pour son background et le reste des données..
        return view('account')->with('image', $image)->with('series', $series);
    }

    /**
     * Methode qui permet d'ajouter une serie aux séries visionnées par l'utilisateur
     * Ajout effectué par une requête ajax.
     */
    public function addWatchedSerie(){
        //Si la requête AJAX est valide
        if(Request::ajax()) {
            //On récupère les valeurs envoyées
            $data = Input::all();
            //On récupère la série qui doit être ajouté.
            $id_serie = DB::table('series')->select('id')->where('original_name', '=', $data['name'])->first();
            //On effectue vérification pour ne pas insérer de doublons dans la base de données.
            $verif = DB::table('usersseries')->where('user_id', '=', Auth::user()->id)
                                             ->where('serie_id', '=', $id_serie->id)->get();
            //Si la requête precedente retourne aucuns résultats
            if(sizeof($verif) == 0){
                //On ajoute la séries au séries regardées
                DB::table('usersseries')->insert(
                    ['user_id' => Auth::user()->id, 'serie_id' => $id_serie->id]
                );
                //On retourne le résultat de la requête à l'utilisateur
                print_r("The serie '" . $data['name'] . "' is add to your watched series.");die;
            }else{
                //Sinon on dit à l'utilisateur que cette séries est déjà ajoutée dans la BDD
                print_r("The serie '" . $data['name'] . "' was already added to watched series");die;
            }
        }
    }
}
