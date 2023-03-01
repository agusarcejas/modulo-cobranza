<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="icon" href="icono-recibo.ico" />
  <title>Tabla de Cobradores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="Formulario.css">
</head>

<body>

  <div id="cobradores-cargados">
    
    <?php
    include('tabla_cobradores.php');
    ?>

    <div class="d-flex justify-content-end p-2">

      <button class="btn btn-info btnAtras" type="button" onclick="volverAtras()">Volver Atras</button>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="cobradoresCargados.js"></script>

</body>




</html>