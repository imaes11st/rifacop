<?php

    require("./conexion.php");
    $usuario=$_POST['usuario'];
    // $clave=$_POST['clave'];
    date_default_timezone_set('America/Bogota');
    $fecha=date('d-m-Y');
    // echo $fecha;
    $sql="SELECT * FROM usuarios WHERE cedula='$usuario'";

   

    $query=mysqli_query($con,$sql)or die("error al consultar".mysli_error($con));
    
    $res=mysqli_fetch_array($query);

    $id=$res['id'];
    $nombre=$res['nombre'];
    $cedula=$res['cedula'];
    $estado=$res['estado'];
    $rol=$res['rol'];
    echo $rol;



    if($cedula AND $estado=1 AND $rol==1){
        session_start();
        $_SESSION['usuario']=$nombre;
        $_SESSION['cedula']=$cedula;

        $sqlAsistencia="INSERT INTO asistencia(usuario,fecha) VALUES($cedula,'$fecha')";

        $asistencia=mysqli_query($con,$sqlAsistencia)or die("error al consultar".mysli_error($con));
        header("LOCATION:../index.php?est=usuario");
        echo "usuario";
        // echo $_SESSION['usuario'];
    }

    if($cedula AND $estado=1 AND $rol==2){
       
        $_SESSION['usuario']=$nombre;
        $_SESSION['cedula']=$cedula;

        $sqlAsistencia="INSERT INTO asistencia(udusrio,fecha) VALUES()";
        $asistencia=mysqli_query($con,$sql)or die("error al consultar".mysli_error($con));
        header("LOCATION:../administrador.php?est=usuario");

        // echo $_SESSION['usuario'];

        echo "admin";
    }

    // if($cedula AND $estado=1 AND $rol=2){
    //     $_SESSION['usuario']=$nombre;
    //     $_SESSION['cedula']=$cedula;
    //     header("LOCATION:../index.php?est=adm");
    // }
    // else {
    //     header("LOCATION:../pages/login.php");
    // }

?>