-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 11:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loa_music_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(0, 'an2122552@gmail.com', '34920', 1649572539),
(0, 'lowzl-am19@student.tarc.edu.my', '89283', 1649572705),
(0, 'lowzhilok@gmail.com', '73714', 1649573011),
(0, 'lowzhilok@gmail.com', '32908', 1649573151),
(0, 'lowzl-am19@student.tarc.edu.my', '94035', 1649573309);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `songs_id` int(11) NOT NULL,
  `songs_name` varchar(255) NOT NULL,
  `songs_times` varchar(255) NOT NULL,
  `songs_images` varchar(255) NOT NULL,
  `songs_release_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`songs_id`, `songs_name`, `songs_times`, `songs_images`, `songs_release_date`) VALUES
(1, '《屌那媽》原曲：PANAMA', '2.26', '../IP_Assignment/images_websites/《屌那媽》原曲：PANAMA︳膠街架PlasticGuys.jpg', '2021'),
(2, 'Bink\'s Sake', '4.44', '../IP_Assignment/images_websites/Bink\'s Sake (from _One Piece_) - Spicy Violin Remix.jpg', '2014'),
(3, 'Dance Planetshakers', '3.55', '../IP_Assignment/images_websites/maxresdefault.jpg', '2014'),
(4, 'Danko - Pump it up', '2.41', '../IP_Assignment/images_websites/Danko - Pump it up (Dastic Remix).jpg', '2020'),
(5, 'El Profesor - Bella Ciao', '2.48', '../IP_Assignment/images_websites/El Profesor - Bella Ciao (HUGEL Remix) [Lyric Video].jpg', '2018'),
(6, 'Eurythmics X David Guetta X Steve Aoki', '3.16', '../IP_Assignment/images_websites/Eurythmics X David Guetta X Steve Aoki - Sweet Boneless Bitch (Dopelore Rebuilt Bootleg).jpg', '2020'),
(7, 'Last Resort vs Smooth Criminal', '3.52', '../IP_Assignment/images_websites/Last Resort vs Smooth Criminal (Dimitri Vegas & Like Mike Mashup) Tomorrowland 2017.jpg', '2017'),
(8, 'Madeon - Finale', '3.23', '../IP_Assignment/images_websites/Madeon - Finale.jfif', '2012'),
(9, 'Oh The Larceny - Another Level', '3.10', '../IP_Assignment/images_websites/Oh The Larceny - Another Level (Official Audio) [Music used by DudePerfect].jpg', '2019'),
(10, 'Oh The Larceny - Check It Out', '2.41', '../IP_Assignment/images_websites/Oh The Larceny - Check It Out (Official Audio) [Dirt 5, Dude Perfect, NASCAR Heat Music).jpg', '2017'),
(11, 'Oh The Larceny - Real Good Feeling', '3.14', '../IP_Assignment/images_websites/Oh The Larceny - Real Good Feeling (Official Audio) [PewDiePie Wedding Video Song!].jpg', '2019'),
(12, 'Oh The Larceny - This Is It', '2.49', '../IP_Assignment/images_websites/Oh The Larceny - This Is It (Official Audio).jpg', '2019'),
(13, 'One Piece - Luffy Moukou', '2.42', '../IP_Assignment/images_websites/One Piece - Luffy Moukou (Paralax Remix).jpg', '2021'),
(14, 'One Piece – Onigashima Queen Dance Theme', '4.10', '../IP_Assignment/images_websites/One Piece – Onigashima Queen Dance Theme _ HQ Ost Remake.jpg', '2021'),
(15, 'One Piece - Welcome To  Wano Theme', '4.07', '../IP_Assignment/images_websites/One Piece - Welcome To  Wano Theme (Extended).jpg', '2022'),
(16, 'One Piece Epic Battle Theme', '2.37', '../IP_Assignment/images_websites/One Piece Epic Battle Theme [REMIX].jpg', '2019'),
(17, 'Prezioso & Marvin - The Riddle', '5.27', '../IP_Assignment/images_websites/Prezioso & Marvin - The Riddle (Dopedrop Bootleg) [Bass Boosted].jpg', '2009'),
(18, 'Red Hot Chili Peppers - Snow', '3.17', '../IP_Assignment/images_websites/Red Hot Chili Peppers - Snow (Hey Oh) (Oskar Strandh Remix).jpg', '2006'),
(19, 'Syzz - Gimme Gimme Gimme', '2.48', '../IP_Assignment/images_websites/Syzz - Gimme Gimme Gimme (Club Mix).jpg', '2020'),
(20, 'The Kid Laroi - Stay', '3.23', '../IP_Assignment/images_websites/The Kid Laroi - Stay (Colin Hennerz Remix).jpg', '2020'),
(21, 'The Score - The Champion X Legend', '3.04', '../IP_Assignment/images_websites/The Score - The Champion X Legend (Mashup by MarB).jpg', '2020'),
(22, 'Wake - Hillsong Young', '4.35', '../IP_Assignment/images_websites/Wake - Hillsong Young & Free ♪.jfif', '2013'),
(23, 'We Will Rock You', '4.25', '../IP_Assignment/images_websites/We Will Rock You - Queen _ Rockin\'1000 at Stade De France.jpg', '1977');

-- --------------------------------------------------------

--
-- Table structure for table `upload_song`
--

CREATE TABLE `upload_song` (
  `songs_id` int(11) NOT NULL,
  `songs_name` varchar(255) NOT NULL,
  `newSongs` varchar(255) NOT NULL,
  `songs_times` varchar(255) NOT NULL,
  `songs_images` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_song`
--

INSERT INTO `upload_song` (`songs_id`, `songs_name`, `newSongs`, `songs_times`, `songs_images`, `release_date`) VALUES
(4, 'VALHALLA CALLING', '../../uploadAudio/VALHALLA CALLING.mp3', '3:47', '../../upload_Images/maxresdefault.jpg', '2022'),
(5, 'Windy Hill', '../../uploadAudio/Windy hill.mp3', '5:02', '../../upload_Images/maxresdefault (1).jpg', '2022'),
(9, 'WELLERMAN', '../../uploadAudio/WELLERMAN.mp3', '2:38', '../../upload_Images/WELLERMAN (Sea Shanty).jpg', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `role_as`, `status`, `created_at`) VALUES
(4, 'Low', 'Zhi Lok', 'lowzhilok@gmail.com', '12345', 1, 0, '2022-03-24 12:25:18'),
(5, 'Loi', 'Theen', 'an2122552@gmail.com', '12345', 0, 0, '2022-03-24 12:25:51'),
(6, 'testing', 'Login', 'login@gmail.com', '12345', 0, 0, '2022-03-25 13:10:24'),
(7, 'gg', 'testing', 'lowzl-am19@student.tarc.edu.my', '123456', 0, 0, '2022-04-10 06:37:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`songs_id`);

--
-- Indexes for table `upload_song`
--
ALTER TABLE `upload_song`
  ADD PRIMARY KEY (`songs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `songs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `upload_song`
--
ALTER TABLE `upload_song`
  MODIFY `songs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
