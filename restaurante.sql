-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 03-09-2025 a las 14:16:32
-- Versión del servidor: 8.0.40
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `descripcion` text,
  `restaurante_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `nombre`, `precio`, `descripcion`, `restaurante_id`) VALUES
(1, 'Ceviche', 25.00, 'Ceviche de pescado fresco con camote y cancha', 1),
(2, 'Arroz con Mariscos', 30.00, 'Arroz chaufa con mariscos al estilo huantino', 1),
(3, 'Parrilla Mixta', 45.00, 'Carne, pollo y chorizo a la parrilla con guarniciones', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `tipo_comida` varchar(50) DEFAULT NULL,
  `calificacion` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `nombre`, `direccion`, `telefono`, `horario`, `tipo_comida`, `calificacion`) VALUES
(1, 'El Buen Sabor Marino', 'Jr. Principal 123 - Huanta', '999888777', '9:00 am - 10:00 pm', 'Marina', 4.5),
(2, 'La Parrilla Huantina', 'Av. Central 456 - Huanta', '988777666', '12:00 pm - 11:00 pm', 'Parrilla', 4.2);

CREATE TABLE `sesiones` (
  `id` int NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `token` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id`, `id_usuario`, `fecha_hora_inicio`, `fecha_hora_fin`, `token`) VALUES
(1, 1, '2025-04-04 16:29:36', '2025-04-04 16:31:36', 'Nwk7ysUyIz)Itj7XM16MM4&xp#1xwQ');




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `dni` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombres_apellidos` varchar(140) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int NOT NULL DEFAULT '1',
  `password` varchar(1000) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `reset_password` int NOT NULL DEFAULT '0',
  `token_password` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombres_apellidos`, `correo`, `telefono`, `estado`, `password`, `reset_password`, `token_password`, `fecha_registro`) VALUES
(1, '11112222', 'admin', 'admin@gmail.comm', '987654321', 1, '$2y$10$IeNRkcso2I60YiFEo8gKmeQEyWhTVq9TETpTgSenx380IaeWOSbv6', 1, 'zK1fiEUUmxr2ErZH&A4N0b8G#gdm4H', '2025-04-04 16:20:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurante_id` (`restaurante_id`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

  ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `sesiones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `platos`

ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_ibfk_1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
