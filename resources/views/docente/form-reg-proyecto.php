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
            <?php $docente=session('doc'); 
                  $registro=session('registro');
                  session()->forget('registro');
            ?>
              <div class="row justify-content-center">  
              <div class="col-lg-6 col-md-12">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Registrar Proyecto</h6>
                  </div>
                  <div class="card-body">
                      <form method="post" action="registrar-proyecto">
                      <?php if($registro===0) {?>
                           <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> No se pudo realizar el registro, completa todos los campos.
                          </div>
                         <?php } elseif($registro===2){?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Genial !</strong> Debes seleccionar un tipo de investigación
                          </div>
                         <?php } elseif($registro===3){?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Debes seleccionar un impacto general
                          </div>
                          <?php } elseif($registro===4){?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Debes seleccionar un impacto directo
                          </div>
                         <?php } elseif($registro===5){?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Debes seleccionar un tipo de financiacion
                          </div>
                         <?php } elseif($registro===1){?>
                            <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Genial !</strong> Se realizo el registro
                          </div>
                        <?php } elseif($registro===6){?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Ya existe un proyecto registrado con ese nombre
                          </div>
                        <?php } ?>        
                        <div class="form-group">
                          <input autocomplete="off" name="nombre" type="text" class="form-control" id="" placeholder="Nombre del Proyecto" data-toggle="tooltip" data-placement="right" title="Nombre del proyecto">
                      </div>
                      <div class="form-group">
                          <select name="tipoPro" class="form-control" data-toggle="tooltip" data-placement="right" title="Tipo de proyecto">
                            <option>Seleccione el tipo de investigación</option>
                            <option>INVESTIGACIÓN CIENTIFICA</option>
                            <option>DESARROLLO TECNOLÓGICO</option>
                            <option>INNOVACIÓN</option>
                          </select>  
                      </div>
                      <div class="form-group">
                          <textarea autocomplete="off" name="descripcion" class="form-control" id="" placeholder="Descripción del Proyecto." rows="4" data-toggle="tooltip" data-placement="right" title="Descripción del proyecto"></textarea>
                      </div>
                        <div class="form-group">
                            <select name="linea" id="linea" class="form-control" data-toggle="tooltip" data-placement="right" title="Linea de investigación">
                            <option><?php echo $docente['num_documento']; ?></option>
                          </select>  
                        </div>
                        <div class="form-group">
                          <select name="impG" id="impG" class="form-control" data-toggle="tooltip" data-placement="right" title="Impacto General">
                            <option>Seleccione el impacto general</option>
                          </select>    
                        </div>
                        <div class="form-group">
                            <select name="impD" id="impD" class="form-control" data-toggle="tooltip" data-placement="right" title="Impacto Directo">
                            <option>Seleccione el impacto directo</option>
                          </select>  
                        </div><div class="form-group">
                          <div class="form-group">
                            <input name="fechaIPro" type="date" class="form-control" data-toggle="tooltip" data-placement="right" title="Fecha de inicio del proyecto">
                        </div>                           
                        </div>
                      <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <input autocomplete="off" name="numCon" type="text" class="form-control"  placeholder="Numero de convocatoria"> 
                        </div>                        
                        <div  class="form-group col-lg-6 col-md-12">
                            <input autocomplete="off" name="monto" type="text" class="form-control"  placeholder="Monto"> 
                        </div>
                      </div>
                      <div class="row" id="proyectoExterno">
                        <div class="form-group col-lg-12 col-md-12">
                         <select name="tipoF" id="tipoF" class="form-control" data-toggle="tooltip" data-placement="right" title="Tipo de Financiación">
                            <option>Seleccione el tipo de financiación</option>
                            <option>FINANCIACION FINU</option>
                            <option>FINANCIACION EXTERNA</option>
                            <option>PROYECTO INSTITUCIONAL</option>
                          </select>  
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <input autocomplete="off" name="FechaCon" id="FechaCon" type="date" disabled="disabled" class="form-control" data-toggle="tooltip" data-placement="right" title="Fecha de convocatoria">
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <input autocomplete="off" name="nomCon" id="nomCon" type="text" disabled="disabled" class="form-control" id="nomCon" placeholder="Nombre de convocatoria"> 
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <input autocomplete="off" id="enPa" id="enPa" type="text" disabled="disabled" class="form-control" id="" placeholder="Entidad patrocinadora"> 
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <input autocomplete="off" name="enPar" id="enPar" type="text" disabled="disabled" class="form-control" id="" placeholder="Entidades participantes"> 
                        </div>
                      </div>

                      <div class="container">
                        <div class="row justify-content-center">
                          <button type="submit" class="btn btn-outline-danger">Registrar Proyecto</button>
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
  <script src="js/request-axios/eventos-docente/events-registrar-proyecto.js"></script>

</body>

</html>
