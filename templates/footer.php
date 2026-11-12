<?php
// templates/footer.php
?>
    <footer class="global-footer">
        <div class="footer-content">
            <div class="footer-directory">
                <?php foreach ($footerColumns as $column): ?>
                    <div class="footer-column">
                        <button class="footer-heading-toggle" aria-expanded="false">
                            <span class="footer-heading"><?= e($column['heading']) ?></span>
                            <span class="footer-chevron">
                                <svg viewBox="0 0 14 14" width="14" height="14"><path d="M7 10.5L1.5 5l1-1L7 8.5 11.5 4l1 1z" fill="currentColor"/></svg>
                            </span>
                        </button>
                        <ul class="footer-list">
                            <?php if (isset($groupedFooterLinks[$column['id']])): ?>
                                <?php foreach ($groupedFooterLinks[$column['id']] as $link): ?>
                                    <li><a href="<?= e($link['url']) ?>"><?= e($link['label']) ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="footer-mini">
                <p>More ways to shop: <a href="#">Find an Apple Store</a> or <a href="#">other retailer</a> near you. Or call 000800 040 1966.</p>
                <div class="footer-legal">
                    <p>Copyright © 2026 Apple Inc. All rights reserved.</p>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Sales Policy</a></li>
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">Site Map</a></li>
                    </ul>
                    <span class="footer-locale">India</span>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="assets/js/main.js"></script>
</body>
</html>