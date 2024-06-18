const loginForm = document.getElementById('loginModal').querySelector('form');
signUpForm.addEventListener('submit', (event) => {
    if (!signUpForm.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();

        signUpForm.querySelectorAll(':invalid').forEach((field) => {
            field.closest('.form-group').classList.add('was-validated');
        });
    } else {
        signUpForm.submit();
    }
});

const signUpForm = document.getElementById('signUpModal').querySelector('form');
signUpForm.addEventListener('submit', (event) => {
    if (!signUpForm.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();

        signUpForm.querySelectorAll(':invalid').forEach((field) => {
            field.closest('.form-group').classList.add('was-validated');
        });
    } else {
        signUpForm.submit();
    }
});