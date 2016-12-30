<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests\RechercheSerieValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RechercheSerieController extends Controller
{
    /**
     * Fonction qui appelle la vue qui gère la page des séries que propose le site.Cette page est construite avec une images aléatoire.
     * Cette image constituera le background.
     * Cette page permet la recherche de series suivant differents critère comme le nom, le realisateur ou le genre.
     * @return $this vue de la page séries du site.
     */
    public function create()
    {
        //Requête qui récupère une images aléatoirement. Elle constituera le background de la page d'accueil.
        $image = DB::table('series')->whereNotNull('backdrop_path')->inRandomOrder()->first();
        //Appel de la vue propos qui utilisera l'image aléatoire pour son background.
        return view('series')->with('image', $image);
    }

    /**
     * Méthode qui permet la validation du formulaire de recherche de serie
     * @param  RechercheSerieValidation  $request
     */
    public function store(RechercheSerieValidation $request)
    {
        //Création d'une variable qui permet de tester la conformité du formulaire
        $validator = null;
        //Switch qui permettra de tester les champs en fonction du type de recherche souhaitée
        switch($request->search){
            //Si le type de recherche est par nom, on test le champ nom
            case 'N' : {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|min:2|max:25',
                ]);
                break;
            }
            //Si le type de recherche est par realisateur, on test le champ realisateur
            case 'R' : {
                $validator = Validator::make($request->all(), [
                    'creator' => 'required|min:2|max:25',
                ]);
                break;
            }
            //Si le type de recherche est par genre, on test le champ genre
            case 'G' : {
                $validator = Validator::make($request->all(), [
                    'genre' => 'required',
                ]);
                break;
            }
        }
        //Si la validation a échouée, on retourne sur la page du formulaire et on indique à l'utilisateur qu'il y a eu une erreur
        if ($validator->fails()) {
            return redirect('series')
                ->withErrors($validator)
                ->withInput();
        }else{
            //Sinon on recherche les séries qui correspondent aux critères de l'utilisateur
            $result = null;
            if($request->search == 'N'){
                //On modifie la requête suivant le nombre de résultats souhaité par l'utilisateur
                if($request->size == 'X'){
                    $result = DB::table('series')->where('name', 'LIKE', '%' . $request->name . '%')->get();
                }else{
                    $result = DB::table('series')->where('name', 'LIKE', '%' . $request->name . '%')->limit($request->size)->get();
                }
            }
            if($request->search == 'G'){
                //On modifie la requête suivant le nombre de résultats souhaité par l'utilisateur
                if($request->size == 'X'){
                    $result = DB::table('series')->join('seriesgenres', 'series.id', '=', 'series_id')
                                                 ->join('genres', 'genre_id', '=', 'genres.id')
                                                 ->where('genres.name', '=', $request->genre)->get();
                }else{
                    $result = DB::table('series')->join('seriesgenres', 'series.id', '=', 'series_id')
                                                 ->join('genres', 'genre_id', '=', 'genres.id')
                                                 ->where('genres.name', '=', $request->genre)
                                                 ->limit($request->size)->get();
                }
            }
            if($request->search == 'R'){
                //On modifie la requête suivant le nombre de résultats souhaité par l'utilisateur
                if($request->size == 'X'){
                    $result = DB::table('series')->join('seriescreators', 'series.id', '=', 'series_id')
                                                 ->join('creators', 'creator_id', '=', 'creators.id')
                                                 ->where('creators.name', 'LIKE', '%' . $request->creator . '%')
                                                 ->get();
                }else{
                    $result = DB::table('series')->join('seriescreators', 'series.id', '=', 'series_id')
                                                 ->join('creators', 'creator_id', '=', 'creators.id')
                                                 ->where('creators.name', 'LIKE', '%' . $request->creator . '%')
                                                 ->limit($request->size)->get();
                }
            }

            //Requête qui récupère une images aléatoirement. Elle constituera le background de la page d'accueil.
            $image = DB::table('series')->whereNotNull('backdrop_path')->inRandomOrder()->first();
            //Appel de la vue propos qui utilisera l'image aléatoire pour son background.
            return view('series_result')->with('image', $image)->with('result', $result);
        }
    }
}
