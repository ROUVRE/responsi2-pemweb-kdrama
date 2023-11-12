CREATE DATABASE website_kdrama;

USE website_kdrama;

CREATE TABLE akun (
    id_akun INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(240) NOT NULL,
    username VARCHAR(25) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    password VARCHAR(32) NOT NULL,
    CONSTRAINT cek_nama CHECK (nama REGEXP '^[a-zA-Z ]+$')
);

CREATE TABLE film (
    id_film INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    rating INT CHECK (rating >= 0 AND rating <= 10)
);