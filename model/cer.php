<?php
class cer
{
    private $pdo;

    public $idcer;
    public $idcet;
    public $idempleado;
    public $cer_obs;


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

    public function cerListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM cer"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
//cambiado aer por ara
    public function cerObtener($idcer)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM cer WHERE idcer = ?");


            $stm->execute(array($idcer));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cerEliminar($idcer)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM cer WHERE idcer = ?");

            $stm->execute(array($idcer));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cerActualizar($data)
    {
        try
        {
            $sql = "UPDATE cer SET 
						idcet       = ?,
                        idempleado        = ?,
                        cer_obs        = ?,
                        
				    WHERE idcer = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idcet,
                        $data->idempleado,
                        $data->cer_obs,
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cerRegistrar(cer $data)
    {
        try
        {
            $sql = "INSERT INTO cer(idcet,idempleado,cer_obs) 
		        VALUES ( ?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idcet,
                        $data->idempleado,
                        $data->cer_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}