<?php
declare(strict_types=1);

$khoobiWaMessage = 'Hi Roshani Foods & Bevrages, I want inquiry for Khoobi Alkaline Water. Please share pricing and availability for 200ml and 1L bottles.';
$waNumber = (string) preg_replace('/\D+/', '', (string) ($site['whatsapp'] ?? ''));
?>
<section class="section page-hero khoobi-hero">
    <div class="container split khoobi-layout">
        <div>
            <p class="eyebrow">New Launch</p>
            <h1>Khoobi Alkaline Water</h1>
            <p>Khoobi Alkaline Water is available in 200ml and 1L bottle packing, created for clean daily hydration and a smooth, refreshing taste.</p>
            <ul class="chip-list khoobi-highlights" aria-label="Khoobi highlights">
                <li>200ml &amp; 1L Pack Sizes</li>
                <li>pH 8.5 to 10.5</li>
                <li>BPA Free</li>
                <li>100% Recyclable Bottle</li>
            </ul>
            <div class="cta-row khoobi-actions">
                <a class="btn btn-primary" href="/contact">Inquire Now</a>
                <a class="btn btn-ghost" href="https://wa.me/<?= htmlspecialchars($waNumber) ?>?text=<?= rawurlencode($khoobiWaMessage) ?>" target="_blank" rel="noopener">WhatsApp for Khoobi</a>
            </div>
        </div>
        <div class="khoobi-bottle" role="img" aria-label="Khoobi alkaline water product image"></div>
    </div>
</section>

<section class="section">
    <div class="container card-grid small-grid khoobi-info-grid">
        <article class="card reveal">
            <h2>About Khoobi</h2>
            <p>Khoobi Alkaline Water is built for modern, health-aware lifestyles. With a balanced alkaline pH range and strict quality-focused production, it supports everyday hydration at home, office, gym, travel, and on-the-go moments.</p>
        </article>
        <article class="card reveal">
            <h2>Benefits</h2>
            <p>Balanced pH (8.5 to 10.5), BPA-free bottles, and 100% recyclable packaging combine safety, convenience, and sustainability. The two pack sizes (200ml and 1L) help you stay consistently hydrated throughout the day.</p>
        </article>
        <article class="card reveal">
            <h2>Why Choose Khoobi Alkaline</h2>
            <p>Choose Khoobi for dependable quality, clean taste, and practical packaging designed for every routine. Whether you need quick hydration or full-day water intake, Khoobi gives a trusted premium alkaline option.</p>
        </article>
        <article class="card reveal">
            <h2>Packaging &amp; Usage</h2>
            <p>The 200ml pack is ideal for quick hydration and events, while the 1L bottle is suitable for daily personal use at home and office. Both are easy to carry and designed for freshness retention.</p>
        </article>
        <article class="card reveal">
            <h2>Quality Commitment</h2>
            <p>Khoobi follows hygiene-first production standards with reliable filtration and quality checks. Every bottle is BPA-free and recyclable to support both health and responsible consumption.</p>
        </article>
    </div>
</section>

<section class="section">
    <div class="container split khoobi-mid-split">
        <div>
            <h2>Pure Hydration Experience</h2>
            <p>Khoobi is crafted for clean, reliable hydration with a crisp taste profile and easy daily usability.</p>
            <p>From office routines to travel and active lifestyles, the practical pack options and quality-focused production make Khoobi a dependable choice.</p>
            <p>Its smooth mouthfeel and balanced mineral profile are designed for consistent daily intake, helping you stay refreshed through long work hours, meetings, and active routines.</p>
            <p>Whether used at home, in gyms, during events, or for business supply, Khoobi combines modern packaging quality with trusted hydration standards for every age group.</p>
        </div>
        <img class="khoobi-mid-image" src="/assets/img/brand/covers/khoobi-img-3.png" alt="Khoobi alkaline water bottle" loading="lazy" decoding="async" width="1080" height="1080">
    </div>
</section>

<section class="section">
    <div class="container card reveal">
        <h2>Manufactured By</h2>
        <p>
            SM AQUA PURE<br>
            93, Lane No 5<br>
            Moti Nagar<br>
            Vaishali Nagar Jaipur 302021
        </p>
        <p>For more details or business inquiries, please contact our team.</p>
    </div>
</section>
