<?php
  session_Start();

if($_SESSION['usuario'] AND $_SESSION['cedula']){

}else{
  header("LOCATION:pages/login.php");
}


?>

<!DOCTYPE html>
<html lang="es">
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
  <title>Iniciar sesion</title>
</head>
<body>
  <?php
    @$permiso=$_GET['permiso'];
    @$estado=$_GET['est'];
    
   
    if($permiso){
      require("php/votacion.php");
    }else{
      require("pages/home.php");
    }

?>
</body>
</html>



