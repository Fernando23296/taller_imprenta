
    <html lang="es">
    <head>
        <title>TALLERES</title>

        <meta charset="utf-8" />

        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />

        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    </head>
    <body>
    <div class="container">
        <h1 class="page-header">
            <?php echo $obsq->idobsq!= null ? $idobsq->Encargado: 'Nuevo Registro'; ?>
        </h1>

        <ol class="breadcrumb">
           <li><a href="indexobsq_quemado.php">Revisar Ordenes de Trabajo</a></li>
        </ol>

        <form id="frm-envi" action="?oq=Obsq&a=ObsqGuardar" method="post" enctype="multipart/form-data">
            
            <!--/////////////////////////////////////-->
            <input type="hidden" name="idobsq" value="<?php echo $obsq->idobsq; ?>" />
            
            
            <div class="form-group">
                <label>fecha</label>
                
                <input type="text" name="fecha" value="<?php echo $obsq->fecha; ?>" class="form-control" placeholder="Ingrese fecha" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group">
                <label>hora</label>
                <input type="text" name="hora" value="<?php echo $obsq->hora; ?>" class="form-control" placeholder="Ingrese Hora" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group">
                <label>Observacion</label>
                <input type="text" name="observacion" value="<?php echo $obsq->observacion; ?>" class="form-control" placeholder="Ingrese observaciones" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group">
                <label>ID Orden de Trabajo</label>
                <input type="text" name="idotq" value="<?php echo $obsq->idotq; ?>" class="form-control" placeholder="Ingrese Descripcion" data-validacion-tipo="requerido|min:1" />
            </div>
            

            <hr />

            <div class="text-right">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form>

        <script>
            $(document).ready(function(){
                $("#frm-obsq").submit(function(){
                    return $(this).validate();
                });
            })
        </script>


    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/js/ini.js"></script>
    <script src="assets/js/jquery.anexsoft-validator.js"></script>
    </body>
    </html>