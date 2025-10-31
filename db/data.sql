-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2025 a las 20:41:31
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
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `title` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `game` longblob DEFAULT NULL,
  `idCreator` int(11) NOT NULL,
  `idGame` int(10) UNSIGNED NOT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `releaseDate` varchar(255) DEFAULT 'en desarrollo',
  `platforms` varchar(255) DEFAULT 'en desarrollo',
  `price` varchar(255) DEFAULT 'US$00.00',
  `imagen2` varchar(255) DEFAULT NULL,
  `gameGallery1` varchar(255) DEFAULT NULL,
  `gameGallery2` varchar(255) DEFAULT NULL,
  `gameGallery3` varchar(255) DEFAULT NULL,
  `gameGallery4` varchar(255) DEFAULT NULL,
  `gameGallery5` varchar(255) DEFAULT NULL,
  `gameGallery6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`title`, `genre`, `state`, `description`, `imagen`, `game`, `idCreator`, `idGame`, `verified`, `releaseDate`, `platforms`, `price`, `imagen2`, `gameGallery1`, `gameGallery2`, `gameGallery3`, `gameGallery4`, `gameGallery5`, `gameGallery6`) VALUES
('Red Dead Redemption 2', 'Acción/Aventura', 'Disponible', 'Estados Unidos, 1899. El fin de la era del salvaje oeste ha comenzado. La ley da cacería a las últimas bandas de forajidos que quedan. Los que no se rinden o sucumben, terminan muertos.\n\nDespués de que un robo termina mal en el pueblo de Blackwater, Arthur Morgan y la banda Van der Linde se ven obligados a huir. Con agentes federales y los mejores cazarrecompensas de la nación pisándoles los talones, la banda debe robar y pelear, abriéndose camino por el inhóspito corazón de Estados Unidos para poder sobrevivir.\n\nA medida que las cada vez más profundas divisiones internas amenazan con separar a la banda, Arthur debe elegir entre sus propios ideales y su lealtad a la banda que lo vio crecer. \n\nDe los creadores de Grand Theft Auto V y Red Dead Redemption, Red Dead Redemption 2 es la extensa historia de la vida en Estados Unidos a principios de la era moderna.', 'rdr2.png', 0x66616c6c6f7574345f6578652e7a6970, 1, 9, 1, '2015-11-10', 'Windows, PlayStation 4, Xbox One', '59.99', 'rdr2-2.jpg', 'rdr2-img1.jpg', 'rdr2-img2.jpg', 'rdr2-img3.jpg', 'rdr2-img4.jpg', NULL, NULL),
('Metal Gear Solid Delta: Snake Eater', 'Acción', 'Disponible', 'METAL GEAR SOLID Δ: SNAKE EATER te lleva al comienzo de la saga de Metal Gear y cuenta la emocionante e impredecible historia que dio origen al legendario soldado Big Boss.\n\nCombina sigilo, tecnología de camuflaje, habilidades de supervivencia y dominio del combate cuerpo a cuerpo (CQC) para infiltrarte entre los grupos enemigos y evitar que las armas ultrasecretas desencadenen un conflicto nuclear a gran escala.\n\nDesarrollado íntegramente en Unreal Engine 5, el remake muestra los entornos naturales y los personajes icónicos del juego original con un nuevo nivel de detalle increíble. Un nuevo estilo de control moderno opcional ofrece una experiencia de sigilo y supervivencia más intuitiva y contemporánea, adecuada para los jugadores que experimentan el mundo de Tactical Espionage Action por primera vez.', 'mgs3.jpg', 0x7363686564756c655f6578652e7a6970, 1, 10, 1, '2024-01-01', 'PlayStation 5, Xbox Series X|S, Microsoft Windows', '69.99', 'fondo-MetalGear.jpg', 'MetalGear-img1.jpg', 'MetalGear-img2.jpg', 'MetalGear-img3.jpg', 'MetalGear-img4.jpg', NULL, NULL),
('Fallout 4', 'Rol / RPG', 'Disponible', 'Bethesda Game Studios, el galardonado creador de Skyrim y Fallout 76,  te desafía a explorar los vestigios de Boston y de toda la Commonwealth en este RPG de acción de mundo abierto.\n\nConviértete en el superviviente que quieres ser. Juega en el papel del único sobreviviente del Refugio 111 y forja alianzas o elige la soledad en una tierra devastada por la guerra nuclear, donde cada acción que tomes tendrá consecuencias. Solo tú puedes reconstruir y determinar el destino de esta tierra desolada.', 'fallout4r.jpg', 0x66616c6c6f7574345f6578652e7a6970, 1, 11, 1, '2015-11-10', 'Windows, PlayStation 4, Xbox One', '19.99', 'fondo-MetalGear.jpg', 'Fallout4-img1.jpg', 'Fallout4-img2.jpg', 'Fallout4-img3.jpg', 'Fallout4-img4.jpg', NULL, NULL),
('Schedule I', 'Estrategia', 'Disponible', 'SCHEDULE 1 te pone en la piel de un distribuidor que empieza desde lo más bajo, en las calles húmedas y decadentes de Hyland Point, una ciudad corroída por el crimen, la corrupción y la ambición. Tu objetivo es simple, pero peligroso: ascender desde vendedor callejero hasta convertirte en el rey del narcotráfico urbano.\n\nConstruí tu imperio desde cero: fabrica tus propias sustancias, controlá la producción, organizá tus rutas de distribución y expandí tus operaciones por los distintos distritos de la ciudad. Comprá propiedades, almacenes, laboratorios y negocios de fachada, contrata empleados leales —o reemplazalos si te traicionan—, y enfrenta a bandas rivales, autoridades corruptas y competidores que harán lo que sea para eliminarte.\n\nCada decisión que tomes puede hacerte más rico o hundirte en la ruina. Elegí entre mantener un perfil bajo o gobernar con violencia y miedo. Invertí en expansión, sobornos o mejoras tecnológicas para aumentar tu control sobre Hyland Point.\n\nDesarrollado con un enfoque en la gestión, el realismo urbano y la narrativa inmersiva, Schedule 1 combina estrategia, simulación y supervivencia en un entorno vivo y cambiante, donde cada acción tiene consecuencias. ¿Tenés lo necesario para construir un imperio… o vas a caer intentando dominar la ciudad?', 'Schedule1-Banner.jpg', 0x7363686564756c655f6578652e7a6970, 1, 12, 1, '2024-01-01', 'Windows', '10.49', 'Schedule-img2-Banner.jpg', 'Schedule-img1.jpg', 'Schedule-img2.jpg', 'Schedule-img3.jpg', 'Schedule-img4.jpg', NULL, NULL);

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
  `profile_picture` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`userName`, `email`, `password`, `idUser`, `type`, `description`, `profile_picture`) VALUES
('a', 'a@gmail.com', 'a', 1, 'creator', 'a', '1_1760460476.png'),
('nomeacuerdo', 'nomeacuerdo@gmail.com', 'nomeacuerdo', 2, 'user', NULL, 'default.png'),
('nose', 'nose@gmail.com', 'nose', 3, 'user', 'hola', '3_1760458043.png'),
('random', 'random@gmail.com', 'a', 4, 'user', NULL, 'default.png'),
('cuentanueva', 'nueva@gmail.com', 'nueva', 5, 'user', NULL, 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_game`
--

CREATE TABLE `user_game` (
  `idUser` int(11) NOT NULL,
  `idGame` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`idCreator`);

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idGame`),
  ADD KEY `fk_Game_Creator` (`idCreator`);

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
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `idGame` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `creator`
--
ALTER TABLE `creator`
  ADD CONSTRAINT `fk_Creator_User` FOREIGN KEY (`idCreator`) REFERENCES `user` (`idUser`);

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `fk_Game_Creator` FOREIGN KEY (`idCreator`) REFERENCES `creator` (`idCreator`) ON DELETE CASCADE ON UPDATE CASCADE;

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
