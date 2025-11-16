-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2025 a las 15:42:18
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
  `liked` int(11) DEFAULT NULL,
  `disliked` int(11) DEFAULT NULL,
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
('Metal Gear Solid Delta: Snake Eater IS OUT!', NULL, '2025-11-04 11:44:26', NULL, NULL, 7, 1, 10, NULL, 'COMMUNITY_VIEW'),
('FALLOUT 4 IS OUT!', NULL, '2025-11-04 11:45:06', NULL, NULL, 8, 1, 11, NULL, 'COMMUNITY_VIEW'),
('3 MILLION COPIES SOLD, THANK YOU! ', NULL, '2025-11-04 11:47:37', NULL, NULL, 9, 1, 12, NULL, 'COMMUNITY_VIEW'),
('Little Nightmares 3 is out now!\r\n', NULL, '2025-11-04 11:48:24', NULL, NULL, 10, 1, 13, NULL, 'COMMUNITY_VIEW'),
('nbo me gusta', NULL, '2025-11-09 20:24:11', NULL, NULL, 23, 1, 9, NULL, 'COMMUNITY_VIEW'),
('hola', NULL, '2025-11-09 20:58:17', NULL, NULL, 28, 1, 9, NULL, 'GAME_VIEW'),
('asfasfaf', NULL, '2025-11-09 21:01:32', NULL, NULL, 29, 1, 9, NULL, 'GAME_VIEW'),
('asfsafsaffa', NULL, '2025-11-09 21:01:35', NULL, NULL, 30, 1, 9, NULL, 'GAME_VIEW'),
('afasfasfasf', NULL, '2025-11-09 21:01:38', NULL, NULL, 31, 1, 9, NULL, 'GAME_VIEW'),
('afaffaf', NULL, '2025-11-09 21:01:41', NULL, NULL, 32, 1, 9, NULL, 'GAME_VIEW'),
('stgdsgffshsrfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhdffffffffffff', NULL, '2025-11-09 21:02:09', NULL, NULL, 33, 1, 9, NULL, 'GAME_VIEW'),
('pepe', '69112b977db4d_pepeargento.jpg', '2025-11-09 21:02:31', NULL, NULL, 34, 1, 9, NULL, 'GAME_VIEW');

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
  `gameGallery6` varchar(255) DEFAULT NULL,
  `promoText` varchar(255) DEFAULT NULL,
  `saga` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`title`, `genre`, `state`, `description`, `imagen`, `game`, `idCreator`, `idGame`, `verified`, `releaseDate`, `platforms`, `price`, `imagen2`, `gameGallery1`, `gameGallery2`, `gameGallery3`, `gameGallery4`, `gameGallery5`, `gameGallery6`, `promoText`, `saga`) VALUES
