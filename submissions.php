<?php
/**
 * submissions.php – View Stored Members (Database Retrieval)
 * EcoTech Innovators Society
 * Demonstrates: retrieve and display submitted information from the database.
 */
$pageTitle  = 'Member Submissions';
$activePage = 'submissions';
require_once 'includes/db.php';
require_once 'includes/header.php';

// Fetch all member records from database
$members = [];
$memberCount = 0;
$dbError = '';

try {
    $pdo = getDatabaseConnection();

    $stmt = $pdo->query("SELECT * FROM members ORDER BY created_at DESC");
    $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $memberCount = count($members);

} catch (Exception $e) {
    $dbError = 'Could not load submissions: ' . htmlspecialchars($e->getMessage());
}
?>

<!-- ===== PAGE HERO ===== -->
<section style="background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-earth-rich) 100%); color: var(--color-cream); padding: 4rem 0 3rem;">
    <div class="container" style="text-align: center;">
        <span class="section-tag" style="background: rgba(176,149,117,0.2); border-color: var(--color-tan); color: var(--color-tan);">Admin View</span>
        <h1 style="color: var(--color-white); margin: 0.8rem 0 1rem;">Member Submissions</h1>
        <p style="color: rgba(247,244,230,0.8); font-size: 1rem; max-width: 600px; margin: 0 auto;">
            Displaying all stored membership applications retrieved from the database.
            Total registered: <strong style="color: var(--color-tan);"><?php echo $memberCount; ?></strong>
        </p>
    </div>
</section>

<!-- ===== SUBMISSIONS TABLE ===== -->
<section class="section" id="submissionsSection">
    <div class="container">

        <?php if (!empty($dbError)): ?>
        <div class="alert alert-error"><?php echo $dbError; ?></div>
        <?php elseif ($memberCount === 0): ?>
        <div style="text-align: center; padding: 4rem 2rem; background: var(--color-white); border-radius: var(--radius-lg); border: 1px solid var(--color-surface-subtle); box-shadow: var(--shadow-sm);">
            <div style="font-size: 3.5rem; margin-bottom: 1rem;">📋</div>
            <h2 style="color: var(--color-primary-dark); margin-bottom: 0.75rem;">No applications yet</h2>
            <p style="color: var(--color-text-muted);">No membership applications have been submitted. <a href="join.php">Submit the first one →</a></p>
        </div>
        <?php else: ?>

        <div class="table-responsive">
            <table class="custom-table" id="submissionsTable">
                <caption style="caption-side: bottom; padding: 0.75rem; font-size: 0.82rem; color: var(--color-text-muted); text-align: left;">
                    All membership applications stored in the database — <?php echo date('d M Y'); ?>
                </caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Year</th>
                        <th scope="col">Department</th>
                        <th scope="col">Membership</th>
                        <th scope="col">Interests</th>
                        <th scope="col">Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $i => $member): ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><strong><?php echo htmlspecialchars($member['full_name']); ?></strong></td>
                        <td><?php echo htmlspecialchars($member['student_id']); ?></td>
                        <td><a href="mailto:<?php echo htmlspecialchars($member['email']); ?>" style="font-size:0.85rem;"><?php echo htmlspecialchars($member['email']); ?></a></td>
                        <td><?php echo htmlspecialchars($member['phone']); ?></td>
                        <td><span class="tag-badge"><?php echo htmlspecialchars($member['year_of_study']); ?></span></td>
                        <td><?php echo htmlspecialchars($member['department']); ?></td>
                        <td><?php echo htmlspecialchars($member['membership_type']); ?></td>
                        <td style="font-size: 0.82rem; max-width: 200px;"><?php echo htmlspecialchars($member['interests']); ?></td>
                        <td style="font-size: 0.82rem; white-space: nowrap;"><?php echo date('d M Y, H:i', strtotime($member['created_at'])); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php endif; ?>

        <div style="text-align: center; margin-top: 2.5rem;">
            <a href="join.php" class="btn btn-primary">← Back to Join Form</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
