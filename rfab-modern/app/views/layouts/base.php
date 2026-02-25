<?php
declare(strict_types=1);

$pageTitle = ($title ?? 'RFAB') . ' | ' . ($site['brandName'] ?? 'Roshani Foods & Beverages');
$metaDescription = $metaDescription ?? ($site['seo']['description'] ?? 'Premium biryani experiences by RFAB.');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">
    <meta name="theme-color" content="#0B0F12">
    <?php require APP_ROOT . '/views/partials/seo-meta.php'; ?>
    <link rel="stylesheet" href="/assets/css/critical.css">
    <link rel="stylesheet" href="/assets/css/app.min.css">
</head>
<body class="no-js">
<?php require APP_ROOT . '/views/layouts/header.php'; ?>
<main id="main-content" tabindex="-1">
    <?= $content ?>
</main>
<?php require APP_ROOT . '/views/layouts/footer.php'; ?>
<?php require APP_ROOT . '/views/partials/whatsapp-float.php'; ?>
<script src="/assets/js/app.min.js" defer></script>
</body>
</html>
