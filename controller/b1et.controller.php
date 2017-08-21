<?php
require_once 'model/b1et.php';

class b1etController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b1et();
    }

    public function b1etIndex(){
   
        require_once 'view/b1et/b1et.php';
            require_once 'view/footer.php';
  
    }

    public function b1etCrud(){
        $b1et = new b1et();

        if(isset($_REQUEST['idb1et'])){
            $b1et = $this->model->b1etObtener($_REQUEST['idb1et']);
        }

        
        require_once 'view/b1et/b1et-editar.php';

    }

    public function b1etGuardar(){
        $b1et = new b1et();

        $b1et->idb1et = $_REQUEST['idb1et'];
        $b1et->idordent= $_REQUEST['idordent'];
        $b1et->b1et_cod= $_REQUEST['b1et_cod'];
        $b1et->b1et_fecha= $_REQUEST['b1et_fecha'];
        $b1et->b1et_cliente= $_REQUEST['b1et_cliente'];
        $b1et->b1et_trab= $_REQUEST['b1et_trab'];
        $b1et->b1et_unid= $_REQUEST['b1et_unid'];
        $b1et->b1et_mate= $_REQUEST['b1et_mate'];
        $b1et->b1et_tama= $_REQUEST['b1et_tama'];
        $b1et->b1et_cant= $_REQUEST['b1et_cant'];
        $b1et->b1et_cortx= $_REQUEST['b1et_cortx'];
        $b1et->b1et_otros= $_REQUEST['b1et_otros'];
        $b1et->b1et_obs= $_REQUEST['b1et_obs'];
        $b1et->b1et_pask= $_REQUEST['b1et_pask'];

        $b1et->idb1et > 0
            ? $this->model->b1etActualizar($b1et)
            : $this->model->b1etRegistrar($b1et);

        header('Location: ib1et.php');
    }

    public function b1etEliminar(){
        $this->model->b1etEliminar($_REQUEST['idb1et']);
        header('Location: ib1et.php');
    }
}