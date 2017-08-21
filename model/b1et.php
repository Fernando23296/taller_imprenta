<?php
class b1et
{
    private $pdo;

    public $idb1et;
    public $idordent;
    public $b1et_cod;
    public $b1et_fecha;
    public $b1et_cliente;
    public $b1et_trab;
    public $b1et_unid;
    public $b1et_mate;
    public $b1et_tama;
    public $b1et_cant;
    public $b1et_cortx;
    public $b1et_otros;
    public $b1et_obs;
    public $b1et_pask;



    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::Conectar();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1etListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b1et"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1etObtener($idb1et)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b1et WHERE idb1et = ?");


            $stm->execute(array($idb1et));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1etEliminar($idb1et)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b1et WHERE idb1et = ?");

            $stm->execute(array($idb1et));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1etActualizar($data)
    {
        try
        {
            $sql = "UPDATE b1et SET 
						idordent            =?,
						b1et_cod  =?,
						b1et_fecha  =?,
						b1et_cliente  =?,
						b1et_trab  =?,
						b1et_unid  =?,
						b1et_mate  =?,
						b1et_tama  =?,
						b1et_cant  =?,
						b1et_cortx  =?,
						b1et_otros  =?,
						b1et_obs  =?,
						b1et_pask  =?,
                        
                        
				    WHERE idb1et = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idordent,
                        $data->b1et_cod,
                        $data->b1et_fecha,
                        $data->b1et_cliente,
                        $data->b1et_trab,
                        $data->b1et_unid,
                        $data->b1et_mate,
                        $data->b1et_tama,
                        $data->b1et_cant,
                        $data->b1et_cortx,
                        $data->b1et_otros,
                        $data->b1et_obs,
                        $data->b1et_pask,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1etRegistrar(b1et $data)
    {
        try
        {
            $sql = "INSERT INTO b1et(idordent,
                        b1et_cod,
						b1et_fecha,
						b1et_cliente,
						b1et_trab,
						b1et_unid,
						b1et_mate,
						b1et_tama,
						b1et_cant,
						b1et_cortx,
						b1et_otros,
						b1et_obs,
						b1et_pask)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                          $data->idordent,
                        $data->b1et_cod,
                        $data->b1et_fecha,
                        $data->b1et_cliente,
                        $data->b1et_trab,
                        $data->b1et_unid,
                        $data->b1et_mate,
                        $data->b1et_tama,
                        $data->b1et_cant,
                        $data->b1et_cortx,
                        $data->b1et_otros,
                        $data->b1et_obs,
                        $data->b1et_pask,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}