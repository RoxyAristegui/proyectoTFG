

-- CREAR LA BD BORRANDOLA SI YA EXISTIESE
--
DROP DATABASE IF EXISTS INCID_Test;
CREATE DATABASE `INCID_Test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `INCID_Test`;
--
-- Estructura de tabla para la tabla USUARIOS
--

CREATE TABLE USUARIOS (
  login varchar(15) NOT NULL,
  password varchar(128) NOT NULL,
  DNI varchar(9) NULL,
  nombre varchar(30) NOT NULL,
  apellidos varchar(50) NOT NULL,
  email varchar(60) NOT NULL,
  id_rol int(3) NOT NULL DEFAULT 4
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla ROLES
--

CREATE TABLE ROLES (
id_rol int(11) NOT NULL,
rol varchar(15) NOT NULL,
descripcion varchar(50) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla ENTIDADES
--

CREATE TABLE ENTIDADES (
id_entidad int(11) NOT NULL,
entidad varchar(15) NOT NULL,
descripcion varchar(50) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla ACCIONES
--

CREATE TABLE ACCIONES(
id_accion int(11) NOT NULL,
accion varchar(20) NOT NULL,
descripcion varchar(50) NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla PERMISOS
--

CREATE TABLE PERMISOS(
id_entidad int(11) NOT NULL,
id_accion int(11) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla PERMISOS_ROLES
--

CREATE TABLE PERMISOS_ROLES(
id_rol int(11) NOT NULL,
id_entidad int(11) NOT NULL,
id_accion int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla PROVEEDORES
--

CREATE TABLE PROVEEDORES(
CIF varchar(9) NOT NULL,
empresa varchar(100) NOT NULL,
direccion varchar(100) NOT NULL,
localidad varchar(30) NOT NULL,
CP int(5) NOT NULL,
email varchar(100) NOT NULL,
telefono int(9) NOT NULL,
movil int(9) NULL,
pers_contacto varchar(100) NOT NULL,
login_admin varchar(25) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla OBRAS
--

CREATE TABLE OBRAS (
 codigo_obra int(11) NOT NULL,
 nombre TEXT NOT NULL,
 fecha_creacion DATE NOT NULL,
 fecha_final DATE NULL,
 CIF varchar(9) NULL,
 codigo_area varchar(11) NOT NULL,
 situacion int(2) NULL,
 coste int(11) NULL,
 solicitante varchar(120) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;	

--
-- Estructura de tabla para la tabla AREAS
--

CREATE TABLE AREAS (
codigo_area varchar(11) NOT NULL,
nombre varchar(250) NOT NULL,
responsable varchar(25) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;	

--
-- Estructura de tabla para la tabla ACTUACIONES
--

CREATE TABLE ACTUACIONES(
 codigo_obra int(11) NOT NULL,
 id_acto int(11) NOT NULL,
 descripcion text NOT NULL,
 fecha_actuacion DATE NOT NULL,
 aceptado tinyint(1) DEFAULT 0,
 cerrado tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;	

--
-- Estructura de tabla para la tabla TRABAJADORES
--

CREATE TABLE TRABAJADORES(
 DNI int(9) NOT NULL,
 nombre varchar(30) NOT NULL,
 apellidos varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla ACTUACIONES_TRABAJADORES
--

CREATE TABLE ACTUACIONES_TRABAJADORES(
  DNI int(9) NOT NULL,
 codigo_obra int(11) NOT NULL,
 id_acto int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;	
	
--
-- Estructura de tabla para la tabla ACTUACIONES_COMENTARIOS
--


CREATE TABLE ACTUACIONES_COMENTARIOS(
 codigo_obra int(11) NOT NULL,
 id_acto int(11) NOT NULL,
 id_coment smallint(4) NOT NULL,
 login varchar(15) NOT NULL,
 fotos varchar(15) NOT NULL,
 descripcion text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;	



--
-- Índices para tablas volcadas
--
ALTER TABLE USUARIOS
 ADD PRIMARY KEY (login),
 ADD UNIQUE KEY DNI (DNI),
 ADD UNIQUE KEY email (email);

ALTER TABLE ROLES
 ADD PRIMARY KEY (id_rol),
 ADD UNIQUE KEY rol (rol);

ALTER TABLE ENTIDADES
 ADD PRIMARY KEY (id_entidad),
 ADD UNIQUE KEY entidad (entidad);
 
ALTER TABLE ACCIONES
 ADD PRIMARY KEY(id_accion),
 ADD UNIQUE KEY accion (accion);

ALTER TABLE PERMISOS
 ADD PRIMARY KEY (id_entidad,id_accion);

ALTER TABLE PERMISOS_ROLES
 ADD PRIMARY KEY (id_rol,id_entidad,id_accion);

ALTER TABLE PROVEEDORES
 ADD PRIMARY KEY (CIF);
  
ALTER TABLE OBRAS
 ADD PRIMARY KEY (codigo_obra);
  
ALTER TABLE AREAS
 ADD PRIMARY KEY (codigo_area);
 
ALTER TABLE ACTUACIONES
 ADD PRIMARY KEY (codigo_obra,id_acto);
  
ALTER TABLE TRABAJADORES
 ADD PRIMARY KEY (DNI);
  
ALTER TABLE ACTUACIONES_TRABAJADORES
 ADD PRIMARY KEY (DNI,codigo_obra,id_acto);
 
ALTER TABLE ACTUACIONES_COMENTARIOS
 ADD PRIMARY KEY (codigo_obra,id_acto,id_coment);
    
-- PK AI --

ALTER TABLE ROLES
 MODIFY id_rol int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ENTIDADES
 MODIFY id_entidad int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ACCIONES
 MODIFY id_accion int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ACTUACIONES
 MODIFY id_acto int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ACTUACIONES_COMENTARIOS
 MODIFY id_coment smallint(4) NOT NULL AUTO_INCREMENT;





--
-- INSERCIÓN DE ROLES 
--

INSERT INTO ROLES (id_rol, rol, descripcion) VALUES (1, 'admin', 'administrador total del sistema');
INSERT INTO ROLES (id_rol, rol, descripcion) VALUES (2, 'usuario', 'Cualquier usuario');
INSERT INTO ROLES (id_rol, rol, descripcion) VALUES (3, 'responsable', 'Responsable de aceptar las obras');
INSERT INTO ROLES (id_rol, rol, descripcion) VALUES (4, 'proveedor', 'responsable de una empresa');

-- INSERCION DE ENTIDATES --


INSERT INTO ENTIDADES (id_entidad, entidad, descripcion) VALUES (1, 'USUARIOS', 'gestion de usuarios');
INSERT INTO ENTIDADES (id_entidad, entidad, descripcion) VALUES (2, 'PERMISOS', 'gestion de permisos');
INSERT INTO ENTIDADES (id_entidad, entidad, descripcion) VALUES (3, 'ROLES', 'gestion de roles');
INSERT INTO ENTIDADES (id_entidad, entidad, descripcion) VALUES (4, 'ENTIDADES', 'gestion de ENTIDADES');
INSERT INTO ENTIDADES (id_entidad, entidad, descripcion) VALUES (5, 'ACCIONES', 'gestion de acciones');
INSERT INTO ENTIDADES (id_entidad, entidad, descripcion) VALUES (6, 'PROVEEDORES', 'gestion de proveedores');
INSERT INTO ENTIDADES (id_entidad, entidad, descripcion) VALUES (7, 'OBRAS', 'gestion de obras');
INSERT INTO ENTIDADES (id_entidad, entidad, descripcion) VALUES (8, 'ACTUACIONES', 'gestion de actuciones');

-- INSERCION DE ACCIONES --

INSERT INTO ACCIONES (id_accion, accion, descripcion) VALUES (1, 'ADD', 'funcion de añadir');
INSERT INTO ACCIONES (id_accion, accion, descripcion) VALUES (2, 'EDIT', 'funcion de editar');
INSERT INTO ACCIONES (id_accion, accion, descripcion) VALUES (3, 'DELETE', 'funcion de borrar');
INSERT INTO ACCIONES (id_accion, accion, descripcion) VALUES (4, 'SEARCH', 'funcion de buscar');
INSERT INTO ACCIONES (id_accion, accion, descripcion) VALUES (5, 'SHOWALL', 'Mostrar todos lso elementos e la entidad');
INSERT INTO ACCIONES (id_accion, accion, descripcion) VALUES (6, 'SHOWCURRENT', 'Mostrar elemento actual');

-- INSERCIÓN DE PERMISOS --

INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (1,1);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (1,2);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (1,3);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (1,4);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (1,5);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (1,6);

INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (2,1);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (2,2);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (2,3);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (2,4);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (2,5);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (2,6);

INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (3,1);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (3,2);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (3,3);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (3,4);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (3,5);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (3,6);


INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (4,1);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (4,3);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (4,5);

INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (5,1);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (5,3);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (5,5);

INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (6,1);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (6,2);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (6,3);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (6,4);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (6,5);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (6,6);

INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (7,1);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (7,2);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (7,3);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (7,4);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (7,5);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (7,6);

INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (8,1);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (8,2);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (8,3);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (8,4);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (8,5);
INSERT INTO PERMISOS (id_entidad, id_accion) VALUES (8,6);

--Permisos de admin--
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,1,1);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,1,2);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,1,3);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,1,4);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,1,5);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,1,6);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,2,1);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,2,2);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,2,3);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,2,4);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,2,5);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,2,6);

INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,3,1);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,3,2);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,3,3);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,3,4);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,3,5);


INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,4,1);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,4,3);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,4,5);

INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,5,1);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,5,3);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,5,5);


INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,6,1);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,6,2);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,6,3);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,6,4);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,6,5);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,6,6);

INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,7,1);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,7,2);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,7,3);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,7,4);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,7,5);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (1,7,6);

-- permisos de usuario --
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (2,1,5);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (2,1,6);

-- permisos de proveedor--
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (4,6,1);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (4,6,2);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (4,6,5);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (4,6,6);

INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (4,7,5);
INSERT INTO PERMISOS_ROLES (id_rol,id_entidad, id_accion) VALUES (4,7,6);

INSERT INTO USUARIOS (login, password, DNI, nombre, apellidos, email, id_rol) VALUES ('admin', 'password', '36165166N', 'admin', 'root', 'admin@uvigo.es', 1);

INSERT INTO AREAS (codigo_area,nombre,responsable) VALUES ('1','prueba','responsable');