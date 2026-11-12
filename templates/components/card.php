<?php
// templates/components/card.php
$themeClass = $card['theme'] === 'dark' ? 'card--dark' : 'card--light';
$btnIcon = $card['button_type'] === 'plus' ? '+' : '→';
$isSvg = strpos($card['image_path'], '<svg') !== false;

// Check if it's a product card (has a price)
$isProductCard = !empty($card['price']);

// NEW: Check if it's the "Help is here" section (Section 4)
$isHelpCard = ($card['section_id'] == 4);
?>
<a href="#" class="card <?= $themeClass ?> <?= $isSvg ? 'card--service' : '' ?> <?= $isProductCard ? 'card--product' : '' ?> <?= $isHelpCard ? 'card--help' : '' ?>">
    
    <div class="card-content">
        <?php if (!empty($card['eyebrow'])): ?>
            <span class="card-eyebrow"><?= e($card['eyebrow']) ?></span>
        <?php endif; ?>
        
        <h3 class="card-title"><?= htmlspecialchars_decode($card['title']) ?></h3>
        
        <?php if (!empty($card['subtitle'])): ?>
            <p class="card-subtitle"><?= e($card['subtitle']) ?></p>
        <?php endif; ?>
        
        <?php if (!empty($card['price'])): ?>
            <p class="card-price"><?= e($card['price']) ?></p>
        <?php endif; ?>
    </div>
    
    <div class="card-image">
        <?php if ($isSvg): ?>
            <div class="svg-wrapper">
                <?= $card['image_path'] ?>
            </div>
        <?php else: ?>
            <img src="<?= e($card['image_path']) ?>" alt="<?= e($card['title']) ?>" loading="lazy">
        <?php endif; ?>
    </div>
    
    <div class="card-action">
        <span class="action-circle"><?= $btnIcon ?></span>
    </div>
</a>