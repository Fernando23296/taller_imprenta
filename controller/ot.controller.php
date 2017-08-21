<?php
require_once 'model/ot.php';

class otController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new ot();
    }

    public function otIndex(){
      
        require_once 'view/ot/ot.php';
                require_once 'view/footer.php';
  
 
    }

    public function otCrud(){
        $ot= new ot();

        if(isset($_REQUEST['idordent'])){
            $recib = $this->model->RecibObtener($_REQUEST['idordent']);
        }

  
        require_once 'view/ot/ot.php';
        
    }

    public function otGuardar(){
        $ot = new ot();

        $ot->idordent = $_REQUEST['idordent'];
        $ot->fecha= $_REQUEST['fecha'];
        $ot->cliente= $_REQUEST['cliente'];
        $ot->trabajo= $_REQUEST['trabajo'];
        $ot->tamaño = $_REQUEST['tamaño'];
        $ot->cantidad = $_REQUEST['cantidad'];
        $ot->material = $_REQUEST['material'];
        $ot->color = $_REQUEST['color'];
        $ot->numeracion_i = $_REQUEST['numeracion_i'];
        $ot->numeracion_f = $_REQUEST['numeracion_f'];


        $ot->ot > 0
            ? $this->model->otActualizar($ot)
            : $this->model->otRegistrar($ot);

        header('Location: iot.php');
    }

    public function otEliminar(){
        $this->model->otEliminar($_REQUEST['idordent']);
        header('Location: iot.php');
    }
}