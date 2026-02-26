<?php
declare(strict_types=1);

$path = (string) ($currentPath ?? '/');

$faqByPath = [
    '/' => [
        ['q' => 'What makes RFAB biryani special?', 'a' => 'We use traditional dum-style preparation, balanced spices, and consistent quality control in every order.'],
        ['q' => 'How can I place an order quickly?', 'a' => 'Use the Order buttons on products or contact us on WhatsApp for fast support.'],
    ],
    '/brands' => [
        ['q' => 'Are all brands available on delivery platforms?', 'a' => 'Most brands are available on Zomato and Swiggy; availability may vary by location.'],
        ['q' => 'Where can I find FSSAI information?', 'a' => 'Each brand card includes the latest FSSAI number shown for quick verification.'],
    ],
    '/chefs' => [
        ['q' => 'Who prepares the biryani recipes?', 'a' => 'Our featured chefs lead preparation and maintain signature flavor consistency.'],
        ['q' => 'Do chefs specialize in regional taste styles?', 'a' => 'Yes, our kitchen style blends regional influences with house signature methods.'],
    ],
    '/products' => [
        ['q' => 'Can I order directly from this menu page?', 'a' => 'Yes, each product has an Order button that opens WhatsApp with the selected item name.'],
        ['q' => 'Are veg and non-veg options both available?', 'a' => 'Yes, we offer chicken, mutton, egg, paneer, and mixed veg biryani options.'],
    ],
    '/reviews' => [
        ['q' => 'Are customer reviews genuine?', 'a' => 'Reviews shown are curated from customer feedback and reflect real experiences.'],
        ['q' => 'How can I share my review?', 'a' => 'You can share your feedback via our contact page or WhatsApp support channel.'],
    ],
    '/contact' => [
        ['q' => 'How quickly do you respond to contact queries?', 'a' => 'Most queries are reviewed quickly during business hours and replied to on priority.'],
        ['q' => 'Can I contact for bulk or event orders?', 'a' => 'Yes, mention quantity and occasion in your message for tailored assistance.'],
    ],
    '/new-launch/khoobi-water' => [
        ['q' => 'What pack sizes are available for Khoobi Alkaline Water?', 'a' => 'Khoobi is available in 200ml and 1L bottle packing.'],
        ['q' => 'How can I inquire about Khoobi pricing?', 'a' => 'Use the WhatsApp for Khoobi button on this page to get pricing and availability.'],
    ],
];

$faqs = $faqByPath[$path] ?? [
    ['q' => 'Need help with orders or support?', 'a' => 'Use the Contact page or WhatsApp to reach the team quickly.'],
    ['q' => 'Where can I find full product and brand details?', 'a' => 'Explore the Products and Brands pages for complete listings and links.'],
];
?>
<section class="section faq-section">
    <div class="container">
        <h2>FAQs</h2>
        <div class="faq-list">
            <?php foreach ($faqs as $faq): ?>
                <details class="card faq-item reveal">
                    <summary><?= htmlspecialchars($faq['q']) ?></summary>
                    <p><?= htmlspecialchars($faq['a']) ?></p>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>
