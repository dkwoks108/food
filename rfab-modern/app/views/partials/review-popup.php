<?php
declare(strict_types=1);

// Get random positive reviews (5-star reviews only)
$positiveReviews = array_filter($reviews ?? [], function($review) {
    return ($review['rating'] ?? 0) >= 5;
});
$positiveReviews = array_values($positiveReviews);
?>

<div id="review-popup" class="review-popup" style="display: none;">
    <div class="review-popup-content">
        <button class="review-popup-close" aria-label="Close review popup">&times;</button>
        <div class="review-popup-stars">★★★★★</div>
        <p class="review-popup-text"></p>
        <p class="review-popup-author"></p>
    </div>
</div>

<script>
(function() {
    const reviews = <?= json_encode($positiveReviews) ?>;
    if (!reviews || reviews.length === 0) return;

    const popup = document.getElementById('review-popup');
    if (!popup) return;

    const textEl = popup.querySelector('.review-popup-text');
    const authorEl = popup.querySelector('.review-popup-author');
    const closeBtn = popup.querySelector('.review-popup-close');

    let currentIndex = 0;
    let isVisible = false;

    function showReview() {
        if (isVisible || reviews.length === 0) return;

        const review = reviews[currentIndex];
        textEl.textContent = review.text || '';
        authorEl.textContent = '- ' + (review.customerName || 'Anonymous');

        popup.style.display = 'block';
        setTimeout(() => {
            popup.classList.add('show');
            isVisible = true;
        }, 100);

        // Auto hide after 8 seconds
        setTimeout(hideReview, 8000);

        currentIndex = (currentIndex + 1) % reviews.length;
    }

    function hideReview() {
        if (!isVisible) return;
        
        popup.classList.remove('show');
        isVisible = false;
        
        setTimeout(() => {
            popup.style.display = 'none';
        }, 300);
    }

    closeBtn.addEventListener('click', hideReview);

    // Show first popup after random delay between 5-10 seconds
    const initialDelay = 5000 + Math.random() * 5000;
    setTimeout(() => {
        showReview();
        // Then show every 25-35 seconds
        setInterval(() => {
            if (!isVisible) {
                setTimeout(showReview, Math.random() * 10000);
            }
        }, 25000);
    }, initialDelay);
})();
</script>
