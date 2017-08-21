

<?php
require_once 'model/database.php';

$controller = 'aot';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['aot']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->aotIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['aot']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'aotIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}