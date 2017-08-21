<?php
require_once 'model/database.php';

$controller = 'cer'; //CAMBIADO por cliente

if(!isset($_REQUEST['cer'])) //CAMBIADO por c
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->cerIndex();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['cer']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'cerIndex';

    // Instanciamoss el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}