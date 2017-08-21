<?php
class b1ot
{
    private $pdo;

    public $idb1ot;
    public $idb1et;
    public $b1ot_fecha;
    public $b1ot_hora;
    public $b1ot_obs;



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

    public function b1otListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b1ot"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1otObtener($idb1ot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b1ot WHERE idb1ot = ?");


            $stm->execute(array($idb1ot));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1otEliminar($idb1ot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b1ot WHERE idb1ot = ?");

            $stm->execute(array($idb1ot));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1otActualizar($data)
    {
        try
        {
            $sql = "UPDATE b1ot SET 
						idb1et            =?,
						b1ot_fecha       = ?,
                        b1ot_hora        = ?,
                        b1ot_obs        = ?,
                        
				    WHERE idb1ot = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb1et,
                        $data->b1ot_fecha,
                        $data->b1ot_hora,
                        $data->b1ot_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1otRegistrar(b1ot $data)
    {
        try
        {
            $sql = "INSERT INTO b1ot(idb1et,b1ot_fecha,b1ot_hora,b1ot_obs) 
		        VALUES ( ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb1et,
                        $data->b1ot_fecha,
                        $data->b1ot_hora,
                        $data->b1ot_obs,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}