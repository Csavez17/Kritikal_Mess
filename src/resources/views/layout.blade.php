<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KritikalMess</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script> <!-- Fiók törlése funkció -->
</head>
<body>
    <header>
        <h1></h1>
        <nav>
         <ul>
                {{-- mindenki --}}
                <li><a href="{{ route('index') }}">Főoldal</a></li>
                <li><a href="{{ route('questions.index') }}">Kérdések</a></li>
                <li><a href="{{ route('questions.create') }}">Új szavazás</a></li>

                {{-- VENDÉGEK (ha NINCS bejelentkezve) --}}
                @guest
                    <li><a href="{{ route('login') }}">Bejelentkezés</a></li>
                    <li><a href="{{ route('register') }}">Regisztráció</a></li>
                @endguest

                {{-- CSAK BEJELENTKEZVE --}}
                @auth
                    
                    {{-- PROFIL SZERKESZTÉSE (A nevére kattintva) --}}
                    <li>
                        <a href="{{ route('profile.edit') }}" style="color: #fedbef;">
                            {{ Auth::user()->name }} (Profil)
                        </a>
                    </li>

                    {{-- KILÉPÉS GOMB --}}
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: white; cursor: pointer; font-family: inherit; font-size: inherit; text-decoration: underline;">
                                Kilépés
                            </button>
                        </form>
                    </li>

                @endauth
            </ul>
        </nav>
    </header>

  <main class="image-wrapper" 
      style="background-image: url('@yield('hatterkep', asset('Kritikal_Mess_kep.jpg'))');">
      <div class="content-on-image">
        @yield('content')
    </div>
</main>

    <footer>
        <p>&copy; 2025 KritikalMess</p>
    </footer>
</body>
</html>