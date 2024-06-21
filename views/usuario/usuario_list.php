<?php
include_once("./views/panel_structure.php");
?>

    <style>
        .custom-table {
            border-radius: 15px; /* Esquinas redondeadas */
            overflow: hidden; /* Asegura que las esquinas estén recortadas */
        }
    </style>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Usuarios</h1>

    <div class="container mt-5 mb-6" style="  position: relative;">
        <table class="table custom-table table-striped">
            <thead>
                <tr>
                    <th>Nombre del Usuario</th>
                    <th>Matricula</th>
                    <th>Tipo de Usuario</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            <?php if ($usuarios): ?>
                <?php foreach ($usuarios as $id => $usuario): ?>
            </thead>
            <tbody>
                <tr>
                    <td hidden><?php echo $id; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['matricula']; ?></td>
                    <td><?php echo $usuario['tipo_usuario']; ?></td>
                    <td><?php echo $usuario['fecha_registro']; ?></td>
                    <td>
                        <a href="index.php?controller=usuario&action=edit&id=<?php echo $id; ?>"><button class="btn btn-warning btn-sm custom-btn">Editar</button></a>
                        <a href="index.php?controller=usuario&action=destroy&id=<?php echo $id; ?>"><button class="btn btn-danger btn-sm custom-btn">Eliminar</button></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

