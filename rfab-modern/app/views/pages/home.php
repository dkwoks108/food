<?php
declare(strict_types=1);

$brandCoverImages = [
    '/assets/img/brand/covers/Kulhad Biryani.jpeg',
    '/assets/img/brand/covers/Matka Biryani.jpeg',
    '/assets/img/brand/covers/Biryaniwalas.jpeg',
    '/assets/img/brand/covers/Biryani King.jpeg',
    '/assets/img/brand/covers/Handi Biryani.jpeg',
    '/assets/img/brand/covers/Biryani Junction.jpeg',
    '/assets/img/brand/covers/Biryani Farm.jpeg',
    '/assets/img/brand/covers/House of Biryani.jpeg',
    '/assets/img/brand/covers/The earthen pot biryani.jpeg',
];

$featuredChefs = array_slice($chefs, 0, 2);
$chefImages = [
    '/assets/img/chefs/CHANDAN SINGH.jpeg',
    '/assets/img/chefs/BILLU YADAV.jpeg',
];
$orderMessage = 'Hi Roshani Foods & Bevrages, I want to order authentic biryani. Please share today’s menu and prices.';
$waNumber = (string) preg_replace('/\D+/', '', (string) ($site['whatsapp'] ?? ''));
?>
<section class="hero-video-section" id="hero-video"
    data-frame-path="/assets/frames/biryani_"
    data-frame-ext=".webp"
    data-frame-count="60"
    data-frame-w="1920"
    data-frame-h="1080">
    <div class="hero-pin" data-hero-pin>
        <canvas class="hero-canvas" aria-label="RFAB cinematic biryani presentation"></canvas>
        <img class="hero-poster" src="/assets/frames/biryani_0001.webp" alt="RFAB Hero Poster" width="1920" height="1080" fetchpriority="high">

        <div class="hero-overlay" aria-hidden="true"></div>

        <div class="container hero-content">
            <p class="eyebrow">THE AUTHENTIC CLOUD KITCHEN CHAIN</p>
            <h1>Roshani Foods &amp; Beverages</h1>
            <p class="hero-subtext">Authentic biryani flavor, layered aroma, and signature craftsmanship in every serving.</p>
            <div class="cta-row home-hero-cta">
                <a class="btn btn-primary" href="https://wa.me/<?= htmlspecialchars($waNumber) ?>?text=<?= rawurlencode($orderMessage) ?>" target="_blank" rel="noopener">Order Now</a>
            </div>
            <div class="meta-row">
                <span>UDYAM: <?= htmlspecialchars($site['registrations']['udyam'] ?? '') ?></span>
                <span>SANSTHA: <?= htmlspecialchars($site['registrations']['sansthaAadhaar'] ?? '') ?></span>
            </div>
            <p class="scroll-hint">Scroll to explore</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="promise-grid">
            <article class="card reveal"><h3>Authentic Craft</h3><p class="muted">Traditional layering and dum process for signature aroma.</p></article>
            <article class="card reveal"><h3>Premium Ingredients</h3><p class="muted">Handpicked spices and fresh cuts curated daily.</p></article>
            <article class="card reveal"><h3>Reliable Delivery</h3><p class="muted">Consistent taste quality across every order point.</p></article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2>Our Authentic Brands of Biryani</h2>
        <p class="muted">With authentic Indian and Mughlai taste.</p>
        <div class="brands-grid">
            <?php foreach ($brands as $index => $brand): ?>
                <?php $name = (string) ($brand['name'] ?? ''); ?>
                <?php $cover = $brandCoverImages[$index] ?? '/assets/img/brand/covers/House of Biryani.jpeg'; ?>
                <article class="brand-card reveal home-brand-card">
                    <img class="brand-cover-image home-brand-cover" src="<?= htmlspecialchars($cover) ?>" alt="<?= htmlspecialchars($name) ?>" loading="lazy" width="1080" height="1080">
                    <div class="brand-card-body">
                        <h3><?= htmlspecialchars($name) ?></h3>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-story">
    <div class="container split">
        <div>
            <h2>Our Story</h2>
            <p>We blend handpicked spices, premium ingredients, and slow-cooked layering to deliver authentic biryani experiences with consistent quality.</p>
            <p>From smoky aroma to balanced richness, every bowl is crafted to celebrate heritage and modern taste expectations.</p>
            <p>Our store journey began with one vision: bring authentic biryani craftsmanship to every family with dependable taste, hygiene-first preparation, and warm service at every order touchpoint.</p>
            <p>Today, our multi-brand kitchen model helps food lovers choose from diverse biryani styles while keeping consistency, portion quality, and signature aroma at the core of every meal.</p>
        </div>
        <div class="story-image" role="img" aria-label="Chicken biryani in brass handi"></div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <h2>Top Dishes</h2>
            <ul class="chip-list">
                <?php foreach ($products as $product): ?>
                    <li><?= htmlspecialchars($product['name']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h2>Featured Chefs</h2>
            <div class="card-grid small-grid">
                <?php foreach ($featuredChefs as $index => $chef): ?>
                    <?php $chefImage = $chefImages[$index] ?? '/assets/img/chefs/CHANDAN SINGH.jpeg'; ?>
                    <article class="card chef-card reveal">
                        <img class="chef-photo" src="<?= htmlspecialchars($chefImage) ?>" alt="<?= htmlspecialchars($chef['name']) ?>" loading="lazy" width="1080" height="1080">
                        <h3><?= htmlspecialchars($chef['name']) ?></h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2>Reviews</h2>
        <div class="swiper reviews-swiper" role="region" aria-label="Customer reviews">
            <div class="swiper-wrapper">
                <?php foreach ($reviews as $review): ?>
                    <article class="swiper-slide card review-card">
                        <p>“<?= htmlspecialchars($review['text']) ?>”</p>
                        <p><strong><?= htmlspecialchars($review['customerName']) ?></strong></p>
                        <div class="stars" data-stars>★★★★★</div>
                        <small class="muted" data-rating-text>5.0/5</small>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
