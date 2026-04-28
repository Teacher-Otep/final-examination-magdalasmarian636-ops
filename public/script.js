// script.js

// Function to show selected section and hide ALL others (Requirement: UX Design)
function showSection(sectionID) {
    const sections = document.querySelectorAll('.content');
    const homeSection = document.querySelector('.homecontent');

    // Hide home section
    homeSection.style.display = 'none';

    // Hide all content sections
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // Show the active one
    const activeSection = document.getElementById(sectionID);
    if (activeSection) {
        activeSection.style.display = 'block';
    }
}

// Requirement: Hide 'content' sections when logo is clicked
function hideAllSections() {
    const sections = document.querySelectorAll('.content');
    sections.forEach(section => {
        section.style.display = 'none';
    });
    // Optional: Show home again
    document.querySelector('.homecontent').style.display = 'block';
}

// Requirement: Clear Fields button function
function clearFields() {
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.value = '';
    });
}

// Existing Toast Logic
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'success') {
        const toast = document.getElementById('success-toast');
        toast.classList.remove('toast-hidden');
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.classList.add('toast-hidden'), 500);
        }, 3000);
        window.history.replaceState({}, document.title, window.location.pathname);
    }
}