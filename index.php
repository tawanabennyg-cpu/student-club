<?php
/**
 * Page 1: Home Page
 * EcoTech Innovators Society
 */
$pageTitle  = 'Home';
$activePage = 'home';
require_once 'includes/header.php';
?>

<!-- ===== HERO SECTION ===== -->
<section class="hero" id="hero" aria-label="Hero banner">
    <div class="container">
        <div class="hero-grid">

            <!-- Hero Content -->
            <div class="hero-content">
                <div class="hero-badge">🌿 Student Society &bull; Est. 2019</div>

                <h1 class="hero-title">
                    Innovating for a<br>
                    <span>Greener Tomorrow</span>
                </h1>

                <p class="hero-description">
                    EcoTech Innovators Society is a student-led community at the crossroads of technology and sustainability—building IoT solutions, sustainable software, and inspiring the next generation of green tech leaders.
                </p>

                <div class="hero-actions">
                    <a href="join.php" class="btn btn-accent">✦ Join the Society</a>
                    <a href="events.php" class="btn btn-outline">Explore Events →</a>
                </div>
            </div>

            <!-- Hero Spotlight Card: Upcoming Event Countdown -->
            <div>
                <div class="hero-spotlight-card">
                    <span class="hero-spotlight-badge">UPCOMING</span>
                    <h3 style="font-size: 1.3rem; color: var(--color-primary-dark); margin-bottom: 0.4rem;">
                        🏆 EcoHack 2026
                    </h3>
                    <p style="font-size: 0.92rem; color: var(--color-text-muted); margin-bottom: 0.5rem;">
                        48-Hour Sustainable Tech Hackathon<br>
                        📍 University Innovation Hub &bull; Nov 15–17
                    </p>

                    <!-- Live Countdown Timer (Rendered by main.js) -->
                    <div class="spotlight-countdown" aria-label="Countdown to EcoHack 2026">
                        <div class="countdown-box">
                            <span class="countdown-val" id="countdownDays">--</span>
                            <span class="countdown-lbl">Days</span>
                        </div>
                        <div class="countdown-box">
                            <span class="countdown-val" id="countdownHours">--</span>
                            <span class="countdown-lbl">Hours</span>
                        </div>
                        <div class="countdown-box">
                            <span class="countdown-val" id="countdownMins">--</span>
                            <span class="countdown-lbl">Mins</span>
                        </div>
                        <div class="countdown-box">
                            <span class="countdown-val" id="countdownSecs">--</span>
                            <span class="countdown-lbl">Secs</span>
                        </div>
                    </div>

                    <a href="events.php" class="btn btn-primary" style="width:100%; justify-content:center;">
                        Register Now →
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== QUICK STATS STRIP ===== -->
<div class="stats-strip" id="statsStrip">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">250<span style="color:var(--color-caramel);">+</span></div>
                <div class="stat-label">Active Members</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">18<span style="color:var(--color-caramel);">+</span></div>
                <div class="stat-label">Student Projects Completed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">12</div>
                <div class="stat-label">Annual Workshops &amp; Events</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">6<span style="color:var(--color-caramel);">+</span></div>
                <div class="stat-label">Years of Innovation</div>
            </div>
        </div>
    </div>
</div>

<!-- ===== ABOUT INTRO SECTION ===== -->
<section class="section" id="aboutIntro">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Who We Are</span>
            <h2 class="section-title">A Community Driven by Technology &amp; Purpose</h2>
            <p class="section-subtitle">We are a multidisciplinary student society bringing together computing students, engineers, and sustainability advocates to tackle real-world environmental challenges with technology.</p>
        </div>

        <div class="grid-4">
            <!-- Pillar Cards -->
            <div class="card" style="text-align:center; padding: 2rem 1.5rem;">
                <div style="font-size: 2.8rem; margin-bottom: 1rem;">🔌</div>
                <h3 style="font-size: 1.1rem; margin-bottom: 0.6rem;">IoT &amp; Hardware</h3>
                <p style="font-size: 0.9rem; color: var(--color-text-muted);">Build and deploy real environmental sensor networks using Arduino, Raspberry Pi, and ESP32 microcontrollers.</p>
            </div>
            <div class="card" style="text-align:center; padding: 2rem 1.5rem;">
                <div style="font-size: 2.8rem; margin-bottom: 1rem;">🌐</div>
                <h3 style="font-size: 1.1rem; margin-bottom: 0.6rem;">Sustainable Web</h3>
                <p style="font-size: 0.9rem; color: var(--color-text-muted);">Design and develop carbon-conscious websites and data dashboards using modern, efficient web technologies.</p>
            </div>
            <div class="card" style="text-align:center; padding: 2rem 1.5rem;">
                <div style="font-size: 2.8rem; margin-bottom: 1rem;">☀️</div>
                <h3 style="font-size: 1.1rem; margin-bottom: 0.6rem;">Clean Energy</h3>
                <p style="font-size: 0.9rem; color: var(--color-text-muted);">Explore solar power integration, energy monitoring systems, and smart grid research on our campus.</p>
            </div>
            <div class="card" style="text-align:center; padding: 2rem 1.5rem;">
                <div style="font-size: 2.8rem; margin-bottom: 1rem;">🤝</div>
                <h3 style="font-size: 1.1rem; margin-bottom: 0.6rem;">Community &amp; Careers</h3>
                <p style="font-size: 0.9rem; color: var(--color-text-muted);">Network with industry professionals, alumni, and fellow students through hackathons and outreach events.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== FEATURED EVENTS PREVIEW ===== -->
