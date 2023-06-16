-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2023 at 07:49 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IG2Rev`
--

-- --------------------------------------------------------

--
-- Table structure for table `Chapters`
--

CREATE TABLE `Chapters` (
  `Id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Name` char(255) DEFAULT NULL,
  `Subject` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Chapters`
--

INSERT INTO `Chapters` (`Id`, `Name`, `Subject`) VALUES
(1, 'Matrice', 1),
(2, 'Bilan et compte de résultat', 2),
(3, 'Polynômes', 1),
(4, 'Complexes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Lessons`
--

CREATE TABLE `Lessons` (
  `Id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT ,
  `Title` char(255) DEFAULT NULL,
  `Chapter` int(11) DEFAULT NULL,
  `Text` text DEFAULT NULL,
  `Description` char(255) DEFAULT NULL,
  `Owner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Lessons`
--

INSERT INTO `Lessons` (`Id`, `Title`, `Chapter`, `Text`, `Description`, `Owner`) VALUES
(1, 'Définition d\'une Matrice', 1, 'Les matrices sont des tableaux d\'éléments (nombres,caractères) qui servent à interpréter les résultats théoriques de l\'algèbre linéaire.', 'Explication courte de la définition d\'une Matrice', 1),
(2, 'Le Bilan c\'est quoi ?', 2, 'Tableau résumé de l\'inventaire d\'une entreprise à un instant T. Il est composé de 2 parties, l\'actif et le passif  ', 'Brève description du Bilan d\'une entreprise', 2),
(3, 'Déterminant d\'une matrice', 1, 'Introduction\r\n\r\nNous allons voir dans ce chapitre comment calculer le déterminant d’une matrice. Celui-ci ne se calcule que pour des matrices carrées, donc on parlera ici, ce qui simplifie les choses.\r\nIl faut tout d’abord préciser que le déterminant d’une matrice est un réel, pas une matrice !\r\nAinsi :\r\n\r\n\\Huge A \\in M_{n}(\\mathbb{R}), mais \\, det(A) \\in \\mathbb{R}\r\n\r\nNous avions vu dans le cours sur les matrices que le déterminant sert à savoir si une matrice est inversible ou non. En effet, une matrice est inversible si et seulement si son déterminant est non nul : c’est la principale utilité du déterminant.\r\n\r\nNous verrons tout d’abord le cas particulier des matrices 2 x 2, puis l’autre cas particulier des matrices 3 x 3 avec la règle de Sarrus.\r\nNous verrons également d’autres cas particuliers comme les matrices diagonales et triangulaires.\r\n\r\nLa méthode du développement selon une ligne ou une colonne sera également traitée.\r\n\r\nLes matrices 2 x 2\r\n\r\nAvant de commencer, parlons un peu de notation.\r\nLe déterminant d’une matrice A se note det(A).\r\n\r\nQuand on a la matrice en entier, le déterminant se note entre des barres et non entre des parenthèses.\r\nPrenons un exemple :\r\n\r\n\\Huge A = \\begin{pmatrix} 1 & 3 \\\\ 7 & 4 \\end{pmatrix}\r\n\r\n\\Huge det(A) = \\begin{vmatrix} 1 & 3 \\\\ 7 & 4 \\end{vmatrix}\r\n\r\nComme tu le vois il suffit de remplacer les parenthèses par des traits verticaux, rien de compliqué !\r\n\r\nIl est très facile de calculer le déterminant d’une matrice 2 x 2 car il y a une formule très simple.\r\n\r\nPrenons le cas général :\r\n\r\n\\Huge A = \\begin{pmatrix} a & b \\\\ c & d \\end{pmatrix}\r\n\r\nLe déterminant se calcule en multipliant les deux termes de la diagonales : a x d, puis les deux autres : b x c.\r\nOn soustrait alors, ce qui donne det(A) = a x d – b x c.\r\nAinsi det(A) = ad – bc\r\n\r\n—\r\n\\Huge \\begin{vmatrix} a & b \\\\ c & d \\end{vmatrix} = ad - bc\r\n—\r\n\r\nExemple :\r\n\r\n\\Huge A = \\begin{pmatrix} 1 & 3 \\\\ 7 & 4 \\end{pmatrix}\r\n\r\nRien de bien compliqué, il faut juste connaître la formule !\r\n\r\nLes matrices diagonales et triangulaires\r\n\r\nHaut de page\r\n\r\nAutre cas particulier très simple : les matrices diagonales et triangulaires.\r\n\r\nQue ce soit pour une matrice diagonale, triangulaire inférieure ou triangulaire supérieure, la règle est la même : le déterminant d’une telle matrice est égal au produit des coefficients diagonaux, tout simplement !!\r\n\r\nExemples :\r\n\r\n\\Huge \\begin{vmatrix} 2 & 0 & 0 \\\\ 0 & 5 & 0 \\\\ 0 & 0 & -9 \\end{vmatrix} = 2 \\times 5 \\times (-9) = - 90\r\n\r\n\\Huge \\begin{vmatrix} 3 & 2 & 8 \\\\ 0 & 4 & 9 \\\\ 0 & 0 & 7 \\end{vmatrix} = 3 \\times 4 \\times 7 = 84\r\n\r\n\\Huge \\begin{vmatrix} 6 & 0 & 0 \\\\ 2 & - 7 & 0 \\\\ 6 & -5 & 4 \\end{vmatrix} = 6 \\times (-7) \\times 4 = - 168\r\n\r\nUne des méthodes pour calculer le déterminant d’une matrice sera donc de la décomposer en faisant apparaître une matrice diagonale.\r\n\r\nD’une manière générale, si on a une matrice A diagonale ou triangulaire de taille n, comme les ai,i sont les coefficients diagonaux, on a :\r\n\r\n\r\nsi A est diagonale ou triangulaire\r\n\r\n—\r\nRemarque : on aura donc en particulier det(Id) = 1, puisque Id est une matrice diagonale dont tous les coefficients valent 1.\r\n—\r\n\r\n\r\n\r\nLes matrices 3 x 3 : règle de Sarrus\r\n\r\nHaut de page\r\n\r\nLe déterminant d’une matrice 3 x 3 peut se calculer de différentes façons.\r\nSi c’est une matrice diagonale ou triangulaire, on utilise ce que l’on vient de voir.\r\nOn peut aussi développer selon une ligne ou une colonne (voir plus bas).\r\nSinon on peut utiliser une règle particulière qui ne s’applique que pour les matrices 3 x 3 : la règle de Sarrus.\r\n\r\nOn prend donc une matrice 3 x 3 la plus générale possible :\r\n\r\n\\Huge \\begin{pmatrix} a & b & c \\\\ d & e & f \\\\ g & h & i \\end{pmatrix}\r\n\r\nPour comprendre la règle de Sarrus le mieux est de faire des schémas. Il y a deux méthodes visuelles différentes, voyons tout d’aobrd la première :\r\n\r\nMais qu’est-ce-que c’est que ce schéma ??\r\nEn fait c’est plutôt simple (les deux schémas sont les mêmes, dans les deux premiers les coefficients ont juste été enlevés pour avoir une autre vision).\r\n\r\nOn multiplie entre eux les coefficients qui sont « barrés » de la même couleur, par exemple a, e et i.\r\nOn aura donc a x e x i.\r\nDe même pour d, h et c barrés en bleu on aura d x h x c.\r\n\r\nCela donne donc en tout 6 produits (puisqu’il y a 6 couleurs) :\r\naei, dhc et bfg pour la matrice de gauche\r\ngec, dbi et ahf pour la matrice de droite.\r\n\r\nOn additionne les 3 produits de la matrice de gauche, et on fait de même pour la matrice de droite :\r\naei + dhc + bfg pour la matrice de gauche\r\ngec + dbi + ahf pour la matrice de droite.\r\n\r\nEt enfin on soustrait, sans oublier la parenthèse devant le signe – !!\r\naei + dhc + bfg – (gec + dbi + ahf).\r\n\r\nEt voilà, c’est fini !\r\n\r\nOn en déduit la formule générale :\r\n\r\n—\r\n\\Huge \\begin{vmatrix} a & b & c \\\\ d & e & f \\\\ g & h & i \\end{vmatrix} = aei + dhc + bfg - (gec + dbi + ahf)\r\n—\r\n\r\n—\r\nPenses bien à mettre les parenthèses et attention au signe – devant la parenthèse !\r\n—\r\n\r\nBon en effet cette formule n’est pas pratique à retenir, c’est beaucoup plus simple de retenir les schémas fais ci-dessus\r\n\r\nVoyons tout de suite un exemple :\r\nSoit la matrice A :\r\n\r\n\\Huge A = \\begin{pmatrix} 2 & 4 & -5 \\\\ 8 & 1 & -3 \\\\ -9 & 6 & 7 \\end{pmatrix}\r\n\r\nAlors :\r\n\r\n\\Huge det(A) = 2 \\times 1 \\times 7 + 8 \\times 6 \\times (-5) + -9 \\times 4 \\times (-3) - ((-9) \\times 1 \\times (-5) + 8 \\times 4 \\times 7 + 2 \\times 6 \\times (-3))\r\n\r\n\\Huge det(A) = 14 - 240 + 108 - (45 + 224 - 36)\r\n\r\n\\Huge det(A) =-351\r\n\r\nAvec cet exemple en vidéo tu devrais encore mieux comprendre\r\n\r\nPassons maintenant à la deuxième méthode visuelle.\r\nPour cela, il faut écrire la matrice mais recopier aussi les deux premières colonnes après :\r\n\r\nEnsuite c’est plus ou moins le même principe que ci-dessus, mais plus simple visuellement car on prend des « diagonales » :\r\n\r\nComme ci-dessus, on multiplie les coefficients « barrés » de la même couleur, on additionne ceux de gauche entre eux et ceux de droite entre eux, et on soustrait en pensant bien à la parenthèse après le signe – !!', 'Déterminant de matrices 2x2 et 3x3\r\nMéthode diagonales et Sarrus\r\n', 2),
(4, 'Polynômes de second degré', 3, '............................................................................................................................', '......................................................................', 2),
(5, 'Racines de l\'unité', 4, '........................................................................................................', '..........................................................................................', 2),
(6, 'Forme exponentielle', 4, '........................................................................', '......................................................................................................', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Practice`
--

CREATE TABLE `Practice` (
  `User` int(11) NOT NULL,
  `Lesson` int(11) NOT NULL,
  `Previous` date DEFAULT NULL,
  `Next` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Practice`
--

INSERT INTO `Practice` (`User`, `Lesson`, `Previous`, `Next`) VALUES
(2, 1, '2023-03-06', 52),
(2, 2, '2023-05-10', 7),
(2, 3, '2023-05-09', 7),
(2, 4, '2023-03-06', 52);

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `Id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT ,
  `Text` text DEFAULT NULL,
  `Lesson` int(11) DEFAULT NULL,
  `Answer` char(255) DEFAULT NULL,
  `Wrong1` char(255) DEFAULT NULL,
  `Wrong2` char(255) DEFAULT NULL,
  `Wrong3` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`Id`, `Text`, `Lesson`, `Answer`, `Wrong1`, `Wrong2`, `Wrong3`) VALUES
(1, 'En combien de partie le bilan est-il décomposé ?', 2, '1', '4', '2', '5'),
(2, 'Calculer le déterminant de la matrice suivante:\r\n(1 0 0 0\r\n 0 1 0 0\r\n 0 0 1 0\r\n 0 0 0 1)', 3, '1', '-1\r\n', '4', '-4'),
(3, 'Calculer le déterminant de la matrice suivante:\r\n(2 1 3\r\n 1 0 2\r\n 2 0 -2)\r\n', 3, '6', '-6\r\n', '12', '-12'),
(4, 'Que représente le bilan', 2, 'Gain de l\'entreprise', 'Valeur de l\'entreprise', 'Rien', 'Utile');

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE `Subjects` (
  `Id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT ,
  `Name` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`Id`, `Name`) VALUES
(1, 'Maths'),
(2, 'Comptabilité');

-- --------------------------------------------------------

--
-- Table structure for table `Teams`
--

CREATE TABLE `Teams` (
  `Id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT ,
  `Name` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Teams`
--

INSERT INTO `Teams` (`Id`, `Name`) VALUES
(0, 'All'),
(1, 'IG2I'),
(2, 'Julien-Team'),
(4, 'Théophile-Team');

-- --------------------------------------------------------

--
-- Table structure for table `Teams_Lesson_Links`
--

CREATE TABLE `Teams_Lesson_Links` (
  `Lesson` int(11) NOT NULL,
  `Team` int(11) NOT NULL,
  `Editing` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Teams_Lesson_Links`
--

INSERT INTO `Teams_Lesson_Links` (`Lesson`, `Team`, `Editing`) VALUES
(1, 1, 1),
(1, 4, 1),
(2, 0, 0),
(3, 0, 0),
(3, 1, 1),
(4, 0, 0),
(5, 0, 0),
(5, 2, 1),
(6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `Name` char(255) DEFAULT NULL,
  `Pass` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `Name`, `Pass`) VALUES
(1, 'Théophile', 'pwd'),
(2, 'Julien', 'mdp');

-- --------------------------------------------------------

--
-- Table structure for table `Users_Teams_Links`
--

CREATE TABLE `Users_Teams_Links` (
  `User` int(11) NOT NULL,
  `Team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users_Teams_Links`
--

INSERT INTO `Users_Teams_Links` (`User`, `Team`) VALUES
(1, 0),
(1, 4),
(2, 0),
(2, 1),
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Chapters`
--
ALTER TABLE `Chapters`
  ADD KEY `Subject` (`Subject`);

--
-- Indexes for table `Lessons`
--
ALTER TABLE `Lessons`
  ADD KEY `Chapter` (`Chapter`),
  ADD KEY `Owner` (`Owner`);

--
-- Indexes for table `Practice`
--
ALTER TABLE `Practice`
  ADD PRIMARY KEY (`User`,`Lesson`),
  ADD KEY `Lesson` (`Lesson`);

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD KEY `Lesson` (`Lesson`);


--
-- Indexes for table `Teams_Lesson_Links`
--
ALTER TABLE `Teams_Lesson_Links`
  ADD PRIMARY KEY (`Lesson`,`Team`),
  ADD KEY `Team` (`Team`);

--
-- Indexes for table `Users_Teams_Links`
--
ALTER TABLE `Users_Teams_Links`
  ADD PRIMARY KEY (`User`,`Team`),
  ADD KEY `Team` (`Team`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Chapters`
--
ALTER TABLE `Chapters`
  ADD CONSTRAINT `Chapters_ibfk_1` FOREIGN KEY (`Subject`) REFERENCES `Subjects` (`Id`);

--
-- Constraints for table `Lessons`
--
ALTER TABLE `Lessons`
  ADD CONSTRAINT `Lessons_ibfk_1` FOREIGN KEY (`Chapter`) REFERENCES `Chapters` (`Id`),
  ADD CONSTRAINT `Lessons_ibfk_2` FOREIGN KEY (`Owner`) REFERENCES `Users` (`Id`);

--
-- Constraints for table `Practice`
--
ALTER TABLE `Practice`
  ADD CONSTRAINT `Practice_ibfk_1` FOREIGN KEY (`User`) REFERENCES `Users` (`Id`),
  ADD CONSTRAINT `Practice_ibfk_2` FOREIGN KEY (`Lesson`) REFERENCES `Lessons` (`Id`);

--
-- Constraints for table `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `Questions_ibfk_1` FOREIGN KEY (`Lesson`) REFERENCES `Lessons` (`Id`);

--
-- Constraints for table `Teams_Lesson_Links`
--
ALTER TABLE `Teams_Lesson_Links`
  ADD CONSTRAINT `Teams_Lesson_Links_ibfk_1` FOREIGN KEY (`Team`) REFERENCES `Teams` (`Id`),
  ADD CONSTRAINT `Teams_Lesson_Links_ibfk_2` FOREIGN KEY (`Lesson`) REFERENCES `Lessons` (`Id`);

--
-- Constraints for table `Users_Teams_Links`
--
ALTER TABLE `Users_Teams_Links`
  ADD CONSTRAINT `Users_Teams_Links_ibfk_1` FOREIGN KEY (`Team`) REFERENCES `Teams` (`Id`),
  ADD CONSTRAINT `Users_Teams_Links_ibfk_2` FOREIGN KEY (`User`) REFERENCES `Users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
