@extends('layout.app')
@section('title', $produit->nom ?? 'Détail produit')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->img ?? asset('images/default.jpg') }}"
                 class="img-fluid rounded"
                 alt="{{ $product->nom }}">
        </div>

        <div class="col-md-6">
            <h1>{{ $product->nom }}</h1>

            <p class="text-muted">
                {{ ucfirst($product->categorie) }}
            </p>

            <h3 class="text-primary">
                {{ number_format($product->prix, 2) }} €
            </h3>

            <p>
                {{ $product->description }}
            </p>

            {{-- Variantes --}}
            @if($product->variantes->count())
                <hr>
                <h5>Choisir une option :</h5>

                <div class="d-flex flex-wrap gap-2">
                    @foreach($product->variantes as $variante)
                        <button type="button"
                                class="btn btn-outline-dark variante-btn"
                                onclick="selectVariante(event, {{ $variante->id }}, {{ $variante->quantite_stock }})">
                            {{ $variante->couleur ?? $variante->taille ?? 'Option' }}
                        </button>
                    @endforeach
                </div>

                <p class="mt-2">
                    Stock disponible :
                    <span id="stock">Sélectionnez une option</span>
                </p>
            @endif

            {{-- Quantité --}}
            <div class="mt-3">
                <label>Quantité :</label>
                <input type="number"
                       id="quantite"
                       value="1"
                       min="1"
                       class="form-control"
                       style="width:120px;">
            </div>

            {{-- Bouton --}}
            <button class="btn btn-dark mt-3"
                    id="addToCartBtn"
                    disabled>
                Ajouter au panier
            </button>

        </div>
    </div>

    {{-- Produits similaires --}}
    @if($similaires->count())
        <hr class="my-5">
        <h3>
            Voir d'autres {{ $product->categorie }}
        </h3>

        <div class="row">
            @foreach($similaires as $item)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ $item->img ?? asset('images/default.jpg') }}"
                             class="card-img-top"
                             alt="{{ $item->nom }}">

                        <div class="card-body">
                            <h6>{{ $item->nom }}</h6>
                            <p>{{ number_format($item->prix, 2) }} €</p>
                            <a href="{{ route('products.show', $item->slug) }}"
                               class="btn btn-sm btn-outline-dark">
                                Voir
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

{{-- SCRIPT --}}
<script>
    let selectedStock = 0;

    function selectVariante(event, id, stock) {
        document.querySelectorAll('.variante-btn')
            .forEach(btn => btn.classList.remove('active'));

        event.target.classList.add('active');

        selectedStock = stock;

        document.getElementById('stock').innerText = stock + " en stock";

        document.getElementById('quantite').max = stock;

        document.getElementById('addToCartBtn').disabled = stock === 0;
    }
</script>

@endsection
