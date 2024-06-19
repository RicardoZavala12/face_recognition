<?php
include_once("header.php");
?>

<img src="../assets/img/softec.png" alt="SofTec" class="falling-img"> 
<body>  
  <div class="container">
    <!-- Botón para abrir el modal -->
    <br><br><br>
    <h1 class="falling-txt" style="font-size: 40px; color: white; border: 12px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); padding-top: 7.3%;">SecureFace</h1>
    <h3 class="falling-txt"  style="font-size: 40px; color: white; border: 12px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); padding-top: 9%;">PANEL ADMINISTRATIVO</h3>
    <button id="falling-btn" type="button" class="btn btn-info" data-bs-toggle="modal" style="color: white" data-bs-target="#exampleModal">
      <b>Acceder al panel</b>
    </button>
    <?php
include_once("footer.php");
?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color: white; text-align: center">LOGIN</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- Contenido del formulario - LOGIN -->
          <form id="formParte1" style="color: white; display: flex; flex-direction: column; align-items: center;">
          <div class="row mb-3" title="Login IMG">
            <svg class="w-40 h-40 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div class="row mb-3" title="Email del administrador">
            <div class="col-sm-5" style="width: 100%;">  <input type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
          </div>
        </div>
        <div class="row mb-3" title="Contraseña">
          <div class="col-sm-5" style="width: 100%;">  <input type="password" class="form-control" name="pass" placeholder="Contraseña" id="pass" required>
        </div>
      </div>
      <a href="http://localhost/inte/views/admin_create.php"><button style="color: white" type="button" class="btn btn-info" id="btnSiguiente" >Iniciar</button></a>
    </form>
  </div>
</div>
  <script src="../assets/css/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="./assets/css/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="../assets/js/assets.js"></script>
  <script src="./assets/js/assets.js"></script>



