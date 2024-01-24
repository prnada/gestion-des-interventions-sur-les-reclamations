-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 sep. 2023 à 14:26
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_gir`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiments`
--

CREATE TABLE `batiments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Batiment` varchar(100) NOT NULL,
  `id_site` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `batiments`
--

INSERT INTO `batiments` (`id`, `Batiment`, `id_site`, `created_at`, `updated_at`) VALUES
(107, 'Bloc A Siege', 71, NULL, NULL),
(108, 'Bloc A Mabella', 72, NULL, NULL),
(109, 'Bloc B Mabella', 72, NULL, NULL),
(110, 'Old_Bloc A', 75, NULL, NULL),
(111, 'B. AGDAL', 76, NULL, NULL),
(112, 'CTPC', 77, NULL, NULL),
(113, 'CETIEV', 77, NULL, NULL),
(114, 'CTIBA', 77, NULL, NULL),
(115, 'CTTH', 77, NULL, NULL),
(116, 'Bat A Riad', 75, NULL, NULL),
(117, 'Bat B Riad', 75, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `detail_materiels`
--

CREATE TABLE `detail_materiels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `id_materiel` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `detail_materiels`
--

INSERT INTO `detail_materiels` (`id`, `reference`, `id_materiel`) VALUES
(1, 'cat1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `etages`
--

CREATE TABLE `etages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Etage` varchar(20) NOT NULL,
  `id_bat` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etages`
--

INSERT INTO `etages` (`id`, `Etage`, `id_bat`, `created_at`, `updated_at`) VALUES
(49, 'Siege 1er', 107, NULL, NULL),
(50, 'Siege 2eme', 107, NULL, NULL),
(51, 'RC_Bloc A_Mabella', 108, NULL, NULL),
(52, 'S.S_Bloc B_Mabella', 109, NULL, NULL),
(53, 'RC_Bloc B_Mabella', 109, NULL, NULL),
(54, '1er_Mabella_Bloc B', 109, NULL, NULL),
(55, 'RC_Old-A', 110, NULL, NULL),
(56, '1er_Old-A', 110, NULL, NULL),
(57, '2eme_Old-A', 110, NULL, NULL),
(58, 'Siege RC', 107, NULL, NULL),
(59, 'Siege Sous Sol', 107, NULL, NULL),
(60, 'SS Agdal', 111, NULL, NULL),
(61, 'CETIEV', 113, NULL, NULL),
(62, '2 éme étage Bat A', 116, NULL, NULL),
(63, '1 er étage Bat A', 116, NULL, NULL),
(64, 'Riad  RC Bat A', 116, NULL, NULL),
(65, 'Riad S.S Bat A', 116, NULL, NULL),
(66, '2éme  Bat B', 117, NULL, NULL),
(67, '1er  Bat B', 117, NULL, NULL),
(68, '1 er étage Agdal', 111, NULL, NULL),
(105, 'Sous sol', 108, NULL, NULL),
(106, 'ACCUEIL', 117, NULL, NULL),
(108, 'RC', 111, NULL, NULL),
(109, '2EME ETAGE AGDAL', 111, NULL, NULL),
(110, '3EME ETAGE AGDAL', 111, NULL, NULL),
(111, '4EME ETAGE', 111, NULL, NULL),
(112, 'CTIBA', 114, NULL, NULL),
(114, 'CTTH', 115, NULL, NULL),
(116, 'CTPC', 112, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` bigint(20) NOT NULL,
  `Etat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`id`, `Etat`) VALUES
(1, 'En attente'),
(2, 'En cours'),
(3, 'Validé');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `frontusers`
--

CREATE TABLE `frontusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` int(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_str` bigint(20) UNSIGNED DEFAULT NULL,
  `id_met` bigint(20) UNSIGNED DEFAULT NULL,
  `disponibilite` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `frontusers`
--

INSERT INTO `frontusers` (`id`, `nom`, `prenom`, `email`, `telephone`, `email_verified_at`, `password`, `remember_token`, `user_id`, `id_str`, `id_met`, `disponibilite`, `created_at`, `updated_at`) VALUES
(18, 'elkhaldi', 'nada', 'nada@gmail.com', 123456789, NULL, '$2y$10$CfaVQ3b2Z182VlFV38a1beyx9ZYl0iObKjwPVV7oYV1Tbf3/24FIq', NULL, NULL, NULL, 3, 1, '2023-08-15 12:40:27', '2023-08-23 16:59:29'),
(19, 'nada2', 'nada2', 'nada2@gmail.com', 123456, NULL, '$2y$10$yTxRlKq7AUNwnunGYdreOeZteGupz2ydt8KjL7dARYRaTmpaFsVoC', NULL, NULL, NULL, 3, 0, '2023-08-22 08:16:35', '2023-08-22 08:16:35'),
(22, 'test', 'test1', 'test@gmail.com', 123456789, NULL, '$2y$10$m2LVm9bhAdp395fbuEWk6ONDboZDG7I9h7n.zp2nzzhlNyzBdKqZa', NULL, NULL, NULL, 3, 1, '2023-09-06 16:25:44', '2023-09-06 16:25:44');

-- --------------------------------------------------------

--
-- Structure de la table `intervenants`
--

CREATE TABLE `intervenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_met` bigint(20) UNSIGNED NOT NULL,
  `denomination` varchar(100) NOT NULL,
  `email_int` varchar(70) NOT NULL,
  `tel_int` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `intervenants`
--

INSERT INTO `intervenants` (`id`, `id_met`, `denomination`, `email_int`, `tel_int`, `created_at`, `updated_at`) VALUES
(0, 3, 'Aucun', 'Aucun', NULL, NULL, NULL),
(1001, 3, 'eee ttt', 'eee@gmail.com', '06152586', '2023-08-17 20:00:34', '2023-08-17 20:00:34'),
(1003, 3, 'Société X', 'societeX@gmail.com', '00112233', '2023-09-06 16:45:57', '2023-09-06 16:45:57');

-- --------------------------------------------------------

--
-- Structure de la table `interventions`
--

CREATE TABLE `interventions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_intr` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `id_fonct` bigint(20) NOT NULL DEFAULT 0,
  `id_recl` bigint(20) UNSIGNED NOT NULL,
  `id_met` bigint(20) UNSIGNED NOT NULL,
  `date_heureINTR` datetime DEFAULT NULL,
  `date_fin_intr` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ldapusers`
--

CREATE TABLE `ldapusers` (
  `guid` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `liste_locauxes`
--

CREATE TABLE `liste_locauxes` (
  `id` bigint(20) NOT NULL,
  `Local` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `liste_locauxes`
--

INSERT INTO `liste_locauxes` (`id`, `Local`) VALUES
(77, 'BUREAU'),
(78, 'Salle de REUNION'),
(79, 'COULOIR'),
(80, 'HALL	'),
(81, 'S.ATTENTE'),
(82, 'S.ONDULLEUR'),
(83, 'S.MACHINE'),
(84, 'CUISINE'),
(85, 'ACCUEIL'),
(86, 'S.ARCHIVE'),
(87, 'BUR_PARC'),
(88, 'MAGASIN'),
(89, 'OP.SPA'),
(90, 'GARAGE'),
(91, 'MOSQUE'),
(92, 'C-OP.SPA'),
(93, 'DCI_SAA'),
(94, 'S.STOCK'),
(95, 'LABO	'),
(96, 'ATELIER'),
(97, 'MOSQUEE'),
(98, 'S.DOCMT'),
(99, 'Sanitaire'),
(100, 'LOCAL TECH'),
(101, 'Salle de Formation'),
(102, 'Buvette'),
(103, 'Delegation');

-- --------------------------------------------------------

--
-- Structure de la table `locauxes`
--

CREATE TABLE `locauxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_loc` bigint(20) NOT NULL,
  `id_etg` bigint(20) UNSIGNED NOT NULL,
  `NumLoc` varchar(10) NOT NULL,
  `inventaire` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `locauxes`
--

INSERT INTO `locauxes` (`id`, `id_loc`, `id_etg`, `NumLoc`, `inventaire`, `created_at`, `updated_at`) VALUES
(1575, 77, 49, '101', '12349246', NULL, NULL),
(1576, 78, 49, '102', '12346691', NULL, NULL),
(1577, 77, 49, '103', '12348248', NULL, NULL),
(1578, 77, 49, '104', '12348070', NULL, NULL),
(1579, 77, 49, '105', '12345981', NULL, NULL),
(1580, 77, 49, '106', '12347316', NULL, NULL),
(1581, 77, 49, '107', '12348580', NULL, NULL),
(1582, 77, 49, '108', '12346592', NULL, NULL),
(1583, 77, 49, '109', '12347908', NULL, NULL),
(1584, 77, 49, '110', '12348665', NULL, NULL),
(1585, 77, 49, '111', '12348634', NULL, NULL),
(1586, 77, 49, '112', '12346412', NULL, NULL),
(1587, 77, 49, '113', '12346146', NULL, NULL),
(1588, 77, 49, '114', '12347087', NULL, NULL),
(1589, 77, 49, '115', '12349945', NULL, NULL),
(1590, 77, 49, '116', '12347012', NULL, NULL),
(1591, 77, 49, '117', '12346579', NULL, NULL),
(1592, 78, 49, '118', '12345926', NULL, NULL),
(1593, 77, 49, '119', '12349368', NULL, NULL),
(1594, 77, 49, '120', '12346597', NULL, NULL),
(1595, 77, 49, '121', '12348156', NULL, NULL),
(1596, 77, 49, '122', '12347393', NULL, NULL),
(1597, 77, 49, '123', '12349579', NULL, NULL),
(1598, 77, 49, '124', '12348118', NULL, NULL),
(1599, 77, 49, '125', '12349050', NULL, NULL),
(1600, 78, 49, '125b', '12349762', NULL, NULL),
(1601, 77, 49, '126', '12349830', NULL, NULL),
(1602, 77, 49, '127', '12346929', NULL, NULL),
(1603, 77, 49, '128', '12347796', NULL, NULL),
(1604, 99, 49, '129', '12349853', NULL, NULL),
(1605, 99, 49, '130', '12345737', NULL, NULL),
(1606, 77, 49, '131', '12348367', NULL, NULL),
(1607, 77, 49, '132', '12349936', NULL, NULL),
(1608, 77, 49, '133', '12349695', NULL, NULL),
(1609, 84, 49, '134', '12346551', NULL, NULL),
(1610, 77, 49, '135', '12348333', NULL, NULL),
(1611, 78, 49, '136', '12349014', NULL, NULL),
(1612, 77, 49, '137', '12349136', NULL, NULL),
(1613, 77, 49, '138', '12348447', NULL, NULL),
(1614, 77, 49, '139', '12349629', NULL, NULL),
(1615, 77, 49, '140', '12348279', NULL, NULL),
(1616, 77, 49, '141', '12346677', NULL, NULL),
(1617, 77, 49, '142', '12347083', NULL, NULL),
(1618, 77, 49, '143', '12347636', NULL, NULL),
(1619, 78, 49, '144', '12347708', NULL, NULL),
(1620, 77, 49, '145', '12346713', NULL, NULL),
(1621, 77, 49, '146', '12347225', NULL, NULL),
(1622, 77, 49, '147', '12349685', NULL, NULL),
(1623, 77, 49, '148', '12346862', NULL, NULL),
(1624, 77, 49, '149', '12348347', NULL, NULL),
(1625, 77, 49, '136B', '12345934', NULL, NULL),
(1626, 77, 49, '151', '12347267', NULL, NULL),
(1627, 77, 49, '153', '12346084', NULL, NULL),
(1628, 77, 49, '159', '12347990', NULL, NULL),
(1629, 77, 49, '160', '12348106', NULL, NULL),
(1630, 79, 49, 'C1', '12349213', NULL, NULL),
(1631, 79, 49, 'C2', '12348528', NULL, NULL),
(1632, 79, 49, 'C3', '12348631', NULL, NULL),
(1633, 80, 49, 'H', '12346683', NULL, NULL),
(1634, 81, 49, 'SAtt', '12348470', NULL, NULL),
(1636, 78, 50, '201', '12346021', NULL, NULL),
(1637, 77, 50, '202', '12348176', NULL, NULL),
(1638, 77, 50, '203', '12346548', NULL, NULL),
(1639, 100, 50, '204', '12349259', NULL, NULL),
(1640, 83, 50, '205', '12345799', NULL, NULL),
(1641, 78, 50, '206', '12349206', NULL, NULL),
(1642, 77, 50, '207', '12349866', NULL, NULL),
(1643, 77, 50, '208', '12348695', NULL, NULL),
(1644, 77, 50, '209', '12349218', NULL, NULL),
(1645, 77, 50, '210', '12346043', NULL, NULL),
(1646, 77, 50, '211', '12348264', NULL, NULL),
(1647, 84, 50, '212', '12348828', NULL, NULL),
(1648, 78, 50, '214', '12347240', NULL, NULL),
(1649, 77, 50, '215', '12348290', NULL, NULL),
(1650, 77, 50, '216', '12349392', NULL, NULL),
(1651, 77, 50, '217', '12345756', NULL, NULL),
(1652, 77, 50, '218', '12346754', NULL, NULL),
(1653, 77, 50, '219', '12345812', NULL, NULL),
(1654, 77, 50, '220', '12347367', NULL, NULL),
(1655, 77, 50, '221', '12348769', NULL, NULL),
(1656, 77, 50, '222', '12346382', NULL, NULL),
(1657, 77, 50, '223', '12347115', NULL, NULL),
(1658, 77, 50, '224', '12348537', NULL, NULL),
(1659, 77, 50, '225', '12349873', NULL, NULL),
(1660, 77, 50, '226', '12347857', NULL, NULL),
(1661, 77, 50, '227', '12346705', NULL, NULL),
(1662, 77, 50, '228', '12348294', NULL, NULL),
(1663, 77, 50, '229', '12349396', NULL, NULL),
(1664, 77, 50, '230', '12347076', NULL, NULL),
(1665, 77, 50, '231', '12348693', NULL, NULL),
(1666, 77, 50, '232', '12348927', NULL, NULL),
(1667, 77, 50, '233', '12346639', NULL, NULL),
(1668, 78, 50, '234', '12349775', NULL, NULL),
(1669, 77, 50, '235', '12347651', NULL, NULL),
(1670, 77, 50, '236', '12349251', NULL, NULL),
(1671, 77, 50, '236b', '12347947', NULL, NULL),
(1672, 81, 50, '237', '12347882', NULL, NULL),
(1673, 81, 50, '238', '12348297', NULL, NULL),
(1674, 77, 50, '239', '12348564', NULL, NULL),
(1675, 77, 50, '240', '12348229', NULL, NULL),
(1676, 77, 50, '241', '12346247', NULL, NULL),
(1677, 77, 50, '242', '12347080', NULL, NULL),
(1678, 77, 50, '243', '12349454', NULL, NULL),
(1679, 77, 50, '244', '12347659', NULL, NULL),
(1680, 78, 50, '244b', '12346776', NULL, NULL),
(1681, 77, 50, '245', '12347095', NULL, NULL),
(1683, 78, 50, '246', '12347810', NULL, NULL),
(1684, 77, 50, '247', '12349664', NULL, NULL),
(1685, 77, 50, '248', '12348897', NULL, NULL),
(1686, 77, 50, '249', '12346772', NULL, NULL),
(1687, 79, 50, 'C1', '12346560', NULL, NULL),
(1688, 79, 50, 'C2', '12348754', NULL, NULL),
(1689, 79, 50, 'C3', '12349062', NULL, NULL),
(1690, 84, 50, 'Csn', '12349258', NULL, NULL),
(1691, 85, 51, 'Acc', '12347633', NULL, NULL),
(1692, 78, 51, '1', '12347951', NULL, NULL),
(1693, 77, 51, '2', '12348705', NULL, NULL),
(1694, 77, 51, '3', '12346384', NULL, NULL),
(1695, 99, 51, '4', '12347498', NULL, NULL),
(1696, 80, 51, '5', '12345992', NULL, NULL),
(1697, 77, 51, '6', '12349724', NULL, NULL),
(1698, 77, 51, '7', '12349109', NULL, NULL),
(1699, 77, 51, '8', '12346140', NULL, NULL),
(1700, 77, 51, '9', '12346829', NULL, NULL),
(1701, 80, 51, '10', '12347739', NULL, NULL),
(1702, 77, 51, '11', '12348184', NULL, NULL),
(1703, 77, 51, '12', '12346415', NULL, NULL),
(1704, 77, 51, '13', '12346896', NULL, NULL),
(1705, 77, 51, '14', '12349365', NULL, NULL),
(1706, 77, 51, '15', '12346794', NULL, NULL),
(1707, 77, 51, '16', '12347464', NULL, NULL),
(1708, 77, 51, '17', '12349460', NULL, NULL),
(1709, 99, 51, '18', '12346967', NULL, NULL),
(1710, 77, 51, '19', '12346531', NULL, NULL),
(1711, 77, 51, '20', '12348989', NULL, NULL),
(1712, 77, 51, '21', '12346003', NULL, NULL),
(1713, 77, 51, '22', '12347703', NULL, NULL),
(1714, 77, 51, '23', '12348589', NULL, NULL),
(1715, 77, 51, '24', '12347024', NULL, NULL),
(1716, 77, 51, '25', '12347085', NULL, NULL),
(1717, 77, 51, '51', '12349003', NULL, NULL),
(1718, 77, 51, '27', '12346496', NULL, NULL),
(1719, 77, 51, '52', '12349375', NULL, NULL),
(1720, 77, 51, '29', '12349331', NULL, NULL),
(1721, 77, 51, '30', '12347765', NULL, NULL),
(1722, 77, 51, '31', '12349288', NULL, NULL),
(1723, 77, 51, '35', '12347782', NULL, NULL),
(1724, 77, 51, '36', '12345847', NULL, NULL),
(1725, 99, 51, '37', '12349241', NULL, NULL),
(1726, 99, 51, '38', '12348126', NULL, NULL),
(1727, 77, 51, '39', '12348970', NULL, NULL),
(1728, 77, 51, '40', '12349524', NULL, NULL),
(1729, 77, 51, '41', '12346081', NULL, NULL),
(1730, 78, 51, '42', '12346770', NULL, NULL),
(1731, 77, 51, '43', '12347387', NULL, NULL),
(1732, 77, 51, '44', '12348228', NULL, NULL),
(1733, 89, 51, '45', '12348006', NULL, NULL),
(1734, 89, 51, '46', '12349549', NULL, NULL),
(1735, 89, 51, '47', '12346733', NULL, NULL),
(1736, 89, 51, '48', '12349864', NULL, NULL),
(1737, 79, 51, 'C1', '12346448', NULL, NULL),
(1738, 79, 51, 'C2', '12347929', NULL, NULL),
(1739, 79, 51, 'C3', '12345849', NULL, NULL),
(1740, 79, 51, 'C4', '12346523', NULL, NULL),
(1741, 79, 51, 'C5', '12348381', NULL, NULL),
(1742, 79, 51, 'C6', '12349806', NULL, NULL),
(1743, 79, 51, 'C7', '12345845', NULL, NULL),
(1744, 87, 52, 'S03', '12347555', NULL, NULL),
(1745, 99, 51, '49', '12348619', NULL, NULL),
(1746, 78, 53, '1', '12349988', NULL, NULL),
(1747, 77, 53, '2', '12348076', NULL, NULL),
(1748, 77, 53, '3', '12349662', NULL, NULL),
(1751, 77, 53, '4', '12347436', NULL, NULL),
(1752, 88, 52, 'Mgs', '12348230', NULL, NULL),
(1753, 77, 53, '5', '12347819', NULL, NULL),
(1754, 77, 53, '6', '12349028', NULL, NULL),
(1755, 77, 53, '7', '12346066', NULL, NULL),
(1756, 77, 53, '8', '12348961', NULL, NULL),
(1757, 77, 53, '9', '12345771', NULL, NULL),
(1758, 77, 53, '10', '12349388', NULL, NULL),
(1759, 77, 53, '11', '12348354', NULL, NULL),
(1760, 77, 53, '12', '12346294', NULL, NULL),
(1761, 77, 53, '13', '12349842', NULL, NULL),
(1762, 77, 53, '14', '12348548', NULL, NULL),
(1763, 77, 53, '15', '12349391', NULL, NULL),
(1764, 77, 53, '16', '12349749', NULL, NULL),
(1765, 77, 53, '17', '12346741', NULL, NULL),
(1766, 89, 53, '18', '12349778', NULL, NULL),
(1767, 77, 53, '19', '12347852', NULL, NULL),
(1768, 101, 53, '20', '12347165', NULL, NULL),
(1769, 83, 53, '21', '12347004', NULL, NULL),
(1770, 77, 53, '22', '12348334', NULL, NULL),
(1771, 90, 52, 'S01', '12349187', NULL, NULL),
(1772, 91, 52, 'S02', '12346131', NULL, NULL),
(1774, 77, 53, '23', '12349589', NULL, NULL),
(1775, 85, 54, '101', '12349205', NULL, NULL),
(1776, 99, 54, '102', '12349319', NULL, NULL),
(1777, 77, 54, '103', '12346588', NULL, NULL),
(1778, 77, 54, '104', '12347446', NULL, NULL),
(1779, 78, 54, '105', '12347822', NULL, NULL),
(1780, 77, 54, '106', '12349850', NULL, NULL),
(1781, 77, 54, '107', '12349573', NULL, NULL),
(1782, 77, 54, '108', '12346482', NULL, NULL),
(1783, 77, 54, '109', '12347581', NULL, NULL),
(1784, 77, 54, '110', '12346346', NULL, NULL),
(1785, 77, 54, '111', '12346324', NULL, NULL),
(1786, 77, 54, '112', '12346838', NULL, NULL),
(1787, 77, 54, '113', '12349103', NULL, NULL),
(1788, 77, 54, '114', '12347430', NULL, NULL),
(1789, 77, 54, '115', '12346057', NULL, NULL),
(1790, 77, 54, '116', '12349870', NULL, NULL),
(1791, 77, 54, '117', '12346716', NULL, NULL),
(1792, 77, 54, '118', '12345881', NULL, NULL),
(1793, 86, 54, '119', '12345907', NULL, NULL),
(1794, 77, 54, '120', '12346196', NULL, NULL),
(1795, 78, 54, '121', '12347052', NULL, NULL),
(1796, 77, 54, '122', '12348141', NULL, NULL),
(1797, 77, 54, '123', '12348784', NULL, NULL),
(1798, 77, 54, '124', '12347264', NULL, NULL),
(1799, 77, 54, '125', '12346008', NULL, NULL),
(1800, 77, 54, '126', '12346970', NULL, NULL),
(1801, 77, 54, '127', '12347816', NULL, NULL),
(1802, 79, 54, '128', '12347193', NULL, NULL),
(1803, 77, 54, '129', '12347691', NULL, NULL),
(1804, 77, 54, '130', '12347742', NULL, NULL),
(1805, 77, 54, '131', '12348469', NULL, NULL),
(1806, 77, 54, '132', '12347494', NULL, NULL),
(1807, 77, 54, '133', '12345757', NULL, NULL),
(1808, 77, 54, '134', '12349868', NULL, NULL),
(1809, 79, 54, '135', '12347366', NULL, NULL),
(1810, 84, 54, '136', '12348584', NULL, NULL),
(1811, 99, 54, '137', '12348059', NULL, NULL),
(1812, 79, 54, '138', '12349761', NULL, NULL),
(1813, 89, 54, '139', '12348318', NULL, NULL),
(1814, 89, 54, '34', '12346442', NULL, NULL),
(1815, 89, 54, '35', '12347550', NULL, NULL),
(1816, 89, 54, '36', '12349399', NULL, NULL),
(1817, 89, 54, 'SAtt', '12349693', NULL, NULL),
(1818, 93, 54, '42', '12347916', NULL, NULL),
(1819, 77, 55, '1', '12345686', NULL, NULL),
(1820, 79, 55, 'C1', '12348791', NULL, NULL),
(1821, 94, 55, '2', '12348948', NULL, NULL),
(1822, 79, 56, 'C1', '12348511', NULL, NULL),
(1823, 77, 55, '4', '12346299', NULL, NULL),
(1824, 77, 55, '5', '12346001', NULL, NULL),
(1825, 77, 55, '6', '12348863', NULL, NULL),
(1826, 78, 55, '7', '12348662', NULL, NULL),
(1827, 78, 55, '8', '12346628', NULL, NULL),
(1828, 78, 55, '9', '12348087', NULL, NULL),
(1829, 77, 56, '101', '12349609', NULL, NULL),
(1830, 77, 56, '102', '12349999', NULL, NULL),
(1831, 77, 56, '103', '12347197', NULL, NULL),
(1832, 77, 56, '104', '12346147', NULL, NULL),
(1833, 77, 56, '105', '12346091', NULL, NULL),
(1834, 77, 56, '107', '12346640', NULL, NULL),
(1835, 77, 56, '108', '12348378', NULL, NULL),
(1836, 77, 56, '109', '12346994', NULL, NULL),
(1837, 77, 56, '110', '12348653', NULL, NULL),
(1838, 77, 56, '111', '12346721', NULL, NULL),
(1839, 77, 56, '112', '12348393', NULL, NULL),
(1840, 77, 56, '113', '12348097', NULL, NULL),
(1841, 77, 56, '114', '12347616', NULL, NULL),
(1842, 84, 56, '115', '12348820', NULL, NULL),
(1843, 77, 57, '201', '12347537', NULL, NULL),
(1844, 77, 57, '202', '12348720', NULL, NULL),
(1845, 77, 57, '203', '12349506', NULL, NULL),
(1846, 77, 57, '204', '12349738', NULL, NULL),
(1847, 77, 57, '205', '12349273', NULL, NULL),
(1848, 77, 57, '206', '12347230', NULL, NULL),
(1849, 77, 57, '207', '12349756', NULL, NULL),
(1850, 77, 57, '208', '12347866', NULL, NULL),
(1851, 77, 57, '209', '12348674', NULL, NULL),
(1852, 77, 57, '210', '12348012', NULL, NULL),
(1853, 77, 57, '211', '12346478', NULL, NULL),
(1854, 77, 57, '212', '12349923', NULL, NULL),
(1855, 77, 57, '213', '12346795', NULL, NULL),
(1856, 77, 57, '214', '12346481', NULL, NULL),
(1857, 77, 57, '215', '12346280', NULL, NULL),
(1858, 77, 57, '216', '12349653', NULL, NULL),
(1859, 77, 57, '217', '12349538', NULL, NULL),
(1860, 77, 57, '218', '12349089', NULL, NULL),
(1861, 77, 57, '219', '12347557', NULL, NULL),
(1862, 79, 57, 'C1', '12349179', NULL, NULL),
(1863, 85, 55, 'Acc', '12345913', NULL, NULL),
(1864, 88, 55, '3', '12347439', NULL, NULL),
(1865, 79, 55, 'C2', '12346432', NULL, NULL),
(1866, 79, 56, 'C2', '12348811', NULL, NULL),
(1867, 77, 58, '1', '12346286', NULL, NULL),
(1868, 77, 58, '2', '12348160', NULL, NULL),
(1869, 77, 58, '3', '12346356', NULL, NULL),
(1870, 77, 58, '4', '12346964', NULL, NULL),
(1871, 77, 58, '5', '12348565', NULL, NULL),
(1872, 77, 58, '06-janv', '12346268', NULL, NULL),
(1873, 77, 58, '7', '12348602', NULL, NULL),
(1874, 77, 58, '8', '12347195', NULL, NULL),
(1875, 77, 58, '9', '12346202', NULL, NULL),
(1876, 77, 58, '10', '12349493', NULL, NULL),
(1877, 77, 58, '11', '12347212', NULL, NULL),
(1878, 77, 58, '12', '12347974', NULL, NULL),
(1879, 77, 58, '12bis', '12346489', NULL, NULL),
(1880, 77, 58, '13', '12346884', NULL, NULL),
(1881, 77, 58, '14', '12349147', NULL, NULL),
(1882, 77, 58, '15', '12349982', NULL, NULL),
(1883, 78, 58, '16', '12346942', NULL, NULL),
(1884, 83, 58, '17', '12348768', NULL, NULL),
(1885, 81, 58, '18', '12348445', NULL, NULL),
(1886, 78, 58, '19', '12348664', NULL, NULL),
(1887, 85, 58, '20', '12348912', NULL, NULL),
(1888, 77, 58, '21', '12347761', NULL, NULL),
(1889, 79, 58, 'C1', '12346152', NULL, NULL),
(1890, 79, 58, 'C2', '12347303', NULL, NULL),
(1891, 80, 58, 'H', '12349463', NULL, NULL),
(1893, 77, 58, '24', '12346902', NULL, NULL),
(1894, 77, 58, '26', '12349162', NULL, NULL),
(1895, 77, 58, '27', '12345830', NULL, NULL),
(1896, 77, 58, '28', '12345962', NULL, NULL),
(1897, 77, 58, '29', '12347142', NULL, NULL),
(1898, 77, 58, '30', '12345906', NULL, NULL),
(1899, 84, 59, 'S24', '12347527', NULL, NULL),
(1900, 77, 59, 'S25', '12346046', NULL, NULL),
(1901, 77, 59, 'S26', '12346258', NULL, NULL),
(1902, 77, 59, 'S27', '12348988', NULL, NULL),
(1903, 77, 59, 'S28', '12347881', NULL, NULL),
(1904, 77, 59, 'S29', '12348559', NULL, NULL),
(1905, 77, 59, 'S30', '12349199', NULL, NULL),
(1906, 99, 59, 'S31', '12346960', NULL, NULL),
(1907, 83, 59, 'S15', '12346711', NULL, NULL),
(1908, 99, 59, 'S18', '12348476', NULL, NULL),
(1909, 77, 59, 'S17', '12349308', NULL, NULL),
(1910, 77, 59, 'S19', '12347969', NULL, NULL),
(1911, 83, 59, 'S14', '12349126', NULL, NULL),
(1912, 99, 59, 'S20', '12349825', NULL, NULL),
(1913, 77, 59, 'S23', '12347685', NULL, NULL),
(1914, 77, 59, 'S16', '12346139', NULL, NULL),
(1915, 98, 59, '17', '12349543', NULL, NULL),
(1923, 77, 59, 'S22', '12349252', NULL, NULL),
(1924, 80, 59, 'S21', '12347204', NULL, NULL),
(1925, 77, 50, '245b', '12324196', NULL, NULL),
(1926, 88, 51, '50', '12368227', NULL, NULL),
(1927, 77, 58, '31', '12316883', NULL, NULL),
(1930, 77, 50, '217bis', '12322791', NULL, NULL),
(1934, 88, 60, 'MAg', '12350349', NULL, NULL),
(1936, 77, 56, '106', '12360826', NULL, NULL),
(1937, 80, 58, '8B', '12372616', NULL, NULL),
(1938, 77, 61, 'CETIEV', '12309553', NULL, NULL),
(1939, 77, 58, '21', '12303276', NULL, NULL),
(1940, 96, 59, 'S10', '12331236', NULL, NULL),
(1941, 80, 59, 'S02', '12303330', NULL, NULL),
(1942, 80, 59, 'S08', '12369836', NULL, NULL),
(1943, 99, 59, 'S03', '12304202', NULL, NULL),
(1944, 77, 59, 'S09', '12300838', NULL, NULL),
(1945, 77, 59, 'S04', '12333285', NULL, NULL),
(1946, 99, 59, 'S01', '12367555', NULL, NULL),
(1947, 77, 59, 'S05', '12394736', NULL, NULL),
(1948, 96, 59, 'S11', '12329508', NULL, NULL),
(1949, 86, 59, 'S12', '12301405', NULL, NULL),
(1950, 88, 59, 'S13', '12376962', NULL, NULL),
(1951, 97, 59, 'S19', '12385667', NULL, NULL),
(1952, 77, 59, 'S07', '12340524', NULL, NULL),
(1953, 77, 59, 'S06', '12341552', NULL, NULL),
(1954, 78, 66, '201', '12390488', NULL, NULL),
(1955, 77, 66, '202', '12386686', NULL, NULL),
(1956, 77, 66, '203', '12300084', NULL, NULL),
(1957, 89, 66, '204', '12300244', NULL, NULL),
(1958, 77, 66, '205/1', '12300265', NULL, NULL),
(1959, 89, 66, '206', '12300280', NULL, NULL),
(1960, 89, 66, '207', '12300363', NULL, NULL),
(1961, 77, 66, '208', '12300389', NULL, NULL),
(1962, 100, 66, '209', '12300559', NULL, NULL),
(1963, 99, 66, '210', '12300570', NULL, NULL),
(1964, 80, 66, '211', '12300600', NULL, NULL),
(1965, 89, 67, '101', '12300601', NULL, NULL),
(1966, 77, 67, '102', '12300660', NULL, NULL),
(1967, 77, 67, '103', '12300762', NULL, NULL),
(1968, 89, 67, '104', '12300836', NULL, NULL),
(1969, 89, 67, '105', '12301002', NULL, NULL),
(1970, 89, 67, '106', '12301075', NULL, NULL),
(1971, 77, 67, '107', '12301106', NULL, NULL),
(1972, 77, 67, '108', '12301321', NULL, NULL),
(1973, 83, 67, '109', '12301351', NULL, NULL),
(1974, 99, 67, '110', '12301353', NULL, NULL),
(1975, 99, 67, '111', '12301394', NULL, NULL),
(1976, 80, 67, '112', '12301436', NULL, NULL),
(1977, 77, 65, 'S01', '12301518', NULL, NULL),
(1978, 77, 65, 'S02', '12301525', NULL, NULL),
(1979, 77, 65, 'S03', '12301652', NULL, NULL),
(1980, 88, 65, 'S04', '12301681', NULL, NULL),
(1981, 77, 65, 'S05', '12301930', NULL, NULL),
(1982, 101, 65, 'S06', '12302015', NULL, NULL),
(1983, 86, 65, 'S07', '12302051', NULL, NULL),
(1984, 77, 65, 'S08', '12302080', NULL, NULL),
(1985, 80, 65, 'S09', '12302195', NULL, NULL),
(1986, 78, 64, '1', '12302222', NULL, NULL),
(1987, 89, 64, '2', '12302241', NULL, NULL),
(1988, 77, 64, '3', '12302252', NULL, NULL),
(1989, 99, 64, '4', '12302327', NULL, NULL),
(1990, 99, 64, '5', '12302612', NULL, NULL),
(1991, 77, 64, '6', '12302645', NULL, NULL),
(1992, 77, 64, '7', '12302705', NULL, NULL),
(1993, 83, 64, '8', '12302825', NULL, NULL),
(1994, 77, 64, '9', '12302840', NULL, NULL),
(1995, 83, 64, '10', '12302925', NULL, NULL),
(1996, 89, 64, '11', '12302953', NULL, NULL),
(1997, 101, 64, '12', '12302969', NULL, NULL),
(1998, 80, 64, '13', '12303043', NULL, NULL),
(1999, 77, 63, '101', '12303679', NULL, NULL),
(2000, 77, 63, '102', '12303070', NULL, NULL),
(2001, 99, 63, '103', '12303101', NULL, NULL),
(2002, 99, 63, '104', '12303300', NULL, NULL),
(2003, 89, 63, '105', '12303375', NULL, NULL),
(2004, 77, 63, '106', '12303442', NULL, NULL),
(2005, 89, 63, '107', '12303452', NULL, NULL),
(2006, 89, 63, '108', '12303521', NULL, NULL),
(2007, 101, 63, '109', '12303569', NULL, NULL),
(2008, 89, 63, '110', '12303620', NULL, NULL),
(2009, 79, 63, '111', '12303644', NULL, NULL),
(2010, 77, 62, '201', '12303724', NULL, NULL),
(2011, 77, 62, '', '12303779', NULL, NULL),
(2012, 99, 62, '203', '12303809', NULL, NULL),
(2013, 99, 62, '204', '12303855', NULL, NULL),
(2014, 89, 62, '205', '12303866', NULL, NULL),
(2015, 89, 62, '206', '12303877', NULL, NULL),
(2016, 89, 62, '207', '12303910', NULL, NULL),
(2017, 77, 62, '208', '12303916', NULL, NULL),
(2018, 77, 62, '209', '12303921', NULL, NULL),
(2019, 77, 62, '210', '12303945', NULL, NULL),
(2020, 78, 62, '211', '12304011', NULL, NULL),
(2021, 89, 62, '212', '12304062', NULL, NULL),
(2022, 77, 62, '213', '12304093', NULL, NULL),
(2023, 79, 62, '214', '12304121', NULL, NULL),
(2055, 77, 68, '101', '12385578', NULL, NULL),
(2056, 77, 68, '102', '12330770', NULL, NULL),
(2057, 99, 68, '103', '12334824', NULL, NULL),
(2058, 99, 68, '104', '12399460', NULL, NULL),
(2059, 77, 68, '105', '12361228', NULL, NULL),
(2060, 77, 68, '106', '12350693', NULL, NULL),
(2061, 77, 68, '107', '12336615', NULL, NULL),
(2062, 84, 68, '108', '12350934', NULL, NULL),
(2063, 99, 52, 'S04', '12358534', NULL, NULL),
(2064, 77, 52, 'S06', '12398528', NULL, NULL),
(2065, 77, 52, 'S07', '12314689', NULL, NULL),
(2066, 99, 53, '24', '12399093', NULL, NULL),
(2067, 84, 53, '26', '12339055', NULL, NULL),
(2068, 99, 53, '25', '12308089', NULL, NULL),
(2069, 79, 53, '27', '12377102', NULL, NULL),
(2070, 77, 53, '19B', '12339864', NULL, NULL),
(2071, 86, 51, 'S.A', '12319930', NULL, NULL),
(2072, 89, 51, '53', '12356701', NULL, NULL),
(2073, 89, 51, '54', '12362481', NULL, NULL),
(2074, 77, 51, '55', '12326229', NULL, NULL),
(2075, 77, 51, '56', '12381743', NULL, NULL),
(2076, 77, 51, '57', '12364925', NULL, NULL),
(2077, 80, 51, 'Buv', '12386604', NULL, NULL),
(2078, 77, 51, 'Ac2', '12369198', NULL, NULL),
(2079, 77, 49, '158', '12398228', NULL, NULL),
(2080, 102, 59, 'Buv', '12377321', NULL, NULL),
(2085, 84, 51, '1CUIS', '12341523', NULL, NULL),
(2135, 86, 105, '1', '12369602', NULL, NULL),
(2136, 81, 105, '2', '12305094', NULL, NULL),
(2138, 86, 105, '4', '12328210', NULL, NULL),
(2139, 85, 106, 'ACC', '12347067', NULL, NULL),
(2141, 80, 68, '109', '12340578', NULL, NULL),
(2142, 77, 66, '205/2', '12327836', NULL, NULL),
(2143, 84, 66, 'cuisin', '12374548', NULL, NULL),
(2144, 77, 51, 'ver', '12335591', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mailsettings`
--

CREATE TABLE `mailsettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_transport` varchar(255) NOT NULL,
  `mail_host` varchar(255) NOT NULL,
  `mail_port` varchar(255) NOT NULL,
  `mail_username` varchar(255) NOT NULL,
  `mail_password` varchar(255) NOT NULL,
  `mail_encryption` varchar(255) NOT NULL,
  `mail_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mailsettings`
--

INSERT INTO `mailsettings` (`id`, `mail_transport`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.mailtrap.io', '2525', 'ed3caa94a48fd1', 'baf29d92154c72', 'tls', 'ajayyadavexpo@gmail.com', '2023-07-26 12:53:53', '2023-07-26 12:53:53');

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

CREATE TABLE `materiels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materiel` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `materiels`
--

INSERT INTO `materiels` (`id`, `materiel`, `created_at`, `updated_at`) VALUES
(3, 'pc', '2023-07-30 16:20:42', '2023-07-30 16:20:42');

-- --------------------------------------------------------

--
-- Structure de la table `metiers`
--

CREATE TABLE `metiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Metier` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `metiers`
--

INSERT INTO `metiers` (`id`, `Metier`, `created_at`, `updated_at`) VALUES
(3, 'Metier1', '2023-07-31 09:17:45', '2023-07-31 09:17:45');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_24_052122_create_frontusers_table', 1),
(6, '2021_10_24_055150_create_permission_tables', 1),
(7, '2021_10_31_101342_create_posts_table', 1),
(8, '2022_05_01_060321_add_profile_to_users_table', 1),
(9, '2022_05_19_122208_create_mailsettings_table', 1),
(10, '2023_07_26_135952_create_structures_table', 2),
(11, '2023_07_26_140253_add_id_str_to_frontusers_table', 3),
(12, '2023_07_26_140503_add_id_str_to_users_table', 4),
(13, '2023_07_26_140801_create_metiers_table', 5),
(14, '2023_07_26_141012_create_intervenants_table', 6),
(15, '2023_07_26_141225_create_sites_table', 7),
(16, '2023_07_26_141818_create_batiments_table', 8),
(17, '2023_07_26_142646_create_etages_table', 9),
(18, '2023_07_26_142757_create_locauxes_table', 10),
(19, '2023_07_26_143025_create_reclamations_table', 11),
(20, '2023_07_26_143149_create_materiels_table', 12),
(21, '2023_07_26_143259_create_interventions_table', 13),
(22, '2023_07_26_143422_create_objets_table', 14),
(23, '2023_08_01_094425_create_reclamation_table', 15),
(24, '2023_08_01_123923_create_reclamation_table', 16);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 33),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 25);

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

CREATE TABLE `objets` (
  `id_mat` bigint(20) UNSIGNED NOT NULL,
  `id_recl` bigint(20) UNSIGNED NOT NULL,
  `Reference` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'Role access', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(6, 'Role edit', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(7, 'Role create', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(8, 'Role delete', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(9, 'User access', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(10, 'User edit', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(11, 'User create', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(12, 'User delete', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(13, 'Permission access', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(14, 'Permission edit', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(15, 'Permission create', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(16, 'Permission delete', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(17, 'Mail access', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(18, 'Mail edit', 'web', '2023-07-26 12:53:52', '2023-07-26 12:53:52'),
(20, 'reclamation create', 'web', '2023-08-01 08:07:21', '2023-08-01 08:09:00'),
(21, 'reclamation access', 'web', '2023-08-01 08:07:34', '2023-08-01 08:07:47'),
(22, 'reclamation edit', 'web', '2023-08-01 11:18:07', '2023-08-01 11:18:07'),
(23, 'reclamation delete', 'web', '2023-08-01 11:18:13', '2023-08-01 11:18:13'),
(24, 'reclamation validate', 'web', '2023-08-15 09:02:15', '2023-08-15 09:02:15'),
(25, 'reclamation assign', 'web', '2023-08-15 12:06:46', '2023-08-15 12:06:46'),
(26, 'parametre access', 'web', '2023-08-15 12:13:07', '2023-08-15 12:13:07'),
(27, 'parametre administration access', 'web', '2023-08-15 12:16:29', '2023-08-15 12:17:01'),
(28, 'create and access own reclamations', 'web', '2023-08-15 12:26:24', '2023-08-15 12:26:24'),
(29, 'cancel reclamation', 'web', '2023-08-22 20:15:15', '2023-08-22 20:15:15');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `objet` varchar(255) NOT NULL,
  `reclamation` varchar(255) NOT NULL,
  `datereclamation` datetime DEFAULT NULL,
  `commentaire` varchar(255) NOT NULL DEFAULT 'Aucun  commentaire!',
  `pieces_jointes` longtext DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_site` bigint(20) UNSIGNED NOT NULL,
  `id_bat` bigint(20) UNSIGNED NOT NULL,
  `id_etg` bigint(20) UNSIGNED NOT NULL,
  `id_list_loc` bigint(20) NOT NULL,
  `id_loc` bigint(20) UNSIGNED NOT NULL,
  `id_type_mat` bigint(20) UNSIGNED DEFAULT NULL,
  `id_mat` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `archived` tinyint(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-07-26 12:53:51', '2023-07-26 12:53:51'),
(2, 'Utilisateur', 'web', '2023-07-26 12:53:51', '2023-08-08 15:36:56'),
(3, 'Régulateur', 'web', NULL, '2023-08-22 20:16:49');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(20, 2),
(21, 3),
(22, 2),
(23, 2),
(24, 2),
(25, 3),
(26, 1),
(27, 1),
(28, 2),
(29, 3);

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Site` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`id`, `Site`, `created_at`, `updated_at`) VALUES
(71, 'Siege', NULL, NULL),
(72, 'Mabella', NULL, NULL),
(75, 'Ryad', NULL, NULL),
(76, 'AGDAL', NULL, NULL),
(77, 'Complexe des Centres Techniques', NULL, NULL),
(115, 'Mahaj Riyad', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `structures`
--

CREATE TABLE `structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Description` char(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `structures`
--

INSERT INTO `structures` (`id`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'structure1', NULL, NULL),
(2, 'structure2', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_met` bigint(20) UNSIGNED DEFAULT NULL,
  `id_str` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `telephone`, `profile`, `email_verified_at`, `password`, `id_met`, `id_str`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@admin.com', NULL, 'user.avif', NULL, '$2y$10$X0gOszcxiwyu4iAEASWV0OHMx6REbeEDVP/z9xqaljoZ88MulEDOG', NULL, NULL, NULL, '2023-09-05 17:46:36', '2023-09-05 17:46:36'),
(4, 'ayman', '', 'ayman@gmail.com', NULL, NULL, NULL, '$2y$10$KPs44LGfVS8tFUTvq4sCDeuYgg.qoDgRUp09b0RGz1e7JCRk5ShMq', NULL, NULL, NULL, '2023-08-01 07:16:02', '2023-08-01 07:16:36'),
(25, 'elkhaldi', 'nada', 'nada@gmail.com', '123456', NULL, NULL, '$2y$10$h.2D0p3fVp.dRyLG8rIJxe.BxMiiKic6nzBsiCJqE7TO85HVXLdLq', 3, NULL, NULL, '2023-08-22 20:21:44', '2023-08-22 20:21:44'),
(33, 'Elkhaldi', 'nada', 'elkhaldi.nada@gmail.com', '0123456789', NULL, NULL, '$2y$10$WjwaQvVVaYWKj1uRK2SVO.xHtG1j.CWfVylQOsGNCU05l2sXDrxK.', NULL, NULL, NULL, '2023-09-05 18:18:59', '2023-09-05 18:18:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `batiments`
--
ALTER TABLE `batiments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batiments_id_site_foreign` (`id_site`);

--
-- Index pour la table `detail_materiels`
--
ALTER TABLE `detail_materiels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materiel` (`id_materiel`);

--
-- Index pour la table `etages`
--
ALTER TABLE `etages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etages_id_bat_foreign` (`id_bat`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Etat` (`Etat`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `frontusers`
--
ALTER TABLE `frontusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_structure_id` (`id_str`),
  ADD KEY `id_met_foreignkey` (`id_met`);

--
-- Index pour la table `intervenants`
--
ALTER TABLE `intervenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `intervenants_email_int_unique` (`email_int`),
  ADD KEY `intervenants_id_met_foreign` (`id_met`);

--
-- Index pour la table `interventions`
--
ALTER TABLE `interventions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rec_id_fk` (`id_recl`),
  ADD KEY `intr_id_fk` (`id_intr`),
  ADD KEY `met_id_fk` (`id_met`);

--
-- Index pour la table `ldapusers`
--
ALTER TABLE `ldapusers`
  ADD UNIQUE KEY `guid` (`guid`),
  ADD UNIQUE KEY `domain` (`domain`);

--
-- Index pour la table `liste_locauxes`
--
ALTER TABLE `liste_locauxes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `locauxes`
--
ALTER TABLE `locauxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locauxes_id_etg_foreign` (`id_etg`),
  ADD KEY `id_loc_foreign` (`id_loc`);

--
-- Index pour la table `mailsettings`
--
ALTER TABLE `mailsettings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `materiels`
--
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `objets`
--
ALTER TABLE `objets`
  ADD PRIMARY KEY (`id_recl`,`id_mat`),
  ADD KEY `objets_id_mat_foreign` (`id_mat`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_site_id` (`id_site`),
  ADD KEY `fk_bat_id` (`id_bat`),
  ADD KEY `fk_etg_id` (`id_etg`),
  ADD KEY `fk_local` (`id_loc`),
  ADD KEY `fk_liste_locaux` (`id_list_loc`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `Type_materiel_fk` (`id_type_mat`),
  ADD KEY `detail_materiel_fk` (`id_mat`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_id_str` (`id_str`),
  ADD KEY `fk_met_id` (`id_met`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `detail_materiels`
--
ALTER TABLE `detail_materiels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etages`
--
ALTER TABLE `etages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `frontusers`
--
ALTER TABLE `frontusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `intervenants`
--
ALTER TABLE `intervenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT pour la table `interventions`
--
ALTER TABLE `interventions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `liste_locauxes`
--
ALTER TABLE `liste_locauxes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT pour la table `locauxes`
--
ALTER TABLE `locauxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2145;

--
-- AUTO_INCREMENT pour la table `mailsettings`
--
ALTER TABLE `mailsettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `structures`
--
ALTER TABLE `structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `batiments`
--
ALTER TABLE `batiments`
  ADD CONSTRAINT `batiments_id_site_foreign` FOREIGN KEY (`id_site`) REFERENCES `sites` (`id`);

--
-- Contraintes pour la table `detail_materiels`
--
ALTER TABLE `detail_materiels`
  ADD CONSTRAINT `fk_materiel` FOREIGN KEY (`id_materiel`) REFERENCES `materiels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etages`
--
ALTER TABLE `etages`
  ADD CONSTRAINT `etages_id_bat_foreign` FOREIGN KEY (`id_bat`) REFERENCES `batiments` (`id`);

--
-- Contraintes pour la table `frontusers`
--
ALTER TABLE `frontusers`
  ADD CONSTRAINT `fk_structure_id` FOREIGN KEY (`id_str`) REFERENCES `structures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_met_foreignkey` FOREIGN KEY (`id_met`) REFERENCES `metiers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `intervenants`
--
ALTER TABLE `intervenants`
  ADD CONSTRAINT `intervenants_id_met_foreign` FOREIGN KEY (`id_met`) REFERENCES `metiers` (`id`);

--
-- Contraintes pour la table `interventions`
--
ALTER TABLE `interventions`
  ADD CONSTRAINT `intr_id_fk` FOREIGN KEY (`id_intr`) REFERENCES `intervenants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `met_id_fk` FOREIGN KEY (`id_met`) REFERENCES `metiers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rec_id_fk` FOREIGN KEY (`id_recl`) REFERENCES `reclamation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `locauxes`
--
ALTER TABLE `locauxes`
  ADD CONSTRAINT `id_loc_foreign` FOREIGN KEY (`id_loc`) REFERENCES `liste_locauxes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `locauxes_id_etg_foreign` FOREIGN KEY (`id_etg`) REFERENCES `etages` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `Type_materiel_fk` FOREIGN KEY (`id_type_mat`) REFERENCES `materiels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_materiel_fk` FOREIGN KEY (`id_mat`) REFERENCES `detail_materiels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bat_id` FOREIGN KEY (`id_bat`) REFERENCES `batiments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_etg_id` FOREIGN KEY (`id_etg`) REFERENCES `etages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_liste_locaux` FOREIGN KEY (`id_list_loc`) REFERENCES `liste_locauxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_local` FOREIGN KEY (`id_loc`) REFERENCES `locauxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_site_id` FOREIGN KEY (`id_site`) REFERENCES `sites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_id_str` FOREIGN KEY (`id_str`) REFERENCES `structures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_met_id` FOREIGN KEY (`id_met`) REFERENCES `metiers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
