// Function to check if a string is empty or contains only whitespace
function isEmpty(str) {
    return str.trim() === '';
}

// Function to validate an email address
function validateEmail(email) {
    // Regular expression for email validation
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

// Function to validate the form
function validateForm() {
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var message = document.getElementById('message').value.trim();

    if (isEmpty(name)) {
        alert('Please enter your name.');
        return false;
    }

    if (isEmpty(email)) {
        alert('Please enter your email address.');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    if (isEmpty(message)) {
        alert('Please enter your message.');
        return false;
    }

    return true; // Form is valid 
}