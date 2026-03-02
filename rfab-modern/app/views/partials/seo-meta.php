<?php
declare(strict_types=1);

$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
	|| ((string) ($_SERVER['SERVER_PORT'] ?? '') === '443');
$scheme = $isHttps ? 'https' : 'http';
$host = (string) ($_SERVER['HTTP_HOST'] ?? 'rfab.in');
$baseUrl = $scheme . '://' . $host;
$path = (string) ($currentPath ?? '/');
$canonicalPath = $path === '' ? '/' : $path;
$canonicalUrl = $baseUrl . ($canonicalPath === '/' ? '/' : $canonicalPath);

$brandName = (string) ($site['brandName'] ?? 'Roshani Foods and Beverages');
$description = (string) ($metaDescription ?? ($site['seo']['description'] ?? 'Premium, authentic biryani experiences by RFAB.'));
$logoUrl = $baseUrl . '/assets/img/brand/logos/logo.jpeg';

$defaultKeywords = [
	'Roshani Foods and Beverages',
	'Roshani Foods & Bevrages',
	'RFAB Jaipur',
	'best biryani in Jaipur',
	'authentic biryani Jaipur',
	'Mughlai biryani Jaipur',
	'cloud kitchen Jaipur',
	'online biryani order Jaipur',
	'biryani delivery Jaipur',
	'Khoobi Alkaline Water',
];

$keywordsByPath = [
	'/' => ['top biryani brand Jaipur', 'dum biryani Jaipur'],
	'/brands' => ['biryani brands Jaipur', 'FSSAI biryani brands'],
	'/chefs' => ['biryani chefs Jaipur', 'expert biryani chefs'],
	'/products' => ['veg non veg biryani menu', 'order biryani WhatsApp'],
	'/reviews' => ['biryani customer reviews Jaipur', 'top rated biryani Jaipur'],
	'/contact' => ['biryani bulk order Jaipur', 'catering inquiry Jaipur'],
	'/new-launch/khoobi-water' => ['alkaline water Jaipur', 'Khoobi water inquiry'],
];

$keywords = implode(', ', array_values(array_unique(array_merge($defaultKeywords, $keywordsByPath[$path] ?? []))));

$sameAs = array_values(array_filter([
	(string) ($site['social']['instagram'] ?? ''),
	(string) ($site['social']['facebook'] ?? ''),
	(string) ($site['links']['zomato'] ?? ''),
	(string) ($site['links']['swiggy'] ?? ''),
], static fn (string $value): bool => $value !== ''));

$organizationSchema = [
	'@context' => 'https://schema.org',
	'@type' => 'Organization',
	'@id' => $baseUrl . '/#organization',
	'name' => $brandName,
	'url' => $baseUrl . '/',
	'logo' => $logoUrl,
	'telephone' => (string) ($site['phone'] ?? ''),
	'email' => (string) ($site['email'] ?? ''),
	'sameAs' => $sameAs,
];

$localBusinessSchema = [
	'@context' => 'https://schema.org',
	'@type' => 'Restaurant',
	'@id' => $baseUrl . '/#localbusiness',
	'name' => $brandName,
	'image' => $logoUrl,
	'url' => $baseUrl . '/',
	'telephone' => (string) ($site['phone'] ?? ''),
	'email' => (string) ($site['email'] ?? ''),
	'servesCuisine' => ['Indian', 'Mughlai', 'Biryani'],
	'address' => [
		'@type' => 'PostalAddress',
		'streetAddress' => (string) ($site['address'] ?? ''),
		'addressLocality' => 'Jaipur',
		'addressRegion' => 'Rajasthan',
		'postalCode' => '302021',
		'addressCountry' => 'IN',
	],
	'sameAs' => $sameAs,
];

$websiteSchema = [
	'@context' => 'https://schema.org',
	'@type' => 'WebSite',
	'@id' => $baseUrl . '/#website',
	'name' => $brandName,
	'url' => $baseUrl . '/',
	'description' => $description,
	'inLanguage' => 'en-IN',
];

$webPageSchema = [
	'@context' => 'https://schema.org',
	'@type' => 'WebPage',
	'@id' => $canonicalUrl . '#webpage',
	'url' => $canonicalUrl,
	'name' => (string) $pageTitle,
	'description' => $description,
	'isPartOf' => ['@id' => $baseUrl . '/#website'],
	'about' => ['@id' => $baseUrl . '/#organization'],
	'inLanguage' => 'en-IN',
];

$faqByPath = [
	'/' => [
		['q' => 'What makes RFAB biryani special?', 'a' => 'We use traditional dum-style preparation, balanced spices, and consistent quality control in every order.'],
		['q' => 'How can I place an order quickly?', 'a' => 'Use the Order buttons on products or contact us on WhatsApp for fast support.'],
		['q' => 'Do you offer both veg and non-veg options?', 'a' => 'Yes, our menu includes chicken, mutton, egg, paneer, and multiple veg biryani options.'],
	],
	'/new-launch/khoobi-water' => [
		['q' => 'What pack sizes are available for Khoobi Alkaline Water?', 'a' => 'Khoobi is available in 200ml and 1L bottle packing.'],
		['q' => 'How can I inquire about Khoobi pricing?', 'a' => 'Use the WhatsApp inquiry button on this page to get pricing and availability.'],
		['q' => 'What is the pH range of Khoobi?', 'a' => 'Khoobi Alkaline Water comes with pH range from 8.5 to 10.5.'],
	],
];

$schemas = [$organizationSchema, $localBusinessSchema, $websiteSchema, $webPageSchema];

if ($path === '/new-launch/khoobi-water') {
	$schemas[] = [
		'@context' => 'https://schema.org',
		'@type' => 'Product',
		'@id' => $canonicalUrl . '#product',
		'name' => 'Khoobi Alkaline Water',
		'description' => 'Khoobi Alkaline Water with pH 8.5 to 10.5, available in 200ml and 1L bottles.',
		'brand' => [
			'@type' => 'Brand',
			'name' => 'Khoobi',
		],
		'image' => [
			$baseUrl . '/assets/img/brand/covers/khoobi-img-3.png',
		],
		'url' => $canonicalUrl,
	];
}

if (!empty($faqByPath[$path])) {
	$schemas[] = [
		'@context' => 'https://schema.org',
		'@type' => 'FAQPage',
		'@id' => $canonicalUrl . '#faq',
		'mainEntity' => array_map(
			static fn (array $faq): array => [
				'@type' => 'Question',
				'name' => $faq['q'],
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text' => $faq['a'],
				],
			],
			$faqByPath[$path]
		),
	];
}
?>
<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta property="og:description" content="<?= htmlspecialchars($metaDescription) ?>">
<meta property="og:site_name" content="<?= htmlspecialchars($site['brandName'] ?? 'RFAB') ?>">
<meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
<meta property="og:image" content="<?= htmlspecialchars($logoUrl) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($description) ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($logoUrl) ?>">
<meta name="keywords" content="<?= htmlspecialchars($keywords) ?>">
<link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">
<script type="application/ld+json"><?= json_encode($schemas, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
