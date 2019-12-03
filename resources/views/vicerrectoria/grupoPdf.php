<!DOCTYPE html>
<html>
<head>
  <title>Grupos</title>
  <style>
    <?php include(public_path().'/css/sb-admin-2.min.css') ?>

  </style>
</head>
<body>            
         <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Cod. Colciencias</th>
                </tr>
            </thead>
            <?php foreach ($grupos as $grupo ){?>
                <tr>
                    <td><?php echo $grupo['nombre']?></td>
                    <td><?php echo $grupo['descripcion']?></td>
                    <?php  if($grupo['estado']===1){?>
                    <td>Activo</td>
                     <?php } else {  ?>
                    <td>Inactivo</td>  
                      <?php } ?> 
                    <td><?php echo $grupo['cod_colciencias'] ?></td>  
                </tr>
            <?php } ?>

        </table>
</body>
</html>