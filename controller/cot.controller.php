<?php
require_once 'model/cot.php';

class cotController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new cot();
    }

    public function cotIndex(){
   
        require_once 'view/cot/cot.php';
  
    }


 public function cotCrud(){
        $cot = new cot();

        if(isset($_REQUEST['idcot'])){
            $cot = $this->model->cotObtener($_REQUEST['idcot']);
        }

        require_once 'view/cot/cot-editar.php';
             require_once 'view/footer.php';
  
    }
    public function cotGuardar(){
        $cot = new cot();

        $cot->idcot = $_REQUEST['idcot'];
        $cot->idcet= $_REQUEST['idcet'];
        $cot->cot_fecha= $_REQUEST['cot_fecha'];
        $cot->cot_hora= $_REQUEST['cot_hora'];
        $cot->cot_obs= $_REQUEST['cot_obs'];

        $cot->idcot > 0
            ? $this->model->cotActualizar($cot)
            : $this->model->cotRegistrar($cot);

        header('Location: icot.php');
    }

    public function cotEliminar(){
        $this->model->cotEliminar($_REQUEST['idcot']);
        header('Location: icot.php');
    }
}