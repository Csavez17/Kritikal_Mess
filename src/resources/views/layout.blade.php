<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KritikalMess</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
        <h1></h1>
        <nav>
            <ul>
                <li><a href="{{ route('index') }}">Főoldal</a></li>
                <li><a href="{{ route('questions.index') }}">Kérdések</a></li>
                <li><a href="{{ route('questions.create') }}">Új szavazás</a></li>
                <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
                <li><a href="{{ route('register') }}">Regisztráció</a></li>
            </ul>
        </nav>
    </header>

   <main class="image-wrapper" 
      style="background-image: url('{{ asset('Kritikal_Mess_kep.jpg') }}');">
        <div class="content-on-image">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; 2025 KritikalMess</p>
    </footer>
</body>
</html>