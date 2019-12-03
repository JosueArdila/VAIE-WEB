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
            <div class="row justify-content-center">  
            <div class="col-lg-6 col-md-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold">Registrar Grupo de Investigación</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="registrar-grupo-do/registro">
                      <?php
                      $registro=session('registro');
                      session()->forget('registro');
                      if ($registro===1) {        
                      ?>
                      <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Genial !</strong> El registro fue exitoso.
                      </div>
                      <?php } elseif ($registro===0) { ?>              
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Error !</strong> No se pudo realizar el registro, completa todos los campos.
                      </div>
                      <?php } elseif ($registro===2) { ?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Error !</strong> El grupo ya ha sido registrado.
                      </div>
                      <?php } elseif ($registro===3) { ?>
                        <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Error !</strong> Debes seleccionar un departamento.
                      </div>
                      <?php } ?>           

                    <div class="form-group">
                        <input name="nomGru" autocomplete="off" type="text" class="form-control" id="" placeholder="Nombre del grupo" data-toggle="tooltip" data-placement="right" title="Nombre del grupo">
                    </div>
                     <div class="form-group">
                        <input name="des" autocomplete="off" type="text" class="form-control" id="" placeholder="Descripcion del grupo" data-toggle="tooltip" data-placement="right" title="Descripcion del grupo">
                    </div>
                    <div class="form-group">
                        <input name="codCol" autocomplete="off" type="text" class="form-control" id="" placeholder="Código de Col. Ciencias" data-toggle="tooltip" data-placement="right" title="Codigo Colciencias">
                    </div>
                    
                      <div class="form-group">
                        <select name="fac" id="fac-formReA" class="form-control" data-toggle="tooltip" data-placement="right" title="Facultades">
                          <option></option>
                        </select>    
                      </div>
                      <div class="form-group">
                          <select name="dep" id="dep-formReA" class="form-control"data-toggle="tooltip" data-placement="right" title="Departamentos">
                          <option>Seleccione primero Facultad</option>
                        </select>  
                      </div>
                    
                    <div class="form-group">
                        <select name="doc" id="doc-formRea" class="form-control" data-toggle="tooltip" data-placement="right" title="Docentes">
                        <option>Actualmente no tiene docentes registrados</option>
                      </select>  
                    </div>

                    <div class="form-group">
                        <input name="fecha" type="date" class="form-control mb-3" data-toggle="tooltip" data-placement="right" title="Fecha de vinculacion del director al grupo">
                    </div>
                    <div class="container">
                      <div class="row justify-content-center">
                          <label>
                            Si no ha registrado su director puede hacerlo 
                            <a href="registrar-grupo-do">aqui.</a>
                          </label>
                      </div>
                    </div>
                    <div class="container">
                      <div class="row justify-content-center">
                        <button type="submit" class="btn btn-outline-danger">Registrar Grupo</button>
                      </div>
                    </div>
                  </form>
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
  <script src="js/request-axios/eventos-vice/events-rgA.js"></script>

</body>

</html>
