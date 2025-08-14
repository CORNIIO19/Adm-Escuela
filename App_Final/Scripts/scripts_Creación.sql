-- CREACIÓN COMPLETA gestion_escuela
CREATE DATABASE IF NOT EXISTS gestion_escuela DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;
USE gestion_escuela;
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS pagos;
DROP TABLE IF EXISTS alumnos;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS calificaciones;
DROP TABLE IF EXISTS materias;
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
    grado INT NOT NULL,
    grupo VARCHAR(5) NOT NULL,
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

CREATE TABLE calificaciones (
    id_calificacion INT AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT NOT NULL,
    id_materia INT NOT NULL,
    trimestre VARCHAR(50) NOT NULL,
    calificacion DECIMAL(5,2) NOT NULL CHECK (calificacion >= 0 AND calificacion <= 10),
    FOREIGN KEY (id_alumno) REFERENCES alumnos(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_materia) REFERENCES materias(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE materias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    horas_teoricas INT DEFAULT 0,
    horas_practicas INT DEFAULT 0,
    creditos INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS notificaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    mensaje TEXT NOT NULL,
    tipo ENUM('informativa','alerta','recordatorio') DEFAULT 'informativa',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_envio DATETIME DEFAULT NULL,
    usuario_creador_id INT DEFAULT NULL,
    estatus ENUM('activa','inactiva','eliminada') DEFAULT 'activa',
    CONSTRAINT fk_notificaciones_usuario_creador FOREIGN KEY (usuario_creador_id) REFERENCES usuarios(id)
        ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS notificaciones_usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    notificacion_id INT NOT NULL,
    usuario_id INT NOT NULL,
    leida TINYINT(1) DEFAULT 0,
    fecha_leida DATETIME DEFAULT NULL,
    fecha_enviada DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_notif_usuarios_notif FOREIGN KEY (notificacion_id) REFERENCES notificaciones(id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_notif_usuarios_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS profesores (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        apellido VARCHAR(100) NOT NULL,
        estatus ENUM('activo','inactivo') DEFAULT 'activo',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de grupos
CREATE TABLE IF NOT EXISTS grupos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        turno ENUM('matutino','vespertino') NOT NULL,
        cupo INT NOT NULL,
        cupo_disponible INT NOT NULL,
        estatus ENUM('activo','inactivo') DEFAULT 'activo',
        profesor_id INT DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT fk_grupos_profesor FOREIGN KEY (profesor_id) REFERENCES profesores(id)
            ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de asignación de alumnos a grupos
CREATE TABLE IF NOT EXISTS alumnos_grupos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        alumno_id INT NOT NULL,
        grupo_id INT NOT NULL,
    fecha_asignacion DATE,
        CONSTRAINT fk_alumno_grupo_alumno FOREIGN KEY (alumno_id) REFERENCES alumnos(id)
            ON UPDATE CASCADE ON DELETE CASCADE,
        CONSTRAINT fk_alumno_grupo_grupo FOREIGN KEY (grupo_id) REFERENCES grupos(id)
            ON UPDATE CASCADE ON DELETE CASCADE,
        UNIQUE KEY unique_alumno_grupo (alumno_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de asignación de profesores a grupos (histórico)
CREATE TABLE IF NOT EXISTS profesores_grupos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        profesor_id INT NOT NULL,
        grupo_id INT NOT NULL,
    fecha_asignacion DATE,
        CONSTRAINT fk_profesor_grupo_profesor FOREIGN KEY (profesor_id) REFERENCES profesores(id)
            ON UPDATE CASCADE ON DELETE CASCADE,
        CONSTRAINT fk_profesor_grupo_grupo FOREIGN KEY (grupo_id) REFERENCES grupos(id)
            ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios (username, password, nombre, tipo, info_extra)
VALUES ('admin', 'admin123', 'Administrador General', 'Administrador', NULL);