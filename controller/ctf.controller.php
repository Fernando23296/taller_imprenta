<?php
require_once 'model/ctf.php';

class ctfController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new ctf();
    }

    public function ctfIndex(){
   
        require_once 'view/ctf/ctf.php';
            require_once 'view/footer.php';
  
    }

    public function ctfCrud(){
        $ctf = new ctf();

        if(isset($_REQUEST['idctf'])){
            $ctf = $this->model->ctfObtener($_REQUEST['idctf']);
        }

        
        require_once 'view/ctf/ctf-editar.php';

    }

    public function ctfGuardar(){
        $ctf = new ctf();

        $ctf->idctf = $_REQUEST['idctf'];
        $ctf->idcet= $_REQUEST['idcet'];
        $ctf->ctf_nompimp= $_REQUEST['ctf_nompimp'];
        $ctf->ctf_fechaimp= $_REQUEST['ctf_fechaimp'];
        $ctf->ctf_hiimp= $_REQUEST['ctf_hiimp'];
        $ctf->ctf_obsimp= $_REQUEST['ctf_obsimp'];
        $ctf->ctf_nompnum= $_REQUEST['ctf_nompnum'];
        $ctf->ctf_fechanum= $_REQUEST['ctf_fechanum'];
        $ctf->ctf_hinum= $_REQUEST['ctf_hinum'];
        $ctf->ctf_hfnum= $_REQUEST['ctf_hfnum'];
        $ctf->ctf_nomtro= $_REQUEST['ctf_nomtro'];
        $ctf->ctf_fechatro= $_REQUEST['ctf_fechatro'];
        $ctf->ctf_hitro= $_REQUEST['ctf_hitro'];
        $ctf->ctf_hftro= $_REQUEST['ctf_hftro'];
        $ctf->idctf > 0
            ? $this->model->ctfActualizar($ctf)
            : $this->model->ctfRegistrar($ctf);

        header('Location: ictf.php');
    }

    public function ctfEliminar(){
        $this->model->ctfEliminar($_REQUEST['idctf']);
        header('Location: ictf.php');
    }
}