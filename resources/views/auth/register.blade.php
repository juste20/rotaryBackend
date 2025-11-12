@extends('layouts.auth')

@section('title', 'Inscription')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-success text-white text-center fw-bold">
                    Créer un nouveau compte
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom complet</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Adresse e-mail</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirmer le mot de passe</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rôle</label>
                            <select name="role" class="form-select">
                                <option value="member">Membre</option>
                                <option value="admin">Administrateur</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Créer le compte</button>
                    </form>
                </div>
                <div class="card-footer text-center text-muted">
                    Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
