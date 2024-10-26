-- Crear la base de datos
CREATE DATABASE torneo_navideno;
USE torneo_navideno;

-- Tabla de equipos
CREATE TABLE equipos (
    id_equipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_equipo VARCHAR(100) NOT NULL,
    imagen VARCHAR(255) NOT NULL
);

-- Tabla de jugadores
CREATE TABLE jugadores (
    id_jugador INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    id_equipo INT NOT NULL,
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo) ON DELETE CASCADE
);

-- Tabla de jornadas
CREATE TABLE jornadas (
    id_jornada INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    descripcion TEXT NOT NULL
);

-- Tabla de puntos por jornada
CREATE TABLE puntos (
    id_puntos INT AUTO_INCREMENT PRIMARY KEY,
    id_jugador INT NOT NULL,
    id_jornada INT NOT NULL,
    puntos INT NOT NULL,
    tipo_tiro ENUM('libre', 'dos puntos', 'tres puntos') NOT NULL,
    FOREIGN KEY (id_jugador) REFERENCES jugadores(id_jugador) ON DELETE CASCADE,
    FOREIGN KEY (id_jornada) REFERENCES jornadas(id_jornada) ON DELETE CASCADE
);