<section class="section section-alt" id="featuredEvents">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Upcoming Activities</span>
            <h2 class="section-title">Don't Miss Our Next Events</h2>
            <p class="section-subtitle">From hands-on workshops to campus hackathons—there's always something exciting happening in EcoTech.</p>
        </div>

        <div class="grid-3">
            <div class="card">
                <div class="card-img-wrap">
                    <img src="assets/images/event-iot.jpg" alt="IoT Workshop" class="card-img" loading="lazy">
                    <span class="card-badge">Workshop</span>
                </div>
                <div class="card-body">
                    <p style="font-size:0.82rem; color:var(--color-caramel); font-weight:700; margin-bottom:0.5rem;">📅 October 24, 2026</p>
                    <h3 class="card-title" style="font-size:1.1rem;">IoT Environmental Sensing Workshop</h3>
                    <p class="card-text" style="font-size:0.9rem;">Build soil moisture and air quality nodes with Arduino and ESP32 microcontrollers.</p>
                    <a href="events.php" class="btn btn-outline" style="padding: 0.5rem 1.2rem; font-size: 0.85rem;">Learn More →</a>
                </div>
            </div>

            <div class="card">
                <div class="card-img-wrap">
                    <img src="assets/images/event-hackathon.jpg" alt="EcoHack 2026" class="card-img" loading="lazy">
                    <span class="card-badge">Hackathon</span>
                </div>
                <div class="card-body">
                    <p style="font-size:0.82rem; color:var(--color-caramel); font-weight:700; margin-bottom:0.5rem;">📅 November 15–17, 2026</p>
                    <h3 class="card-title" style="font-size:1.1rem;">EcoHack 2026: 48-Hour Hackathon</h3>
                    <p class="card-text" style="font-size:0.9rem;">Compete to build the best sustainable tech solution. Prizes, mentorship, and glory await.</p>
                    <a href="events.php" class="btn btn-outline" style="padding: 0.5rem 1.2rem; font-size: 0.85rem;">Learn More →</a>
                </div>
            </div>

            <div class="card">
                <div class="card-img-wrap">
                    <img src="assets/images/event-tree.jpg" alt="Tree Planting Field Day" class="card-img" loading="lazy">
                    <span class="card-badge">Field Day</span>
                </div>
                <div class="card-body">
                    <p style="font-size:0.82rem; color:var(--color-caramel); font-weight:700; margin-bottom:0.5rem;">📅 December 5, 2026</p>
                    <h3 class="card-title" style="font-size:1.1rem;">Campus Tree Planting &amp; Solar Station Field Day</h3>
                    <p class="card-text" style="font-size:0.9rem;">Plant native trees and deploy our student-built solar weather monitor on campus grounds.</p>
                    <a href="events.php" class="btn btn-outline" style="padding: 0.5rem 1.2rem; font-size: 0.85rem;">Learn More →</a>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <a href="events.php" class="btn btn-primary">View All Events &amp; Activities →</a>
        </div>
    </div>
</section>

<!-- ===== JOIN CTA SECTION ===== -->
<section class="section" id="joinCta" style="background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 100%); color: var(--color-cream);">
    <div class="container" style="text-align: center; max-width: 780px;">
        <span class="section-tag" style="background: rgba(176,149,117,0.2); border-color: var(--color-tan); color: var(--color-tan);">Open Membership</span>
        <h2 style="color: var(--color-white); margin: 0.8rem 0 1.2rem;">Ready to Make an Impact?</h2>
        <p style="color: rgba(247,244,230,0.88); font-size: 1.1rem; margin-bottom: 2.5rem;">
            Join over 250 students already building the future of sustainable technology. Membership is free and open to all university students.
        </p>
        <div style="display: flex; gap: 1.2rem; justify-content: center; flex-wrap: wrap;">
            <a href="join.php" class="btn btn-accent">✦ Apply for Membership</a>
            <a href="about.php" class="btn btn-outline" style="border-color: var(--color-tan); color: var(--color-cream);">Learn About Us</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
