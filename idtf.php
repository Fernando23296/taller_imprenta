<?php
require_once 'model/database.php';

$controller = 'dtf'; //CAMBIADO por cliente

if(!isset($_REQUEST['dtf'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->dtfIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['dtf']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'dtfIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}