-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2025 a las 15:27:01
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
-- Base de datos: `restaurante2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_api`
--

CREATE TABLE `client_api` (
  `id` int(11) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_registro` date DEFAULT current_timestamp(),
  `estado` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `client_api`
--

INSERT INTO `client_api` (`id`, `ruc`, `razon_social`, `telefono`, `correo`, `fecha_registro`, `estado`) VALUES
(1, '10754027890', 'multiego', '987654321', 'multi@gmail.com', '2025-10-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `count_request`
--

CREATE TABLE `count_request` (
  `id` int(11) NOT NULL,
  `id_token_api` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `fecha` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` varchar(20) NOT NULL COMMENT 'Formato: $XX.XX',
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL COMMENT 'Ej: Entrada, Plato fuerte, Postre',
  `imagen` varchar(300) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT 1 COMMENT '1=disponible, 0=no disponible',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `id_restaurante`, `nombre`, `precio`, `descripcion`, `categoria`, `imagen`, `disponible`, `fecha_registro`) VALUES
(1, 1, 'Pizza Margherita', '$18.50', 'Pizza clásica con mozzarella, tomate fresco y albahaca', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(2, 1, 'Pasta Carbonara', '$22.00', 'Pasta fresca con panceta, huevo y queso pecorino romano', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(3, 1, 'Risotto ai Funghi', '$24.50', 'Risotto cremoso con hongos porcini y trufa negra', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(4, 1, 'Tiramisu', '$12.00', 'Postre tradicional italiano con café y mascarpone', 'Postre', NULL, 1, '2025-10-22 13:15:33'),
(5, 2, 'Sushi Variado', '$32.00', '12 piezas de sushi premium con salmón, atún y pez mantequilla', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(6, 2, 'Ramen Tonkotsu', '$26.00', 'Ramen con caldo de cerdo, chashu, huevo marinado y bambú', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(7, 2, 'Tempura Mixta', '$21.00', 'Camarones y vegetales en tempura crujiente con salsa tentsuyu', 'Entrada', NULL, 1, '2025-10-22 13:15:33'),
(8, 2, 'Teppanyaki de Res', '$38.00', 'Corte premium de res preparado en plancha japonesa', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(9, 2, 'Mochi de Té Verde', '$8.50', 'Postre tradicional de arroz glutinoso relleno de helado', 'Postre', NULL, 1, '2025-10-22 13:15:33'),
(10, 3, 'Parrillada Premium', '$45.00', 'Selección de carnes: bife, chorizo, molleja y morcilla con papas doradas', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(11, 3, 'Anticuchos de Corazón', '$19.50', 'Brochetas de corazón de res marinadas en ají panca', 'Entrada', NULL, 1, '2025-10-22 13:15:33'),
(12, 3, 'Lomo Saltado', '$28.00', 'Clásico peruano con lomo fino, cebolla, tomate y papas fritas', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(13, 3, 'Tacu Tacu con Lomo', '$31.00', 'Arroz con frejoles, lomo a la parrilla y salsa criolla', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(14, 4, 'Ceviche Clásico', '$29.00', 'Pescado fresco del día en leche de tigre con camote y choclo', 'Entrada', NULL, 1, '2025-10-22 13:15:33'),
(15, 4, 'Arroz con Mariscos', '$34.00', 'Arroz con calamares, langostinos, conchas y pulpo en salsa especial', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(16, 4, 'Jalea Mixta', '$42.00', 'Fritura de pescado y mariscos con yuca y salsa criolla', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(17, 4, 'Chupe de Camarones', '$36.00', 'Sopa cremosa de camarones con huevo, queso y leche', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(18, 4, 'Suspiro Limeño', '$10.00', 'Postre de manjar blanco coronado con merengue de vino', 'Postre', NULL, 1, '2025-10-22 13:15:33'),
(19, 5, 'Tacos al Pastor', '$16.50', '3 tacos con cerdo marinado, piña, cilantro y cebolla en tortilla de maíz', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(20, 5, 'Enchiladas Suizas', '$22.00', 'Tortillas rellenas de pollo con salsa verde y gratinadas con queso', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(21, 5, 'Burrito de Carne Asada', '$24.00', 'Burrito gigante con carne asada, frijoles, arroz, guacamole y pico de gallo', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(22, 5, 'Quesadilla de Camarón', '$26.00', 'Quesadilla con camarones, queso Oaxaca y rajas de chile poblano', 'Plato fuerte', NULL, 1, '2025-10-22 13:15:33'),
(23, 5, 'Churros con Cajeta', '$9.00', 'Churros caseros con azúcar y canela, acompañados de cajeta', 'Postre', NULL, 1, '2025-10-22 13:15:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `ubicacion` varchar(300) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `horario` varchar(200) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1 COMMENT '1=activo, 0=inactivo',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `nombre`, `ubicacion`, `descripcion`, `telefono`, `email`, `horario`, `estado`, `fecha_registro`) VALUES
(1, 'La Trattoria Italiana', 'Av. Principal 123, Miraflores', 'Auténtica cocina italiana con recetas tradicionales y ambiente acogedor. Nuestros chefs traen la experiencia de la Toscana directamente a tu mesa.', '01-4445566', 'info@trattoria.pe', 'Lun-Dom: 12:00-23:00', 1, '2025-10-22 13:15:33'),
(2, 'Sakura Sushi Bar', 'Calle Los Pinos 456, San Isidro', 'Experiencia japonesa auténtica con los pescados más frescos del mercado. Sushi preparado por maestros con más de 15 años de experiencia.', '01-7778899', 'contacto@sakura.pe', 'Mar-Dom: 13:00-23:00', 1, '2025-10-22 13:15:33'),
(3, 'El Asador Criollo', 'Jr. Libertad 789, Barranco', 'Parrilla y sabores peruanos en su máxima expresión. Carnes premium maduradas y anticuchos al estilo tradicional limeño.', '01-2223344', 'reservas@asador.pe', 'Lun-Dom: 12:00-01:00', 1, '2025-10-22 13:15:33'),
(4, 'Mar y Tierra', 'Malecón Cisneros 234, Miraflores', 'Fusión de mariscos frescos y cortes premium. Vista al mar y una experiencia gastronómica inolvidable frente al océano Pacífico.', '01-5556677', 'info@marytierra.pe', 'Lun-Dom: 11:00-23:00', 1, '2025-10-22 13:15:33'),
(5, 'Taco Loco Mexicano', 'Av. Benavides 567, Surco', 'Auténtica comida mexicana con recetas familiares. Tortillas hechas a mano y salsas artesanales que te transportan a México.', '01-8889900', 'hola@tacoloco.pe', 'Lun-Dom: 12:00-23:00', 1, '2025-10-22 13:15:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `token` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id`, `id_usuario`, `fecha_hora_inicio`, `fecha_hora_fin`, `token`) VALUES
(1, 1, '2025-04-04 16:29:36', '2025-04-04 16:31:36', 'Nwk7ysUyIz)Itj7XM16MM4&xp#1xwQ'),
(42, 1, '2025-09-11 23:07:36', '2025-09-11 23:52:00', 'c*Y@8rEV[j*%S1ukAI4VS%$TgFxqF['),
(43, 1, '2025-09-11 23:51:19', '2025-09-11 23:54:55', 'HPzMMO4F5PS}/fOQNtCX3r0(UhdutN'),
(44, 1, '2025-09-11 23:54:12', '2025-09-12 00:18:48', 'DpgMQ)0t${fSGqHYBBJRcW*bR{1#l$'),
(45, 1, '2025-10-21 17:13:58', '2025-10-21 17:26:50', 'x$nzI%n3e85qoO}}IO70s0w(JTJ55H'),
(46, 1, '2025-10-22 08:19:22', '2025-10-22 08:21:22', '2R4b5qtM*u$aVZcI#0BcANkf%V*5zG'),
(47, 1, '2025-10-22 08:19:32', '2025-10-22 08:25:50', '$4E%FOx${NKuwMo0uFkT5UeddZ/rN*'),
(48, 1, '2025-10-22 10:19:45', '2025-10-22 12:01:15', 'fG/spUynhkl48H@Xn/s$0%Y$mriaW{'),
(49, 1, '2025-10-23 08:25:01', '2025-10-23 08:27:01', 'lTV#zvuvp(1V5EqCF@%W1IBG}Wd71t'),
(50, 1, '2025-10-23 08:25:21', '2025-10-23 08:26:35', 'dVH20eVm{qZ4{HCEg}YIPc2{Ul3vyR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens_api`
--

CREATE TABLE `tokens_api` (
  `id` int(11) NOT NULL,
  `id_client_api` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `fecha_registro` date DEFAULT current_timestamp(),
  `estado` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombres_apellidos` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `reset_password` int(11) NOT NULL DEFAULT 0,
  `token_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '',
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombres_apellidos`, `correo`, `telefono`, `estado`, `password`, `reset_password`, `token_password`, `fecha_registro`) VALUES
(1, '11112222', 'admin', 'admin@gmail.comm', '987654321', 1, '$2y$10$IeNRkcso2I60YiFEo8gKmeQEyWhTVq9TETpTgSenx380IaeWOSbv6', 1, 'zK1fiEUUmxr2ErZH&A4N0b8G#gdm4H', '2025-04-04 16:20:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client_api`
--
ALTER TABLE `client_api`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `count_request`
--
ALTER TABLE `count_request`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_restaurante` (`id_restaurante`),
  ADD KEY `idx_nombre` (`nombre`),
  ADD KEY `idx_categoria` (`categoria`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nombre` (`nombre`),
  ADD KEY `idx_estado` (`estado`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tokens_api`
--
ALTER TABLE `tokens_api`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `client_api`
--
ALTER TABLE `client_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `count_request`
--
ALTER TABLE `count_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `tokens_api`
--
ALTER TABLE `tokens_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `fk_platos_restaurante` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
