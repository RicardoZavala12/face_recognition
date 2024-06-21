<?php
require_once './models/Face.php';

class FaceController {
    public function index() {
        $faces = Face::getAll();
       // require './views/login/login.php';
          require './views/face/face_list.php';
    }
}
?>
