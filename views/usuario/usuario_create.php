<?php
include_once("./views/panel_structure.php");
?>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Registrar Usuario</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <form class="row g-4" method="POST" action="index.php?controller=usuario&action=store" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="drop-zone">
                        <span class="drop-zone__prompt" style="color:#e9ecef;">Arrastra y suelta una imagen aquí o haz clic para seleccionarla</span>
                        <input type="file" name="fotografia" class="drop-zone__input" required accept=".jpg, .jpeg, .png" id="fotografia">
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="nombre_admin" class="form-label" style="color:#e9ecef;">Nombre completo</label>
                    <input type="text" class="form-control is-invalid" id="nombre_admin" name="nombre" required disabled>
                    <div class="invalid-feedback">Ingresa el nombre completo del Usuario.</div>
                </div>
                
                <div class="col-md-4">
                    <label for="matricula" class="form-label" style="color:#e9ecef;">Matricula</label>
                    <input type="number" class="form-control is-invalid" id="matricula" name="matricula" required disabled maxlength="10">
                    <div class="invalid-feedback">La matrícula debe tener exactamente 10 caracteres numéricos.</div>
                </div>
                <div class="col-md-4">
                    <label for="tipo_usuario" class="form-label" style="color:#e9ecef;">Tipo de Usuario</label>
                    <select class="form-select is-invalid" id="tipo_usuario" name="tipo_usuario" required disabled>
                        <option value="">Seleccionar</option>
                        <option value="Alumno">Alumno</option>
                        <option value="Docente">Docente</option>
                        <option value="Administrativo">Administrativo</option>
                    </select>
                </div>
                <div class="col-14">
                    <button class="btn btn-success" type="submit">Guardar Usuario</button>
                </div>
            </form>
            <script src="/inte/assets/js/usuariofr.js"></script>
        </div>
    </div>
</div>