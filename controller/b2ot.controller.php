<?php
require_once 'model/b2ot.php';

class b2otController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b2ot();
    }

    public function b2otIndex(){
   
        require_once 'view/b2ot/b2ot.php';
  
    }


 public function b2otCrud(){
        $b2ot = new b2ot();

        if(isset($_REQUEST['idb2ot'])){
            $b2ot = $this->model->b2otObtener($_REQUEST['idb2ot']);
        }

        require_once 'view/b2ot/b2ot-editar.php';
             require_once 'view/footer.php';
  
    }
    public function b2otGuardar(){
        $b2ot = new b2ot();

        $b2ot->idb2ot = $_REQUEST['idb2ot'];
        $b2ot->idb2et= $_REQUEST['idb2et'];
        $b2ot->b2ot_fecha= $_REQUEST['b2ot_fecha'];
        $b2ot->b2ot_hora= $_REQUEST['b2ot_hora'];
        $b2ot->b2ot_obs= $_REQUEST['b2ot_obs'];

        $b2ot->idb2ot > 0
            ? $this->model->b2otActualizar($b2ot)
            : $this->model->b2otRegistrar($b2ot);

        header('Location: ib2ot.php');
    }

    public function b2otEliminar(){
        $this->model->b2otEliminar($_REQUEST['idb2ot']);
        header('Location: ib2ot.php');
    }
}