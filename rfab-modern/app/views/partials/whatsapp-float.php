<?php
declare(strict_types=1);
$wa = $site['whatsapp'] ?? '918504040808';
$message = 'Hi Roshani Foods & Bevrages, I want to order authentic biryani. Please share today’s menu and prices.';
?>
<a class="wa-float" href="https://wa.me/<?= htmlspecialchars($wa) ?>?text=<?= rawurlencode($message) ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
	<img src="https://img.icons8.com/?size=100&id=DUEq8l5qTqBE&format=png&color=000000" alt="WhatsApp" width="44" height="44">
</a>
