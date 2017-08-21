<?php
require_once 'model/atf.php';

class atfController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new atf();
    }

    public function atfIndex(){
   
        require_once 'view/atf/atf.php';
            require_once 'view/footer.php';
  
    }

    public function atfCrud(){
        $atf = new atf();

        if(isset($_REQUEST['idatf'])){
            $atf = $this->model->atfObtener($_REQUEST['idatf']);
        }

        
        require_once 'view/atf/atf-editar.php';

    }

    public function atfGuardar(){
        $atf = new atf();

        $atf->idatf = $_REQUEST['idatf'];
        $atf->idaet= $_REQUEST['idaet'];
        $atf->atf_nomenc= $_REQUEST['atf_nomenc'];
        $atf->atf_tipopl= $_REQUEST['atf_tipopl'];
        $atf->atf_tipoeq= $_REQUEST['atf_tipoeq'];
        $atf->atf_cant= $_REQUEST['atf_cant'];
        $atf->atf_rep= $_REQUEST['atf_rep'];
        $atf->atf_mor= $_REQUEST['atf_mor'];
        $atf->idatf > 0
            ? $this->model->atfActualizar($atf)
            : $this->model->atfRegistrar($atf);

        header('Location: iatf.php');
    }

    public function atfEliminar(){
        $this->model->atfEliminar($_REQUEST['idatf']);
        header('Location: iatf.php');
    }
}