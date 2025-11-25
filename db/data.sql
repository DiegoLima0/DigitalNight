-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2025 a las 18:47:47
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
('pepe', '69112b977db4d_pepeargento.jpg', '2025-11-09 21:02:31', NULL, NULL, 34, 1, 9, NULL, 'GAME_VIEW'),
('sdfdsf', NULL, '2025-11-16 20:24:48', NULL, NULL, 35, 1, 9, NULL, 'GAME_VIEW'),
('a mi si', NULL, '2025-11-16 20:24:59', NULL, NULL, 36, 1, 9, NULL, 'COMMUNITY_VIEW'),
('gdfgdfg', NULL, '2025-11-16 22:13:10', NULL, NULL, 37, 1, 9, 36, 'COMMUNITY_VIEW'),
('sdfsdfsfsf', NULL, '2025-11-16 22:13:28', NULL, NULL, 38, 1, 9, NULL, 'COMMUNITY_VIEW'),
('sdfsdfsfsf', NULL, '2025-11-16 22:13:30', NULL, NULL, 39, 1, 9, NULL, 'COMMUNITY_VIEW'),
('sfsfdfsd', '691a76c529ff4_Captura de pantalla 2025-09-11 193412.png', '2025-11-16 22:13:41', NULL, NULL, 40, 1, 9, NULL, 'COMMUNITY_VIEW'),
('dsgdhjgfngfnhd', '691a76cf337fc_Captura de pantalla 2025-08-22 004334.png', '2025-11-16 22:13:51', 0, NULL, 41, 1, 9, NULL, 'COMMUNITY_VIEW'),
('gfhfdnghfcnfcgdr bysdrjedt jdtyjdtykjtyufkfy lfckdutub eitdhjd', NULL, '2025-11-16 22:13:56', 0, 0, 42, 1, 9, NULL, 'COMMUNITY_VIEW'),
('dyb uhdtyjny dtikmryib', NULL, '2025-11-16 22:14:00', 0, 0, 43, 1, 9, NULL, 'COMMUNITY_VIEW'),
('hrthdthdj', '691a76df322fc_Captura de pantalla 2025-10-04 231540.png', '2025-11-16 22:14:07', 0, 0, 44, 1, 9, NULL, 'COMMUNITY_VIEW'),
('fuck it', NULL, '2025-11-16 22:14:50', 2, 0, 45, 1, 9, 40, 'COMMUNITY_VIEW'),
('mentira, me encanto', NULL, '2025-11-16 22:21:55', NULL, NULL, 46, 1, 9, 23, 'COMMUNITY_VIEW'),
('i was a deya', '691a790db92a3_690a07ad450d1_Captura de pantalla 2025-10-21 013633.png', '2025-11-16 22:23:25', 1, NULL, 47, 1, 9, 40, 'COMMUNITY_VIEW'),
('i was a deya', '691a7b0906d54_6910d8c8abd4d_6909491a838ad_Undertale.png', '2025-11-16 22:31:53', NULL, NULL, 48, 1, 9, 39, 'COMMUNITY_VIEW'),
('dgdfdhdhdydhdk', NULL, '2025-11-17 16:17:16', NULL, NULL, 49, 1, 10, NULL, 'GAME_VIEW'),
('hdfgjdtjdjfh', NULL, '2025-11-17 16:17:24', NULL, NULL, 50, 1, 10, NULL, 'COMMUNITY_VIEW'),
('stsestgdsgffshsrfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh no son tatuaje en el cuello son la marca de la cadena', NULL, '2025-11-17 16:31:00', NULL, NULL, 51, 1, 9, NULL, 'GAME_VIEW'),
('Lorem ipsum dolor sit amet consectetur adipiscing elit ullamcorper parturient congue, id magnis urna cum iaculis donec facilisi libero faucibus porta mi, enim integer hendrerit fames vehicula quam dictum nostra sodales. Odio senectus purus dictum tellus, ', NULL, '2025-11-17 16:32:35', NULL, NULL, 52, 1, 9, NULL, 'GAME_VIEW'),
('afsa', '6925d9f5f1eff_pixilart-sprite(Escenario).png', '2025-11-25 13:31:49', 0, 0, 53, 1, 13, NULL, 'GAME_VIEW'),
('fghfghdwtefj', NULL, '2025-11-25 14:16:01', 0, 0, 54, 1, 31, NULL, 'GAME_VIEW');

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
(1, 45, 1, 'like'),
(9, 47, 3, 'like'),
(12, 45, 3, 'like');

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

