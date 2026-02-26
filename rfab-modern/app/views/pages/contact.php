<?php
declare(strict_types=1);
?>
<section class="section page-hero">
    <div class="container">
        <h1>Contact</h1>
        <p class="muted">Get in touch with RFAB.</p>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div class="card">
            <h2>Contact Details</h2>
            <p><strong>Phone:</strong> <?= htmlspecialchars($site['phone'] ?? '') ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($site['email'] ?? '') ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($site['address'] ?? '') ?></p>
        </div>

        <div class="card">
            <h2>Get In Touch</h2>
            <p class="muted">Make it happen in 4 easy steps.</p>

            <?php if (!empty($flash)): ?>
                <div class="alert <?= $flash['type'] === 'success' ? 'alert-success' : 'alert-error' ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/contact" class="form-grid" novalidate>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf ?? '') ?>">
                <input type="text" name="website" value="" tabindex="-1" autocomplete="off" aria-hidden="true" class="hp-field">
                <label>
                    First Name
                    <input type="text" name="first_name" value="<?= htmlspecialchars($old['first_name'] ?? '') ?>">
                    <?php if (!empty($errors['first_name'])): ?><small><?= htmlspecialchars($errors['first_name']) ?></small><?php endif; ?>
                </label>
                <label>
                    Last Name
                    <input type="text" name="last_name" value="<?= htmlspecialchars($old['last_name'] ?? '') ?>">
                    <?php if (!empty($errors['last_name'])): ?><small><?= htmlspecialchars($errors['last_name']) ?></small><?php endif; ?>
                </label>
                <label class="full">
                    Email
                    <input type="email" name="email" required value="<?= htmlspecialchars($old['email'] ?? '') ?>">
                    <?php if (!empty($errors['email'])): ?><small><?= htmlspecialchars($errors['email']) ?></small><?php endif; ?>
                </label>
                <label class="full">
                    Subject
                    <input type="text" name="subject" value="<?= htmlspecialchars($old['subject'] ?? '') ?>">
                    <?php if (!empty($errors['subject'])): ?><small><?= htmlspecialchars($errors['subject']) ?></small><?php endif; ?>
                </label>
                <label class="full">
                    Your Message
                    <textarea name="message" rows="5"><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
                    <?php if (!empty($errors['message'])): ?><small><?= htmlspecialchars($errors['message']) ?></small><?php endif; ?>
                </label>
                <button class="btn btn-primary full" type="submit">Submit Form</button>
            </form>
        </div>
    </div>
</section>
