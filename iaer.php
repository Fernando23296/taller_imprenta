<?php
require_once 'model/database.php';

$controller = 'aer'; //CAMBIADO por cliente

if(!isset($_REQUEST['aer'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->aerIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['aer']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'aerIndex';

    // Instanciamoss el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}