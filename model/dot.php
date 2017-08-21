<?php
class dot
{
    private $pdo;

    public $iddot;
    public $iddet;
    public $dot_fecha;
    public $dot_hora;
    public $dot_obs;



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

    public function dotListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM dot"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function dotObtener($iddot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM dot WHERE iddot = ?");


            $stm->execute(array($iddot));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function dotEliminar($iddot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM dot WHERE iddot = ?");

            $stm->execute(array($iddot));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function dotActualizar($data)
    {
        try
        {
            $sql = "UPDATE dot SET 
						iddet            =?,
						dot_fecha       = ?,
                        dot_hora        = ?,
                        dot_obs        = ?,
                        
				    WHERE iddot = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddet,
                        $data->dot_fecha,
                        $data->dot_hora,
                        $data->dot_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function dotRegistrar(dot $data)
    {
        try
        {
            $sql = "INSERT INTO dot(iddet,dot_fecha,dot_hora,dot_obs) 
		        VALUES ( ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddet,
                        $data->dot_fecha,
                        $data->dot_hora,
                        $data->dot_obs,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}