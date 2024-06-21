<?php
require_once './models/Admin.php';

class AdminController {
    public function index() {
        $admins = Admin::getAll();
<<<<<<< HEAD
        require './views/admin/admin_list.php';
    }

    public function create() {
        require './views/admin/admin_create.php';
    }

    public function store() {
        $_POST['fecha_registro'] = date('Y-m-d H:i:s');
=======
        require './views/admin_list.php';
    }

    public function create() {
        require './views/admin_create.php';
    }

    public function store() {
>>>>>>> 76685700b59968b294da1a4825742862cdaabebb
        Admin::create($_POST);
        header('Location: index.php?controller=admin&action=index');
    }

    public function edit($id) {
        $admins = Admin::getAll();
        $admin = $admins[$id];
<<<<<<< HEAD
        require './views/admin/admin_edit.php';
=======
        require './views/admin_edit.php';
>>>>>>> 76685700b59968b294da1a4825742862cdaabebb
    }

    public function update($id) {
        Admin::update($id, $_POST);
        header('Location: index.php?controller=admin&action=index');
    }

    public function destroy($id) {
        Admin::delete($id);
        header('Location: index.php?controller=admin&action=index');
    }
}
?>
