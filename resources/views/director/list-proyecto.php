<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Index</title>
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
  <div class="row">
    <div class="card shadow col-lg-12 col-md-12 mb-4">
      <div class="card-body pb-1">
        <form>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="form-group">
                  <input type="text" class="form-control" id="" placeholder="Nombre del Proyecto">
              </div>
              <div class="row">
                <div class="form-group col-lg-6 col-md-12">
                  <select class="form-control">
                    <option>-Grupo de Inv.-</option>
                  </select>    
                </div>
                <div class="form-group col-lg-6 col-md-12">
                    <select class="form-control">
                    <option>-Linea de Inv.-</option>
                  </select>  
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="row">
                <div class="form-group col-lg-6 col-md-12">
                  <select class="form-control">
                    <option>-Docente Inv.</option>
                  </select>    
                </div>
                <div class="form-group col-lg-6 col-md-12">
                    <select class="form-control">
                    <option>-Joven Inv.-</option>
                  </select>  
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12 col-md-12 md-4">
                  <div class="input-group input-daterange">
                      <input type="date" class="form-control">
                      <input type="date" class="form-control">
                  </div>
                </div>
              </div>  
              <div class="row">
                <div class="form-group col-lg-6 col-md-12">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="ocultarAct">
                    <label class="custom-control-label" for="ocultarAct">Ocultar Activos</label>
                  </div>
                </div>
                <div class="form-group col-lg-6 col-md-12">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="ocultarInc">
                    <label class="custom-control-label" for="ocultarInc">Ocultar Inactivos</label>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div  class="row">
    <div class="card shadow col-lg-12 mb-4">
      <div class="row mb-2 mt-2 mr-1 ml-1">
        <div class="card col-lg-12">
          <div class="card-body pb-2 pt-2 pr-2 pl-2">
            <div class="row">
              <div class="col-lg-3 col-md-4"><span class="label label-default">Nombre Del Proyecto</span></div>
              <div class="col-lg-8 col-md-6"><span class="label label-default">Nombre Del Director</span></div>
              <div class="col-lg-1 col-md-2"><a href="#" class="btn btn-success btn-sm">Ver</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-2 mt-2 mr-1 ml-1">
        <div class="card col-lg-12">
          <div class="card-body pb-2 pt-2 pr-2 pl-2">
            <div class="row">
              <div class="col-lg-3 col-md-4"><span class="label label-default">Nombre Del Proyecto</span></div>
              <div class="col-lg-8 col-md-6"><span class="label label-default">Nombre Del Director</span></div>
              <div class="col-lg-1 col-md-2"><a href="#" class="btn btn-success btn-sm">Ver</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-2 mt-2 mr-1 ml-1">
        <div class="card col-lg-12">
          <div class="card-body pb-2 pt-2 pr-2 pl-2">
            <div class="row">
              <div class="col-lg-3 col-md-4"><span class="label label-default">Nombre Del Proyecto</span></div>
              <div class="col-lg-8 col-md-6"><span class="label label-default">Nombre Del Director</span></div>
              <div class="col-lg-1 col-md-2"><a href="#" class="btn btn-success btn-sm">Ver</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div  class="row justify-content-center">
    <div class="card shadow col-lg-auto col-md-auto">
      <div class="row mb-2 mt-2 mr-1 ml-1 justify-content-center" >
        <a href="#" class="btn btn-danger btn-sm ml-2 mr-2">Exportar PDF</a>
        <a href="#" class="btn btn-success btn-sm ml-2 mr-2">Exportar Excel</a>
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

</body>

</html>
