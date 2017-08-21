<?php
require_once 'model/der.php';

class derController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new der();
    }

    public function derIndex(){
   
        require_once 'view/der/der.php';
  
    }

    public function derCrud(){
        $der = new der();
//cambiado el aer  y aerobtener
        if(isset($_REQUEST['idder'])){
            $der = $this->model->derObtener($_REQUEST['idder']);
        }

        
        require_once 'view/der/der-editar.php';
                require_once 'view/footer.php';
  
    }

    public function derGuardar(){
        $der = new der();

        $der->idder = $_REQUEST['idder'];
        $der->iddet= $_REQUEST['iddet'];
        $der->idempleado= $_REQUEST['idempleado'];
        $der->der_obs= $_REQUEST['der_obs'];

        $der->idder > 0
            ? $this->model->derActualizar($der)
            : $this->model->derRegistrar($der);

        header('Location: ider.php');
    }

    public function derEliminar(){
        $this->model->derEliminar($_REQUEST['idder']);
        header('Location: ider.php');
    }
}