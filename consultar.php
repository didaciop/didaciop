<?php
include 'db.php';
$cedula = $_POST['cedula'];
$sql = "SELECT nombre, apellido, centrovotacion, numeromesa FROM personas WHERE
cedula = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cedula);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "Nombre: " . $row["nombre"] . " " . $row["apellido"] . "<br>";
echo "Centro de Votación: " . $row["centrovotacion"] . "<br>";
echo "Número de Mesa: " . $row["numeromesa"] . "<br>";
}
} else {
echo "No se encontraron registros.";
}
$stmt->close();
$conn->close();
?>
