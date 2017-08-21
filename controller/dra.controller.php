<?php
require_once 'model/dra.php';

class draController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new dra();
    }

    public function draIndex(){
   
        require_once 'view/dra/dra.php';
            require_once 'view/footer.php';
  
    }

    public function draCrud(){
        $dra = new dra();
///se cambio la parrte de ara, antes era aet
        if(isset($_REQUEST['iddra'])){
            $dra = $this->model->draObtener($_REQUEST['iddra']);
        }

        
        require_once 'view/dra/dra-editar.php';

    }

    public function draGuardar(){
        $dra = new dra();

        $dra->iddra = $_REQUEST['iddra'];
        $dra->dra_enca= $_REQUEST['dra_enca'];
        $dra->dra_codins= $_REQUEST['dra_codins'];
        $dra->dra_desins= $_REQUEST['dra_desins'];
        $dra->dra_cant= $_REQUEST['dra_cant'];
        $dra->dra_fecha= $_REQUEST['dra_fecha'];

        $dra->iddra > 0
            ? $this->model->draActualizar($dra)
            : $this->model->draRegistrar($dra);

        header('Location: idra.php');
    }

    public function draEliminar(){
        $this->model->draEliminar($_REQUEST['iddra']);
        header('Location: idra.php');
    }
}