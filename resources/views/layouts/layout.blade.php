<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Replicare</title>
    <link rel="stylesheet" href="/resources/css/app.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="{{route('home')}}">Accueil</a></li>
        <li><a href="{{route('register')}}">S'enregistrer</a></li>
        <li><a href="{{route('login')}}">Se connecter</a></li>
    </ul>
</nav>
@yield('content')
</body>
</html>
