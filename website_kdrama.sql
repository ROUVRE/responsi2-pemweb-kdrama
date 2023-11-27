-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 03:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_kdrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `film_id`, `komentar`, `rating`) VALUES
(13, 2, 2, 'Bagus tapi kurang actionnya', 4),
(14, 2, 9, 'i mean it\'s alright', 3),
(15, 3, 9, 'omaga', 5);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `director` varchar(225) DEFAULT NULL,
  `cast` varchar(1000) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `usia` varchar(10) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `judul`, `banner`, `poster`, `director`, `cast`, `release_date`, `usia`, `genre`, `link`, `sinopsis`) VALUES
(2, 'Reply 1988', 'banner.jpg', 'poster.jpg', 'Shin Won-ho', 'Lee Hye-ri, Ryu Jun-yeol, Go Kyung-pyo, Park Bo-gum, Lee Dong-hwi', '2015-11-06', '13+', 'Komedi, romance, family drama', 'https://www.netflix.com/id/title/80188351', 'Drama ini mengikuti kehidupan 5 keluarga yang tinggal di jalan yang sama di sebuah lingkungan. Sebuah nostalgia membuat mereka mengingat kembali tahun 1988. Ketika sekelompok teman tersebut terlibat dan keluar dari kenakalan, pengalaman apa yang akan mereka bawa dalam kehidupan mereka di masa depan?'),
(9, 'My Mister', 'my-mister-banner.jpg', 'My-Mister.jpg', 'Kim Won-seok', 'Lee Sun-kyun, Lee Ji-eun', '2018-03-21', '15+', 'Psychological', 'https://www.netflix.com/id/title/81267691', 'Di dunia yang tak bersahabat, rasa kekeluargaan tumbuh dalam diri seorang wanita muda dan pria paruh baya yang menemukan kehangatan dan kenyamanan antara satu sama lain.'),
(11, 'Alchemy Of Souls', 'alchemy-of-souls-banner.jpeg', 'Alchemy_of_Souls_poster.jpeg', 'Park Joon-hwa', 'Lee Jae-wook, Jung So-min, Go Youn-jung, Hwang Min-hyun', '2022-06-18', '15+', 'Romance, fantasy, action', 'https://www.netflix.com/id/title/81517188', 'Seorang penyihir wanita sakti dalam tubuh wanita buta bertemu seorang pria dari keluarga kelas atas, yang menginginkan bantuan si penyihir untuk mengubah nasibnya.');

-- --------------------------------------------------------

--
-- Table structure for table `mylist`
--

CREATE TABLE `mylist` (
  `myList_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mylist`
--

INSERT INTO `mylist` (`myList_id`, `user_id`, `film_id`) VALUES
(5, 3, 2),
(6, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL CHECK (`nama` regexp '^[A-Za-z ]+$'),
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'adminpass', 'admin'),
(2, 'Reyno Marchelian', 'ROUVRE04', 'pass', 'user'),
(3, 'Reyno', 'gamer', 'gamer', 'user'),
(4, 'nama', 'nama2', 'pass', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexes for table `mylist`
--
ALTER TABLE `mylist`
  ADD PRIMARY KEY (`myList_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mylist`
--
ALTER TABLE `mylist`
  MODIFY `myList_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`);

--
-- Constraints for table `mylist`
--
ALTER TABLE `mylist`
  ADD CONSTRAINT `mylist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `mylist_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `film` (`film_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
