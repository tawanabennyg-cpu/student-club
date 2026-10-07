<?php
/**
 * Page 2: About Us
 * EcoTech Innovators Society
 */
$pageTitle  = 'About Us';
$activePage = 'about';
require_once 'includes/header.php';
?>

<!-- ===== PAGE HERO ===== -->
<section style="background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-earth-rich) 100%); color: var(--color-cream); padding: 4.5rem 0 3.5rem;">
    <div class="container" style="text-align: center;">
        <span class="section-tag" style="background: rgba(176,149,117,0.2); border-color: var(--color-tan); color: var(--color-tan);">About Us</span>
        <h1 style="color: var(--color-white); margin: 0.8rem 0 1.2rem;">Who We Are</h1>
        <p style="color: rgba(247,244,230,0.88); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
            Learn about our story, our values, and the passionate students driving green technology innovation on campus.
        </p>
    </div>
</section>

<!-- ===== VISION & MISSION ===== -->
<section class="section" id="visionMission">
    <div class="container">
        <div class="grid-2" style="align-items: center; gap: 4rem;">

            <!-- Mission Image -->
            <div>
                <img src="assets/images/about-mission.jpg"
                     alt="EcoTech student presenting sustainable web development to club members"
                     style="border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); width: 100%; object-fit: cover; max-height: 420px;">
            </div>

            <!-- Vision / Mission Text -->
            <div>
                <span class="section-tag">Our Purpose</span>
                <h2 style="margin: 0.75rem 0 1.5rem;">Building a Sustainable Digital Future</h2>

                <!-- Vision Card -->
                <div style="background: var(--color-white); border-left: 4px solid var(--color-caramel); border-radius: var(--radius-md); padding: 1.5rem 1.8rem; margin-bottom: 1.4rem; box-shadow: var(--shadow-sm);">
                    <h3 style="color: var(--color-caramel); font-size: 1rem; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 0.5rem;">🔭 Our Vision</h3>
                    <p style="margin: 0; font-size: 1rem; color: var(--color-text-main);">To be the leading university student society that equips young technologists with the skills, networks, and inspiration to engineer a more sustainable, connected world.</p>
                </div>

                <!-- Mission Card -->
                <div style="background: var(--color-white); border-left: 4px solid var(--color-earth-rich); border-radius: var(--radius-md); padding: 1.5rem 1.8rem; box-shadow: var(--shadow-sm);">
                    <h3 style="color: var(--color-earth-rich); font-size: 1rem; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 0.5rem;">🎯 Our Mission</h3>
                    <p style="margin: 0; font-size: 1rem; color: var(--color-text-main);">To provide hands-on learning, collaborative projects, and community-led initiatives that bridge academic computing education with real-world sustainable technology applications.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== OBJECTIVES ===== -->
