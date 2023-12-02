<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{


    /** Renvoie la vue Se connecter
     * @return
     */
    public function getLoginPage()
    {
        return view('login');
    }
}