('Red Dead Redemption 2', 'Acción', 'Disponible', 'Estados Unidos, 1899. El fin de la era del salvaje oeste ha comenzado. La ley da cacería a las últimas bandas de forajidos que quedan. Los que no se rinden o sucumben, terminan muertos.\r\n\r\nDespués de que un robo termina mal en el pueblo de Blackwater, Arthur Morgan y la banda Van der Linde se ven obligados a huir. Con agentes federales y los mejores cazarrecompensas de la nación pisándoles los talones, la banda debe robar y pelear, abriéndose camino por el inhóspito corazón de Estados Unidos para poder sobrevivir.\r\n\r\nA medida que las cada vez más profundas divisiones internas amenazan con separar a la banda, Arthur debe elegir entre sus propios ideales y su lealtad a la banda que lo vio crecer. \r\n\r\nDe los creadores de Grand Theft Auto V y Red Dead Redemption, Red Dead Redemption 2 es la extensa historia de la vida en Estados Unidos a principios de la era moderna.', '6910d98b0e348_6910d8e470f18_rdr2.png', 0x66616c6c6f7574345f6578652e7a6970, 1, 9, 1, '2015-11-10', 'Windows, PlayStation 4, Xbox One', '59.99', 'rdr2-2.jpg', 'rdr2-img1.jpg', '6910dd64e0328_rdr2-img2.jpg', 'rdr2-img3.jpg', 'rdr2-img4.jpg', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Red Dead Redemption'),
('Metal Gear Solid Delta: Snake Eater', 'Acción', 'Disponible', 'METAL GEAR SOLID Δ: SNAKE EATER te lleva al comienzo de la saga de Metal Gear y cuenta la emocionante e impredecible historia que dio origen al legendario soldado Big Boss.\n\nCombina sigilo, tecnología de camuflaje, habilidades de supervivencia y dominio del combate cuerpo a cuerpo (CQC) para infiltrarte entre los grupos enemigos y evitar que las armas ultrasecretas desencadenen un conflicto nuclear a gran escala.\n\nDesarrollado íntegramente en Unreal Engine 5, el remake muestra los entornos naturales y los personajes icónicos del juego original con un nuevo nivel de detalle increíble. Un nuevo estilo de control moderno opcional ofrece una experiencia de sigilo y supervivencia más intuitiva y contemporánea, adecuada para los jugadores que experimentan el mundo de Tactical Espionage Action por primera vez.', 'mgs3.jpg', 0x7363686564756c655f6578652e7a6970, 1, 10, 1, '2024-01-01', 'PlayStation 5, Xbox Series X|S, Microsoft Windows', '69.99', 'fondo-MetalGear.jpg', 'MetalGear-img1.jpg', 'MetalGear-img2.jpg', 'MetalGear-img3.jpg', 'MetalGear-img4.jpg', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Metal Gear'),
('Fallout 4', 'Acción', 'Disponible', 'Bethesda Game Studios, el galardonado creador de Skyrim y Fallout 76,  te desafía a explorar los vestigios de Boston y de toda la Commonwealth en este RPG de acción de mundo abierto.\n\nConviértete en el superviviente que quieres ser. Juega en el papel del único sobreviviente del Refugio 111 y forja alianzas o elige la soledad en una tierra devastada por la guerra nuclear, donde cada acción que tomes tendrá consecuencias. Solo tú puedes reconstruir y determinar el destino de esta tierra desolada.', 'fallout4r.jpg', 0x66616c6c6f7574345f6578652e7a6970, 1, 11, 1, '2015-11-10', 'Windows, PlayStation 4, Xbox One', '19.99', 'fondo-MetalGear.jpg', 'Fallout4-img1.jpg', 'Fallout4-img2.jpg', 'Fallout4-img3.jpg', 'Fallout4-img4.jpg', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Fallout'),
('Schedule I', 'Estrategia', 'Disponible', 'SCHEDULE 1 te pone en la piel de un distribuidor que empieza desde lo más bajo, en las calles húmedas y decadentes de Hyland Point, una ciudad corroída por el crimen, la corrupción y la ambición. Tu objetivo es simple, pero peligroso: ascender desde vendedor callejero hasta convertirte en el rey del narcotráfico urbano.\n\nConstruí tu imperio desde cero: fabrica tus propias sustancias, controlá la producción, organizá tus rutas de distribución y expandí tus operaciones por los distintos distritos de la ciudad. Comprá propiedades, almacenes, laboratorios y negocios de fachada, contrata empleados leales —o reemplazalos si te traicionan—, y enfrenta a bandas rivales, autoridades corruptas y competidores que harán lo que sea para eliminarte.\n\nCada decisión que tomes puede hacerte más rico o hundirte en la ruina. Elegí entre mantener un perfil bajo o gobernar con violencia y miedo. Invertí en expansión, sobornos o mejoras tecnológicas para aumentar tu control sobre Hyland Point.\n\nDesarrollado con un enfoque en la gestión, el realismo urbano y la narrativa inmersiva, Schedule 1 combina estrategia, simulación y supervivencia en un entorno vivo y cambiante, donde cada acción tiene consecuencias. ¿Tenés lo necesario para construir un imperio… o vas a caer intentando dominar la ciudad?', 'Schedule1-Banner.jpg', 0x7363686564756c655f6578652e7a6970, 1, 12, 1, '2024-01-01', 'Windows', '10.49', 'Schedule-img2-Banner.jpg', 'Schedule-img1.jpg', 'Schedule-img2.jpg', 'Schedule-img3.jpg', 'Schedule-img4.jpg', NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Schedule'),
('Little Nightmares 3', 'Supervivencia', 'Disponible', 'Acompaña a Low y Alone en su viaje en busca de un camino que los conduzca fuera de la Nada. Embárcate en una nueva aventura en el extraordinario mundo de Little Nightmares. Atrapados en la Espiral, un complejo de sitios perturbadores, Low y Alone deberán trabajar juntos para sobrevivir en un peligroso mundo de pesadilla.', 'little.jpg', NULL, 1, 13, 1, '2025-11-10', 'Windows, PlayStation 5, Xbox Series X', '59.99', 'little-nightmares.jpeg', 'little-nightmares-1.jpg', 'little-nightmares-2.jpg', 'little-nightmares-3.jpg', 'little-nightmares-4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Little Nightmares'),
('Helldivers 2', 'Acción', 'Disponible', 'Lucha por la libertad en una galaxia hostil en este frenético juego de disparos cooperativo y por equipos. Coordina tus arsenales, ideá estrategias para las misiones y completá juntos los objetivos.', 'helldivers2-portada.jpg', NULL, 1, 14, 1, '2024-02-08', 'Windows, PlayStation 5', '39.99', 'helldivers2-portada.jpg', 'helldivers2-img1.jpg', 'helldivers2-img2.jpg', 'helldivers2-img3.jpg', 'helldivers2-img4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Helldrivers'),
('Death Stranding 2', 'Simulación', 'Disponible', 'Embárcate en una inspiradora misión de conexión humana más allá de la UCA. Sam y sus compañeros emprenden un nuevo viaje para salvar a la humanidad de la extinción.', 'death-stranding2.jpg', NULL, 1, 15, 1, '2025-09-30', 'PlayStation 5', '69.99', 'death-stranding2.jpg', 'death-stranding2-img1.jpg', 'death-stranding2-img1.jpg', 'death-stranding2-img3.jpg', 'death-stranding2-img4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Death Stranding'),
('Horizon Forbidden West', 'Aventura', 'Disponible', 'Aloy regresa para explorar el Oeste Prohibido, una tierra salvaje llena de nuevas amenazas, tribus misteriosas y máquinas colosales. En un mundo al borde del colapso, solo ella puede descubrir los secretos del pasado y restaurar el equilibrio de la Tierra.', 'horizon-forbidden-west-portada.jpg', NULL, 1, 16, 1, '2022-02-18', 'PlayStation 4, PlayStation 5', '59.99', 'horizon-forbidden-west-portada.jpg', 'horizon-forbidden-west-img1.jpg', 'horizon-forbidden-west-img2.jpg', 'horizon-forbidden-west-img3.jpg', 'horizon-forbidden-west-img4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Horizon'),
('Battlefield 6', 'Acción', 'Disponible', 'Únete a un escuadrón de élite y combate en escenarios globales como el Sahara, Gibraltar y Nueva York. Con intensos enfrentamientos multijugador, vehículos de guerra y entornos destructibles, Battlefield 6 redefine la experiencia bélica moderna.', 'battlefield6-portada.jpg', NULL, 1, 17, 1, '2025-10-20', 'Windows, PlayStation 5, Xbox Series X', '69.99', 'battlefield6-portada.jpg', 'battlefield6-img1.jpg', 'battlefield6-img2.jpg', 'battlefield6-img3.jpg', 'battlefield6-img4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Battlefield'),
('God of War Ragnarök', 'Aventura', 'Disponible', 'Kratos y Atreus deben enfrentar el fin de los tiempos mientras recorren los nueve reinos en busca de respuestas. Enfrenta dioses nórdicos, monstruos legendarios y decisiones que definirán el destino del mundo en esta épica secuela del aclamado God of War.', 'God-of-War-portada.jpg', NULL, 1, 18, 1, '2022-11-09', 'PlayStation 4, PlayStation 5', '69.99', 'God-of-War-portada.jpg', 'God-of-War-img1.jpg', 'God-of-War-img2.jpg', 'God-of-War-img3.jpg', 'God-of-War-img4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'God Of War'),
('The Witcher 3', 'Aventura', 'Disponible', 'Geralt de Rivia se enfrenta a la Cacería Salvaje en un mundo abierto lleno de magia, monstruos y decisiones morales. Explora los Reinos del Norte, conoce personajes inolvidables y descubre una historia épica de traición, amor y destino.', 'theWitcher3-portada.jpg', NULL, 1, 19, 1, '2015-05-19', 'Windows, PlayStation 4, Xbox One, Nintendo Switch', '49.99', 'theWitcher3-portada.jpg', 'theWitcher3-img1.jpg', 'theWitcher3-img2.jpg', 'theWitcher3-img3.jpg', 'theWitcher3-img4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'The Witcher'),
('It Takes Two', 'Arcade', 'Disponible', 'Cody y May, una pareja en crisis convertida en muñecos, deben colaborar para superar desafíos surrealistas y salvar su relación. Cada nivel ofrece nuevas mecánicas en una aventura cooperativa llena de humor, emoción y creatividad.', 'it takes two portada.jpg', NULL, 1, 20, 1, '2021-03-26', 'Windows, PlayStation 4, PlayStation 5, Xbox One, Xbox Series X', '39.99', 'it takes two portada.jpg', 'it takes two 1.jpg', 'it takes two 2.jpg', 'it takes two 3.jpg', 'it takes two 4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'It Takes Two'),
('Baldur’s Gate 3', 'Estrategia', 'Disponible', 'Explora los Reinos Olvidados en esta aventura táctica por turnos inspirada en Dungeons & Dragons. Crea tu personaje, forma un grupo de héroes y enfrenta decisiones que cambiarán el destino del mundo en una campaña épica y dinámica.', 'baldursGate3-portada.jpg', NULL, 1, 21, 1, '2023-08-03', 'Windows, macOS, PlayStation 5', '59.99', 'baldursGate3-portada.jpg', 'baldursGate3-img1.jpg', 'baldursGate3-img2.jpg', 'baldursGate3-img3.jpg', 'baldursGate3-img4.jpg', '', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores exercitationem nesciunt consequuntur magnam', 'Baldur´s Gate'),
('God of War', NULL, NULL, 'God of War es un videojuego de acción y aventura para PlayStation 4 y PC, lanzado en 2018, que sigue a Kratos en un nuevo viaje por los reinos nórdicos. Tras dejar atrás su pasado con los dioses del Olimpo, Kratos ahora vive con su hijo Atreus y debe enseñarle a sobrevivir mientras se enfrentan a un nuevo panteón de dioses y monstruos. El juego combina combate brutal y épico, puzzles, exploración y una historia emotiva, presentando una cámara sobre el hombro que acerca al jugador a la acción y un sistema de combate renovado con una nueva arma principal para Kratos. ', '6911070c67817_god-of-war-banner.webp', NULL, 1, 24, 0, 'en desarrollo', 'PS5, PC', '59.99', '6911070c67afd_god-of-war-banner2.webp', '6911070c67d73_god-of-war-img1.webp', '6911070c67f49_god-of-war-img2.webp', '6911070c68113_god-of-war-img3.webp', '6911070c682bd_god-of-war-img4.webp', 'default_game.png', 'default_game.png', NULL, 'God Of War');

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
('a', 'a@gmail.com', 'a', 1, 'creator', 'a', '1_1762267798.png'),
('nomeacuerdo', 'nomeacuerdo@gmail.com', 'nomeacuerdo', 2, 'user', NULL, 'default.png'),
('nose', 'nose@gmail.com', 'nose', 3, 'user', 'hola', '3_1760458043.png'),
('random', 'random@gmail.com', 'a', 4, 'user', NULL, 'default.png'),
('cuentanueva', 'nueva@gmail.com', 'nueva', 5, 'user', NULL, 'default.png'),
('idk', 'idk@gmail.com', 'idk', 6, 'user', NULL, 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_game`
--

CREATE TABLE `user_game` (
  `idUser` int(11) NOT NULL,
  `idGame` int(10) UNSIGNED NOT NULL,
  `purchaseDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user_game`
--

INSERT INTO `user_game` (`idUser`, `idGame`, `purchaseDate`) VALUES
(1, 12, '2025-11-02 17:37:15');

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
  ADD UNIQUE KEY `unique_user_comment` (`idCommentary`,`idUser`),
  ADD KEY `idUser` (`idUser`);

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
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `idCommentary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `comment_votes`
--
ALTER TABLE `comment_votes`
  MODIFY `idVote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `idGame` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Filtros para la tabla `comment_votes`
--
ALTER TABLE `comment_votes`
  ADD CONSTRAINT `comment_votes_ibfk_1` FOREIGN KEY (`idCommentary`) REFERENCES `comment` (`idCommentary`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_votes_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;

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
