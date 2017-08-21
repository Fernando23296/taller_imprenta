<?php
require_once 'model/database.php';

$controller = 'Recib'; //CAMBIADO por cliente

if(!isset($_REQUEST['r'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->RecibIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['r']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'RecibIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}