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

    /**
     * Méthode qui permet de proposé des recommandation à l'utilisateur suivant son genre de série préférée
     * Récupération de tous les genres de séries regardées par l'utilisateur
     * Proposition de 3 séries aléatoires.
     * @return $recommandation
     */
    public function recommandationGenre(){
        //Si la requête AJAX est valide
        if(Request::ajax()) {
            //On récupère l'ensemble des genres des séries visionnées par l'utilisateur
            $genre_user = DB::table('genres')->select('genres.name')
                                             ->join('seriesgenres', 'genres.id', '=', 'seriesgenres.genre_id')
                                             ->join('usersseries', 'seriesgenres.series_id', '=', 'usersseries.serie_id')
                                             ->where('usersseries.user_id', '=', Auth::user()->id)->get();
            //On crée un tableau intermédiaire afin de pouvoir utiliser la méthode array_count_values
            $array_genre = array();
            //On ajoute le nom du genre dans le nouveau tableau, passage d'objet à string
            foreach($genre_user as $genre){
                array_push($array_genre, $genre->name);
            }
            //On crée un nouveau tableau qui permet de compter le nombre d'apparitions pour chaque genres
            $count = array_count_values($array_genre);
            //On trie le tableau
            arsort($count);
            //On recherche 3 séries du genre préféré de l'utilisateur. On propose un résultat aléatoire.
            $recommandation = DB::table('series')->join('seriesgenres', 'series.id', '=', 'seriesgenres.series_id')
                                                 ->join('genres', 'seriesgenres.genre_id', '=', 'genres.id')
                                                 ->where('genres.name', '=', key($count))
                                                 ->inRandomOrder()->limit(3)->get();
            //On return l'ensemble des résultats à l'utilisateur
            return $recommandation;
        }
    }

    /**
     * Méthode qui permet de proposé des recommandation à l'utilisateur suivant les compagnies de production des séries qu'il visionne.
     * Récupération de toustes les compagnies de production de séries regardées par l'utilisateur
     * Proposition de 3 séries aléatoires suivant les compagnies de production.
     * @return $recommandation
     */
    public function recommandationCompanies(){
        //Si la requête AJAX est valide
        if(Request::ajax()) {
            //On récupère l'ensemble des compagnies de production des séries visionnées par l'utilisateur
            $companies = DB::table('companies')->select('companies.name')
                                               ->join('seriescompanies', 'companies.id', '=', 'seriescompanies.company_id')
                                               ->join('usersseries', 'usersseries.serie_id', '=', 'seriescompanies.series_id')
                                               ->where('usersseries.user_id', '=', Auth::user()->id)->get();
            //On crée un tableau intermédiaire afin de pouvoir utiliser la méthode array_count_values
            $array_companies = array();
            //On ajoute le nom des compagnies de production dans le nouveau tableau, passage d'objet à string
            foreach($companies as $c){
                array_push($array_companies, $c->name);
            }
            //On crée un nouveau tableau qui permet de compter le nombre d'apparitions pour chaque compagnie de production
            $count = array_count_values($array_companies);
            //On trie le tableau
            arsort($count);
            //On recherche 3 séries de la compagnie de production préférée de l'utilisateur. On propose un résultat aléatoire.
            $recommandation = DB::table('series')->join('seriescompanies', 'series.id', '=', 'seriescompanies.series_id')
                                                 ->join('companies', 'seriescompanies.company_id', '=', 'companies.id')
                                                 ->where('companies.name', '=', key($count))
                                                 ->inRandomOrder()->limit(3)->get();
            //On return l'ensemble des résultats à l'utilisateur
            return $recommandation;
        }
    }
}