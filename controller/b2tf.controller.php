<?php
require_once 'model/b2tf.php';

class b2tfController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b2tf();
    }

    public function b2tfIndex(){
   
        require_once 'view/b2tf/b2tf.php';
            require_once 'view/footer.php';
  
    }

    public function b2tfCrud(){
        $b2tf = new b2tf();

        if(isset($_REQUEST['idb2tf'])){
            $b2tf = $this->model->b2tfObtener($_REQUEST['idb2tf']);
        }

        
        require_once 'view/b2tf/b2tf-editar.php';

    }

    public function b2tfGuardar(){
        $b2tf = new b2tf();

        $b2tf->idb2tf = $_REQUEST['idb2tf'];
        $b2tf->idb2et= $_REQUEST['idb2et'];
        $b2tf->b2tf_nomenc= $_REQUEST['b2tf_nomenc'];
        $b2tf->b2tf_fecha= $_REQUEST['b2tf_fecha'];
        $b2tf->b2tf_obs= $_REQUEST['b2tf_obs'];
        $b2tf->idb2tf > 0
            ? $this->model->b2tfActualizar($b2tf)
            : $this->model->b2tfRegistrar($b2tf);

        header('Location: ib2tf.php');
    }

    public function b2tfEliminar(){
        $this->model->b2tfEliminar($_REQUEST['idb2tf']);
        header('Location: ib2tf.php');
    }
}