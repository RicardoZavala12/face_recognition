<?php
require_once './models/Login.php';

class Loginontroller {
    public function index() {
       //$logins = Login::getAll();
       // require './views/login/login.php';
          require './views/face_list.php';
    }

  /*  public function create() {
        require './views/admin_create.php';
    }

    public function store() {
        Admin::create($_POST);
        header('Location: index.php?controller=admin&action=index');
    }

    public function edit($id) {
        $admins = Admin::getAll();
        $admin = $admins[$id];
        require './views/admin_edit.php';
    }

    public function update($id) {
        Admin::update($id, $_POST);
        header('Location: index.php?controller=admin&action=index');
    }

    public function destroy($id) {
        Admin::delete($id);
        header('Location: index.php?controller=admin&action=index');
    }
    */
}
?>
