<?php
class cet
{
    private $pdo;

    public $idcet;
    public $idatf;
    public $idb1tf;
    public $cet_fecha;
    public $cet_nomenc;



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

    public function cetListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM cet"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cetObtener($idcet)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM cet WHERE idcet = ?");


            $stm->execute(array($idcet));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cetEliminar($idcet)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM cet WHERE idcet = ?");

            $stm->execute(array($idcet));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cetActualizar($data)
    {
        try
        {
            $sql = "UPDATE aet SET 
						idatf           =?,
						idb1tf       = ?,
                        cet_fecha        = ?,
                        cet_nomenc        = ?,
                        
				    WHERE idcet = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idatf,
                        $data->idb1tf,
                        $data->cet_fecha,
                        $data->cet_nomenc,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function cetRegistrar(cet $data)
    {
        try
        {
            $sql = "INSERT INTO cet(idatf,idb1tf,cet_fecha,cet_nomenc) 
		        VALUES ( ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idatf,
                        $data->idb1tf,
                        $data->cet_fecha,
                        $data->cet_nomenc,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}