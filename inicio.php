
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
                          <li><a  href="ib1et.php">Trabajos Iniciados</a></li>
                          <li><a  href="ib1ot.php">Historial de Observaciones</a></li>
                          <li><a  href="ib1ea.php">Pedidos a Almacen</a></li>
                          <li><a  href="ib1ra.php">Recibido de Almacen</a></li>
                          <li><a  href="ib1er.php">Empleados Involucrados</a></li>
                          <li><a  href="ib1tf.php">Trabajos Finalizados</a></li>
                      </ul>
                  </li><li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Impresion</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="icet.php">Trabajos Iniciados</a></li>
                          <li><a  href="icot.php">Historial de Observaciones</a></li>
                          <li><a  href="icea.php">Pedidos a Almacen</a></li>
                          <li><a  href="icra.php">Recibido de Almacen</a></li>
                          <li><a  href="icer.php">Empleados Involucrados</a></li>
                          <li><a  href="ictf.php">Trabajos Finalizados</a></li>
                      </ul>
                  </li><li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Acabado Manual</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="idet.php">Trabajos Iniciados</a></li>
                          <li><a  href="idot.php">Historial de Observaciones</a></li>
                          <li><a  href="idea.php">Pedidos a Almacen</a></li>
                          <li><a  href="idra.php">Recibido de Almacen</a></li>
                          <li><a  href="ider.php">Empleados Involucrados</a></li>
                          <li><a  href="idtf.php">Trabajos Finalizados</a></li>
                      </ul>
                  </li><li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Refilado</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="ib2et.php">Trabajos Iniciados</a></li>
                          <li><a  href="ib2ot.php">Historial de Observaciones</a></li>
                         
                          <li><a  href="ib2er.php">Empleados Involucrados</a></li>
                          <li><a  href="ib2tf.php">Trabajos Finalizados</a></li>
                      </ul>
                  </li><li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
            
                          <span>Acabado Empaquetado</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="ieet.php">Trabajos Iniciados</a></li>
                          <li><a  href="gallery.html">Historial de Observaciones</a></li>
                          <li><a  href="todo_list.html">Pedidos a Almacen</a></li>
                          <li><a  href="indexrecib.php">Recibido de Almacen</a></li>
                          <li><a  href="todo_list.html">Empleados Involucrados</a></li>
                          <li><a  href="todo_list.html">Trabajos Finalizados</a></li>
                      </ul>
                  </li>
                  
              </ul>
          </div>
        
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

      </aside>
     
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  
                      
                      <div class="col-md-4 col-sm-4 mb">
                      		<div class="darkblue-panel pn">
                      			<div class="darkblue-header">
						  			<h5>QUEMADO DE PLACAS</h5>
                      			</div>
                      			<h1 class="mt"><i class="fa fa-fire fa-3x"></i></h1>
                                <BR/>
								<p>IR AL ÁREA</p>
								<footer>
								
								</footer>
                      		</div><! -- /darkblue panel -->
                      	</div><!-- /col-md-4 -->
                      
                      <div class="col-md-4 col-sm-4 mb">
                      		<div class="darkblue-panel pn">
                      			<div class="darkblue-header">
						  			<h5>GUILLOTINA</h5>
                      			</div>
                      			<h1 class="mt"><i class="fa fa-scissors fa-3x"></i></h1>
                                <BR/>
								<p>IR AL ÁREA</p>
								<footer>
								
								</footer>
                      		</div><! -- /darkblue panel -->
                      	</div><!-- /col-md-4 -->
                      <div class="col-md-4 col-sm-4 mb">
                      		<div class="darkblue-panel pn">
                      			<div class="darkblue-header">
						  			<h5>IMPRESION</h5>
                      			</div>
                      			<h1 class="mt"><i class="fa fa-print fa-3x"></i></h1>
                                <BR/>
								<p>IR AL ÁREA</p>
								<footer>
								
								</footer>
                      		</div>
                      	</div><!-- /col-md-4 -->
                      <div class="col-md-4 col-sm-4 mb">
                      		<div class="darkblue-panel pn">
                      			<div class="darkblue-header">
						  			<h5>ACABADO</h5>
                      			</div>
                      			<h1 class="mt"><i class="fa fa-magic fa-3x"></i></h1>
                                <BR/>
								<p>IR AL ÁREA</p>
								<footer>
								
								</footer>
                      		</div>
                      	</div><!-- /col-md-4 -->
                      <div class="col-md-4 col-sm-4 mb">
                      		<div class="darkblue-panel pn">
                      			<div class="darkblue-header">
						  			<h5>CONFIGURACION</h5>
                      			</div>
                      			<h1 class="mt"><i class="fa fa-gear fa-3x"></i></h1>
                                <BR/>
								<p>IR AL ÁREA</p>
								<footer>
								
								</footer>
                      		</div>
                      	</div><!-- /col-md-4 -->
                      <div class="col-md-4 col-sm-4 mb">
                      <a href="q.html">		<div class="darkblue-panel pn">
                      			<div class="darkblue-header">
						  			<h5>EMPLEADOS</h5>
                      			</div>
                      			<h1 class="mt"><i class="fa fa-users fa-3x"></i></h1>
                                <BR/>
								<p>IR AL ÁREA</p>
								<footer>
								
								</footer>
                          </div></a>
                          </div><!-- /col-md-4 -->
                      
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS 
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn donut-chart">
                      			<div class="white-header">
						  			<h5>SERVER LOAD</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i> 70%</p>
									</div>
	                      		</div>
								<canvas id="serverstatus01" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: 70,
												color:"#68dff0"
											},
											{
												value : 30,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                                </script>
	                      	</div>
                      	</div>
                      	-->

                      	
                      	
						
                      	

                    </div><!-- /row -->
                    
                 
					
					
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						
                      
                      

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
            
              
              <!--NOTIFICACIONS--------->
              
              </div>
          </section>
      </section>
      

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              JAGUAR 
              <a href="inicio.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	<!--<script type="text/javascript">

/*      ANUNCIO INICIAL(?) 

       $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });*/
	</script>
	-->
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
 
  </body>
</html>
