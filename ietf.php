<?php
require_once 'model/database.php';

$controller = 'atf'; //CAMBIADO por cliente

if(!isset($_REQUEST['atf'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->atfIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['atf']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'atfIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}