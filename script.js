// Optional: Add interactivity to service cards
    // document.querySelectorAll('.service-card').forEach(card => {
    //   card.addEventListener('click', function() {
    //     alert('Service card clicked!');
    //   });
    // });
    // form validation code start

        // Automatically open the modal after 2 seconds
        setTimeout(function() {
            document.getElementById('formModal').style.display = 'flex';
        }, 1000);

        // Close the modal when clicking on the close button
        document.querySelector('#form_close').addEventListener('click', function() {
            document.getElementById('formModal').style.display = 'none';
        });

        // Close the modal when clicking outside the modal
        // window.addEventListener('click', function(event) {
        //     if (event.target === document.getElementById('formModal')) {
        //         document.getElementById('formModal').style.display = 'none';
        //     }
        // });

        // Form validation
      document.getElementById('contactForm').addEventListener('submit', function(event) {
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let phone = document.getElementById('phone').value.trim();
    let state = document.getElementById('state').value;
    let message = document.getElementById('message').value.trim();

    // Name Validation
    if (name === '' || !/^[A-Za-z\s]+$/.test(name)) {
        alert("Please enter a valid name (only alphabets allowed).");
        event.preventDefault();
        return;
    }

    // Email Validation
    if (email === '' || !validateEmail(email)) {
        alert("Please enter a valid email address.");
        event.preventDefault();
        return;
    }

    // Phone Validation
    if (phone === '' || !validatePhone(phone)) {
        alert("Please enter a valid 10-digit phone number.");
        event.preventDefault();
        return;
    }

    // State Validation
    if (state === '') {
        alert("Please select your state.");
        event.preventDefault();
        return;
    }

    // Message Validation
    if (message === '' || message.length < 10) {
        alert("Message should be at least 10 characters long.");
        event.preventDefault();
        return;
    }
});

// Email validation function
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

// Phone number validation function
function validatePhone(phone) {
    const re = /^\d{10}$/;
    return re.test(String(phone));
}


    // form validation code end



