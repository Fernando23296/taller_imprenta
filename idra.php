<?php
require_once 'model/database.php';

$controller = 'dra'; //CAMBIADO por cliente

if(!isset($_REQUEST['dra'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->draIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['dra']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'draIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}