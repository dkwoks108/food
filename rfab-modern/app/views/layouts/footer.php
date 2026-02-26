<?php
declare(strict_types=1);

$waMessage = 'Hi Roshani Foods & Bevrages, I want to order authentic biryani. Please share today’s menu and prices.';
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
                    <img width="40" height="40" src="https://img.icons8.com/?size=100&id=jZ0kw76QEzJU&format=png&color=000000" alt="facebook">
                </a>
                <a href="https://wa.me/<?= htmlspecialchars((string) preg_replace('/\D+/', '', (string) ($site['whatsapp'] ?? ''))) ?>?text=<?= rawurlencode($waMessage) ?>" aria-label="WhatsApp" target="_blank" rel="noopener">
                    <img width="40" height="40" src="https://img.icons8.com/?size=100&id=DUEq8l5qTqBE&format=png&color=000000" alt="whatsapp">
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
                    <a href="tel:<?= htmlspecialchars((string) preg_replace('/\D+/', '', (string) ($site['phone'] ?? ''))) ?>"><?= htmlspecialchars($site['phone'] ?? '') ?></a>
                </li>
                <li>
                    <img width="32" height="32" src="https://img.icons8.com/?size=100&id=OumT4lIcOllS&format=png&color=000000" alt="mail icon">
                    <a href="mailto:<?= htmlspecialchars($site['email'] ?? '') ?>"><?= htmlspecialchars($site['email'] ?? '') ?></a>
                </li>
                <li>
                    <img width="32" height="32" src="https://img.icons8.com/3d-fluency/94/marker.png" alt="location">
                    <span><?= htmlspecialchars($site['address'] ?? '') ?></span>
                </li>
            </ul>
        </section>
    </div>
    <div class="container legal-line">
        <small><?= htmlspecialchars($site['legal']['copyright'] ?? 'Copyright 2026') ?></small>
        <small>
            Developed &amp; SEO Optimized by
            <a href="https://www.veloxis.tech/" target="_blank" rel="noopener noreferrer">Veloxis Tech</a>
        </small>
    </div>
</footer>
