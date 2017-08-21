<?php
require_once 'model/b1ra.php';

class b1raController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b1ra();
    }

    public function b1raIndex(){
   
        require_once 'view/b1ra/b1ra.php';
            require_once 'view/footer.php';
  
    }

    public function b1raCrud(){
        $b1ra = new b1ra();

        if(isset($_REQUEST['idb1ra'])){
            $b1ra = $this->model->b1raObtener($_REQUEST['idb1ra']);
        }

        
        require_once 'view/b1ra/b1ra-editar.php';

    }

    public function b1raGuardar(){
        $b1ra = new b1ra();

        $b1ra->idb1ra = $_REQUEST['idb1ra'];
        $b1ra->b1ra_enca= $_REQUEST['b1ra_enca'];
        $b1ra->b1ra_codins= $_REQUEST['b1ra_codins'];
        $b1ra->b1ra_desins= $_REQUEST['b1ra_desins'];
        $b1ra->b1ra_cant= $_REQUEST['b1ra_cant'];
        $b1ra->b1ra_fecha= $_REQUEST['b1ra_fecha'];

        $b1ra->idb1ra > 0
            ? $this->model->b1raActualizar($b1ra)
            : $this->model->b1raRegistrar($b1ra);

        header('Location: iara.php');
    }

    public function b1raEliminar(){
        $this->model->b1raEliminar($_REQUEST['idb1sra']);
        header('Location: ib1ra.php');
    }
}