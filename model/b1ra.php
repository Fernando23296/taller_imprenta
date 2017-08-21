<?php
class b1ra
{
    private $pdo;

    public $idb1ra;
    public $b1ra_enca;
    public $b1ra_codins;
    public $b1ra_desins;
    public $b1ra_cant;
    public $b1ra_fecha;



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

    public function b1raListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b1ra"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1raObtener($idb1ra)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b1ra WHERE idb1ra = ?");


            $stm->execute(array($idb1ra));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1raEliminar($idb1ra)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b1ra WHERE idb1ra = ?");

            $stm->execute(array($idb1ra));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1raActualizar($data)
    {
        try
        {
            $sql = "UPDATE b1ra SET 
						b1ra_enca       = ?,
                        b1ra_codins        = ?,
                        b1ra_desins        = ?,
                        b1ra_cant        = ?,
                        b1ra_fecha        = ?,
                        
				    WHERE idb1ra = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->b1ra_enca,
                        $data->b1ra_codins,
                        $data->b1ra_desins,
                        $data->b1ra_cant,
                        $data->b1ra_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1raRegistrar(b1ra $data)
    {
        try
        {
            $sql = "INSERT INTO b1ra(b1ra_enca,b1ra_codins,b1ra_desins,b1ra_cant,b1ra_fecha) 
		        VALUES ( ?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                         $data->b1ra_enca,
                        $data->b1ra_codins,
                        $data->b1ra_desins,
                        $data->b1ra_cant,
                        $data->b1ra_fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}