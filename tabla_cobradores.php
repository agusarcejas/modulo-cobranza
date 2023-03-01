<?php
  // Conectar a la base de datos
  $conexion = mysqli_connect("localhost", "root", "root", "mod-cobranza");

  // Verificar si hubo un error en la conexión
  if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
  }

  // Consulta SQL para obtener todos los registros de la tabla
  $sql = "SELECT * FROM cobrador";

  // Ejecutar la consulta SQL y guardar los resultados en una variable
  $resultados = mysqli_query($conexion, $sql);

// Crear una tabla HTML
echo "<table class= table table-bordered>";
  // Agregar los encabezados de columna
  echo "<thead>";
    echo "<tr>";
      echo "<th scope=col>Nombre</th>";
      echo "<th scope=col>DNI</th>";
      echo "<th scope=col>Domicilio</th>";
      echo "<th scope=col>Sueldo</th>";
      echo "<th scope=col>Acciones</th>";
    echo "</tr>";
  echo "</thead>";

  // Recorrer los resultados de la consulta
  while ($fila = mysqli_fetch_assoc($resultados)) {
    // Agregar una fila a la tabla para cada registro
    echo "<tbody class= table-group-divider>";
      echo "<tr>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["dni"] . "</td>";
        echo "<td>" . $fila["domicilio"] . "</td>";
        echo "<td>" . $fila["sueldo"] . "</td>";
        echo "<td>" . "<u> Liquidaciones </u>" .  "<u> Recibos </u>" .  "<u> Eliminar </u>" . "</td>";
      echo "</tr>";
    echo "</tbody>";
  }
echo "</table>"
?>