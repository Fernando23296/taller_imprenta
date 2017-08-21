<?php
require_once 'model/b1ea.php';

class b1eaController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b1ea();
    }

    public function b1eaIndex(){
   
        require_once 'view/b1ea/b1ea.php';
        require_once 'view/footer.php';
  
    }

    public function b1eaCrud(){
        $b1ea = new b1ea();

        if(isset($_REQUEST['idb1ea'])){
            $b1ea = $this->model->aeaObtener($_REQUEST['idbea']);
        }

        
        require_once 'view/b1ea/b1ea-editar.php';

    }
    

    public function b1eaGuardar(){
        $b1ea = new b1ea();

        $b1ea->idb1ea = $_REQUEST['idb1ea'];
        $b1ea->idb1et= $_REQUEST['idb1et'];
        $b1ea->b1ea_nomenc= $_REQUEST['b1ea_nomenc'];
        $b1ea->b1ea_codins= $_REQUEST['b1ea_codins'];
        $b1ea->b1ea_desins= $_REQUEST['b1ea_desins'];
        $b1ea->b1ea_cant= $_REQUEST['b1ea_cant'];
        $b1ea->b1ea_fecha= $_REQUEST['b1ea_fecha'];

        $b1ea->idb1ea > 0
            ? $this->model->b1eaActualizar($b1ea)
            : $this->model->b1eaRegistrar($b1ea);

        header('Location: ib1ea.php');
    }

    public function b1eaEliminar(){
        $this->model->b1eaEliminar($_REQUEST['idb1ea']);
        header('Location: ib1ea.php');
    }
}