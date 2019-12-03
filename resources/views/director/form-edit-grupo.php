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
          <?php $grupoDirector =session('grupoDirector'); 
                $registro=session('registro');
                session()->forget('registro');
          ?>
          <div class="container">
              <div class="row justify-content-center">  
              <div class="col-lg-6 col-md-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Actualizar Grupo de Investigacion</h6>
                  </div>
                  <div class="card-body">
                      <form method="post" action="editarGrupoDirector">
                    
                      <div class="form-group">
                        <?php
                          if ($registro===1) {?>
                          <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Genial !</strong> Se actualizo el grupo con exito.
                          </div>
                          <?php } elseif ($registro===0) { ?>              
                          <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Datos incompletos.
                          </div>                          
                          <?php } elseif ($registro===2) {?> 
                          <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Debes seleccionar un departamento.
                          </div>
                          <?php }?> 

                          <input name="nombre" autocomplete="off" type="text" class="form-control" placeholder="<?php echo($grupoDirector['nombre']) ?>" data-toggle="tooltip" data-placement="right" title="Nombre del grupo">
                      </div>
                      <div class="form-group">
                          <input name="descripcion" autocomplete="off" type="text" class="form-control" placeholder="<?php echo($grupoDirector['descripcion']) ?>" data-toggle="tooltip" data-placement="right" title="Descripcion del grupo">
                      </div>

                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input name="cod" autocomplete="off" type="text" class="form-control" placeholder="<?php echo($grupoDirector['cod_colciencias']) ?>" data-toggle="tooltip" data-placement="right" title="Codigo Colciencias">
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                          <select class="form-control" name="estado" data-toggle="tooltip" data-placement="right" title="Estado">
                            <?php if ($grupoDirector['estado']===1) { ?>
                              <option selected="true">Activo</option>
                              <option>Inactivo</option>
                            <?php } else{ ?>
                              <option>Activo</option>
                              <option selected="true">Inactivo</option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                        <div class="form-group">
                          <select  id="fac-edit-grupo" class="form-control" data-toggle="tooltip" data-placement="right" title="Facultad">
                          </select>    
                        </div>
                        <div class="form-group">
                            <select name="departamento" id="dep-edit-grupo" class="form-control" data-toggle="tooltip" data-placement="right" title="Departamento">
                            <option>Primero seleccione la facultad</option>
                          </select>  
                        </div>
                      <div class="container">
                      <div class="row justify-content-center">
                        <div class="row justify-content-center" >
                          <button type="submit" class="btn btn-outline-danger btn-sm ml-2 mr-2">Actualizar</button>
                        </div>               
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
  <script src="js/request-axios/eventos-director/events-editar-grupo.js"></script>

</body>

</html>














