<?php
require_once 'model/database.php';

$controller = 'b2tf'; //CAMBIADO por cliente

if(!isset($_REQUEST['b2tf'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->b2tfIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['b2tf']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'b2tfIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}