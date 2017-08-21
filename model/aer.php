<?php
class aer
{
    private $pdo;

    public $idaer;
    public $idaet;
    public $idempleado;
    public $aer_obs;


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

    public function aerListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM aer"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
//cambiado aer por ara
    public function aerObtener($idaer)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM aer WHERE idaer = ?");


            $stm->execute(array($idaer));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aerEliminar($idaer)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM aer WHERE idaer = ?");

            $stm->execute(array($idaer));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aerActualizar($data)
    {
        try
        {
            $sql = "UPDATE aer SET 
						idaet       = ?,
                        idempleado        = ?,
                        aer_obs        = ?,
                        
				    WHERE idaer = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idaet,
                        $data->idempleado,
                        $data->aer_obs,
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aerRegistrar(aer $data)
    {
        try
        {
            $sql = "INSERT INTO aer(idaet,idempleado,aer_obs) 
		        VALUES ( ?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idaet,
                        $data->idempleado,
                        $data->aer_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}