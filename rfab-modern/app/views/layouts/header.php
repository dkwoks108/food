<?php
declare(strict_types=1);

$menu = [
    '/' => 'Home',
    '/brands' => 'Brands',
    '/chefs' => 'Chefs',
    '/products' => 'Products',
    '/reviews' => 'Reviews',
    '/contact' => 'Contact',
];
?>
<header class="site-header">
    <div class="container nav-wrap">
        <a href="/" class="brand-mark" aria-label="RFAB Home">
            <span class="logo-dot"></span>
            <span><?= htmlspecialchars($site['brandName'] ?? 'RFAB') ?></span>
        </a>
        <button class="nav-toggle" aria-expanded="false" aria-controls="site-nav">Menu</button>
        <nav id="site-nav" class="site-nav">
            <?php foreach ($menu as $path => $label): ?>
                <a href="<?= $path ?>" class="<?= $currentPath === $path ? 'active' : '' ?>"><?= htmlspecialchars($label) ?></a>
            <?php endforeach; ?>
            <a href="/new-launch/khoobi-water" class="pill-link">New Launch</a>
        </nav>
    </div>
</header>
