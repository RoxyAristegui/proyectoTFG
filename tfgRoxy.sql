-- jrodeiro - 7/10/2017
-- script de creación de la bd, usuario, asignación de privilegios a ese usuario sobre la bd
-- creación de tabla e insert sobre la misma.
--
-- CREAR LA BD BORRANDOLA SI YA EXISTIESE
--
DROP DATABASE IF EXISTS `INCID_TFG`;
CREATE DATABASE `INCID_TFG` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `INCID_TFG`;
--
-- DAMOS PERMISO USO Y BORRAMOS EL USUARIO QUE QUEREMOS CREAR POR SI EXISTE
--
GRANT USAGE ON * . * TO `roxytfg`@`localhost`;
	DROP USER `roxytfg`@`localhost`;
--
-- CREAMOS EL USUARIO Y LE DAMOS PASSWORD,DAMOS PERMISO DE USO Y DAMOS PERMISOS SOBRE LA BASE DE DATOS.
--
CREATE USER IF NOT EXISTS `roxytfg`@`localhost` IDENTIFIED BY 'isJY5h';
GRANT USAGE ON *.* TO `roxytfg`@`localhost` REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `INCID_TFG`.* TO `roxytfg`@`localhost` WITH GRANT OPTION;

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
  `id_rol` int(3) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE PERMISOS (
`id_perm` int(11) NOT NULL ,
`permiso` varchar(15) NOT NULL,
`descripcion` varchar(30) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE ROLES (
`id_rol` int(11) NOT NULL,
`rol` varchar(15) NOT NULL,
`descripcion` varchar(25) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE PERMISOS_ROLES (
`id_rol` varchar(15) NOT NULL,
`id_perm` varchar(15) NOT NULL
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

ALTER TABLE `PERMISOS`
  ADD PRIMARY KEY (`id_perm`),
  ADD UNIQUE KEY `permiso` (`permiso`);
 

ALTER TABLE `ROLES`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `rol` (`rol`);

ALTER TABLE `PERMISOS_ROLES`
  ADD PRIMARY KEY (`id_perm`,`id_rol`);

ALTER TABLE `PERMISOS`
MODIFY `id_perm` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `ROLES`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;
  COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
