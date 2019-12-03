<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Director</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- CSS DE VIE-WEB-->
  <link href="css/vie-web.css" rel="stylesheet">
</head>

<body id="page-top">
   
   <div id="wrapper">
    <?php include "sections/aside.html"?>
    <div id="content-wrapper" class="d-flex flex-column">
      <!--------------------- MAIN  CONTENT ----------------------->
      <div id="content">
        <?php include "sections/header.html"?>
        <div class="container-fluid">
          <?php $grupos=session('grupos'); 
                $informacion=session('DocentesGrupoDirector');
          ?>
              <div class="container">
                <div class="row">
                  <div class="card shadow col-lg-12 col-md-12 mb-4">
                    <div class="card-body pb-1">
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                
                                <select id="grupo" class="form-control" data-toggle="tooltip" data-placement="right" title="Seleccione un grupo para busqueda">
                                  <?php foreach ($grupos as $g){?>
                                <option><?php echo($g['nombre']); ?></option>
                                  <?php } ?>
                              </select>  
                            </div>
                          </div>
                          
                        </div>
                    </div>
                  </div>
                </div>
                <div  class="row">                  
                  <div id="rellenarDocente" class="card shadow col-lg-12 mb-4">
                    <?php foreach ($informacion as $info){
                      $datos=explode('-',$info);
                      $nombreD=$datos[1].' '.$datos[2].' '.$datos[3].' '.$datos[4];
                      ?>
                    
                    <div class="row mb-2 mt-2 mr-1 ml-1">
                      <div class="card col-lg-12">
                        <div class="card-body pb-2 pt-2 pr-2 pl-2">
                          <div class="row">
                            <div class="col-lg-6 col-md-2"><span class="label label-default"><?php echo($nombreD) ?></span></div>

                            <div class="col-lg-3 col-md-2"><span class="label label-default"><?php echo($datos[5]) ?></span></div>
                            
                            <div class="col-lg-3 col-md-3">
                              <div class="container pl-0 pr-0">
                                <div class="row d-flex flex-row-reverse">
                                  <div class="col-lg-auto col-md-auto"><a href="ver-docente-director/<?php echo $datos[0]; ?>" class="btn btn-outline-success btn-sm">Ver</a></div>                            
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>                
                </div>
                <div  class="row justify-content-center">
                  <div class="card shadow col-lg-auto col-md-auto">
                    <div class="row mb-2 mt-2 mr-1 ml-1 justify-content-center" >
                      <a href="generar-pdf-docentes-director" class="btn btn-outline-danger btn-sm ml-2 mr-2">Exportar PDF</a>
                      <a href="generar-excel-docentes-director" class="btn btn-outline-success btn-sm ml-2 mr-2">Exportar Excel</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <?php include "sections/footer.html"?>
    </div>
   </div>
   <?php include "sections/end.html"?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/tooltip-start.js"></script>   
  <script src="js/request-axios/controller.js"></script>
  <script src="js/request-axios/eventos-director/events-list-docente.js"></script>

</body>

</html>
