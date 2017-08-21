<?php
class dtf
{
    private $pdo;

    public $iddtf;
    public $iddet;
    public $dtf_nomenc;
    public $dtf_revfech;
    public $dtf_compfech;
    public $dtf_embfech;
    public $dtf_empafech;
    public $dtf_hitrab;
    public $dtf_hftrab;


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

    public function dtfListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM dtf"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function dtfObtener($iddtf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM dtf WHERE iddtf = ?");


            $stm->execute(array($iddtf));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function dtfEliminar($iddtf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM dtf WHERE iddtf = ?");

            $stm->execute(array($iddtf));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function dtfActualizar($data)
    {
        try
        {
            $sql = "UPDATE dtf SET 
                        iddet        = ?,
                        dtf_nomenc =?,
                        dtf_revfech =?,
                        dtf_compfech =?,
                        dtf_embfech =?,
                        dtf_empafech =?,
                        dtf_hitrab =?,
                        dtf_hftrab =?,
                        
                        
                        
				    WHERE iddtf = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                         
    $data-> iddet,
    $data-> dtf_nomenc,
    $data-> dtf_revfech,
    $data-> dtf_compfech,
    $data-> dtf_embfech,
    $data-> dtf_empafech,
    $data-> dtf_hitrab,
    $data-> dtf_hftrab,
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function dtfRegistrar(dtf $data)
    {
        try
        {
            $sql = "INSERT INTO dtf(
            
                           
     iddet,
     dtf_nomenc,
     dtf_revfech,
     dtf_compfech,
     dtf_embfech,
     dtf_empafech,
     dtf_hitrab,
     dtf_hftrab
                                    ) 
		        VALUES ( ?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
    $data-> iddet,
    $data-> dtf_nomenc,
    $data-> dtf_revfech,
    $data-> dtf_compfech,
    $data-> dtf_embfech,
    $data-> dtf_empafech,
    $data-> dtf_hitrab,
    $data-> dtf_hftrab,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}