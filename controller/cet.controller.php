<?php
require_once 'model/cet.php';

class cetController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new cet();
    }

    public function cetIndex(){
   
        require_once 'view/cet/cet.php';
            require_once 'view/footer.php';
  
    }

    public function cetCrud(){
        $cet = new cet();

        if(isset($_REQUEST['idcet'])){
            $cet = $this->model->cetObtener($_REQUEST['idcet']);
        }

        
        require_once 'view/cet/cet-editar.php';

    }

    public function cetGuardar(){
        $cet = new cet();

        $cet->idcet = $_REQUEST['idcet'];
        $cet->idatf= $_REQUEST['idatf'];
        $cet->idb1tf= $_REQUEST['idb1tf'];
        $cet->cet_fecha= $_REQUEST['cet_fecha'];
        $cet->cet_nomenc= $_REQUEST['cet_nomenc'];

        $cet->idcet > 0
            ? $this->model->cetActualizar($cet)
            : $this->model->cetRegistrar($cet);

        header('Location: icet.php');
    }

    public function cetEliminar(){
        $this->model->cetEliminar($_REQUEST['idcet']);
        header('Location: icet.php');
    }
}