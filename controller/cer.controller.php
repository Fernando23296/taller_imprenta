<?php
require_once 'model/cer.php';

class cerController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new cer();
    }

    public function cerIndex(){
   
        require_once 'view/cer/cer.php';
  
    }

    public function cerCrud(){
        $cer = new cer();
//cambiado el aer  y aerobtener
        if(isset($_REQUEST['idcer'])){
            $cer = $this->model->cerObtener($_REQUEST['idcer']);
        }

        
        require_once 'view/cer/cer-editar.php';
                require_once 'view/footer.php';
  
    }

    public function cerGuardar(){
        $cer = new cer();

        $cer->idcer = $_REQUEST['idcer'];
        $cer->idcet= $_REQUEST['idcet'];
        $cer->idempleado= $_REQUEST['idempleado'];
        $cer->cer_obs= $_REQUEST['cer_obs'];

        $cer->idcer > 0
            ? $this->model->cerActualizar($cer)
            : $this->model->cerRegistrar($cer);

        header('Location: icer.php');
    }

    public function cerEliminar(){
        $this->model->cerEliminar($_REQUEST['idcer']);
        header('Location: icer.php');
    }
}