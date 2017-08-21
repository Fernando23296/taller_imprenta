<?php
require_once 'model/cra.php';

class craController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new cra();
    }

    public function craIndex(){
   
        require_once 'view/cra/cra.php';
            require_once 'view/footer.php';
  
    }

    public function craCrud(){
        $cra = new cra();
///se cambio la parrte de ara, antes era aet
        if(isset($_REQUEST['idcra'])){
            $cra = $this->model->craObtener($_REQUEST['idcra']);
        }

        
        require_once 'view/cra/cra-editar.php';

    }

    public function araGuardar(){
        $cra = new cra();

        $cra->idcra = $_REQUEST['idcra'];
        $cra->cra_enca= $_REQUEST['cra_enca'];
        $cra->cra_codins= $_REQUEST['cra_codins'];
        $cra->cra_desins= $_REQUEST['cra_desins'];
        $cra->cra_cant= $_REQUEST['cra_cant'];
        $cra->cra_fecha= $_REQUEST['cra_fecha'];

        $cra->idcra > 0
            ? $this->model->craActualizar($cra)
            : $this->model->craRegistrar($cra);

        header('Location: icra.php');
    }

    public function craEliminar(){
        $this->model->craEliminar($_REQUEST['idcra']);
        header('Location: icra.php');
    }
}