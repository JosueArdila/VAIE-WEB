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

          <?php
          $matriz=session('matriz');
          $info=explode('-',$matriz[0][0]);
          $nom_grupos=explode('-',$matriz[0][1]);
          $nombre=$info[0].' '.$info[1].' '. $info[2].' '. $info[3];         
          ?>

          <div class="container">
            <div class="row justify-content-center d-flex align-items-center">
              <div class="col-lg-7 col-md-6 col-sm-10 mb-4">
                <div class="card shadow">
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 mt-4">
                      <h4 class="card-title text-center"><strong>Director: </strong><?php echo $nombre?></h4>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title"><strong>Departamento al que pertenece: </strong></h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title"><?php echo $info[4] ?></h6>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title"><strong>Grupos que dirige:</strong></h6>
                    </div>
                  </div>
                  <?php foreach ($nom_grupos as $n) { ?>
                  <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                      <h6 class="card-title"><?php echo $n?></h6>
                    </div>
                  </div>
                  <?php } ?>
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

</body>

</html>
