<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Rifa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            padding-top: 5rem;
            text-align: center;
        }

        h2 {
            color: #235994;
        }

        .btn-primary {
            background-color: #235994;
            border: none;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2>Bienvenid@, Asistente registrado</h2>
                <p class="card-text fs-5">Al ingresar la Cedula ya queda registrada la asistencia a la asamblea, al final de la asamblea se realizará la rifa</p>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 text-center">
                <img src="../img/coopsecon.jpeg" alt="Coopsecon" class="img-fluid">
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-2">
                <a class="btn btn-primary w-100" href="../php/salir.php">Regresar al Inicio</a>
            </div>
        </div>
    </div>
</body>

</html>
