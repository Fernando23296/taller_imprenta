<?php
class aea
{
    private $pdo;

    public $idaea;
    public $idaet;
    public $aea_nomenc;
    public $aea_codins;
    public $aea_desins;
    public $aea_cant;
    public $aea_fecha;



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

    public function aeaListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM aea"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aeaObtener($idaea)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM aea WHERE idaea = ?");


            $stm->execute(array($idaea));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aeaEliminar($idaea)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM aea WHERE idaea = ?");

            $stm->execute(array($idaea));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aeaActualizar($data)
    {
        try
        {
            $sql = "UPDATE aea SET 
						idaet            =?,
						aea_nomenc       = ?,
                        aea_codins        = ?,
                        aea_desins        = ?,
                        aea_cant        = ?,
                        aea_fecha        = ?,
                        
				    WHERE idaea = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idaet,
                        $data->aea_nomenc,
                        $data->aea_codins,
                        $data->aea_desins,
                        $data->aea_cant,
                        $data->aea_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aeaRegistrar(aea $data)
    {
        try
        {
            $sql = "INSERT INTO aea(idaet,aea_nomenc,aea_codins,aea_desins,aea_cant,aea_fecha) 
		        VALUES ( ?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idaet,
                        $data->aea_nomenc,
                        $data->aea_codins,
                        $data->aea_desins,
                        $data->aea_cant,
                        $data->aea_fecha,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}