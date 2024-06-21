document.getElementById('nombre_admin').addEventListener('input', function() {
    if (this.value.trim() !== '') {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
        document.getElementById('matricula').disabled = false;
    } else {
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        document.getElementById('matricula').disabled = true;
    }
});

document.getElementById('matricula').addEventListener('input', function() {
    if (this.value.trim() !== '' && this.value.length <= 10) {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
        document.getElementById('email_admin').disabled = false;
    } else {
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        document.getElementById('email_admin').disabled = true;
    }
});

document.getElementById('email_admin').addEventListener('input', function() {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (emailPattern.test(this.value.trim())) {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
        document.getElementById('contraseña').disabled = false;
    } else {
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        document.getElementById('contraseña').disabled = true;
    }
});

document.getElementById('contraseña').addEventListener('input', function() {
    if (this.value.trim() !== '' && this.value.length === 12) {
        this.classList.remove('is-invalid');
        this.classList.add('is-valid');
        document.getElementById('submitBtn').disabled = false;
    } else {
        this.classList.remove('is-valid');
        this.classList.add('is-invalid');
        document.getElementById('submitBtn').disabled = true;
    }
});



document.addEventListener('DOMContentLoaded', function () {
    const matriculaInput = document.getElementById('matricula');
    const emailInput = document.getElementById('email_admin');
    const passwordInput = document.getElementById('contraseña');
    const submitBtn = document.getElementById('submitBtn');

    const validateMatricula = () => {
        const value = matriculaInput.value;
        if (/^\d{10}$/.test(value)) {
            matriculaInput.classList.remove('is-invalid');
            matriculaInput.classList.add('is-valid');
        } else {
            matriculaInput.classList.remove('is-valid');
            matriculaInput.classList.add('is-invalid');
        }
    };

    const validateEmail = () => {
        const value = emailInput.value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailPattern.test(value)) {
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
        } else {
            emailInput.classList.remove('is-valid');
            emailInput.classList.add('is-invalid');
        }
    };

    const validatePassword = () => {
        const value = passwordInput.value;
        if (value.length === 12) {
            passwordInput.classList.remove('is-invalid');
            passwordInput.classList.add('is-valid');
        } else {
            passwordInput.classList.remove('is-valid');
            passwordInput.classList.add('is-invalid');
        }
    };

    const checkFormValidity = () => {
        if (matriculaInput.classList.contains('is-valid') &&
            emailInput.classList.contains('is-valid') &&
            passwordInput.classList.contains('is-valid')) {
            submitBtn.disabled = false;
        } else {
            submitBtn.disabled = true;
        }
    };

    matriculaInput.addEventListener('input', () => {
        validateMatricula();
        checkFormValidity();
    });

    emailInput.addEventListener('input', () => {
        validateEmail();
        checkFormValidity();
    });


});