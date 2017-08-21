

<?php
require_once 'model/database.php';

$controller = 'dot';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['dot']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->dotIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['dot']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'dotIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}