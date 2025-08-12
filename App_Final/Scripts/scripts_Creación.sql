-- CREACIÓN COMPLETA gestion_escuela
CREATE DATABASE IF NOT EXISTS gestion_escuela DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE gestion_escuela;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS pagos;
DROP TABLE IF EXISTS alumnos;
DROP TABLE IF EXISTS usuarios;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('Administrador','Control Escolar','Profesor','Tutor','Alumno') NOT NULL,
    info_extra JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricula VARCHAR(20) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    estatus ENUM('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    alumno_id INT NOT NULL,
    fecha_pago DATE NOT NULL,
    mes_pagado VARCHAR(20) NOT NULL,
    año INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    forma_pago ENUM('efectivo','transferencia') NOT NULL,
    estatus_pago ENUM('pagado','pendiente','vencido') DEFAULT 'pagado',
    CONSTRAINT fk_pagos_alumno FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
      ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



