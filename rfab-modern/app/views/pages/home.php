<?php
declare(strict_types=1);
?>
<section class="hero hero-premium">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">The Authentic Cloud Kitchen Chain</p>
            <h1>Roshani Foods &amp; Beverages</h1>
            <p>Premium biryani craftsmanship with rich aroma, layered flavor, and modern delivery excellence.</p>
            <div class="cta-row">
                <a class="btn btn-primary" href="/brands">Explore Brands</a>
                <a class="btn btn-ghost" href="/products">View Menu</a>
            </div>
            <div class="meta-row">
                <span>Available on Zomato &amp; Swiggy</span>
                <span>UDYAM: <?= htmlspecialchars($site['registrations']['udyam'] ?? '') ?></span>
                <span>Sanstha Aadhaar: <?= htmlspecialchars($site['registrations']['sansthaAadhaar'] ?? '') ?></span>
            </div>
        </div>
        <div class="hero-visual" aria-hidden="true">
            <div class="bowl"></div>
            <div class="steam steam-1"></div>
            <div class="steam steam-2"></div>
            <div class="steam steam-3"></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2>Our Authentic Brands of Biryani</h2>
        <p class="muted">With authentic Indian and Mughlai taste.</p>
        <div class="card-grid">
            <?php foreach ($brands as $brand): ?>
                <article class="card reveal">
                    <h3><?= htmlspecialchars($brand['name']) ?></h3>
                    <p class="muted">FSSAI: <?= htmlspecialchars($brand['fssaiNo']) ?></p>
                    <div class="cta-row">
                        <a class="btn btn-small" href="<?= htmlspecialchars($brand['platforms']['zomato'] ?? '#') ?>" target="_blank" rel="noopener">Zomato</a>
                        <?php if (!empty($brand['platforms']['swiggy'])): ?>
                            <a class="btn btn-small btn-ghost" href="<?= htmlspecialchars($brand['platforms']['swiggy']) ?>" target="_blank" rel="noopener">Swiggy</a>
                        <?php endif; ?>
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
        </div>
        <div class="story-image" role="img" aria-label="Biryani bowl visual"></div>
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
                <?php foreach ($chefs as $chef): ?>
                    <article class="card chef-card reveal">
                        <div class="avatar"></div>
                        <h3><?= htmlspecialchars($chef['name']) ?></h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2>What Our Customers Say</h2>
        <div class="card-grid reviews-grid">
            <?php foreach ($reviews as $review): ?>
                <article class="card review-card reveal">
                    <p>“<?= htmlspecialchars($review['text']) ?>”</p>
                    <p class="muted"><?= htmlspecialchars($review['customerName']) ?></p>
                    <p class="stars" aria-label="Rating <?= (int) $review['rating'] ?> out of 5"><?= str_repeat('★', (int) $review['rating']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
