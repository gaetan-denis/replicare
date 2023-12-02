<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /** Renvoie la vue home
     * @return
     */
    public function getHomePage(){
        return view('home');
    }
}
