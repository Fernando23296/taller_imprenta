<?php
class b2ot
{
    private $pdo;

    public $idb2ot;
    public $idb2et;
    public $b2ot_fecha;
    public $b2ot_hora;
    public $b2ot_obs;



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

    public function b2otListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b2ot"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2otObtener($idb2ot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b2ot WHERE idb2ot = ?");


            $stm->execute(array($idb2ot));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2otEliminar($idb2ot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b2ot WHERE idb2ot = ?");

            $stm->execute(array($idb2ot));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2otActualizar($data)
    {
        try
        {
            $sql = "UPDATE b2ot SET 
						idb2et            =?,
						b2ot_fecha       = ?,
                        b2ot_hora        = ?,
                        b2ot_obs        = ?,
                        
				    WHERE idb2ot = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb2et,
                        $data->b2ot_fecha,
                        $data->b2ot_hora,
                        $data->b2ot_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b2otRegistrar(b2ot $data)
    {
        try
        {
            $sql = "INSERT INTO b2ot(idb2et,b2ot_fecha,b2ot_hora,b2ot_obs) 
		        VALUES ( ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb2et,
                        $data->b2ot_fecha,
                        $data->b2ot_hora,
                        $data->b2ot_obs,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}