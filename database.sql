CREATE DATABASE website_kdrama;

USE website_kdrama;

CREATE TABLE user (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL CHECK (nama REGEXP '^[A-Za-z ]+$'),
    username VARCHAR(25) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

CREATE TABLE film (
    film_id INT PRIMARY KEY AUTO_INCREMENT,
    judul VARCHAR(255) NOT NULL,
    tahun_rilis YEAR,
    rating_usia VARCHAR(10),
    jumlah_season INT,
    genre VARCHAR(255),
    sinopsis TEXT,
    aktor VARCHAR(255),
    director VARCHAR(255),
    link VARCHAR(255),
    gambar VARCHAR(255) -- Masukkin directory file foto nya
);

CREATE TABLE comment (
    comment_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    film_id INT,
    komentar TEXT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (film_id) REFERENCES film(film_id)
);

CREATE TABLE myList (
    myList_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    film_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (film_id) REFERENCES film(film_id)
);