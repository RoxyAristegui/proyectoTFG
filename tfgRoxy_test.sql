-- jrodeiro - 7/10/2017
-- script de creación de la bd, usuario, asignación de privilegios a ese usuario sobre la bd
-- creación de tabla e insert sobre la misma.
--
-- CREAR LA BD BORRANDOLA SI YA EXISTIESE
--
DROP DATABASE IF EXISTS INCID_Test;
CREATE DATABASE `INCID_Test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `INCID_Test`;

--
-- DAMOS PERMISO DE USO al usuario Y DAMOS PERMISOS SOBRE LA BASE DE DATOS.
--
GRANT ALL PRIVILEGES ON `INCID_Test`.* TO `roxytfg`@`localhost` WITH GRANT OPTION;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE USUARIOS (
  `login` varchar(15) NOT NULL,
  `password` varchar(128) NOT NULL,
  `DNI` varchar(9) NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `rol` varchar(60) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `PERMISOS`
--

CREATE TABLE PERMISOS (
`permiso` varchar(15) NOT NULL,
`descripcion` varchar(30) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `ROLES`
--

CREATE TABLE ROLES (
`rol` varchar(15) NOT NULL,
`descripcion` varchar(25) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `PERMISOS_ROLES`
--

CREATE TABLE PERMISOS_ROLES (
`rol` varchar(15) NOT NULL,
`permiso` varchar(15) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



--
-- Índices para tablas volcadas
--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE USUARIOS
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD UNIQUE KEY `email` (`email`);
--
-- Indices de la tabla `PERMISOS`
--
ALTER TABLE `PERMISOS`
  ADD PRIMARY KEY (`permiso`);
--
-- Indices de la tabla `ROLES`
--
ALTER TABLE `ROLES`
  ADD PRIMARY KEY (`rol`);
--
-- Indices de la tabla `PERMISOS_ROLES`
--
ALTER TABLE `PERMISOS_ROLES`
  ADD PRIMARY KEY (`permiso`,`rol`);

