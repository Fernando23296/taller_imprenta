<?php
    require ('conexion.php');
    session_start();

    if(!empty($_POST))
        {
        $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
        $password = mysqli_real_escape_string($mysqli,$_POST['password']);
        $error = '';
        
        $sha1_pass = sha1($password);
        
        $sql = "SELECT id, id_tipo FROM usuarios WHERE usuario = '$usuario' AND password= '$sha1_pass'";
        $result=$mysqli->query($sql);
        $rows = $result->num_rows;
        if($rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['id_usuario']= $row['id'];
            $_SESSION['tipo_usuario']= $row['id_tipo'];
            
            header("location: welcome.php");
            
            
        }else{
            $error="Error en datos introducidos";
        }
    }
?>

<html>
<head>
<BR />
<BR />
    <title>Login - TALLERES</title>
</head>
<body>
<center>
<h1>TALLERES</h1>
<img src="herram.jpg">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div><label>Usuario: </label><input id="usuario" name="usuario" type="text"></div>
        <br />
        <div><label>Password:</label><input id="password" name="password" type="password"></div>
        <br />    
        <div><input name="login" type="submit" value="login"></div>
    </form>
    <br />
    <div style ="font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error): '' ;   ?></div> 
    </center>
    </body>
</html>

























