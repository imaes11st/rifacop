<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
    integrity="sha512-PxJ4/M4c2pyjG62qZ3fr1U5e6S5d6U5AeTYydhPzvMIL86dA45z/vUS1LZCx9GZ40PtfjYwwnZJnnCwPzmnOgw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <br>
  <?php
  require("php/conexion.php");
  date_default_timezone_set('America/Bogota');

  $sql = "SELECT asistencia.id, usuarios.nombre, usuarios.cedula, asistencia.fecha
  FROM asistencia
  INNER JOIN usuarios ON asistencia.usuario = usuarios.cedula
  WHERE usuarios.habil = 1";
  

  $cantidadAsistencia = "SELECT count(*) cantidad FROM asistencia";
  $queryCantidad = mysqli_query($con, $cantidadAsistencia) or die("error al consultar" . mysqli_error($con));
  $reg = mysqli_fetch_array($queryCantidad);
  $cantAsis = $reg['cantidad'];

  $query = mysqli_query($con, $sql) or die("error al consultar" . mysqli_error($con));

  echo '<div class="container">';
  echo '<table class="table table-bordered">';
  echo '<thead><tr><th scope="col">ID</th><th scope="col">Nombre</th><th scope="col">Cédula</th></tr></thead><tbody>';
  while ($res = mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>';
    echo $res['id'];
    echo '</td>';

    echo '<td>';
    echo $res['nombre'];
    echo '</td>';

    echo '<td>';
    echo $res['cedula'];
    echo '</td>';

    echo '</tr>';
  }
  echo '</tbody></table>';

  echo '<div class="ancla text-center">';
  echo '<h2>Total de participantes: ' . $cantAsis . '</h2>';
  echo '</div>';

  echo '</div>';

  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
    integrity="sha512-h2WfY3nL5zSwXkMNVH7yxW8inibl80uk2SCyGdEtGjgzWZ21Yk/m7IKpXz+CvLR7VW1y40O30gFbapDKoA0kMg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>