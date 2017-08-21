<?php
class b1tf
{
    private $pdo;

    public $idb1tf;
    public $idb1et;
    public $b1tf_nomenc;
    public $b1tf_pane;
    public $b1tf_dem;
    public $b1tf_tot;
    public $b1tf_otrs;
    public $b1tf_obs;


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

    public function b1tfListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM b1tf"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1tfObtener($idb1tf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM b1tf WHERE idb1tf = ?");


            $stm->execute(array($idb1tf));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1tfEliminar($idb1tf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM b1tf WHERE idb1tf = ?");

            $stm->execute(array($idb1tf));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1tfActualizar($data)
    {
        try
        {
            $sql = "UPDATE b1tf SET 
                        idb1et        = ?,
                        b1tf_nomenc        = ?,
                        b1tf_pane        = ?,
                        b1tf_dem        = ?,
                        b1tf_tot        = ?,
                        b1tf_otrs        = ?,
                        b1tf_obs        = ?,
                        
                        
				    WHERE idb1tf = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->idb1et,
                        $data->b1tf_nomenc,
                        $data->b1tf_pane,
                        $data->b1tf_dem,
                        $data->b1tf_tot,
                        $data->b1tf_otrs,
                        $data->b1tf_obs,
                        
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function b1tfRegistrar(b1tf $data)
    {
        try
        {
            $sql = "INSERT INTO b1tf(idb1et,
                                    b1tf_nomenc,
                                    b1tf_pane, 
                                    b1tf_dem, 
                                    b1tf_tot,
                                    b1tf_otrs, 
                                    b1tf_obs) 
		        VALUES ( ?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                           $data->idb1et,
                        $data->b1tf_nomenc,
                        $data->b1tf_pane,
                        $data->b1tf_dem,
                        $data->b1tf_tot,
                        $data->b1tf_otrs,
                        $data->b1tf_obs,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}