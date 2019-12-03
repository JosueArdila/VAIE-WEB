<!DOCTYPE html>
<html>
<head>
  <title>Docentes</title>
  <style>
    <?php include(public_path().'/css/sb-admin-2.min.css') ?>

  </style>
</head>
<body>            
         <table class="table">
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Grupo al que pertenece</th>
                </tr>
            </thead>
            <?php foreach ($docentes as $docente ){?>
            <?php $datos=explode('-',$docente);  ?>
            
                <tr>
                    <td><?php echo $datos[0] ?></td>
                    <td><?php echo $datos[1] ?></td>
                    <td><?php echo $datos[2] ?></td>
                    <td><?php echo $datos[3] ?></td>
                    <td><?php echo $datos[4] ?></td>
                    <td><?php echo $datos[5] ?></td>

                </tr>
            <?php } ?>

        </table>
</body>
</html>