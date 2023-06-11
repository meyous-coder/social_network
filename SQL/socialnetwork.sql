-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 11 juin 2023 à 04:10
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `socialnetwork`
--

-- --------------------------------------------------------

--
-- Structure de la table `codes`
--

DROP TABLE IF EXISTS `codes`;
CREATE TABLE IF NOT EXISTS `codes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `codes`
--

INSERT INTO `codes` (`id`, `code`) VALUES
(1, '<?php\r\n/*****************************************************************/\r\nsession_start();\r\n/*****************************************************************/\r\n$title = \"Connexion\";\r\ninclude \"filters/auth_filter.php\";\r\ninclude \"includes/constants.php\";\r\ninclude \"config/database.php\";\r\ninclude \"includes/functions.php\";\r\n/*****************************************************************/\r\n\r\nif(isset($_POST[\'save\']))\r\n{\r\n    if(not_empty([\'code\']))\r\n    {\r\n        extract($_POST);\r\n\r\n        $q = $db->prepare(\"INSERT INTO codes (code) VALUES (?)\");\r\n        $success = $q->execute([$code]);\r\n\r\n        if($success)\r\n        {\r\n            // Afficher le code source\r\n        }else\r\n        {\r\n            set_flash(\"Erreur lors de l\' ajout du code source. Veuillez réessayez SVP !\");\r\n            redirect(\"share_code.php\");\r\n        }\r\n    }else\r\n    {\r\n        redirect(\"share_code.php\");\r\n    }\r\n}\r\n/*****************************************************************/\r\nrequire \"views/share_code.view.php\";\r\n/*****************************************************************/');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('H','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_for_hiring` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `bio` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `pseudo`, `email`, `password`, `active`, `city`, `country`, `sex`, `twitter`, `github`, `available_for_hiring`, `bio`) VALUES
(13, 'meite youssouf', 'meyous-coder', 'meyous2020@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0', 'paris', 'France', 'H', 'meyous', 'meyous', '1', 'Test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
