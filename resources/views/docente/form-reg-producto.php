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
              <?php $doc=session('doc'); 
                    $registro=session('registro');
                    session()->forget('registro');
              ?>
                <div class="row justify-content-center">  
                <div class="col-lg-6 col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold">Registrar Producto</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="registrar-producto-base">
                        <?php if($registro===0){?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Debes completar todos los datos
                          </div>
                         <?php } elseif ($registro===1){?>
                            <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Genial !</strong> Se realizo el registro
                          </div>
                        <?php } elseif ($registro===2){?>
                            <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>¡ Error !</strong> Ese producto ya existe
                          </div>
                        <?php } ?>        
                          <div class="form-group">
                            <input autocomplete="off" name="nombre" type="text" class="form-control" placeholder="Nombre del producto" data-toggle="tooltip" data-placement="right" title="Nombre del Producto">
                        </div>
                        <div class="form-group">
                            <textarea autocomplete="off" name="descripcion" class="form-control" id="exampleFormControlTextarea1" placeholder="Descripción del producto." rows="4" data-toggle="tooltip" data-placement="right" title="Descripción del Producto"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="fecha" type="date" class="form-control mb-3" data-toggle="tooltip" data-placement="right" title="Fecha de publicación">
                        </div>
                          <div class="form-group">
                              <select name="linea" id="linea" class="form-control" data-toggle="tooltip" data-placement="right" title="Linea de investigación">
                              <option><?php echo $doc['num_documento']; ?></option>
                            </select>  
                          </div>
                        <div class="row">
                          <div class="form-group col-lg-12 col-md-12">
                            <select name="proyecto" id="proyecto" class="form-control" data-toggle="tooltip" data-placement="right" title="Proyecto de investigación">
                              <option>Seleccione el proyecto</option>
                            </select>    
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12 col-md-12">
                            <select name="tipoP" id="tipoP" class="form-control" data-toggle="tooltip" data-placement="right" title="Tipo de Producto">
                              <option>Seleccione el tipo de producto</option>
                              <option>CAPITULO DE LIBRO</option>
                              <option>LIBRO</option>
                              <option>ARTICULO</option>
                            </select>    
                          </div>
                        </div>

                        <div style="display: none" class="row" id="capituloLibro" >
                          <div class="container">
                            <div class="row justify-content-center">
                              <p class="font-weight-bold">Datos del capitulo de libro</p>
                            </div>
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <input name="isbn" type="text" class="form-control" id="" placeholder="ISBN"> 
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <select name="ambito" type="text" class="form-control" data-toggle="tooltip" data-placement="right" title="Ambito">
                                  <option> INTERNACIONAL </option>
                                  <option> NACIONAL </option> 
                              </select> 
                          </div> 
                          <div class="form-group col-lg-6 col-md-12">
                              <input autocomplete="off" name="edito" type="text" class="form-control" id="" placeholder="Editorial"> 
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <input autocomplete="off" name="numPag" type="text" class="form-control" id="" placeholder="Número de páginas"> 
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <input autocomplete="off" name="nomLi" type="text" class="form-control" id="" placeholder="Nombre del capitulo del Libro"> 
                          </div>
                        </div>

                        <div style="display: none" class="row" id="libro">
                          <div class="container">
                            <div class="row justify-content-center">
                              <p class="font-weight-bold">Datos del libro</p>
                            </div>
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <input autocomplete="off" name="isbnL" type="text" class="form-control" id="" placeholder="ISBN"> 
                          </div>
                           <div class="form-group col-lg-6 col-md-12">
                              <select name="ambitoL" type="text" class="form-control" data-toggle="tooltip" data-placement="right" title="Ambito">
                                  <option> INTERNACIONAL </option>
                                  <option> NACIONAL </option> 
                              </select> 
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <input autocomplete="off" name="editoL" type="text" class="form-control" id="" placeholder="Editorial"> 
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <input autocomplete="off" name="numCap" type="text" class="form-control" id="" placeholder="Número de capítulos"> 
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <input autocomplete="off" name="numPagL" type="text" class="form-control" id="" placeholder="Número de Paginas"> 
                          </div>
                        </div>

                        <div  style="display: none" class="row" id="articulo">
                          <div class="container">
                            <div class="row justify-content-center">
                              <p class="font-weight-bold">Datos del articulo</p>
                            </div>
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                              <input autocomplete="off" name="nombreR" type="text" class="form-control" id="" placeholder="Nombre de la revista"> 
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <input autocomplete="off" name="isbnA" type="text" class="form-control" id="" placeholder="ISSN"> 
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <select name="ambitoA" type="text" class="form-control" id="" placeholder="Ambito de la revista" data-toggle="tooltip" data-placement="right" title="Ambito">
                                  <option> INTERNACIONAL </option>
                                  <option> NACIONAL </option> 
                              </select> 
                          </div>                          
                          <div class="form-group col-lg-6 col-md-12">
                              <select name="tipoA" type="text" class="form-control" id="" data-toggle="tooltip" data-placement="right" title="Tipo de articulo">
                                <option>ARTÍCULO A1</option>
                                        <option> ARTÍCULO A2 </option>
                                        <option> ARTÍCULO B </option>
                                        <option> ARTÍCULO C </option>
                                        <option> ARTÍCULO D </option>

                              </select> 
                          </div>
                          <div class="form-group col-lg-6 col-md-12">
                              <input autocomplete="off" name="link" type="text" class="form-control" id="" placeholder="Link de ubicación en la web" > 
                          </div>
                        </div>

                        <div class="container">
                          <div class="row justify-content-center">
                            <button type="submit" class="btn btn-outline-danger">Registrar Producto</button>
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
  <script src="js/request-axios/eventos-docente/events-registrar-producto.js"></script>  
  <script src="js/tooltip-start.js"></script>  
</body>

</html>
