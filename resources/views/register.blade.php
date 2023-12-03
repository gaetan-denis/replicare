@extends('layouts.layout')

@section('content')

   {{--
   {{ __('Nom d\'utilisateur') }} est utilisé pour la syntaxe de traduction, cf. ressources/lang/messages.php

   --}}

   {{--
   old('user_username') est une fonction helper de Laravel qui récupère la valeur précédemment entrée dans le champ de formulaire spécifié.Utilisé pour restaurer les valeurs des champs après une validation échouée.
   --}}

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <label for="user_username">{{ __('Nom d\'utilisateur') }}</label>
        <input id="user_username" type="text" name="user_username" value="{{ old('user_username') }}" required
               autocomplete="user_username" autofocus>

        @error('user_username')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <label for="user_email">{{ __('Adresse email') }}</label>
        <input id="user_email" type="email" name="user_email" value="{{ old('user_email') }}" required
               autocomplete="user_email">

        @error('user_email')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <label for="user_password">{{ __('Mot de passe') }}</label>
        <input id="user_password" type="password" name="user_password" required autocomplete="new-password">

        @error('user_password')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <label for="user_password_confirmation">{{ __('Confirmez le mot de passe') }}</label>
        <input id="user_password_confirmation" type="password" name="user_password_confirmation" required autocomplete="new-password">

        @error('user_password_confirmation')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <label for="user_avatar">{{ __('Avatar') }}</label>
        <input id="user_avatar" type="file" name="user_avatar" accept="image/*">
        @error('user_avatar')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <button type="submit">
            {{ __('S\'enregistrer') }}
        </button>
    </form>

@endsection
