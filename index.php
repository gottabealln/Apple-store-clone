<?php
// index.php
require_once __DIR__ . '/src/db.php';
require_once __DIR__ . '/src/helpers.php';

// Fetch global elements
$promo = fetchOne("SELECT value FROM settings WHERE key_name = 'promo_text'");
$navItems = fetchAll("SELECT * FROM nav_items ORDER BY sort_order ASC");

// Fetch Hero and Category Rail data
$hero = fetchOne("SELECT * FROM hero LIMIT 1");
$categoryRails = fetchAll("SELECT * FROM category_rails ORDER BY sort_order ASC");

// Fetch Sections and Cards
$sections = fetchAll("SELECT * FROM sections ORDER BY sort_order ASC");
$allCards = fetchAll("SELECT * FROM cards ORDER BY section_id, sort_order ASC");

// Group cards by section_id
$groupedCards = [];
foreach ($allCards as $card) {
    $groupedCards[$card['section_id']][] = $card;
}

// Fetch Quick Links & Footnotes
$quickLinks = fetchAll("SELECT * FROM quick_links ORDER BY sort_order ASC");
$footnotes = fetchAll("SELECT * FROM footnotes ORDER BY sort_order ASC");

// Fetch footer data
$footerColumns = fetchAll("SELECT * FROM footer_columns ORDER BY sort_order ASC");
$footerLinks = fetchAll("SELECT * FROM footer_links ORDER BY sort_order ASC");

// Group footer links by column_id
$groupedFooterLinks = [];
foreach ($footerLinks as $link) {
    $groupedFooterLinks[$link['column_id']][] = $link;
}

require_once __DIR__ . '/templates/header.php';
?>

<main>
    <?php require_once __DIR__ . '/templates/components/hero.php'; ?>
    <?php require_once __DIR__ . '/templates/components/category-rail.php'; ?>

    <?php foreach ($sections as $section): ?>
        <?php 
        $sectionCards = $groupedCards[$section['id']] ?? [];
        include __DIR__ . '/templates/components/section-carousel.php'; 
        ?>
    <?php endforeach; ?>
    
    <?php require_once __DIR__ . '/templates/components/quick-links.php'; ?>
    <?php require_once __DIR__ . '/templates/components/footnotes.php'; ?>
</main>

<?php require_once __DIR__ . '/templates/footer.php'; ?>