<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /** Renvoie la vue S'enregistrer
     * @return
     */
    public function getRegisterPage(){
        return view('register');
    }
}
