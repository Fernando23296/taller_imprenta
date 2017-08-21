

<?php
require_once 'model/database.php';

$controller = 'b2ot';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['b2ot']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->b2otIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['b2ot']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'b2otIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}