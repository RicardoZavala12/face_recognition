<?php
include_once("./views/panel_structure.php");
?>

    <style>
        .custom-table {
            border-radius: 15px; /* Esquinas redondeadas */
            overflow: hidden; /* Asegura que las esquinas estén recortadas */
        }
    </style>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Accesos</h1>

    <div class="container mt-5" style="  position: relative;">
        <table class="table custom-table table-striped">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Estatus</th>
                    <th>Fecha de Acceso</th>
                      <!--<th>Acciones</th>-->
                </tr>
                <?php
                    if ($faces) {
                        // Ordenar el array $faces por fecha y hora (campo 'timestamp') en orden descendente
                        usort($faces, function($a, $b) {
                            return strtotime($b['timestamp']) - strtotime($a['timestamp']);
                        });

                        // Mostrar los registros ordenados
                        foreach ($faces as $id => $face):
                    ?>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo ($face['name']); ?></td>
                    <td><?php echo ($face['status']); ?></td>
                    <td><?php echo ($face['timestamp']); ?></td>
                <!--   <td>
                        <button class="btn  btn-warning btn-sm custom-btn">Editar</button>
                        <button class="btn btn-danger btn-sm custom-btn">Eliminar</button>
                    </td> -->
                </tr>
                <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>