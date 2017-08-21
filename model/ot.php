<?php
class ot//CAMBIADO por Mascota
{
    private $pdo;

    public $idordent;
    public $fecha;
    public $cliente;
    public $trabajo;
    public $tamaño;
    public $cantidad;
    public $material;
    public $color;
    public $numeracion_i;
    public $numeracion_f;



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

    public function otListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM ordent"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function otObtener($idordent)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM ordent WHERE idordent = ?");


            $stm->execute(array($idordent));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function otEliminar($idordent)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM ordent WHERE idordent = ?");

            $stm->execute(array($idordent));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function otActualizar($data)
    {
        try
        {
            $sql = "UPDATE ordent SET 
						fecha            =?,
						cliente        = ?,
                        trabajo        = ?,
                        tamaño = ?,
                        cantidad = ?,
                        material = ?,
                        color = ?,
                        numeracion_i = ?,
                        numeracion_f = ?,
                        
				    WHERE idordent = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->fecha,
                        $data->cliente,
                        $data->trabajo,
                        $data->tamaño,
                        $data->cantidad,
                        $data->material,
                        $data->color,
                        $data->numeracion_i,
                        $data->numeracion_f,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function otRegistrar(ot $data)
    {
        try
        {
            $sql = "INSERT INTO ordent(
                        fecha,
						cliente,
                        trabajo,
                        tamaño,
                        cantidad,
                        material,
                        color,
                        numeracion_i,
                        numeracion_f,
            
            ) 
		        VALUES ( ?,?,?,?, ?, ?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->fecha,
                        $data->cliente,
                        $data->trabajo,
                        $data->tamaño,
                        $data->cantidad,
                        $data->material,
                        $data->color,
                        $data->numeracion_i,
                        $data->numeracion_f,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}