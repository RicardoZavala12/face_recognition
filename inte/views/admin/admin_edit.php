<?php
include_once("./views/panel_structure.php");
?>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Editar Administrador</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <form class="row g-4" method="POST" action="index.php?controller=admin&action=update&id=<?php echo $_GET['id']; ?>">
                <div class="col-md-4">
                    <label for="nombre_admin" class="form-label" style="color:#e9ecef;">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre_admin" name="nombre" value="<?php echo $admin['nombre']; ?>" required>
                    <div class="invalid-feedback">Ingrese el nombre completo del Administrador.</div>
                </div>
                <div class="col-md-4">
                    <label for="matricula" class="form-label" style="color:#e9ecef;">Matricula</label>
                    <input type="number" class="form-control" id="matricula" name="matricula" value="<?php echo $admin['matricula']; ?>" required maxlength="10">
                    <div class="invalid-feedback">La matrícula debe tener exactamente 10 caracteres numéricos.</div>

                </div>
                <div class="col-md-4">
                    <label for="email_admin" class="form-label" style="color:#e9ecef;">Email</label>
                    <input type="email" class="form-control" id="email_admin" name="email" value="<?php echo $admin['email']; ?>" required>
                    <div class="invalid-feedback">Ingresa un email válido.</div>
                </div>
                <div class="col-md-4">
                    <label for="contraseña" class="form-label" style="color:#e9ecef;">Password</label>
                    <input type="password" class="form-control " id="contraseña" name="password" value="<?php echo $admin['password']; ?>" required maxlength="12">
                    <div class="invalid-feedback">La contraseña debe tener exactamente 12 caracteres.</div>
                    <input type="fecha_registro" hidden name="fecha_registro" value="<?php echo $admin['fecha_registro']; ?>" required readonly>
                </div>
                <div class="col-14">
                    <a href="<?php echo BTN_ADMIN_LIST; ?>"><button class="btn btn-danger">Cancelar</button></a>
                    <button class="btn btn-success" type="submit" id="submitBtn" disabled>Guardar Cambios</button>
                </div>
            </form>
            <script src="/inte/assets/js/adminfr.js"></script>
        </div>
    </div>
</div>