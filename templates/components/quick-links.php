<?php
// templates/components/quick-links.php
if (empty($quickLinks)) return;
?>
<section class="quick-links-section">
    <div class="container">
        <h2 class="section-title">Quick Links</h2>
        <div class="quick-links-grid">
            <?php foreach ($quickLinks as $link): ?>
                <a href="<?= e($link['url']) ?>" class="quick-link-pill">
                    <?= e($link['label']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>