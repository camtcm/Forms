<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_apellidos = $_POST['nombre_apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $ocupacion = $_POST['ocupacion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $nacionalidad = $_POST['nacionalidad'];
    $nivel_ingles = $_POST['nivel_ingles'];
    $lenguajes_programacion = implode(", ", $_POST['lenguajes_programacion']);
    $aptitudes = $_POST['aptitudes'];
    $habilidades = implode(", ", $_POST['habilidades']);
    $perfil = $_POST['perfil'];

    $sql = "INSERT INTO user_info (nombre_apellidos, fecha_nacimiento, ocupacion,telefono,email, nacionalidad, nivel_ingles, lenguajes_programacion, aptitudes, habilidades, perfil) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

    $stmt = $conn->prepare($sql); // Prepara una consulta
    // Vincular las variables 
    $stmt->bind_param("sssssssssss", $nombre_apellidos, $fecha_nacimiento, $ocupacion, $telefono,$email, $nacionalidad, $nivel_ingles, $lenguajes_programacion, $aptitudes, $habilidades, $perfil);

    if ($stmt->execute()) {
        echo "Datos guardados exitosamente. <a href='display_cv.php'>Ver CV</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>