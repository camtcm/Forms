<?php
require_once 'db_connect.php';

$sql = "SELECT * FROM user_info ORDER BY id DESC LIMIT 1"; // Fila más reciente
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // array a la fila seleccionada
} else {
    echo "No se encontraron datos.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - <?php echo $row['nombre_apellidos']; ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="cv-container">
        <header>
            <div class="image-container">
                <img src="assets/perfil.jfif" alt="<?php echo $row['nombre_apellidos']; ?>">
            </div>
            <div class="header-text">
                <h1><?php echo $row['nombre_apellidos']; ?></h1>
                <p><?php echo $row['ocupacion']; ?></p>
            </div>
        </header>
        <main>
            <aside class="lateral">
                <section>
                    <h2>CONTACTO</h2>
                    <p><img src="assets/telefono.png" alt="Teléfono"> <?php echo $row['telefono']; ?></p>
                    <p><img src="assets/correo.png" alt="Email"> <?php echo $row['email']; ?></p>
                    <p><img src="assets/gps.png" alt="Nacionalidad"> <?php echo $row['nacionalidad']; ?></p>
                </section>
                <section>
                    <h2>IDIOMAS</h2>
                    <p>Español: Nativo</p>
                    <p>Inglés: <?php echo ucfirst($row['nivel_ingles']); ?></p>
                </section>
                <section>
                    <h2>APTITUDES</h2>
                    <p><?php echo $row['aptitudes']; ?></p>
                </section>
                <section>
                    <h2>HABILIDADES</h2>
                    <ul>
                        <?php
                        $habilidades = explode(", ", $row['habilidades']);
                        foreach ($habilidades as $habilidad) {
                            echo "<li>$habilidad</li>";
                        }
                        ?>
                    </ul>
                </section>
            </aside>
            <div class="contenido">
                <section>
                    <h2>PERFIL</h2>
                    <p><?php echo $row['perfil']; ?></p>
                </section>
                <section>
                    <h2>LENGUAJES DE PROGRAMACIÓN</h2>
                    <ul>
                        <?php
                        $lenguajes = explode(", ", $row['lenguajes_programacion']);
                        foreach ($lenguajes as $lenguaje) {
                            echo "<li>$lenguaje</li>";
                        }
                        ?>
                    </ul>
                </section>
            </div>
        </main>
    </div>
</body>
</html>