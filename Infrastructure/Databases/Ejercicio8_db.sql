Create database Ejercicio8;

Use Ejercicio8;

CREATE TABLE Estudiantes (
    cedula INT PRIMARY KEY,
    Username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    rol VARCHAR(50) NOT NULL,
    id INT AUTO_INCREMENT UNIQUE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(15),
    estado VARCHAR(50) DEFAULT 'activo',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP  -- Automatiza la fecha de registro
);

CREATE TABLE Proyecto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    presupuesto FLOAT NOT NULL,
    duracion INT NOT NULL,
    fecha_inicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES estudiantes(id)
);

ALTER TABLE estudiantes AUTO_INCREMENT = 1;


Drop table Estudiantes;
Drop table proyecto;