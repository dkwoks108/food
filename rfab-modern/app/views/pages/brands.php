<?php
declare(strict_types=1);
?>
<section class="section page-hero">
    <div class="container">
        <h1>Brands</h1>
        <p class="muted">Brand-wise ordering hub with platform links.</p>
    </div>
</section>

<section class="section">
    <div class="container card-grid">
        <?php foreach ($brands as $brand): ?>
            <article class="card reveal">
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
