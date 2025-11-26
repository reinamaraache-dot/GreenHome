document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector('.form');
    if (!form) return;
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const name = form.querySelector('input[type="text"]').value.trim();
        const email = form.querySelector('input[type="email"]').value.trim();
        const msg = form.querySelector('textarea').value.trim();
        if (!name || !email || !msg) {
            alert('Please fill all fields.');
            return;
        }
        // Basic UI feedback – Razane will implement server submit
        alert('Message ready to send (backend integration pending).');
        form.reset();
    });
});
