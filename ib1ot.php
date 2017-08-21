

<?php
require_once 'model/database.php';

$controller = 'b1ot';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['b1ot']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->b1otIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['b1ot']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'b1otIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}