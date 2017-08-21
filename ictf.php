<?php
require_once 'model/database.php';

$controller = 'ctf'; //CAMBIADO por cliente

if(!isset($_REQUEST['ctf'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->ctfIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['ctf']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'ctfIndex';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}