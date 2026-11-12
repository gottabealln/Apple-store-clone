<?php
// templates/components/hero.php
if (!$hero) return;
?>
<section class="hero-section">
    <div class="container hero-container">
        <div class="hero-left">
            <h1 class="hero-title"><?= e($hero['title']) ?></h1>
        </div>
        <div class="hero-right">
            <h2 class="hero-subtitle"><?= e($hero['subtitle']) ?></h2>
            <div class="hero-links">
                <a href="<?= e($hero['link_1_url']) ?>"><?= e($hero['link_1_text']) ?> <svg class="icon-external" viewBox="0 0 14 14" width="14" height="14"><path d="M10.5 1h-4v1.5h3.3L3.3 9l1 1 6.2-6.2v3.7H12v-5A1.5 1.5 0 0 0 10.5 1z" fill="currentColor"/><path d="M2 2v10h10V7h-1.5v8.5h-7v-7H11V7H2z" fill="currentColor"/></svg></a>
                <a href="<?= e($hero['link_2_url']) ?>"><?= e($hero['link_2_text']) ?> <svg class="icon-external" viewBox="0 0 14 14" width="14" height="14"><path d="M10.5 1h-4v1.5h3.3L3.3 9l1 1 6.2-6.2v3.7H12v-5A1.5 1.5 0 0 0 10.5 1z" fill="currentColor"/><path d="M2 2v10h10V7h-1.5v8.5h-7v-7H11V7H2z" fill="currentColor"/></svg></a>
            </div>
        </div>
    </div>
</section>