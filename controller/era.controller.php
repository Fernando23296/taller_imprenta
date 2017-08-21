<?php
require_once 'model/ara.php';

class araController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new ara();
    }

    public function araIndex(){
   
        require_once 'view/ara/ara.php';
            require_once 'view/footer.php';
  
    }

    public function araCrud(){
        $ara = new ara();
///se cambio la parrte de ara, antes era aet
        if(isset($_REQUEST['idara'])){
            $ara = $this->model->aeaObtener($_REQUEST['idara']);
        }

        
        require_once 'view/ara/ara-editar.php';

    }

    public function araGuardar(){
        $ara = new ara();

        $ara->idara = $_REQUEST['idara'];
        $ara->ara_enca= $_REQUEST['ara_enca'];
        $ara->ara_codins= $_REQUEST['ara_codins'];
        $ara->ara_desins= $_REQUEST['ara_desins'];
        $ara->ara_cant= $_REQUEST['ara_cant'];
        $ara->ara_fecha= $_REQUEST['ara_fecha'];

        $ara->idara > 0
            ? $this->model->araActualizar($ara)
            : $this->model->araRegistrar($ara);

        header('Location: iara.php');
    }

    public function araEliminar(){
        $this->model->araEliminar($_REQUEST['idara']);
        header('Location: iara.php');
    }
}