<?php

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "root", "mod-cobranza");

  // Verificar si hubo un error en la conexión
  if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
  }

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario
    $nombreCobrador = $_POST['nombre'];
    $numeroDni = $_POST['dni'];
    $domicilio = $_POST['domicilio'];
    $sueldo = $_POST['sueldo'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO cobrador (nombre, dni, domicilio, sueldo) VALUES ('$nombreCobrador', '$numeroDni', '$domicilio', '$sueldo')";

    // Ejecutar la consulta SQL
    if ($conexion->query($sql) === TRUE) {
      echo "<script>alert('El cobrador se ha guardado correctamente');</script>";
      echo "<script>window.location.href='AltaCobrador.html';</script>";
      exit();
    } 
    else {
        echo "Error al guardar el cobrador: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();

    } 
    else {
        echo "No se recibió una solicitud POST.";
    }

?>