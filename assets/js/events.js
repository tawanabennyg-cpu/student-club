/**
 * EcoTech Innovators Society - Events & Activities Script
 * Demonstrates:
 * - JavaScript Array storing objects
 * - JavaScript Objects representing structured club events
 * - Loops (forEach, filter) and modular functions
 * - Event listeners (onclick, oninput)
 * - Dynamic DOM manipulation
 */

// Array of JavaScript Event Objects
const clubEvents = [
    {
        id: 1,
        title: "IoT Environmental Sensing & Microcontroller Workshop",
        category: "workshops",
        date: "October 24, 2026",
        time: "2:00 PM - 5:00 PM",
        venue: "Hardware Lab 3, Computing Complex",
        image: "assets/images/event-iot.jpg",
        description: "Hands-on masterclass building soil moisture and air quality telemetry nodes with Arduino, ESP32, and custom web dashboards.",
        tags: ["IoT", "Hardware", "Sensors"],
        seats: 35
    },
    {
        id: 2,
        title: "EcoHack 2026: 48-Hour Sustainable Tech Hackathon",
        category: "hackathons",
        date: "November 15-17, 2026",
        time: "Starts Friday 9:00 AM",
        venue: "University Innovation Hub & Auditorium",
        image: "assets/images/event-hackathon.jpg",
        description: "Compete with fellow developers and designers to build software solutions for renewable energy optimization, waste tracking, and eco-friendly web apps.",
        tags: ["Hackathon", "Web Dev", "Prizes"],
        seats: 120
    },
    {
        id: 3,
        title: "Campus Clean Energy & Native Tree Planting Field Day",
        category: "field-days",
        date: "December 05, 2026",
        time: "8:30 AM - 1:00 PM",
        venue: "Campus Botanical Arboretum & Solar Farm",
        image: "assets/images/event-tree.jpg",
        description: "Join club members planting 200 native saplings and deploying our student-built solar-powered weather monitoring station.",
        tags: ["Outreach", "Community", "Solar"],
        seats: 50
    },
    {
        id: 4,
        title: "Green Software Engineering: Designing Carbon-Conscious Web Apps",
        category: "guest-talks",
        date: "January 14, 2027",
        time: "3:00 PM - 4:30 PM",
        venue: "Lecture Theatre B / Live Stream",
        image: "assets/images/about-mission.jpg",
        description: "Guest lecture from industry lead architect on reducing digital carbon footprints, lightweight CSS/JS architectures, and efficient cloud hosting.",
        tags: ["Web Dev", "Architecture", "Keynote"],
        seats: 80
    },
    {
        id: 5,
        title: "Smart Irrigation & LoRaWAN Field Testing Session",
        category: "workshops",
        date: "February 10, 2027",
        time: "10:00 AM - 1:00 PM",
        venue: "University Agricultural Research Farm",
        image: "assets/images/gallery-4.jpg",
        description: "Practical field deployment of long-range low-power sensor nodes testing water table levels and wireless telemetry.",
        tags: ["LoRaWAN", "AgriTech", "Field Test"],
        seats: 25
    },
    {
        id: 6,
        title: "Annual Tech Project Showcase & Networking Mixer",
        category: "social",
        date: "March 20, 2027",
        time: "5:00 PM - 8:00 PM",
        venue: "Student Centre Grand Hall",
        image: "assets/images/gallery-6.jpg",
        description: "Celebration of all student projects developed during the academic year, with alumni speakers, industry sponsors, and executive committee elections.",
        tags: ["Showcase", "Networking", "Elections"],
        seats: 150
    }
];

