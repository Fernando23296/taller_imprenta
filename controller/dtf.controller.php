<?php
require_once 'model/dtf.php';

class dtfController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new dtf();
    }

    public function dtfIndex(){
   
        require_once 'view/dtf/dtf.php';
            require_once 'view/footer.php';
  
    }

    public function dtfCrud(){
        $dtf = new dtf();

        if(isset($_REQUEST['iddtf'])){
            $dtf = $this->model->dtfObtener($_REQUEST['iddtf']);
        }

        
        require_once 'view/dtf/dtf-editar.php';

    }

    public function dtfGuardar(){
        $dtf = new dtf();

        $dtf->iddtf = $_REQUEST['iddtf'];
        $dtf->iddet= $_REQUEST['iddet'];
        $dtf->dtf_nomenc= $_REQUEST['dtf_nomenc'];
        $dtf->dtf_revfech= $_REQUEST['dtf_revfech'];
        $dtf->dtf_compfech= $_REQUEST['dtf_compfech'];
        $dtf->dtf_embfech= $_REQUEST['dtf_embfech'];
        $dtf->dtf_empafech= $_REQUEST['dtf_empafech'];
        $dtf->dtf_hitrab= $_REQUEST['dtf_hitrab'];
        $dtf->dtf_hftrab= $_REQUEST['dtf_hftrab'];
        $dtf->iddtf > 0
            ? $this->model->dtfActualizar($dtf)
            : $this->model->dtfRegistrar($dtf);

        header('Location: idtf.php');
    }

    public function dtfEliminar(){
        $this->model->dtfEliminar($_REQUEST['iddtf']);
        header('Location: idtf.php');
    }
}