<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']) ? true : false;
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialGrowth | Agjenci Elite SMMA</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body>

    <div id="login-overlay">
        <div class="overlay-content">
            <div class="lock-circle"><i class="fas fa-fingerprint"></i></div>
            <h2>Identifikimi i Kërkuar</h2>
            <p>Për të hyrë në portalin e paketave dhe strategjive tona, ju lutem identifikohuni si klient ose admin.</p>
            <a href="auth.php" class="btn-overlay">Vazhdo te Logini</a>
        </div>
    </div>

    <nav class="navbar">
        <div class="logo">SocialGrowth<span>.</span></div>
        <div class="nav-links">
            <a href="#services">Shërbimet</a>
            <a href="#pricing">Paketat</a>
            <a href="#reviews">Vlerësimet</a>
        </div>
        <div class="nav-right">
            <?php if($isLoggedIn): ?>
                <span class="user-status"><i class="fas fa-user-check"></i> <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="logout.php" class="logout-btn">Dil</a>
            <?php else: ?>
                <a href="auth.php" class="login-link"><i class="fas fa-sign-in-alt"></i> Hyr</a>
            <?php endif; ?>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <span class="badge">SMMA PROFESIONALE</span>
                <h1>Skaloni Biznesin Tuaj <br><span class="gradient-text">Në Nivele të Reja</span></h1>
                <p>Ne krijojmë strategji që konvertojnë shikuesit në klientë besnikë. Menaxhim, Ads, dhe Content Creation - të gjitha në një vend.</p>
                <div class="hero-actions">
                    <a href="#pricing" class="btn-primary">Shiko Paketat</a>
                    <a href="#services" class="btn-secondary">Zbuloni Shërbimet</a>
                </div>
            </div>
            <div class="hero-image">
                <div class="main-sphere">
                    <i class="fas fa-rocket"></i>
                </div>
                <div class="floating-stat stat-1">
                    <i class="fas fa-chart-line"></i>
                    <span>+300% ROI</span>
                </div>
                <div class="floating-stat stat-2">
                    <i class="fas fa-users"></i>
                    <span>250+ Klientë</span>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <h2>Shërbimet Tona</h2>
                <div class="line"></div>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-video"></i>
                    <h3>Reels & Video</h3>
                    <p>Editim profesional i videove që kapin vëmendjen në sekondat e para.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-ad"></i>
                    <h3>Paid Ads</h3>
                    <p>Menaxhim i buxhetit të reklamave në Facebook, Instagram dhe Google.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-pencil-alt"></i>
                    <h3>Copywriting</h3>
                    <p>Përshkrime postimesh që shesin dhe krijojnë ndërveprim (Engagement).</p>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <div class="container">
            <div class="section-header">
                <h2>Paketat Ekskluzive</h2>
            </div>
            <div class="pricing-grid">
                <div class="price-card">
                    <h3>Starter</h3>
                    <div class="amount">€200<span>/muaj</span></div>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> 1 Platformë Sociale</li>
                        <li><i class="fas fa-check-circle"></i> 8 Postime / Muaj</li>
                        <li class="locked"><i class="fas fa-times-circle"></i> Video Editim</li>
                    </ul>
                    <a href="checkout.php?plan=Starter&price=200" class="btn-select">Zgjidh Starter</a>
                </div>
                <div class="price-card featured">
                    <div class="hot-tag">MË E POPULLUARA</div>
                    <h3>Growth</h3>
                    <div class="amount">€500<span>/muaj</span></div>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> 2 Platforma Sociale</li>
                        <li><i class="fas fa-check-circle"></i> 12 Postime + 4 Reels</li>
                        <li><i class="fas fa-check-circle"></i> Ads Management</li>
                    </ul>
                    <a href="checkout.php?plan=Growth&price=500" class="btn-select active">Zgjidh Growth</a>
                </div>
            </div>
        </div>
    </section>

    <section id="reviews" class="reviews">
        <div class="container">
            <div class="section-header">
                <h2>Çfarë Thonë Klientët</h2>
            </div>
            <div class="reviews-grid">
                <div class="review-item">
                    <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p>"Bashkëpunimi më i mirë që kemi pasur. SocialGrowth na ndihmoi të dyfishojmë shitjet online brenda 3 muajve."</p>
                    <h4>- Altin Rama, <span>CEO i TechStore</span></h4>
                </div>
                <div class="review-item">
                    <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p>"Kreativiteti i tyre në Reels është i pakrahasueshëm. Çdo postim që bëjnë shkon viral!"</p>
                    <h4>- Elona Krasniqi, <span>Fashion Designer</span></h4>
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer">
        <div class="footer-grid">
            <div class="footer-info">
                <h2 class="logo">SocialGrowth<span>.</span></h2>
                <p>Partneri juaj i besuar për suksesin digjital.</p>
                <div class="socials">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Na Kontaktoni</h4>
                <p><i class="fas fa-envelope"></i> info@socialgrowth.com</p>
                <p><i class="fas fa-phone"></i> +383 49 555 666</p>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 SocialGrowth SMMA Agency. Të gjitha të drejtat e rezervuara.
        </div>
    </footer>

    <script>
        const isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;
        if (!isLoggedIn) {
            setTimeout(() => {
                document.getElementById('login-overlay').style.display = 'flex';
                document.body.classList.add('stop-scrolling');
            }, 10000);
        }
    </script>
</body>
</html>