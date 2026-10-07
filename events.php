<?php
/**
 * Page 3: Activities & Events
 * EcoTech Innovators Society
 * Dynamic event rendering is handled by assets/js/events.js (Array of Objects)
 */
$pageTitle  = 'Events & Activities';
$activePage = 'events';
require_once 'includes/header.php';
?>

<!-- ===== PAGE HERO ===== -->
<section style="background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-earth-rich) 100%); color: var(--color-cream); padding: 4.5rem 0 3.5rem;">
    <div class="container" style="text-align: center;">
        <span class="section-tag" style="background: rgba(176,149,117,0.2); border-color: var(--color-tan); color: var(--color-tan);">Events & Activities</span>
        <h1 style="color: var(--color-white); margin: 0.8rem 0 1.2rem;">What We're Up To</h1>
        <p style="color: rgba(247,244,230,0.88); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
            Workshops, hackathons, field days, and guest talks—explore all upcoming club activities and RSVP today.
        </p>
    </div>
</section>

<!-- ===== EVENTS LISTING ===== -->
<section class="section" id="eventsListing">
    <div class="container">

        <!-- Search + Filter Controls -->
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1.2rem; margin-bottom: 2.5rem;">

            <!-- Search input (oninput event in events.js) -->
            <div style="position: relative; flex: 1; min-width: 260px;">
                <input type="search"
                       id="eventSearchInput"
                       placeholder="🔍 Search events by name or topic..."
                       class="form-control"
                       aria-label="Search events"
                       style="padding-left: 1.2rem;">
            </div>

            <!-- Events count badge -->
            <span id="eventsCount" class="tag-badge" style="font-size: 0.85rem; padding: 0.45rem 1rem; white-space: nowrap;">
                Loading...
            </span>
        </div>

        <!-- Category Filter Buttons (onclick events in events.js) -->
        <div class="filter-bar" role="group" aria-label="Filter events by category">
            <button class="filter-btn active" data-filter="all"        aria-pressed="true"  id="filterAll">All Events</button>
            <button class="filter-btn"         data-filter="workshops"  aria-pressed="false" id="filterWorkshops">🛠️ Workshops</button>
            <button class="filter-btn"         data-filter="hackathons" aria-pressed="false" id="filterHackathons">🏆 Hackathons</button>
            <button class="filter-btn"         data-filter="field-days" aria-pressed="false" id="filterFieldDays">🌿 Field Days</button>
            <button class="filter-btn"         data-filter="guest-talks" aria-pressed="false" id="filterGuestTalks">🎤 Guest Talks</button>
            <button class="filter-btn"         data-filter="social"     aria-pressed="false" id="filterSocial">🎉 Social</button>
        </div>

        <!-- Events Grid (populated dynamically by events.js) -->
        <div class="grid-3" id="eventsGrid" aria-live="polite" aria-label="Events list">
            <!-- JavaScript renders event cards here -->
            <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                <p style="color: var(--color-text-muted);">Loading events...</p>
            </div>
        </div>

    </div>
</section>

<!-- ===== SEMESTER SCHEDULE TABLE ===== -->
<section class="section section-alt" id="scheduleTable">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Semester Overview</span>
            <h2 class="section-title">Full Activity Schedule</h2>
            <p class="section-subtitle">A quick-reference timetable for all planned EcoTech Innovators Society activities this semester.</p>
        </div>

        <div class="table-responsive">
            <table class="custom-table" id="scheduleOverviewTable">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Type</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Seats</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $schedule = [
                        ['Oct 24, 2026',  'IoT Environmental Sensing Workshop',           'Workshop',  'Hardware Lab 3',           35],
                        ['Nov 15–17, 2026','EcoHack 2026: 48-Hour Hackathon',              'Hackathon', 'Innovation Hub',           120],
                        ['Dec 5, 2026',   'Campus Tree Planting & Solar Station Field Day','Field Day', 'Botanical Arboretum',       50],
                        ['Jan 14, 2027',  'Green Software Engineering Guest Lecture',      'Guest Talk','Lecture Theatre B',         80],
                        ['Feb 10, 2027',  'Smart Irrigation & LoRaWAN Field Session',     'Workshop',  'Agricultural Research Farm',25],
                        ['Mar 20, 2027',  'Annual Showcase & Networking Mixer',            'Social',    'Student Centre Hall',      150],
                    ];
                    foreach ($schedule as $row) {
                        echo '<tr>';
                        echo '<td><strong>' . htmlspecialchars($row[0]) . '</strong></td>';
                        echo '<td>' . htmlspecialchars($row[1]) . '</td>';
                        echo '<td><span class="tag-badge">' . htmlspecialchars($row[2]) . '</span></td>';
                        echo '<td>' . htmlspecialchars($row[3]) . '</td>';
                        echo '<td>' . htmlspecialchars($row[4]) . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div style="text-align: center; margin-top: 2.5rem;">
            <a href="join.php" class="btn btn-primary">Register as a Member to RSVP All Events →</a>
        </div>
    </div>
</section>

<!-- Events JS (array of objects, filter, RSVP logic) -->
<script src="assets/js/events.js"></script>

<?php require_once 'includes/footer.php'; ?>
