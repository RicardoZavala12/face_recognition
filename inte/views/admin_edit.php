<?php
include_once("panel_structure.php");
?>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Editar Administrador</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <form class="row g-4">
                <div class="col-md-4">
                    <label for="nombre_admin" class="form-label" style="color:#e9ecef;">Nombre completo</label>
                    <input type="text" class="form-control is-invalid" id="nombre_admin" required="">
                </div>
                <div class="col-md-4">
                    <label for="matricula" class="form-label" style="color:#e9ecef;">Matricula</label>
                    <input type="number" class="form-control is-invalid" id="matricula" required="" maxlength="10" disabled>
                </div>
                <div class="col-md-4">
                    <label for="email_admin" class="form-label" style="color:#e9ecef;">Email</label>
                    <input type="email" class="form-control is-invalid" id="email_admin" required="" disabled>
                </div>
                <div class="col-md-4">
                    <label for="contraseña" class="form-label" style="color:#e9ecef;">Password</label>
                    <input type="password" class="form-control is-invalid" id="contraseña" required="" maxlength="8" disabled>
                    
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
