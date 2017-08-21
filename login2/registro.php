<?php
    session_start();
require 'conexion.php';
if(!isset($_SESSION["id_usuario"])){
    header("Location: index.php");
}
$sql = "SELECT id, tipo FROM tipo_usuario";
$result = $mysqli->query($sql);
$bandera = false;
if(!empty($_POST))
{
    $nombre= mysqli_real_escape_string ($mysqli, $_POST['nombre']);   
    $usuario= mysqli_real_escape_string ($mysqli, $_POST['usuario']);   
    $password= mysqli_real_escape_string ($mysqli, $_POST['password']);   
    $tipo_usuario= $_POST['tipo_usuario'];   
    $sha1_pass = sha1($password);
    $error='';
    $sqlUser="SELECT id FROM usuarios WHERE usuario= '$usuario'";
    $resultUser=$mysqli-> query($sqlUser);
    $rows = $resultUser->num_rows;
    
    if($rows > 0)
    {
        
    }
}
?>

<html>
    <head>
        <title>Registro</title>
        <script>
            function ValidarNombre()
            {
                valor= document.getElementById("nombre") .value;
                if( valor=null || valor.length == 0 || /^\s+$/.test(valor)){
                    alert('Falta Llenar Nombre');
                    return false;
                    
                }else {return true;}
            }
            function validar()
            {
                if(validarNombre())
                    {
                        document.registro.submit();
                    }
            }
        </script>
    </head>
    <body>
        <form id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div><label>Nombre:</label><input id="nombre" name="nombre" type="text"></div>
            <br />
            
            <div><label>Usuario:</label><input id="usuario" name="usuario" type="text"></div>
            <br />
            
            <div><label>Password:</label><input id="password" name="password" type="password"></div>
            <br />
            
            <div><label>Confirmar Password:</label><input id="con_password" name="con_password" type="pasword"></div>
            <br />
            
            <div><label>Tipo Usuario:</label>
                <select id="tipo_usuario" name="tipo_usuario">
                    <option value="0">Seleccione tipo de usuario...</option>
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <br />
            <div><input name="registrar" type="button" value="Registrar" onclick="Validar();"></div>
        </form>
    </body>
</html>
    














