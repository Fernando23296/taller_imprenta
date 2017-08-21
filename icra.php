<?php
require_once 'model/database.php';

$controller = 'cra'; //CAMBIADO por cliente

if(!isset($_REQUEST['cra'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->craIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['cra']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'craIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}