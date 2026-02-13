-- 1. Borra la base de datos "reservas" si existe y crea la base de datos "reserva" nueva
DROP DATABASE IF EXISTS reservas;
CREATE DATABASE IF NOT EXISTS reservas;
USE reservas;

-- 2. Crear tabla de usuarios (Motor InnoDB para soportar FK)
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- 3. Crear tabla de reservas
CREATE TABLE IF NOT EXISTS reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    pagado BOOLEAN DEFAULT FALSE,

    CONSTRAINT fk_usuario_reserva
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
    ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE=InnoDB;

-- 4. Insertar datos de prueba en la tabla usuarios
INSERT INTO usuarios (nombre, email) VALUES
('Oskar Prieto', 'oprieto@birt.eus'),
('Rufino Prieto', 'elribero@gmail.com'),
('Agustina Arto', 'zaratamo@gmail.com');

-- 5. Insertar datos de prueba en la tabla reservas
INSERT INTO reservas (id_usuario, fecha, hora, pagado) VALUES
(1, '2026-03-15', '14:00:00', FALSE),
(1, '2026-03-16', '14:00:00', FALSE),
(2, '2026-03-16', '20:00:00', FALSE),
(2, '2026-04-04', '15:00:00', FALSE),
(3, '2026-04-16', '14:00:00', FALSE),
(3, '2026-04-16', '20:00:00', FALSE),
(1, '2026-05-04', '15:00:00', FALSE),
(1, '2026-05-16', '14:00:00', FALSE),
(2, '2026-05-16', '20:00:00', FALSE),
(3, '2026-06-04', '15:00:00', FALSE);

COMMIT;