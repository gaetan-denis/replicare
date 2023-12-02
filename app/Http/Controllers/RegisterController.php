<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /** Renvoie la vue S'enregistrer
     * @return
     */
    public function getRegisterPage()
    {
        return view('register');
    }

    /**
     * Gère le processus d'inscription
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'user_username' => 'required|string|min:3|max:255|unique:users',
            'user_email' => 'required|email|unique:users',
            'user_password' => 'required|string|min:12',
        ]);

        // Créer un nouvel utilisateur
        User::create([
            'user_username' => $request->input('user_username'),
            'user_email' => $request->input('user_email'),
            'user_password' => Hash::make($request->input('user_password')),
        ]);

        // Rediriger l'utilisateur après l'inscription
        return redirect('/')->with('success', 'Inscription réussie. Connectez-vous maintenant.');
    }

}
