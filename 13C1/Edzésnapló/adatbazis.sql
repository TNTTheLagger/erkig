CREATE DATABASE edzesnaplo_db DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE edzesnaplo_db;

CREATE TABLE bejegyzesek (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gyakorlat VARCHAR(255) NOT NULL,
    ismetlesszam INT NOT NULL,
    datum DATE DEFAULT CURRENT_DATE
);