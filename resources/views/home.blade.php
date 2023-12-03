@extends('layouts.layout')

@section('content')
    @if(session('success'))

       {{-- Ne pas oublier d'inclure le css dans un fichier externe par la suite--}}

        <div style="color:green;" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<h1>Accueil</h1>


@endsection
