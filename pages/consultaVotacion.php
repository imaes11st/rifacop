<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="styles/styles.css"
      media="screen"
    />
    <title>Document</title>
</head>
<body>

<?php

require("php/conexion.php");

$sqlPla1="SELECT count(*) cantidad FROM planchas where numeroPlancha='1'" ;
$sqlPla2="SELECT count(*) cantidad FROM planchas where numeroPlancha='2'" ;
$sqlPla3="SELECT count(*) cantidad FROM planchas where numeroPlancha='3'" ;
$sqlPla4="SELECT count(*) cantidad FROM planchas where numeroPlancha='4'" ;
$sqlPla5="SELECT count(*) cantidad FROM planchas where numeroPlancha='5'" ;


$query=mysqli_query($con,$sqlPla1)or die("error al consultar".mysqli_error($con));
$res1=mysqli_fetch_array($query);
$cantidad=$res1['cantidad'];

$query2=mysqli_query($con,$sqlPla2)or die("error al consultar".mysqli_error($con));
$res2=mysqli_fetch_array($query2);
$cantidad2=$res2['cantidad'];

$query3=mysqli_query($con,$sqlPla3)or die("error al consultar".mysqli_error($con));
$res3=mysqli_fetch_array($query3);
$cantidad3=$res3['cantidad'];

$query4=mysqli_query($con,$sqlPla4)or die("error al consultar".mysqli_error($con));
$res4=mysqli_fetch_array($query4);
$cantidad4=$res4['cantidad'];



?>
<div class="container">
    <?php
    $sqlPlanchas="SELECT count(*) total FROM planchas";
    $query=mysqli_query($con,$sqlPlanchas)or die("error al consultar".mysqli_error($con));
    $res=mysqli_fetch_array($query);
    $total=$res['total'];

    for ($i=1; $i<=5; $i++) {
    ?>
<div class="card">
        <h1>Plancha<?php echo $i?></h1>
        <?php echo $cantidad; ?>
    </div>
</div>
<?php
}
?>

<div>
    <a class="anclaSalir"href="./php/salir.php">Salir</a>
</div>



</body>
</html>