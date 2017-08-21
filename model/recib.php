<?php
class recib//CAMBIADO por Mascota
{
    private $pdo;

    public $idrecibido;
    public $enc_almacen;
    public $cod_insumo;
    public $nom_insumo;
    public $des_insumo;
    public $cantidad;
    public $fecha;



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

    public function RecibListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM almacen_rec"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RecibObtener($idalmacen_rec)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM almacen_rec WHERE idalmacen_rec = ?");


            $stm->execute(array($idalmacen_rec));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RecibEliminar($idalmacen_rec)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM almacen_rec WHERE idalmacen_rec = ?");

            $stm->execute(array($idalmacen_rec));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RecibActualizar($data)
    {
        try
        {
            $sql = "UPDATE almacen_rec SET 
						enc_almacen            =?,
						cod_insumo        = ?,
                        nom_insumo        = ?,
                        des_insumo = ?,
                        cantidad = ?,
                        fecha = ?,
                        
				    WHERE idalmacen_rec = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->enc_almacen,
                        $data->cod_insumo,
                        $data->nom_insumo,
                        $data->des_insumo,
                        $data->cantidad,
                        $data->fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RecibRegistrar(recib $data)
    {
        try
        {
            $sql = "INSERT INTO almacen_rec(enc_almacen,cod_insumo,nom_insumo,des_insumo,cantidad,fecha) 
		        VALUES ( ?,?,?,?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->enc_almacen,
                        $data->cod_insumo,
                        $data->nom_insumo,
                        $data->des_insumo,
                        $data->cantidad,
                        $data->fecha,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}