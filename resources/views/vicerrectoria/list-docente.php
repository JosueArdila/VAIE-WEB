<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>vicerrectoria</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sb-admin-2-edit.css">
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
            <div class="container">

                          <?php
                          $docentes = session('docentes');              
                          ?>
              <div class="row">
                <div class="card shadow col-lg-12 col-md-12 mb-4">
                  <div class="card-body pb-1">
                    <form>
                            <div class="row">
                            <div class="form-group col-lg-4">
                              <select id="facultad-list-docente" class="form-control">
                                <option></option>
                              </select>    
                            </div>
                            <div class="form-group col-lg-4">
                                <select disabled="true" id="departamento-list-docente" class="form-control">
                                <option>Primero seleccione Facultad</option>
                              </select>  
                            </div>
                            <div class="form-group col-md-4">
                              <select id="grupo-list-docente" disabled="true" class="form-control">
                                <option>Primero seleccione departamento</option>
                              </select>    
                            </div>
                            </div>
                    </form>
                  </div>
                </div>
              </div>
              <div  class="row">
                <div class="card shadow col-lg-12 mb-4">
                  <div id="docentelist">
                  <?php foreach ($docentes as $do) {
                    $nombre=$do['primer_nombre']." ".$do['segundo_nombre']." ".$do['primer_apellido']." ".$do['segundo_apellido'];
                  ?>
                  <div>
                    <div class="row mb-2 mt-2 mr-1 ml-1">
                      <div class="card col-lg-12">
                        <div class="card-body pb-2 pt-2 pr-2 pl-2">
                          <div class="row">
                            <div class="col-lg-7 col-md-3"><span class="label label-default"><?php echo $nombre  ?></span></div>
                            <div class="col-lg-4 col-md-3"><span class="label label-default"><?php echo $do['nombre']?></span></div>              
                            <div class="col-lg-1 col-md-2"><a href="ver-docente-vi/<?php echo $do['num_documento']?>" class="btn btn-outline-success btn-sm">Ver</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                </div>
                 
                </div>
              </div>
              <div  class="row justify-content-center">
                <div class="card shadow col-lg-auto col-md-auto">
                  <div class="row mb-2 mt-2 mr-1 ml-1 justify-content-center" >
                    <a href="generar-pdf-docentes" class="btn btn-outline-danger btn-sm ml-2 mr-2">Exportar PDF</a>
                    <a href="generar-excel-docentes" class="btn btn-outline-success btn-sm ml-2 mr-2">Exportar Excel</a>
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
  <script src="js/request-axios/eventos-vice/events-list-docente.js"></script>

</body>

</html>
