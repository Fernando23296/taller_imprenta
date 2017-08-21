<?php
require_once 'model/database.php';

$controller = 'cea'; //CAMBIADO por cliente

if(!isset($_REQUEST['cea'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->ceaIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['cea']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ceaIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}