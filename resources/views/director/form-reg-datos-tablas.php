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
            <div class="container">
              <div class="row justify-content-center d-flex align-items-center">
                  <?php $grupos=session('grupos'); ?>
                 <div class="col-lg-10 col-md-12 mb-4">
                <div class="card">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold">Lineas de Investigacion</h6>
                    </div>
                  <div class="card-body pb-1">
                      <div class="row mb-3">
                        <div class="col-lg-12 col-md-12">
                          <div class="input-group">
                          <input autocomplete="off" id="linea" class="form-control" type="text" placeholder="Nombre de la nueva linea">
                          <select id="gruLin" class="form-control input-group-append">
                          <?php foreach ($grupos as $grupo) {?>
                          <option><?php echo $grupo['nombre'] ?></option>
                          <?php } ?>
                          </select>               
                          <div class="input-group-append">
                            <button id="regLinea" class="btn btn-outline-danger">Registrar</button>
                          </div>
                        </div>
                        </div>
                      </div>
                    <hr class="sidebar-divider">
                      <div class="row  mb-3">
                        <form class="col-lg-12 col-md-12">
                          <div class="input-group">
                          <input  autocomplete="off" id="searchL" class="form-control" type="text" placeholder="Nombre de la linea a buscar">
                        </div>
                        </form>
                      </div>
                      <hr class="sidebar-divider">

                      <div id="rellenarLinea" class="overflow-auto mb-2 vie-web-scroll">
                     
                      </div>           
                      
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
  <script src="js/tooltip-start.js"></script>  
  <script src="js/request-axios/controller.js"></script>
  <script src="js/request-axios/eventos-director/events-ali-tablas.js"></script>

</body>

</html>
