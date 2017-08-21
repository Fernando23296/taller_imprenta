<?php
class dra
{
    private $pdo;

    public $iddra;
    public $dra_enca;
    public $dra_codins;
    public $dra_desins;
    public $dra_cant;
    public $dra_fecha;



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

    public function draListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM dra"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function draObtener($iddra)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM dra WHERE iddra = ?");


            $stm->execute(array($iddra));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function draEliminar($iddra)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM dra WHERE iddra = ?");

            $stm->execute(array($iddra));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function draActualizar($data)
    {
        try
        {
            $sql = "UPDATE dra SET 
						dra_enca       = ?,
                        dra_codins        = ?,
                        dra_desins        = ?,
                        dra_cant        = ?,
                        dra_fecha        = ?,
                        
				    WHERE iddra = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->dra_enca,
                        $data->dra_codins,
                        $data->dra_desins,
                        $data->dra_cant,
                        $data->dra_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function draRegistrar(dra $data)
    {
        try
        {
            $sql = "INSERT INTO dra(dra_enca,dra_codins,dra_desins,dra_cant,dra_fecha) 
		        VALUES ( ?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                         $data->dra_enca,
                        $data->dra_codins,
                        $data->dra_desins,
                        $data->dra_cant,
                        $data->dra_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}