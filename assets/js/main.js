/**
 * EcoTech Innovators Society - Main Global Script
 * Features: Mobile navigation toggle, event countdown timer, active nav tracking
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Navigation Toggle (Demonstrating onclick event)
    const menuToggle = document.getElementById('mobileMenuToggle');
    const mainNav = document.getElementById('mainNav');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function () {
            mainNav.classList.toggle('open');
            const isOpen = mainNav.classList.contains('open');
            menuToggle.setAttribute('aria-expanded', isOpen);
            menuToggle.innerHTML = isOpen ? '&times;' : '&#9776;';
        });
    }

    // 2. Countdown Timer for Flagship Event (Operators, variables, conditions, setInterval)
    const daysEl = document.getElementById('countdownDays');
    const hoursEl = document.getElementById('countdownHours');
    const minsEl = document.getElementById('countdownMins');
    const secsEl = document.getElementById('countdownSecs');

    if (daysEl && hoursEl && minsEl && secsEl) {
        // Target Date: EcoHack 2026 (November 15, 2026)
        const targetDate = new Date('November 15, 2026 09:00:00').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance > 0) {
                // Mathematical calculations demonstrating operators
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                daysEl.textContent = String(days).padStart(2, '0');
                hoursEl.textContent = String(hours).padStart(2, '0');
                minsEl.textContent = String(minutes).padStart(2, '0');
                secsEl.textContent = String(seconds).padStart(2, '0');
            } else {
                daysEl.textContent = '00';
                hoursEl.textContent = '00';
                minsEl.textContent = '00';
                secsEl.textContent = '00';
            }
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    }
});
