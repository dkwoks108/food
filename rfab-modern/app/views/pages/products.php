<?php
declare(strict_types=1);

$waNumber = (string) preg_replace('/\D+/', '', (string) ($site['whatsapp'] ?? ''));
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
                        <?php $itemName = (string) ($item['name'] ?? ''); ?>
                        <?php $waText = 'Hi Roshani Foods & Bevrages, I want to order ' . $itemName . '. Please share availability and price.'; ?>
                        <li class="product-item">
                            <span><?= htmlspecialchars($itemName) ?></span>
                            <a class="btn btn-primary btn-small product-order-btn" href="https://wa.me/<?= htmlspecialchars($waNumber) ?>?text=<?= rawurlencode($waText) ?>" target="_blank" rel="noopener">Order</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endforeach; ?>
    </div>
</section>
