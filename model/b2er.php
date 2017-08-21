<?php
class b2er
{
    private $pdo;

    public $idb2er;
    public $idb2et;
    public $idempleado;
    public $b2er_obs;


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

    public function b2erListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b2er"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
//cambiado aer por ara
    public function b2erObtener($idb2er)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b2er WHERE idb2er = ?");


            $stm->execute(array($idb2er));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2erEliminar($idb2er)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b2er WHERE idb2er = ?");

            $stm->execute(array($idb2er));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2erActualizar($data)
    {
        try
        {
            $sql = "UPDATE b2er SET 
						idb2et       = ?,
                        idempleado        = ?,
                        b2er_obs        = ?,
                        
				    WHERE idb2er = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb2et,
                        $data->idempleado,
                        $data->b2er_obs,
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2erRegistrar(b2er $data)
    {
        try
        {
            $sql = "INSERT INTO b2er(idb2et,idempleado,b2er_obs) 
		        VALUES ( ?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb2et,
                        $data->idempleado,
                        $data->b2er_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}