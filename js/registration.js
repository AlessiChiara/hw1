document.getElementById('registerForm').addEventListener('submit', function(event) {
    let isValid = true;

    const name = document.querySelector('input[name="name"]');
    const email = document.querySelector('input[name="email"]');
    const number = document.querySelector('input[name="number"]');
    const pass = document.querySelector('input[name="pass"]');
    const cpass = document.querySelector('input[name="cpass"]');

    const passwordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/;


    document.querySelectorAll('.error').forEach(e => e.remove());

    if (name.value.trim() === '') {
        isValid = false;
        showError(name, '');
    }
    if (email.value.trim() === '') {
        isValid = false;
        showError(email, '');
    }
    if (number.value.trim() === '') {
        isValid = false;
        showError(number, '');
    }
    if (!passwordPattern.test(pass.value)) {
        isValid = false;
        showError(pass, 'La password deve contenere almeno una lettera maiuscola, un numero, un carattere speciale e deve contenere almeno 8 caratteri.');
    }
    if (cpass.value.trim() === '') {
        isValid = false;
        showError(cpass, '*');
    } else if (cpass.value !== pass.value) {
        isValid = false;
        showError(cpass, 'Passwords non coincide');
    }

    if (!isValid) {
        event.preventDefault();
    }
});

function showError(element, message) {
    const error = document.createElement('div');
    error.className = 'error';
    error.style.color = 'red';
    error.textContent = message;
    element.parentNode.insertBefore(error, element.nextSibling);
}
