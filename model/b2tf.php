<?php
class b2tf
{
    private $pdo;

    public $idb2tf;
    public $idb2et;
    public $b2tf_nomenc;
    public $b2tf_fecha;
    public $b2tf_obs;


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

    public function b2tfListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b2tf"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2tfObtener($idb2tf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b2tf WHERE idb2tf = ?");


            $stm->execute(array($idb2tf));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2tfEliminar($idb2tf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b2tf WHERE idb2tf = ?");

            $stm->execute(array($idb2tf));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2tfActualizar($data)
    {
        try
        {
            $sql = "UPDATE b2tf SET 
                        idb2et        = ?,
                        b2tf_nomenc        = ?,
                        b2tf_fecha       = ?,
                        b2tf_obs        = ?,
                        
                        
				    WHERE idb2tf = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb2et,
                        $data->b2tf_nomenc,
                        $data->b2tf_fecha,
                        $data->b2tf_obs,
                        
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2tfRegistrar(b2tf $data)
    {
        try
        {
            $sql = "INSERT INTO b2tf(idb2et,
                                    b2tf_nomenc,
                                    b2tf_fecha,
                                    b2tf_obs) 
		        VALUES ( ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                      $data->idb2et,
                        $data->b2tf_nomenc,
                        $data->b2tf_fecha,
                        $data->b2tf_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}