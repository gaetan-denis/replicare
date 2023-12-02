<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/*
 * Cela va servir à utiliser le hachage des mots de passe de manière sécurisée
 * */
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    /*
     * Colonnes autorisées à être remplies lors d'une mise à jour de masse.
     * */
    protected $fillable = ['user_username', 'user_email', 'user_password', 'user_role', 'user_avatar'];

    public static $rules = [
        'user_username' => 'required|string|min:3|max:255|unique:users|regex:/^[a-zA-Z0-9!@#$%^&*()\-_+=\[\]{}|\\:;\'",.?<>\/\s]+$/',
        'user_email' => 'required|email|unique:users',
        'user_password' => 'required|string|min:12|regex:/^[a-zA-Z0-9!@#$%^&*()\-_+=\[\]{}|\\:;\'",.?<>\/\s]+$/',
        'user_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['user_password'] = Hash::make($value);
    }

}
