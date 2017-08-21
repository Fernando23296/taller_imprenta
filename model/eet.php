<?php
class eet
{
    private $pdo;

    public $ideet;
    public $iddtf;
    public $idb2tf;
    public $eet_fecha;
    public $eet_nomenc;



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

    public function eetListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM eet"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function eetObtener($ideet)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM eet WHERE ideet = ?");


            $stm->execute(array($ideet));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function eetEliminar($ideet)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM eet WHERE ideet = ?");

            $stm->execute(array($ideet));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aetActualizar($data)
    {
        try
        {
            $sql = "UPDATE eet SET 
						iddtf            =?,
						idb2tf            =?,
						eet_fecha       = ?,
                        eet_nomenc        = ?,
                        
				    WHERE ideet = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddtf,
                        $data->idb2tf,
                        $data->eet_fecha,
                        $data->eet_nomenc,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function eetRegistrar(eet $data)
    {
        try
        {
            $sql = "INSERT INTO eet(iddtf,idb2tf,eet_fecha,eet_nomenc) 
		        VALUES ( ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->iddtf,
                        $data->idb2tf,
                        $data->eet_fecha,
                        $data->eet_nomenc,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}