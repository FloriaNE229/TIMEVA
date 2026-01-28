@extends('layout.app') 
@section('title', 'Accueil')

@section('content')
<div class="bg-gray-50">
    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-6 py-16 text-center">
        <p class="text-sm text-gray-500 uppercase mb-2">Nouvelle collection 2026</p>
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">L'Élégance à Portée de Main</h1>
        <p class="text-gray-600 text-lg mb-8">Découvrez notre sélection exclusive de montres et lunettes de luxe. Qualité exceptionnelle, design intemporel.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('products.watches') }}" class="px-6 py-3 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition">Explorer les Montres</a>
            <a href="{{ route('products.glasses') }}" class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-100 transition">Explorer les Lunettes</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="text-4xl mb-4"><icon-class></icon-class></div>
            <h3 class="font-semibold text-lg mb-2">Montres</h3>
            <p class="text-gray-500 text-sm">Des montres de prestige pour chaque moment de votre vie.</p>
        </div>
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="text-4xl mb-4"><icon-class></icon-class></div>
            <h3 class="font-semibold text-lg mb-2">Lunettes</h3>
            <p class="text-gray-500 text-sm">Affirmez votre style avec nos montures exclusives.</p>
        </div>
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="text-4xl mb-4"><icon-class></icon-class></div>
            <h3 class="font-semibold text-lg mb-2">Styles</h3>
            <p class="text-gray-500 text-sm">Accompagnez votre style avec nos ensembles.</p>
        </div>
    </section>

    <!-- Produits Vedettes -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Produits Vedettes</h2>
                <p class="text-gray-500">Notre sélection du moment</p>
            </div>
            <a href="{{ route('products.watches') }}" class="text-gray-900 font-semibold hover:underline">Voir tout</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            {{-- Ici tu peux ajouter ta boucle pour afficher les produits --}}
        </div>
    </section>

    <!-- Services Section -->
    <section class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="text-4xl mb-4"><icon-class></icon-class></div>
            <h3 class="font-semibold text-lg mb-2">Authenticité Garantie</h3>
            <p class="text-gray-500 text-sm">Tous nos produits sont 100% authentiques.</p>
        </div>
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="text-4xl mb-4"><icon-class></icon-class></div>
            <h3 class="font-semibold text-lg mb-2">Livraison Express</h3>
            <p class="text-gray-500 text-sm">Livraison gratuite en 24-48h pour toutes vos commandes.</p>
        </div>
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="text-4xl mb-4"><icon-class></icon-class></div>
            <h3 class="font-semibold text-lg mb-2">Retours Faciles</h3>
            <p class="text-gray-500 text-sm">30 jours pour changer d'avis, retour gratuit.</p>
        </div>
    </section>
</div>
@endsection