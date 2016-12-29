<?php

namespace App\Http\Controllers;

use App\Http\Requests\RechercheSerieValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RechercheSerieController extends Controller
{
    /**
     * Fonction qui appelle la vue qui gère la page des séries que propose le site.Cette page est construite avec une images aléatoire.
     * Cette image constituera le background.
     * Récupère également la liste des genres afin de proposer une recherche complète.
     * @return $this vue de la page séries du site.
     */
    public function create()
    {
        //Requête qui récupère une images aléatoirement. Elle constituera le background de la page d'accueil.
        $image = DB::table('series')->whereNotNull('backdrop_path')->inRandomOrder()->first();
        $genres = DB::table('genres')->select('name')->get();
        //Appel de la vue propos qui utilisera l'image aléatoire pour son background.
        return view('series')->with('image', $image)->with('genres', $genres);
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RechercheSerieValidation $request)
    {
        $this->validate($request, [
            'acteur' => 'required|max:255',
        ]);

        echo 'test';
    }
}
