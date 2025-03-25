DROP DATABASE IF EXISTS tabor_db;
CREATE DATABASE tabor_db;
USE tabor_db;

CREATE TABLE diakok (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(100) NOT NULL,
    kor INT NOT NULL
);

CREATE TABLE jelentkezesek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    diakid INT NOT NULL,
    tabor ENUM('Robotika', 'Kézműves', 'Triatlon', 'Néptánc') NOT NULL,
    FOREIGN KEY (diakid) REFERENCES diakok(id)
);

INSERT INTO diakok (nev, kor) VALUES
('Kiss Péter', 14),
('Nagy Anna', 15),
('Szabó Bence', 17),
('Tóth Lili', 18),
('Horváth Zoltán', 16),
('Varga Emma', 14),
('Kovács Dávid', 15),
('Molnár Réka', 17),
('Lakatos Márk', 15),
('Balogh Zsófia', 14);

INSERT INTO jelentkezesek (diakid, tabor) VALUES
(10, 'Robotika'),
(2, 'Kézműves'),
(8, 'Triatlon'),
(4, 'Néptánc'),
(5, 'Robotika'),
(6, 'Kézműves'),
(6, 'Triatlon'),
(8, 'Néptánc'),
(3, 'Robotika'),
(1, 'Kézműves');