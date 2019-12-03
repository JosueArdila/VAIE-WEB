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
            <div class="row justify-content-center d-flex align-items-center">
              

              <div class="col-lg-10 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold">Facultades</h6>
                    </div>
                    
                  <div class="card-body pb-1">
                      <div class="row mb-3">
                        <form class="col-lg-12 col-md-12">
                          <div class="input-group">
                          <input autocomplete="off" id="dep" class="form-control" type="text" placeholder="Nombre del nuevo departamento">
                          <select id="facDep" class="form-control input-group-append">
                          <option>-Facultad-</option>
                          </select>               
                          <div class="input-group-append">
                            <button id="regDep" type="submit" class="btn btn-outline-danger">Registrar</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    <hr class="sidebar-divider">
                      <div class="row  mb-3">
                        <form class="col-lg-12 col-md-12">
                          <div class="input-group">
                          <input autocomplete="off" id="search" class="form-control" type="text" placeholder="Nombre de la facultad a buscar">
                        </div>
                        </form>
                      </div>
                      <hr class="sidebar-divider">
                      <div id="rellenarFacultad" class="overflow-auto mb-2 vie-web-scroll">                 
                      </div>                      
                  </div>
                </div>
              </div>



              <div class="col-lg-10 col-md-12 mb-4">
                <div class="card">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold">Departamentos</h6>
                    </div>
                  <div class="card-body pb-1">
                      <div class="row mb-3">
                        <form class="col-lg-12 col-md-12">
                          <div class="input-group">
                          <input autocomplete="off" id="dep" class="form-control" type="text" placeholder="Nombre del nuevo departamento">
                          <select id="facDep" class="form-control input-group-append">
                          <option>-Facultad-</option>
                          </select>               
                          <div class="input-group-append">
                            <button id="regDep" type="submit" class="btn btn-outline-danger">Registrar</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    <hr class="sidebar-divider">
                      <div class="row  mb-3">
                        <form class="col-lg-12 col-md-12">
                          <div class="input-group">
                          <input  autocomplete="off" id="searchf" class="form-control" type="text" placeholder="Nombre del departamento a buscar">
                        </div>
                        </form>
                      </div>
                      <hr class="sidebar-divider">

                      <div id="rellenarDepartamento" class="overflow-auto mb-2 vie-web-scroll">
                     
                      </div>           
                      
                  </div>
                </div>
              </div>
              

              <div class="col-lg-10 col-md-12 mb-4">
                

                <div class="card">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold">Programas</h6>
                    </div>
                  <div class="card-body pb-1">
                      <div class="row mb-3">
                        <form class="col-lg-12 col-md-12">
                          <div class="input-group">
                          <input autocomplete="off" id="pro" class="form-control" type="text" placeholder="Nombre del nuevo programa">
                          <select id="facPro" class="form-control input-group-append">
                          <option>-Facultad-</option>
                          </select>  
                          <div class="input-group-append">
                            <button id="regPro" type="submit" class="btn btn-outline-danger">Registrar</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    <hr class="sidebar-divider">
                      <div class="row  mb-3">
                        <form class="col-lg-12 col-md-12">
                          <div class="input-group">
                          <input autocomplete="off" id="searchp" class="form-control" type="text" placeholder="Nombre del programa a buscar">
                        </div>
                        </form>
                      </div>
                      <hr class="sidebar-divider">
                      <div id="rellenarPrograma" class="overflow-auto mb-2 vie-web-scroll">
                      
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
  <script src="js/request-axios/eventos-vice/events.js"></script>
  

</body>

</html>
