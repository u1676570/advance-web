-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 02:59 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jassimbooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorid` int(5) NOT NULL,
  `authorname` varchar(50) NOT NULL,
  `authordob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorid`, `authorname`, `authordob`) VALUES
(1, 'Kennedy Ryan', '1988-10-02'),
(2, 'Jaci Burton', '1988-09-03'),
(3, 'Lisa Brennan', '1985-01-10'),
(4, 'Maxwell King', '1989-05-07'),
(5, 'Ngozi Ukazu', '1989-09-06'),
(6, 'Whitney Gardner', '1988-12-03'),
(7, 'Merve Emre', '1980-10-12'),
(8, 'Neil deGrasse Tyson', '1975-12-28'),
(9, 'Robert Galbraith', '1965-06-30'),
(10, 'Kate Morton', '1990-03-05'),
(11, 'Ellen Hopkins', '1955-02-10'),
(12, 'Atticus Poetry', '1978-08-15'),
(13, 'Courtney Summers', '1975-11-10'),
(14, 'Mary Kubica', '1980-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(5) NOT NULL,
  `title` text NOT NULL,
  `isbn` int(11) NOT NULL,
  `language` varchar(30) NOT NULL,
  `pages` int(11) NOT NULL,
  `publishdate` date NOT NULL,
  `authorid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `isbn`, `language`, `pages`, `publishdate`, `authorid`) VALUES
(1, 'Block Shot', 1732144311, 'English', 444, '2018-09-10', 1),
(2, 'Hope Flames', 425259765, 'English', 320, '2014-01-07', 2),
(3, 'Riding Wild', 425219313, 'English', 278, '2008-02-08', 2),
(5, 'The Clockmaker\'s Daughter', 1451649398, 'English', 485, '2018-10-05', 10),
(6, 'Small Fry', 802128238, 'English', 400, '2018-09-04', 3),
(7, 'The Good Neighbor: The Life and Work of Fred Roger', 1419727729, 'English', 416, '2018-09-04', 4),
(8, 'Check, Please!:', 1250177952, 'English', 288, '2018-09-18', 5),
(9, 'Fake Blood', 1481495569, 'English', 300, '2018-09-04', 6),
(10, 'The Personality Brokers: The Strange History of Myers', 385541902, 'English', 288, '2018-09-11', 7),
(11, 'Accessory to War: The Unspoken Alliance Between Astrophysics and the Military', 393064441, 'English', 576, '2018-09-11', 8),
(12, 'Sadie', 1250105714, 'English', 300, '2018-09-04', 13),
(13, 'The Good Girl', 778316556, 'English', 352, '2014-07-09', 14),
(14, 'People Kill People', 1481442937, 'English', 431, '2018-08-11', 11),
(15, 'The Dark Between Stars', 1982104864, 'English', 239, '2018-08-04', 12),
(16, 'When the Lights Go Out', 525219414, 'English', 384, '2018-02-02', 14);

-- --------------------------------------------------------

--
-- Table structure for table `book_genre`
--

CREATE TABLE `book_genre` (
  `id` int(11) NOT NULL,
  `bookid` int(5) NOT NULL,
  `genreid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_genre`
--

INSERT INTO `book_genre` (`id`, `bookid`, `genreid`) VALUES
(1, 1, 8),
(3, 5, 3),
(4, 6, 4),
(5, 7, 5),
(6, 8, 6),
(7, 9, 7),
(8, 10, 8),
(9, 11, 4),
(10, 12, 5),
(11, 13, 7),
(12, 14, 4),
(13, 15, 2),
(14, 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreid` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreid`, `name`, `description`) VALUES
(1, 'Fiction', 'Fiction is the telling of stories which are not real. More specifically, fiction is an imaginative form of narrative, one of the four basic rhetorical modes. Although the word fiction is derived from the Latin fingo, fingere, finxi, fictum, \"to form, create\", works of fiction need not be entirely imaginary and may include real people, places, and events.'),
(2, 'Biography', 'A biography (from the Greek words bios meaning \"life\", and graphos meaning \"write\") is an account of a person\'s life, usually published in the form of a book or essay, or in some other form, such as a film.'),
(3, 'Comics', 'A comic book or comicbook, also called comic magazine or simply comic, is a publication that consists of comic art in the form of sequential juxtaposed panels that represent individual scenes. Panels are often accompanied by brief descriptive prose and written narrative, usually dialog contained in word balloons emblematic of the comics art form.'),
(4, 'History', 'History (from Greek iotopia - historia, meaning inquiry, knowledge acquired by investigation) is the discovery, collection, organization, and presentation of information about past events. History can also mean the period of time after writing was invented. Scholars who write about history are called historians. '),
(5, 'Mystery', 'Mystery fiction is a loosely-defined term that is often used as a synonym of detective fiction - in other words a novel or short story in which a detective (either professional or amateur) solves a crime. '),
(6, 'Poetry', 'Poetry is a form of literary art in which language is used for its aesthetic and evocative qualities in addition to, or in lieu of, its apparent meaning. Poetry may be written independently, as discrete poems, or may occur in conjunction with other arts, as in poetic drama, hymns or lyrics.\r\n'),
(7, 'Thriller', 'Thrillers are characterized by fast pacing, frequent action, and resourceful heroes who must thwart the plans of more-powerful and better-equipped villains. Literary devices such as suspense, red herrings and cliffhangers are used extensively.'),
(8, 'Sports', 'Sports : engagement in physical activity intended to create a benefit to the participant. Ranging from Amateur to Professional, from incompetent to proficient, for all levels of ability, all nations, all creeds, all genders. As James Joyce said \"I am, a stride at a time\"');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@admin.com', '$2y$10$K/IAoJc8vbd6DZnUwlQF6.ihf3g8VzfPr2mOiQSkRcxPKRaNGd3Bm', 'GTdOF8B0pW5E7TTjgZgVBBwl1BE1GO24cVR5YcYJnzh6BFqMsGUpuhcwI2uu', '2019-11-10 08:08:52', '2019-11-11 10:18:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `authorid` (`authorid`);

--
-- Indexes for table `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookid` (`bookid`),
  ADD KEY `genreid` (`genreid`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `book_genre`
--
ALTER TABLE `book_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genreid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`authorid`) REFERENCES `authors` (`authorid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_genre`
--
ALTER TABLE `book_genre`
  ADD CONSTRAINT `book_genre_ibfk_1` FOREIGN KEY (`genreid`) REFERENCES `genre` (`genreid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_genre_ibfk_2` FOREIGN KEY (`bookid`) REFERENCES `books` (`bookid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