--
-- Volcado de datos para la tabla `edition`
--

INSERT INTO `edition` (`idEdition`, `idGame`, `name`, `tag`, `price`, `features`) VALUES
(2, 9, 'Read Dead Online', 'Online', 10.00, 'Solo incluye el modo online');

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
('Red Dead Redemption 2', 'Acción', 'Disponible', 'Estados Unidos, 1899. El fin de la era del salvaje oeste ha comenzado. La ley da cacería a las últimas bandas de forajidos que quedan. Los que no se rinden o sucumben, terminan muertos.\n\nDespués de que un robo termina mal en el pueblo de Blackwater, Arthur Morgan y la banda Van der Linde se ven obligados a huir. Con agentes federales y los mejores cazarrecompensas de la nación pisándoles los talones, la banda debe robar y pelear, abriéndose camino por el inhóspito corazón de Estados Unidos para poder sobrevivir.\n\nA medida que las cada vez más profundas divisiones internas amenazan con separar a la banda, Arthur debe elegir entre sus propios ideales y su lealtad a la banda que lo vio crecer. \n\nDe los creadores de Grand Theft Auto V y Red Dead Redemption, Red Dead Redemption 2 es la extensa historia de la vida en Estados Unidos a principios de la era moderna.', '6910d98b0e348_6910d8e470f18_rdr2.png', 0x66616c6c6f7574345f6578652e7a6970, 1, 9, 1, '2015-11-10', 'Windows, PlayStation 4, Xbox One', '59.99', 'rdr2-2.jpg', 'rdr2-img1.jpg', '6910dd64e0328_rdr2-img2.jpg', 'rdr2-img3.jpg', 'rdr2-img4.jpg', 'Explora un mundo vasto y atmosférico la última aventura de Rockstar Games, los creadores de Grand Theft Auto.', 'Red Dead Redemption', 'red-dead-cover.png', 'Juego online opciona', '1 jugador'),
('Metal Gear Solid Delta: Snake Eater', 'Acción', 'Disponible', 'METAL GEAR SOLID Δ: SNAKE EATER te lleva al comienzo de la saga de Metal Gear y cuenta la emocionante e impredecible historia que dio origen al legendario soldado Big Boss.\n\nCombina sigilo, tecnología de camuflaje, habilidades de supervivencia y dominio del combate cuerpo a cuerpo (CQC) para infiltrarte entre los grupos enemigos y evitar que las armas ultrasecretas desencadenen un conflicto nuclear a gran escala.\n\nDesarrollado íntegramente en Unreal Engine 5, el remake muestra los entornos naturales y los personajes icónicos del juego original con un nuevo nivel de detalle increíble. Un nuevo estilo de control moderno opcional ofrece una experiencia de sigilo y supervivencia más intuitiva y contemporánea, adecuada para los jugadores que experimentan el mundo de Tactical Espionage Action por primera vez.', 'mgs3.jpg', 0x7363686564756c655f6578652e7a6970, 1, 10, 1, '2024-01-01', 'PlayStation 5, Xbox Series X|S, Microsoft Windows', '69.99', 'fondo-MetalGear.jpg', 'MetalGear-img1.jpg', 'MetalGear-img2.jpg', 'MetalGear-img3.jpg', 'MetalGear-img4.jpg', 'Una remasterización completa y mejorada del juego de 2004 METAL GEAR SOLID 3: SNAKE EATER.', 'Metal Gear', 'metal-gear-cover.png', 'Juego online opciona', '1 jugador'),
('Fallout 4', 'Acción', 'Disponible', 'Bethesda Game Studios, el galardonado creador de Skyrim y Fallout 76,  te desafía a explorar los vestigios de Boston y de toda la Commonwealth en este RPG de acción de mundo abierto.\n\nConviértete en el superviviente que quieres ser. Juega en el papel del único sobreviviente del Refugio 111 y forja alianzas o elige la soledad en una tierra devastada por la guerra nuclear, donde cada acción que tomes tendrá consecuencias. Solo tú puedes reconstruir y determinar el destino de esta tierra desolada. ', 'fallout4r.jpg', 0x66616c6c6f7574345f6578652e7a6970, 1, 11, 1, '2015-11-10', 'Windows, PlayStation 4, Xbox One', '19.99', 'fondo-MetalGear.jpg', 'Fallout4-img1.jpg', 'Fallout4-img2.jpg', 'Fallout4-img3.jpg', 'Fallout4-img4.jpg', 'Explora un vasto mundo abierto destruido por una guerra nuclear en este galardonado RPG.', 'Fallout', 'fallout-4-cover.png', 'Juego offline', '1 jugador'),
('Schedule I', 'Estrategia', 'Disponible', 'SCHEDULE 1 te pone en la piel de un distribuidor que empieza desde lo más bajo, en las calles húmedas y decadentes de Hyland Point, una ciudad corroída por el crimen, la corrupción y la ambición. Tu objetivo es simple, pero peligroso: ascender desde vendedor callejero hasta convertirte en el rey del narcotráfico urbano.\n\nConstruí tu imperio desde cero: fabrica tus propias sustancias, controlá la producción, organizá tus rutas de distribución y expandí tus operaciones por los distintos distritos de la ciudad. Comprá propiedades, almacenes, laboratorios y negocios de fachada, contrata empleados leales —o reemplazalos si te traicionan—, y enfrenta a bandas rivales, autoridades corruptas y competidores que harán lo que sea para eliminarte.\n\nCada decisión que tomes puede hacerte más rico o hundirte en la ruina. Elegí entre mantener un perfil bajo o gobernar con violencia y miedo. Invertí en expansión, sobornos o mejoras tecnológicas para aumentar tu control sobre Hyland Point.\n\nDesarrollado con un enfoque en la gestión, el realismo urbano y la narrativa inmersiva, Schedule 1 combina estrategia, simulación y supervivencia en un entorno vivo y cambiante, donde cada acción tiene consecuencias. ¿Tenés lo necesario para construir un imperio… o vas a caer intentando dominar la ciudad?', 'Schedule1-Banner.jpg', 0x7363686564756c655f6578652e7a6970, 1, 12, 1, '2024-01-01', 'Windows', '10.49', 'Schedule-img2-Banner.jpg', 'Schedule-img1.jpg', 'Schedule-img2.jpg', 'Schedule-img3.jpg', 'Schedule-img4.jpg', 'En Schedule 1, tu misión no es sobrevivir a un páramo nuclear, sino avanzar en un proyecto en constante evolución, enfrentando desafíos, gestionando tiempos y colaborando con tu equipo para cumplir cada objetivo.', 'Schedule', 'schudule-1-cover.png', 'Juego online opciona', '1 - 4 jugadores'),
('Little Nightmares 3', 'Supervivencia', 'Disponible', 'Embárcate en una nueva aventura en el extraordinario mundo de Little Nightmares.\n\nAtrapados en la Espiral, un complejo de sitios perturbadores, Low y Alone deberán trabajar juntos para sobrevivir en un peligroso mundo de pesadilla. Mientras huyen y se refugian en su viaje para escapar del alcance de una amenaza aún mayor, sus sentidos también pueden llevarlos por mal camino hacia las sombras.\n\nPor primera vez en la serie de Little Nightmares, podrás enfrentarte a tus fobias de la niñez junto con un amigo en una partida cooperativa online o jugar por tu cuenta con una IA.', 'little-nightmares-3.jpg', NULL, 1, 13, 1, '2025-11-10', 'Windows, PlayStation 5, Xbox Series X', '59.99', 'Banner2-LittleNightmare3.jpg', 'little-nightmares-1.jpg', 'little-nightmares-2.jpg', 'little-nightmares-3.jpg', 'little-nightmares-4.jpg', 'Acompaña a Low y Alone en su viaje en busca de un camino que los conduzca fuera de la Nada.\n', 'Little Nightmares', 'little-nightmares-3-cover.png', 'Juego online opciona', '1 - 2 Jugadores'),
('Death Stranding 2', 'Simulación', 'Disponible', 'Sam y sus compañeros emprenden un nuevo viaje para evitar que la humanidad caiga en la extinción definitiva. Este mundo roto exige más que fuerza: exige enfrentar heridas del pasado, vínculos frágiles y decisiones que pueden cambiar el destino de todos.\n\nA lo largo del camino, atravesarán territorios plagados de amenazas sobrenaturales, estructuras abandonadas y ecos de vidas que ya no existen. Cada conexión, cada paso y cada silencio los obliga a preguntarse si la unión que alguna vez los salvó podría ahora ponerlos en riesgo. ¿Deberíamos habernos conectado?\n\nCon su visión única, Hideo Kojima redefine una vez más la narrativa interactiva, llevándote a un viaje donde la esperanza, el miedo y el peso de tus elecciones avanzan juntos hacia un futuro incierto.', 'death-stranding2.jpg', NULL, 1, 15, 1, '2025-09-30', 'PlayStation 5', '69.99', 'Stranding2-Banner.jpg', 'death-stranding2-img1.jpg', 'death-stranding2-img2.jpg', 'death-stranding2-img3.jpg', 'death-stranding2-img4.jpg', 'Embárcate en una inspiradora misión de conexión humana más allá de la UCA.', 'Death Stranding', 'death-stranding-2-cover.jpg', 'Juego offline', '1 jugador\n'),
('Horizon Forbidden West', 'Aventura', 'Disponible', 'Explora tierras remotas, enfréntate a máquinas más grandes e imponentes y descubre increíbles tribus en tu regreso a un futuro lejano en el mundo apocalíptico de Horizon.\n\nLa tierra se muere. Las rugientes tormentas y una desolación imparable causan estragos entre lo que queda de la humanidad, unas cuantas tribus dispersas, mientras nuevas y temibles máquinas merodean por sus fronteras. La vida en la Tierra se enfrenta a una nueva extinción y nadie sabe por qué.\n\nSolo Aloy es capaz de descubrir los secretos que hay detrás de estas amenazas, y restablecer el orden y el equilibrio en el mundo. Por el camino, se reunirá con viejos amigos, forjará alianzas con nuevas facciones en guerra y descubrirá la herencia de un antiguo pasado, mientras que intenta permanecer un paso por delante de un nuevo y aparentemente invencible enemigo.', 'horizon-forbidden-west-portada.jpg', NULL, 1, 16, 1, '2022-02-18', 'PlayStation 4, PlayStation 5', '59.99', 'Banner-HorizonForbiddenWest.jpg', 'horizon-forbidden-west-img1.jpg', 'horizon-forbidden-west-img2.jpg', 'horizon-forbidden-west-img3.jpg', 'horizon-forbidden-west-img4.jpg', 'Únete a Aloy mientras desafía el Oeste Prohibido, una frontera majestuosa, aunque peligrosa, en la que se ocultan nuevas y misteriosas amenazas.', 'Horizon', 'horizon-forbidden-west-cover.jpg', 'Juego Offline', '1 jugador\n'),
('Battlefield 6', 'Acción', 'Disponible', 'Prepárate para enfrentarte a combates de infantería de alta intensidad donde cada disparo importa. Surca los cielos en batallas aéreas frenéticas y derriba objetivos enemigos mientras destruyes el entorno para obtener una ventaja táctica. Cada movimiento, cada disparo y cada decisión cobran vida con el sistema de combate cenestésico, dándote control total del conflicto.\n\nEn esta guerra moderna, los tanques, los cazas y los gigantescos arsenales dominan el campo de batalla, pero la fuerza más letal no es la tecnología: es tu escuadrón. La coordinación, la estrategia y la comunicación definen si regresás victorioso… o si quedás reducido a escombros.\n\nEsto es Battlefield 6: un conflicto global donde la destrucción es real, las batallas son impredecibles y tu equipo es la clave para cambiar el rumbo de la guerra.', 'battlefield6-portada.jpg', NULL, 1, 17, 1, '2025-10-20', 'Windows, PlayStation 5, Xbox Series X', '69.99', 'battlefield-6-banner2.jpg', 'battlefield6-img1.jpg', 'battlefield6-img2.jpg', 'battlefield6-img3.jpg', 'battlefield6-img4.jpg', 'La experiencia definitiva de guerra sin cuartel.', 'Battlefield', 'battlefield-6-cover.jpg', 'Se requiere jugar online', '1 - 64 jugadores'),
('The Witcher 3', 'Aventura', 'Disponible', 'Eres Geralt de Rivia. A tu alrededor, los pueblos y asentamientos de los Reinos del Norte están desapareciendo a manos de un ejército invasor sobrenatural al que se conoce como Cacería salvaje, pues deja un rastro de destrucción y sangre tras su paso.\n\nMientras te preparas para un enfrentamiento encarnizado contra la Cacería salvaje, irás descubriendo una historia compleja y apasionante y conociendo a personajes inolvidables. Al explorar los Reinos del Norte, descubrirás que en cada pueblo y detrás de cada árbol y cada sombra hay misterios.', 'theWitcher3-portada.jpg', NULL, 1, 19, 1, '2015-05-19', 'Windows, PlayStation 4, Xbox One, Nintendo Switch', '49.99', 'Witcher3-Banner2.jpg', 'theWitcher3-img1.jpg', 'theWitcher3-img2.jpg', 'theWitcher3-img3.jpg', 'theWitcher3-img4.jpg', 'La espada del destino tiene doble filo. Y tú eres uno de ellos.', 'The Witcher', 'theWitcher3-cover.jpg', 'Juego offline', '1 jugador'),
('It Takes Two', 'Arcade', 'Disponible', 'Embárcate en el viaje más alocado de tu vida en It Takes Two, una aventura de plataforma puramente cooperativa que desafía los géneros. Invita a un amigo a que se una gratis con el Pase de amigo** y trabajen juntos a través de una gran variedad de desafíos deliciosamente perturbadores. Jueguen como la conflictiva pareja de Cody y May, dos humanos convertidos en muñecos por un hechizo mágico. Juntos, atrapados en un mundo fantástico donde lo impredecible se esconde a la vuelta de cada esquina, tendrán que enfrentar a regañadientes el desafío de salvar su relación fracturada.\n\nDomina habilidades de personaje únicas y conectadas en cada nuevo nivel. Ayúdense uno al otro en una gran cantidad de obstáculos inesperados y momentos hilarantes. Patea las colas peludas de ardillas gángster, pilota un par de calzones, sé DJ de un club ajetreado y ve en trineo por un globo mágico de nieve. Abraza una historia sentida y desternillante donde la narrativa y las mecánicas se entretejen en una experiencia metafórica singular.', 'it takes two portada.jpg', NULL, 1, 20, 1, '2021-03-26', 'Windows, PlayStation 4, PlayStation 5, Xbox One, Xbox Series X', '39.99', 'it takes two 1.jpg', 'it takes two 4.jpg', 'it takes two 2.jpg', 'it takes two 3.jpg', 'it-takes-two-Banner2.jpg', 'Solo hay una certeza en It Takes Two: estamos mejor juntos.', 'It Takes Two', 'it-takes-two-cover.jpg', 'Juego online opcional', '1-2 jugadores'),
('Baldur’s Gate 3', 'Estrategia', 'Disponible', 'Reúne a un grupo y emprendan juntos una campaña épica en este RPG de próxima generación ambientado en el mundo de Calabozos y Dragones, que llega de la mano de los creadores de Divinity: Original Sin II.\n\nLa tierra de Faerûn está bajo asedio. Tras ser capturado e infectado por los azotamentes invasores, ¿te resistirás a su corrupción o aceptarás al poder misterioso que empieza a crecer en tu interior?\n\nElige un personaje original o crea tu propio protagonista personalizado, y vive una historia dinámica que cambia de forma cada vez que se lanzan los dados.\n\nUne fuerzas con un grupo de personajes complejos para saquear, luchar y abrirte paso en los Reinos Olvidados y más allá. Lanza los dados y saca provecho de una tirada ventajosa o desventajosa con un combate táctico y fluido.\n\nEl destino de los Reinos Olvidados está en tus manos.', 'baldursGate3-portada.jpg', NULL, 1, 21, 1, '2023-08-03', 'Windows, macOS, PlayStation 5', '59.99', 'banner2-Baldurs.jpg', 'baldursGate3-img1.jpg', 'baldursGate3-img2.jpg', 'baldursGate3-img3.jpg', 'baldursGate3-img4.jpg', 'Deja tu marca en los Reinos Olvidados en esta aventura cinemática por turnos al mejor estilo de Calabozos y Dragones.', 'Baldur´s Gate', 'baldursGate3-cover.jpg', 'Juego online opcional', '1-2 jugadores'),
('Turtle’s Treasures', 'Emulador', 'Disponible', 'Embárcate en una aventura pixelada llena de calma, curiosidad y pequeñas sorpresas escondidas bajo la tierra. En Turtle’s Treasures, acompañás a una tortuga exploradora cuyo único objetivo es excavar cada vez más profundo para descubrir minerales raros, restos misteriosos, reliquias antiguas… o simplemente cosas raras que alguien dejó enterradas hace siglos.\r\n\r\nA medida que avanzás hacia las capas más oscuras del subsuelo, tu tortuga no solo encuentra tesoros: evoluciona. Mejora su caparazón, desarrolla nuevas habilidades y se vuelve más resistente al terreno, permitiendo excavar cada vez más lejos en busca de riquezas ocultas. Es un viaje tranquilo, sin enemigos, sin presión y sin relojes persiguiéndote. Solo vos, la tierra, y la satisfacción de ver qué aparece cuando das un golpe más.\r\n\r\nCon un diseño encantador en pixel art, Turtle’s Treasures ofrece una experiencia relajante perfecta para desconectarte unos minutos… o perderte durante horas en un bucle de exploración suave y adictivo.', 'Banner1-Turtle.jpg', NULL, 1, 27, 1, '2025-11-25', 'Emulador', '5.00', 'banner2-Turtle.jpg', 'Turtle-img1.png', 'Turtle-img2.png', 'Turtle-img3.png', 'Turtle-img4.png', 'Turtle’s Treasures – ¡Cava, evoluciona y descubre los secretos del subsuelo!', '', 'Turtle-Portada.jpg', 'Juego offline', '1 jugador'),
('Friday Night Funkin\'', 'Emulador', 'Disponible', 'Friday Night Funkin’ (FNF) es un juego de ritmo en el que el jugador controla a Boyfriend, un joven que quiere impresionar a Girlfriend ganando batallas de rap musicales. Para ello, debe presionar las flechas en el momento justo siguiendo las notas que aparecen en pantalla y mantener el ritmo mejor que su oponente.\n\nEl juego se divide en “semanas”, cada una con varios temas musicales y un adversario distinto, desde personajes clásicos como Daddy Dearest y Pico hasta rivales más peculiares o sobrenaturales. Su estilo visual retro, sus canciones pegadizas y la gran cantidad de mods creados por la comunidad han hecho que FNF sea un juego muy popular y en constante expansión.', 'Fnf-banner1.jpg', NULL, 1, 31, 1, '2025-11-25', 'Emulador', '2.00', 'Fnf-banner2.jpg', 'Fnf-Img1.jpg', 'Fnf-Img2.jpg', 'Fnf-Img3.jpg', 'Fnf-Img4.jpg', '¡Diviertete con las teclas!', '', 'Fnf-Cover.jpg', 'Juego offline', '1 jugador'),
('Fossil quest', 'Emulador', 'Disponible', 'Fossil Quest es un simulador de vida acogedor y relajado centrado en la exploración y excavación de fósiles. En este juego tomas el papel de un entusiasta de la paleontología que siempre soñó con crear su propio museo de dinosaurios, y ahora por fin tiene el espacio y la libertad para hacerlo realidad.\r\n\r\nExplora distintos terrenos, excava con cuidado para desenterrar restos prehistóricos y reúne piezas únicas para reconstruir esqueletos impresionantes. A medida que avanzas, podrás organizar tus descubrimientos en exhibiciones, decorar el museo a tu gusto y atraer visitantes curiosos que quieran aprender sobre las criaturas que habitaron la Tierra hace millones de años. Es una experiencia tranquila y creativa pensada para quienes disfrutan descubrir, coleccionar y construir a su propio ritmo.', 'Fosil-Banner1.jpg', NULL, 1, 32, 1, '2025-11-25', 'Emulador', '2.00', 'Fossil-Banner2.jpg', 'FossilQuest-img1.jpg', 'FossilQuest-img2.jpg', 'FossilQuest-img3.jpg', 'FossilQuest-img4.jpg', 'Explora, excava y da vida a tu museo de dinosaurios.', '', 'FossilQuest-cover.jpg', 'Juego offline', '1 jugador'),
('Gun Mission', 'Emulador', 'Disponible', 'GunMission es un juego arcade de desplazamiento lateral que captura la esencia de los clásicos como Contra y Rolling Thunder. Enfréntate a oleadas de enemigos mientras avanzas a través de niveles llenos de plataformas, disparos y desafíos rápidos. Equípate con diferentes armas, esquiva ataques letales y derrota a jefes poderosos en una experiencia frenética que combina nostalgia y adrenalina en cada misión.', 'GunMission-Banner1.jpg', NULL, 1, 33, 1, '2025-11-25', 'Emulador', '5.00', 'GunMission-Banner2.jpg', 'GunMission-img2.jpg', 'GunMission-img1.jpg', 'GunMission-img4.jpg', 'GunMission-img3.jpg', 'Acción explosiva al estilo arcade clásico', '', 'GunMission-cover.jpg', 'Juego offline', '1 jugador'),
('PolyTrack', 'Emulador', 'Disponible', 'PolyTrack es un juego de carreras de estética low-poly que combina bucles, saltos precisos y velocidades extremas en circuitos diseñados para poner a prueba tus reflejos. Cada milisegundo cuenta mientras compites contra el reloj para perfeccionar tus trazadas y reducir tu tiempo al máximo. Inspirado fuertemente en la serie TrackMania, el juego apuesta por carreras cortas, técnicas y altamente rejugables, donde la habilidad y la consistencia importan más que nunca. Con una variedad de pistas originales, físicas rápidas y un estilo visual limpio y minimalista, PolyTrack ofrece una experiencia intensa y adictiva ideal para quienes disfrutan de dominar cada curva y buscar siempre un nuevo récord personal.', 'PolyTrack-Banner1.jpg', NULL, 1, 34, 1, '2025-11-25', 'Emulador', '7.20', 'PolyTrack-Banner2.jpg', 'PolyTrack-img1.jpg', 'PolyTrack-img2.jpg', 'PolyTrack-img3.jpg', 'PolyTrack-img4.jpg', 'Velocidad pura en pistas de baja poligonización', '', 'PolyTrack-cover.jpg', 'Juego offline', '1 jugador');

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
(212, 21, 2, NULL, 1),
(213, 13, 5, NULL, 1);

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
('a', 'amydelgado88@gmail.com', 'a', 1, 'creator', 'a', '1_1762267798.png', '1900-01-17', '', 248, 11),
('nomeacuerdo', 'nomeacuerdo@gmail.com', 'nomeacuerdo', 2, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 50, 0),
('nose', 'nose@gmail.com', 'nose', 3, 'user', 'hola', '3_1760458043.png', '1900-01-01', 'indefinido', 50, 0),
('random', 'random@gmail.com', 'a', 4, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 50, 0),
('cuentanueva', 'nueva@gmail.com', 'nueva', 5, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 50, 0),
('idk', 'idk@gmail.com', 'idk', 6, 'user', NULL, 'default.png', '1900-01-01', 'indefinido', 50, 0),
('admin', 'admin@gmail.com', 'Type_shit', 7, 'admin', 'Cuenta principal de administrador', 'default.png', '1900-01-01', 'indefinido', 50, 0),
('admin2', 'admin2@gmail.com', 'admin', 8, 'admin', '', 'default.png', '1900-01-01', 'indefinido', 50, 0);

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
(1, 10, '2025-11-25 00:23:29'),
(1, 13, '2025-11-25 00:23:29'),
(1, 15, '2025-11-25 00:31:19'),
(1, 19, '2025-11-25 00:31:01'),
(1, 31, '2025-11-25 13:28:25');

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
  MODIFY `idCommentary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `comment_votes`
--
ALTER TABLE `comment_votes`
  MODIFY `idVote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `edition`
--
ALTER TABLE `edition`
  MODIFY `idEdition` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `idGame` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `game_ratings`
--
ALTER TABLE `game_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
