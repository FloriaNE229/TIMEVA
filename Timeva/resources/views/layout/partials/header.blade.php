<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="flex items-center justify-between p-4 max-w-7xl mx-auto ">
        <div class="text-xl font-bold">
            <a href="{{ route('home') }}">Timeva</a>
        </div>

        <div class="space-x-6">

            <a href="{{ route('products.watches') }}" class="hover:text-gray-700">Montres</a>
            <a href="{{ route('products.glasses') }}" class="hover:text-gray-700">Lunettes</a>
        </div>

        <div class="flex items-center space-x-4">
            <a href="{{ route('cart') }}" class="relative">
                <i class="icon-shopping-cart"></i>
                {{-- <span class="badge">{{ '' }}</span> --}}
            </a>
            <a href="{{ route('login') }}" class="hover:text-gray-700">Se connecter</a>
            <a href="{{ route('register') }}" class="hover:text-gray-700">S'inscrire</a>
        </div>
    </nav>
</header>