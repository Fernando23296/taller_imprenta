

<?php
require_once 'model/database.php';

$controller = 'cot';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['cot']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->cotIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['cot']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'cotIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}