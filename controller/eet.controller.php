<?php
require_once 'model/eet.php';

class eetController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new eet();
    }

    public function eetIndex(){
   
        require_once 'view/eet/eet.php';
            require_once 'view/footer.php';
  
    }

    public function eetCrud(){
        $eet = new eet();

        if(isset($_REQUEST['ideet'])){
            $eet = $this->model->eetObtener($_REQUEST['ideet']);
        }

        
        require_once 'view/eet/eet-editar.php';

    }

    public function eetGuardar(){
        $eet = new eet();

        $eet->ideet = $_REQUEST['ideet'];
        $eet->iddtf= $_REQUEST['iddtf'];
        $eet->idb2tf= $_REQUEST['idb2tf'];
        $eet->eet_fecha= $_REQUEST['eet_fecha'];
        $eet->eet_nomenc= $_REQUEST['eet_nomenc'];

        $eet->ideet > 0
            ? $this->model->eetActualizar($eet)
            : $this->model->eetRegistrar($eet);

        header('Location: ieet.php');
    }

    public function eetEliminar(){
        $this->model->eetEliminar($_REQUEST['ideet']);
        header('Location: ieet.php');
    }
}