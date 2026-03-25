<?php
// Marrim të dhënat nga URL që vijnë prej index.php
$plan = isset($_GET['plan']) ? htmlspecialchars($_GET['plan']) : "Pa zgjedhur";
$price = isset($_GET['price']) ? htmlspecialchars($_GET['price']) : "0";

// Këtu mund të vendosni linket tuaja reale të pagesave nga Stripe ose Binance
$stripe_link = "https://buy.stripe.com/test_ekg28p0Yd5p4"; // Zëvendësoje me linkun tënd
$binance_link = "https://pay.binance.com/en/checkout/your-id"; // Zëvendësoje me linkun tënd
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | SocialGrowth Agency</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #0f172a;
            color: white;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .checkout-card {
            background: #1e293b;
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            border: 1px solid #334155;
        }

        .header-info {
            text-align: center;
            border-bottom: 1px solid #334155;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .plan-name {
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .plan-price {
            font-size: 3rem;
            font-weight: bold;
            color: #6366f1;
        }

        .payment-methods h3 {
            font-size: 1.1rem;
            margin-bottom: 20px;
            text-align: center;
            color: #f8fafc;
        }

        .pay-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #0f172a;
            padding: 15px 20px;
            border-radius: 12px;
            text-decoration: none;
            color: white;
            margin-bottom: 15px;
            border: 1px solid #334155;
            transition: all 0.3s ease;
        }

        .pay-option:hover {
            border-color: #6366f1;
            transform: translateY(-2px);
            background: #1e293b;
        }

        .icon-text {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .pay-option b {
            font-size: 1rem;
        }

        .visa-icon { color: #1a1f71; font-weight: bold; font-style: italic; }
        .stripe-icon { color: #635bff; font-weight: bold; }
        .binance-icon { color: #f3ba2f; font-weight: bold; }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .back-link:hover { color: white; }
    </style>
</head>
<body>

    <div class="checkout-card">
        <div class="header-info">
            <div class="plan-name">Paketa: <?php echo $plan; ?></div>
            <div class="plan-price">€<?php echo $price; ?></div>
            <p style="color: #64748b;">Pagesë mujore e rregullt</p>
        </div>

        <div class="payment-methods">
            <h3>Zgjidhni metodën e pagesës</h3>

            <a href="thankyou.php?plan=<?php echo $plan; ?>&method=Visa" class="pay-option">
                <div class="icon-text">
                    <span class="visa-icon">VISA</span>
                    <b>Kartelë Bankare</b>
                </div>
                <span>&rarr;</span>
            </a>

            <a href="thankyou.php?plan=<?php echo $plan; ?>&method=Stripe" class="pay-option">
                <div class="icon-text">
                    <span class="stripe-icon">S|</span>
                    <b>Stripe Direct</b>
                </div>
                <span>&rarr;</span>
            </a>

            <a href="thankyou.php?plan=<?php echo $plan; ?>&method=Binance" class="pay-option">
                <div class="icon-text">
                    <span class="binance-icon">🔶</span>
                    <b>Binance Pay (Crypto)</b>
                </div>
                <span>&rarr;</span>
            </a>
        </div>

        <a href="index.php" class="back-link">← Kthehu te paketat</a>
    </div>

</body>
</html>