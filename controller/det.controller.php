<?php
require_once 'model/det.php';

class detController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new det();
    }

    public function detIndex(){
   
        require_once 'view/det/det.php';
            require_once 'view/footer.php';
  
    }

    public function detCrud(){
        $det = new det();

        if(isset($_REQUEST['iddet'])){
            $det = $this->model->detObtener($_REQUEST['iddet']);
        }

        
        require_once 'view/det/det-editar.php';

    }

    public function detGuardar(){
        $det = new det();

        $det->iddet = $_REQUEST['idcet'];
        $det->idctf= $_REQUEST['idctf'];
        $det->det_fecha= $_REQUEST['det_fecha'];
        $det->det_nomenc= $_REQUEST['det_nomenc'];

        $det->iddet > 0
            ? $this->model->detActualizar($det)
            : $this->model->detRegistrar($det);

        header('Location: idet.php');
    }

    public function detEliminar(){
        $this->model->detEliminar($_REQUEST['iddet']);
        header('Location: idet.php');
    }
}