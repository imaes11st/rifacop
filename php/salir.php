<?php
    require('conexion.php');
    session_start();

    $_SESSION = array();

    session_destroy();
    header("LOCATION:../pages/login.php");
        
?>