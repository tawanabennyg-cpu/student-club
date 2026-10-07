<?php
/**
 * EcoTech Innovators Society - Shared Site Footer
 * Included by all pages at the bottom of <body>.
 */
$currentYear = date('Y');
?>

<!-- ===== SITE FOOTER ===== -->
<footer class="site-footer" id="siteFooter">
    <div class="container">
        <div class="footer-grid">

            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="index.php" class="brand-link" style="margin-bottom: 1rem; display: inline-flex;">
                    <img src="assets/images/logo.jpg" alt="EcoTech Logo" class="brand-logo">
                    <div class="brand-text" style="margin-left: 0.75rem;">
                        <span class="brand-name">EcoTech Innovators</span>
                        <span class="brand-tagline">University Student Society</span>
                    </div>
                </a>
                <p>Empowering the next generation of technology leaders through sustainable innovation, hands-on engineering, and community-driven research.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="footer-title">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="index.php">🏠 Home</a></li>
                    <li><a href="about.php">ℹ️ About Us</a></li>
                    <li><a href="events.php">📅 Events &amp; Activities</a></li>
                    <li><a href="gallery.php">🖼️ Gallery</a></li>
                    <li><a href="join.php">✍️ Join / Contact</a></li>
                </ul>
            </div>

            <!-- Focus Areas -->
            <div>
                <h4 class="footer-title">Focus Areas</h4>
                <ul class="footer-links">
                    <li><a href="events.php">🔌 IoT & Embedded Systems</a></li>
                    <li><a href="events.php">🌿 Sustainable Web Dev</a></li>
                    <li><a href="events.php">☀️ Clean Energy Tech</a></li>
                    <li><a href="events.php">🏆 Hackathons</a></li>
                    <li><a href="events.php">🔬 Field Research</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-contact">
                <h4 class="footer-title">Contact Us</h4>
                <p>📧 ecotech@university.ac.ke</p>
                <p>📞 +254 700 123 456</p>
                <p>📍 Computing Complex, Room 204<br>University Campus</p>
                <p style="margin-top: 1rem;">
                    <a href="join.php" class="btn btn-accent" style="padding: 0.6rem 1.4rem; font-size: 0.9rem;">
                        ✦ Become a Member
                    </a>
                </p>
            </div>

        </div><!-- end .footer-grid -->

        <!-- Footer Bottom Bar -->
        <div class="footer-bottom">
            <p>&copy; <?php echo $currentYear; ?> EcoTech Innovators Society. All rights reserved.</p>
            <p>Built with ❤️ &amp; PHP &bull; ICS 2102 Web Development Project</p>
        </div>

    </div>
</footer>
<!-- ===== END FOOTER ===== -->

<!-- Global JavaScript -->
<script src="assets/js/main.js"></script>
</body>
</html>
