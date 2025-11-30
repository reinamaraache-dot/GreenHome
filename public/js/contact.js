document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector('.form');
    if (!form) return;

    // Helper function to show/hide inline messages
    function showMessage(type, text, form) {
        let msg = form.querySelector(`.message-box.message-${type}`);
        if (!msg) {
            // Create the message box if it doesn't exist
            msg = document.createElement('div');
            msg.className = `message-box message-${type}`;
            form.appendChild(msg); // Append to the end of the form
        }
        
        // Hide other messages
        form.querySelectorAll('.message-box').forEach(el => el.classList.remove('message-visible'));
        
        msg.textContent = text;
        msg.classList.add('message-visible');

        if (type === 'success') {
            // Success messages fade out after 3 seconds
            setTimeout(() => {
                msg.classList.remove('message-visible');
            }, 3000);
        }
    }

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const nameInput = form.querySelector('input[type="text"]');
        const emailInput = form.querySelector('input[type="email"]');
        const msgInput = form.querySelector('textarea');

        let isValid = true;

        // 1. Validation Logic: Check all fields and apply the 'error' class if empty
        [nameInput, emailInput, msgInput].forEach(input => {
            if (input.value.trim() === '') {
                input.classList.add('error');
                isValid = false;
            } else {
                input.classList.remove('error');
            }
        });

        if (!isValid) {
            // 2. Error State: Show inline error message
            showMessage('error', 'Please fill all required fields, indicated by red borders.', form);
            return;
        }
        
        // 3. Success State: Simulate success and show message
        showMessage('success', 'Thank you! Your message is ready to send (backend integration pending).', form);
        
        // Clear inputs after success
        form.reset();
        
        // Ensure any previous error message is hidden
        const errorMsg = form.querySelector('.message-error');
        if(errorMsg) errorMsg.classList.remove('message-visible');
    });
    
    // Live validation: Remove error border once the user starts typing
    form.querySelectorAll('.input').forEach(input => {
        input.addEventListener('input', () => {
            if (input.value.trim() !== '') {
                input.classList.remove('error');
            }
            // If the user starts typing, hide the error message immediately
            const errorMsg = form.querySelector('.message-error');
            if(errorMsg) errorMsg.classList.remove('message-visible');
        });
    });
});