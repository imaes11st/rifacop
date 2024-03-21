<?php
session_start();
if(isset($_SESSION['rol'])){
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: #ffffff; /* Color de fondo del navbar */
        }
        .navbar-toggler {
            border-color: #343a40; /* Color del botón del navbar */
        }
        .nav-link {
            color: #343a40 !important; /* Color de los enlaces del navbar */
        }
        .btn-outline-primary {
            border-color: #0d6efd; /* Color del borde del botón salir */
            color: #0d6efd; /* Color del texto del botón salir */
        }
        .btn-outline-primary:hover {
            background-color: #0d6efd; /* Cambio de color de fondo al pasar el mouse */
            color: #ffffff; /* Cambio de color del texto al pasar el mouse */
        }
    </style>
</head>
<body>  
    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php if($_SESSION['rol'] == 2): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="administrador.php?pag=asistencia">ASISTENCIA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="administrador.php?pag=rifa">RIFA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="administrador.php?pag=resultados">RESULTADOS</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <a class="btn btn-outline-primary mx-2" href="./php/salir.php">SALIR</a>
            </div>
        </nav>
    </header>

    <section style="padding-top: 80px;">
        <?php
        $pag = isset($_GET['pag']) ? $_GET['pag'] : 'homeAdmin';
        require "pages/{$pag}.php";
        ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
}else{
    header('Location: /rifacop/pages/login.php');
}
?>
