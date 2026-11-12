<?php
// templates/components/section-carousel.php
if (empty($sectionCards)) return;
?>
<section class="carousel-section">
    <div class="container">
        <h2 class="section-title">
            <?= e($section['title_primary']) ?> <span><?= e($section['title_secondary']) ?></span>
        </h2>
    </div>
    
    <div class="carousel-wrapper">
        <div class="carousel-track" id="carousel-<?= e($section['id']) ?>">
            <?php foreach ($sectionCards as $card): ?>
                <?php include __DIR__ . '/card.php'; ?>
            <?php endforeach; ?>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="carousel-nav container">
            <button class="carousel-btn prev" aria-label="Previous" data-target="carousel-<?= e($section['id']) ?>">
                <svg viewBox="0 0 36 36" width="36" height="36"><path d="M21.559,12.062 L15.618,17.984 L21.5221,23.944 L20.3814,25.0813 L14.2508,18.8966 L13.5,18.1348 L14.2285,17.3844 L20.4077,11.1413 L21.559,12.062 Z" fill="currentColor"/></svg>
            </button>
            <button class="carousel-btn next" aria-label="Next" data-target="carousel-<?= e($section['id']) ?>">
                <svg viewBox="0 0 36 36" width="36" height="36"><path d="M14.441,12.062 L20.382,17.984 L14.4779,23.944 L15.6186,25.0813 L21.7492,18.8966 L22.5,18.1348 L21.7715,17.3844 L15.5923,11.1413 L14.441,12.062 Z" fill="currentColor"/></svg>
            </button>
        </div>
    </div>
</section>