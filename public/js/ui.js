document.addEventListener("DOMContentLoaded", () => {
    console.log("UI/UX Engine Running - GreenHome");

    const header = document.querySelector(".header");
    const navLinks = document.querySelectorAll(".nav a");
    
    // --- 1. ACTIVE NAVIGATION LINK HIGHLIGHTING (UX) ---
    function highlightActiveLink() {
        // Gets the current file name (e.g., 'plants.html' or 'index.html')
        const path = window.location.pathname;
        const currentFile = path.substring(path.lastIndexOf('/') + 1) || 'index.html';

        navLinks.forEach(link => {
            // Check if the link's href matches the current file
            if (link.getAttribute('href') === currentFile) {
                link.classList.add('nav-active');
            } else {
                link.classList.remove('nav-active');
            }
        });
    }


    // --- 2. HEADER SCROLL EFFECT (Micro-animation) ---
    function handleScrollHeader() {
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    }


    // --- 3. GENERIC COMPONENT INTERACTION ---
    const interactiveCards = document.querySelectorAll('.card, .dashboard-card');
    interactiveCards.forEach(card => {
        // Add a class for visual effect on hover
        card.addEventListener('mouseover', () => card.classList.add('card-hover'));
        card.addEventListener('mouseout', () => card.classList.remove('card-hover'));
        
        // Ensure keyboard focus works well
        card.addEventListener('focus', () => card.classList.add('card-hover'));
        card.addEventListener('blur', () => card.classList.remove('card-hover'));
    });
    
    
    highlightActiveLink();
    handleScrollHeader();

    window.addEventListener("scroll", handleScrollHeader);

});