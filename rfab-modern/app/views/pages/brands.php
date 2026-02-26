<?php
declare(strict_types=1);

$brandCoverImages = [
    '/assets/img/brand/covers/House of Biryani.jpeg',
    '/assets/img/brand/covers/Handi Biryani.jpeg',
    '/assets/img/brand/covers/Biryani Junction.jpeg',
    '/assets/img/brand/covers/Biryani Farm.jpeg',
    '/assets/img/brand/covers/Biryani King.jpeg',
    '/assets/img/brand/covers/Biryaniwala\'s.jpeg',
    '/assets/img/brand/covers/Kulhad Biryani.jpeg',
    '/assets/img/brand/covers/Matka Biryani.jpeg',
    '/assets/img/brand/covers/The earthen pot biryani.jpeg',
];
?>
<section class="section page-hero">
    <div class="container">
        <h1>Brands</h1>
        <p class="muted">Brand-wise ordering hub with platform links.</p>
    </div>
</section>

<section class="section">
    <div class="container card-grid">
        <?php foreach ($brands as $index => $brand): ?>
            <?php $cover = $brandCoverImages[$index] ?? '/assets/img/brand/covers/House of Biryani.jpeg'; ?>
            <article class="card reveal">
                <img class="brand-page-cover" src="<?= htmlspecialchars($cover) ?>" alt="<?= htmlspecialchars($brand['name']) ?>" loading="lazy" width="720" height="480">
                <h2><?= htmlspecialchars($brand['name']) ?></h2>
                <p class="muted">FSSAI NO: <?= htmlspecialchars($brand['fssaiNo']) ?></p>
                <p><?= htmlspecialchars($brand['description'] ?? '') ?></p>
                <div class="cta-row">
                    <a class="btn btn-primary btn-small" href="<?= htmlspecialchars($brand['platforms']['zomato'] ?? '#') ?>" target="_blank" rel="noopener">ZOMATO</a>
                    <?php if (!empty($brand['platforms']['swiggy'])): ?>
                        <a class="btn btn-ghost btn-small" href="<?= htmlspecialchars($brand['platforms']['swiggy']) ?>" target="_blank" rel="noopener">SWIGGY</a>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
