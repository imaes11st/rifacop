<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
      rel="stylesheet"
      type="text/css"
      href="../styles/index.css"
      media="screen"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  <title>Iniciar Sesión</title>
</head>
<body>
<form action="../php/validar.php" method="post" class="containerLogin">
    <div class="titleLogin">
      <h1>Registre los Asistentes</h1>
    </div>
      <div method="post"class="boxForm">
        <div class="mb-2">
          <label class="form-label">Documento de Identidad:</label>
          <input
            placeholder="Numero de Cedula"
            class="form-control"
            name="usuario"
            type="text"
          />
        </div>
        <br>
      <input type="submit" value="Iniciar" class="btn btn-primary">
      <br>
</div>
</form>
</body>
</html>

