<?php
require_once 'model/b1tf.php';

class b1tfController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new b1tf();
    }

    public function b1tfIndex(){
   
        require_once 'view/b1tf/b1tf.php';
            require_once 'view/footer.php';
  
    }

    public function b1tfCrud(){
        $b1tf = new b1tf();

        if(isset($_REQUEST['idb1tf'])){
            $b1tf = $this->model->b1tfObtener($_REQUEST['idb1tf']);
        }

        
        require_once 'view/b1tf/b1tf-editar.php';

    }

    public function b1tfGuardar(){
        $b1tf = new b1tf();

        $b1tf->idb1tf = $_REQUEST['idb1tf'];
        $b1tf->idb1et= $_REQUEST['idb1et'];
        $b1tf->b1tf_nomenc= $_REQUEST['b1tf_nomenc'];
        $b1tf->b1tf_pane= $_REQUEST['b1tf_pane'];
        $b1tf->b1tf_dem= $_REQUEST['b1tf_dem'];
        $b1tf->b1tf_tot= $_REQUEST['b1tf_tot'];
        $b1tf->b1tf_otrs= $_REQUEST['b1tf_otrs'];
        $b1tf->b1tf_obs= $_REQUEST['b1tf_obs'];
        $b1tf->idb1tf > 0
            ? $this->model->b1tfActualizar($b1tf)
            : $this->model->b1tfRegistrar($b1tf);

        header('Location: ib1tf.php');
    }

    public function b1tfEliminar(){
        $this->model->b1tfEliminar($_REQUEST['idb1tf']);
        header('Location: ib1tf.php');
    }
}