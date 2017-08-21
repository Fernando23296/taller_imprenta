<?php
require_once 'model/aer.php';

class aerController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new aer();
    }

    public function aerIndex(){
   
        require_once 'view/aer/aer.php';
  
    }

    public function aerCrud(){
        $aer = new aer();
//cambiado el aer  y aerobtener
        if(isset($_REQUEST['idaer'])){
            $aer = $this->model->aerObtener($_REQUEST['idaer']);
        }

        
        require_once 'view/aer/aer-editar.php';
                require_once 'view/footer.php';
  
    }

    public function aerGuardar(){
        $aer = new aer();

        $aer->idaer = $_REQUEST['idaer'];
        $aer->idaet= $_REQUEST['idaet'];
        $aer->idempleado= $_REQUEST['idempleado'];
        $aer->aer_obs= $_REQUEST['aer_obs'];

        $aer->idaer > 0
            ? $this->model->aerActualizar($aer)
            : $this->model->aerRegistrar($aer);

        header('Location: iaer.php');
    }

    public function aerEliminar(){
        $this->model->aerEliminar($_REQUEST['idaer']);
        header('Location: iaer.php');
    }
}