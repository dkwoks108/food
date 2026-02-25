<?php
declare(strict_types=1);
?>
<section class="section page-hero">
    <div class="container">
        <h1>Our Chefs</h1>
        <p class="muted">Craftsmanship behind every biryani layer.</p>
    </div>
</section>

<section class="section">
    <div class="container card-grid small-grid">
        <?php foreach ($chefs as $chef): ?>
            <article class="card chef-card reveal">
                <div class="avatar"></div>
                <h2><?= htmlspecialchars($chef['name']) ?></h2>
            </article>
        <?php endforeach; ?>
    </div>
</section>
