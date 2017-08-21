<?php
class det
{
    private $pdo;

    public $iddet;
    public $idctf;
    public $det_fecha;
    public $det_nomenc;



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

    public function detListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM det"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function detObtener($iddet)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM det WHERE iddet = ?");


            $stm->execute(array($iddet));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function detEliminar($iddet)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM det WHERE iddet = ?");

            $stm->execute(array($iddet));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function detActualizar($data)
    {
        try
        {
            $sql = "UPDATE aet SET 
						idctf           =?,
                        det_fecha        = ?,
                        det_nomenc        = ?,
                        
				    WHERE iddet = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idctf,
                        $data->det_fecha,
                        $data->det_nomenc,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function detRegistrar(det $data)
    {
        try
        {
            $sql = "INSERT INTO det(idctf,det_fecha,det_nomenc) 
		        VALUES ( ?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idctf,
                        $data->det_fecha,
                        $data->det_nomenc,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}