// Function to render events into the DOM
function renderEvents(eventsList) {
    const eventsContainer = document.getElementById('eventsGrid');
    const countBadge = document.getElementById('eventsCount');

    if (!eventsContainer) return;

    if (countBadge) {
        countBadge.textContent = `${eventsList.length} Event${eventsList.length === 1 ? '' : 's'}`;
    }

    if (eventsList.length === 0) {
        eventsContainer.innerHTML = `
            <div style="grid-column: 1/-1; text-align: center; padding: 3rem 1rem; background: var(--color-white); border-radius: var(--radius-md); border: 1px solid var(--color-surface-subtle);">
                <h3 style="color: var(--color-earth-rich); margin-bottom: 0.5rem;">No events found</h3>
                <p style="color: var(--color-text-muted);">Try adjusting your filter or search query to see upcoming activities.</p>
            </div>
        `;
        return;
    }

    let html = '';

    // Loop through the array of event objects
    eventsList.forEach(function (event) {
        const tagsHtml = event.tags
            .map(tag => `<span class="tag-badge" style="font-size: 0.72rem;">#${tag}</span>`)
            .join(' ');

        html += `
            <article class="card event-card" data-category="${event.category}" data-id="${event.id}">
                <div class="card-img-wrap">
                    <img src="${event.image}" alt="${event.title}" class="card-img" loading="lazy">
                    <span class="card-badge">${event.category.replace('-', ' ')}</span>
                </div>
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.75rem; font-size: 0.85rem; color: var(--color-caramel); font-weight: 700;">
                        <span>📅 ${event.date}</span>
                        <span>📍 ${event.venue.split(',')[0]}</span>
                    </div>
                    <h3 class="card-title" style="font-size: 1.22rem; margin-bottom: 0.6rem;">${event.title}</h3>
                    <p class="card-text">${event.description}</p>
                    <div style="margin-bottom: 1.2rem; display: flex; flex-wrap: wrap; gap: 0.4rem;">
                        ${tagsHtml}
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--color-surface-subtle);">
                        <span style="font-size: 0.85rem; color: var(--color-text-muted);">
                            <strong>${event.seats}</strong> seats available
                        </span>
                        <button class="btn btn-primary btn-sm register-btn" onclick="handleEventRegister(${event.id})" style="padding: 0.45rem 1.1rem; font-size: 0.85rem;">
                            RSVP Now
                        </button>
                    </div>
                </div>
            </article>
        `;
    });

    eventsContainer.innerHTML = html;
}

// Function to handle Event Registration (Demonstrating onclick event and object lookup)
function handleEventRegister(eventId) {
    const selectedEvent = clubEvents.find(item => item.id === eventId);
    if (selectedEvent) {
        alert(`Thank you for your interest in:\n"${selectedEvent.title}"!\n\nPlease make sure to submit your membership details on the Join page to confirm your RSVP.`);
        window.location.href = `join.php?rsvp=${encodeURIComponent(selectedEvent.title)}`;
    }
}

// Initialize event filters and search
document.addEventListener('DOMContentLoaded', function () {
    const eventsContainer = document.getElementById('eventsGrid');
    if (!eventsContainer) return;

    // Initial render of all events
    renderEvents(clubEvents);

    // Category Filter Buttons (Demonstrating onclick event)
    const filterButtons = document.querySelectorAll('.filter-btn');
    let currentCategory = 'all';
    let searchQuery = '';

    function applyFilterAndSearch() {
        let filtered = clubEvents;

        if (currentCategory !== 'all') {
            filtered = filtered.filter(ev => ev.category === currentCategory);
        }

        if (searchQuery.trim() !== '') {
            const q = searchQuery.toLowerCase();
            filtered = filtered.filter(ev => 
                ev.title.toLowerCase().includes(q) || 
                ev.description.toLowerCase().includes(q) ||
                ev.tags.some(tag => tag.toLowerCase().includes(q))
            );
        }

        renderEvents(filtered);
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            currentCategory = this.getAttribute('data-filter') || 'all';
            applyFilterAndSearch();
        });
    });

    // Real-time search filter (Demonstrating oninput event)
    const searchInput = document.getElementById('eventSearchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            searchQuery = this.value;
            applyFilterAndSearch();
        });
    }
});
