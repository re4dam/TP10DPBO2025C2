CREATE DATABASE db_jodoh;
USE db_jodoh;

CREATE TABLE degenerate (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    height INT NOT NULL,  -- Assuming height is in centimeters
    weight INT NOT NULL,  -- Assuming weight is in kilograms
    kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL  -- Gender options
);

CREATE TABLE haluan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    asal VARCHAR(100) NOT NULL,  -- Origin or background
    kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,  -- Gender options
    stereotipe VARCHAR(255) NOT NULL  -- Stereotype description
);

CREATE TABLE jodoh (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_degenerate INT NOT NULL,
    id_haluan INT NOT NULL,
    FOREIGN KEY (id_degenerate) REFERENCES degenerate(id),
    FOREIGN KEY (id_haluan) REFERENCES haluan(id)
);

-- Example Inserts
INSERT INTO degenerate (name, height, weight, kelamin) VALUES 
('Degenerate 1', 170, 70, 'Laki-laki'),
('Degenerate 2', 160, 55, 'Perempuan');

INSERT INTO haluan (name, asal, kelamin, stereotipe) VALUES 
('Haluan 1', 'Jakarta', 'Perempuan', 'Stereotype A'),
('Haluan 2', 'Bandung', 'Laki-laki', 'Stereotype B');

-- Example relationship between degenerate and haluan
INSERT INTO jodoh (id_degenerate, id_haluan) VALUES
(1, 1),  -- Degenerate 1 with Haluan 1
(2, 2);  -- Degenerate 2 with Haluan 2
