<?php
require_once 'model/b2er.php';

class b2erController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b2er();
    }

    public function b2erIndex(){
   
        require_once 'view/b2er/b2er.php';
  
    }

    public function b2erCrud(){
        $b2er = new b2er();
//cambiado el aer  y aerobtener
        if(isset($_REQUEST['idb2er'])){
            $b2er = $this->model->b2erObtener($_REQUEST['idb2er']);
        }

        
        require_once 'view/b2er/b2er-editar.php';
                require_once 'view/footer.php';
  
    }

    public function b2erGuardar(){
        $b2er = new b2er();

        $b2er->idb2er = $_REQUEST['idb2er'];
        $b2er->idb2et= $_REQUEST['idb2et'];
        $b2er->idempleado= $_REQUEST['idempleado'];
        $b2er->b2er_obs= $_REQUEST['b2er_obs'];

        $b2er->idb2er > 0
            ? $this->model->b2erActualizar($b2er)
            : $this->model->b2erRegistrar($b2er);

        header('Location: ib2er.php');
    }

    public function b2erEliminar(){
        $this->model->b2erEliminar($_REQUEST['idb2er']);
        header('Location: ib2er.php');
    }
}