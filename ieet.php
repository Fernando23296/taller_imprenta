<?php
require_once 'model/database.php';

$controller = 'eet'; //CAMBIADO por cliente

if(!isset($_REQUEST['eet'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->eetIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['eet']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'eetIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}