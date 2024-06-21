<?php
require_once './models/Admin.php';

class AdminController {
    public function index() {
        $admins = Admin::getAll();
        require './views/admin/admin_list.php';
    }

    public function create() {
        require './views/admin/admin_create.php';
    }

    public function store() {
        $_POST['fecha_registro'] = date('Y-m-d H:i:s');
        Admin::create($_POST);
        header('Location: index.php?controller=admin&action=index');
    }

    public function edit($id) {
        $admins = Admin::getAll();
        $admin = $admins[$id];
        require './views/admin/admin_edit.php';
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
