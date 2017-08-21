<?php
    session_start();
require 'conexion.php';
if(!isset($_SESSION["id_usuario"])){
    header("Location: index.php");
}

$idUsuario = $_SESSION['id_usuario'];
$sql= "SELECT u.id, p.nombre FROM usuarios AS u INNER JOIN personal AS p ON u.id_personal=p.id WHERE u.id='$idUsuario'";
$result=$mysqli->query($sql);
$row= $result-> fetch_assoc();
?>
<html>
    <head>
        <title><font face="arial">Bienvenido</font></title>
    </head>
    <body>

        
        <?php if($_SESSION['tipo_usuario']==1) { ?>
         <table>
        <tr>
            <td><img src="admin.jpg"></td>
            <td><h1> <?php echo 'Bienvenid@ '.utf8_decode ($row['nombre']); ?></h1></td>

        </tr>
    </table>
     
    <ul>
    <li><a href="registro.php">Registrar Nuevo Usuario</a></li></ul>
        
        
        <br />
         <?php } ?>

         <?php if($_SESSION['tipo_usuario']==2) { ?>
         <table>
        <tr>
            <td><img src="emp.jpg"></td>
            <td><h1> <?php echo 'Bienvenid@ '.utf8_decode ($row['nombre']); ?></h1></td>

        </tr>
    </table>
     <?php } ?>
       <ul><li> <a href="logout.php">Cerrar Sesi&oacute;n</a></li></ul>
    </body>
</html>


