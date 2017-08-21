<?php
require_once 'model/aet.php';

class aetController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new aet();
    }

    public function aetIndex(){
   
        require_once 'view/aet/aet.php';
            require_once 'view/footer.php';
  
    }

    public function aetCrud(){
        $aet = new aet();

        if(isset($_REQUEST['idaet'])){
            $aet = $this->model->aetObtener($_REQUEST['idaet']);
        }

        
        require_once 'view/aet/aet-editar.php';

    }

    public function aetGuardar(){
        $aet = new aet();

        $aet->idaet = $_REQUEST['idaet'];
        $aet->idordent= $_REQUEST['idordent'];
        $aet->aet_fechai= $_REQUEST['aet_fechai'];
        $aet->aet_nomenc= $_REQUEST['aet_nomenc'];

        $aet->idaet > 0
            ? $this->model->aetActualizar($aet)
            : $this->model->aetRegistrar($aet);

        header('Location: iaet.php');
    }

    public function aetEliminar(){
        $this->model->aetEliminar($_REQUEST['idaet']);
        header('Location: iaet.php');
    }
}