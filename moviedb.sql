-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 08:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(254) NOT NULL,
  `username` varchar(250) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `username`, `pass`) VALUES
('Sanj', 'Sanj3101', 'Sanj3101'),
('Prishi', 'Prishi3089', 'Prishi3089');

-- --------------------------------------------------------

--
-- Table structure for table `moviedetails`
--

CREATE TABLE `moviedetails` (
  `mid` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `moviename` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `language` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `stars` text NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `moviedetails`
--

INSERT INTO `moviedetails` (`mid`, `image`, `moviename`, `year`, `language`, `duration`, `genre`, `director`, `stars`, `summary`) VALUES
(1, 'images\\image26.jpg', 'Spirited Away', '2001', 'Japanese', '2h 5min', 'Fantasy/Adventure', 'Hayao Miyazaki', 'Rumi Hiiragi, Miyu Irino, Mari Natsuki', 'A young girl, Chihiro, enters a mysterious world of spirits and must navigate a bathhouse run by a witch to save her parents.'),
(2, 'images\\image27.jpg', 'My Neighbor Totoro', '1988', 'Japanese', '1h 26min', 'Fantasy/Family', 'Hayao Miyazaki', 'Noriko Hidaka, Chika Sakamoto, Shigesato Itoi', 'Two sisters move to the countryside and befriend the gentle forest spirit Totoro while waiting for their mother’s recovery.'),
(3, 'images\\image28.jpg', 'Princess Mononoke', '1997', 'Japanese', '2h 14min', 'Fantasy/Adventure', 'Hayao Miyazaki', 'Y?ji Matsuda, Yuriko Ishida, Y?ko Tanaka', 'A young warrior, cursed by a demon, travels to the west and becomes embroiled in a conflict between industrial progress and nature’s spirits.'),
(4, 'images\\image29.jpg', 'Howls Moving Castle', '2004', 'Japanese', '1h 59min', 'Fantasy/Romance', 'Hayao Miyazaki', 'Chieko Baisho, Takuya Kimura, Akihiro Miwa', 'A young woman, cursed by a witch, seeks refuge in a wizard’s moving castle and finds love and adventure.'),
(5, 'images\\image30.jpg', 'Kikis Delivery Service', '1989', 'Japanese', '1h 43min', 'Fantasy/Family', 'Hayao Miyazaki', 'Minami Takayama, Rei Sakuma, Kappei Yamaguchi', 'A young witch, Kiki, moves to a new city to start her own delivery service using her flying broomstick.'),
(6, 'images\\image31.jpg', 'Nausicaä of the Valley of the Wind', '1984', 'Japanese', '1h 57min', 'Fantasy/Sci-Fi', 'Hayao Miyazaki', 'Sumi Shimamoto, Gor? Naya, Mahito Tsujimura', 'In a post-apocalyptic world, a princess fights to protect her people and a toxic jungle from a warring kingdom.'),
(7, 'images\\image32.jpg', 'Castle in the Sky', '1986', 'Japanese', '2h 5min', 'Fantasy/Adventure', 'Hayao Miyazaki', 'Mayumi Tanaka, Keiko Yokozawa, Kotoe Hatsui', 'A boy and a girl search for the legendary floating city of Laputa while being chased by pirates and the government.'),
(8, 'images\\image33.jpg', 'The Wind Rises', '2013', 'Japanese', '2h 6min', 'Biography/Drama', 'Hayao Miyazaki', 'Hideaki Anno, Miori Takimoto, Hidetoshi Nishijima', 'A biopic of Jiro Horikoshi, the designer of Japan’s WWII fighter planes, exploring his dreams and the reality of war.'),
(9, 'images\\image34.jpg', 'The Tale of the Princess Kaguya', '2013', 'Japanese', '2h 17min', 'Fantasy/Drama', 'Isao Takahata', 'Aki Asakura, Kengo Kora, Takeo Chii', 'A bamboo cutter finds a tiny girl inside a bamboo shoot, and she grows into a beautiful princess with a mysterious past.'),
(10, 'images\\image35.jpg', 'Ponyo', '2008', 'Japanese', '1h 41min', 'Fantasy/Adventure', 'Hayao Miyazaki', 'Yuria Nara, Hiroki Doi, George Tokoro', 'A young goldfish named Ponyo dreams of becoming human and befriends a boy named S?suke.'),
(11, 'images\\image36.jpg', 'Whisper of the Heart', '1995', 'Japanese', '1h 51min', 'Romance/Drama', 'Yoshifumi Kond?', 'Yoko Honna, Issei Takahashi, Takashi Tachibana', 'A young girl discovers a mysterious antique shop and meets a boy who inspires her to pursue her dreams.'),
(12, 'images\\image37.jpg', 'The Secret World of Arrietty', '2010', 'Japanese', '1h 34min', 'Fantasy/Adventure', 'Hiromasa Yonebayashi', 'Mirai Shida, Ryunosuke Kamiki, Tomokazu Miura', 'A tiny borrower named Arrietty lives under a house and befriends a human boy, risking exposure.'),
(13, 'images\\image38.jpg', 'When Marnie Was There', '2014', 'Japanese', '1h 43min', 'Drama/Mystery', 'Hiromasa Yonebayashi', 'Sara Takatsuki, Kasumi Arimura, Nanako Matsushima', 'A lonely girl named Anna meets a mysterious blonde girl, Marnie, who changes her life forever.'),
(14, 'images\\image39.jpg', 'Only Yesterday', '1991', 'Japanese', '1h 58min', 'Drama/Romance', 'Isao Takahata', 'Miki Imai, Toshiro Yanagiba, Yoko Honna', 'A woman reflects on her childhood memories while visiting the countryside, discovering the joys of rural life.'),
(15, 'images\\image40.jpg', 'Porco Rosso', '1992', 'Japanese', '1h 34min', 'Adventure/Comedy', 'Hayao Miyazaki', 'Shuichiro Moriyama, Tokiko Kato, Akemi Okamura', 'An Italian World War I pilot, cursed to look like a pig, fights sky pirates and struggles with his past.');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `moviename` varchar(250) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `rating` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`moviename`, `username`, `rating`) VALUES
('Spirited Away', 'user', 4.6),
('My Neighbor Totoro', 'user', 4.1),
('Princess Mononoke', 'user', 4.3),
('Howls Moving Castle', 'user', 4.2),
('Kikis Delivery Service', 'user', 3.8),
('Nausicaä of the Valley of the Wind', 'user', 4),
('Castle in the Sky', 'user', 4),
('The Wind Rises', 'user', 3.7),
('The Tale of the Princess Kaguya', 'user', 4),
('Ponyo', 'user', 3.6),
('Whisper of the Heart', 'user', 4.9),
('The Secret World of Arrietty', 'user', 4.6),
('When Marnie Was There', 'user', 3.7),
('Only Yesterday', 'user', 3.6),
('Porco Rosso', 'user', 3.7);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `userid` varchar(50) NOT NULL,
  `movieid` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`userid`, `movieid`, `review`) VALUES
('user1', 1, 'awesome'),
('user1', 2, 'very nice'),
('user2', 1, 'very very nice');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `gen` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `email` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `firstname`, `lastname`, `gen`, `birthdate`, `email`, `username`, `pass`) VALUES
(1, 'debalina', 'abc', 'female', '2015-03-16', 'user@user', 'user1', 'user1'),
(2, 'Sakshi', '123', 'female', '1999-03-23', 'user@user.com', 'user2', 'user2'),
(3, 'user', '123', 'male', '1999-03-23', 'user@user.com', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moviedetails`
--
ALTER TABLE `moviedetails`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD KEY `movieid` (`movieid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`movieid`) REFERENCES `moviedetails` (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;