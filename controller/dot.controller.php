<?php
require_once 'model/dot.php';

class dotController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new dot();
    }

    public function dotIndex(){
   
        require_once 'view/dot/dot.php';
  
    }


 public function dotCrud(){
        $dot = new dot();

        if(isset($_REQUEST['iddot'])){
            $dot = $this->model->dotObtener($_REQUEST['iddot']);
        }

        require_once 'view/dot/dot-editar.php';
             require_once 'view/footer.php';
  
    }
    public function dotGuardar(){
        $dot = new dot();

        $dot->iddot = $_REQUEST['iddot'];
        $dot->iddet= $_REQUEST['iddet'];
        $dot->dot_fecha= $_REQUEST['dot_fecha'];
        $dot->dot_hora= $_REQUEST['dot_hora'];
        $dot->dot_obs= $_REQUEST['dot_obs'];

        $dot->iddot > 0
            ? $this->model->dotActualizar($dot)
            : $this->model->dotRegistrar($dot);

        header('Location: idot.php');
    }

    public function dotEliminar(){
        $this->model->dotEliminar($_REQUEST['iddot']);
        header('Location: idot.php');
    }
}