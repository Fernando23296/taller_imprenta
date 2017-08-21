<?php
class b2et
{
    private $pdo;

    public $idb2et;
    public $iddtf;
    public $b2et_fecha;
    public $b2et_nomenc;



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

    public function b2etListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b2et"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2etObtener($idb2et)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b2et WHERE idb2et = ?");


            $stm->execute(array($idb2et));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2etEliminar($idb2et)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b2et WHERE idb2et = ?");

            $stm->execute(array($idb2et));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2etActualizar($data)
    {
        try
        {
            $sql = "UPDATE b2et SET 
						iddtf            =?,
						b2et_fecha       = ?,
                        b2et_nomenc        = ?,
                        
				    WHERE idb2et = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddtf,
                        $data->b2et_fecha,
                        $data->b2et_nomenc,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2etRegistrar(b2et $data)
    {
        try
        {
            $sql = "INSERT INTO b2et(iddtf,b2et_fecha,b2et_nomenc) 
		        VALUES ( ?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddtf,
                        $data->b2et_fecha,
                        $data->b2et_nomenc,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}