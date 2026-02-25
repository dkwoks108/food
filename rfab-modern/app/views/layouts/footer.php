<?php
declare(strict_types=1);
?>
<footer class="site-footer">
    <div class="container footer-grid">
        <section>
            <h3><?= htmlspecialchars($site['brandName'] ?? 'RFAB') ?></h3>
            <p><?= htmlspecialchars($site['tagline'] ?? '') ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($site['phone'] ?? '') ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($site['email'] ?? '') ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($site['address'] ?? '') ?></p>
        </section>
        <section>
            <h4>Links</h4>
            <ul class="clean-list">
                <li><a href="/">Home</a></li>
                <li><a href="/brands">Brands</a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </section>
        <section>
            <h4>Newsletter</h4>
            <?php require APP_ROOT . '/views/partials/newsletter-form.php'; ?>
            <div class="social-row">
                <a href="<?= htmlspecialchars($site['social']['facebook'] ?? '#') ?>" aria-label="Facebook">Facebook</a>
                <a href="<?= htmlspecialchars($site['social']['instagram'] ?? '#') ?>" aria-label="Instagram">Instagram</a>
            </div>
        </section>
    </div>
    <div class="container legal-line">
        <small><?= htmlspecialchars($site['legal']['copyright'] ?? 'Copyright 2026') ?></small>
        <small><?= htmlspecialchars($site['legal']['credit'] ?? '') ?></small>
    </div>
</footer>
