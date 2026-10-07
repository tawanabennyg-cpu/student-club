<?php
/**
 * Page 5: Join / Contact Us
 * EcoTech Innovators Society
 * Client-side validation by validation.js, server-side processing by process_join.php
 */
$pageTitle  = 'Join / Contact Us';
$activePage = 'join';
require_once 'includes/header.php';

// Pre-fill RSVP event title if arriving from event page
$rsvpEvent = isset($_GET['rsvp']) ? htmlspecialchars($_GET['rsvp']) : '';

// Read flash message from session (set after successful submission)
session_start();
$flashMessage = '';
$flashType    = '';
if (isset($_SESSION['flash_message'])) {
    $flashMessage = $_SESSION['flash_message'];
    $flashType    = $_SESSION['flash_type'] ?? 'success';
    unset($_SESSION['flash_message'], $_SESSION['flash_type']);
}
?>

<!-- ===== PAGE HERO ===== -->
<section style="background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-earth-rich) 100%); color: var(--color-cream); padding: 4.5rem 0 3.5rem;">
    <div class="container" style="text-align: center;">
        <span class="section-tag" style="background: rgba(176,149,117,0.2); border-color: var(--color-tan); color: var(--color-tan);">Join / Contact</span>
        <h1 style="color: var(--color-white); margin: 0.8rem 0 1.2rem;">Become an EcoTech Innovator</h1>
        <p style="color: rgba(247,244,230,0.88); font-size: 1.15rem; max-width: 680px; margin: 0 auto;">
            Apply for membership, RSVP to events, or send us a message. We'd love to have you in our community.
        </p>
    </div>
</section>

