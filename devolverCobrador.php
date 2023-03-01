<?php

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "root", "mod-cobranza");

// Consulta para obtener los nombres de clientes
$sql = "SELECT nombre FROM cobrador";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Crear un array con los nombres de los cobradores
$nombres_cobradores = array();
while ($row = mysqli_fetch_assoc($resultado)) {
  $nombres_cobradores[] = $row['nombre'];
}

// Liberar resultados y cerrar la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);

?>