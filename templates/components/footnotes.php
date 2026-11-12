<?php
// templates/components/footnotes.php
if (empty($footnotes)) return;
?>
<section class="footnotes-section">
    <div class="container">
        <div class="footnotes-list">
            <?php foreach ($footnotes as $note): ?>
                <p><?= $note['content'] ?></p> <!-- HTML allowed here for links inside footnotes -->
            <?php endforeach; ?>
        </div>
    </div>
</section>