<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href={{ asset('/css/app.css') }}>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="{{ route('campeonato.index') }}" class="navbar-brand">Campeonato</a>
            <a href="{{ route('time.index') }}" class="navbar-brand">Time</a>
            @auth
                
            <a href="{{ route('logout') }}" class="navbar-brand">Sair</a>
            @endauth

            @guest
              <a href="{{ route('login') }}" class="navbar-brand">Entrar</a>  
            @endguest
        </div>
    </nav>

    <div class="container">

        <h1>{{ $title }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        
    @endif

        {{ $slot }}
    </div>
</body>

</html>
