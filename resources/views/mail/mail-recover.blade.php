<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Restore password</title>

</head>

<body>
  
  <p>
    Ha solicitado un reestablecimiento de contraseña, puede continuar con el proceso haciendo click
    <a href="{{ $url }}?email={{ $recover->email }}&token={{ $recover->token }}">Aqui</a>
  </p>

</body>

</html>
