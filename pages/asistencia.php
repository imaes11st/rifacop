<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Asistentes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-PxJ4/M4c2pyjG62qZ3fr1U5e6S5d6U5AeTYydhPzvMIL86dA45z/vUS1LZCx9GZ40PtfjYwwnZJnnCwPzmnOgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            margin-top: 50px;
            max-height: 400px;
            overflow-y: auto;
        }

        .table thead th {
            background-color: #343a40;
            color: #ffffff;
            border-color: #343a40;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .ancla {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    require("php/conexion.php");
    date_default_timezone_set('America/Bogota');

    $sql = "SELECT id, nombre, cedula, asistencia from usuarios WHERE habil = 1 AND asistencia IS NOT NULL";

    $cantidadAsistencia = "SELECT count(*) cantidad FROM usuarios WHERE asistencia IS NOT NULL AND habil = 1";
    $queryCantidad = mysqli_query($con, $cantidadAsistencia) or die("error al consultar" . mysqli_error($con));
    $reg = mysqli_fetch_array($queryCantidad);
    $cantAsis = $reg['cantidad'];

    $query = mysqli_query($con, $sql) or die("error al consultar" . mysqli_error($con));
    ?>
    <div class="ancla text-center">
        <h2>Total de participantes: <?php echo $cantAsis; ?></h2>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nro.</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cédula</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($res = mysqli_fetch_array($query)) {
                    ?>
                <tr>
                    <td><?php echo $res['id']; ?></td>
                    <td><?php echo $res['nombre']; ?></td>
                    <td><?php echo $res['asistencia']; ?></td>
                    <td><?php echo $res['cedula']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
        integrity="sha512-h2WfY3nL5zSwXkMNVH7yxW8inibl80uk2SCyGdEtGjgzWZ21Yk/m7IKpXz+CvLR7VW1y40O30gFbapDKoA0kMg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
