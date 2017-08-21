<?php
class ctf
{
    private $pdo;

    public $idctf;
    public $idcet;
    public $ctf_nompimp;
    public $ctf_fechaimp;
    public $ctf_hiimp;
    public $ctf_hfimp;
    public $ctf_obsimp;
    public $ctf_nompnum;
    public $ctf_fechanum;
    public $ctf_hinum;
    public $ctf_hfnum;
    public $ctf_nomtro;
    public $ctf_fechatro;
    public $ctf_hitro;
    public $ctf_hftro;


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

    public function ctfListar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM ctf"); //CAMBIADO por mascota
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ctfObtener($idctf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("SELECT * FROM ctf WHERE idctf = ?");


            $stm->execute(array($idctf));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ctfEliminar($idctf)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM ctf WHERE idctf = ?");

            $stm->execute(array($idctf));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ctfActualizar($data)
    {
        try
        {
            $sql = "UPDATE ctf SET 
                        idcet        = ?,
                        ctf_nompimp =?,
                        ctf_fechaimp =?,
                        ctf_hiimp =?,
                        ctf_hfimp =?,
                        ctf_obsimp =?,
                        ctf_nompnum =?,
                        ctf_fechanum =?,
                        ctf_hinum =?,
                        ctf_hfnum =?,
                        ctf_nomtro =?,
                        ctf_fechatro =?,
                        ctf_hitro =?,
                        ctf_hftro =?,
                        
                        
                        
				    WHERE idctf = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                         
    $data-> idcet,
    $data-> ctf_nompimp,
    $data-> ctf_fechaimp,
    $data-> ctf_hiimp,
    $data-> ctf_hfimp,
    $data-> ctf_obsimp,
    $data-> ctf_nompnum,
    $data-> ctf_fechanum,
    $data-> ctf_hinum,
    $data-> ctf_hfnum,
    $data-> ctf_nomtro,
    $data-> ctf_fechatro,
    $data-> ctf_hitro,
    $data-> ctf_hftro,
                        
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ctfRegistrar(ctf $data)
    {
        try
        {
            $sql = "INSERT INTO ctf(
            
                                 idcet,
                                 ctf_nompimp,
                                 ctf_fechaimp,
                                 ctf_hiimp,
                                 ctf_hfimp,
                                 ctf_obsimp,
                                 ctf_nompnum,
                                 ctf_fechanum,
                                 ctf_hinum,
                                 ctf_hfnum,
                                 ctf_nomtro,
                                 ctf_fechatro,
                                 ctf_hitro,
                                 ctf_hftro
                                    ) 
		        VALUES ( ?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
    $data-> idcet,
    $data-> ctf_nompimp,
    $data-> ctf_fechaimp,
    $data-> ctf_hiimp,
    $data-> ctf_hfimp,
    $data-> ctf_obsimp,
    $data-> ctf_nompnum,
    $data-> ctf_fechanum,
    $data-> ctf_hinum,
    $data-> ctf_hfnum,
    $data-> ctf_nomtro,
    $data-> ctf_fechatro,
    $data-> ctf_hitro,
    $data-> ctf_hftro,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
}