<form method="POST" action="index.php?controller=admin&action=update&id=<?php echo $_GET['id']; ?>"> 
    <label for="email">Email:</label> 
    <input type="email" name="email" value="<?php echo $admin['email']; ?>" required> 
    <button type="submit">Actualizar Admin</button> 
</form>
