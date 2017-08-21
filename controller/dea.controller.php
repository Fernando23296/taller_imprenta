<?php
require_once 'model/dea.php';

class deaController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new dea();
    }

    public function deaIndex(){
   
        require_once 'view/dea/dea.php';
        require_once 'view/footer.php';
  
    }

    public function deaCrud(){
        $dea = new dea();

        if(isset($_REQUEST['iddea'])){
            $dea = $this->model->deaObtener($_REQUEST['iddea']);
        }

        
        require_once 'view/dea/dea-editar.php';

    }
    

    public function deaGuardar(){
        $dea = new dea();

        $dea->iddea = $_REQUEST['iddea'];
        $dea->iddet= $_REQUEST['iddet'];
        $dea->dea_nomenc= $_REQUEST['dea_nomenc'];
        $dea->dea_codins= $_REQUEST['dea_codins'];
        $dea->dea_desins= $_REQUEST['dea_desins'];
        $dea->dea_cant= $_REQUEST['dea_cant'];
        $dea->dea_fecha= $_REQUEST['dea_fecha'];

        $dea->iddea > 0
            ? $this->model->deaActualizar($dea)
            : $this->model->deaRegistrar($dea);

        header('Location: idea.php');
    }

    public function deaEliminar(){
        $this->model->deaEliminar($_REQUEST['iddea']);
        header('Location: idea.php');
    }
}