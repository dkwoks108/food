<?php
declare(strict_types=1);

$path = (string) ($currentPath ?? '/');

$faqByPath = [
    '/' => [
        ['q' => 'What makes RFAB biryani special?', 'a' => 'We use traditional dum-style preparation, balanced spices, and consistent quality control in every order.'],
        ['q' => 'How can I place an order quickly?', 'a' => 'Use the Order buttons on products or contact us on WhatsApp for fast support.'],
        ['q' => 'Do you offer both veg and non-veg options?', 'a' => 'Yes, our menu includes chicken, mutton, egg, paneer, and multiple veg biryani options.'],
        ['q' => 'Are your brands available in all areas?', 'a' => 'Availability can vary by service area and delivery platform coverage.'],
        ['q' => 'How do I contact for bulk orders?', 'a' => 'Use the Contact page or WhatsApp and share quantity, date, and location details.'],
    ],
    '/brands' => [
        ['q' => 'Are all brands available on delivery platforms?', 'a' => 'Most brands are available on Zomato and Swiggy; availability may vary by location.'],
        ['q' => 'Where can I find FSSAI information?', 'a' => 'Each brand card includes the latest FSSAI number shown for quick verification.'],
        ['q' => 'Can one brand have different menu styles?', 'a' => 'Yes, each brand can focus on a specific taste profile and recipe style.'],
        ['q' => 'Why is a platform button disabled on some cards?', 'a' => 'A disabled button means that platform is currently unavailable for that specific brand.'],
        ['q' => 'Do brand covers represent actual menu style?', 'a' => 'Yes, covers are used to visually represent each brand identity and offering style.'],
    ],
    '/chefs' => [
        ['q' => 'Who prepares the biryani recipes?', 'a' => 'Our featured chefs lead preparation and maintain signature flavor consistency.'],
        ['q' => 'Do chefs specialize in regional taste styles?', 'a' => 'Yes, our kitchen style blends regional influences with house signature methods.'],
        ['q' => 'Do chefs supervise quality daily?', 'a' => 'Yes, preparation and finishing quality are checked continuously during operations.'],
        ['q' => 'Can chef profiles be updated seasonally?', 'a' => 'Yes, we can update featured chefs and profile details based on kitchen roster.'],
        ['q' => 'Are recipes standardized?', 'a' => 'Yes, core recipes are standardized to maintain consistency in flavor and aroma.'],
    ],
    '/products' => [
        ['q' => 'Can I order directly from this menu page?', 'a' => 'Yes, each product has an Order button that opens WhatsApp with the selected item name.'],
        ['q' => 'Are veg and non-veg options both available?', 'a' => 'Yes, we offer chicken, mutton, egg, paneer, and mixed veg biryani options.'],
        ['q' => 'Does the Order button include product name automatically?', 'a' => 'Yes, WhatsApp opens with the selected product prefilled in the message.'],
        ['q' => 'Can prices and availability change?', 'a' => 'Yes, pricing and availability may vary by location, time, and platform status.'],
        ['q' => 'Can I place multiple item orders?', 'a' => 'Yes, mention all required items in WhatsApp and our team will assist.'],
    ],
    '/reviews' => [
        ['q' => 'Are customer reviews genuine?', 'a' => 'Reviews shown are curated from customer feedback and reflect real experiences.'],
        ['q' => 'How can I share my review?', 'a' => 'You can share your feedback via our contact page or WhatsApp support channel.'],
        ['q' => 'How often are reviews refreshed?', 'a' => 'Reviews are periodically refreshed to keep feedback current and relevant.'],
        ['q' => 'Do ratings include both taste and service?', 'a' => 'Yes, ratings usually reflect overall customer experience including food and delivery.'],
        ['q' => 'Can businesses post partnership feedback?', 'a' => 'Yes, partnership and event feedback can also be shared through Contact support.'],
    ],
    '/contact' => [
        ['q' => 'How quickly do you respond to contact queries?', 'a' => 'Most queries are reviewed quickly during business hours and replied to on priority.'],
        ['q' => 'Can I contact for bulk or event orders?', 'a' => 'Yes, mention quantity and occasion in your message for tailored assistance.'],
        ['q' => 'Is my contact information safe?', 'a' => 'Yes, form submissions are validated and handled with security checks in place.'],
        ['q' => 'Can I contact for franchise or collaboration?', 'a' => 'Yes, share your business requirement in subject and message for quick routing.'],
        ['q' => 'Do you support WhatsApp contact too?', 'a' => 'Yes, you can also reach us directly through WhatsApp links available on the site.'],
    ],
    '/new-launch/khoobi-water' => [
        ['q' => 'What pack sizes are available for Khoobi Alkaline Water?', 'a' => 'Khoobi is available in 200ml and 1L bottle packing.'],
        ['q' => 'How can I inquire about Khoobi pricing?', 'a' => 'Use the WhatsApp for Khoobi button on this page to get pricing and availability.'],
        ['q' => 'What is the pH range of Khoobi?', 'a' => 'Khoobi Alkaline Water comes with pH range from 8.5 to 10.5.'],
        ['q' => 'Is Khoobi bottle BPA free?', 'a' => 'Yes, Khoobi is provided in BPA-free and recyclable bottle packaging.'],
        ['q' => 'Who is the manufacturer of Khoobi?', 'a' => 'Khoobi is manufactured by SM AQUA PURE, Vaishali Nagar, Jaipur.'],
    ],
];

$faqs = $faqByPath[$path] ?? [
    ['q' => 'Need help with orders or support?', 'a' => 'Use the Contact page or WhatsApp to reach the team quickly.'],
    ['q' => 'Where can I find full product and brand details?', 'a' => 'Explore the Products and Brands pages for complete listings and links.'],
    ['q' => 'Can I place orders online quickly?', 'a' => 'Yes, use product order buttons or WhatsApp links for faster response.'],
    ['q' => 'Do you support bulk and event orders?', 'a' => 'Yes, share your requirement through contact form or WhatsApp support.'],
    ['q' => 'How do I verify brand details?', 'a' => 'Check the Brands page for FSSAI numbers and platform availability.'],
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
