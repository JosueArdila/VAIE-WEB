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
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
              
            <div class="row justify-content-center"> 

                <div class="col-lg-3 mb-4">
                  <a id="gra1" href="#" class="text-decoration-none">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  Cantidad de grupos por departamentos
                              </div>
                              </div>
                              <div class="col-auto">
                                  <i class="far fa-chart-bar fa-2x text-gray-300"></i>
                              </div>
                            </div>
                        </div>
                    </div>
                  </a>
                </div>

                <div class="col-lg-3 mb-4">
                  <a href="#" class="text-decoration-none">
                    <div class="card border-left-danger shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Cantidad de productos por tipo
                                </div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-chart-bar fa-2x text-gray-300"></i>
                                </div>
                              </div>
                          </div>
                      </div>
                  </a>
                </div>

                <div class="col-lg-3 mb-4">
                  <a href="#" class="text-decoration-none">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  Numero de proyectos por linea de investigacion
                              </div>
                              </div>
                              <div class="col-auto">
                                  <i class="far fa-chart-bar fa-2x text-gray-300"></i>
                              </div>
                            </div>
                        </div>
                    </div>
                  </a>
                </div>

                <div class="col-lg-3 mb-4">
                  <a href="#" class="text-decoration-none">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  Tipo de impacto con el proyecto
                              </div>
                              </div>
                              <div class="col-auto">
                                  <i class="far fa-chart-bar fa-2x text-gray-300"></i>
                              </div>
                            </div>
                        </div>
                    </div>
                  </a>
                </div>

            </div>

            <div class="row justify-content-center">  
              <div class="col-lg-12 col-mb-12 mb-4" >
                <div class="card shadow text-truncate">
                  <div id="graficas">
                  </div>
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
  <script src="js/request-axios/controller.js"></script>
  <script src="js/request-axios/eventos-vice/graficar.js"></script> 

</body>

</html>
