<?php
class cea
{
    private $pdo;

    public $idcea;
    public $idcet;
    public $cea_nomenc;
    public $cea_codins;
    public $cea_desins;
    public $cea_cant;
    public $cea_fecha;



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

    public function ceaListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM cea"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ceaObtener($idcea)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM cea WHERE idcea = ?");


            $stm->execute(array($idcea));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ceaEliminar($idcea)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM cea WHERE idcea = ?");

            $stm->execute(array($idcea));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ceaActualizar($data)
    {
        try
        {
            $sql = "UPDATE cea SET 
						idcet            =?,
						cea_nomenc       = ?,
                        cea_codins        = ?,
                        cea_desins        = ?,
                        cea_cant        = ?,
                        cea_fecha        = ?,
                        
				    WHERE idcea = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idcet,
                        $data->cea_nomenc,
                        $data->cea_codins,
                        $data->cea_desins,
                        $data->cea_cant,
                        $data->cea_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ceaRegistrar(cea $data)
    {
        try
        {
            $sql = "INSERT INTO cea(idcet,cea_nomenc,cea_codins,cea_desins,cea_cant,cea_fecha) 
		        VALUES ( ?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idcet,
                        $data->cea_nomenc,
                        $data->cea_codins,
                        $data->cea_desins,
                        $data->cea_cant,
                        $data->cea_fecha,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}