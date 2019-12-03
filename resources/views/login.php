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
  
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sb-admin-2-edit.css">

</head>

<body >

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">VAIE-WEB</h1>
                  </div>
                  <form  method="POST" action="validarForm" class="user">
                    <?php
                      
                      $rest=session('restaurar');
                      session()->forget('restaurar');
                      $validar=session('validar');
                      session()->forget('validar');
                      $cambiar=session('cambiar');
                      session()->forget('cambiar');
                      ?>

                      <?php if ($validar===1) {?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Error !</strong> Debes llenar todos los campos
                      </div> 
                      <?php }elseif ($validar===0) {?> 
                        <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Error !</strong> los datos ingresados son incorrectos
                      </div>
                    <?php } if ($rest===1) {?> 
                        <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Error !</strong> No ingresaste correo de recuperacion
                      </div>
                    <?php } if ($cambiar===2) {?> 
                      <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ Genial !</strong> Se cambio con exito la contraseña
                      </div>
                    <?php } ?>
                    <div class="form-group">
                      <input autocomplete="off" name="cedula" class="form-control form-control-user" placeholder="Digite su cédula">
                    </div>
                    <div class="form-group">
                      <input name= "contrasena" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                      <select name="tipo" class="form-control">
                        <option>Vicerrectoria</option>
                        <option>Director de Grupo</option>
                        <option>Docente Investigador</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-danger btn-user btn-block">login</button>
                   
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="dropdown-item samll" href="#" data-toggle="modal" data-target="#recuperarCon">¡Olvidé mi contraseña!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <div class="modal fade" id="recuperarCon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reestablecer contraseña</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="enviarCorreoRecuperacion">
            <P class="mb-1 ml-1 text-justify">
              Por favor digite su E-Mail de recueración. Una ves de click a enviar, si esta dirección se encuentra registrada como su E-Mail de recuperación se le enviará un correo electronico con las instrucciones para reestablecer su contraseña.
            </P>
            <div class="form-group mt-2">
                <input name="correoR" type="text" class="form-control" id="" placeholder="E-Mail">
            </div>
            <div class="form-group">
              <select name="tipoR" class="form-control">
                <option>Vicerrectoria</option>
                <option>Director de Grupo</option>
                <option>Docente Investigador</option>
              </select>
            </div>
            <div class="modal-footer">
              <button class="btn btn-outline-primary" type="button" data-dismiss="modal">Cancelar</button>
              <button class="btn btn-outline-danger" type="submit">Enviar</button>
            </div>

          </form>
      </div>
      
    </div>
  </div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

