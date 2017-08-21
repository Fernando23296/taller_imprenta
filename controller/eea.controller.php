<?php
require_once 'model/aea.php';

class aeaController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new aea();
    }

    public function aeaIndex(){
   
        require_once 'view/aea/aea.php';
        require_once 'view/footer.php';
  
    }

    public function aeaCrud(){
        $aea = new aea();

        if(isset($_REQUEST['idaea'])){
            $aea = $this->model->aeaObtener($_REQUEST['idaea']);
        }

        
        require_once 'view/aea/aea-editar.php';

    }
    

    public function aeaGuardar(){
        $aea = new aea();

        $aea->idaea = $_REQUEST['idaea'];
        $aea->idaet= $_REQUEST['idaet'];
        $aea->aea_nomenc= $_REQUEST['aea_nomenc'];
        $aea->aea_codins= $_REQUEST['aea_codins'];
        $aea->aea_desins= $_REQUEST['aea_desins'];
        $aea->aea_cant= $_REQUEST['aea_cant'];
        $aea->aea_fecha= $_REQUEST['aea_fecha'];

        $aea->idaea > 0
            ? $this->model->aeaActualizar($aea)
            : $this->model->aeaRegistrar($aea);

        header('Location: iaea.php');
    }

    public function aeaEliminar(){
        $this->model->aeaEliminar($_REQUEST['idaea']);
        header('Location: iaea.php');
    }
}