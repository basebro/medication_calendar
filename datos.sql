-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2023 a las 10:52:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `medicacion` varchar(100) NOT NULL,
  `primera` int(10) NOT NULL,
  `desayuno` int(10) NOT NULL,
  `almuerzo` int(10) NOT NULL,
  `penultima` int(10) NOT NULL,
  `cena` int(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`medicacion`, `primera`, `desayuno`, `almuerzo`, `penultima`, `cena`, `descripcion`, `foto`) VALUES
('Tacrolimus 1MG', 1, 0, 0, 0, 0, '\"Inmunosupresores Tiene que pasar una hora para poder comer\"', 0x323032322d30372d31395f31396835305f33352e706e67),
('Tacrolimus 4MG', 2, 0, 0, 0, 0, '\"Inmunosupresores Tiene que pasar una hora para poder comer\"', 0x323032322d30372d31395f31396834385f35362e706e67),
('Tacrolimus 0,75MG', 1, 0, 0, 0, 0, '\"Inmunosupresores Tiene que pasar una hora para poder comer\"', 0x323032322d30372d31395f31396835305f33352e706e67),
('Micofenolato de mofetilo 500MG', 1, 0, 0, 1, 0, '0', 0x323032322d30372d31395f31396834385f35362e706e67),
('Omeoprazol 20MG', 0, 1, 0, 0, 0, 'Protector estomacal', 0x6d69636f66656e6f6c61746f2e706e67);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
