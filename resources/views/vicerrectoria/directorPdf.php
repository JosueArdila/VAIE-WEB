<!DOCTYPE html>
<html>
<head>
  <title>Directores</title>
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
                    <th>Grupos que dirige</th>
                </tr>
            </thead>
            <?php for ($f=0; $f < count($matriz) ; $f++) { 
                $datos="";
                $grupos="";

                        for ($c=0; $c < count($matriz[$f]); $c++) { 
                         if($c===0){ 
                            $nombre=$matriz[$f][$c];
                            $datos=explode('-',$nombre);
                         }
                         if($c===1){
                            for ($d=0; $d <count($matriz[$f][$c]) ; $d++) { 
                                $grupos .= $matriz[$f][$c][$d].', ';
                            }

                         } 

                       } 
            
            ?>
                <tr>
                    <td><?php echo $datos[4] ?></td>
                    <td><?php echo $datos[0] ?></td>
                    <td><?php echo $datos[1] ?></td>
                    <td><?php echo $datos[2] ?></td>
                    <td><?php echo $datos[3] ?></td>
                    <td><?php echo $grupos ?></td>

                </tr>
            <?php  
                }
            ?>

        </table>
</body>
</html>