<?php
class cra
{
    private $pdo;

    public $idcra;
    public $cra_enca;
    public $cra_codins;
    public $cra_desins;
    public $cra_cant;
    public $cra_fecha;



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

    public function craListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM cra"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function craObtener($idcra)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM cra WHERE idcra = ?");


            $stm->execute(array($idcra));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function craEliminar($idcra)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM cra WHERE idcra = ?");

            $stm->execute(array($idcra));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function craActualizar($data)
    {
        try
        {
            $sql = "UPDATE cra SET 
						cra_enca       = ?,
                        cra_codins        = ?,
                        cra_desins        = ?,
                        cra_cant        = ?,
                        cra_fecha        = ?,
                        
				    WHERE idcra = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->cra_enca,
                        $data->cra_codins,
                        $data->cra_desins,
                        $data->cra_cant,
                        $data->cra_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function craRegistrar(cra $data)
    {
        try
        {
            $sql = "INSERT INTO cra(cra_enca,cra_codins,cra_desins,cra_cant,cra_fecha) 
		        VALUES ( ?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                         $data->cra_enca,
                        $data->cra_codins,
                        $data->cra_desins,
                        $data->cra_cant,
                        $data->cra_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}