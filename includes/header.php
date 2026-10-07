<?php
/**
 * EcoTech Innovators Society - Shared HTML Header & Navigation
 * Included by all pages. Sets $pageTitle and $activePage before including.
 */

// Determine active page for navigation styling
$activePage = isset($activePage) ? $activePage : 'home';
$pageTitle  = isset($pageTitle)  ? $pageTitle  : 'EcoTech Innovators Society';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | EcoTech Innovators Society</title>
    <meta name="description" content="EcoTech Innovators Society – A student club advancing green technology, sustainable software engineering, and IoT innovation at university.">
    <meta name="keywords"    content="EcoTech, student club, IoT, sustainable tech, web development, hackathon, university society">
    <meta name="author"      content="EcoTech Innovators Society">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Global Stylesheet (External CSS file) -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="assets/images/logo.jpg">
</head>
<body>

<!-- ===== SITE HEADER & NAVIGATION ===== -->
<header class="site-header" id="siteHeader">
    <div class="container">
        <div class="header-inner">

            <!-- Brand / Logo (Navigation link to Home) -->
            <a href="index.php" class="brand-link" aria-label="EcoTech Innovators Society - Home">
                <img src="assets/images/logo.jpg" alt="EcoTech Innovators Society Logo" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-name">EcoTech Innovators</span>
                    <span class="brand-tagline">University Student Society</span>
                </div>
            </a>

            <!-- Mobile Menu Toggle (Interactive JS element) -->
            <button class="mobile-menu-toggle"
                    id="mobileMenuToggle"
                    aria-label="Toggle navigation menu"
                    aria-expanded="false"
                    aria-controls="mainNav">
                &#9776;
            </button>

            <!-- Main Navigation -->
            <nav class="main-nav" id="mainNav" aria-label="Main navigation">
                <ul class="nav-list" role="list">
                    <li>
                        <a href="index.php"
                           class="nav-link <?php echo $activePage === 'home'   ? 'active' : ''; ?>"
                           aria-current="<?php echo $activePage === 'home' ? 'page' : 'false'; ?>">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="about.php"
                           class="nav-link <?php echo $activePage === 'about'  ? 'active' : ''; ?>"
                           aria-current="<?php echo $activePage === 'about' ? 'page' : 'false'; ?>">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="events.php"
                           class="nav-link <?php echo $activePage === 'events' ? 'active' : ''; ?>"
                           aria-current="<?php echo $activePage === 'events' ? 'page' : 'false'; ?>">
                            Events
                        </a>
                    </li>
                    <li>
                        <a href="gallery.php"
                           class="nav-link <?php echo $activePage === 'gallery' ? 'active' : ''; ?>"
                           aria-current="<?php echo $activePage === 'gallery' ? 'page' : 'false'; ?>">
                            Gallery
                        </a>
                    </li>
                </ul>
                <!-- CTA Navigation Button -->
                <a href="join.php" class="nav-cta" id="navJoinBtn">
                    ✦ Join Us
                </a>
            </nav>

        </div>
    </div>
</header>
<!-- ===== END HEADER ===== -->
