<?php
class der
{
    private $pdo;

    public $idder;
    public $iddet;
    public $idempleado;
    public $der_obs;


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

    public function derListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM der"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
//cambiado aer por ara
    public function derObtener($idder)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM der WHERE idder = ?");


            $stm->execute(array($idder));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function derEliminar($idder)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM der WHERE idder = ?");

            $stm->execute(array($idder));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function derActualizar($data)
    {
        try
        {
            $sql = "UPDATE der SET 
						iddet       = ?,
                        idempleado        = ?,
                        der_obs        = ?,
                        
				    WHERE idder = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddet,
                        $data->idempleado,
                        $data->der_obs,
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function derRegistrar(der $data)
    {
        try
        {
            $sql = "INSERT INTO der(iddet,idempleado,der_obs) 
		        VALUES ( ?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddet,
                        $data->idempleado,
                        $data->der_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}