<?php
require_once 'model/database.php';

$controller = 'cet'; //CAMBIADO por cliente

if(!isset($_REQUEST['cet'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->cetIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['cet']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'cetIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}