<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elecciones Planchas Asamblea COOPSECON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            margin-top: 45px;
            text-align: center;
        }

        .card {
            width: 18rem;
            margin: 10px;
            border: 1px solid #ced4da;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 1.25rem; /* Ajustado: Disminuido el relleno */
        }

        .card-title {
            color: #235994; /* Añadido: Color del título */
        }

        .btn-primary {
            background-color: #235994;
            border: none;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="mb-4">Elecciones Planchas Asamblea COOPSECON</h2>
        <p>Para votar por alguna plancha deberá hacer clic en el botón "Votar" de la plancha correspondiente.</p>
    </div>

    <div class="container card-container">
        <?php
        require("../php/conexion.php");
        $numeroPlancha = $_GET['numeroPlancha'];
        $sql = "SELECT * FROM planchas where numeroPlancha=$numeroPlancha";
        $query = mysqli_query($con, $sql) or die("Error al consultar: " . mysqli_error($con));

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $id_plancha = $row['id'];
        ?>
                <div class="card">
                    <img src="../img/caja-de-votacion.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nombre'] ?></h5>
                        <h3 class="card-title"><?php echo $row['descripcion']; ?></h3>
                        <a href="../php/votar.php?plancha=<?php echo $id_plancha; ?>" class="btn btn-primary d-block mx-auto">VOTAR</a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p class='text-center mt-5'>No hay planchas disponibles.</p>";
        }
        ?>
    </div>

    <?php
    mysqli_close($con);
    ?>

</body>

</html>
