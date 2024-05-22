-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 01:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_user_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_token` varchar(255) DEFAULT NULL,
  `password_changed` timestamp NULL DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_user_id`, `email`, `password`, `password_token`, `password_changed`, `datetime`) VALUES
(1, 'test@test.nl', '$2y$10$3eJXM2NBYpOH8opTNAHVye/uRtxMhWNLS0NX9qpp1WqygPBnX4vjS', '', '2021-02-18 15:06:05', '2021-02-17 15:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titel` varchar(100) NOT NULL,
  `beschrijving` text NOT NULL,
  `datum` datetime NOT NULL,
  `afbeelding` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `titel`, `beschrijving`, `datum`, `afbeelding`) VALUES
(1, 'blog 1', 'bla bla bla', '2024-05-16 14:59:59', 'bla.png');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `id` int(5) NOT NULL,
  `titel` varchar(100) NOT NULL,
  `beschrijving` text NOT NULL,
  `afbeelding_1` varchar(255) NOT NULL,
  `prijs` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`id`, `titel`, `beschrijving`, `afbeelding_1`, `prijs`) VALUES
(1, 'Hydro Whey', 'Hydrowhey is het snelste en meest geavanceerde en pure eiwitproduct dat je ooit gehad hebt. Excellente kwaliteit!\r\n\r\n', 'hydro.png', 88.99),
(4, 'Serious Mass', 'SERIOUS MASS is de ultieme formule voor spieropbouw en gewichtstoename. Met 1.250 calorieën per portie van 2 maatscheppen en 50 gram eiwit om spierherstel te ondersteunen, is dit poeder de ideale shake na de training en tussen de maaltijden door om uw doelen te bepalen. SERIOUS MASS biedt u de hulpmiddelen die u nodig heeft om uw doelstellingen voor gewichtstoename te ondersteunen.\r\n\r\n', 'mass.png', 30.99),
(5, 'Gold Standard Pro Gainer', 'Gold Standard PRO Gainer is een eiwitrijke formule voor gewichtstoename die calorieën levert die tellen tijdens het herstel. Elke portie zit boordevol 60 gram hoogwaardige eiwitten om het herstel op gang te helpen en 82 gram koolhydraten om het energieniveau te herstellen. Gold Standard PRO Gainer biedt u de optimale formule voor uw post-workout shake of om de calorie-inname tussen de maaltijden door te ondersteunen.\r\n\r\n', 'gold.png', 75.99),
(6, 'Micronized Creatine Capsules', 'Creatine monohydraat is uitgebreid onderzocht en er is aangetoond dat het de spieromvang, kracht en kracht helpt ondersteunen bij consistent gebruik in combinatie met een gezond, uitgebalanceerd dieet en regelmatige krachttraining.', 'crea.png', 19.99),
(7, 'Gold Standard 100% Isolate', 'Om Gold Standard 100% Isolate te creëren, beginnen we met het selecteren van alleen wei-eiwit van de hoogste kwaliteit, dat een reeks geavanceerde filtratieprocessen ondergaat om overtollig vet, cholesterol en suiker te ‘isoleren’. Een deel van dit Whey Protein Isolaat wordt vervolgens gehydrolyseerd – opgesplitst in kleinere ketens van aminozuren. Het eindproduct is een snel verteerbaar compleet eiwit dat niet meer dan 1 gram koolhydraten, minder dan een gram vet en meer dan 80% puur eiwit per portie bevat.\r\n\r\n', 'iso.png', 25.99),
(8, 'Opti-Men', 'OPTI-MEN® is meer dan een multi. Het is een NUTRIENT OPTIMISATION SYSTEM OPTI-MEN® dat meer dan 75 actieve ingrediënten levert in 4 mengsels die speciaal zijn ontworpen om de voedingsbehoeften van actieve mannen te ondersteunen. Elke portie van 3 tabletten bevat aminozuren in vrije vorm, antioxidantvitaminen A, C en E, essentiële mineralen en botanische extracten in fundamentele hoeveelheden waarop kan worden voortgebouwd door een gezond, uitgebalanceerd dieet te volgen.', 'men.png', 31.99),
(9, 'Opti-Women', 'OPTI-WOMEN® is meer dan een multi. Het is een Nutrient Optimization System dat 40 actieve ingrediënten levert, waaronder 23 vitamines en mineralen, ontworpen om de voedingsbehoeften van actieve vrouwen te ondersteunen. Elke portie van 2 capsules levert verreikende voedingsondersteuning in door de Vegetarische Vereniging goedgekeurde Vcaps.\n\n', 'opti.png', 20.99),
(10, 'BCAA 1000', 'BCAA 1000 Caps worden aanbevolen als eerste in de ochtend en/of gedurende de 30 minuten vlak voor of direct na de training. Neem eenvoudigweg 2 capsules met uw favoriete drankje of met uw eiwitshake.', 'bcaa.png', 12.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_user_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
