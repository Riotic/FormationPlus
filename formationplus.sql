-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 oct. 2022 à 13:27
-- Version du serveur : 8.0.29
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formationplus`
--

-- --------------------------------------------------------

--
-- Structure de la table `attestations`
--

DROP TABLE IF EXISTS `attestations`;
CREATE TABLE IF NOT EXISTS `attestations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_etudiant` bigint UNSIGNED NOT NULL,
  `id_convention` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attestations_id_etudiant_foreign` (`id_etudiant`),
  KEY `attestations_id_convention_foreign` (`id_convention`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `attestations`
--

INSERT INTO `attestations` (`id`, `id_etudiant`, `id_convention`, `message`, `created_at`, `updated_at`) VALUES
(1, 22, 5, 'Bonjour Halvorson Clark, Vous avez suivi 247h de formation chez FormationPlus.\r\n        Pouvez-vous nous retourner ce mail avec la pièce jointe signée.\r\n        \r\n Cordialement,\r\nFormationPlus', '2022-10-25 10:41:05', '2022-10-25 10:41:05'),
(2, 3, 1, 'Bonjour Brekke Ryleigh, Vous avez suivi 211h de formation chez FormationPlus.\r\n        Pouvez-vous nous retourner ce mail avec la pièce jointe signée.\r\n        \r\n Cordialement,\r\nFormationPlus', '2022-10-25 10:48:36', '2022-10-25 10:48:36');

-- --------------------------------------------------------

--
-- Structure de la table `conventions`
--

DROP TABLE IF EXISTS `conventions`;
CREATE TABLE IF NOT EXISTS `conventions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbHeur` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conventions`
--

INSERT INTO `conventions` (`id`, `nom`, `nbHeur`, `created_at`, `updated_at`) VALUES
(1, 'Legros, Balistreri and Murray', 211, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(2, 'Bailey-Dickinson', 271, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(3, 'Zboncak, Ritchie and Schinner', 213, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(4, 'Sauer, Gislason and Cummings', 275, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(5, 'Abernathy, Conroy and Powlowski', 247, '2022-10-25 10:40:54', '2022-10-25 10:40:54');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_convention` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etudiants_email_unique` (`email`),
  KEY `etudiants_id_convention_foreign` (`id_convention`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `email`, `id_convention`, `created_at`, `updated_at`) VALUES
(1, 'Douglas', 'Zola', 'nicolas.sandy@hotmail.com', 1, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(2, 'Fay', 'Adolfo', 'roberts.doug@schiller.com', 1, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(3, 'Brekke', 'Ryleigh', 'stiedemann.agnes@gmail.com', 1, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(4, 'Rowe', 'Raphaelle', 'flatley.lawrence@zieme.com', 1, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(5, 'Witting', 'Kasey', 'jakubowski.bonnie@gmail.com', 1, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(6, 'McGlynn', 'Oran', 'maia.wisoky@bode.biz', 2, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(7, 'Armstrong', 'Adriel', 'watson.wyman@beahan.net', 2, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(8, 'O\'Hara', 'Ferne', 'bogan.maiya@hotmail.com', 2, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(9, 'Nikolaus', 'Estelle', 'tboehm@yahoo.com', 2, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(10, 'D\'Amore', 'Eileen', 'courtney.kuvalis@yahoo.com', 2, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(11, 'Kohler', 'Brooks', 'ugreenfelder@hotmail.com', 3, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(12, 'Sauer', 'Madilyn', 'roberts.jacynthe@nader.com', 3, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(13, 'Pfannerstill', 'Salvatore', 'rachel.rohan@denesik.com', 3, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(14, 'Mills', 'Lorine', 'berenice08@gmail.com', 3, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(15, 'D\'Amore', 'Iva', 'alexanne.baumbach@jast.com', 3, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(16, 'Mills', 'Gwen', 'muriel.stehr@durgan.info', 4, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(17, 'Farrell', 'Daphney', 'hcartwright@yahoo.com', 4, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(18, 'Ortiz', 'Pascale', 'jarrell29@yundt.com', 4, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(19, 'Simonis', 'Shawna', 'hane.palma@gmail.com', 4, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(20, 'Luettgen', 'Vicenta', 'mrolfson@morissette.com', 4, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(21, 'Swaniawski', 'Jasen', 'mckenzie.chloe@gmail.com', 5, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(22, 'Halvorson', 'Clark', 'lia.oconner@gmail.com', 5, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(23, 'Krajcik', 'Kristofer', 'anabelle.carroll@emard.biz', 5, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(24, 'Larson', 'Elroy', 'qpadberg@greenfelder.net', 5, '2022-10-25 10:40:54', '2022-10-25 10:40:54'),
(25, 'Morar', 'Octavia', 'xkuhlman@dietrich.com', 5, '2022-10-25 10:40:54', '2022-10-25 10:40:54');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_10_24_141346_create_conventions_table', 1),
(5, '2022_10_24_141347_create_etudiants_table', 1),
(6, '2022_10_24_141401_create_attestations_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
