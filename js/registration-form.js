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

// Function to validate the gender field
function validateGender(gender) {
    return gender !== 'Please Choose';
}

// Function to validate the form
function validateForm() {
    var studentName = document.getElementById('studentName').value;
    var gender = document.getElementById('gender').value;
    var dob = document.getElementById('dob').value;
    var grade = document.getElementById('grade').value;
    var contactNumber = document.getElementById('contactNumber').value;
    var email = document.getElementById('email').value;

    if (isEmpty(studentName)) {
        alert('Please enter the student name.');
        return false;
    }

    if (!validateGender(gender)) {
        alert('Please select a valid gender.');
        return false;
    }

    if (dob === '') {
        alert('Please enter the date of birth.');
        return false;
    }

    if (isEmpty(grade)) {
        alert('Please enter the grade.');
        return false;
    }

    if (isEmpty(contactNumber)) {
        alert('Please enter the contact number.');
        return false;
    }

    // Check if contact number is a valid phone number
    var contactNumberRegex = /^\d{11}$/;
    if (!contactNumberRegex.test(contactNumber)) {
        alert('Please enter a valid 10-digit contact number.');
        return false;
    }

    if (isEmpty(email)) {
        alert('Please enter the email address.');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    return true; // Form is valid
}
