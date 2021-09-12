-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 12 sep. 2021 à 15:07
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lamatch`
--

-- --------------------------------------------------------

--
-- Structure de la table `applicant`
--

DROP TABLE IF EXISTS `applicant`;
CREATE TABLE IF NOT EXISTS `applicant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `looking_for` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_active` datetime DEFAULT NULL,
  `profil_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `applicant`
--

INSERT INTO `applicant` (`id`, `firstname`, `lastname`, `looking_for`, `email`, `birthday`, `education_level`, `linkedin`, `created_at`, `updated_at`, `last_active`, `profil_picture`) VALUES
(1, 'Jean-Eudes', 'ROGER', 0, 'jean-eudes@gmail.com', '2000-09-10 00:00:00', 'Bac + 2', 'https://www.linkedin.com/in/jean-eudes-roger', '2021-09-15 00:00:00', NULL, NULL, 'https://burst.shopifycdn.com/photos/portrait-young-man-smiling.jpg?width=1000&format=pjpg&exif=0&iptc=0'),
(2, 'Zakaria', 'BICHON', 1, 'zakariadu44@gmail.com', '2000-09-10 00:00:00', 'Bac', 'https://www.linkedin.com/in/zakaria-bichon', '2021-09-15 00:00:00', NULL, NULL, 'https://burst.shopifycdn.com/photos/stylish-man-in-bow-tie.jpg?width=1000&format=pjpg&exif=0&iptc=0'),
(3, 'Marie-Ange', 'LA BRANCHE', 1, 'marie-ange@free.fr', '2000-09-10 00:00:00', 'Bac', 'https://www.linkedin.com/in/marie-ange-la-branche', '2021-09-15 00:00:00', NULL, NULL, 'https://burst.shopifycdn.com/photos/woman-portrait-on-pink-brick.jpg?width=1000&format=pjpg&exif=0&iptc=0'),
(4, 'Géraldine', 'DE MONACO', 0, 'geraldine@monaco.com', '2000-09-10 00:00:00', 'Bac + 2', 'https://www.linkedin.com/in/geraldine-de-monaco', '2021-09-15 00:00:00', NULL, NULL, 'https://burst.shopifycdn.com/photos/woman-outside-brownstone.jpg?width=1850&format=pjpg&exif=1&iptc=1'),
(5, 'Matéo', 'GUOGE', 0, 'matguoge@gmail.com', '2000-09-10 00:00:00', 'Bac + 3', 'https://www.linkedin.com/in/mateo-guoge', '2021-09-15 00:00:00', NULL, NULL, 'https://burst.shopifycdn.com/photos/friendly-smiling-man.jpg?width=1000&format=pjpg&exif=1&iptc=1'),
(6, 'Mohamed', 'RAMTAH', 1, 'mohamed@gmail.com', '2000-09-10 00:00:00', 'Bac + 5', 'https://www.linkedin.com/in/mohamed-ramtah', '2021-09-15 00:00:00', NULL, NULL, 'https://burst.shopifycdn.com/photos/smiling-man-in-blue.jpg?width=1000&format=pjpg&exif=0&iptc=0'),
(7, 'Leslie', 'LEROUX', 1, 'leslie@gmail.com', '2000-09-10 00:00:00', 'Bac', 'https://www.linkedin.com/in/leslie-leroux', '2021-09-15 00:00:00', NULL, NULL, 'https://burst.shopifycdn.com/photos/young-business-woman-smiling-portrait.jpg?width=1850&format=pjpg&exif=1&iptc=1'),
(8, 'Salma', 'ADJAMAGBO', 1, 'salma@gmail.com', '2000-09-10 00:00:00', 'Bac + 4', 'https://www.linkedin.com/in/salma-adjamagbo', '2021-09-15 00:00:00', NULL, NULL, 'https://burst.shopifycdn.com/photos/model-poses-in-velvet-fashion.jpg?width=1000&format=pjpg&exif=0&iptc=0'),
(9, 'Audrey', 'BRULLON', 0, 'audreybrullon@gmail.com', '2000-09-10 00:00:00', 'Bac + 3', 'https://www.linkedin.com/in/audrey-brullon', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C5603AQEg3eEPvfy7LQ/profile-displayphoto-shrink_800_800/0/1608671326581?e=1635379200&v=beta&t=gGmtHegtAr9dPJ0-Wv0IM2oPXx1QdPq2dqMLCxS2MGo'),
(10, 'Jason', 'FOUASSON', 1, 'jasonfouasson@mail.com', '2000-09-10 00:00:00', 'Bac + 3', 'https://www.linkedin.com/in/jason-fouasson', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C4D03AQENW4kvXCJECw/profile-displayphoto-shrink_800_800/0/1608574177510?e=1635379200&v=beta&t=F1zvA7Z0EinVmw6e1IA5W8d1jFe6sMaFmuKt5ckQur4'),
(11, 'Killian', 'LEROUX', 0, 'killian@lamacompta.co', '2000-09-10 00:00:00', 'Bac + 5', 'https://www.linkedin.com/in/killian-leroux', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C4D03AQFgY5dygsYCIg/profile-displayphoto-shrink_800_800/0/1608730873091?e=1635379200&v=beta&t=mS4H-SeEZiVFRyRdkCxWvyZwv1TLyCmV8PoaT4QXkGQ'),
(12, 'Fabien', 'POTENCIER', 1, 'fabienyeah@symfony.com', '2000-09-10 00:00:00', 'Bac + 8', 'https://www.linkedin.com/in/fabienpotencier/', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C4E03AQEOtK_-fdSnyg/profile-displayphoto-shrink_800_800/0/1516171814332?e=1635379200&v=beta&t=poOb4cLCWR1SWZAsinfVOI3NRxrIa1PT4zkDOiHY24w'),
(13, 'Evan', 'YOU', 1, 'evant.you@vue.js', '2000-09-10 00:00:00', 'Bac + 7', 'https://www.linkedin.com/in/evanyou/', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C4D03AQFzenl2i2dtYQ/profile-displayphoto-shrink_800_800/0/1517443199683?e=1635379200&v=beta&t=9LD5gmikcQ9LHtTnTniEx_mKU9v5x72rVdbLaxldomk'),
(14, 'Kévin', 'DUNGLAS', 1, 'dunglas@tilleul.co', '2000-09-10 00:00:00', 'Bac + 5', 'https://www.linkedin.com/in/dunglas/', '2021-09-15 00:00:00', NULL, NULL, 'https://pbs.twimg.com/profile_images/1397853695614885888/0kwfIQBL_400x400.jpg'),
(15, 'Rasmus', 'LERDORF', 0, 'lerdorf@msn.com', '2000-09-10 00:00:00', 'Bac + 2', 'https://www.linkedin.com/in/rlerdorf/', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C4E03AQH5XURxSsuOkA/profile-displayphoto-shrink_800_800/0/1516166401719?e=1635379200&v=beta&t=9OYNDUW_EVDi0FTSEpqXznGWMZXDJaGLwG-rZ9AgQ4Y'),
(16, 'Brendan', 'EICH', 1, 'brendan-eich@outlook.com', '2000-09-10 00:00:00', 'Bac + 5', 'https://www.linkedin.com/in/brendaneich/', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C4E03AQEFjUGBArfpSA/profile-displayphoto-shrink_800_800/0/1516174154617?e=1635379200&v=beta&t=K07KY3whxQTwWIJiNi2rxq9Dm_NbeFUI5rkAMBY9r94'),
(17, 'Bill', 'GATES', 1, 'bill@gates.com', '2000-09-10 00:00:00', 'Bac + 5', 'https://www.linkedin.com/in/williamhgates/', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C4D03AQHqRRhVsnaziA/profile-displayphoto-shrink_800_800/0/1626063510328?e=1635379200&v=beta&t=lUzclY4d77xiNRYf47E-vw1mfQN4HIVuaKFFIP0lU4w'),
(18, 'Elon', 'MUSK', 0, 'elon.musk@yahoo.com', '2000-09-10 00:00:00', 'Bac + 8', 'https://www.linkedin.com/in/elon-musk-b850381b8/', '2021-09-15 00:00:00', NULL, NULL, 'https://media-exp1.licdn.com/dms/image/C5603AQEGp4BB5PrAOg/profile-displayphoto-shrink_800_800/0/1629138376907?e=1635379200&v=beta&t=iTvrEDOftZjuIwf8X1R17z_cglcFhQctd5PJqypBF3w');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_values` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headcount` int(11) NOT NULL,
  `business_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_active` datetime DEFAULT NULL,
  `creation_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `website_link`, `contact_email`, `description`, `company_values`, `headcount`, `business_area`, `created_at`, `updated_at`, `last_active`, `creation_year`) VALUES
(1, 'Lamacompta', 'https://lamacompta.co/wp-content/themes/oceanwp_child/assets/images/logo-lamacompta.svg', 'https://lamacompta.co/', 'rh@lamacompta.co', 'Startup nantaise créée en 2020, nous sommes animés par l\'épanouissement au travail 🤗\r\n\r\nToute notre équipe œuvre pour offrir aux cabinets d\'expertise comptable une nouvelle manière d\'aborder le recrutement et aux candidats une plus grande transparence sur', 'Bien-être au travail', 1, 'Droit Informatique', '2021-09-22 00:00:00', NULL, NULL, '2020'),
(2, 'TGS France', 'https://www.tgs-france.fr/app/themes/default/assets/images/front/share-default-4941b15133.png', 'https://www.tgs-france.fr/', 'recrutement@tgs-france.fr', 'Rejoindre TGS France, c’est saisir l’opportunité de grandir et envisager plusieurs vies professionnelles.\r\n\r\nChez nous, chacun·e trouve sa place que vous préfériez produire, conseiller, vendre et/ou manager, vous pourrez vous appuyer sur nos 110 agences e', 'Respect de l\'environnement,Accompagnement,Bienveillance', 500, 'Expertise-Comptable', '2021-09-22 00:00:00', NULL, NULL, '1982'),
(3, 'iAdvize', 'https://cdn2.hubspot.net/hubfs/403167/WEBSITE-2020/HOMEPAGE/Logo%20iadvize%20(2).png', 'https://www.iadvize.com/fr/', 'join-us@iadvize.com', 'The only conversational platform which combines the best of human and AI to optimize customer experience.\r\n\r\nThey humanize the digital experience at scale and make it profitable.\r\n\r\niAdvize is a conversational platform which allows over 2,000 brands in 10', 'Respect de l\'environnement,Bienveillance', 50, 'Tech', '2021-09-22 00:00:00', NULL, NULL, '0'),
(4, 'Rubato', 'https://rubato.fr/wp-content/uploads/2020/11/Logo_SizeL_NOIR.jpg', 'https://rubato.fr/', 'rh@rubato.fr', 'Une application au service des avocats\r\nRubato est une application qui permet la gestion intelligente des échéances pour cabinet d’avocats.\r\nComment ?\r\n–  En traduisant les dossiers des avocats en une Séquence de tâches et de rendez-vous enchaînés\r\n–  En ', 'Equilibre vie pro / vie perso,Bien-être au travail,Le travail mérite salaire,Chèques déjeuner', 1, 'Droit', '2021-09-22 00:00:00', NULL, NULL, '2017'),
(5, 'kiss my', 'https://www.kissmy.co/_nuxt/65116fc77ff67abffa975e8d9e6c8abd.svg', 'https://www.kissmy.co/fr', 'kiss@kissmy.co', 'kiss my est une agence web implantée à Nantes. Nous apportons une expertise web complète : UX / UI, webdesign, développement front et back (Vue.JS, Laravel), admin sys (Kubernetes), SEO et rédactionnelle. kiss my c\'est 3 trucs importants : des gens, des v', 'Respect de l\'environnement,Accompagnement,Bienveillance', 1, 'Tech', '2021-09-22 00:00:00', NULL, NULL, '2016'),
(6, 'Lengow', 'https://www.lengow.com/wp-content/uploads/2018/03/logo.svg', 'https://www.lengow.com/fr/', 'recruit@lengow.com', 'Une entreprise technologique dotée d’une forte ambition\r\nNotre volonté : être une source d’inspiration et de décision pour les marques, distributeurs et agences.\r\n\r\nUn outil technique, mais une histoire profondément humaine\r\n\r\nÉquipes e-commerce & marketi', 'Chèques déjeuner,Respect de l\'environnement', 50, 'Commerce', '2021-09-22 00:00:00', NULL, NULL, '2008'),
(7, 'Microsoft', 'https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE1Mu3b?ver=5c31', 'https://www.microsoft.com/fr-fr/', 'career@microsoft.com', 'Microsoft Corporation est une multinationale informatique et micro-informatique américaine, fondée en 1975 par Bill Gates et Paul Allen. Microsoft fait partie des principales capitalisations boursières du NASDAQ, aux côtés d\'Apple et d\'Amazon. En 2018, le', 'Respect d\'autrui,Multiculturel,Chèques vacances,Chèques déjeuner', 12, 'Droit', '2021-09-22 00:00:00', NULL, NULL, '1975'),
(8, 'SensioLabs', 'https://sensiolabs.com/build/images/logos/header-logo.svg', 'https://sensiolabs.com/fr/', 'join@sensiolabs.com', 'Pour nous, avancer signifie s\'entourer des meilleurs talents en restant ouvert aux nouvelles idées et à l\'écoute de ceux qui nous entourent. Notre objectif est de sortir des sentiers battus, de créer, d\'innover et de regarder toujours plus loin. <br><br>D', 'Respect de l\'environnement,Accompagnement,Bienveillance', 500, 'Tech', '2021-09-22 00:00:00', NULL, NULL, '1995'),
(9, 'Crisp', 'https://static.wixstatic.com/media/8354b7_214842c2c51046b4b50a0d4920b2f58c~mv2.png/v1/fit/w_820%2Ch_312%2Cal_c/file.png', 'https://crisp.chat/fr/', 'rh@crisp.chat', 'En mission pour rendre l’expérience client plus agréable, Crisp c\'est 200 000 utilisateurs, créé en France en 2015 et 100% auto-financé 💪', 'dynamique', 1, 'Tech', '2021-09-22 00:00:00', NULL, NULL, '2015');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formation_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_404021BF97139001` (`applicant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `school_name`, `formation_title`, `start_date`, `end_date`, `location`, `country`, `applicant_id`) VALUES
(1, 'Ynov', 'Expert developpeur web', '2021-09-08 00:00:00', '2021-09-23 00:00:00', 'Nantes', 'France', 1),
(2, 'Universite', 'Licence math/info', '2020-09-08 00:00:00', '2020-09-23 00:00:00', 'Poitiers', 'France', 1);

-- --------------------------------------------------------

--
-- Structure de la table `matching`
--

DROP TABLE IF EXISTS `matching`;
CREATE TABLE IF NOT EXISTS `matching` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `matching_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DC10F289979B1AD6` (`company_id`),
  UNIQUE KEY `UNIQ_DC10F28997139001` (`applicant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matching`
--

INSERT INTO `matching` (`id`, `company_id`, `applicant_id`, `matching_date`) VALUES
(1, 1, 1, '2021-09-14 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `professional_experience`
--

DROP TABLE IF EXISTS `professional_experience`;
CREATE TABLE IF NOT EXISTS `professional_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_32FDB9BA97139001` (`applicant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professional_experience`
--

INSERT INTO `professional_experience` (`id`, `start_date`, `end_date`, `location`, `country`, `applicant_id`, `company`, `description`, `contract_type`, `title`) VALUES
(1, '2021-09-13 00:00:00', '2021-09-25 00:00:00', 'Nantes', 'France', 1, 'Edwin le roi de la cascade', 'Je faisais des trucs', 'Alternance', 'Compta'),
(2, '2020-09-13 00:00:00', '2021-07-14 00:00:00', 'Nantes', 'France', 1, 'Lamacompta', 'Je faisais des choses', 'Cdi', 'Developpeur');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5E3DE47797139001` (`applicant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id`, `name`, `level`, `category`, `sub_category`, `applicant_id`) VALUES
(1, 'Recherche juridique', 'moyen', 'Droit', NULL, 1),
(2, 'Rédaction juridique', 'moyen', 'Droit', NULL, NULL),
(3, 'Droit des affaires', 'moyen', 'Droit', NULL, NULL),
(4, 'HTML', 'moyen', 'Informatique', 'Front', NULL),
(5, 'CSS', 'moyen', 'Informatique', 'Front', NULL),
(6, 'JS', 'moyen', 'Informatique', 'Front', 1),
(7, 'PHP', 'moyen', 'Informatique', 'Back', NULL),
(8, 'MySQL', 'moyen', 'Informatique', 'Base de données', NULL),
(9, 'Cassandra', 'moyen', 'Informatique', 'Base de données', NULL),
(10, 'Symfony', 'moyen', 'Informatique', 'Back', NULL),
(11, 'VueJS', 'moyen', 'Informatique', 'Front', NULL),
(12, 'Nuxt', 'moyen', 'Informatique', 'Front', NULL),
(13, 'MongoDB', 'moyen', 'Informatique', 'Base de données', NULL),
(14, 'Linux', 'moyen', 'Informatique', 'OS', NULL),
(15, 'Windows', 'moyen', 'Informatique', 'OS', NULL),
(16, 'Mac OS', 'moyen', 'Informatique', 'OS', NULL),
(17, 'Android', 'moyen', 'Informatique', 'OS', NULL),
(18, 'iOS', 'moyen', 'Informatique', 'OS', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sought_region`
--

DROP TABLE IF EXISTS `sought_region`;
CREATE TABLE IF NOT EXISTS `sought_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4A5E315497139001` (`applicant_id`),
  KEY `IDX_4A5E3154979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sought_region`
--

INSERT INTO `sought_region` (`id`, `region`, `country`, `applicant_id`, `company_id`) VALUES
(1, 'Nantes', 'France', 1, NULL),
(2, 'Poitiers', 'France', 1, NULL),
(5, 'Bretagne', 'France', 1, NULL),
(6, 'Paris', 'France', 1, NULL),
(7, 'Poitiers', 'France', NULL, 1),
(8, 'Nantes', 'France', NULL, 2),
(10, 'Nantes', 'France', NULL, 6),
(11, 'Paris', 'France', NULL, 2),
(13, 'Nantes', 'France', NULL, 9),
(14, 'Poitiers', 'France', NULL, 5),
(15, 'Poitiers', 'France', NULL, 2),
(17, 'Nantes', 'France', NULL, 7),
(18, 'Poitiers', 'France', NULL, 7),
(19, 'Bretagne', 'France', NULL, 7),
(20, 'Paris', 'France', NULL, 7),
(21, 'Nantes', 'France', NULL, 8);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_active` datetime DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D64997139001` (`applicant_id`),
  UNIQUE KEY `UNIQ_8D93D649979B1AD6` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `applicant_id`, `company_id`, `username`, `roles`, `password`, `created_at`, `updated_at`, `last_active`, `email`) VALUES
(15, 1, NULL, 'admin', '[\"ROLE_USER\"]', '$2y$13$9nWElB6uLL/TZN6BYv3iDu9qcb1d.9q11s/.7vV9bFcK.WyQ9Cuny', '2021-09-09 16:32:47', '2021-09-10 16:29:10', '2021-09-12 14:45:40', 'admin@admin.fr'),
(16, NULL, NULL, 'SpinBox', '[\"ROLE_USER\"]', '$2y$13$wns1uM6MWq7d02JitPf33OX232TT28fLi2p0eh4V8z135funvMxLm', '2021-09-09 21:46:59', NULL, NULL, 'quentin.mimault@orange.fr');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BF97139001` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`);

--
-- Contraintes pour la table `matching`
--
ALTER TABLE `matching`
  ADD CONSTRAINT `FK_DC10F28997139001` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`),
  ADD CONSTRAINT `FK_DC10F289979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Contraintes pour la table `professional_experience`
--
ALTER TABLE `professional_experience`
  ADD CONSTRAINT `FK_32FDB9BA97139001` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`);

--
-- Contraintes pour la table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `FK_5E3DE47797139001` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`);

--
-- Contraintes pour la table `sought_region`
--
ALTER TABLE `sought_region`
  ADD CONSTRAINT `FK_4A5E315497139001` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`),
  ADD CONSTRAINT `FK_4A5E3154979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64997139001` FOREIGN KEY (`applicant_id`) REFERENCES `applicant` (`id`),
  ADD CONSTRAINT `FK_8D93D649979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
