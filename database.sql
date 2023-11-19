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
    sutradara VARCHAR(40) NOT NULL,
    tahun_rilis YEAR NOT NULL,
    rating INT CHECK (rating >= 0 AND rating <= 10)
);

CREATE TABLE aktor (
    id_aktor INT PRIMARY KEY,
    nama_aktor VARCHAR(255) NOT NULL
);

CREATE TABLE film_aktor (
    id_film INT,
    id_aktor INT,
    PRIMARY KEY (id_film, id_aktor),
    FOREIGN KEY (id_film) REFERENCES film(id_film),
    FOREIGN KEY (id_aktor) REFERENCES aktor(id_aktor)
);

CREATE TABLE review (
    id_review INT AUTO_INCREMENT PRIMARY KEY,
    id_film INT,
    user VARCHAR(255) NOT NULL,
    nilai INT CHECK (nilai >= 0 AND nilai <= 10),
    komentar TEXT,
    waktu_review TIMESTAMP,
    FOREIGN KEY (id_film) REFERENCES film(id_film)
);

CREATE TABLE list_kustom (
    id_list INT PRIMARY KEY NOT NULL,
    id_akun INT,
    judul_list VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_akun) REFERENCES akun(id_akun)
);

CREATE TABLE film_dalam_list (
    id_listed_film INT PRIMARY KEY,
    id_list INT,
    id_film INT,
    FOREIGN KEY (id_list) REFERENCES list_kustom(id_list),
    FOREIGN KEY (id_film) REFERENCES film(id_film)
);