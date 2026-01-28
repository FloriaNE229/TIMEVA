@extends('layout.app')

@section('title', 'Inscription')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-md p-8">

        <!-- Titre -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Inscription</h2>
            <p class="text-gray-500 mt-1">Créez votre compte <span class="font-semibold">Timeva</span></p>
        </div>

        <!-- Formulaire -->
        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="votre@email.com"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"
                >
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Mot de passe
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"
                >
            </div>

            <!-- Confirmation -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                    Confirmer le mot de passe
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"
                >
            </div>

            <!-- Bouton -->
            <button
                type="submit"
                class="w-full mt-4 bg-gray-900 text-white py-2.5 rounded-lg font-semibold hover:bg-gray-800 transition"
            >
                S'inscrire
            </button>
        </form>

        <!-- Lien connexion -->
        <p class="text-center text-sm text-gray-600 mt-6">
            Déjà un compte ?
            <a href="{{ route('login') }}" class="font-semibold text-gray-900 hover:underline">
                Se connecter
            </a>
        </p>
    </div>
</div>
@endsection