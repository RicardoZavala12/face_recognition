<?php
include_once("header.php");
?>
<style>

</style>
  <div class="sidebar" id="sidebar">
    <a href="/" class="d-block p-3 link-body-emphasis text-decoration-none" title="SofTec" data-bs-toggle="tooltip" data-bs-placement="right">
      <img src="../assets/img/softec.png" alt="SofTec" width="40" height="37">
      <span class="visually-hidden">SofTec</span>
    </a>
      <ul class="nav nav-pills nav-flush flex-column mb-auto text-center border-top">

        <li>
          <a href="#" class="nav-link active py-3 rounded-0" title="Accesos" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Accesos"><use xlink:href="#speedometer2"/></svg>
          </a>
        </li>
  
        <li >
          <a href="#" class="nav-link py-3 rounded-0 dropdown-toggle" id="tablasRegistro" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Registros" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Registros"><use xlink:href="#table"/></svg>
          </a>
          <ul class="dropdown-menu" aria-labelledby="tablasRegistro" id="modal-content">
            <li><a class="dropdown-item" href="#">Usuarios</a></li>
            <li><a class="dropdown-item" href="#">Administradores</a></li>
          </ul>
          <a href="#" class="nav-link py-3 rounded-0 dropdown-toggle" id="customerDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Usuarios" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg class="bi pe-none" width="24" height="24" aria-label="Usuarios"><use xlink:href="#people-circle"/></svg>
          </a>
          <ul class="dropdown-menu" aria-labelledby="customerDropdown" id="modal-content">
            <li><a class="dropdown-item" href="http://localhost/inte/views/usuario_create.php">Registrar Usuario</a></li>
            <li><a class="dropdown-item" href="http://localhost/inte/views/admin_create.php">Registrar Adminnistrador</a></li>
          </ul>
        </li>
      </ul>
    
      <div class="dropdown" >
        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../assets/img/uttec.jpg" alt="mdo" width="24" height="24" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small shadow" id="modal-content">
          <li><a class="dropdown-item" href="http://localhost/inte/views/login.php">Cerrar sesión</a></li>
        </ul>
      </div>
  </div>



