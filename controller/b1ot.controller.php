<?php
require_once 'model/b1ot.php';

class b1otController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b1ot();
    }

    public function b1otIndex(){
   
        require_once 'view/b1ot/b1ot.php';
  
    }


 public function b1otCrud(){
        $b1ot = new b1ot();

        if(isset($_REQUEST['idb1ot'])){
            $b1ot = $this->model->b1otObtener($_REQUEST['idb1ot']);
        }

        require_once 'view/b1ot/b1ot-editar.php';
             require_once 'view/footer.php';
  
    }
    public function b1otGuardar(){
        $b1ot = new b1ot();

        $b1ot->idb1ot = $_REQUEST['idb1ot'];
        $b1ot->idb1et= $_REQUEST['idb1et'];
        $b1ot->b1ot_fecha= $_REQUEST['b1ot_fecha'];
        $b1ot->b1ot_hora= $_REQUEST['b1ot_hora'];
        $b1ot->b1ot_obs= $_REQUEST['b1ot_obs'];

        $b1ot->idb1ot > 0
            ? $this->model->b1otActualizar($b1ot)
            : $this->model->b1otRegistrar($b1ot);

        header('Location: ib1ot.php');
    }

    public function b1otEliminar(){
        $this->model->b1otEliminar($_REQUEST['idb1ot']);
        header('Location: ib1ot.php');
    }
}