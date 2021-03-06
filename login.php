<?php
    require ('conexion.php');
    session_start();

    if(!empty($_POST))
        {
        $usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
        $password = mysqli_real_escape_string($mysqli,$_POST['password']);
        $error = '';
        
        $sha1_pass = sha1($password);
        
        $sql = "SELECT idcuenta, idtipoemp FROM cuenta WHERE usuario = '$usuario' AND password= '$sha1_pass'";
        $result=$mysqli->query($sql);
        $rows = $result->num_rows;
        if($rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['id_cuenta']= $row['idcuenta'];
            $_SESSION['tipoemp']= $row['idtipoemp'];
            
            header("location: inicio.php");
            
            
        }else{
            $error="Error en datos introducidos";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>TALLERES</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
                    <div class="form-login">

                <h2 class="form-login-heading">Iniciar Sesión</h2>
                <div class="login-wrap">
	  	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <!--<div><label>Usuario: </label><input id="usuario" name="usuario" type="text"></div>-->
            <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Cuenta de Usuario" autofocus>
            
        <br />
            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña">
        <!--<div><label>Password:</label><input id="password" name="password" type="password"></div>-->
        <br />    
        <div><input name="login" type="submit" value="login"></div>
    </form>
    <br />
    <div style ="font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error): '' ;   ?></div> 
                </div>
            </div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
