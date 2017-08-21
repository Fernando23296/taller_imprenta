<?php
require_once 'model/b1er.php';

class b1erController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b1er();
    }

    public function b1erIndex(){
   
        require_once 'view/b1er/b1er.php';
  
    }

    public function b1erCrud(){
        $b1er = new b1er();

        if(isset($_REQUEST['idb1er'])){
            $b1er = $this->model->b1erObtener($_REQUEST['idb1er']);
        }

        
        require_once 'view/b1er/b1er-editar.php';
                require_once 'view/footer.php';
  
    }

    public function b1erGuardar(){
        $b1er = new b1er();

        $b1er->idb1er = $_REQUEST['idb1er'];
        $b1er->idb1et= $_REQUEST['idb1et'];
        $b1er->idempleado= $_REQUEST['idempleado'];
        $b1er->b1er_obs= $_REQUEST['b1er_obs'];

        $b1er->idb1er > 0
            ? $this->model->b1erActualizar($b1er)
            : $this->model->b1erRegistrar($b1er);

        header('Location: ib1er.php');
    }

    public function b1erEliminar(){
        $this->model->b1erEliminar($_REQUEST['idb1er']);
        header('Location: ib1er.php');
    }
}