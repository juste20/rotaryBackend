@extends('layouts.auth')

@section('title', 'Mot de passe oublié')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-warning text-dark text-center fw-bold">
                    Réinitialiser votre mot de passe
                </div>
                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Adresse e-mail</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Envoyer le lien de réinitialisation</button>
                    </form>
                </div>
                <div class="card-footer text-center text-muted">
                    <a href="{{ route('login') }}">Retour à la connexion</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
