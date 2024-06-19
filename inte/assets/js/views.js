document.addEventListener('DOMContentLoaded', (event) => {
    const dropZones = document.querySelectorAll('.drop-zone');
    dropZones.forEach(dropZone => {
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.add('drop-zone--over');
        });

        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.remove('drop-zone--over');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.classList.remove('drop-zone--over');
            const files = e.dataTransfer.files;
            const validExtensions = ['jpg', 'jpeg', 'png'];
            const fileExtension = files[0].name.split('.').pop().toLowerCase();
            if (validExtensions.includes(fileExtension)) {
                dropZone.querySelector('.drop-zone__input').files = files;
                dropZone.querySelector('.drop-zone__prompt').textContent = files[0].name;
            } else {
                alert('Solo se permiten archivos JPG, JPEG o PNG.');
            }
        });

        dropZone.addEventListener('click', () => {
            dropZone.querySelector('.drop-zone__input').click();
        });

        dropZone.querySelector('.drop-zone__input').addEventListener('change', (e) => {
            const files = e.target.files;
            const validExtensions = ['jpg', 'jpeg', 'png'];
            const fileExtension = files[0].name.split('.').pop().toLowerCase();
            if (validExtensions.includes(fileExtension)) {
                dropZone.querySelector('.drop-zone__prompt').textContent = files[0].name;
            } else {
                alert('Solo se permiten archivos JPG, JPEG o PNG.');
            }
        });
    });

    const nombre = document.getElementById('nombre_admin');
    const matricula = document.getElementById('matricula');
    const email = document.getElementById('email_admin');
    const tipo_usuario = document.getElementById('tipo_usuario');
    const submitButton = document.querySelector('button[type="submit"]');

    nombre.addEventListener('input', () => {
        if (nombre.value.trim() !== '') {
            nombre.classList.remove('is-invalid');
            nombre.classList.add('is-valid');
            matricula.disabled = false;
            
        } else {
            nombre.classList.remove('is-valid');
            nombre.classList.add('is-invalid');
            matricula.disabled = true;
        }
    });

    matricula.addEventListener('input', () => {
        const matriculaValue = matricula.value.trim();
        const isNumeric = /^\d+$/.test(matriculaValue);

        if (matriculaValue.length === 10 && isNumeric) {
            matricula.classList.remove('is-invalid');
            matricula.classList.add('is-valid');
            tipo_usuario.disabled = false;
            tipo_usuario.focus();
        } else {
            matricula.classList.remove('is-valid');
            matricula.classList.add('is-invalid');
            tipo_usuario.disabled = true;
        }
    });


    tipo_usuario.addEventListener('input', () => {
        if (tipo_usuario.value.trim() !== '') {
            tipo_usuario.classList.remove('is-invalid');
            tipo_usuario.classList.add('is-valid');
            submitButton.disabled = false;
            submitButton.focus();
        } else {
            tipo_usuario.classList.remove('is-valid');
            tipo_usuario.classList.add('is-invalid');
            submitButton.disabled = true;
        }
    });
});