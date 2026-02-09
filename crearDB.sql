-- 1. Reiniciar la base de datos
DROP DATABASE IF EXISTS reservas;
CREATE DATABASE reservas;
USE reservas;

-- 2. Crear tabla de usuarios (Motor InnoDB para soportar FK)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- 3. Crear tabla de reservas
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    intervalo INT NOT NULL,
    periodo ENUM('COMIDA', 'CENA', 'TODO'),
    precio DECIMAL(10,2) NOT NULL,
    pagado BOOLEAN DEFAULT FALSE,

    CONSTRAINT fk_usuario_reserva
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    ON DELETE CASCADE ON UPDATE CASCADE,

    CONSTRAINT chk_precio_positivo CHECK (precio >= 0),
    CONSTRAINT chk_intervalo_minimo CHECK (intervalo > 0)
) ENGINE=InnoDB;

-- 4. Insertar datos de prueba
-- Limpieza en los strings: quitado el ")" extra en el email de Rufino
INSERT INTO usuarios (nombre, email) VALUES
('Oskar Prieto', 'oprieto@birt.eus'),
('Rufino Prieoto', 'elribero@gmail.com'),
('Agustina Arto', 'zaratamo@gmail.com');

-- 5. Ejemplo de inserción de reserva (opcional para probar)
INSERT INTO reservas (usuario_id, fecha, hora, intervalo, periodo, precio) VALUES
(1, '2026-03-15', '14:00:00', 2, 'COMIDA', 25.50);

COMMIT;