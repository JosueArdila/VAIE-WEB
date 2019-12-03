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
              <div class="row justify-content-center">  
              <div class="col-lg-6 col-md-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Actualizar Datos Personales</h6>
                  </div>
                  <div class="card-body">
                      <form method="post" action="editar-perfil">
                        <?php $registro=session('registro');
                              session()->forget('registro');
                        ?>
                        <?php if($registro===0) {?>
                           <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> No se pudo realizar el registro, completa todos los campos.
                          </div>
                         <?php } elseif($registro===1){?>
                            <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Genial !</strong> Se actualizo tu información
                          </div>
                        <?php } ?>
                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input autocomplete="off" name="PN" type="text" class="form-control" id="" placeholder="<?php echo $datos['primer_nombre'] ?>" data-toggle="tooltip" data-placement="right" title="Primer Nombre">
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <input autocomplete="off" name="SN" type="text" class="form-control" id="" placeholder="<?php echo $datos['segundo_nombre'] ?>" data-toggle="tooltip" data-placement="right" title="Segundo Nombre"> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input autocomplete="off" name="PA" type="text" class="form-control" id="" placeholder="<?php echo $datos['primer_apellido'] ?>" data-toggle="tooltip" data-placement="right" title="Primer Apellido">
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <input autocomplete="off" name="SA" type="text" class="form-control" id="" placeholder="<?php echo $datos['segundo_apellido'] ?>" data-toggle="tooltip" data-placement="right" title="Segundo Apellido"> 
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                          <input autocomplete="off" name="correo" type="text" class="form-control" id="" placeholder="<?php echo $datos['correo'] ?>" data-toggle="tooltip" data-placement="right" title="Correo">
                        </div>
                        <div class="form-group col-lg-6 col-md-12">
                            <input autocomplete="off" name="codigo" type="text" class="form-control" id="" placeholder="<?php echo $datos['codigo'] ?>" data-toggle="tooltip" data-placement="right" title="Código"> 
                        </div>
                      </div>
                      
                      <div class="form-group">
                          <input autocomplete="off" name="perfilCVLAC" type="text" class="form-control" id="" placeholder="Enlace a su perfil en CVLAC" data-toggle="tooltip" data-placement="right" title="Enlace a perfil CVLAC">
                      </div>
                      <div class="form-group">
                          <input autocomplete="off" name="perfilARDID" type="text" class="form-control" id="" placeholder="Enlace a su perfil en ARCID" data-toggle="tooltip" data-placement="right" title="Enlace a perfil ARCID">
                      </div>
                      <div class="form-group">
                          <input autocomplete="off" name="perfilGATE" type="text" class="form-control" id="" placeholder="Enlace a su perfil en Research Gate" data-toggle="tooltip" data-placement="right" title="Enlace a perfil Research Gate">
                      </div>
                      <div class="form-group">
                          <input autocomplete="off" name="perfilGOOGLE" type="text" class="form-control" id="" placeholder="Enlace a su perfil en Google Academico" data-toggle="tooltip" data-placement="right" title="Enlace a Google Academico">
                      </div>
                      <div class="container">
                        <div class="row justify-content-center">
                          <button type="submit" class="btn btn-outline-danger">Actualizar Datos</button>
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

</body>

</html>
