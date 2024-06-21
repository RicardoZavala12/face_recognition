document.getElementById('fotografia').addEventListener('change', function() {
    if (this.files.length > 0) {
        document.getElementById('nombre_admin').disabled = false;
    } else {
        document.getElementById('nombre_admin').disabled = true;
    }
});

document.getElementById('nombre_admin').addEventListener('input', function() {
    if (this.value.trim() !== '') {
        document.getElementById('matricula').disabled = false;
    } else {
        document.getElementById('matricula').disabled = true;
    }
});

document.getElementById('matricula').addEventListener('input', function() {
    if (this.value.trim() !== '' && this.value.length <= 10) {
        document.getElementById('tipo_usuario').disabled = false;
    } else {
        document.getElementById('tipo_usuario').disabled = true;
    }
});

document.getElementById('tipo_usuario').addEventListener('change', function() {
    if (this.value.trim() !== '') {
        document.getElementById('submitBtn').disabled = false;
    } else {
        document.getElementById('submitBtn').disabled = true;
    }
});

