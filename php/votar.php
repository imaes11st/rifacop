<?php
require("conexion.php");
session_start();

$nombre = $_SESSION['usuario'];
echo $nombre;

// Obtener la cédula del usuario de la sesión
$cedula = $_SESSION['cedula'];

// Obtener el número de plancha desde los parámetros GET
$plancha = $_GET['plancha'];


if ($_SESSION['votos']<3) {
    $_SESSION['votos']= $_SESSION['votos']+1;
    
    $sqlAsistencia="INSERT INTO asistencia(usuario,id_plancha,asistio) VALUES($cedula,$plancha,1)";
    $asistencia=mysqli_query($con,$sqlAsistencia)or die("error al consultar".mysqli_error($con));
    // Redireccionar al usuario de vuelta al index.php después de votar
    header("LOCATION:../administrador.php?pag=votacion");
}
else {
    if($_SESSION['rol']==1){
        $sqlEstado="UPDATE usuarios set estado=1 where cedula='$cedula'";
        $estado=mysqli_query($con,$sqlEstado)or die("error al consultar".mysqli_error($con));
    }
   
    header("LOCATION:../pages/home.php");
  }



?>
