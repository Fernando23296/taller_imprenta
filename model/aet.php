<?php
class aet
{
    private $pdo;

    public $idaet;
    public $idordent;
    public $aet_fechai;
    public $aet_nomenc;



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

    public function aetListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM aet"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aetObtener($idaet)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM aet WHERE idaet = ?");


            $stm->execute(array($idaet));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aetEliminar($idaet)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM aet WHERE idaet = ?");

            $stm->execute(array($idaet));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aetActualizar($data)
    {
        try
        {
            $sql = "UPDATE aet SET 
						idordent            =?,
						aet_fechai       = ?,
                        aet_nomenc        = ?,
                        
				    WHERE idaet = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idordent,
                        $data->aet_fechai,
                        $data->aet_nomenc,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function aetRegistrar(aet $data)
    {
        try
        {
            $sql = "INSERT INTO aet(idordent,aet_fechai,aet_nomenc) 
		        VALUES ( ?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idordent,
                        $data->aet_fechai,
                        $data->aet_nomenc,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}