<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mod-cobranza";

$conexion = new mysqli($servername, $username, $password, $dbname);
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

// Datos de la liquidación a guardar
$periodo = $_POST['periodo'];
$numero = $_POST['numero'];
$fecha = $_POST['fechaDePago'];
$cobrador_nombre = $_POST['cobrador'];
$comision_id = 1;

// Crear la consulta SQL para buscar el cobrador por nombre
$sql = 
"SELECT id 
FROM cobrador 
WHERE nombre = '$cobrador_nombre'";

// Ejecutar la consulta SQL
$resultadoCobrador = mysqli_query($conexion, $sql);
$cobrador_id = mysqli_fetch_assoc($resultadoCobrador)['id'];

// Consulta SQL para sumar los montos totales de los recibos asociados a la liquidación
$query = 
"SELECT SUM(comision) AS montoBruto 
FROM recibo 
WHERE Cobrador_id = $cobrador_id AND MONTH(fechaDePago) = $periodo";
$result = mysqli_query($conexion, $query);

// Obtener el resultado de la consulta
if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $montoBruto = $row['montoBruto'];
} else {
  $montoBruto = 0;
}

// Crear la sentencia SQL para insertar la nueva liquidación
$sql = 
"INSERT INTO Liquidacion (periodo, numero, fecha, montoBruto, Cobrador_id, Comision_id) 
VALUES ('$periodo', '$numero', '$fecha', $montoBruto, $cobrador_id, $comision_id)";

// Ejecutar la sentencia SQL
if ($conexion->query($sql) === TRUE) {
  $liquidacion_id = $conexion->insert_id; // Obtener el ID de la liquidación recién creada

  // Obtener los IDs de los recibos que coincidan con el mismo periodo y cobrador
  $query = "SELECT id FROM recibo WHERE Cobrador_id = $cobrador_id AND MONTH(fechaDePago) = $periodo";
  $resultado = mysqli_query($conexion, $query);
    $recibos = array();
    if ($resultado && mysqli_num_rows($resultado) > 0) {
      while ($row = mysqli_fetch_assoc($resultado)) {
        $recibos[] = $row['id'];
        }
      }
  // Actualizar el campo Liquidacion_id en los recibos asociados a esta liquidación
  foreach ($recibos as $recibo_id) {
    $sql = "UPDATE recibo SET Liquidacion_id = $liquidacion_id WHERE id = $recibo_id";
    $conexion->query($sql);
  }
  //Alerta y vuelve a la ventana de GenerarLiquidacion.php
  echo "<script>alert('La Liquidación se ha guardado correctamente');</script>";
  echo "<script>window.location.href='GenerarLiquidacion.php';</script>";
  exit();

} else {
  echo "Error al guardar la liquidación: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>