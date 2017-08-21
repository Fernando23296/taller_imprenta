<?php
class b1ea
{
    private $pdo;

    public $idb1ea;
    public $idb1et;
    public $b1ea_nomenc;
    public $b1ea_codins;
    public $b1ea_desins;
    public $b1ea_cant;
    public $b1ea_fecha;



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

    public function b1eaListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b1ea"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1eaObtener($idb1ea)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b1ea WHERE idb1ea = ?");


            $stm->execute(array($idb1ea));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1eaEliminar($idb1ea)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b1ea WHERE idb1ea = ?");

            $stm->execute(array($idb1ea));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1eaActualizar($data)
    {
        try
        {
            $sql = "UPDATE b1ea SET 
						idb1et            =?,
						b1ea_nomenc       = ?,
                        b1ea_codins        = ?,
                        b1ea_desins        = ?,
                        b1ea_cant        = ?,
                        b1ea_fecha        = ?,
                        
				    WHERE idb1ea = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb1et,
                        $data->b1ea_nomenc,
                        $data->b1ea_codins,
                        $data->b1ea_desins,
                        $data->b1ea_cant,
                        $data->b1ea_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1eaRegistrar(b1ea $data)
    {
        try
        {
            $sql = "INSERT INTO b1ea(idb1et,b1ea_nomenc,b1ea_codins,b1ea_desins,b1ea_cant,b1ea_fecha) 
		        VALUES ( ?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb1et,
                        $data->b1ea_nomenc,
                        $data->b1ea_codins,
                        $data->b1ea_desins,
                        $data->b1ea_cant,
                        $data->b1ea_fecha,
                      
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}