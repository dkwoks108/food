<?php
declare(strict_types=1);
?>
<section class="section page-hero">
    <div class="container">
        <h1>Menu</h1>
        <p class="muted">Our menu has been crafted with dishes prepared with love.</p>
    </div>
</section>

<section class="section">
    <div class="container menu-grid">
        <?php foreach ($productsByCategory as $category => $items): ?>
            <article class="card reveal">
                <h2><?= htmlspecialchars((string) $category) ?></h2>
                <ul class="clean-list">
                    <?php foreach ($items as $item): ?>
                        <li><?= htmlspecialchars($item['name']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endforeach; ?>
    </div>
</section>
