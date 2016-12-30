<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Ce controller permet de gérer (controler) les actions faites par les utilisateur non connecter (Les visiteurs)
 * Class VisiteurController
 * @package App\Http\Controllers
 */
class VisiteurController extends Controller
{
    /**
     * Méthode qui permet de récupérer 3 images qui seront choisi aléatoirement pour construire la page d'acceuil
     * Elle transmettra les images à la vue Accueil.blade.php
     * @return $this vue de la page d'accueil de notre site.
     */
    public function accueil(){
        //Requête qui récupère 3 images aléatoirement. Elles constitueront le background de la page d'accueil.
        $images = DB::table('series')->whereNotNull('backdrop_path')->inRandomOrder()->limit(3)->get();
        //Modification du resultat pour le mettre dans un tableau à une seule dimension.
        //Utile pour faciliter la construction de la page d'accueil.
        $background[] = array();
        for($i = 0; $i < 3; $i++){
            $background[$i] = $images[$i]->backdrop_path;
        }
        //Appel de la page d'accueil avec le tableau d'images qui constituera le background.
        return view('accueil')->with('background', $background);
    }

    /**
     * Fonction qui appelle une vue pour construire la page à propos. Cette page est construite avec une images aléatoire.
     * Cette image constituera le background.
     * @return $this vue de la page à propos du site
     */
    public function about(){
        //Requête qui récupère une images aléatoirement. Elle constituera le background de la page d'accueil.
        $image = DB::table('series')->whereNotNull('backdrop_path')->inRandomOrder()->first();
        //Appel de la vue propos qui utilisera l'image aléatoire pour son background.
        return view('propos')->with('image', $image);
    }

    /**
     * Méthode qui permet d'afficher le formulaire d'inscription du site
     * @return $this
     */
    public function signin(){
        //Requête qui récupère une images aléatoirement. Elle constituera le background de la page d'accueil.
        $image = DB::table('series')->whereNotNull('backdrop_path')->inRandomOrder()->first();
        //Appel de la vue propos qui utilisera l'image aléatoire pour son background.
        return view('inscription')->with('image', $image);
    }

    /**
     * Méthode qui permet d'afficher le formulaire de connexion au site.
     * @return $this
     */
    public function login(){
        //Requête qui récupère une images aléatoirement. Elle constituera le background de la page d'accueil.
        $image = DB::table('series')->whereNotNull('backdrop_path')->inRandomOrder()->first();
        //Appel de la vue propos qui utilisera l'image aléatoire pour son background.
        return view('connexion')->with('image', $image);
    }
}
