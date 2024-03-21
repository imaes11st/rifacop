<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados | Votaciones</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-PxJ4/M4c2pyjG62qZ3fr1U5e6S5d6U5AeTYydhPzvMIL86dA45z/vUS1LZCx9GZ40PtfjYwwnZJnnCwPzmnOgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: 12rem;
            margin: 0 10px 20px;
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container" id="contenedor-resultados">
    </div>

    <script>
        $(document).ready(function() {
            function actualizarResultados() {
                $.ajax({
                    url: './php/obtener_resultados.php',
                    type: 'GET',
                    success: function(data) {
                        $('#contenedor-resultados').html(data);
                    }
                });
            }

            setInterval(actualizarResultados, 5000);
            actualizarResultados();
        });
    </script>
</body>

</html>
