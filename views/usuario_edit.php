<?php
include_once("panel_structure.php");
?>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Editar Usuario</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <form class="row g-4">
                <div class="form-group">

                </div>
                <div class="col-md-4">
                    <label for="nombre_admin" class="form-label" style="color:#e9ecef;">Nombre completo</label>
                    <input type="text" class="form-control is-invalid" id="nombre_admin" required="">
                </div>
                <div class="col-md-4">
                    <label for="matricula" class="form-label" style="color:#e9ecef;">Matricula</label>
                    <input type="number" class="form-control is-invalid" id="matricula" required="" maxlength="10" disabled>
                </div>
                <div class="col-md-4">
                    <label for="tipo_usuario" class="form-label" style="color:#e9ecef;">Tipo de Usuario</label>
                    <select class="form-select is-invalid" id="tipo_usuario" required>
                        <option value="">Seleccionar</option>
                        <option value="alumno">Alumno</option>
                        <option value="docente">Docente</option>
                        <option value="administrativo">Administrativo</option>
                    </select>
                </div>
                <div class="col-14">
                    <button class="btn btn-primary" type="submit" disabled>Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once("footer.php");
?>
