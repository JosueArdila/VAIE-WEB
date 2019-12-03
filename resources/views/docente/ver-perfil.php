<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Docente</title>
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
        <div class="container">
          <?php $datos=session('DatosDocente'); ?>
            <div class="row justify-content-center d-flex align-items-center">
              <div class="col-lg-4 col-md-6 col-sm-10 mb-4">
                <div class="card shadow">
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 mt-4">
                      <h6 class="card-title text-center"><strong><?php echo $datos['primer_nombre'].' '.$datos['segundo_nombre'].' '.$datos['primer_apellido'].' '.$datos['segundo_apellido']; ?></strong></h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title text-center mb-0"><?php echo $datos['descripcion']; ?></h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title text-center mb-0"><?php echo $datos['nombre']; ?></h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title text-center mb-0"><?php echo '<strong>Correo: </strong>'.$datos['correo']; ?></h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title text-center mb-0"><?php echo '<strong>CC: </strong>'.$datos['num_documento']; ?></h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title text-center"><?php echo '<strong>Codigo: </strong>'.$datos['codigo']; ?></h6>
                    </div>
                  </div>
                  <div class="container">
                    <div  class="row justify-content-center mb-3">
                      <div class="row mb-2 mt-2 mr-1 ml-1 justify-content-center" >
                        <a href="redireccionar-editar-perfil-docente" class="btn btn-outline-danger btn-sm ml-2 mr-2">Editar Información</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-10">
                <a target="blank" href="<?php echo $datos['cvlac'] ?>" class="text-decoration-none">
                  <div class="row mb-4">
                    <div class="col-lg-12">
                      <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          Perfil CVLAC
                                      </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="far fa-address-card fa-2x text-gray-300"></i>
                                      </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </a>
                <a target="blank" href="<?php echo $datos['arcid'] ?>" class="text-decoration-none">
                  <div class="row mb-4">
                    <div class="col-lg-12">
                      <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          Perfil de ARCID
                                      </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="far fa-address-card fa-2x text-gray-300"></i>
                                      </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </a>
                <a target="blank" href="<?php echo $datos['rese'] ?>" class="text-decoration-none">
                  <div class="row mb-4">
                    <div class="col-lg-12">
                      <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          Research Gate
                                      </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="far fa-address-card fa-2x text-gray-300"></i>
                                      </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </a>
                <a target="blank" href="<?php echo $datos['google'] ?>" class="text-decoration-none">
                  <div class="row mb-4">
                    <div class="col-lg-12">
                      <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          Google Academico
                                      </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="far fa-address-card fa-2x text-gray-300"></i>
                                      </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </a>
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
  </script>

</body>

</html>