<!-- ===== FORM SECTION ===== -->
<section class="section" id="joinSection">
    <div class="container" style="max-width: 860px;">

        <?php if (!empty($flashMessage)): ?>
        <div class="alert alert-<?php echo $flashType; ?>" id="flashBanner" role="alert">
            <?php echo $flashType === 'success' ? '✅' : '❌'; ?>
            <?php echo $flashMessage; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($rsvpEvent)): ?>
        <div class="alert alert-success" style="margin-bottom: 1.5rem;">
            🎟️ You are registering for: <strong><?php echo $rsvpEvent; ?></strong>. Complete the form below to confirm your membership and RSVP.
        </div>
        <?php endif; ?>

        <div class="form-card">
            <h2 style="margin-bottom: 0.5rem; color: var(--color-primary-dark);">Membership Application</h2>
            <p style="color: var(--color-text-muted); margin-bottom: 2rem; font-size: 0.95rem;">
                Fields marked <span style="color:var(--color-error); font-weight:700;">*</span> are required. Membership is free and open to all enrolled university students.
            </p>

            <!-- Validation summary (populated by validation.js on submit) -->
            <div id="formValidationSummary"></div>

            <!-- JOIN FORM: POST to process_join.php -->
            <form method="POST" action="process_join.php" id="joinForm" novalidate>

                <!-- Hidden field for RSVP event if present -->
                <?php if (!empty($rsvpEvent)): ?>
                <input type="hidden" name="rsvp_event" value="<?php echo htmlspecialchars($rsvpEvent); ?>">
                <?php endif; ?>

                <!-- ROW 1: Name + Student ID -->
                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="full_name" class="form-label">Full Name <span class="required">*</span></label>
                        <input type="text"
                               id="full_name"
                               name="full_name"
                               class="form-control"
                               placeholder="e.g. Amara Njoroge"
                               autocomplete="name"
                               required
                               maxlength="150">
                        <span class="form-error-msg" id="fullNameError" role="alert"></span>
                    </div>

                    <div class="form-group">
                        <label for="student_id" class="form-label">Student Registration ID <span class="required">*</span></label>
                        <input type="text"
                               id="student_id"
                               name="student_id"
                               class="form-control"
                               placeholder="e.g. CS/12345/22"
                               required
                               maxlength="50">
                        <span class="form-error-msg" id="studentIdError" role="alert"></span>
                    </div>
                </div>

                <!-- ROW 2: Email + Phone -->
                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control"
                               placeholder="student@university.ac.ke"
                               autocomplete="email"
                               required
                               maxlength="150">
                        <span class="form-error-msg" id="emailError" role="alert"></span>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number <span class="required">*</span></label>
                        <input type="tel"
                               id="phone"
                               name="phone"
                               class="form-control"
                               placeholder="+254 700 123 456"
                               autocomplete="tel"
                               required
                               maxlength="20">
                        <span class="form-error-msg" id="phoneError" role="alert"></span>
                    </div>
                </div>

                <!-- ROW 3: Year + Department -->
                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="year_of_study" class="form-label">Year of Study <span class="required">*</span></label>
                        <select id="year_of_study" name="year_of_study" class="form-control" required>
                            <option value="">— Select Year —</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            <option value="Postgraduate">Postgraduate</option>
                        </select>
                        <span class="form-error-msg" id="yearError" role="alert"></span>
                    </div>

                    <div class="form-group">
                        <label for="department" class="form-label">Faculty / Degree Programme <span class="required">*</span></label>
                        <input type="text"
                               id="department"
                               name="department"
                               class="form-control"
                               placeholder="e.g. BSc. Computer Science"
                               required
                               maxlength="120">
                        <span class="form-error-msg" id="departmentError" role="alert"></span>
                    </div>
                </div>

                <!-- Interest Areas (Checkboxes) -->
                <div class="form-group">
                    <fieldset>
                        <legend class="form-label">Interest Areas <span class="required">*</span></legend>
                        <div class="checkbox-group" style="margin-top: 0.5rem;">
                            <label class="checkbox-item">
                                <input type="checkbox" name="interests[]" value="Web Development"> Web Development
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="interests[]" value="IoT Hardware"> IoT &amp; Hardware
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="interests[]" value="Environmental Data"> Environmental Data
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="interests[]" value="Clean Energy"> Clean Energy
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="interests[]" value="Event Organizing"> Event Organizing
                            </label>
                            <label class="checkbox-item">
                                <input type="checkbox" name="interests[]" value="Research"> Research
                            </label>
                        </div>
                        <span class="form-error-msg" id="interestsError" role="alert"></span>
                    </fieldset>
                </div>

                <!-- Membership Type (Radio Buttons) -->
                <div class="form-group">
                    <fieldset>
                        <legend class="form-label">Membership Type <span class="required">*</span></legend>
                        <div class="radio-group" style="margin-top: 0.5rem;">
                            <label class="radio-item">
                                <input type="radio" name="membership_type" value="Full Student Member">
                                <span>
                                    <strong>Full Student Member</strong><br>
                                    <small style="color:var(--color-text-muted);">Enrolled degree student — voting rights, full event access</small>
                                </span>
                            </label>
                            <label class="radio-item">
                                <input type="radio" name="membership_type" value="Associate Member">
                                <span>
                                    <strong>Associate Member</strong><br>
                                    <small style="color:var(--color-text-muted);">Non-enrolled or alumni — event access, no voting rights</small>
                                </span>
                            </label>
                        </div>
                        <span class="form-error-msg" id="membershipError" role="alert"></span>
                    </fieldset>
                </div>

                <!-- Personal Statement / Message -->
                <div class="form-group">
                    <label for="statement" class="form-label">Personal Statement / Message</label>
                    <textarea id="statement"
                              name="statement"
                              class="form-control"
                              rows="5"
                              placeholder="Tell us a little about yourself, your tech interests, or any questions you have for the society..."
                              maxlength="1000"></textarea>
                    <small style="color:var(--color-text-muted); font-size: 0.82rem;">Optional. Maximum 1000 characters.</small>
                </div>

                <!-- Submit Button -->
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="submit" class="btn btn-accent" id="submitBtn" style="padding: 1rem 3rem; font-size: 1.05rem;">
                        ✦ Submit Application
                    </button>
                    <p style="margin-top: 0.75rem; font-size: 0.82rem; color: var(--color-text-muted);">
                        By applying, you agree to the EcoTech Innovators Society's code of conduct.
                    </p>
                </div>

            </form><!-- end #joinForm -->
        </div>

        <!-- Alternative Contact Section -->
        <div style="margin-top: 3.5rem; background: var(--color-white); border-radius: var(--radius-lg); padding: 2.5rem; border: 1px solid var(--color-tan); box-shadow: var(--shadow-sm);">
            <h3 style="margin-bottom: 1.2rem; color: var(--color-primary-dark);">Other Ways to Reach Us</h3>
            <div class="grid-3" style="gap: 1.5rem;">
                <div style="text-align: center; padding: 1.4rem; background: var(--color-cream); border-radius: var(--radius-md);">
                    <div style="font-size: 2rem; margin-bottom: 0.6rem;">📧</div>
                    <p style="font-weight: 700; margin: 0 0 0.3rem;">Email</p>
                    <a href="mailto:ecotech@university.ac.ke" style="font-size: 0.88rem; color: var(--color-accent);">ecotech@university.ac.ke</a>
                </div>
                <div style="text-align: center; padding: 1.4rem; background: var(--color-cream); border-radius: var(--radius-md);">
                    <div style="font-size: 2rem; margin-bottom: 0.6rem;">📍</div>
                    <p style="font-weight: 700; margin: 0 0 0.3rem;">Office</p>
                    <p style="font-size: 0.88rem; color: var(--color-text-muted); margin: 0;">Computing Complex, Room 204</p>
                </div>
                <div style="text-align: center; padding: 1.4rem; background: var(--color-cream); border-radius: var(--radius-md);">
                    <div style="font-size: 2rem; margin-bottom: 0.6rem;">📅</div>
                    <p style="font-weight: 700; margin: 0 0 0.3rem;">Meeting Days</p>
                    <p style="font-size: 0.88rem; color: var(--color-text-muted); margin: 0;">Every Tuesday &amp; Thursday<br>4:00 PM – 6:00 PM</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Form Validation JS -->
<script src="assets/js/validation.js"></script>

<?php require_once 'includes/footer.php'; ?>
