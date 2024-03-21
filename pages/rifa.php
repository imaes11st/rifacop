<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Votaciones</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css" media="screen" />
</head>

<body>
    <?php require("php/conexion.php"); ?>

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Resultado de la rifa -->
        <?php if (isset($_POST['escoger_ganador'])): ?>

        <?php
            require("php/conexion.php");

            // Obtener número ganador
            $numeroMinimo = mysqli_query($con, "SELECT MIN(id) AS minId FROM asistencia") or die("error al consultar" . mysqli_error($con));
            $resultadoNumeroMinimo = mysqli_fetch_array($numeroMinimo);
            $numMinimo = $resultadoNumeroMinimo['minId'];

            $numeroMaximo = mysqli_query($con, "SELECT MAX(id) AS maxId FROM asistencia") or die("error al consultar" . mysqli_error($con));
            $resultadoNumeroMaximo = mysqli_fetch_array($numeroMaximo);
            $numMaximo = $resultadoNumeroMaximo['maxId'];

            $numeroGanador = rand($numMinimo, $numMaximo);

            // Obtener datos del ganador
            $ganador = mysqli_query($con, "SELECT asi.usuario AS usuario, usu.nombre AS nombreUsuario 
                                      FROM asistencia AS asi 
                                      INNER JOIN usuarios AS usu ON asi.usuario=usu.cedula
                                      WHERE asi.id='$numeroGanador'") or die("error al consultar" . mysqli_error($con));
            $resulGanador = mysqli_fetch_array($ganador);
            $cedulaGanador = $resulGanador['usuario'];
            $nombreUsuario = $resulGanador['nombreUsuario'];
            ?>

        <!-- Carta del ganador -->
        <div class="card mt-5 mx-auto" style="width: 18rem;">
            <div class="card-body">
                <h6 class="card-title">Ganador del sorteo</h6>
                <p class="card-text">El ganador del sorteo es:</p>
                <h4 class="card-subtitle mb-2 text-muted"><?php echo $nombreUsuario; ?></h4>
                <p class="card-text">con número de cédula:</p>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $cedulaGanador; ?></h6>
            </div>
        </div>

        <?php endif; ?>

        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-primary my-3 mx-auto d-block" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Escoger ganador
        </button>

        <!-- Modal para escoger ganador -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Escoger ganador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>¿Está seguro que desea escoger un ganador?</h5>
                    </div>
                    <div class="modal-footer">
                        <form method="POST">
                            <button type="submit" class="btn btn-primary" name="escoger_ganador">Sí, escoger
                                ganador</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Imagen de la empresa -->
        <div class="py-5 text-center">
            <img src="img/coopsecon.jpeg" alt="Coopsecon" class="img-fluid">
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ZuV7gGsYX9uV7Zl2x2QO/wdJkiRxOJKw7jKg5AvR1zv0r0Mjtf5rCTx6bW3qU3jH"
        crossorigin="anonymous"></script>
</body>

</html>
