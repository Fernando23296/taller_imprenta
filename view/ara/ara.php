
<?php
    session_start();
require 'conexion.php';
if(!isset($_SESSION["id_cuenta"])){
    header("Location: index.php");
}

$idUsuario = $_SESSION['id_cuenta'];
$sql= "SELECT u.idcuenta, p.nom_emp 
FROM cuenta AS u INNER JOIN empleado AS p ON u.idempleado=p.idempleado 
WHERE u.idcuenta='$idUsuario'";
$result=$mysqli->query($sql);
$row= $result-> fetch_assoc();
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
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
      
  </head>

  <body>

  <section id="container" >

      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
          <a href="inicio.php" class="logo"><b>TALLERES</b></a>      
          
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      
      <aside>

      <!--sidebar start-->
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo  ($row['nom_emp']); ?></h5>
              	  	
                  <li class="mt">
                      <a class="active" href="inicio.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Inicio</span>
                      </a>
                  </li>
                 <li class="sub-menu">
                      <a href="iot.php" >
                          <i class="fa fa-book"></i>
                          <span>Ordenes de Trabajo</span>
                      </a>
                 
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Empleados</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">Encargados</a></li>
                          <li><a  href="buttons.html">Obreros</a></li>
                      </ul>
                  </li>
                <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Quemado de Placas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="iaet.php">Trabajos Iniciados</a></li>
                          <li><a  href="iaot.php">Historial de Observaciones</a></li>
                          <li><a  href="iaea.php">Pedidos a Almacen</a></li>
                          <li><a  href="iara.php">Recibido de Almacen</a></li>
                          <li><a  href="iaer.php">Empleados Involucrados</a></li>
                          <li><a  href="iatf.php">Trabajos Finalizados</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Corte de Papel</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Trabajos Iniciados</a></li>
                          <li><a  href="gallery.html">Historial de Observaciones</a></li>
                          <li><a  href="todo_list.html">Pedidos a Almacen</a></li>
                          <li><a  href="todo_list.html">Recibido de Almacen</a></li>
                          <li><a  href="todo_list.html">Empleados Involucrados</a></li>
                          <li><a  href="todo_list.html">Trabajos Finalizados</a></li>
                      </ul>
                  </li><li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Impresion</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Trabajos Iniciados</a></li>
                          <li><a  href="gallery.html">Historial de Observaciones</a></li>
                          <li><a  href="todo_list.html">Pedidos a Almacen</a></li>
                          <li><a  href="todo_list.html">Recibido de Almacen</a></li>
                          <li><a  href="todo_list.html">Empleados Involucrados</a></li>
                          <li><a  href="todo_list.html">Trabajos Finalizados</a></li>
                      </ul>
                  </li><li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Acabado Manual</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Trabajos Iniciados</a></li>
                          <li><a  href="gallery.html">Historial de Observaciones</a></li>
                          <li><a  href="todo_list.html">Pedidos a Almacen</a></li>
                          <li><a  href="todo_list.html">Recibido de Almacen</a></li>
                          <li><a  href="todo_list.html">Empleados Involucrados</a></li>
                          <li><a  href="todo_list.html">Trabajos Finalizados</a></li>
                      </ul>
                  </li><li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Refilado</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Trabajos Iniciados</a></li>
                          <li><a  href="gallery.html">Historial de Observaciones</a></li>
                         
                          <li><a  href="todo_list.html">Empleados Involucrados</a></li>
                          <li><a  href="todo_list.html">Trabajos Finalizados</a></li>
                      </ul>
                  </li><li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Acabado Manual</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Trabajos Iniciados</a></li>
                          <li><a  href="gallery.html">Historial de Observaciones</a></li>
                          <li><a  href="todo_list.html">Pedidos a Almacen</a></li>
                          <li><a  href="indexrecib.php">Recibido de Almacen</a></li>
                          <li><a  href="todo_list.html">Empleados Involucrados</a></li>
                          <li><a  href="todo_list.html">Trabajos Finalizados</a></li>
                      </ul>
                  </li>
                  
              </ul>
          </div>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      </aside>
    
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Historial Insumo Recibidos</h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">
                 
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>Nombre Encargado Almacen</th>
                                  <th class="numeric">Codigo Insumo</th>
                                  <th class="numeric">Descripcion de Insumo</th>
                                  <th class="numeric">Cantidad</th>
                                  <th class="numeric">Fecha</th>
                                  
                                
                              </tr>
                                  
                              </thead>
                              
                                
                                <tbody>
    <?php foreach($this->model->araListar() as $r): ?>
        <tr>
 
            <td><?php echo $r->ara_enca; ?></td>
            <td><?php echo $r->ara_codins; ?></td>
            <td><?php echo $r->ara_desins; ?></td>
            <td><?php echo $r->ara_cant; ?></td>
            <td><?php echo $r->ara_fecha; ?></td>
         

            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?ara=ara&a=araEliminar&idara=<?php echo $r->idara; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
                                
                                
                                
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		</section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
  
      <!--footer end-->
  </section>

   