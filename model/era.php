<?php
class ara
{
    private $pdo;

    public $idara;
    public $ara_enca;
    public $ara_codins;
    public $ara_desins;
    public $ara_cant;
    public $ara_fecha;



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

    public function araListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM ara"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function araObtener($idara)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM ara WHERE idara = ?");


            $stm->execute(array($idara));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function araEliminar($idara)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM ara WHERE idara = ?");

            $stm->execute(array($idara));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function araActualizar($data)
    {
        try
        {
            $sql = "UPDATE ara SET 
						ara_enca       = ?,
                        ara_codins        = ?,
                        ara_desins        = ?,
                        ara_cant        = ?,
                        ara_fecha        = ?,
                        
				    WHERE idara = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->ara_enca,
                        $data->ara_codins,
                        $data->ara_desins,
                        $data->ara_cant,
                        $data->ara_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function araRegistrar(ara $data)
    {
        try
        {
            $sql = "INSERT INTO ara(ara_enca,ara_codins,ara_desins,ara_cant,ara_fecha) 
		        VALUES ( ?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                         $data->ara_enca,
                        $data->ara_codins,
                        $data->ara_desins,
                        $data->ara_cant,
                        $data->ara_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}