/**
 * EcoTech Innovators Society - Form Validation Script
 * Demonstrates:
 * - Client-side form validation for Join / Contact form
 * - Use of variables (const, let), operators (logical &&, ||, comparison ===, >=)
 * - Conditional statements (if, else if, else)
 * - Regular expressions for email and phone numbers
 * - Event handling (onsubmit, oninput, onblur)
 */

document.addEventListener('DOMContentLoaded', function () {
    const joinForm = document.getElementById('joinForm');
    if (!joinForm) return;

    // Form input references
    const fullNameInput = document.getElementById('full_name');
    const studentIdInput = document.getElementById('student_id');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const yearSelect = document.getElementById('year_of_study');
    const departmentInput = document.getElementById('department');
    const interestCheckboxes = document.querySelectorAll('input[name="interests[]"]');
    const membershipRadios = document.querySelectorAll('input[name="membership_type"]');

    // Helper functions for validation
    function validateFullName() {
        const val = fullNameInput.value.trim();
        const errorEl = document.getElementById('fullNameError');

        if (val.length === 0) {
            setError(fullNameInput, errorEl, 'Full name is required.');
            return false;
        } else if (val.length < 3) {
            setError(fullNameInput, errorEl, 'Full name must be at least 3 characters.');
            return false;
        } else if (!/^[a-zA-Z\s.'-]+$/.test(val)) {
            setError(fullNameInput, errorEl, 'Name may only contain letters and standard characters.');
            return false;
        } else {
            setSuccess(fullNameInput, errorEl);
            return true;
        }
    }

    function validateStudentId() {
        const val = studentIdInput.value.trim();
        const errorEl = document.getElementById('studentIdError');

        if (val.length === 0) {
            setError(studentIdInput, errorEl, 'Student Registration ID is required.');
            return false;
        } else if (val.length < 4) {
            setError(studentIdInput, errorEl, 'Please enter a valid student ID.');
            return false;
        } else {
            setSuccess(studentIdInput, errorEl);
            return true;
        }
    }

    function validateEmail() {
        const val = emailInput.value.trim();
        const errorEl = document.getElementById('emailError');
        // Standard email regular expression
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (val.length === 0) {
            setError(emailInput, errorEl, 'Email address is required.');
            return false;
        } else if (!emailRegex.test(val)) {
            setError(emailInput, errorEl, 'Please enter a valid email address (e.g., student@university.ac.ke).');
            return false;
        } else {
            setSuccess(emailInput, errorEl);
            return true;
        }
    }

    function validatePhone() {
        const val = phoneInput.value.trim();
        const errorEl = document.getElementById('phoneError');
        // Allow digits, plus, hyphens, and spaces
        const phoneRegex = /^[\d\s+\-()]{8,18}$/;

        if (val.length === 0) {
            setError(phoneInput, errorEl, 'Phone number is required for club communications.');
            return false;
        } else if (!phoneRegex.test(val)) {
            setError(phoneInput, errorEl, 'Please enter a valid phone number (at least 8 digits).');
            return false;
        } else {
            setSuccess(phoneInput, errorEl);
            return true;
        }
    }

    function validateYear() {
        const val = yearSelect.value;
        const errorEl = document.getElementById('yearError');

        if (!val || val === '') {
            setError(yearSelect, errorEl, 'Please select your current year of study.');
            return false;
        } else {
            setSuccess(yearSelect, errorEl);
            return true;
        }
    }

    function validateDepartment() {
        const val = departmentInput.value.trim();
        const errorEl = document.getElementById('departmentError');

        if (val.length === 0) {
            setError(departmentInput, errorEl, 'Department / Degree Programme is required.');
            return false;
        } else {
            setSuccess(departmentInput, errorEl);
            return true;
        }
    }

    function validateInterests() {
        const errorEl = document.getElementById('interestsError');
        let isChecked = false;

        interestCheckboxes.forEach(cb => {
            if (cb.checked) isChecked = true;
        });

        if (!isChecked) {
            if (errorEl) {
                errorEl.textContent = 'Please select at least one interest area.';
                errorEl.style.display = 'block';
            }
            return false;
        } else {
            if (errorEl) {
                errorEl.style.display = 'none';
            }
            return true;
        }
    }

    function validateMembership() {
        const errorEl = document.getElementById('membershipError');
        let isSelected = false;

        membershipRadios.forEach(radio => {
            if (radio.checked) isSelected = true;
        });

        if (!isSelected) {
            if (errorEl) {
                errorEl.textContent = 'Please choose a membership category.';
                errorEl.style.display = 'block';
            }
            return false;
        } else {
            if (errorEl) {
                errorEl.style.display = 'none';
            }
            return true;
        }
    }

    // Set error helper
    function setError(input, errorEl, message) {
        input.classList.remove('is-valid');
        input.classList.add('is-invalid');
        if (errorEl) {
            errorEl.textContent = message;
            errorEl.style.display = 'block';
        }
    }

    // Set success helper
    function setSuccess(input, errorEl) {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
        if (errorEl) {
            errorEl.textContent = '';
            errorEl.style.display = 'none';
        }
    }

    // Real-time input and blur event listeners
    if (fullNameInput) {
        fullNameInput.addEventListener('input', validateFullName);
        fullNameInput.addEventListener('blur', validateFullName);
    }
    if (studentIdInput) {
        studentIdInput.addEventListener('input', validateStudentId);
        studentIdInput.addEventListener('blur', validateStudentId);
    }
    if (emailInput) {
        emailInput.addEventListener('input', validateEmail);
        emailInput.addEventListener('blur', validateEmail);
    }
    if (phoneInput) {
        phoneInput.addEventListener('input', validatePhone);
        phoneInput.addEventListener('blur', validatePhone);
    }
    if (yearSelect) {
        yearSelect.addEventListener('change', validateYear);
    }
    if (departmentInput) {
        departmentInput.addEventListener('input', validateDepartment);
        departmentInput.addEventListener('blur', validateDepartment);
    }
    interestCheckboxes.forEach(cb => {
        cb.addEventListener('change', validateInterests);
    });
    membershipRadios.forEach(radio => {
        radio.addEventListener('change', validateMembership);
    });

    // Form onsubmit event listener
    joinForm.addEventListener('submit', function (e) {
        const isValidName = validateFullName();
        const isValidId = validateStudentId();
        const isValidEmail = validateEmail();
        const isValidPhone = validatePhone();
        const isValidYear = validateYear();
        const isValidDept = validateDepartment();
        const isValidInterests = validateInterests();
        const isValidMembership = validateMembership();

        // Logical operator check across all field validations
        const isFormValid = isValidName && isValidId && isValidEmail && isValidPhone && 
                            isValidYear && isValidDept && isValidInterests && isValidMembership;

        if (!isFormValid) {
            e.preventDefault(); // Stop submission

            // Focus first invalid element
            const firstInvalid = joinForm.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.focus();
            } else if (!isValidInterests) {
                interestCheckboxes[0].focus();
            } else if (!isValidMembership) {
                membershipRadios[0].focus();
            }

            // Show a friendly notice banner if available
            const formFeedback = document.getElementById('formValidationSummary');
            if (formFeedback) {
                formFeedback.innerHTML = `
                    <div class="alert alert-error">
                        ⚠️ Please correct the highlighted errors above before submitting your application.
                    </div>
                `;
                formFeedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }
        }
    });
});
