<a href="index.php?controller=admin&action=create">Crear Admin</a>
<table>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    <?php if ($admins): ?>
        <?php foreach ($admins as $id => $admin): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $admin['email']; ?></td>
                <td>
                    <a href="index.php?controller=admin&action=edit&id=<?php echo $id; ?>">Editar</a>
                    <a href="index.php?controller=admin&action=destroy&id=<?php echo $id; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
