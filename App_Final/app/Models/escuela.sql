-- ===========================================
-- Base de datos para sistema escolar
-- Control de Materias y Calificaciones
-- ===========================================
CREATE DATABASE IF NOT EXISTS gestion_escuela
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_unicode_ci;

USE gestion_escuela;

-- Para pruebas: eliminar tablas si existen
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS calificaciones;
DROP TABLE IF EXISTS pagos;
DROP TABLE IF EXISTS materias;
DROP TABLE IF EXISTS alumnos;
DROP TABLE IF EXISTS usuarios;
SET FOREIGN_KEY_CHECKS = 1;

-- Tabla usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('Administrador','Control Escolar','Profesor','Tutor','Alumno') NOT NULL,
    info_extra JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla alumnos
CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricula VARCHAR(20) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    grado INT NOT NULL,
    grupo VARCHAR(5) NOT NULL,
    estatus ENUM('activo','inactivo') DEFAULT 'activo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla pagos
CREATE TABLE pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT NOT NULL,
    fecha_pago DATE NOT NULL,
    mes_pagado VARCHAR(20) NOT NULL,
    anio YEAR NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    forma_pago ENUM('efectivo','transferencia') NOT NULL,
    estatus_pago ENUM('pagado','pendiente','vencido') DEFAULT 'pagado',
    FOREIGN KEY (id_alumno) REFERENCES alumnos(id)
      ON UPDATE CASCADE ON DELETE RESTRICT
);

-- Tabla materias
CREATE TABLE materias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    horas_teoricas INT DEFAULT 0,
    horas_practicas INT DEFAULT 0,
    creditos INT DEFAULT 0
);

-- Tabla calificaciones
CREATE TABLE calificaciones (
    id_calificacion INT AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT NOT NULL,
    id_materia INT NOT NULL,
    trimestre VARCHAR(50) NOT NULL,
    calificacion DECIMAL(5,2) NOT NULL CHECK (calificacion >= 0 AND calificacion <= 10),
    FOREIGN KEY (id_alumno) REFERENCES alumnos(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_materia) REFERENCES materias(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Datos de ejemplo
INSERT INTO alumnos (matricula, nombre, apellido, grado, grupo) VALUES
('A001', 'Juan', 'Pérez', 3, 'A'),
('A002', 'María', 'López', 4, 'B'),
('A003', 'Carlos', 'Hernández', 5, 'A');

INSERT INTO materias (nombre, descripcion, horas_teoricas, horas_practicas, creditos) VALUES
('Matemáticas', 'Operaciones básicas y problemas', 4, 2, 6),
('Español', 'Lectura y escritura', 3, 2, 5),
('Ciencias Naturales', 'Conocimiento del medio ambiente', 2, 3, 5);

INSERT INTO calificaciones (id_alumno, id_materia, trimestre, calificacion) VALUES
(1, 1, 'Primer Trimestre', 9.5),
(1, 2, 'Primer Trimestre', 8.8),
(2, 1, 'Primer Trimestre', 9.0),
(3, 3, 'Primer Trimestre', 7.5);
