<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentification - Rotary')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="auth-container" style="display:flex;align-items:center;justify-content:center;height:100vh;background:#f4f6f9;">
    <div class="auth-box" style="background:white;padding:30px;border-radius:10px;box-shadow:0 2px 10px rgba(0,0,0,0.1);width:400px;">

        <div style="text-align:center;margin-bottom:20px;">
            <img src="{{ asset('uploads/logo.png') }}" alt="Rotary Logo" style="height:50px;">
            <h2>@yield('page-title')</h2>
        </div>

        @if(session('status'))
            <div class="alert success">{{ session('status') }}</div>
        @endif

        @yield('content')

        <div style="text-align:center;margin-top:10px;">
            @yield('links')
        </div>
    </div>
</div>

</body>
</html>
