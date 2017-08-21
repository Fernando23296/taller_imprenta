
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
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="inicio.php" class="logo"><b>TALLERES</b></a>
            <!--logo end-->
            
          
          
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      
      <aside>
     <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
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
              <!-- sidebar menu end-->
          </div>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
           </aside>
      <section id="main-content">
          <section class="wrapper">
          
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      <h1 class="page-header">
            <?php echo $ctf->idctf!= null ? $idctf->Encargado: ''; ?>
        </h1>
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Nuevo Registro de Trabajo Finalizado</h4>
                      
                      <form id="frm-envi" action="?ctf=ctf&a=ctfGuardar"  enctype="multipart/form-data"class="form-horizontal style-form" method="post">
            
                          <!--/////////////////////////////////////-->   
                          <input type="hidden" name="idatf" value="<?php echo $ctf->idctf; ?>" />
                        <!--1-->
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nº Trabajo</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="idcet" 
                                  value="<?php echo $ctf->idcet; ?>" 
                                  class="form-control" placeholder="Ingrese Numero de Trabajo">
                              </div>
                          </div>
                          <!--2-->
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre del Prensista que realizó la impresion</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_nompimp" 
                                  value="<?php echo $ctf->ctf_nompimp; ?>" 
                                  class="form-control" placeholder="Ingrese Nombre">
                                  
                              </div>
                          </div>
                            <!--3-->
                          
                          
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Dia de la impresion</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_fechaimp" 
                                  value="<?php echo $ctf->ctf_fechaimp; ?>" 
                                  class="form-control" placeholder="Ingrese Fecha">
                              </div>
                          </div>
                            <!--4-->
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Hora de inicio</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_hiimp" 
                                  value="<?php echo $ctf->ctf_hiimp; ?>" 
                                  class="form-control" placeholder="Ingrese Hora de inicio">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Hora Final</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_hfimp" 
                                  value="<?php echo $ctf->ctf_hfimp; ?>" 
                                  class="form-control" placeholder="Ingrese Hora final">
                              </div>
                          </div>
            
               <!--2-->
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre del Prensista que realizó numerado</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_nompnum" 
                                  value="<?php echo $ctf->ctf_nompnum; ?>" 
                                  class="form-control" placeholder="Ingrese Nombre">
                                  
                              </div>
                          </div>
                            <!--3-->
                          
                          
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Dia de la impresion</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_fechanum" 
                                  value="<?php echo $ctf->ctf_fechanum; ?>" 
                                  class="form-control" placeholder="Ingrese Fecha">
                              </div>
                          </div>
                            <!--4-->
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Hora de inicio</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_hinum" 
                                  value="<?php echo $ctf->ctf_hinum; ?>" 
                                  class="form-control" placeholder="Ingrese Hora de inicio">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Hora Final</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_hfnum" 
                                  value="<?php echo $ctf->ctf_hfnum; ?>" 
                                  class="form-control" placeholder="Ingrese Hora final">
                              </div>
                          </div>
                          <!--dsdsdsdsds-->
                          
                             <!--2-->
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre del Prensista que realizó el troquelado</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_nomtro" 
                                  value="<?php echo $ctf->ctf_nomtro; ?>" 
                                  class="form-control" placeholder="Ingrese Nombre">
                                  
                              </div>
                          </div>
                            <!--3-->
                          
                          
                             <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Dia de la impresion</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_fechaimp" 
                                  value="<?php echo $ctf->ctf_fechatro; ?>" 
                                  class="form-control" placeholder="Ingrese Fecha">
                              </div>
                          </div>
                            <!--4-->
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Hora de inicio</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_hitro" 
                                  value="<?php echo $ctf->ctf_hitro; ?>" 
                                  class="form-control" placeholder="Ingrese Hora de inicio">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Hora Final</label>
                              <div class="col-sm-10">
                                  
                                  <input type="text" name="ctf_hftro" 
                                  value="<?php echo $ctf->ctf_hftro; ?>" 
                                  class="form-control" placeholder="Ingrese Hora final">
                              </div>
                          </div>
            
                          
                        <button type="submit" class="btn btn-theme">Registrar</button>
                      </form>
                      
                      <script>
            $(document).ready(function(){
                $("#frm-ctf").submit(function(){
                    return $(this).validate();
                });
            })
        </script>
                      </div>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
       
          	
		</section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
     
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>

    $(document).ready(function(){
        $("#frm-cot").submit(function(){
            return $(this).validate();
        });
    })
      /*$(function(){
          $('select.styled').customSelect();
      });*/

  </script>

  </body>
</html>
