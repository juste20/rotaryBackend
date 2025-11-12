<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Rotary')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/admin.js') }}" defer></script>
</head>
<body>

<div class="dashboard">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2>Rotary Admin</h2>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.users.index') }}">Utilisateurs</a>
            <a href="{{ route('admin.payments.index') }}">Paiements</a>
            <a href="{{ route('admin.invoices.index') }}">Factures</a>
            <a href="{{ route('admin.events.index') }}">Événements</a>
            <a href="{{ route('admin.attendances.index') }}">Présences</a>
            <a href="{{ route('admin.actions.index') }}">Actions</a>
            <a href="{{ route('admin.posts.index') }}">Articles</a>
            <a href="{{ route('admin.media.index') }}">Médias</a>
            <a href="{{ route('admin.documents.index') }}">Documents</a>
            <a href="{{ route('admin.newsletters.index') }}">Newsletters</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="margin-top:20px;">Déconnexion</button>
        </form>
    </aside>

    <!-- CONTENU -->
    <section class="content">
        <header style="background:#f1f1f1; padding:15px;">
            <h1>@yield('page-title', 'Tableau de bord')</h1>
        </header>

        <main style="padding:20px;">
            @yield('content')
        </main>
    </section>
</div>

</body>
</html>
