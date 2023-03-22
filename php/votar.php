<?php
          
          require("conexion.php");
          session_start();
          $nombre=$_SESSION['usuario'];
          echo $nombre;
          $cedula=$_SESSION['cedula'];
          $plan=$_GET['plan'];

          $sql="INSERT INTO planchas(integrante, numeroPlancha, fkUsuario, votacion) VALUES('$nombre',$plan,'$cedula',1)";

          $query=mysqli_query($con,$sql)or die("error al consultar".mysli_error($con));

     

          if($query){
            
            header("LOCATION:../index.php");
          }

?>