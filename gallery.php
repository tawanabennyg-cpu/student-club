<?php
/**
 * Page 4: Gallery
 * EcoTech Innovators Society
 * Interactive lightbox and filter handled by assets/js/gallery.js
 */
$pageTitle  = 'Gallery';
$activePage = 'gallery';
require_once 'includes/header.php';

// PHP array of gallery images with metadata
$galleryImages = [
    [
        'src'      => 'assets/images/event-iot.jpg',
        'alt'      => 'Students building IoT environmental sensor breadboards in the hardware lab',
        'title'    => 'IoT Hardware Workshop',
        'caption'  => 'Arduino & ESP32 sensor assembly session',
        'category' => 'workshops',
    ],
    [
        'src'      => 'assets/images/event-hackathon.jpg',
        'alt'      => 'EcoHack 2026 team collaboration with laptops and sticky notes',
        'title'    => 'EcoHack 2026 Hackathon',
        'caption'  => 'Teams brainstorming sustainable tech solutions',
        'category' => 'hackathons',
    ],
    [
        'src'      => 'assets/images/event-tree.jpg',
        'alt'      => 'Students planting native trees and solar sensors on campus',
        'title'    => 'Campus Tree Planting Field Day',
        'caption'  => 'Deploying solar weather monitors on university grounds',
        'category' => 'field-days',
    ],
    [
        'src'      => 'assets/images/gallery-4.jpg',
        'alt'      => 'Student using laptop for clean energy data analysis in the field',
        'title'    => 'Field Research Session',
        'caption'  => 'Data collection and clean energy analysis fieldwork',
        'category' => 'field-days',
    ],
    [
        'src'      => 'assets/images/gallery-5.jpg',
        'alt'      => 'EcoTech team coding session at a roundtable meeting',
        'title'    => 'Collaborative Coding Session',
        'caption'  => 'Weekly tech meeting and code review',
        'category' => 'workshops',
    ],
    [
        'src'      => 'assets/images/gallery-6.jpg',
        'alt'      => 'Annual EcoTech general meeting with students in a lecture hall',
        'title'    => 'Annual General Meeting 2025',
        'caption'  => 'End-of-year AGM and executive elections',
        'category' => 'social',
    ],
    [
        'src'      => 'assets/images/about-mission.jpg',
        'alt'      => 'Student presenting sustainable web development to club audience in lecture theatre',
        'title'    => 'Sustainable Web Dev Talk',
        'caption'  => 'Keynote on carbon-conscious software architecture',
        'category' => 'talks',
    ],
    [
        'src'      => 'assets/images/hero-bg.jpg',
        'alt'      => 'Students collaborating in the EcoTech innovation lab with IoT equipment',
        'title'    => 'Innovation Lab Session',
        'caption'  => 'Members working on joint IoT + web dashboard project',
        'category' => 'workshops',
    ],
];
?>

<!-- ===== PAGE HERO ===== -->
<section style="background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-earth-rich) 100%); color: var(--color-cream); padding: 4.5rem 0 3.5rem;">
    <div class="container" style="text-align: center;">
        <span class="section-tag" style="background: rgba(176,149,117,0.2); border-color: var(--color-tan); color: var(--color-tan);">Gallery</span>
        <h1 style="color: var(--color-white); margin: 0.8rem 0 1.2rem;">Moments in Focus</h1>
        <p style="color: rgba(247,244,230,0.88); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
            A visual journey through our workshops, hackathons, field days, and campus outreach activities.
        </p>
    </div>
</section>

<!-- ===== GALLERY GRID ===== -->
<section class="section" id="gallerySection">
    <div class="container">

        <!-- Gallery Category Filter -->
        <div class="filter-bar" role="group" aria-label="Filter gallery by category">
            <button class="gallery-filter-btn filter-btn active" data-filter="all"        id="galleryAll">All Photos</button>
            <button class="gallery-filter-btn filter-btn"         data-filter="workshops"  id="galleryWorkshops">🛠️ Workshops</button>
            <button class="gallery-filter-btn filter-btn"         data-filter="hackathons" id="galleryHackathons">🏆 Hackathons</button>
            <button class="gallery-filter-btn filter-btn"         data-filter="field-days" id="galleryFieldDays">🌿 Field Days</button>
            <button class="gallery-filter-btn filter-btn"         data-filter="talks"      id="galleryTalks">🎤 Talks</button>
            <button class="gallery-filter-btn filter-btn"         data-filter="social"     id="gallerySocial">🎉 Social</button>
        </div>

        <!-- Gallery Grid: mouseover/mouseout + onclick events applied by gallery.js -->
        <div class="gallery-grid" id="galleryGrid" aria-label="Photo gallery">
            <?php foreach ($galleryImages as $index => $image): ?>
            <figure class="gallery-item"
                    data-category="<?php echo htmlspecialchars($image['category']); ?>"
                    data-index="<?php echo $index; ?>"
                    role="button"
                    tabindex="0"
                    aria-label="Open full image: <?php echo htmlspecialchars($image['title']); ?>">

                <img src="<?php echo htmlspecialchars($image['src']); ?>"
                     alt="<?php echo htmlspecialchars($image['alt']); ?>"
                     class="gallery-img"
                     loading="lazy">

                <!-- Overlay with caption (appears on hover) -->
                <figcaption class="gallery-overlay">
                    <h3 class="gallery-title"><?php echo htmlspecialchars($image['title']); ?></h3>
                    <p class="gallery-caption"><?php echo htmlspecialchars($image['caption']); ?></p>
                </figcaption>

            </figure>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ===== LIGHTBOX MODAL (Interactive Feature) ===== -->
<div class="lightbox-modal" id="lightboxModal" role="dialog" aria-modal="true" aria-label="Image lightbox">
    <div class="lightbox-content">
        <!-- Close button (onclick closes modal) -->
        <button class="lightbox-close" id="lightboxClose" aria-label="Close lightbox">&times;</button>

        <!-- Full-size image -->
        <img src="" alt="" class="lightbox-image" id="lightboxImg">

        <!-- Caption -->
        <p class="lightbox-caption-text" id="lightboxCaption"></p>

        <!-- Navigation arrows -->
        <div style="display: flex; gap: 2rem; margin-top: 1.4rem;">
            <button onclick="document.dispatchEvent(new KeyboardEvent('keydown', {key: 'ArrowLeft'}))"
                    class="btn btn-outline"
                    style="border-color: var(--color-tan); color: var(--color-cream); padding: 0.5rem 1.4rem;"
                    aria-label="Previous image">← Prev</button>
            <button onclick="document.dispatchEvent(new KeyboardEvent('keydown', {key: 'ArrowRight'}))"
                    class="btn btn-outline"
                    style="border-color: var(--color-tan); color: var(--color-cream); padding: 0.5rem 1.4rem;"
                    aria-label="Next image">Next →</button>
        </div>

        <p style="margin-top: 1rem; font-size: 0.8rem; color: var(--color-tan); opacity: 0.7;">
            Use ← → arrow keys or Escape to navigate and close
        </p>
    </div>
</div>

<!-- Gallery JS (mouseover, mouseout, onclick, keyboard events) -->
<script src="assets/js/gallery.js"></script>

<?php require_once 'includes/footer.php'; ?>
