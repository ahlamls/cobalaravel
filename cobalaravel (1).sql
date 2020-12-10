-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2020 at 05:27 PM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobalaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `commentcount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `content`, `time`, `commentcount`) VALUES
(3, 1, 'Test Kedua', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mi ante, sollicitudin sed nisl sed, dignissim vulputate nulla. Aliquam at mi dapibus, volutpat augue sit amet, sollicitudin nisl. Nullam hendrerit dui odio, nec lacinia neque luctus vitae. Duis dapibus quis dolor eget posuere. Sed augue magna, faucibus at sollicitudin vitae, lobortis et neque. Pellentesque sed accumsan turpis. Vivamus aliquet laoreet lacus, vel varius lectus lobortis ac. Fusce ultricies urna vitae ullamcorper fermentum. Cras ultrices rhoncus erat, id malesuada nisi cursus eget. Aliquam ut orci sed ante varius posuere. Aenean sit amet sodales arcu, ut eleifend dolor. Integer vitae vestibulum arcu. Praesent tincidunt, risus eu fermentum facilisis, ex dolor consectetur dui, ut rhoncus neque nisl sed tellus. Aenean tellus lectus, tempor egestas fermentum vitae, faucibus id sapien. Aenean pharetra sed felis quis laoreet. Fusce lacus eros, iaculis et rutrum eget, consectetur eget dolor.\r\n\r\nUt feugiat et neque quis sagittis. Praesent eget enim facilisis, posuere urna a, sagittis libero. Cras tincidunt porta nibh, et dapibus enim rutrum eu. Curabitur aliquet velit ac elit iaculis, eu mattis urna porta. Aliquam sed ipsum nec nunc vulputate pretium. Vivamus hendrerit mauris arcu, vitae rhoncus orci volutpat venenatis. Pellentesque tincidunt, massa ac consequat commodo, nibh urna cursus sapien, ac fringilla orci enim id nisi.', '2020-12-10 12:06:51', 0),
(5, 1, 'Hello World 2nd', 'Hello world for the second time\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tempus sapien eget purus dapibus, nec accumsan urna suscipit. Sed tempor lacus nunc, venenatis dictum est venenatis non. Pellentesque massa est, luctus vel augue lacinia, ullamcorper imperdiet elit. Nam turpis velit, feugiat eu elit et, aliquet dapibus est. In ac condimentum lorem. In vehicula pretium nibh, id viverra diam aliquet nec. In imperdiet vestibulum metus eleifend accumsan. Vestibulum rutrum enim at nulla ultrices, in cursus erat laoreet. Aenean rutrum nisl sed euismod tempus. Nunc convallis scelerisque convallis. Maecenas sodales nisl at odio egestas eleifend. Donec eu tellus posuere, maximus ipsum vitae, tempor justo. Integer at sem quis dolor efficitur gravida eget quis massa. Donec fermentum velit in nunc elementum dictum. Donec dignissim enim massa, ut ullamcorper mi congue ut. Sed eget tristique felis.\r\n\r\nCras eros augue, elementum sed scelerisque et, placerat a velit. Praesent malesuada magna nec magna dignissim ullamcorper. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus eu ornare mauris. Aenean vulputate dolor at sapien commodo, in pulvinar ex interdum. Curabitur nunc diam, porta eget orci sit amet, ullamcorper volutpat leo. Vestibulum facilisis magna vel ligula tempor laoreet.', '2020-12-10 14:12:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`) VALUES
(1, 'test', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', 'Test Test'),
(2, 'coba', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', 'Coba Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
