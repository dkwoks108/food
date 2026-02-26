<?php
declare(strict_types=1);

$featuredChefs = array_slice($chefs, 0, 2);
$chefImages = [
    '/assets/img/chefs/CHANDAN SINGH.jpeg',
    '/assets/img/chefs/BILLU YADAV.jpeg',
];
$chefDetails = [
    [
        'origin' => 'From Uttarakhand',
        'about' => 'Specialist in authentic dum-style layering and balanced spice profiles for rich aroma in every serving.',
    ],
    [
        'origin' => 'From Rajasthan',
        'about' => 'Known for traditional Rajasthani warmth in flavor, consistent preparation, and signature finishing touch.',
    ],
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
            <?php $details = $chefDetails[$index] ?? ['origin' => '', 'about' => '']; ?>
            <article class="card chef-card reveal">
                <img class="chef-photo" src="<?= htmlspecialchars($chefImage) ?>" alt="<?= htmlspecialchars($chef['name']) ?>" loading="lazy" width="1080" height="1080">
                <h2><?= htmlspecialchars($chef['name']) ?></h2>
                <p class="muted"><?= htmlspecialchars($details['origin']) ?></p>
                <p><?= htmlspecialchars($details['about']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
