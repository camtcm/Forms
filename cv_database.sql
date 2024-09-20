CREATE TABLE user_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_apellidos VARCHAR(255) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    ocupacion VARCHAR(255) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    nacionalidad VARCHAR(100) NOT NULL,
    nivel_ingles ENUM('básico', 'intermedio', 'avanzado', 'fluido') NOT NULL,
    lenguajes_programacion TEXT NOT NULL,
    aptitudes TEXT NOT NULL,
    habilidades TEXT NOT NULL,
    perfil TEXT NOT NULL
);