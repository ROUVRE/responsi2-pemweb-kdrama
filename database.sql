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
    banner VARCHAR(255) NOT NULL, --Masukin direktori file jpg
    poster VARCHAR(255) NOT NULL, --Masukin direktori file jpg
    director VARCHAR(225),
    cast VARCHAR(1000),
    release_date DATE,
    usia VARCHAR(10),
    genre VARCHAR(255),
    link VARCHAR(255),
    sinopsis TEXT
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