<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="icono-recibo.ico" />
    <title>Generar Liquidacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="Formulario.css">
  </head>

  <body>

    <div id="generar-liquidacion">
      <h1>Generar Liquidacion</h1>

      <form action="guardar_liquidacion.php" method="post" className="col-md-4 d-inline-block p-2" id="formulario">

        <label for="exampleDataList" class="form-label">Fecha de Liquidacion </label>
        <input type="date" class="form-control mb-3" name="fechaDePago" id="fechaDePago" required></input>


        <label for="exampleFormControlInput2" class="form-label">Nombre del Cobrador</label>
        <input class="form-control mb-3" list="data-cobradores" id="exampleDataList" placeholder="Buscar..."
          name="cobrador" required />
          <?php 
            include('devolverCobrador.php'); 
            echo '<datalist id="data-cobradores">';
            foreach ($nombres_cobradores as $nombre_cobrador) {
              echo '<option value="' . $nombre_cobrador . '">';
            }
            echo '</datalist>';
          ?>

        <label for="exampleFormControlInput5" class="form-label">Numero de Liquidación</label>
        <input type="number" class="form-control mb-3" id="exampleFormControlInput5" name="numero"></input>

        <label for="exampleFormControlInput5" class="form-label">Periodo - Mes</label>
        <select class="form-select mb-3" aria-label="Default select example" name="periodo" id="periodo">
          <option value="01">Enero</option>
          <option value="02">Febrero</option>
          <option value="03">Marzo</option>
          <option value="04">Abril</option>
          <option value="05">Mayo</option>
          <option value="06">Junio</option>
          <option value="07">Julio</option>
          <option value="08">Agosto</option>
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>


        <div class="d-flex mb-3">

          <div class="me-auto">

            <button class="btn btn-primary btnCobradores" type="button" onclick="verCobradoresCargados()">Ver Cobradores</button>
            <button class="btn btn-secondary btnLiquidacion" type="button" onclick="altaCobradores()">Alta de Cobradores</button>

          </div>


          <div class="botones">
            <button class="btn btn-success btnCargar p-2" type="submit" id="cargarDatos" >Guardar</button>
            <button class="btn btn-danger btnReset p-2" type="reset" value="Reset" id="reiniciarDatos">Cancelar</button>
          </div>

        </div>

      </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="cobradoresCargados.js"></script>
    <script src="generarLiquidacion.js"></script>
  </body>

</html>