<?php
declare(strict_types=1);
?>
<section class="section page-hero">
    <div class="container">
        <h1>Reviews</h1>
        <p class="muted">What our customers say about us.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2>What Our Customers Say About?</h2>
        <div class="card-grid reviews-grid">
            <?php foreach ($reviews as $index => $review): ?>
                <article class="card review-card reveal <?= $index % 4 === 1 ? 'review-accent' : '' ?>">
                    <p>“<?= htmlspecialchars($review['text']) ?>”</p>
                    <p><strong><?= htmlspecialchars($review['customerName']) ?></strong></p>
                    <p class="stars"><?= str_repeat('★', (int) $review['rating']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
