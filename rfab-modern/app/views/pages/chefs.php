<?php
declare(strict_types=1);

$featuredChefs = array_slice($chefs, 0, 2);
$chefImages = [
    '/assets/img/chefs/CHANDAN SINGH.jpeg',
    '/assets/img/chefs/BILLU YADAV.jpeg',
];
?>
<section class="section page-hero">
    <div class="container">
        <h1>Our Chefs</h1>
        <p class="muted">Craftsmanship behind every biryani layer.</p>
    </div>
</section>

<section class="section">
    <div class="container card-grid small-grid">
        <?php foreach ($featuredChefs as $index => $chef): ?>
            <?php $chefImage = $chefImages[$index] ?? '/assets/img/chefs/CHANDAN SINGH.jpeg'; ?>
            <article class="card chef-card reveal">
                <img class="chef-photo" src="<?= htmlspecialchars($chefImage) ?>" alt="<?= htmlspecialchars($chef['name']) ?>" loading="lazy" width="400" height="260">
                <h2><?= htmlspecialchars($chef['name']) ?></h2>
            </article>
        <?php endforeach; ?>
    </div>
</section>
