<?php
/**
 * process_join.php – Server-side Form Processing
 * EcoTech Innovators Society
 * Validates, sanitizes, and inserts membership application into the database.
 */

session_start();
require_once 'includes/db.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: join.php');
    exit;
}

// -------------------------------------------------------------------------
// 1. Sanitize and validate all incoming POST data
// -------------------------------------------------------------------------
$errors = [];

// Full Name
$fullName = trim($_POST['full_name'] ?? '');
if (empty($fullName)) {
    $errors[] = 'Full name is required.';
} elseif (strlen($fullName) < 3) {
    $errors[] = 'Full name must be at least 3 characters.';
} elseif (!preg_match("/^[a-zA-Z\s.\'-]+$/", $fullName)) {
    $errors[] = 'Full name contains invalid characters.';
}

// Student ID
$studentId = trim($_POST['student_id'] ?? '');
if (empty($studentId) || strlen($studentId) < 4) {
    $errors[] = 'A valid student registration ID is required.';
}

// Email
$email = trim($_POST['email'] ?? '');
if (empty($email)) {
    $errors[] = 'Email address is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

// Phone
$phone = trim($_POST['phone'] ?? '');
if (empty($phone) || !preg_match('/^[\d\s+\-()]{8,18}$/', $phone)) {
    $errors[] = 'Please enter a valid phone number (8–18 digits).';
}

// Year of Study
$yearOfStudy = trim($_POST['year_of_study'] ?? '');
$validYears  = ['1st Year', '2nd Year', '3rd Year', '4th Year', 'Postgraduate'];
if (!in_array($yearOfStudy, $validYears, true)) {
    $errors[] = 'Please select a valid year of study.';
}

// Department / Programme
$department = trim($_POST['department'] ?? '');
if (empty($department)) {
    $errors[] = 'Faculty / Degree Programme is required.';
}

// Interest Areas (array of checkboxes)
$rawInterests = $_POST['interests'] ?? [];
if (empty($rawInterests) || !is_array($rawInterests)) {
    $errors[] = 'Please select at least one interest area.';
}
$allowedInterests = ['Web Development', 'IoT Hardware', 'Environmental Data', 'Clean Energy', 'Event Organizing', 'Research'];
$safeInterests    = array_filter($rawInterests, fn($i) => in_array($i, $allowedInterests, true));
$interestsStr     = implode(', ', $safeInterests);

// Membership Type (radio)
$membershipType  = trim($_POST['membership_type'] ?? '');
$validMemberships = ['Full Student Member', 'Associate Member'];
if (!in_array($membershipType, $validMemberships, true)) {
    $errors[] = 'Please select a valid membership category.';
}

// Optional personal statement
$statement = trim($_POST['statement'] ?? '');
$statement = htmlspecialchars($statement, ENT_QUOTES, 'UTF-8');
if (strlen($statement) > 1000) {
    $statement = substr($statement, 0, 1000);
}

// -------------------------------------------------------------------------
// 2. If validation errors exist, redirect back with error message
// -------------------------------------------------------------------------
if (!empty($errors)) {
    $_SESSION['flash_message'] = '⚠️ Please fix the following: ' . implode(' | ', $errors);
    $_SESSION['flash_type']    = 'error';
    header('Location: join.php');
    exit;
}

// -------------------------------------------------------------------------
// 3. Insert into database using PDO prepared statement
// -------------------------------------------------------------------------
try {
    $pdo = getDatabaseConnection();

    $stmt = $pdo->prepare("
        INSERT INTO members
            (full_name, student_id, email, phone, year_of_study, department, membership_type, interests, statement)
        VALUES
            (:full_name, :student_id, :email, :phone, :year_of_study, :department, :membership_type, :interests, :statement)
    ");

    $stmt->execute([
        ':full_name'       => htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8'),
        ':student_id'      => htmlspecialchars($studentId, ENT_QUOTES, 'UTF-8'),
        ':email'           => $email,
        ':phone'           => htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'),
        ':year_of_study'   => $yearOfStudy,
        ':department'      => htmlspecialchars($department, ENT_QUOTES, 'UTF-8'),
        ':membership_type' => $membershipType,
        ':interests'       => $interestsStr,
        ':statement'       => $statement,
    ]);

    $newMemberId = $pdo->lastInsertId();

    // 4. Set session flash message and redirect to a success confirmation page
    $_SESSION['flash_message']   = "🎉 Welcome to EcoTech Innovators Society, <strong>" . htmlspecialchars($fullName) . "</strong>! Your membership application (Ref: #" . $newMemberId . ") has been received. We'll be in touch at <em>" . htmlspecialchars($email) . "</em> within 48 hours.";
    $_SESSION['flash_type']      = 'success';
    header('Location: join.php');
    exit;

} catch (Exception $e) {
    error_log("Membership insert error: " . $e->getMessage());
    $_SESSION['flash_message'] = '❌ A server error occurred while saving your application. Please try again or contact us directly at ecotech@university.ac.ke.';
    $_SESSION['flash_type']    = 'error';
    header('Location: join.php');
    exit;
}
