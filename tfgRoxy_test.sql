

-- CREAR LA BD BORRANDOLA SI YA EXISTIESE
--
DROP DATABASE IF EXISTS INCID_Test;
CREATE DATABASE `INCID_Test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `INCID_Test`;
--
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
  `id_rol` int(3) NOT NULL DEFAULT 2
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE ROLES (
`id_rol` int(11) NOT NULL,
`rol` varchar(15) NOT NULL,
`descripcion` varchar(50) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE ENTIDADES (
`id_entidad` int(11) NOT NULL,
`entidad` varchar(15) NOT NULL,
`descripcion` varchar(50) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE ACCIONES(
`id_accion` int(11) NOT NULL,
`accion` varchar(20) NOT NULL,
`descripcion` varchar(50) NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE PERMISOS(
`id_entidad` int(11) NOT NULL,
`id_accion` int(11) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE PERMISOS_ROLES(
`id_rol` int(11) NOT NULL,
`id_entidad` int(11) NOT NULL,
`id_accion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE PROVEEDORES(
`CIF` varchar(9) NOT NULL,
`empresa` varchar(100) NOT NULL,
`direccion` varchar(100) NOT NULL,
`localidad` varchar(30) NOT NULL,
`CP` int(5) NOT NULL,
`email` varchar(100) NOT NULL,
`telefono` int(9) NOT NULL,
`movil` int(9) NULL,
`pers_contacto` varchar(100) NOT NULL,
`login_admin` varchar(25) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `ROLES`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `rol` (`rol`);

ALTER TABLE `ENTIDADES`
  ADD PRIMARY KEY (`id_entidad`),
  ADD UNIQUE KEY `entidad` (`entidad`);
 
ALTER TABLE `ACCIONES`
  ADD PRIMARY KEY(`id_accion`),
  ADD UNIQUE KEY `accion` (`accion`);

ALTER TABLE `PERMISOS`
  ADD PRIMARY KEY (`id_entidad`,`id_accion`);

ALTER TABLE `PERMISOS_ROLES`
  ADD PRIMARY KEY (`id_rol`,`id_entidad`,`id_accion`);

ALTER TABLE `ROLES`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ENTIDADES`
  MODIFY `id_entidad` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ACCIONES`
  MODIFY `id_accion` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `PROVEEDORES`
  ADD PRIMARY KEY (`CIF`);
    


---- INSERCIÓN DE ROLES ---

INSERT INTO ROLES (`id_rol`, `rol`, `descripcion`) VALUES (1, 'admin', 'administrador total del sistema');
INSERT INTO ROLES (`id_rol`, `rol`, `descripcion`) VALUES (2, 'usuario', 'Cualquier usuario');
INSERT INTO ROLES (`id_rol`, `rol`, `descripcion`) VALUES (3, 'responsable', 'Responsable de aceptar las obras');

--- INSERCION DE ENTIDATES ---


INSERT INTO ENTIDADES (`id_entidad`, `entidad`, `descripcion`) VALUES (1, 'USUARIOS', 'gestion de usuarios');
INSERT INTO ENTIDADES (`id_entidad`, `entidad`, `descripcion`) VALUES (2, 'PERMISOS', 'gestion de permisos');
INSERT INTO ENTIDADES (`id_entidad`, `entidad`, `descripcion`) VALUES (3, 'ROLES', 'gestion de roles');


--- INSERCION DE ACCIONES ---

INSERT INTO ACCIONES (`id_accion`, `accion`, `descripcion`) VALUES (1, 'ADD', 'funcion de añadir');
INSERT INTO ACCIONES (`id_accion`, `accion`, `descripcion`) VALUES (2, 'EDIT', 'funcion de editar');
INSERT INTO ACCIONES (`id_accion`, `accion`, `descripcion`) VALUES (3, 'DELETE', 'funcion de borrar');
INSERT INTO ACCIONES (`id_accion`, `accion`, `descripcion`) VALUES (4, 'SEARCH', 'funcion de buscar');
INSERT INTO ACCIONES (`id_accion`, `accion`, `descripcion`) VALUES (5, 'SHOWALL', 'Mostrar todos lso elementos e la entidad');
INSERT INTO ACCIONES (`id_accion`, `accion`, `descripcion`) VALUES (6, 'SHOWCURRENT', 'Mostrar elemento actual');

--- INSERCIÓN DE PERMISOS ---

INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (1,1);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (1,2);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (1,3);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (1,4);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (1,5);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (1,6);

INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (2,1);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (2,2);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (2,3);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (2,4);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (2,5);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (2,6);

INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (3,1);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (3,2);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (3,3);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (3,4);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (3,5);
INSERT INTO PERMISOS (`id_entidad`, `id_accion`) VALUES (3,6);

INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,1,1);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,1,2);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,1,3);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,1,4);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,1,5);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,1,6);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,2,1);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,2,2);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,2,3);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,2,4);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,2,5);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,2,6);

INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,3,1);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,3,2);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,3,3);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,3,4);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,3,5);

INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (2,1,5);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (2,1,6);

INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,4,1);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,4,3);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,4,5);

INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,5,1);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,5,3);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,5,5);


INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,6,1);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,6,2);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,6,3);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,6,4);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,6,5);
INSERT INTO PERMISOS_ROLES (`id_rol`,`id_entidad`, `id_accion`) VALUES (1,6,6);

INSERT INTO USUARIOS (`login`, `password`, `DNI`, `nombre`, `apellidos`, `email`, `id_rol`) VALUES ('admin', 'password', '36165166N', 'admin', 'root', 'admin@uvigo.es', 1);
