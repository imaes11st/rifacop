<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elecciones Planchas Asamblea COOPSECON</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
    integrity="sha512-PxJ4/M4c2pyjG62qZ3fr1U5e6S5d6U5AeTYydhPzvMIL86dA45z/vUS1LZCx9GZ40PtfjYwwnZJnnCwPzmnOgw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background-color: #f8f9fa; /* Color de fondo */
      font-family: Arial, sans-serif; /* Fuente predeterminada */
      color: #343a40; /* Color de texto principal */
      height: auto;
    }
    .card {
      margin: 10px; /* Margen entre las cartas */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
      border-radius: 10px; /* Bordes redondeados */
      transition: transform 0.3s ease; /* Transición suave al pasar el mouse */
    }
    .card:hover {
      transform: translateY(-5px); /* Efecto de levantamiento al pasar el mouse */
    }
    .card-img-top {
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      max-width: 100%;
      height: 100px; /* Ajusta la altura automáticamente */
    }
    .card-body {
      padding: 10px;
    }
    .card-title {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 10px;
      color: #235994; /* Color del título */
    }
    .btn-primary {
      width: 100%;
      background-color: #235994; /* Color de fondo del botón */
      border-color: #235994; /* Color del borde del botón */
    }
    .btn-primary:hover {
      background-color: #0b5ed7; /* Cambio de color al pasar el mouse */
      border-color: #0b5ed7; /* Cambio de color del borde al pasar el mouse */
    }
  </style>
</head>
<body>

<div class="container text-center">
  <h3>Elecciones Planchas Asamblea COOPSECON</h3>
  <p>Selecciona una plancha para más detalles y votar.</p>
</div>

<div class="container d-flex justify-content-center flex-wrap">
  <?php
    require("./php/conexion.php");
  
    // session_start();
    $cedula=$_SESSION['cedula'];
    $sql = "SELECT id, descripcion, numeroPlancha FROM planchas WHERE numeroPlancha NOT IN (SELECT p.numeroPlancha FROM asistencia a INNER JOIN planchas p ON a.id_plancha = p.id WHERE a.usuario='$cedula' GROUP BY p.numeroPlancha) GROUP BY numeroPlancha, descripcion";
    $query = mysqli_query($con, $sql) or die("Error al consultar: " . mysqli_error($con));

    if ($query->num_rows > 0) {
        while($row = $query->fetch_assoc()) {
            $plancha = $row['numeroPlancha'];
  ?>
    <div class="card">
      <img src="img/trabajo-en-equipo.png" class="card-img-top" alt="Plancha Image" style="max-width: 350px; height: auto;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['descripcion']; ?></h5>
        <a href="pages/planchas.php?numeroPlancha=<?php echo $plancha; ?>" class="btn btn-primary">Ver detalles y votar</a>
      </div>
    </div>
  <?php
        }
    } 
    mysqli_close($con);
  ?>
</div>

</body>
</html>
