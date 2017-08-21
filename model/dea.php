<?php
class dea
{
    private $pdo;

    public $iddea;
    public $iddet;
    public $dea_nomenc;
    public $dea_codins;
    public $dea_desins;
    public $dea_cant;
    public $dea_fecha;



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

    public function deaListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM dea"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function deaObtener($iddea)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM dea WHERE iddea = ?");


            $stm->execute(array($iddea));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function deaEliminar($iddea)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM dea WHERE iddea = ?");

            $stm->execute(array($iddea));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function deaActualizar($data)
    {
        try
        {
            $sql = "UPDATE dea SET 
						idcet            =?,
						dea_nomenc       = ?,
                        dea_codins        = ?,
                        dea_desins        = ?,
                        dea_cant        = ?,
                        dea_fecha        = ?,
                        
				    WHERE iddea = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddet,
                        $data->dea_nomenc,
                        $data->dea_codins,
                        $data->dea_desins,
                        $data->dea_cant,
                        $data->dea_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function deaRegistrar(dea $data)
    {
        try
        {
            $sql = "INSERT INTO dea(iddet,dea_nomenc,dea_codins,dea_desins,dea_cant,dea_fecha) 
		        VALUES ( ?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddet,
                        $data->dea_nomenc,
                        $data->dea_codins,
                        $data->dea_desins,
                        $data->dea_cant,
                        $data->dea_fecha,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}