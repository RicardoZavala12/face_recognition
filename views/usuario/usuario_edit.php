<?php
include_once("./views/panel_structure.php");
?>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Editar Usuario</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <form class="row g-4" method="POST" action="index.php?controller=usuario&action=update&id=<?php echo $_GET['id']; ?>">
                <div class="form-group">

                </div>
                <div class="col-md-4">
                    <label for="nombre_admin" class="form-label" style="color:#e9ecef;">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre_admin" name="nombre" value="<?php echo $usuario['nombre']; ?>" required="">
                    <div class="invalid-feedback">Ingresa el nombre completo del Usuario.</div>
                </div>
                <div class="col-md-4">
                    <label for="matricula" class="form-label" style="color:#e9ecef;">Matricula</label>
                    <input type="number" class="form-control" id="matricula" name="matricula" value="<?php echo $usuario['matricula']; ?>" required="" maxlength="10">
                    <div class="invalid-feedback">La matrícula debe tener exactamente 10 caracteres numéricos.</div>
                </div>
                <div class="col-md-4">
                    <label for="tipo_usuario" class="form-label" style="color:#e9ecef;">Tipo de Usuario</label>
                    <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
                        <option value="">Seleccionar</option>
                        <option value="Alumno" <?php echo ($usuario['tipo_usuario'] == 'Alumno') ? 'selected' : ''; ?>>Alumno</option>
                        <option value="Docente" <?php echo ($usuario['tipo_usuario'] == 'Docente') ? 'selected' : ''; ?>>Docente</option>
                        <option value="Administrativo" <?php echo ($usuario['tipo_usuario'] == 'Administrativo') ? 'selected' : ''; ?>>Administrativo</option>
                    </select>
                </div>
                <input type="fecha_registro" hidden name="fecha_registro" value="<?php echo $usuario['fecha_registro']; ?>" readonly>
                <div class="col-14">
                    <a href="<?php echo BTN_USUARIO_LIST; ?>"><button class="btn btn-danger">Cancelar</button></a>
                    <button class="btn btn-success" type="submit" id="submitBtn" disabled>Guardar Cambios</button>
                </div>
            </form>
            <script src="/inte/assets/js/usuariofr.js"></script>
        </div>
    </div>
</div>