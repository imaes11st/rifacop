<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/index.css" media="screen">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .card {
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #235994;
        }

        .input-group-text {
            background-color: #235994;
            border: none;
            color: #fff;
        }

        .btn-primary {
            background-color: #235994;
            border: none;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #303030;
            color: #fff;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
    <title>Registro de Asistentes - Coopsecon</title>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <div class="container mt-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="../img/coopsecon.jpeg" alt="Coopsecon" class="img-fluid mb-4">
                        <h1 class="mb-4 text-center">Inicio de Sesión</h1>
                        <!-- Formulario de inicio de sesión -->
                        <form action="../php/validar.php" method="post">
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Documento de Identidad:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi-person-fill"></i>
                                    </span>
                                    <input type="text" class="form-control" id="usuario" name="usuario" pattern="\d*" placeholder="Número de Cedula" title="Ingresa solo números (sin letras ni caracteres especiales)." required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                            </div>
                        </form>
                        <!-- Mensaje de error si el usuario no existe -->
                        <?php
                        if(isset($_GET['error']) && $_GET['error'] == 'ya_voto') {
                            echo' <br>';
                            echo '<div class="alert alert-danger" role="alert">El usuario ya voto.</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center py-2 fixed-bottom">
        <div class="container">
            <div class="row">
                <p class="mb-0">Derechos Reservados &copy; 2022 - Coopsecon</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
