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
                <tr>
                    <td><?php echo $docente['num_documento'] ?></td>
                    <td><?php echo $docente['primer_nombre'] ?></td>
                    <td><?php echo $docente['segundo_nombre'] ?></td>
                    <td><?php echo $docente['primer_apellido'] ?></td>
                    <td><?php echo $docente['segundo_apellido'] ?></td>
                    <td><?php echo $docente['nombre'] ?></td>

                </tr>
            <?php } ?>

        </table>
</body>
</html>