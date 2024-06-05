document.getElementById('loginForm').addEventListener('submit', function(event) {
    let isValid = true;

    
    const email = document.querySelector('input[name="email"]');
    const pass = document.querySelector('input[name="pass"]');



    document.querySelectorAll('.error').forEach(e => e.remove());

   
    if (email.value.trim() === '') {
        isValid = false;
        showError(email, "campo obbligatorio");
    }
    
    if (pass.value.trim() === '') {
        isValid = false;
        showError(pass, "campo obbligatorio");
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
