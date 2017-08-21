<?php
class cot
{
    private $pdo;

    public $idcot;
    public $idcet;
    public $cot_fecha;
    public $cot_hora;
    public $cot_obs;



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

    public function cotListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM cot"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cotObtener($idcot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM cot WHERE idcot = ?");


            $stm->execute(array($idcot));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cotEliminar($idcot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM cot WHERE idcot = ?");

            $stm->execute(array($idcot));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cotActualizar($data)
    {
        try
        {
            $sql = "UPDATE cot SET 
						idcet            =?,
						cot_fecha       = ?,
                        cot_hora        = ?,
                        cot_obs        = ?,
                        
				    WHERE idcot = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idcet,
                        $data->cot_fecha,
                        $data->cot_hora,
                        $data->cot_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cotRegistrar(cot $data)
    {
        try
        {
            $sql = "INSERT INTO cot(idcet,cot_fecha,cot_hora,cot_obs) 
		        VALUES ( ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idcet,
                        $data->cot_fecha,
                        $data->cot_hora,
                        $data->cot_obs,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}