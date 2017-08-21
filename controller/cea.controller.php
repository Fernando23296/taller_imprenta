<?php
require_once 'model/cea.php';

class ceaController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new cea();
    }

    public function ceaIndex(){
   
        require_once 'view/cea/cea.php';
        require_once 'view/footer.php';
  
    }

    public function ceaCrud(){
        $cea = new cea();

        if(isset($_REQUEST['idcea'])){
            $cea = $this->model->ceaObtener($_REQUEST['idcea']);
        }

        
        require_once 'view/cea/cea-editar.php';

    }
    

    public function ceaGuardar(){
        $cea = new cea();

        $cea->idcea = $_REQUEST['idcea'];
        $cea->idcet= $_REQUEST['idcet'];
        $cea->cea_nomenc= $_REQUEST['cea_nomenc'];
        $cea->cea_codins= $_REQUEST['cea_codins'];
        $cea->cea_desins= $_REQUEST['cea_desins'];
        $cea->cea_cant= $_REQUEST['cea_cant'];
        $cea->cea_fecha= $_REQUEST['cea_fecha'];

        $cea->idcea > 0
            ? $this->model->ceaActualizar($cea)
            : $this->model->ceaRegistrar($cea);

        header('Location: icea.php');
    }

    public function ceaEliminar(){
        $this->model->ceaEliminar($_REQUEST['idcea']);
        header('Location: icea.php');
    }
}