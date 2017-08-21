<?php
class b1er
{
    private $pdo;

    public $idb1er;
    public $idb1et;
    public $idempleado;
    public $b1er_obs;


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

    public function b1erListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b1er"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1raObtener($idb1er)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b1er WHERE idb1er = ?");


            $stm->execute(array($idb1er));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1erEliminar($idb1er)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b1er WHERE idb1er = ?");

            $stm->execute(array($idb1er));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1erActualizar($data)
    {
        try
        {
            $sql = "UPDATE b1er SET 
						idb1et       = ?,
                        idempleado        = ?,
                        b1er_obs        = ?,
                        
				    WHERE idb1er = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb1et,
                        $data->idempleado,
                        $data->b1er_obs,
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1erRegistrar(b1er $data)
    {
        try
        {
            $sql = "INSERT INTO b1er(idb1et,idempleado,b1er_obs) 
		        VALUES ( ?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb1et,
                        $data->idempleado,
                        $data->b1er_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}