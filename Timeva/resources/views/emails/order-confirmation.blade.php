<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 0;
            background-color: #f5f5f5;
        }
        .email-container {
            background-color: #ffffff;
            margin: 20px auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #1a1a1a;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
            letter-spacing: 2px;
        }
        .header p {
            margin: 0;
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            padding: 30px 20px;
        }
        .order-info {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            border-left: 4px solid #1a1a1a;
        }
        .order-info h2 {
            margin: 0 0 10px 0;
            color: #1a1a1a;
            font-size: 20px;
        }
        .order-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            background-color: #fef3c7;
            color: #92400e;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-transform: capitalize;
        }
        .products-section {
            margin: 20px 0;
        }
        .products-section h3 {
            color: #1a1a1a;
            font-size: 18px;
            margin-bottom: 15px;
        }
        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: start;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        .product-item:last-child {
            border-bottom: none;
        }
        .product-details {
            flex: 1;
        }
        .product-name {
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 5px;
        }
        .product-specs {
            font-size: 13px;
            color: #666;
        }
        .product-price {
            font-weight: 600;
            color: #1a1a1a;
            white-space: nowrap;
            margin-left: 20px;
        }
        .total-section {
            background-color: #1a1a1a;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            font-size: 22px;
            font-weight: bold;
        }
        .shipping-info {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .shipping-info h3 {
            color: #1a1a1a;
            font-size: 18px;
            margin: 0 0 15px 0;
        }
        .shipping-info p {
            margin: 5px 0;
            color: #333;
            line-height: 1.6;
        }
        .footer {
            background-color: #f5f5f5;
            text-align: center;
            padding: 25px 20px;
            color: #666;
            font-size: 13px;
        }
        .footer p {
            margin: 8px 0;
        }
        .footer a {
            color: #1a1a1a;
            text-decoration: none;
            font-weight: 600;
        }
        .divider {
            height: 1px;
            background-color: #eee;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>TIMEVA</h1>
            <p>Merci pour votre commande !</p>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Order Info -->
            <div class="order-info">
                <h2>Commande #{{ substr($order->id, 0, 8) }}</h2>
                <p><strong>Date :</strong> {{ $order->date_creation->format('d/m/Y à H:i') }}</p>
                <p><strong>Statut :</strong> <span class="status-badge">{{ ucfirst($order->statut) }}</span></p>
            </div>

            <!-- Products -->
            <div class="products-section">
                <h3>📦 Articles commandés</h3>
                @foreach($order->articles as $article)
                    @php
                        $infos = json_decode($article->infos_variante, true) ?? [];
                    @endphp
                    <div class="product-item">
                        <div class="product-details">
                            <div class="product-name">{{ $article->nom_produit }}</div>
                            <div class="product-specs">
                                @if(isset($infos['couleur']))
                                    Couleur : {{ $infos['couleur'] }}
                                @endif
                                @if(isset($infos['taille']))
                                    @if(isset($infos['couleur'])) • @endif
                                    Taille : {{ $infos['taille'] }}
                                @endif
                                <br>
                                Quantité : {{ $article->quantite }} × {{ number_format($article->prix_unitaire, 2) }} €
                            </div>
                        </div>
                        <div class="product-price">
                            {{ number_format($article->total, 2) }} €
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Total -->
            <div class="total-section">
                <div class="total-row">
                    <span>Total</span>
                    <span>{{ number_format($order->montant, 2) }} €</span>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="shipping-info">
                <h3>🚚 Adresse de livraison</h3>
                <p>
                    {{ $order->adresse_livraison }}<br>
                    {{ $order->code_postal }}<br>
                    {{ $order->pays_expedition }}
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Vous recevrez un email de suivi dès l'expédition de votre commande.</p>
            <div class="divider"></div>
            <p>Questions ? Contactez-nous à <a href="mailto:contact@timeva.com">contact@timeva.com</a></p>
            <p>&copy; {{ date('Y') }} TIMEVA - Tous droits réservés</p>
        </div>
    </div>
</body>
</html>