<section class="section section-alt" id="objectives">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">What We Do</span>
            <h2 class="section-title">Core Objectives</h2>
            <p class="section-subtitle">Six pillars that guide every project, workshop, and collaboration we undertake as a society.</p>
        </div>

        <div class="grid-3" style="gap: 1.8rem;">
            <?php
            // Using PHP array to loop and display objectives
            $objectives = [
                ['icon' => '📚', 'title' => 'Academic Excellence', 'desc' => 'Supplement university curricula with practical, project-based learning sessions in web development, IoT, and data science.'],
                ['icon' => '🛠️', 'title' => 'Hands-On Engineering', 'desc' => 'Build, prototype, and deploy real-world IoT devices, environmental monitors, and software tools on campus infrastructure.'],
                ['icon' => '🌱', 'title' => 'Environmental Advocacy', 'desc' => 'Champion sustainable computing practices and campus eco-initiatives, reducing the university\'s digital and physical carbon footprint.'],
                ['icon' => '🤝', 'title' => 'Community Partnerships', 'desc' => 'Forge alliances with NGOs, local government bodies, and technology companies to fund and scale student innovation projects.'],
                ['icon' => '💼', 'title' => 'Career Development', 'desc' => 'Connect members with internship opportunities, industry mentors, and alumni who lead careers in sustainable technology sectors.'],
                ['icon' => '🏆', 'title' => 'Competitive Excellence', 'desc' => 'Represent our university in national and international hackathons, innovation challenges, and computing olympiads.'],
            ];

            foreach ($objectives as $obj) {
                echo '<div class="card" style="padding: 2rem 1.6rem; text-align: center;">';
                echo '<div style="font-size: 2.5rem; margin-bottom: 1rem;">' . $obj['icon'] . '</div>';
                echo '<h3 style="font-size: 1.1rem; margin-bottom: 0.65rem;">' . htmlspecialchars($obj['title']) . '</h3>';
                echo '<p style="font-size: 0.92rem; color: var(--color-text-muted); margin: 0;">' . htmlspecialchars($obj['desc']) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- ===== EXECUTIVE COMMITTEE TABLE ===== -->
<section class="section" id="committee">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Leadership</span>
            <h2 class="section-title">Executive Committee <?php echo date('Y') . '/' . (date('Y') + 1); ?></h2>
            <p class="section-subtitle">Meet the dedicated student leaders steering EcoTech Innovators Society this academic year.</p>
        </div>

        <!-- HTML Table (Required by assignment) -->
        <div class="table-responsive">
            <table class="custom-table" id="committeeTable">
                <caption style="caption-side: bottom; padding: 0.75rem; font-size: 0.85rem; color: var(--color-text-muted); text-align: left;">
                    EcoTech Innovators Society Executive Committee – Academic Year <?php echo date('Y') . '/' . (date('Y') + 1); ?>
                </caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Degree Programme</th>
                        <th scope="col">Year of Study</th>
                        <th scope="col">Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Using PHP array of associative arrays (object-like structures)
                    $committee = [
                        ['name' => 'Amara Njoroge',   'role' => 'President',          'degree' => 'BSc. Computer Science',            'year' => '3rd Year', 'email' => 'a.njoroge@uni.ac.ke',   'img' => 'team-president.jpg'],
                        ['name' => 'Daniel Kimani',   'role' => 'Vice President',     'degree' => 'BSc. Software Engineering',        'year' => '3rd Year', 'email' => 'd.kimani@uni.ac.ke',    'img' => 'team-vp.jpg'],
                        ['name' => 'Brendan Ochieng', 'role' => 'Technical Lead',     'degree' => 'BSc. Computer Science',            'year' => '2nd Year', 'email' => 'b.ochieng@uni.ac.ke',   'img' => 'team-techlead.jpg'],
                        ['name' => 'Fatuma Hassan',   'role' => 'General Secretary',  'degree' => 'BSc. Information Technology',      'year' => '2nd Year', 'email' => 'f.hassan@uni.ac.ke',    'img' => 'team-secretary.jpg'],
                        ['name' => 'Liam Gitonga',    'role' => 'Events Coordinator', 'degree' => 'BSc. Electrical & Electronic Eng.','year' => '3rd Year', 'email' => 'l.gitonga@uni.ac.ke',   'img' => ''],
                        ['name' => 'Priya Nair',      'role' => 'Treasurer',          'degree' => 'BSc. Actuarial Science',           'year' => '2nd Year', 'email' => 'p.nair@uni.ac.ke',      'img' => ''],
                    ];

                    foreach ($committee as $i => $member) {
                        echo '<tr>';
                        echo '<td>' . ($i + 1) . '</td>';
                        echo '<td><strong>' . htmlspecialchars($member['name']) . '</strong></td>';
                        echo '<td><span class="tag-badge">' . htmlspecialchars($member['role']) . '</span></td>';
                        echo '<td>' . htmlspecialchars($member['degree']) . '</td>';
                        echo '<td>' . htmlspecialchars($member['year']) . '</td>';
                        echo '<td><a href="mailto:' . htmlspecialchars($member['email']) . '" style="font-size:0.85rem;">' . htmlspecialchars($member['email']) . '</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Profile Cards Grid -->
        <h3 style="text-align:center; margin: 3.5rem 0 2rem; color: var(--color-primary-dark);">Meet the Leadership</h3>
        <div class="grid-4">
            <?php
            $profileMembers = array_filter($committee, fn($m) => !empty($m['img']));
            foreach ($profileMembers as $member) {
                echo '<div class="card" style="text-align: center; overflow: hidden;">';
                echo '<div style="height: 200px; overflow: hidden;">';
                echo '<img src="assets/images/' . htmlspecialchars($member['img']) . '" alt="' . htmlspecialchars($member['name']) . '" style="width:100%; height:100%; object-fit:cover; transition: transform 0.4s ease;" onmouseover="this.style.transform=\'scale(1.06)\'" onmouseout="this.style.transform=\'scale(1)\'">';
                echo '</div>';
                echo '<div class="card-body" style="padding: 1.4rem;">';
                echo '<h4 style="margin-bottom: 0.3rem;">' . htmlspecialchars($member['name']) . '</h4>';
                echo '<span class="tag-badge">' . htmlspecialchars($member['role']) . '</span>';
                echo '<p style="font-size: 0.82rem; color: var(--color-text-muted); margin: 0.75rem 0 0;">' . htmlspecialchars($member['degree']) . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
