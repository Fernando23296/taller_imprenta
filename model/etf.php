<?php
class atf
{
    private $pdo;

    public $idatf;
    public $idaet;
    public $atf_nomenc;
    public $atf_tipopl;
    public $atf_tipoeq;
    public $atf_cant;
    public $atf_rep;
    public $atf_mor;


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

    public function atfListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM atf"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function atfObtener($idatf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM atf WHERE idatf = ?");


            $stm->execute(array($idatf));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function atfEliminar($idatf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM atf WHERE idatf = ?");

            $stm->execute(array($idatf));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function atfActualizar($data)
    {
        try
        {
            $sql = "UPDATE atf SET 
                        idaet        = ?,
                        atf_nomenc        = ?,
                        atf_tipopl        = ?,
                        atf_tipoeq        = ?,
                        atf_cant        = ?,
                        atf_rep        = ?,
                        atf_mor        = ?,
                        
                        
				    WHERE idatf = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idaet,
                        $data->atf_nomenc,
                        $data->atf_tipopl,
                        $data->atf_tipoeq,
                        $data->atf_cant,
                        $data->atf_rep,
                        $data->atf_mor,
                        
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function atfRegistrar(atf $data)
    {
        try
        {
            $sql = "INSERT INTO atf(idaet,
                                    atf_nomenc,
                                    atf_tipopl, 
                                    atf_tipoeq, 
                                    atf_cant,
                                    atf_rep, 
                                    atf_mor) 
		        VALUES ( ?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idaet,
                        $data->atf_nomenc,
                        $data->atf_tipopl,
                        $data->atf_tipoeq,
                        $data->atf_cant,
                        $data->atf_rep,
                        $data->atf_mor,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}