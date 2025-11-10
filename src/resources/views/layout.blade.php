<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KritikalMess</title>
</head>
<body>
    <header>
        <h1>KritikalMess</h1>
        <nav>
            <ul>
                <li><a href="{{route('index')}}">Főoldal</a></li>
                <li><a href="{{route('votes')}}">Kérdések</a></li>
                <li><a href="{{route('questions.create')}}">Új szavazás</a></li>
                <li><a href="{{route('sign.register')}}">Regisztráció</a></li>
                <li><a href="{{route('sign.login')}}">Bejelentkezés</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')  
    </main>
    <footer>
        <p>&copy; 2025 KritikalMess</p>
    </footer>
        
</body>
</html>