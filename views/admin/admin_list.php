<?php
include_once("./views/panel_structure.php");
?>

    <style>
        .custom-table {
            border-radius: 15px; /* Esquinas redondeadas */
            overflow: hidden; /* Asegura que las esquinas estén recortadas */
        }
    </style>
<h1 style="position: absolute; top: 70px; left: 100px; color: #ffffff; text-shadow: 2px 2px 4px #007bff;">Administradores</h1>

    <div class="container mt-1 mb-6" style="  position: relative;">
        <table class="table custom-table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Matricula</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($admins): ?>
                <?php foreach ($admins as $id => $admin): ?>
                <tr>
                    <td hidden><?php echo $id; ?></td>
                    <td><?php echo $admin['nombre']; ?></td>
                    <td><?php echo $admin['matricula']; ?></td>
                    <td><?php echo $admin['email']; ?></td>
                    <td><?php echo $admin['fecha_registro']; ?></td>
                    <td>
                        <a href="index.php?controller=admin&action=edit&id=<?php echo $id; ?>"><button class="btn btn-warning btn-sm custom-btn">Editar</button></a>
                        <a href="index.php?controller=admin&action=destroy&id=<?php echo $id; ?>"><button class="btn btn-danger btn-sm custom-btn">Eliminar</button></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

