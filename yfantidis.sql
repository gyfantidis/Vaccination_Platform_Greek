-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 27 Μαρ 2022 στις 16:07:17
-- Έκδοση διακομιστή: 5.7.36
-- Έκδοση PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `yfantidis`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_center` int(11) DEFAULT NULL,
  `id_citizen` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_center` (`id_center`),
  KEY `id_citizen` (`id_citizen`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `appointment`
--

INSERT INTO `appointment` (`id`, `id_center`, `id_citizen`, `date`, `time`, `status`) VALUES
(84, 4, 12, '2022-04-02', '10:00:00', '1'),
(5, 2, 5, '2022-04-01', '09:00:00', '0'),
(8, 4, 8, '2022-04-01', '08:00:00', '1'),
(7, 2, 7, '2022-04-02', '10:00:00', '0'),
(9, 4, 9, '2022-04-01', '10:00:00', '1'),
(82, 3, 22, '2022-04-02', '10:00:00', '1'),
(81, 4, 21, '2022-04-01', '09:00:00', '0'),
(80, 2, 20, '2022-04-02', '08:00:00', '0'),
(15, 3, 11, '2022-04-01', '09:00:00', '0'),
(79, 2, 19, '2022-04-01', '10:00:00', '1'),
(78, 5, 18, '2022-04-02', '10:00:00', '0'),
(77, 1, 17, '2022-04-01', '09:00:00', '0'),
(75, 4, 2, '2022-04-02', '09:00:00', '0');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `center`
--

DROP TABLE IF EXISTS `center`;
CREATE TABLE IF NOT EXISTS `center` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `t_k` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `center`
--

INSERT INTO `center` (`id`, `name`, `address`, `t_k`, `phone`) VALUES
(1, 'ΜΕΓΑ ΕΜΒΟΛΙΑΣΤΙΚΟ ΚΕΝΤΡΟ ΠΕΡΙΣΤΕΡΙΟΥ', 'Δωδεκανήσου 106, Περιστέρι', 12134, '210-566-2222'),
(2, 'ΜΕΓΑ ΕΜΒΟΛΙΑΣΤΙΚΟ ΚΕΝΤΡΟ ΠΡΟΜΗΘΕΑΣ', 'Λεωφόρος Κηφισίας 39', 14561, '210-566-6125'),
(3, 'ΚΕΝΤΡΟ ΥΓΕΙΑΣ ΑΘΗΝΑΣ', 'Ακαδημίας 58', 10431, '210-566-6151'),
(4, 'ΜΕΓΑ ΕΜΒΟΛΙΑΣΤΙΚΟ ΚΕΝΤΡΟ ΔΕΘ-HELEXPO', 'Αλεξάνδρου Σβόλου, Θεσσαλονίκης', 54250, '2310-512-512'),
(5, 'ΚΕΝΤΡΟ ΥΓΕΙΑΣ ΤΟΥΜΠΑΣ', 'Άνω Τζουμαγιάς 64', 54555, '2310-526-515');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `center_doctors`
--

DROP TABLE IF EXISTS `center_doctors`;
CREATE TABLE IF NOT EXISTS `center_doctors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) DEFAULT NULL,
  `id_center` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_doc` (`id_doc`),
  KEY `id_center` (`id_center`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `center_doctors`
--

INSERT INTO `center_doctors` (`id`, `id_doc`, `id_center`) VALUES
(13, 13, 4),
(10, 16, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `amka` bigint(11) NOT NULL,
  `afm` int(11) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('M','F') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `role` enum('D','C') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `amka`, `afm`, `passport`, `age`, `sex`, `email`, `phone`, `role`) VALUES
(1, 'ΜΙΧΑΗΛ', 'ΠΑΠΑΔΟΠΟΥΛΟΣ', 1258745812, 124547555, 'AB515151', 31, 'M', 'kir@yahoo.gr', '2310255665', 'C'),
(2, 'ΝΙΚΟΛΑΟΣ', 'ΠΑΠΑΓΙΑΝΝΗΣ', 1010101012, 111111111, 'X555511', 42, 'M', 'papagiannis@gmail.com', '6936826982', 'C'),
(5, 'ΚΥΡΙΑΚΟΣ', 'ΚΥΡΙΑΚΟΥ', 10000000017, 124125452, 'AB212121', 42, 'M', 'kiriakos@gmail.com', '6998541212', 'C'),
(6, 'ΚΩΝΣΤΑΝΤΙΝΟΣ', 'ΚΩΝΣΤΑΝΤΙΝΙΔΗΣ', 16166111111, 123584987, 'ΑΒ22222', 55, 'M', 'konstantinidis@gmail.com', '6997854123', 'C'),
(7, 'ΓΙΑΝΝΗΣ', 'ΓΙΑΝΝΟΥΛΗΣ', 22048855468, 124578456, 'Β121212', 55, 'M', 'giannoulis@yahoo.gr', '2310566544', 'C'),
(8, 'ΙΩΑΝΝΗΣ', 'ΠΑΜΠΟΥΚΙΔΗΣ', 12512111112, 123456789, 'Κ123123', 46, 'M', 'pampoykidis@gmail.com', '6978484845', 'C'),
(9, 'ΠΑΝΤΕΛΗΣ', 'ΠΑΝΤΕΛΙΔΗΣ', 22048255555, 125124124, 'ΒΒ122234', 53, 'M', 'pantelidis@gmail.com', '6936871234', 'C'),
(10, 'ΜΑΡΙΑ', 'ΙΩΑΝΝΙΔΟΥ', 12128812345, 128456987, 'ΑΒ112222', 25, 'F', 'ioannidou@gmail.com', '6936845198', 'C'),
(11, 'ΑΙΚΑΤΕΡΙΝΗ', 'ΠΑΥΛΙΔΟΥ', 12126612345, 159159159, 'ΑΑ587822', 53, 'F', 'pavlidou@gmail.com', '6987412587', 'C'),
(12, 'ΙΩΑΝΝΗΣ', 'ΥΦΑΝΤΙΔΗΣ', 10048211111, 128419242, 'AB115522', 40, 'M', 'ggyfantidis@gmail.com', '6936826982', 'C'),
(13, 'ΠΕΤΡΟΣ ΒΑΛΑΝΤΗΣ', 'ΣΤΕΦΑΝΙΔΗΣ', 11111111111, 111111111, 'ΑΒ121212', 42, 'M', 'valstef@gmail.com', '6988966985', 'D'),
(14, 'ΠΑΡΑΣΚΕΥΗ', 'ΚΟΥΚΟΥΛΗ', 12345678901, 123456789, 'ΑΒ55555', 55, 'F', 'par@gmail.com', '6987458745', 'D'),
(15, 'ΓΙΩΡΓΟΣ', 'ΙΓΝΑΤΙΑΔΗΣ', 12512512512, 123456789, 'ΑΒ123456', 31, 'M', 'giorgos@gmail.com', '6985587454', 'D'),
(16, 'ΠΑΥΛΟΣ', 'ΠΑΥΛΙΔΗΣ', 88888888888, 888888888, 'ΑΒ121212', 38, 'M', 'petros@gmail.com', '6987458745', 'D'),
(17, 'ΕΛΕΝΗ', 'ΛΙΑΚΟΥ', 22222222222, 222222222, 'ΑΑ123564', 43, 'F', 'maria@yahoo.gr', '6987412588', 'C'),
(18, 'ΧΡΙΣΤΙΝΑ', 'ΧΡΙΣΤΙΔΟΥ', 33333333333, 333333333, 'ΑΒ333333', 45, 'F', 'xristina@yahoo.gr', '6936936936', 'C'),
(19, 'ΑΝΑΣΤΑΣΙΑ', 'ΑΝΑΣΤΑΣΙΑΔΟΥ', 44444444444, 444444444, 'ΑΑ444444', 51, 'F', 'anastasiadou@gmail.com', '9519519511', 'C'),
(20, 'ΓΕΩΡΓΙΟΣ', 'ΓΕΩΡΓΙΑΔΗΣ', 55555555555, 555555555, 'ΑΑ555555', 50, 'M', 'georgiadis@gmail.com', '693698741', 'C'),
(21, 'ΝΙΚΟΛΑΟΣ', 'ΝΙΚΟΛΑΙΔΗΣ', 77777777777, 777777777, 'ΑΒ777777', 51, 'M', 'nikos@yahoo.gr', '6954545451', 'C'),
(22, 'ΠΑΝΑΓΙΩΤΑ', 'ΠΑΝΑΓΙΩΤΙΔΟΥ', 99999999999, 999999999, 'ΑΒ999999', 51, 'F', 'panagiotidou@yahoo.gr', '9999999999', 'C'),
(24, 'ΔΗΜΗΤΡΙΟΣ', 'ΔΗΜΗΤΡΙΑΔΗΣ', 11111111112, 111111112, 'ΑΒ123456', 35, 'M', 'dimitrios@gmail.com', '6974545412', 'C');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
