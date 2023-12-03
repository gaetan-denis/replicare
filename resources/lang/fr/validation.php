<?php

//Ce fichier permet la traduction des messages d’erreurs personnalisés et en français

return [
    'custom' => [
        'user_username' => [
            'required' => 'Vous devez entrer un nom d’utilisateur valide afin de vous enregistrer',
            'min' => 'Nom d’utilisateur trop court, veuillez augmenter le nombre de caractères pour qu\'il contienne au moins :min caractères.',
            'max' => 'Nom d’utilisateur trop long, veuillez diminuer le nombre de caractères pour qu\'il soit inférieur à :min',
            'regex' => 'Le nom d’utilisateur contient un caractère non autorisé, veuillez n’utiliser que les
             caractères spéciaux suivants : ! @ # $ % & ( ) - _ + = { } [ ] | \ : ; \'',
            'unique' => 'Ce nom d\'utilisateur est déjà utilisé. Veuillez en choisir un autre.',

        ],
        'user_email' => [
            'required' => ' Vous devez entrer un nom d’utilisateur valide afin de vous enregistrer',
            'email' => ' Email non valide, veuillez entrer un email valide',
            'unique' => 'Cette adresse email est déjà utilisée. Veuillez en choisir une autre.',

        ],
        'user_password' => [
            'required' => 'Le champ Mot de passe est requis.',
            'min' => 'Mot de passe trop court, veuillez augmenter le nombre de caractères pour qu\'il contienne au moins :min caractères.',
            'max' => 'Mot de passe trop long, veuillez diminuer le nombre de caractères pour qu\'il soit inférieur à :max',
            'confirmed' => 'Les deux mots de passe ne correspondent pas'

        ],
        'user_avatar' => [

            'image' => ' Le fichier que vous avez fourni n’est pas un fichier image, veuillez choisir un fichier image pour enregistrer
            votre avatar',

            /*
             *mime va vérifier que les extensions sont bien conformes
             */

            'mimes' => 'Ce type d’image n’est pas pris en compte par Replicare, veuillez choisir votre image avec les extensions suivantes : :values.',
        ],
    ],
];
