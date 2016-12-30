<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function account(){
        echo 'A construire';
    }
}
