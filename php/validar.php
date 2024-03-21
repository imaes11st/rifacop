<?php

    require('conexion.php');
    $usuario=$_POST['usuario'];
    date_default_timezone_set('America/Bogota');
    $fecha=date('d-m-Y');
    $sql="SELECT * FROM usuarios WHERE cedula=$usuario";

    $query=mysqli_query($con,$sql)or die("error al consultar".mysqli_error($con));
    
    $res=mysqli_fetch_array($query);

    $id=$res['id'];
    $nombre=$res['nombre'];
    $cedula=$res['cedula'];
    $estado=$res['estado'];
    $rol=$res['rol'];
    $habil=$res['habil'];
    $asistencia=$res['asistencia'];

    if(!$asistencia AND $rol==1){    
        $sqlRegistro="UPDATE usuarios set asistencia=NOW() WHERE cedula='$cedula'";
        $registro=mysqli_query($con,$sqlRegistro)or die("error al consultar".mysqli_error($con));
    }

    if($cedula AND $estado=1 AND $rol==1){
        session_start();
        $_SESSION['usuario']=$nombre;
        $_SESSION['cedula']=$cedula;
        $_SESSION['votos']=0;
        
        if($habil==1)
        {
            $sqlAsis="SELECT * FROM usuarios WHERE cedula='$cedula'";
            $asis=mysqli_query($con,$sqlAsis)or die("error al consultar".mysqli_error($con));
            $res=mysqli_fetch_array($asis);
            $estado=$res['estado'];

            if ($estado==1){
                header("LOCATION:../pages/login.php?error=ya_voto");
            }

            else{
                $sqlRol="SELECT rol FROM usuarios WHERE cedula='$cedula'";
                $Rol=mysqli_query($con,$sqlRol)or die("error al consultar".mysqli_error($con));   
                while($row = $Rol->fetch_assoc()) {
      
                    $_SESSION['rol'] = $row["rol"];
                 
                }                  
         header("LOCATION:../administrador.php?pag=votacion");
            }  
        }
        else{
            header("LOCATION:../pages/home.php");
        }
    }

    if($cedula AND $estado=1 AND $rol==2){
        session_start();    
        $_SESSION['usuario']=$nombre;
        $_SESSION['cedula']=$cedula;

        if($habil==1)
        {
             $sqlRol="SELECT rol FROM usuarios WHERE cedula='$cedula'";
        
             $Rol=mysqli_query($con,$sqlRol)or die("error al consultar".mysqli_error($con));   
             while($row = $Rol->fetch_assoc()) {
   
                 $_SESSION['rol'] = $row["rol"];
              
             }          
             header("LOCATION:../administrador.php");        
        }
        else{
            header("LOCATION:../pages/home.php");
        }
    }
    