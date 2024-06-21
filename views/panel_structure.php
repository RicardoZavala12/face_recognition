<?php
include_once("header.php");
?>
<style>

</style>
  <div class="sidebar" id="sidebar">
    <a href="<?php echo BTN_FACE_LIST;?>" class="d-block p-3 link-body-emphasis text-decoration-none" title="SofTec" data-bs-toggle="tooltip" data-bs-placement="right">
      <img src="/inte/assets/img/softec.png" alt="SofTec" width="40" height="37">
      <span class="visually-hidden">SofTec</span>
    </a>
    <ul class="nav flex-column">
            <li>
                <a href="<?php echo BTN_FACE_LIST;?>" class="nav-link py-3 rounded-0" title="Accesos" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Accesos"><use xlink:href="#speedometer2"/></svg>
                </a>
            </li>
            <li>
                <a href="<?php echo BTN_FACE_LIST;?>" class="nav-link py-3 rounded-0 dropdown-toggle" id="tablasRegistro" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Listas" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Listas"><use xlink:href="#table"/></svg>
                </a>
                <ul class="dropdown-menu" aria-labelledby="tablasRegistro" id="modal-content">
                    <li><a class="dropdown-item" href="<?php echo BTN_USUARIO_LIST;?>">Usuarios</a></li>
                    <li><a class="dropdown-item" href="<?php echo BTN_ADMIN_LIST;?>">Administradores</a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link py-3 rounded-0 dropdown-toggle" id="customerDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Registrar" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi pe-none" width="24" height="24" aria-label="Registrar"><use xlink:href="#people-circle"/></svg>
                </a>
                <ul class="dropdown-menu" aria-labelledby="customerDropdown" id="modal-content">
                    <li><a class="dropdown-item" href="<?php echo BTN_USUARIO_CREATE;?>">Registrar Usuario</a></li>
                    <li><a class="dropdown-item" href="<?php echo BTN_ADMIN_CREATE;?>">Registrar Administrador</a></li>
                </ul>
            </li>
        </ul>
      <script src="/inte/assets/js/assets.js"></script>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    navLinks.forEach(function(nav) {
                        nav.classList.remove('active');
                    });
                    this.classList.add('active');
                });
            });
        });
    </script>
      <div class="dropdown" >
        <a class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="/inte/assets/img/uttec.jpg" alt="mdo" width="24" height="24" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small shadow" id="modal-content">
          <li><a class="dropdown-item" href="http://localhost/inte/views/login.php">Cerrar sesión</a></li>
        </ul>
      </div>
  </div>



