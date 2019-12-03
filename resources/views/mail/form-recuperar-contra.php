<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

  <div class="container">
    <?php $correo=session('correo');
          $validar=session('cambiar');
          session()->forget('cambiar');
    ?>

    <div class="row justify-content-center mt-4">
      <div class="col-lg-6 col-md-6">
        <div class="card shadow">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Restablecer contraseña</h6>
          </div>
          <div class="card-body pb-1">
              <form method="post" action="cambiarContraseña">
                <?php if ($validar===0) {?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Error !</strong> Debes llenar todos los campos
                      </div> 
                      <?php }elseif ($validar===1) {?> 
                        <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Error !</strong> las contraseñas no coinciden
                      </div>
                    <?php } ?>
                <div class="form-group">
                    <input name="newP" type="password" class="form-control" id="" placeholder="Nueva contraseña">
                </div>
                <div class="form-group">
                    <input name="RnewP" type="password" class="form-control" id="" placeholder="Repita la nueva contraseña">
                </div>
                <div class="container mb-2 pb-1">
                  <div class="row justify-content-center">
                    <button type="submit" class="btn btn-outline-danger">Restablecer</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
