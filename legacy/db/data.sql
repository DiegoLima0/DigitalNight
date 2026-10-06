-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2026 a las 01:34:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `data`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `commentary` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `liked` int(11) DEFAULT 0,
  `disliked` int(11) DEFAULT 0,
  `idCommentary` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idGame` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `post_location` enum('GAME_VIEW','COMMUNITY_VIEW') NOT NULL DEFAULT 'COMMUNITY_VIEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`commentary`, `imagen`, `created_at`, `liked`, `disliked`, `idCommentary`, `idUser`, `idGame`, `parent_id`, `post_location`) VALUES
('a mi me gust el helado', NULL, '2025-11-16 20:24:59', 1, 0, 36, 1, 35, NULL, 'COMMUNITY_VIEW'),
('a mi no', NULL, '2026-09-25 09:13:09', 0, 0, 37, 3, 35, 36, 'COMMUNITY_VIEW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment_votes`
--

CREATE TABLE `comment_votes` (
  `idVote` int(11) NOT NULL,
  `idCommentary` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `vote_type` enum('like','dislike') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comment_votes`
--

INSERT INTO `comment_votes` (`idVote`, `idCommentary`, `idUser`, `vote_type`) VALUES
(3, 36, 3, 'like');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creator`
--

CREATE TABLE `creator` (
  `creatorName` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `idCreator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `creator`
--

INSERT INTO `creator` (`creatorName`, `country`, `correo`, `idCreator`) VALUES
('Estudio Ejemplo', 'Desconocido', 'contacto@ejemplo.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edition`
--

CREATE TABLE `edition` (
  `idEdition` int(10) UNSIGNED NOT NULL,
  `idGame` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `features` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `title` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `horizontal_imagen` varchar(255) DEFAULT NULL,
  `game` longblob DEFAULT NULL,
  `idCreator` int(11) NOT NULL,
  `idGame` int(10) UNSIGNED NOT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `releaseDate` varchar(255) DEFAULT 'en desarrollo',
  `platforms` varchar(255) DEFAULT 'en desarrollo',
  `price` varchar(255) DEFAULT 'US$00.00',
  `banner` varchar(255) DEFAULT NULL,
  `gameGallery1` varchar(255) DEFAULT NULL,
  `gameGallery2` varchar(255) DEFAULT NULL,
  `gameGallery3` varchar(255) DEFAULT NULL,
  `gameGallery4` varchar(255) DEFAULT NULL,
  `promoText` varchar(255) DEFAULT NULL,
  `saga` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `online` varchar(255) DEFAULT 'Online/Offline',
  `player` varchar(255) DEFAULT 'x - x Jugadores'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`title`, `genre`, `state`, `description`, `horizontal_imagen`, `game`, `idCreator`, `idGame`, `verified`, `releaseDate`, `platforms`, `price`, `banner`, `gameGallery1`, `gameGallery2`, `gameGallery3`, `gameGallery4`, `promoText`, `saga`, `cover_image`, `online`, `player`) VALUES
('Bad Ice Cream', 'Arcade', 'Disponible', 'Bad Ice Cream es un juego. En Bad Ice Cream 1, te conviertes en un delicioso helado que debe abrirse camino por laberintos congelados para recolectar todas las frutas antes de que los enemigos te atrapen. arcade estilo laberinto en el que el jugador controla un helado que debe recolectar todas las frutas de cada nivel mientras evita a los enemigos, utilizando la habilidad de crear y destruir bloques de hielo para bloquear o abrir caminos.', 'bad-ice-cream-orizontal.jpg', NULL, 1, 35, 1, '2025-11-25', 'Emulador', '9.99', 'bad-ice-cream-banner.jpg', 'bad-ice-cream-1.jpeg', 'bad-ice-cream-2.jpeg', 'bad-ice-cream-3.jpeg', 'bad-ice-cream-4.jpeg', '¡Prepárate para una aventura helada llena de acción y estrategia!', NULL, 'bad-ice-cream-cover.jpeg', 'Juego offline', '1 - 2 Jugadores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game_ratings`
--

CREATE TABLE `game_ratings` (
  `id` int(11) NOT NULL,
  `idGame` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `game_ratings`
--

INSERT INTO `game_ratings` (`id`, `idGame`, `rating`, `created_at`, `idUser`) VALUES
(1, 35, 5, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `birthday` date DEFAULT '1900-01-01',
  `gender` varchar(255) DEFAULT 'indefinido',
  `money` int(11) DEFAULT 50,
  `coins` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`userName`, `email`, `password`, `idUser`, `type`, `description`, `profile_picture`, `birthday`, `gender`, `money`, `coins`) VALUES
('a', 'a@gmail.com', 'a', 1, 'creator', 'a', '1_1762267798.png', '1900-01-17', '', 219, 14),
('nomeacuerdo', 'nomeacuerdo@gmail.com', 'nomeacuerdo', 2, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 50, 0),
('nose', 'nose@gmail.com', 'nose', 3, 'user', 'hola', '3_1760458043.png', '1900-01-01', 'indefinido', 50, 0),
('random', 'random@gmail.com', 'a', 4, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 50, 0),
('cuentanueva', 'nueva@gmail.com', 'nueva', 5, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 50, 0),
('idk', 'idk@gmail.com', 'idk', 6, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 50, 0),
('admin', 'admin@gmail.com', 'Type_shit', 7, 'admin', 'Cuenta principal de administrador', 'default.png', '1900-01-01', 'indefinido', 50, 0),
('admin2', 'admin2@gmail.com', 'admin', 8, 'admin', '', 'default.png', '1900-01-01', 'indefinido', 50, 0),
('d', 'd@gmail.com', 'd', 9, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 33, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_game`
--

CREATE TABLE `user_game` (
  `idUser` int(11) NOT NULL,
  `idGame` int(10) UNSIGNED NOT NULL,
  `purchaseDate` datetime DEFAULT current_timestamp(),
  `visible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user_game`
--

INSERT INTO `user_game` (`idUser`, `idGame`, `purchaseDate`, `visible`) VALUES
(1, 35, '2025-11-28 00:52:17', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idCommentary`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idGame` (`idGame`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indices de la tabla `comment_votes`
--
ALTER TABLE `comment_votes`
  ADD PRIMARY KEY (`idVote`),
  ADD UNIQUE KEY `user_comment_vote_unique` (`idCommentary`,`idUser`);

--
-- Indices de la tabla `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`idCreator`);

--
-- Indices de la tabla `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`idEdition`),
  ADD KEY `idGame` (`idGame`);

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idGame`),
  ADD KEY `fk_Game_Creator` (`idCreator`);

--
-- Indices de la tabla `game_ratings`
--
ALTER TABLE `game_ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_vote` (`idUser`,`idGame`),
  ADD UNIQUE KEY `unique_vote` (`idGame`,`idUser`),
  ADD KEY `idGame` (`idGame`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indices de la tabla `user_game`
--
ALTER TABLE `user_game`
  ADD PRIMARY KEY (`idUser`,`idGame`),
  ADD KEY `fk_userGame_game` (`idGame`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `idCommentary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `comment_votes`
--
ALTER TABLE `comment_votes`
  MODIFY `idVote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `edition`
--
ALTER TABLE `edition`
  MODIFY `idEdition` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `idGame` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `game_ratings`
--
ALTER TABLE `game_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idGame`) REFERENCES `game` (`idGame`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `comment` (`idCommentary`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `creator`
--
ALTER TABLE `creator`
  ADD CONSTRAINT `fk_Creator_User` FOREIGN KEY (`idCreator`) REFERENCES `user` (`idUser`);

--
-- Filtros para la tabla `edition`
--
ALTER TABLE `edition`
  ADD CONSTRAINT `edition_ibfk_1` FOREIGN KEY (`idGame`) REFERENCES `game` (`idGame`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `fk_Game_Creator` FOREIGN KEY (`idCreator`) REFERENCES `creator` (`idCreator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `game_ratings`
--
ALTER TABLE `game_ratings`
  ADD CONSTRAINT `game_ratings_ibfk_1` FOREIGN KEY (`idGame`) REFERENCES `game` (`idGame`);

--
-- Filtros para la tabla `user_game`
--
ALTER TABLE `user_game`
  ADD CONSTRAINT `fk_userGame_game` FOREIGN KEY (`idGame`) REFERENCES `game` (`idGame`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userGame_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
