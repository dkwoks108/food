<?php
declare(strict_types=1);
?>
<footer class="site-footer">
    <div class="container footer-grid">
        <section class="footer-brand">
            <h3><?= htmlspecialchars($site['brandName'] ?? 'RFAB') ?></h3>
            <p><?= htmlspecialchars($site['tagline'] ?? '') ?></p>
            <div class="social-icons">
                <a href="<?= htmlspecialchars($site['social']['instagram'] ?? '#') ?>" aria-label="Instagram" target="_blank" rel="noopener">
                    <img width="40" height="40" src="https://img.icons8.com/3d-fluency/94/instagram-new.png" alt="instagram-new">
                </a>
                <a href="<?= htmlspecialchars($site['social']['facebook'] ?? '#') ?>" aria-label="Facebook" target="_blank" rel="noopener">
                    <img width="40" height="40" src="https://img.icons8.com/3d-fluency/94/facebook-new.png" alt="facebook-new">
                </a>
            </div>
        </section>

        <section class="footer-links">
            <h4>Quick Links</h4>
            <ul class="clean-list">
                <li><a href="/">Home</a></li>
                <li><a href="/brands">Brands</a></li>
                <li><a href="/chefs">Chefs</a></li>
                <li><a href="/products">Products</a></li>
                <li><a href="/reviews">Reviews</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </section>

        <section class="footer-contact">
            <h4>Contact</h4>
            <ul class="clean-list contact-list">
                <li>
                    <img width="32" height="32" src="https://img.icons8.com/3d-fluency/94/phone.png" alt="phone">
                    <span><?= htmlspecialchars($site['phone'] ?? '') ?></span>
                </li>
                <li>
                    <img width="32" height="32" src="https://img.icons8.com/3d-fluency/94/new-post.png" alt="email">
                    <span><?= htmlspecialchars($site['email'] ?? '') ?></span>
                </li>
                <li>
                    <img width="32" height="32" src="https://img.icons8.com/3d-fluency/94/marker.png" alt="location">
                    <span><?= htmlspecialchars($site['address'] ?? '') ?></span>
                </li>
            </ul>
            <h4>Newsletter</h4>
            <?php require APP_ROOT . '/views/partials/newsletter-form.php'; ?>
        </section>
    </div>
    <div class="container legal-line">
        <small><?= htmlspecialchars($site['legal']['copyright'] ?? 'Copyright 2026') ?></small>
        <small><?= htmlspecialchars($site['legal']['credit'] ?? '') ?></small>
    </div>
</footer>
