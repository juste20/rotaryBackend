<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rotary Club')</title>
    <!-- Inclusion de ton CSS existant -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Petite adaptation pour footer collé en bas -->
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            /* prend tout l'espace disponible */
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('uploads/logo.png') }}" alt="Rotary Logo" style="height:40px;">
                </a>
            </div>

            <div class="nav-links">
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('blog.index') }}">Blog</a>
                <a href="{{ route('actions.index') }}">Actions</a>
                <a href="{{ route('contact.index') }}">Contact</a>
                <a href="{{ route('partners.index') }}">Partenaires</a>
            </div>

            <div class="auth-links">
                @auth
                    <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="logout-btn">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Connexion</a>
                    <a href="{{ route('register') }}">Inscription</a>
                @endauth
            </div>

            <button class="menu-btn">☰</button>
        </nav>
    </header>

    <!-- CONTENU PRINCIPAL -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; {{ date('Y') }} Rotary Club - Tous droits réservés</p>
    </footer>

</body>

</html>
