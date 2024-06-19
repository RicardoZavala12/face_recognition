<?php
include_once("panel_structure.php");
?>

    <style>
        .custom-table {
            border-radius: 15px; /* Esquinas redondeadas */
            overflow: hidden; /* Asegura que las esquinas estén recortadas */
        }
    </style>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Accesos</h1>

    <div class="container mt-1 mb-6" style="  position: relative;">
        <table class="table custom-table table-striped">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Estatus</th>
                    <th>Fecha de Acceso</th>
                      <!--<th>Acciones</th>-->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Juan Pérez</td>
                    <td>juan.perez@example.com</td>
                <!--   <td>
                        <button class="btn btn-warning btn-sm custom-btn">Editar</button>
                        <button class="btn btn-danger btn-sm custom-btn">Eliminar</button>
                    </td> -->
                </tr>
            </tbody>
        </table>
    </div>


    
    <?php
include_once("footer.php");
?>