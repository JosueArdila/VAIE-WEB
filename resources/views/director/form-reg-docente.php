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
              <div class="row justify-content-center">  
              <div class="col-lg-6 col-md-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Registrar Docente Investigador</h6>
                  </div>
                  <div class="card-body">
                      <form method="post" action="registrar-docente/registrar">
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
                            <strong>¡ Error !</strong> Debes seleccionar un reconocimiento.
                          </div>
                          <?php } elseif ($registro===3) { ?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Debes seleccionar un departamento.
                          </div>
                          <?php } ?>         
                        <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input autocomplete="off" name="numeroDo" type="text" class="form-control" id="" placeholder="Numero de documento" data-toggle="tooltip" data-placement="right" title="Numero de documento">
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <select name="tipoDo" class="form-control" data-toggle="tooltip" data-placement="right" title="Tipo de documento">
                            <option>CC</option>
                            <option>CE</option>
                            <option>Pasaporte</option>
                          </select>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input autocomplete="off" name="primerN" type="text" class="form-control" placeholder="Primer Nombre" data-toggle="tooltip" data-placement="right" title="Primer nombre">
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <input autocomplete="off" name="segundoN" type="text" class="form-control"  placeholder="Segundo Nombre" data-toggle="tooltip" data-placement="right" title="Segundo nombre"> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input autocomplete="off" name="primerA" type="text" class="form-control"  placeholder="Primer Apellido" data-toggle="tooltip" data-placement="right" title="Primer apellido">
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <input autocomplete="off" name="segundoA" type="text" class="form-control"  placeholder="Segundo Apellido" data-toggle="tooltip" data-placement="right" title="Segundo apellido"> 
                        </div>
                      </div>
                      <div class="form-group">
                        <select name="reconocimiento" id="rec" class="form-control" data-toggle="tooltip" data-placement="right" title="Reconocimientos de colciencias">
                          <option></option>
                        </select>    
                      </div>            
                      <div class="form-group">
                        <select name="facultad" id="fac" class="form-control" data-toggle="tooltip" data-placement="right" title="Facultades">
                          <option></option>
                        </select>    
                      </div>
                      <div class="form-group">
                          <select name="departamento" id="depar" class="form-control" data-toggle="tooltip" data-placement="right" title="Departamentos">
                          <option>Seleccione primero una Facultad</option>
                        </select>  
                      </div>            
                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input autocomplete="off" name="correo" type="text" class="form-control" id="" placeholder="E-Mail" data-toggle="tooltip" data-placement="right" title="correo electronico">
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <input autocomplete="off" name="codigo" type="text" class="form-control" id="" placeholder="Código" data-toggle="tooltip" data-placement="right" title="codigo"> 
                        </div>
                      </div>
                       <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input name="fechaGrupo" type="date" class="form-control" data-toggle="tooltip" data-placement="right" title="Fecha de vinculacion al grupo">              </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <input name="fechaDepar" type="date" class="form-control" data-toggle="tooltip" data-placement="right" title="Fecha de vinculacion al departamento">
                        </div>
                      </div>
                      <?php 
                        $director = session('docente');             
                      ?>            
                      <div class="form-group ">
                            <select name="grupo" id="grupo" class="form-control" data-toggle="tooltip" data-placement="right" title="Seleccione el grupo de investigación al cual lo asignaras">
                            <option id="valor" type="hidden" ><?php echo $director['num_documento'];?></option>
                          </select>  
                      </div>
                      <div class="container">
                        <div class="row justify-content-center">
                          <button type="submit" class="btn btn-outline-danger">Registrar Docente</button>
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
  <script src="js/request-axios/eventos-director/events-regDoc.js"></script>

</body>

</html>
