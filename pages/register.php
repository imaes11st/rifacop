<!DOCTYPE html>
<html lang="en">
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
      href="/styles/index.css"
      media="screen"
    />
    <title>Document</title>
</head>
<body>
<form action="./includes/validar.php" method="post" class="containerLogin">
    <div class="titleLogin">
      <h1>Registrar</h1>
    </div>
      <div method="post"class="boxForm">
        <div class="mb-2">
          <label class="form-label">Nombre:</label>
          <input
            placeholder="Primer nombre"
            class="form-control"
            name="nombre"
            type="text"
          />
          <label class="form-label">Apellido</label>
          <input
            placeholder="Primer apellido"
            class="form-control"
            name="apellido"
            type="text"
          />
          <label class="form-label">Documento Identidad</label>
          <input
            placeholder="Documento identidad"
            class="form-control"
            name="documentoIdentidad"
            type="text"
          />
        </div>
        <div class="mb-2">
          <label class="form-label">Contraseña:</label>
          <input 
          placeholder="******"
          type="password" 
          class="form-control"
          name="contraseña"
          />
      </div>
      <br>
      <input type="submit" value="Registrar" class="btn btn-primary">
</div>
</form>
</body>
</html>