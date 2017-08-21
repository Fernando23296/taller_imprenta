<?php
class aot
{
    private $pdo;

    public $idaot;
    public $idaet;
    public $aot_fecha;
    public $aot_hora;
    public $aot_obs;



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

    public function aotListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM aot"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aotObtener($idaot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM aot WHERE idaot = ?");


            $stm->execute(array($idaot));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aotEliminar($idaot)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM aot WHERE idaot = ?");

            $stm->execute(array($idaot));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aotActualizar($data)
    {
        try
        {
            $sql = "UPDATE aot SET 
						idaet            =?,
						aot_fecha       = ?,
                        aot_hora        = ?,
                        aot_obs        = ?,
                        
				    WHERE idaot = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idaet,
                        $data->aot_fecha,
                        $data->aot_hora,
                        $data->aot_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aotRegistrar(aot $data)
    {
        try
        {
            $sql = "INSERT INTO aot(idaet,aot_fecha,aot_hora,aot_obs) 
		        VALUES ( ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idaet,
                        $data->aot_fecha,
                        $data->aot_hora,
                        $data->aot_obs,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}