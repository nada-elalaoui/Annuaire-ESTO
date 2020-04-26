

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annuaireESTO`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ppr` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ppr`, `nom`, `prenom`, `email`, `mdp`, `tel`, `description`) VALUES
('4343434', 'Nouara', 'Hanane', 'a@a.com', '1234', '0627383931', 'Fonctionaire');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `cne` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `filliere` varchar(20) NOT NULL,
  `description` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`cne`, `nom`, `prenom`, `email`, `mdp`, `tel`, `filliere`, `description`) VALUES
('B38283293', 'Alaoui', 'Nada', 'e@e.com', '1234', '0712436578', 'GBA', 'Etudiant'),
('J83929392', 'Kamilia', 'Hanin', 't@t.com', '1234', '0632939202', 'DAI', 'Etudiant'),
('K832929320', 'Anissa', 'Lorik', 'i@i.com', '1234', '0639230270', 'DAI', 'Etudiant'),
('O928392302', 'Amina', 'Bender', 'n@n.com', '1234', '0677270010', 'DAI', 'Etudiant'),
('Y723828382', 'Raie', 'Nirs', 'r@r.com', '1234', '0632323232', 'DAI', 'Etudiant');

-- --------------------------------------------------------

--
-- Table structure for table `filliere`
--

CREATE TABLE `filliere` (
  `titre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filliere`
--

INSERT INTO `filliere` (`titre`) VALUES
('GBA'),
('GCF'),
('LPID');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ppr`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`cne`);

--
-- Indexes for table `filliere`
--
ALTER TABLE `filliere`
  ADD PRIMARY KEY (`titre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
