<?php
require_once 'model/b2et.php';

class b2etController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b2et();
    }

    public function b2etIndex(){
   
        require_once 'view/b2et/b2et.php';
            require_once 'view/footer.php';
  
    }

    public function b2etCrud(){
        $b2et = new b2et();

        if(isset($_REQUEST['idb2et'])){
            $b2et = $this->model->b2etObtener($_REQUEST['idb2et']);
        }

        
        require_once 'view/b2et/b2et-editar.php';

    }

    public function b2etGuardar(){
        $b2et = new b2et();

        $b2et->idb2et = $_REQUEST['idb2et'];
        $b2et->iddtf= $_REQUEST['iddtf'];
        $b2et->b2et_fecha= $_REQUEST['b2et_fecha'];
        $b2et->b2et_nomenc= $_REQUEST['b2et_nomenc'];

        $b2et->idb2et > 0
            ? $this->model->b2etActualizar($b2et)
            : $this->model->b2etRegistrar($b2et);

        header('Location: ib2et.php');
    }

    public function b2etEliminar(){
        $this->model->b2etEliminar($_REQUEST['idb2et']);
        header('Location: ib2et.php');
    }
}