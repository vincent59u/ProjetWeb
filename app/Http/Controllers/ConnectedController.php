<?php

namespace App\Http\Controllers;

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
        //Appel de la vue account qui utilisera l'image aléatoire pour son background.
        return view('account')->with('image', $image);
    }
}
