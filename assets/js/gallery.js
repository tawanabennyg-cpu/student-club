/**
 * EcoTech Innovators Society - Gallery Lightbox & Interactions
 * Demonstrates:
 * - onclick, mouseover, mouseout events
 * - Modal popup window manipulation
 * - Keyboard event handling (Escape, Arrow keys)
 * - Dynamic gallery image cycling
 */

document.addEventListener('DOMContentLoaded', function () {
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightboxModal = document.getElementById('lightboxModal');
    const lightboxImg = document.getElementById('lightboxImg');
    const lightboxCaption = document.getElementById('lightboxCaption');
    const lightboxClose = document.getElementById('lightboxClose');

    if (!galleryItems.length || !lightboxModal || !lightboxImg) return;

    let currentIndex = 0;
    const galleryData = [];

    // Extract image metadata and demonstrate mouseover / mouseout
    galleryItems.forEach((item, index) => {
        const img = item.querySelector('.gallery-img');
        const title = item.querySelector('.gallery-title')?.textContent || 'Club Activity';
        const caption = item.querySelector('.gallery-caption')?.textContent || '';

        galleryData.push({
            src: img ? img.getAttribute('src') : '',
            alt: img ? img.getAttribute('alt') : title,
            title: title,
            caption: caption
        });

        // Event: mouseover (subtle border accent highlight)
        item.addEventListener('mouseover', function () {
            this.style.boxShadow = '0 14px 28px rgba(99, 71, 61, 0.28)';
        });

        // Event: mouseout (reset border shadow)
        item.addEventListener('mouseout', function () {
            this.style.boxShadow = '';
        });

        // Event: onclick (Open Lightbox)
        item.addEventListener('click', function () {
            openLightbox(index);
        });
    });

    function openLightbox(index) {
        currentIndex = index;
        const current = galleryData[currentIndex];
        if (!current) return;

        lightboxImg.src = current.src;
        lightboxImg.alt = current.alt;
        lightboxCaption.innerHTML = `<strong>${current.title}</strong><br><span style="font-size:0.9rem; color: var(--color-tan);">${current.caption}</span>`;

        lightboxModal.classList.add('show');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeLightbox() {
        lightboxModal.classList.remove('show');
        document.body.style.overflow = '';
    }

    function showNext() {
        currentIndex = (currentIndex + 1) % galleryData.length;
        openLightbox(currentIndex);
    }

    function showPrev() {
        currentIndex = (currentIndex - 1 + galleryData.length) % galleryData.length;
        openLightbox(currentIndex);
    }

    // Close button event
    if (lightboxClose) {
        lightboxClose.addEventListener('click', closeLightbox);
    }

    // Close when clicking modal backdrop
    lightboxModal.addEventListener('click', function (e) {
        if (e.target === lightboxModal) {
            closeLightbox();
        }
    });

    // Keyboard events: Escape, Left Arrow, Right Arrow
    document.addEventListener('keydown', function (e) {
        if (!lightboxModal.classList.contains('show')) return;

        if (e.key === 'Escape') {
            closeLightbox();
        } else if (e.key === 'ArrowRight') {
            showNext();
        } else if (e.key === 'ArrowLeft') {
            showPrev();
        }
    });

    // Gallery category filter buttons
    const galleryFilters = document.querySelectorAll('.gallery-filter-btn');
    galleryFilters.forEach(btn => {
        btn.addEventListener('click', function () {
            galleryFilters.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                if (filter === 'all' || category === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
