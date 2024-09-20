<?php
// Establecer conexión con el servidor
$conn = new mysqli("localhost","root","","cv_database");
// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>