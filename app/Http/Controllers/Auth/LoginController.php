<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormValidation;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Méthode qui permet de se connecter au site.
     * @param FormValidation $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function doLogin(FormValidation $request)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|min:6' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(); // send back the input (not the password) so that we can repopulate the form
        }

        //Si l'identification se fait, on redirige l'utilisateur sur la page de son compte
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        } else {
            //Sinon on affiche un message erreur sur la page de login
            return redirect('/login')
                ->with('message-error', "The email or password is incorrect");
        }
    }

    /**
     * Méthode qui permet de se deconnecter du site.
     * @return $this
     */
    public function doLogout(){
        //Déconnexion du site et destruction de la session utilisateur
        Auth::logout();
        //Redirection sur la page d'accueil
        return redirect('/');
    }
}
