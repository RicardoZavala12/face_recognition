<?php
//require_once("./views/panel_structure.php");


$controller = isset($_GET['controller']) ? $_GET['controller'] : 'face';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
require_once "controllers/{$controller}Controller.php";
$controllerClass = ucfirst($controller) . 'Controller';
$controllerInstance = new $controllerClass();
$controllerInstance->$action(isset($_GET['id']) ? $_GET['id'] : null);
?>
    