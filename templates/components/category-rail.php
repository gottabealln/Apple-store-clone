<?php
// templates/components/category-rail.php
if (empty($categoryRails)) return;
?>
<section class="category-rail-section">
    <div class="category-rail-wrapper">
        <div class="category-rail">
            <?php foreach ($categoryRails as $item): ?>
                <a href="#" class="category-item">
                    <div class="category-image-wrapper">
                        <!-- Replace with your actual image paths and dimensions -->
                        <img src="<?= e($item['image_path']) ?>" alt="<?= e($item['label']) ?>" width="80" height="80" loading="lazy">
                    </div>
                    <span class="category-label"><?= e($item['label']) ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>