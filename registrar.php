<?php
include 'db.php';
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$centrovotacion = $_POST['centrovotacion'];
$numeromesa = $_POST['numeromesa'];
$sql = "INSERT INTO personas (cedula, nombre, apellido, centrovotacion, numeromesa)
VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $cedula, $nombre, $apellido, $centrovotacion, $numeromesa);
if ($stmt->execute()) {
echo "Nuevo votante registrado con éxito.";
} else {
echo "Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
