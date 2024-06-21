<?php
<<<<<<< HEAD
//require_once("./views/panel_structure.php");


$controller = isset($_GET['controller']) ? $_GET['controller'] : 'face';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
require_once "controllers/{$controller}Controller.php";
=======

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'admin';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

require_once "controllers/{$controller}Controller.php";

>>>>>>> 76685700b59968b294da1a4825742862cdaabebb
$controllerClass = ucfirst($controller) . 'Controller';
$controllerInstance = new $controllerClass();
$controllerInstance->$action(isset($_GET['id']) ? $_GET['id'] : null);
?>
<<<<<<< HEAD
    
=======
>>>>>>> 76685700b59968b294da1a4825742862cdaabebb
