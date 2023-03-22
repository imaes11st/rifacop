<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Votaciones</title>

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css" media="screen" />
  </head>

  <body>
    <?php require("php/conexion.php"); ?>
    <div class="text-center">
  <!-- Botón para abrir el modal -->
  <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Escoger ganador
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Escoger ganador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>¿Está seguro que desea escoger un ganador?</p>
        </div>
        <div class="modal-footer">
          <form method="POST">
            <button type="submit" class="btn btn-primary" name="escoger_ganador">Sí, escoger ganador</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Resultado de la rifa -->
  <?php
    if (isset($_POST['escoger_ganador'])) {
      // Seleccionar un usuario aleatorio para la rifa
      $sqlUsuarioAleatorio = "SELECT * FROM usuarios WHERE habil = 1 ORDER BY RAND() LIMIT 1";
      $queryUsuarioAleatorio = mysqli_query($con, $sqlUsuarioAleatorio) or die("Error al consultar usuario aleatorio: " . mysqli_error($con));

      // Verificar si se encontró un usuario para la rifa
      if ($queryUsuarioAleatorio && mysqli_num_rows($queryUsuarioAleatorio) > 0) {
        $resUsuarioAleatorio = mysqli_fetch_array($queryUsuarioAleatorio);
        $nombreGanador = $resUsuarioAleatorio['nombre'];
        $cedulaGanador = $resUsuarioAleatorio['cedula'];

        // Mostrar el nombre y número de cédula del ganador
        echo "<div class='alert alert-success' role='alert'>El ganador de la rifa es: $nombreGanador con número de cédula $cedulaGanador</div>";
      } else {
        echo "<div class='alert alert-danger' role='alert'>No se encontraron usuarios para la rifa.</div>";
      }
    }
  ?>
</div>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ZuV7gGsYX9uV7Zl2x2QO/wdJkiRxOJKw7jKg5AvR1zv0r0Mjtf5rCTx6bW3qU3jH"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
         