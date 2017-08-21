<?php
require_once 'model/recib.php';

class RecibController{

    private $model;

    public function __CONSTRUCT(){
        $this ->model = new Recib();
    }

    public function RecibIndex(){
        require_once 'view/header.php';
        require_once 'view/recib/recib.php';
        require_once 'view/footer.php';
    }

    public function RecibCrud(){
        $recib = new Recib();

        if(isset($_REQUEST['idalmacen_rec'])){
            $recib = $this->model->RecibObtener($_REQUEST['idalmacen_rec']);
        }

        require_once 'view/header.php';
        require_once 'view/recib/recib-editar.php';
        require_once 'view/footer.php';
    }

    public function RecibGuardar(){
        $recib = new Tabfq();

        $recib->idalmacen_rec = $_REQUEST['idalmacen_rec'];
        $recib->enc_almacen= $_REQUEST['enc_almacen'];
        $recib->cod_insumo= $_REQUEST['cod_insumo'];
        $recib->nom_insumo= $_REQUEST['nom_insumo'];
        $recib->des_insumo = $_REQUEST['des_insumo'];
        $recib->cantidad = $_REQUEST['cantidad'];
        $recib->fecha = $_REQUEST['fecha'];


        $recib->idalmacen_rec > 0
            ? $this->model->RecibActualizar($recib)
            : $this->model->RecibRegistrar($recib);

        header('Location: indexrecib.php');
    }

    public function RecibEliminar(){
        $this->model->RecibEliminar($_REQUEST['idalmacen_rec']);
        header('Location: indexrecib.php');
    }
}