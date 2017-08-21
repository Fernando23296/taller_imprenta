<?php
require_once 'model/aot.php';

class aotController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new aot();
    }

    public function aotIndex(){
   
        require_once 'view/aot/aot.php';
  
    }


 public function aotCrud(){
        $aot = new aot();

        if(isset($_REQUEST['idaot'])){
            $aot = $this->model->aotObtener($_REQUEST['idaot']);
        }

        require_once 'view/aot/aot-editar.php';
             require_once 'view/footer.php';
  
    }
    public function aotGuardar(){
        $aot = new aot();

        $aot->idaot = $_REQUEST['idaot'];
        $aot->idaet= $_REQUEST['idaet'];
        $aot->aot_fecha= $_REQUEST['aot_fecha'];
        $aot->aot_hora= $_REQUEST['aot_hora'];
        $aot->aot_obs= $_REQUEST['aot_obs'];

        $aot->idaot > 0
            ? $this->model->aotActualizar($aot)
            : $this->model->aotRegistrar($aot);

        header('Location: iaot.php');
    }

    public function aotEliminar(){
        $this->model->aotEliminar($_REQUEST['idaot']);
        header('Location: iaot.php');
    }
}