-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.0.51b-community-nt-log - MySQL Community Edition (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2014-05-12 00:57:49
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table rosobe.hist_pass
DROP TABLE IF EXISTS `hist_pass`;
CREATE TABLE IF NOT EXISTS `hist_pass` (
  `id_pass` int(4) NOT NULL auto_increment,
  `id_usu` int(4) NOT NULL default '0',
  `old_pass` varchar(64) NOT NULL default '',
  `fecha` bigint(10) NOT NULL default '0',
  PRIMARY KEY  (`id_pass`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table rosobe.hist_pass: 3 rows
/*!40000 ALTER TABLE `hist_pass` DISABLE KEYS */;
INSERT INTO `hist_pass` (`id_pass`, `id_usu`, `old_pass`, `fecha`) VALUES
	(1, 5, '41fcba09f2bdcdf315ba4119dc7978dd', 1077018136),
	(2, 5, '670da91be64127c92faac35c8300e814', 1077018162),
	(3, 6, '41fcba09f2bdcdf315ba4119dc7978dd', 1077018433);
/*!40000 ALTER TABLE `hist_pass` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_categorias
DROP TABLE IF EXISTS `hits_categorias`;
CREATE TABLE IF NOT EXISTS `hits_categorias` (
  `idCategoria` int(10) NOT NULL auto_increment,
  `nombreCategoria` varchar(255) default '0',
  `pathCategoria` varchar(255) default '0',
  `uriCategoria` varchar(255) default '0',
  PRIMARY KEY  (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_categorias: ~25 rows (approximately)
/*!40000 ALTER TABLE `hits_categorias` DISABLE KEYS */;
INSERT INTO `hits_categorias` (`idCategoria`, `nombreCategoria`, `pathCategoria`, `uriCategoria`) VALUES
	(1, 'Mesas', '0', '0'),
	(2, 'Sillas', '0', '0'),
	(3, 'Puertas', '0', '0'),
	(4, 'Portones', '0', '0'),
	(5, 'Ventanas', '0', '0'),
	(6, 'precio', '0', '0'),
	(7, 'divino', '0', '0'),
	(8, 'maquina', '0', '0'),
	(9, 'catego', '0', '0'),
	(10, 'cate', '0', '0'),
	(11, 'cafaya', '0', '0'),
	(12, 'rioja', '0', '0'),
	(13, 'riojano', '0', '0'),
	(14, 'mendoza', '0', '0'),
	(15, 'morsa', '0', '0'),
	(16, 'asd aksdjh asdkajs dh', '0', 'asd-aksdjh-asdkajs-dh'),
	(17, 'mierasd asd h', '0', '0'),
	(18, 'asdaasdasdasd', '0', '0'),
	(19, 'asdasdasdasd', '0', '0'),
	(20, 'asdsad', '0', '0'),
	(21, 'asdasdasda', '0', '0'),
	(22, 'poedo', '0', '0'),
	(23, 'pedando', '0', '0'),
	(24, 'pedoasdk jasldka sjdlaskd j', '0', '0'),
	(25, 'Tableros', '0', '0');
/*!40000 ALTER TABLE `hits_categorias` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_categorias_productos
DROP TABLE IF EXISTS `hits_categorias_productos`;
CREATE TABLE IF NOT EXISTS `hits_categorias_productos` (
  `idCategoriaProducto` int(10) NOT NULL auto_increment,
  `idCategoria` int(10) default '0',
  `idProducto` int(10) default '0',
  PRIMARY KEY  (`idCategoriaProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_categorias_productos: 8 rows
/*!40000 ALTER TABLE `hits_categorias_productos` DISABLE KEYS */;
INSERT INTO `hits_categorias_productos` (`idCategoriaProducto`, `idCategoria`, `idProducto`) VALUES
	(4, 2, 1),
	(3, 1, 1),
	(5, 3, 1),
	(9, 2, 2),
	(8, 1, 2),
	(10, 1, 3),
	(11, 1, 4),
	(12, 12, 4);
/*!40000 ALTER TABLE `hits_categorias_productos` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_categorias_relaciones
DROP TABLE IF EXISTS `hits_categorias_relaciones`;
CREATE TABLE IF NOT EXISTS `hits_categorias_relaciones` (
  `idCategoriaRelacion` int(10) NOT NULL auto_increment,
  `idCategoria` int(10) default NULL,
  `idSubcategoria` int(10) default NULL,
  PRIMARY KEY  (`idCategoriaRelacion`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_categorias_relaciones: 2 rows
/*!40000 ALTER TABLE `hits_categorias_relaciones` DISABLE KEYS */;
INSERT INTO `hits_categorias_relaciones` (`idCategoriaRelacion`, `idCategoria`, `idSubcategoria`) VALUES
	(1, 1, 2),
	(2, 1, 3),
	(3, 13, 16);
/*!40000 ALTER TABLE `hits_categorias_relaciones` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_ecivil
DROP TABLE IF EXISTS `hits_ecivil`;
CREATE TABLE IF NOT EXISTS `hits_ecivil` (
  `idEcivil` int(10) NOT NULL auto_increment,
  `nombreEcivil` varchar(50) default '0',
  PRIMARY KEY  (`idEcivil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_ecivil: ~4 rows (approximately)
/*!40000 ALTER TABLE `hits_ecivil` DISABLE KEYS */;
INSERT INTO `hits_ecivil` (`idEcivil`, `nombreEcivil`) VALUES
	(1, 'Soltero/a'),
	(2, 'Casado/a'),
	(3, 'Divorciado/a'),
	(4, 'Viudo/a');
/*!40000 ALTER TABLE `hits_ecivil` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_excepciones
DROP TABLE IF EXISTS `hits_excepciones`;
CREATE TABLE IF NOT EXISTS `hits_excepciones` (
  `idExcepcion` int(10) NOT NULL default '0',
  `codigoExcepcion` int(10) NOT NULL default '0',
  `mensajeExcepcion` varchar(255) NOT NULL default '0',
  PRIMARY KEY  (`idExcepcion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_excepciones: 1 rows
/*!40000 ALTER TABLE `hits_excepciones` DISABLE KEYS */;
INSERT INTO `hits_excepciones` (`idExcepcion`, `codigoExcepcion`, `mensajeExcepcion`) VALUES
	(1, 1, 'Se cargo el re');
/*!40000 ALTER TABLE `hits_excepciones` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_galeria
DROP TABLE IF EXISTS `hits_galeria`;
CREATE TABLE IF NOT EXISTS `hits_galeria` (
  `idGaleria` int(10) NOT NULL auto_increment,
  `nombreGaleria` varchar(255) default '0',
  `pathGaleria` varchar(255) default '0',
  `thumbGaleria` varchar(255) default '0',
  `descripcionGaleria` text,
  `estadoGaleria` tinyint(4) default '0',
  PRIMARY KEY  (`idGaleria`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_galeria: 14 rows
/*!40000 ALTER TABLE `hits_galeria` DISABLE KEYS */;
INSERT INTO `hits_galeria` (`idGaleria`, `nombreGaleria`, `pathGaleria`, `thumbGaleria`, `descripcionGaleria`, `estadoGaleria`) VALUES
	(1, 'Mesa jardinera Quina', 'assets/themes/sigep/images/galeria/imagen1.jpg', 'assets/themes/sigep/images/galeria/imagen1_thumb.jpg', NULL, 1),
	(2, 'Gacebo', 'assets/themes/sigep/images/galeria/imagen2.jpg', 'assets/themes/sigep/images/galeria/imagen2_thumb.jpg', NULL, 1),
	(3, 'Nombre Producto', 'assets/themes/sigep/images/galeria/imagen3.jpg', 'assets/themes/sigep/images/galeria/imagen3_thumb.jpg', NULL, 1),
	(4, 'Producto 4', 'assets/themes/sigep/images/galeria/imagen4.jpg', 'assets/themes/sigep/images/galeria/imagen4_thumb.jpg', NULL, 1),
	(5, 'Producto 5', 'assets/themes/sigep/images/galeria/imagen5.jpg', 'assets/themes/sigep/images/galeria/imagen5_thumb.jpg', NULL, 1),
	(6, 'Producto 6', 'assets/themes/sigep/images/galeria/imagen6.jpg', 'assets/themes/sigep/images/galeria/imagen6_thumb.jpg', NULL, 1),
	(7, 'Producto 7', 'assets/themes/sigep/images/galeria/imagen7.jpg', 'assets/themes/sigep/images/galeria/imagen7_thumb.jpg', NULL, 1),
	(8, 'Producto 8', 'assets/themes/sigep/images/galeria/imagen8.jpg', 'assets/themes/sigep/images/galeria/imagen8_thumb.jpg', NULL, 1),
	(9, 'Producto 9', 'assets/themes/sigep/images/galeria/imagen9.jpg', 'assets/themes/sigep/images/galeria/imagen9_thumb.jpg', NULL, 1),
	(10, 'Producto 10', 'assets/themes/sigep/images/galeria/imagen10.jpg', 'assets/themes/sigep/images/galeria/imagen10_thumb.jpg', NULL, 1),
	(11, 'Producto 11', 'assets/themes/sigep/images/galeria/imagen11.jpg', 'assets/themes/sigep/images/galeria/imagen11_thumb.jpg', NULL, 1),
	(12, 'Producto 12', 'assets/themes/sigep/images/galeria/imagen12.jpg', 'assets/themes/sigep/images/galeria/imagen12_thumb.jpg', NULL, 1),
	(13, 'Producto 13', 'assets/themes/sigep/images/galeria/imagen13.jpg', 'assets/themes/sigep/images/galeria/imagen13_thumb.jpg', NULL, 1),
	(14, 'Producto 14', 'assets/themes/sigep/images/galeria/imagen14.jpg', 'assets/themes/sigep/images/galeria/imagen14_thumb.jpg', NULL, 1);
/*!40000 ALTER TABLE `hits_galeria` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_personas
DROP TABLE IF EXISTS `hits_personas`;
CREATE TABLE IF NOT EXISTS `hits_personas` (
  `idPersona` int(10) NOT NULL auto_increment,
  `dniPersona` int(10) default '0',
  `idTipoDni` int(10) default '0',
  `apellidoPersona` varchar(255) default '0',
  `nombrePersona` varchar(255) default '0',
  `cuilPersona` bigint(20) default '0',
  `cuitPersona` bigint(20) default '0',
  `nacimientoPersona` date default NULL,
  `idSexo` int(11) default NULL,
  `idEcivil` int(11) default NULL,
  `domicilioPersona` varchar(255) default NULL,
  `telefonoPersona` bigint(20) default NULL,
  `celularPersona` bigint(20) default NULL,
  `laboralPersona` bigint(20) unsigned default NULL,
  `internoPersona` int(10) unsigned default NULL,
  `emailPersona` varchar(100) default NULL,
  `nacionalidadPersona` varchar(255) default NULL,
  `idLocalidad` int(255) default NULL,
  `idDepartamento` int(255) default NULL,
  `idProvinicia` int(11) default NULL,
  `idPais` int(11) default NULL,
  PRIMARY KEY  (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_personas: ~111 rows (approximately)
/*!40000 ALTER TABLE `hits_personas` DISABLE KEYS */;
INSERT INTO `hits_personas` (`idPersona`, `dniPersona`, `idTipoDni`, `apellidoPersona`, `nombrePersona`, `cuilPersona`, `cuitPersona`, `nacimientoPersona`, `idSexo`, `idEcivil`, `domicilioPersona`, `telefonoPersona`, `celularPersona`, `laboralPersona`, `internoPersona`, `emailPersona`, `nacionalidadPersona`, `idLocalidad`, `idDepartamento`, `idProvinicia`, `idPais`) VALUES
	(1, 14708738, 1, 'ALFARO NUÑEZ', 'MARTA ESTELA', 12345678901, 0, '2013-10-18', 2, 1, 'av siempre viva 3454', 4290011, 155701465, 421812491, NULL, 'maximrios@gmail.com', '	Argentina	', NULL, NULL, NULL, NULL),
	(2, 1, 12712168, '2013-08-06', '20127121681', 0, 0, NULL, 2, 0, '	Avda. Reyes Católicos 1.617 Piso 6 Depto. "A"	Barrio Tres Cerritos	', 4394303, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(3, 13703799, 1, 'ALVAREZ', 'MARCOS ANTONIO', 2147483647, 0, '2013-10-18', 1, 1, '20 de Febrero Nº 146', 0, 0, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(4, 17056011, 1, 'ALZUETA', 'NELBA NOEMI', 2147483647, 0, '2013-09-24', 1, 1, 'J. B.Alberdi Nº 2525 Villa San Lorenzo', 4922061, 0, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(5, 13835597, 1, 'AMADO', 'SUSANA ANTONIA DEL VALLE', 2147483647, 0, '2013-10-21', 2, 1, 'Enrique Arana Nº 1867 Barrio El Periodista', 4242116, 0, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(6, 12959638, 1, 'ARE', 'YANET MONICA', 2147483647, 0, '2013-10-22', 2, 1, 'Junín Nº 32', 4320053, 0, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(7, 28260753, 1, 'ARZELAN', 'LUIS FERNANDO', 2147483647, 0, '2013-10-22', 1, 1, 'Corina Lona Nº 686 Portezuelo Sur', 4319448, 154810077, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(8, 20214369, 1, 'BARRIONUEVO', 'SANDRA MARISA', 2147483647, 0, '2013-10-22', 2, 1, 'Las Araucarias Nº 72 Barrio Tres Cerritos', 4391304, 0, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(9, 20858473, 1, 'BERMUDEZ', 'ARIEL HORACIO', 2147483647, 0, '2013-10-22', 1, 1, 'Juramento Nº 1240 Barrio Tres Cerritos', 0, 154526509, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(10, 25411314, 1, 'BERTINI DAUD', 'MARIA', 2147483647, 0, '2013-10-28', 2, 1, 'Gimenez Zapiola 1149 esq. Almafuerte Barrio Grand Bourg', 4360865, 154089985, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(11, 13054802, 1, 'BITTERLY', 'PATRICIA ARGENTINA', 2147483647, 0, '2013-10-22', 2, 1, 'Destructor Brown Nº 38 Rosario de Lerma', 4931376, 154592368, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(12, 17131064, 1, '	CAGGIANO	', '	LAURA	', 23171310644, 0, NULL, NULL, 1, '	Gral. Güemes Nº 832		', 4211751, 154138484, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(13, 14553609, 1, '	CALDERON	', '	ANTONIO LUIS	', 20145536090, 0, NULL, NULL, 2, '	Avda. Uruguay Nº 944		', 4210498, 154102492, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(14, 14488455, 1, '	CANAVES	', '	LEONOR PATRICIA	', 27144884553, 0, NULL, NULL, 2, '	Caseros 1217		', 4227352, 154141856, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(15, 17354322, 1, '	CARO OUTES	', '	MARIA DEL MILAGRO	', 27173543226, 0, NULL, NULL, 1, '	Rivadavia Nº 3355	Barrio Grand Bourg	', 4360556, 156053333, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(16, 12220036, 1, '	CARPIO DOMINI	', '	MARCELO	', 20122200362, 0, NULL, NULL, 2, '	Corrientes Nº 156		', 4233662, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(17, 16517318, 1, '	CARRASCO	', '	GERARDO HUMBERTO	', 20165173180, 0, NULL, NULL, 2, '	Rivadavia Nº 1277		', 4223014, 154440819, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(18, 14865157, 1, '	CASAS SARAVIA	', '	SONIA BEATRIZ	', 23148651574, 0, NULL, NULL, 2, '	M. Moreno Nº 1889	Barrio San José	', 4236404, 154122257, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(19, 16308394, 1, '	CATACATA	', '	GERMAN GABRIEL	', 23163083949, 0, NULL, NULL, 2, '	Block 27 - Piso 1 -  Dpto. D	Barrio La Rural	', 4960330, 154730630, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(20, 14176871, 1, '	CHINCHILLA	', '	LAURA ALCIRA	', 27141768714, 0, NULL, NULL, 1, '	Avda. Libertador Nº 3391	Barrio Grand Bourg	', 4360820, 154100943, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(21, 29334051, 1, '	CLAROS	', '	MARIA EUGENIA	', 27293340515, 0, NULL, NULL, 1, '	Pje.Basavilbazo 240		', 4317329, 154205977, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(22, 12712426, 1, '	CONDORI	', '	GABRIELA MAGDALENA	', 23127124264, 0, NULL, NULL, 1, '	Radio E. Santiago del Estero Block J Dpto 4	Barrio Ampliacion Intersindical	', 0, 154040856, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(23, 23902445, 1, '	CONTRERAS	', '	HECTOR MARIO	', 23239024459, 0, NULL, NULL, 2, '	Los Abetos Nº 350	Barrio Tres Cerritos	', 4397528, 154475612, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(24, 21979177, 1, '	CORIMAYO	', '	LUIS HUGO	', 20219791772, 0, NULL, NULL, 1, '	Pje. Cabra Corral 1569	Barrio Soliz Pizarro	', 4341837, 154795445, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(25, 10697056, 1, '	D AGATA	', '	MIRTA SUSANA	', 23106970564, 0, NULL, NULL, 2, '	Urquiza Nº 315		', 4213325, 156835255, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(26, 29499069, 1, '	DIAZ	', '	RAMON SERGIO	', 20294990691, 0, NULL, NULL, 1, '	Pje. Dr. Ortelli Nº 56		', 4316386, 154064490, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(27, 12958109, 1, '	ECHEVERRIA HODI	', '	OSCAR ALBERTO	', 20129581094, 0, NULL, NULL, 2, '	Necochea Nº 752		', 4214605, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(28, 21634948, 1, '	FERNANDEZ	', '	MARCELO ALEJANDRO	', 2147483647, 0, NULL, NULL, 2, ' Dr. F. Ameghino Nº 253 Dpto. B  ', 4225132, 154424664, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(29, 28633527, 1, '	FIGUEROA MOREY	', '	CAROLINA	', 27286335271, 0, NULL, NULL, 2, '	E.1 Mz I C. 20	Barrio Parque Gral. Belgrano	', 4254021, 156125944, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(30, 23316469, 1, '	FRANCH CARABAJAL	', '	CRISTIAN RAUL JESUS	', 20233164691, 0, NULL, NULL, 0, '	Los Avellanos Nº 379  Dpto. 9	Barrio Tres Cerritos	', 4395447, 155339263, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(31, 10582209, 1, '	GALVAN	', '	ALBERTO ARTURO	', 20105822090, 0, NULL, NULL, 2, '	Pje. 14 Casa 612	Barrio Santa Ana I	', 4291719, 154114749, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(32, 25064017, 1, '	GARCIA	', '	JULIANA CAROLINA	', 27250640175, 0, NULL, NULL, 1, '	F. de Gurruchaga Nº 69		', 4310658, 156050207, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(33, 8049170, 1, '	GARNICA	', '	VICTOR HUGO	', 20080491701, 0, NULL, NULL, 0, '	Gpo.234 Block C Dpto. 5 Piso 1	Barrio Castañares	', 4252440, 154072595, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(34, 13346646, 1, '	GAUFFIN	', '	MARCELO ENRIQUE	', 20133466461, 0, NULL, NULL, 0, '	Manz. C Casa 21	Barrio Parque General Belgrano	', 4250319, 156054746, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(35, 22119123, 1, '	GONZALEZ RODRIGUEZ	', '	ALFREDO EDUARDO	', 20221191235, 0, NULL, NULL, 2, '	Pje. 20 Casa 1302	Barrio Santa Ana I	', 0, 155821417, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(36, 30189802, 1, '	GUERRERO	', '	PAOLA SILVANA	', 27301898024, 0, NULL, NULL, 1, '	Emilia Wierna 1211	Barrio El Jardín	', 4280150, 155359725, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(37, 24614814, 1, '	GUTIERREZ 	', '	ARIEL	', 20246148148, 0, NULL, NULL, 1, '	Los Avellanos Nº 227	Barrio Tres Cerritos	', 4011759, 155208518, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(38, 33970074, 1, '	GÜIZZO LOPEZ	', '	MARIA JOSE	', 27339700740, 0, NULL, NULL, 1, '	Block G - Dpto. 48	Barrio Docente	', 4236804, 154743212, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(39, 6074508, 1, '	HERRERA	', '	ALFREDO ENRIQUE	', 27060745086, 0, NULL, NULL, 3, '	Manz. 529 "B" - Casa 19	Barrio El Huayco	', 0, 155025690, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(40, 6074508, 1, '	HERRERA	', '	HAHIDEE FORTUNATA	', 27060745086, 0, NULL, NULL, 2, '	Block. C Dpto. III Sect. 6 "G"	Barrio Castañares	', 4251859, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(41, 8180714, 1, '	HINOJOSA	', '	CESAR JAIME	', 20081807141, 0, NULL, NULL, 1, '	Diario de Cuyo Nº 2132	Barrio El Tribuno	', 4244158, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(42, 13414671, 1, '	ISASMENDI	', '	GRACIELA	', 27134146716, 0, NULL, NULL, 3, '	Los Quimiles Nº 75	Barrio Tres Cerritos	', 4392452, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(43, 11943382, 1, '	JORGE DIAZ	', '	LÍA CRISTINA	', 27119433822, 0, NULL, NULL, 2, '	Los Arces 499	Barrio Tres Cerritos	', 0, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(44, 25885821, 1, '	LASQUERA	', '	JOSE ALEJANDRO	', 20258858213, 0, NULL, NULL, 1, '	Agustin Magaldi 195	Barrio Santa Cecilia	', 4350991, 154250062, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(45, 14488086, 1, '	LEGUIZAMON	', '	ROGER WALTER	', 20144880863, 0, NULL, NULL, 2, '	Hermano Francisco S/Nº	Vaqueros	', 0, 154772537, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(46, 13347694, 1, '	LEONARDI MARTINEZ	', '	ANA EUGENIA	', 27133476945, 0, NULL, NULL, 3, '	Entre Ríos Nº 2027		', 4215936, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(47, 12959139, 1, '	LINARES	', '	SILVANA ANDREA	', 27129591396, 0, NULL, NULL, 2, '	San Luis Nº 1515		', 4315565, 154537001, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(48, 18038152, 1, '	LOPEZ DE LA MERCED	', '	MARCELO DANIEL	', 20180381520, 0, NULL, NULL, 2, '	Las Rosas Nº 230	Barrio Tres Cerritos	', 4395906, 154027179, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(49, 16659166, 1, '	LOPEZ LEONARDI	', '	CYNTHIA MARIA INES	', 27166591665, 0, NULL, NULL, 1, '	Block 13 Piso 1 Dpto. 4	Barrio Don Emilio	', 4271047, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(50, 10878020, 1, '	LOVAGLIO COLOMBRES	', '	ISABEL DEL ROSARIO	', 27108780202, 0, NULL, NULL, 2, '	G. Güemes Nº 2201 Torre C Piso 5 Dpto. B		', 4222932, 154553883, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(51, 33475859, 1, '	MARTINEZ	', '	ANA MARIA	', 27334758597, 0, NULL, NULL, 1, '	Gral. Güemes 1764	Barrio	', 0, 154074928, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(52, 2263748, 1, 'MARTINEZ', 'VICTOR RAMIRO', 202263748, 0, '1972-06-16', 1, 1, 'Manz.530', 0, 154025219, 4316952, NULL, 'vrmartinez.sigep@salta.gov.ar', '	Argentina	', NULL, NULL, NULL, NULL),
	(53, 11943331, 1, '	MEDINA	', '	ANTONIO	', 20119433313, 0, NULL, NULL, 0, '	Inca Huasi esq. Nevado de Acay	San Luis	', 4262418, 154141720, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(54, 12553901, 1, '	MEDINA	', '	RAUL HUGO	', 20125539018, 0, NULL, NULL, 2, '	Manz. 54 Casa 2	Barrio San Carlos	', 4247275, 154138693, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(55, 16307328, 1, '	MORENO TEN	', '	MARCELO OSCAR	', 20163073286, 0, NULL, NULL, 2, '	Los Júncaros Nº 252	Barrio Tres Cerritos	', 4398614, 154206902, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(56, 31767945, 1, '	MURILLO	', '	DANIEL ALEJANDRO	', 23317679459, 0, NULL, NULL, 1, '	O Higgins 1836	Barrio 20 de Febrero	', 4315745, 155106000, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(57, 14303235, 1, '	NIEVA	', '	DORA ISABEL DEL CARMEN	', 27143032359, 0, NULL, NULL, 1, '	Arenales 2943		', 4361514, 154070004, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(58, 30466740, 1, '	NIKOVITCH	', '	MATIAS FEDERICO	', 20304667401, 0, NULL, NULL, 2, '	España Nº 1081		', 4214111, 154844696, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(59, 13054901, 1, '	ORTIZ	', '	NILDA ALICIA	', 27130549018, 0, NULL, NULL, 2, '	Alberto Mendieta Nº 3977	Barro El Periodista	', 4241229, 155010739, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(60, 20232846, 1, '	PEREZ ALFARO	', '	MARIA ELENA	', 27202328461, 0, NULL, NULL, 2, '	Los Timboes 699	Barrio Tres Cerritos	', 4397664, 154181957, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(61, 12712609, 1, '	PEREZ OSAN	', '	VICENTE FELIX	', 20127126098, 0, NULL, NULL, 2, '	España Nº 2120	Villa San Lorenzo	', 4921992, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(62, 23584977, 1, '	RADICE	', '	MARIA VIRGINIA	', 27235849777, 0, NULL, NULL, 2, '	Los Arces 61	Barrio Tres Cerritos	', 4391776, 155497405, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(63, 32165101, 1, '	RAMADAN	', '	TANIA ESTEFANIA	', 27321651017, 0, NULL, NULL, 1, '	Miguel de Cervantes 851	Barrio Grand Bourg	', 4360705, 155897767, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(64, 32505371, 1, 'RIOS', 'MAXIMILIANO EZEQUIEL', 20325053713, 0, '1987-02-05', 1, 1, 'Mz. R Casa 7 Barrio Santa Ana III', 4290011, 155701465, 0, NULL, 'maximrios@gmail.com', '	Argentina	', NULL, NULL, NULL, NULL),
	(65, 8177246, 1, '	ROCHA	', '	JORGE MIGUEL	', 20081772461, 0, NULL, NULL, 0, '	Gral. Paz 470		', 0, 154066342, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(66, 13318087, 1, '	ROJAS	', '	ILDA ELIZABETH	', 27133180872, 0, NULL, NULL, 2, '	Reyes Católicos Nº 1617 6to A	Barrio Tres Cerritos	', 4394304, 154027902, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(67, 10993710, 1, '	ROMAGNOLI	', '	PEDRO JOSE VALENTIN	', 20109937100, 0, NULL, NULL, 0, '	Avda. Belgrano Nº 1607		', 4210015, 156839820, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(68, 13977060, 1, 'RUIZ', 'ESTEBAN ROBERTO', 2147483647, 0, '2013-09-20', 1, 1, 'Rafael Obligado Nº 58 Barrio San José', 4340106, 154206602, 0, NULL, 'esteban@hotmail.com', '	Argentina	', NULL, NULL, NULL, NULL),
	(69, 25800923, 1, '	SAHA	', '	VIRGINIA LORENA	', 27258009237, 0, NULL, NULL, 2, '	Mz. 555 "B" - Casa 12	Barrio Univesidad Católica	', 0, 154674159, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(70, 30344640, 1, '	SALAS	', '	TERESA GABRIELA	', 27303446406, 0, NULL, NULL, 0, '	Los Cardones 50	Tres Cerritos	', 4398318, 155112906, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(71, 22468122, 1, '	SANCHEZ CALVELO	', '	PABLO CRISTIAN	', 20224681225, 0, NULL, NULL, 1, '	Corina Lona Nº 771		', 4318822, 154466881, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(72, 17131367, 1, '	SANCHEZ ALESANCO	', '	GUSTAVO ALFONSO	', 20171313679, 0, NULL, NULL, 0, '	Las Tuscas Nº 1187	Vaqueros	', 0, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(73, 14061950, 1, '	SANCHO	', '	GUSTAVO OSVALDO	', 20140619508, 0, NULL, NULL, 3, '	Juan B. Justo 2201	Barrio Tres Cerritos	', 4218798, 0, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(74, 6673407, 1, '	SANTILLAN	', '	DELIA ROSA	', 27066734078, 0, NULL, NULL, 2, '	Hipólito Yrigoyen Nº 1165		', 4283324, 154400607, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(75, 32510298, 1, '	TEJERINA	', '	ADOLFO JESUS	', 20325102986, 0, NULL, NULL, 0, '	Block B2 2º Piso Dpto. B 	Barrio Bancario	', 4241291, 155007268, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(76, 18019380, 1, '	TORFE	', '	PATRICIA DEL VALLE	', 23180193801, 0, NULL, NULL, 2, '	Los Aguaribayes Nº 353	Barrio Tres Cerritos	', 4395408, 154038634, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(77, 16128298, 1, '	TORRES	', '	MILTON ROLANDO	', 20161282988, 0, NULL, NULL, 1, '	Pje. 20 Casa 1911	Barrio Santa Ana I	', 4290402, 154033770, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(78, 11282200, 1, '	URZAGASTI ARANDA	', '	RICARDO ALBERTO	', 20112822004, 0, NULL, NULL, 2, '	Apolinario Saravia Nº 231 P. Baja Dpto. I		', 4223613, 154659620, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(79, 12553188, 1, '	VELEIZAN	', '	GERARDO CARLOS	', 20125531882, 0, NULL, NULL, 2, '	Ruta 51 Km 3 1/2	Estacion Alvarado	', 0, 154481686, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(80, 0, 1, 'VILLADA', 'ADRIANA ESTELA', 0, 0, '2013-09-24', 2, 1, 'av siempre viva 345', 0, 0, 0, NULL, '', '	Argentina	', NULL, NULL, NULL, NULL),
	(81, 20210543, 1, '	VILLAFAÑE	', '	SONIA ALEJANDRA	', 27202105438, 0, NULL, NULL, 0, '	Block 35 P. Baja Dpto. 4	Barrio Limache	', 4247278, 155119823, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(82, 12409398, 1, '	VILLAR	', '	GUSTAVO RAMON	', 20124093989, 0, NULL, NULL, 2, '	Avda. Belgrano Nº 2070 - 2do. Grupo - 1ro. A		', 4215745, 154847900, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(83, 17354725, 1, '	YAPURA CALDEZ	', '	DORA FATIMA DEL VALLE	', 27173547256, 0, NULL, NULL, 3, '	Vicente López Nº 1635		', 4393126, 154811423, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(84, 16887676, 1, '	ZARATE	', '	OSCAR ALFREDO	', 23168876769, 0, NULL, NULL, 1, '	Aniceto Latorre Nº 1817		', 4316409, 154794485, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(85, 12959019, 1, '	ZUÑIGA	', '	MARINA PATRICIA	', 27129590195, 0, '2013-09-19', NULL, 3, '	Los Tilos 293 Bº T. Cerritos	Barrio Tres Cerritos	', 4392369, 154060018, NULL, NULL, NULL, '	Argentina	', NULL, NULL, NULL, NULL),
	(86, 11111111, 1, 'reprueba', 'prueba', 2147483647, 0, '2013-10-22', 1, 1, 'av siempre viva 345', 4290011, 154121077, 4218128, NULL, 'maximrios@gmail.com', NULL, NULL, NULL, NULL, NULL),
	(88, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(89, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(90, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(91, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(92, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(93, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(94, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(95, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(96, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(97, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(98, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(99, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(100, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(101, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(102, 0, 0, 'CARDOZO', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(103, 22222222, 0, 'CARDOZO', 'CAROLINA', 2147483647, 0, '1975-07-16', 2, 1, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(104, 23232323, 1, 'RAMIREZ', 'MATIAS', 2147483647, 0, '0000-00-00', 2, 1, 'AV SIEMPRE VIVA 123', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(105, 12345678, 0, 'CALABRO', 'MARINA', 2147483647, 0, '1975-07-16', 2, 1, 'AV SIEMPRE VIVA 123', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(106, 0, 0, '', '', 0, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(107, 22222222, 0, 'CARDOZO', 'CAROLINA', 2147483647, 0, '1975-07-16', 1, 1, 'AV SIEMPRE VIVA 123', 4290011, 154121077, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(108, 33333333, 0, 'CESAR', 'JULIO', 2147483647, 0, '1975-07-16', 1, 1, 'AV SIEMPRE VIVA 123', 4290011, 154121077, 213123123, NULL, 'maximrios@gmail.com', NULL, NULL, NULL, NULL, NULL),
	(109, 12345678, 0, 'CARDOZO', 'CAROLINA', 2147483647, 0, '1975-07-16', 1, 1, 'AV SIEMPRE VIVA 123', 4290011, 154121077, 213123123, NULL, 'maximrios@gmail.com', NULL, NULL, NULL, NULL, NULL),
	(110, 22222222, 0, 'CARDOZO', 'CAROLINA', 2147483647, 0, '1975-07-16', 1, 1, 'AV SIEMPRE VIVA 123', 4290011, 154121077, 213123123, NULL, 'maximrios@gmail.com', NULL, NULL, NULL, NULL, NULL),
	(111, 33333333, 0, 'CARDOZO', 'CAROLINA', 2147483647, 0, '1975-07-16', 1, 1, 'AV SIEMPRE VIVA 123', 4290011, 154121077, 0, NULL, 'maximrios@gmail.com', NULL, NULL, NULL, NULL, NULL),
	(112, 99909990, 1, 'DESIMA', 'FACUNDO JAVIER', 2147483647, 0, '0000-00-00', 1, 1, 'av san martin 564', 4212121, 155165165, 23332333, NULL, 'facundo_desima@hotmail.com', NULL, NULL, NULL, NULL, NULL),
	(113, 33536661, 1, 'QUIROGA', 'ROMINA', 2033536661, 0, '0000-00-00', 2, 1, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(114, 12121212, 1, 'Reyes', 'Maximiliano', 2147483647, 0, '0000-00-00', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(115, 91919191, 1, 'Llatsen', 'Lina', 20123456782, 0, '0000-00-00', 2, 1, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(116, 10101010, 1, 'Laime', 'Ezequiel', 20101010103, 0, '2013-12-09', 1, 1, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(117, 0, 1, 'Richardson', 'Maximiliano', 0, 0, '2014-01-06', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL),
	(118, 0, 1, 'Peterson', 'Maximiliano', 0, 0, '2014-01-06', 0, 0, '', 0, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `hits_personas` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_productos
DROP TABLE IF EXISTS `hits_productos`;
CREATE TABLE IF NOT EXISTS `hits_productos` (
  `idProducto` int(10) NOT NULL auto_increment,
  `nombreProducto` varchar(255) NOT NULL default '0',
  `codigoProducto` varchar(255) NOT NULL default '0',
  `precioProducto` decimal(10,2) NOT NULL default '0.00',
  `descripcionProducto` varchar(255) NOT NULL default '0',
  `uriProducto` varchar(255) default NULL,
  `publicadoProducto` tinyint(4) default NULL,
  `estadoProducto` tinyint(4) default NULL,
  PRIMARY KEY  (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_productos: ~4 rows (approximately)
/*!40000 ALTER TABLE `hits_productos` DISABLE KEYS */;
INSERT INTO `hits_productos` (`idProducto`, `nombreProducto`, `codigoProducto`, `precioProducto`, `descripcionProducto`, `uriProducto`, `publicadoProducto`, `estadoProducto`) VALUES
	(1, 'SILLA DE JARDIN', '0', 0.00, 'Esta silla de jardin esta compuesta de madera obtenida de los palos borrachos que estan en en los bosques de canada', 'silla-de-jardin', NULL, NULL),
	(2, 'SILLONES PARA DESCANSO', '0', 0.00, 'Con un aspecto diferente a los sillones de jardines comunes, estos sillones estan destinados a jardines amplios aportando al espacio algo delicado y de muy buena calidad.', 'sillones-para-descanso-de-jardineria', NULL, NULL),
	(3, 'MESA PARA COCINA', '0', 0.00, 'Esta mesa esta diseñada para un hermoso quincho en donde se puede compartir con la familia o amigos.', 'mesa-para-cocina', NULL, NULL),
	(4, 'MESA COMEDOR', '0', 0.00, 'La asdkaj sdlaksdj wqoi hdskfjhs dfkjsdfh iweu ksdjh sdifsdfsjdfhkifh sdijfh sdkfjhwifj hsdkfhsdf ksdjfhsd fshdf ksdfh ksdjfh fs dfk sdfhksdjfhs kdfjhsdfksjdfhksdfj', 'mesa-comedor', NULL, NULL);
/*!40000 ALTER TABLE `hits_productos` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_productos_imagenes
DROP TABLE IF EXISTS `hits_productos_imagenes`;
CREATE TABLE IF NOT EXISTS `hits_productos_imagenes` (
  `idProductoImagen` int(10) NOT NULL auto_increment,
  `idProducto` int(10) default NULL,
  `pathProductoImagen` varchar(255) default NULL,
  `thumbProductoImagen` varchar(255) default NULL,
  `detailProductoImagen` varchar(255) default NULL,
  `thumbdetailProductoImagen` varchar(255) default NULL,
  `checkProductoImagen` tinyint(1) default NULL,
  PRIMARY KEY  (`idProductoImagen`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_productos_imagenes: 12 rows
/*!40000 ALTER TABLE `hits_productos_imagenes` DISABLE KEYS */;
INSERT INTO `hits_productos_imagenes` (`idProductoImagen`, `idProducto`, `pathProductoImagen`, `thumbProductoImagen`, `detailProductoImagen`, `thumbdetailProductoImagen`, `checkProductoImagen`) VALUES
	(1, 1, 'assets/images/productos/imagen1.jpg', 'assets/images/productos/imagen1_thumb.jpg', 'assets/images/productos/imagen1_detail.jpg', 'assets/images/productos/imagen1_thumb_detail.jpg', 1),
	(10, 4, 'assets/images/productos/imagen8.jpg', 'assets/images/productos/imagen8_thumb.jpg', 'assets/images/productos/imagen8_detail.jpg', 'assets/images/productos/imagen8_thumb_detail.jpg', NULL),
	(11, 4, 'assets/images/productos/imagen101.jpg', 'assets/images/productos/imagen101_thumb.jpg', 'assets/images/productos/imagen101_detail.jpg', 'assets/images/productos/imagen101_thumb_detail.jpg', NULL),
	(3, 2, 'assets/images/productos/imagen3.jpg', 'assets/images/productos/imagen3_thumb.jpg', 'assets/images/productos/imagen3_detail.jpg', 'assets/images/productos/imagen3_thumb_detail.jpg', 1),
	(4, 2, 'assets/images/productos/imagen4.jpg', 'assets/images/productos/imagen4_thumb.jpg', 'assets/images/productos/imagen4_detail.jpg', 'assets/images/productos/imagen4_thumb_detail.jpg', NULL),
	(5, 2, 'assets/images/productos/imagen10.jpg', 'assets/images/productos/imagen10_thumb.jpg', 'assets/images/productos/imagen10_detail.jpg', 'assets/images/productos/imagen10_thumb_detail.jpg', NULL),
	(6, 3, 'assets/images/productos/imagen6.jpg', 'assets/images/productos/imagen6_thumb.jpg', 'assets/images/productos/imagen6_detail.jpg', 'assets/images/productos/imagen6_thumb_detail.jpg', 1),
	(7, 3, 'assets/images/productos/imagen9.jpg', 'assets/images/productos/imagen9_thumb.jpg', 'assets/images/productos/imagen9_detail.jpg', 'assets/images/productos/imagen9_thumb_detail.jpg', NULL),
	(8, 3, 'assets/images/productos/imagen11.jpg', 'assets/images/productos/imagen11_thumb.jpg', 'assets/images/productos/imagen11_detail.jpg', 'assets/images/productos/imagen11_thumb_detail.jpg', NULL),
	(9, 3, 'assets/images/productos/imagen12.jpg', 'assets/images/productos/imagen12_thumb.jpg', 'assets/images/productos/imagen12_detail.jpg', 'assets/images/productos/imagen12_thumb_detail.jpg', NULL),
	(12, 4, 'assets/images/productos/imagen13.jpg', 'assets/images/productos/imagen13_thumb.jpg', 'assets/images/productos/imagen13_detail.jpg', 'assets/images/productos/imagen13_thumb_detail.jpg', 1),
	(13, 4, 'assets/images/productos/imagen14.jpg', 'assets/images/productos/imagen14_thumb.jpg', 'assets/images/productos/imagen14_detail.jpg', 'assets/images/productos/imagen14_thumb_detail.jpg', NULL);
/*!40000 ALTER TABLE `hits_productos_imagenes` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_sessions
DROP TABLE IF EXISTS `hits_sessions`;
CREATE TABLE IF NOT EXISTS `hits_sessions` (
  `session_id` varchar(255) NOT NULL default '',
  `ip_address` varchar(255) default NULL,
  `user_agent` varchar(255) default NULL,
  `last_activity` int(11) default NULL,
  `user_data` text,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_sessions: 2 rows
/*!40000 ALTER TABLE `hits_sessions` DISABLE KEYS */;
INSERT INTO `hits_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
	('688df323744d97de6281f1c02c2a3800', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0', 1399863213, 'a:2:{s:9:"user_data";s:0:"";s:12:"antibotLlave";a:1:{i:0;s:32:"frm139986321388frmcaa89215e67b35";}}'),
	('a4949b17aa3129d050b0fb91a1e98949', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0 FirePHP/0.7.4', 1399866002, 'a:4:{s:9:"user_data";s:0:"";s:15:"Lib_Aut_Usuario";a:8:{s:9:"idUsuario";s:1:"1";s:5:"idRol";s:1:"1";s:9:"idPersona";s:2:"64";s:10:"dniPersona";s:8:"32505371";s:13:"nombreUsuario";s:5:"maxim";s:18:"ultimoLoginUsuario";s:19:"2014-04-02 17:14:13";s:13:"nombrePersona";s:20:"MAXIMILIANO EZEQUIEL";s:15:"apellidoPersona";s:4:"RIOS";}s:18:"Lib_Aut_boLogueado";b:1;s:12:"antibotLlave";a:5:{i:0;s:32:"frm139986584372frmafa299a4d1d8c5";i:1;s:32:"frm139986601265frmbd3ef5c19067fe";i:2;s:32:"frm139986604103frmda0b566359c386";i:3;s:32:"frm139986606743frm2297607a5db857";i:4;s:32:"frm139986622774frm64b3ec1fdfacea";}}');
/*!40000 ALTER TABLE `hits_sessions` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_slider
DROP TABLE IF EXISTS `hits_slider`;
CREATE TABLE IF NOT EXISTS `hits_slider` (
  `idSlider` int(10) NOT NULL auto_increment,
  `tituloSlider` varchar(50) default NULL,
  `pathSlider` varchar(255) default NULL,
  `mimeSlider` varchar(50) default NULL,
  `linkSlider` varchar(255) default NULL,
  `targetSlider` varchar(50) default NULL,
  `vigenciaDesde` date default NULL,
  `vigenciaHasta` date default NULL,
  `activoSlider` tinyint(4) default NULL,
  PRIMARY KEY  (`idSlider`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_slider: ~3 rows (approximately)
/*!40000 ALTER TABLE `hits_slider` DISABLE KEYS */;
INSERT INTO `hits_slider` (`idSlider`, `tituloSlider`, `pathSlider`, `mimeSlider`, `linkSlider`, `targetSlider`, `vigenciaDesde`, `vigenciaHasta`, `activoSlider`) VALUES
	(1, 'Slider 1 cargado', 'assets/images/slider/city-q-c-922-330-5.jpg', NULL, 'http://www.google.com.ar', '_blank', '2014-03-21', '2014-12-12', 1),
	(2, 'Slider 2 cargado', 'assets/images/slider/fashion-q-c-922-330-10.jpg', NULL, 'http://www.mejorando.la/cursos', '_blank', '2014-03-21', '2014-12-12', 1),
	(3, 'Slider 3 cargado', 'assets/images/slider/nature-q-c-922-330-5.jpg', NULL, '', '_blank', '2014-03-21', '2014-12-12', 1);
/*!40000 ALTER TABLE `hits_slider` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_usuarios
DROP TABLE IF EXISTS `hits_usuarios`;
CREATE TABLE IF NOT EXISTS `hits_usuarios` (
  `idUsuario` int(10) NOT NULL auto_increment,
  `nombreUsuario` varchar(50) default NULL,
  `passwordUsuario` varchar(50) default NULL,
  `idPersona` int(10) default NULL,
  `idRol` int(10) default NULL,
  `idEstado` int(10) default NULL,
  `intentosUsuario` int(10) NOT NULL default '0',
  `ultimoLoginUsuario` datetime NOT NULL,
  PRIMARY KEY  (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_usuarios: ~4 rows (approximately)
/*!40000 ALTER TABLE `hits_usuarios` DISABLE KEYS */;
INSERT INTO `hits_usuarios` (`idUsuario`, `nombreUsuario`, `passwordUsuario`, `idPersona`, `idRol`, `idEstado`, `intentosUsuario`, `ultimoLoginUsuario`) VALUES
	(1, 'maxim', '3124d38d1725b3e54f157d1a3d2c6739', 64, 1, 1, 0, '2014-04-02 17:14:13'),
	(2, 'alfaro', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 3, 1, 0, '2013-11-12 09:57:49'),
	(3, 'marcelo', '3124d38d1725b3e54f157d1a3d2c6739', 3, 5, 1, 0, '2013-11-22 08:59:26'),
	(4, 'rrhh', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `hits_usuarios` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_usuarios_auditar
DROP TABLE IF EXISTS `hits_usuarios_auditar`;
CREATE TABLE IF NOT EXISTS `hits_usuarios_auditar` (
  `idAuditar` int(10) NOT NULL auto_increment,
  `idUsuario` int(10) default NULL,
  `fechaAuditar` datetime default NULL,
  `ipAuditar` varchar(50) default NULL,
  `exitoAuditar` tinyint(4) default NULL,
  PRIMARY KEY  (`idAuditar`)
) ENGINE=MyISAM AUTO_INCREMENT=572 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_usuarios_auditar: 571 rows
/*!40000 ALTER TABLE `hits_usuarios_auditar` DISABLE KEYS */;
INSERT INTO `hits_usuarios_auditar` (`idAuditar`, `idUsuario`, `fechaAuditar`, `ipAuditar`, `exitoAuditar`) VALUES
	(1, 1, '2013-08-30 13:10:47', '123213123', 0),
	(2, 1, '2013-08-30 13:16:24', '127.0.0.1', 1),
	(3, 1, '2013-08-30 13:41:11', '127.0.0.1', 1),
	(4, 1, '2013-08-30 13:50:45', '127.0.0.1', 0),
	(5, 1, '2013-08-30 13:53:25', '127.0.0.1', 0),
	(6, 1, '2013-09-02 08:21:59', '127.0.0.1', 0),
	(7, 1, '2013-09-02 08:27:00', '127.0.0.1', 0),
	(8, 1, '2013-09-02 08:27:17', '127.0.0.1', 0),
	(9, 1, '2013-09-02 08:42:03', '127.0.0.1', 0),
	(10, 1, '2013-09-02 08:44:09', '127.0.0.1', 0),
	(11, 1, '2013-09-02 08:45:08', '127.0.0.1', 0),
	(12, 1, '2013-09-02 08:49:10', '127.0.0.1', 0),
	(13, 1, '2013-09-02 08:50:26', '127.0.0.1', 0),
	(14, 1, '2013-09-02 08:51:19', '127.0.0.1', 0),
	(15, 1, '2013-09-02 08:55:39', '127.0.0.1', 0),
	(16, 1, '2013-09-02 08:56:15', '127.0.0.1', 0),
	(17, 1, '2013-09-02 08:56:51', '127.0.0.1', 0),
	(18, 1, '2013-09-02 09:05:01', '127.0.0.1', 0),
	(19, 1, '2013-09-02 09:07:28', '127.0.0.1', 0),
	(20, 1, '2013-09-02 09:33:10', '127.0.0.1', 0),
	(21, 1, '2013-09-02 09:33:33', '127.0.0.1', 0),
	(22, 1, '2013-09-02 09:44:27', '127.0.0.1', 0),
	(23, 1, '2013-09-02 10:03:39', '127.0.0.1', 0),
	(24, 1, '2013-09-02 10:04:32', '127.0.0.1', 0),
	(25, 1, '2013-09-02 10:04:43', '127.0.0.1', 0),
	(26, 1, '2013-09-02 10:04:55', '127.0.0.1', 0),
	(27, 1, '2013-09-02 10:05:09', NULL, 0),
	(28, 1, '2013-09-02 10:05:23', NULL, 0),
	(29, 1, '2013-09-02 10:06:03', NULL, 0),
	(30, 1, '2013-09-02 10:06:42', '127.0.0.1', 1),
	(31, 1, '2013-09-02 10:32:31', '127.0.0.1', 1),
	(32, 1, '2013-09-02 10:32:40', '127.0.0.1', 1),
	(33, 1, '2013-09-02 10:34:10', '127.0.0.1', 1),
	(34, 1, '2013-09-02 10:37:52', '127.0.0.1', 1),
	(35, 1, '2013-09-02 10:44:05', '127.0.0.1', 1),
	(36, 1, '2013-09-02 10:46:54', '127.0.0.1', 1),
	(37, 1, '2013-09-02 12:20:15', '127.0.0.1', 1),
	(38, 1, '2013-09-02 12:20:59', '127.0.0.1', 1),
	(39, 1, '2013-09-02 12:25:57', '127.0.0.1', 1),
	(40, 1, '2013-09-02 12:28:39', '127.0.0.1', 1),
	(41, 1, '2013-09-02 12:34:10', '127.0.0.1', 1),
	(42, 1, '2013-09-02 12:38:51', '127.0.0.1', 1),
	(43, 1, '2013-09-02 12:45:53', '127.0.0.1', 1),
	(44, 1, '2013-09-02 12:54:06', '127.0.0.1', 1),
	(45, 1, '2013-09-02 13:16:54', '127.0.0.1', 1),
	(46, 1, '2013-09-02 13:18:39', '127.0.0.1', 0),
	(47, 1, '2013-09-02 13:36:59', '127.0.0.1', 1),
	(48, 1, '2013-09-02 13:44:26', '127.0.0.1', 1),
	(49, 1, '2013-09-03 08:33:56', '127.0.0.1', 1),
	(50, 1, '2013-09-03 08:34:48', '127.0.0.1', 1),
	(51, 1, '2013-09-03 08:46:08', '127.0.0.1', 1),
	(52, 1, '2013-09-03 09:10:04', '127.0.0.1', 1),
	(53, 1, '2013-09-03 11:30:48', '127.0.0.1', 1),
	(54, 1, '2013-09-03 11:40:54', '127.0.0.1', 1),
	(55, 1, '2013-09-03 11:41:04', '127.0.0.1', 1),
	(56, 1, '2013-09-03 11:41:19', '127.0.0.1', 1),
	(57, 1, '2013-09-03 11:42:06', '127.0.0.1', 1),
	(58, 1, '2013-09-03 11:43:28', '127.0.0.1', 1),
	(59, 1, '2013-09-04 09:08:09', '127.0.0.1', 1),
	(60, 1, '2013-09-04 09:41:26', '127.0.0.1', 1),
	(61, 1, '2013-09-04 10:00:34', '127.0.0.1', 1),
	(62, 1, '2013-09-04 13:45:19', '127.0.0.1', 1),
	(63, 1, '2013-09-05 08:08:58', '127.0.0.1', 1),
	(64, 1, '2013-09-05 08:45:53', '127.0.0.1', 1),
	(65, 1, '2013-09-05 09:13:41', '127.0.0.1', 1),
	(66, 1, '2013-09-05 09:41:39', '127.0.0.1', 1),
	(67, 1, '2013-09-05 09:43:00', '127.0.0.1', 1),
	(68, 1, '2013-09-05 09:43:45', '127.0.0.1', 1),
	(69, 1, '2013-09-09 10:57:55', '127.0.0.1', 0),
	(70, 1, '2013-09-09 10:58:13', '127.0.0.1', 1),
	(71, 1, '2013-09-09 11:04:43', '127.0.0.1', 1),
	(72, 1, '2013-09-09 11:04:58', '127.0.0.1', 1),
	(73, 1, '2013-09-10 09:56:20', '127.0.0.1', 1),
	(74, 1, '2013-09-10 10:39:16', '127.0.0.1', 1),
	(75, 1, '2013-09-10 11:08:03', '127.0.0.1', 1),
	(76, 1, '2013-09-10 11:09:34', '127.0.0.1', 1),
	(77, 1, '2013-09-10 11:11:00', '127.0.0.1', 1),
	(78, 1, '2013-09-10 11:13:57', '127.0.0.1', 1),
	(79, 1, '2013-09-10 11:15:11', '127.0.0.1', 1),
	(80, 1, '2013-09-10 11:16:53', '127.0.0.1', 1),
	(81, 1, '2013-09-10 11:35:19', '127.0.0.1', 1),
	(82, 1, '2013-09-10 12:05:32', '127.0.0.1', 1),
	(83, 1, '2013-09-11 08:32:18', '127.0.0.1', 1),
	(84, 1, '2013-09-11 08:49:34', '127.0.0.1', 1),
	(85, 1, '2013-09-11 10:12:14', '127.0.0.1', 1),
	(86, 1, '2013-09-11 10:56:11', '127.0.0.1', 1),
	(87, 1, '2013-09-11 11:04:25', '127.0.0.1', 1),
	(88, 1, '2013-09-11 11:12:21', '127.0.0.1', 1),
	(89, 1, '2013-09-12 08:37:59', '127.0.0.1', 1),
	(90, 1, '2013-09-12 10:12:07', '127.0.0.1', 1),
	(91, 1, '2013-09-12 10:13:48', '127.0.0.1', 1),
	(92, 1, '2013-09-12 10:41:55', '127.0.0.1', 1),
	(93, 1, '2013-09-16 08:34:03', '127.0.0.1', 1),
	(94, 1, '2013-09-16 08:53:19', '127.0.0.1', 1),
	(95, 1, '2013-09-18 10:09:06', '127.0.0.1', 1),
	(96, 1, '2013-09-18 10:36:55', '127.0.0.1', 1),
	(97, 1, '2013-09-18 11:59:48', '127.0.0.1', 1),
	(98, 1, '2013-09-18 12:42:43', '127.0.0.1', 1),
	(99, 1, '2013-09-18 14:07:29', '127.0.0.1', 1),
	(100, 1, '2013-09-19 08:48:02', '127.0.0.1', 0),
	(101, 1, '2013-09-19 08:48:18', '127.0.0.1', 0),
	(102, 1, '2013-09-19 08:49:39', '127.0.0.1', 1),
	(103, 1, '2013-09-19 09:11:11', '127.0.0.1', 1),
	(104, 1, '2013-09-19 09:12:14', '127.0.0.1', 1),
	(105, 1, '2013-09-19 09:12:56', '127.0.0.1', 1),
	(106, 1, '2013-09-19 09:18:55', '127.0.0.1', 1),
	(107, 1, '2013-09-20 08:34:30', '127.0.0.1', 1),
	(108, 1, '2013-09-20 08:56:10', '127.0.0.1', 1),
	(109, 1, '2013-09-20 09:49:35', '127.0.0.1', 1),
	(110, 1, '2013-09-20 10:03:37', '127.0.0.1', 1),
	(111, 1, '2013-09-20 10:04:27', '127.0.0.1', 1),
	(112, 1, '2013-09-20 13:22:10', '127.0.0.1', 1),
	(113, 1, '2013-09-20 13:23:22', '127.0.0.1', 1),
	(114, 1, '2013-09-24 08:32:44', '127.0.0.1', 1),
	(115, 1, '2013-09-24 09:20:24', '127.0.0.1', 1),
	(116, 1, '2013-09-24 12:20:06', '127.0.0.1', 1),
	(117, 1, '2013-09-24 12:55:53', '127.0.0.1', 1),
	(118, 1, '2013-09-27 08:37:48', '127.0.0.1', 1),
	(119, 1, '2013-09-27 12:43:57', '127.0.0.1', 1),
	(120, 1, '2013-09-27 13:06:02', '127.0.0.1', 1),
	(121, 1, '2013-09-30 08:34:32', '127.0.0.1', 1),
	(122, 1, '2013-09-30 09:17:39', '127.0.0.1', 1),
	(123, 1, '2013-10-01 08:26:33', '127.0.0.1', 1),
	(124, 1, '2013-10-01 08:45:09', '127.0.0.1', 1),
	(125, 1, '2013-10-01 11:42:37', '127.0.0.1', 1),
	(126, 1, '2013-10-01 13:25:35', '127.0.0.1', 1),
	(127, 1, '2013-10-01 13:25:47', '127.0.0.1', 1),
	(128, 1, '2013-10-01 13:26:53', '127.0.0.1', 1),
	(129, 1, '2013-10-01 13:28:11', '127.0.0.1', 1),
	(130, 1, '2013-10-01 13:29:01', '127.0.0.1', 1),
	(131, 1, '2013-10-01 13:29:45', '127.0.0.1', 1),
	(132, 1, '2013-10-02 08:35:39', '127.0.0.1', 1),
	(133, 1, '2013-10-02 08:37:14', '127.0.0.1', 1),
	(134, 1, '2013-10-02 08:39:39', '127.0.0.1', 1),
	(135, 1, '2013-10-02 08:40:47', '127.0.0.1', 1),
	(136, 1, '2013-10-02 08:43:12', '127.0.0.1', 1),
	(137, 1, '2013-10-02 08:44:18', '127.0.0.1', 1),
	(138, 1, '2013-10-02 08:44:39', '127.0.0.1', 1),
	(139, 1, '2013-10-02 08:45:12', '127.0.0.1', 1),
	(140, 1, '2013-10-02 10:09:20', '127.0.0.1', 1),
	(141, 1, '2013-10-02 11:09:51', '127.0.0.1', 1),
	(142, 1, '2013-10-02 11:59:28', '127.0.0.1', 1),
	(143, 1, '2013-10-03 08:38:20', '127.0.0.1', 1),
	(144, 1, '2013-10-03 09:26:57', '127.0.0.1', 1),
	(145, 1, '2013-10-03 10:13:45', '127.0.0.1', 1),
	(146, 1, '2013-10-03 10:56:56', '127.0.0.1', 1),
	(147, 1, '2013-10-03 10:57:18', '127.0.0.1', 1),
	(148, 1, '2013-10-03 11:01:20', '127.0.0.1', 1),
	(149, 1, '2013-10-03 11:13:54', '127.0.0.1', 1),
	(150, 1, '2013-10-03 11:32:52', '127.0.0.1', 0),
	(151, 1, '2013-10-03 11:33:13', '127.0.0.1', 1),
	(152, 1, '2013-10-03 13:41:35', '127.0.0.1', 0),
	(153, 1, '2013-10-03 13:41:49', '127.0.0.1', 1),
	(154, 2, '2013-10-03 13:45:21', '127.0.0.1', 1),
	(155, 1, '2013-10-03 13:48:18', '127.0.0.1', 1),
	(156, 1, '2013-10-03 13:49:05', '127.0.0.1', 0),
	(157, 1, '2013-10-03 13:49:20', '127.0.0.1', 1),
	(158, 1, '2013-10-03 13:50:07', '127.0.0.1', 0),
	(159, 1, '2013-10-03 13:50:20', '127.0.0.1', 1),
	(160, 1, '2013-10-03 13:51:25', '127.0.0.1', 1),
	(161, 1, '2013-10-03 13:57:59', '127.0.0.1', 1),
	(162, 1, '2013-10-03 14:02:35', '127.0.0.1', 1),
	(163, 1, '2013-10-03 14:12:10', '127.0.0.1', 1),
	(164, 1, '2013-10-03 14:13:00', '127.0.0.1', 1),
	(165, 1, '2013-10-03 14:17:32', '127.0.0.1', 1),
	(166, 1, '2013-10-03 14:21:01', '127.0.0.1', 1),
	(167, 2, '2013-10-03 14:22:05', '127.0.0.1', 1),
	(168, 1, '2013-10-04 08:51:14', '127.0.0.1', 0),
	(169, 1, '2013-10-04 08:51:27', '127.0.0.1', 1),
	(170, 1, '2013-10-04 08:52:25', '127.0.0.1', 0),
	(171, 1, '2013-10-04 08:52:40', '127.0.0.1', 1),
	(172, 2, '2013-10-04 08:53:47', '127.0.0.1', 1),
	(173, 1, '2013-10-04 09:06:26', '127.0.0.1', 1),
	(174, 2, '2013-10-04 09:26:50', '127.0.0.1', 1),
	(175, 1, '2013-10-04 10:11:34', '127.0.0.1', 1),
	(176, 2, '2013-10-04 10:11:44', '127.0.0.1', 1),
	(177, 2, '2013-10-04 10:13:40', '127.0.0.1', 1),
	(178, 1, '2013-10-04 11:32:21', '131.107.3.16', 1),
	(179, 2, '2013-10-04 11:32:46', '131.107.3.16', 1),
	(180, 1, '2013-10-04 11:51:17', '131.107.3.16', 1),
	(181, 2, '2013-10-04 11:53:24', '131.107.3.16', 1),
	(182, 1, '2013-10-04 11:54:04', '131.107.3.16', 1),
	(183, 2, '2013-10-04 12:42:25', '131.107.3.16', 1),
	(184, 1, '2013-10-07 09:39:15', '127.0.0.1', 0),
	(185, 1, '2013-10-07 09:39:28', '127.0.0.1', 1),
	(186, 1, '2013-10-07 13:14:04', '127.0.0.1', 1),
	(187, 1, '2013-10-08 09:03:34', '127.0.0.1', 0),
	(188, 1, '2013-10-08 09:03:49', '127.0.0.1', 1),
	(189, 1, '2013-10-09 09:26:34', '127.0.0.1', 0),
	(190, 1, '2013-10-09 09:26:47', '127.0.0.1', 1),
	(191, 1, '2013-10-09 10:11:12', '127.0.0.1', 1),
	(192, 1, '2013-10-09 10:11:34', '127.0.0.1', 1),
	(193, 1, '2013-10-09 10:12:55', '127.0.0.1', 1),
	(194, 1, '2013-10-09 10:13:15', '127.0.0.1', 1),
	(195, 1, '2013-10-09 10:14:42', '127.0.0.1', 1),
	(196, 1, '2013-10-09 10:14:51', '127.0.0.1', 0),
	(197, 1, '2013-10-09 10:15:08', '127.0.0.1', 0),
	(198, 1, '2013-10-09 10:15:38', '127.0.0.1', 0),
	(199, 1, '2013-10-09 10:18:12', '127.0.0.1', 0),
	(200, 1, '2013-10-09 10:18:26', NULL, 0),
	(201, 1, '2013-10-09 10:18:59', '127.0.0.1', 1),
	(202, 1, '2013-10-09 10:19:17', '127.0.0.1', 0),
	(203, 1, '2013-10-09 10:19:39', '127.0.0.1', 0),
	(204, 1, '2013-10-09 10:20:56', '127.0.0.1', 0),
	(205, 1, '2013-10-09 10:21:11', '127.0.0.1', 1),
	(206, 1, '2013-10-09 10:38:16', '127.0.0.1', 1),
	(207, 1, '2013-10-09 12:10:36', '127.0.0.1', 1),
	(208, 1, '2013-10-09 12:12:49', '127.0.0.1', 1),
	(209, 1, '2013-10-09 12:14:03', '127.0.0.1', 1),
	(210, 2, '2013-10-09 12:58:37', '127.0.0.1', 1),
	(211, 1, '2013-10-10 12:00:52', '127.0.0.1', 1),
	(212, 1, '2013-10-10 12:03:57', '127.0.0.1', 1),
	(213, 1, '2013-10-10 12:40:21', '127.0.0.1', 1),
	(214, 3, '2013-10-10 13:49:04', '127.0.0.1', 1),
	(215, 1, '2013-10-15 08:43:59', '127.0.0.1', 1),
	(216, 1, '2013-10-15 09:16:28', '127.0.0.1', 1),
	(217, 1, '2013-10-15 09:19:33', '127.0.0.1', 1),
	(218, 1, '2013-10-15 09:37:05', '127.0.0.1', 1),
	(219, 1, '2013-10-15 09:37:18', '127.0.0.1', 1),
	(220, 1, '2013-10-15 09:37:29', '127.0.0.1', 0),
	(221, 1, '2013-10-15 09:38:00', '127.0.0.1', 1),
	(222, 1, '2013-10-15 09:39:52', '127.0.0.1', 1),
	(223, 1, '2013-10-15 09:40:10', '127.0.0.1', 1),
	(224, 1, '2013-10-15 09:57:06', '127.0.0.1', 1),
	(225, 1, '2013-10-15 09:57:50', '127.0.0.1', 1),
	(226, 1, '2013-10-15 09:58:27', '127.0.0.1', 1),
	(227, 1, '2013-10-15 10:13:30', '127.0.0.1', 0),
	(228, 1, '2013-10-15 10:13:44', '127.0.0.1', 1),
	(229, 1, '2013-10-15 12:12:51', '127.0.0.1', 1),
	(230, 1, '2013-10-16 08:26:21', '127.0.0.1', 0),
	(231, 1, '2013-10-16 08:26:37', '127.0.0.1', 1),
	(232, 1, '2013-10-16 10:10:24', '127.0.0.1', 1),
	(233, 1, '2013-10-16 10:13:02', '127.0.0.1', 0),
	(234, 1, '2013-10-16 10:13:12', '127.0.0.1', 1),
	(235, 2, '2013-10-16 10:44:44', '127.0.0.1', 1),
	(236, 1, '2013-10-16 10:58:39', '127.0.0.1', 1),
	(237, 2, '2013-10-16 10:59:08', '127.0.0.1', 1),
	(238, 1, '2013-10-16 12:10:39', '127.0.0.1', 1),
	(239, 1, '2013-10-16 12:12:08', '127.0.0.1', 1),
	(240, 1, '2013-10-16 12:12:43', '127.0.0.1', 1),
	(241, 1, '2013-10-16 12:22:39', '127.0.0.1', 1),
	(242, 1, '2013-10-16 12:35:56', '127.0.0.1', 1),
	(243, 1, '2013-10-16 12:38:09', '127.0.0.1', 1),
	(244, 1, '2013-10-16 12:38:57', '127.0.0.1', 1),
	(245, 1, '2013-10-16 13:24:42', '127.0.0.1', 1),
	(246, 1, '2013-10-16 13:25:26', '127.0.0.1', 1),
	(247, 1, '2013-10-16 13:26:38', '127.0.0.1', 1),
	(248, 2, '2013-10-16 13:28:19', '127.0.0.1', 1),
	(249, 2, '2013-10-16 13:34:17', '127.0.0.1', 1),
	(250, 2, '2013-10-16 13:37:09', '127.0.0.1', 1),
	(251, 2, '2013-10-16 13:40:11', '127.0.0.1', 1),
	(252, 1, '2013-10-17 09:27:04', '127.0.0.1', 1),
	(253, 2, '2013-10-17 09:27:16', '127.0.0.1', 1),
	(254, 2, '2013-10-17 09:42:56', '127.0.0.1', 1),
	(255, 2, '2013-10-17 09:58:23', '127.0.0.1', 1),
	(256, 2, '2013-10-17 12:16:51', '127.0.0.1', 1),
	(257, 2, '2013-10-18 08:26:02', '127.0.0.1', 1),
	(258, 2, '2013-10-18 08:37:32', '127.0.0.1', 1),
	(259, 3, '2013-10-18 10:15:43', '127.0.0.1', 1),
	(260, 2, '2013-10-18 10:16:29', '127.0.0.1', 1),
	(261, 2, '2013-10-18 10:20:11', '127.0.0.1', 1),
	(262, 3, '2013-10-18 10:29:34', '127.0.0.1', 1),
	(263, 2, '2013-10-18 10:32:44', '127.0.0.1', 1),
	(264, 2, '2013-10-18 10:34:18', '127.0.0.1', 1),
	(265, 2, '2013-10-18 10:34:50', '127.0.0.1', 1),
	(266, 3, '2013-10-18 10:35:14', '127.0.0.1', 1),
	(267, 2, '2013-10-18 10:37:04', '127.0.0.1', 0),
	(268, 2, '2013-10-18 10:37:17', '127.0.0.1', 1),
	(269, 3, '2013-10-18 10:37:42', '127.0.0.1', 1),
	(270, 2, '2013-10-18 10:39:13', '127.0.0.1', 1),
	(271, 2, '2013-10-18 10:43:46', '127.0.0.1', 1),
	(272, 3, '2013-10-18 10:44:49', '127.0.0.1', 1),
	(273, 2, '2013-10-18 10:58:06', '127.0.0.1', 1),
	(274, 2, '2013-10-21 08:44:52', '127.0.0.1', 0),
	(275, 2, '2013-10-21 08:45:08', '127.0.0.1', 1),
	(276, 2, '2013-10-21 08:46:38', '127.0.0.1', 1),
	(277, 3, '2013-10-21 08:47:41', '127.0.0.1', 1),
	(278, 3, '2013-10-21 08:49:46', '127.0.0.1', 1),
	(279, 3, '2013-10-21 09:14:34', '127.0.0.1', 1),
	(280, 2, '2013-10-21 09:14:55', '127.0.0.1', 1),
	(281, 2, '2013-10-21 09:16:45', '127.0.0.1', 1),
	(282, 2, '2013-10-22 08:12:22', '127.0.0.1', 1),
	(283, 2, '2013-10-22 08:13:07', '127.0.0.1', 1),
	(284, 2, '2013-10-22 10:27:26', '127.0.0.1', 1),
	(285, 2, '2013-10-22 11:21:58', '127.0.0.1', 1),
	(286, 2, '2013-10-22 11:26:16', '127.0.0.1', 1),
	(287, 2, '2013-10-23 11:41:46', '127.0.0.1', 1),
	(288, 2, '2013-10-24 09:08:10', '127.0.0.1', 0),
	(289, 2, '2013-10-24 09:08:23', '127.0.0.1', 1),
	(290, 2, '2013-10-24 09:22:03', '127.0.0.1', 1),
	(291, 2, '2013-10-24 12:00:22', '127.0.0.1', 1),
	(292, 2, '2013-10-24 12:06:44', '127.0.0.1', 1),
	(293, 2, '2013-10-24 12:09:26', '127.0.0.1', 1),
	(294, 2, '2013-10-24 12:10:33', '127.0.0.1', 1),
	(295, 2, '2013-10-24 12:20:00', '127.0.0.1', 1),
	(296, 2, '2013-10-25 11:11:44', '127.0.0.1', 1),
	(297, 1, '2013-10-28 08:47:35', '127.0.0.1', 0),
	(298, 2, '2013-10-28 08:47:56', '127.0.0.1', 1),
	(299, 2, '2013-10-28 12:08:40', '127.0.0.1', 1),
	(300, 2, '2013-10-29 08:23:40', '127.0.0.1', 1),
	(301, 2, '2013-10-29 09:50:20', '127.0.0.1', 1),
	(302, 2, '2013-10-29 11:01:12', '127.0.0.1', 1),
	(303, 2, '2013-10-29 11:01:38', '127.0.0.1', 1),
	(304, 2, '2013-10-29 11:07:49', '127.0.0.1', 1),
	(305, 1, '2013-10-29 11:08:06', '127.0.0.1', 0),
	(306, 1, '2013-10-29 11:08:18', '127.0.0.1', 1),
	(307, 2, '2013-10-29 11:38:20', '127.0.0.1', 1),
	(308, 1, '2013-10-29 11:47:02', '127.0.0.1', 1),
	(309, 1, '2013-10-29 11:48:24', '127.0.0.1', 1),
	(310, 2, '2013-10-30 09:38:37', '127.0.0.1', 1),
	(311, 2, '2013-10-30 11:32:19', '127.0.0.1', 1),
	(312, 1, '2013-10-30 12:13:27', '127.0.0.1', 1),
	(313, 1, '2013-10-30 13:12:21', '127.0.0.1', 1),
	(314, 1, '2013-10-31 10:52:49', '127.0.0.1', 1),
	(315, 3, '2013-10-31 10:53:10', '127.0.0.1', 0),
	(316, 3, '2013-10-31 10:53:24', '127.0.0.1', 1),
	(317, 1, '2013-10-31 13:43:46', '127.0.0.1', 1),
	(318, 2, '2013-11-01 08:48:24', '127.0.0.1', 1),
	(319, 3, '2013-11-01 08:53:14', '127.0.0.1', 1),
	(320, 1, '2013-11-01 09:08:02', '127.0.0.1', 0),
	(321, 1, '2013-11-01 09:08:13', '127.0.0.1', 1),
	(322, 1, '2013-11-01 09:34:43', '127.0.0.1', 1),
	(323, 1, '2013-11-01 11:06:05', '127.0.0.1', 1),
	(324, 3, '2013-11-01 11:55:14', '127.0.0.1', 1),
	(325, 1, '2013-11-01 11:58:08', '127.0.0.1', 1),
	(326, 2, '2013-11-01 12:01:12', '127.0.0.1', 1),
	(327, 3, '2013-11-01 12:01:20', '127.0.0.1', 1),
	(328, 1, '2013-11-01 12:09:40', '127.0.0.1', 1),
	(329, 1, '2013-11-01 12:35:55', '127.0.0.1', 1),
	(330, 2, '2013-11-01 12:37:52', '127.0.0.1', 1),
	(331, 1, '2013-11-04 08:28:35', '127.0.0.1', 0),
	(332, 1, '2013-11-04 08:29:15', '127.0.0.1', 1),
	(333, 1, '2013-11-04 11:57:41', '127.0.0.1', 1),
	(334, 1, '2013-11-06 08:44:51', '127.0.0.1', 1),
	(335, 1, '2013-11-06 09:01:28', '127.0.0.1', 1),
	(336, 1, '2013-11-06 12:07:41', '127.0.0.1', 1),
	(337, 1, '2013-11-07 09:05:45', '127.0.0.1', 1),
	(338, 1, '2013-11-07 09:35:47', '127.0.0.1', 1),
	(339, 1, '2013-11-11 08:49:38', '127.0.0.1', 1),
	(340, 1, '2013-11-11 10:10:32', '127.0.0.1', 1),
	(341, 1, '2013-11-12 08:17:16', '127.0.0.1', 1),
	(342, 2, '2013-11-12 09:57:49', '127.0.0.1', 1),
	(343, 3, '2013-11-12 09:58:05', '127.0.0.1', 1),
	(344, 1, '2013-11-12 10:19:48', '127.0.0.1', 1),
	(345, 3, '2013-11-12 10:20:12', '127.0.0.1', 1),
	(346, 3, '2013-11-18 12:38:35', '127.0.0.1', 1),
	(347, 3, '2013-11-18 12:42:19', '127.0.0.1', 1),
	(348, 1, '2013-11-18 12:42:55', '127.0.0.1', 1),
	(349, 1, '2013-11-21 09:00:04', '127.0.0.1', 1),
	(350, 1, '2013-11-21 09:40:36', '131.107.3.18', 1),
	(351, 3, '2013-11-21 10:18:11', '131.107.3.18', 1),
	(352, 3, '2013-11-21 10:27:17', '127.0.0.1', 1),
	(353, 1, '2013-11-22 08:46:34', '127.0.0.1', 1),
	(354, 3, '2013-11-22 08:59:26', '127.0.0.1', 1),
	(355, 1, '2013-11-27 09:08:31', '127.0.0.1', 1),
	(356, 1, '2013-11-27 09:19:02', '127.0.0.1', 1),
	(357, 1, '2013-11-27 11:14:37', '127.0.0.1', 1),
	(358, 1, '2013-11-27 12:32:42', '127.0.0.1', 1),
	(359, 1, '2013-11-27 12:44:14', '127.0.0.1', 1),
	(360, 1, '2013-11-28 08:35:57', '127.0.0.1', 1),
	(361, 1, '2013-11-28 08:59:51', '127.0.0.1', 1),
	(362, 1, '2013-11-28 09:23:59', '127.0.0.1', 1),
	(363, 4, '2013-11-28 09:50:56', '127.0.0.1', 0),
	(364, 1, '2013-11-28 09:52:11', '127.0.0.1', 1),
	(365, 1, '2013-11-28 10:08:00', '127.0.0.1', 1),
	(366, 1, '2013-11-28 10:44:35', '127.0.0.1', 1),
	(367, 1, '2013-11-28 11:49:04', '131.107.3.16', 1),
	(368, 1, '2013-11-28 12:44:42', '131.107.3.16', 1),
	(369, 1, '2013-11-28 13:44:39', '127.0.0.1', 1),
	(370, 1, '2013-11-29 08:39:28', '127.0.0.1', 1),
	(371, 1, '2013-11-29 09:32:09', '127.0.0.1', 1),
	(372, 1, '2013-11-29 12:13:05', '127.0.0.1', 1),
	(373, 1, '2013-11-29 12:24:33', '127.0.0.1', 1),
	(374, 1, '2013-12-09 08:33:15', '127.0.0.1', 1),
	(375, 1, '2013-12-09 08:40:22', '127.0.0.1', 1),
	(376, 1, '2013-12-09 08:44:15', '127.0.0.1', 1),
	(377, 1, '2013-12-11 08:17:54', '127.0.0.1', 1),
	(378, 1, '2013-12-11 10:22:29', '127.0.0.1', 1),
	(379, 1, '2013-12-14 18:59:49', '127.0.0.1', 1),
	(380, 1, '2013-12-14 19:00:06', '127.0.0.1', 1),
	(381, 1, '2013-12-14 19:07:43', '127.0.0.1', 1),
	(382, 1, '2013-12-14 23:54:53', '127.0.0.1', 0),
	(383, 1, '2013-12-14 23:55:24', '127.0.0.1', 1),
	(384, 1, '2013-12-15 21:00:35', '127.0.0.1', 1),
	(385, 1, '2013-12-16 01:53:09', '127.0.0.1', 1),
	(386, 1, '2013-12-18 19:52:53', '127.0.0.1', 1),
	(387, 1, '2013-12-18 20:56:46', '127.0.0.1', 1),
	(388, 1, '2014-01-04 19:02:12', '127.0.0.1', 1),
	(389, 1, '2014-01-04 19:38:28', '127.0.0.1', 1),
	(390, 1, '2014-01-04 23:55:58', '127.0.0.1', 1),
	(391, 1, '2014-01-05 10:39:27', '127.0.0.1', 1),
	(392, 1, '2014-01-05 11:37:29', '127.0.0.1', 1),
	(393, 1, '2014-01-05 11:39:45', '127.0.0.1', 1),
	(394, 1, '2014-01-05 21:37:05', '127.0.0.1', 1),
	(395, 1, '2014-01-05 21:42:18', '127.0.0.1', 1),
	(396, 1, '2014-01-06 18:12:48', '127.0.0.1', 1),
	(397, 1, '2014-01-06 19:16:53', '127.0.0.1', 1),
	(398, 1, '2014-01-07 16:34:31', '127.0.0.1', 1),
	(399, 1, '2014-01-07 16:51:23', '127.0.0.1', 1),
	(400, 1, '2014-01-07 17:37:26', '127.0.0.1', 1),
	(401, 1, '2014-01-07 17:39:22', '127.0.0.1', 1),
	(402, 1, '2014-01-07 17:40:13', '127.0.0.1', 1),
	(403, 1, '2014-01-07 17:41:22', '127.0.0.1', 1),
	(404, 1, '2014-01-07 17:54:59', '127.0.0.1', 1),
	(405, 1, '2014-01-07 17:55:23', '127.0.0.1', 1),
	(406, 1, '2014-01-07 17:57:02', '127.0.0.1', 1),
	(407, 1, '2014-01-08 20:49:36', '127.0.0.1', 1),
	(408, 1, '2014-01-08 20:50:08', '127.0.0.1', 1),
	(409, 1, '2014-01-08 20:51:35', '127.0.0.1', 1),
	(410, 1, '2014-01-08 20:53:02', '127.0.0.1', 1),
	(411, 1, '2014-01-09 15:07:02', '127.0.0.1', 1),
	(412, 1, '2014-01-09 15:25:51', '127.0.0.1', 1),
	(413, 1, '2014-01-09 17:30:17', '127.0.0.1', 1),
	(414, 1, '2014-01-09 17:30:43', '127.0.0.1', 1),
	(415, 1, '2014-01-09 18:33:00', '127.0.0.1', 1),
	(416, 1, '2014-01-10 18:20:52', '127.0.0.1', 1),
	(417, 1, '2014-01-10 18:21:06', '127.0.0.1', 1),
	(418, 1, '2014-01-10 19:04:08', '127.0.0.1', 1),
	(419, 1, '2014-01-10 19:27:15', '127.0.0.1', 1),
	(420, 1, '2014-01-10 19:42:31', '127.0.0.1', 1),
	(421, 1, '2014-01-11 17:16:22', '127.0.0.1', 1),
	(422, 1, '2014-01-11 17:36:52', '127.0.0.1', 1),
	(423, 1, '2014-01-11 18:25:46', '127.0.0.1', 1),
	(424, 1, '2014-01-11 18:26:02', '127.0.0.1', 1),
	(425, 1, '2014-01-11 18:26:26', '127.0.0.1', 1),
	(426, 1, '2014-01-11 19:41:03', '127.0.0.1', 1),
	(427, 1, '2014-01-11 21:10:34', '127.0.0.1', 1),
	(428, 1, '2014-01-11 21:28:19', '127.0.0.1', 1),
	(429, 1, '2014-01-12 19:50:55', '127.0.0.1', 1),
	(430, 1, '2014-01-12 19:54:58', '127.0.0.1', 1),
	(431, 1, '2014-01-13 19:09:13', '127.0.0.1', 1),
	(432, 1, '2014-01-13 19:20:16', '127.0.0.1', 1),
	(433, 1, '2014-01-13 19:21:36', '127.0.0.1', 1),
	(434, 1, '2014-01-13 20:46:44', '127.0.0.1', 1),
	(435, 1, '2014-01-13 21:20:03', '127.0.0.1', 1),
	(436, 1, '2014-01-14 12:59:35', '127.0.0.1', 1),
	(437, 1, '2014-01-14 13:02:32', '127.0.0.1', 1),
	(438, 1, '2014-01-14 13:12:03', '127.0.0.1', 1),
	(439, 1, '2014-01-14 13:32:14', '127.0.0.1', 1),
	(440, 1, '2014-01-14 18:13:05', '127.0.0.1', 1),
	(441, 1, '2014-01-14 18:27:42', '127.0.0.1', 1),
	(442, 1, '2014-01-14 18:28:46', '127.0.0.1', 1),
	(443, 1, '2014-01-15 12:54:29', '127.0.0.1', 1),
	(444, 1, '2014-01-15 12:54:46', '127.0.0.1', 1),
	(445, 1, '2014-01-15 18:20:04', '127.0.0.1', 1),
	(446, 1, '2014-01-15 18:27:25', '127.0.0.1', 1),
	(447, 1, '2014-01-15 20:29:13', '127.0.0.1', 1),
	(448, 1, '2014-01-17 08:54:38', '127.0.0.1', 1),
	(449, 1, '2014-01-17 08:57:42', '127.0.0.1', 1),
	(450, 1, '2014-01-17 11:34:11', '127.0.0.1', 1),
	(451, 1, '2014-01-17 11:39:28', '127.0.0.1', 1),
	(452, 1, '2014-01-17 19:32:33', '127.0.0.1', 1),
	(453, 1, '2014-01-17 20:00:11', '127.0.0.1', 1),
	(454, 1, '2014-01-19 15:50:45', '127.0.0.1', 1),
	(455, 1, '2014-01-19 20:41:00', '127.0.0.1', 1),
	(456, 1, '2014-01-19 20:57:21', '127.0.0.1', 1),
	(457, 1, '2014-01-19 21:11:46', '127.0.0.1', 1),
	(458, 1, '2014-01-19 21:20:27', '127.0.0.1', 1),
	(459, 1, '2014-01-19 21:21:32', '127.0.0.1', 1),
	(460, 1, '2014-01-19 21:46:56', '127.0.0.1', 1),
	(461, 1, '2014-01-20 16:27:26', '127.0.0.1', 1),
	(462, 1, '2014-01-20 17:39:22', '127.0.0.1', 1),
	(463, 1, '2014-01-21 08:49:33', '127.0.0.1', 1),
	(464, 1, '2014-01-22 17:24:22', '127.0.0.1', 1),
	(465, 1, '2014-01-27 01:19:15', '127.0.0.1', 0),
	(466, 1, '2014-01-28 18:31:23', '127.0.0.1', 1),
	(467, 1, '2014-01-28 18:48:41', '127.0.0.1', 0),
	(468, 1, '2014-01-28 18:50:47', '127.0.0.1', 0),
	(469, 1, '2014-01-28 18:51:48', '127.0.0.1', 0),
	(470, 1, '2014-01-28 18:52:00', '127.0.0.1', 0),
	(471, 1, '2014-01-28 18:53:43', '127.0.0.1', 0),
	(472, 1, '2014-01-28 18:55:07', '127.0.0.1', 0),
	(473, 1, '2014-01-28 18:58:35', '127.0.0.1', 0),
	(474, 1, '2014-01-28 19:00:07', '127.0.0.1', 0),
	(475, 1, '2014-01-28 19:00:19', '127.0.0.1', 0),
	(476, 1, '2014-01-28 19:01:01', '127.0.0.1', 1),
	(477, 1, '2014-01-28 19:01:20', '127.0.0.1', 1),
	(478, 1, '2014-01-28 19:05:51', '127.0.0.1', 1),
	(479, 1, '2014-01-28 21:25:07', '127.0.0.1', 1),
	(480, 1, '2014-01-29 09:00:07', '127.0.0.1', 1),
	(481, 1, '2014-01-29 09:20:58', '127.0.0.1', 1),
	(482, 1, '2014-01-29 09:23:04', '127.0.0.1', 0),
	(483, 1, '2014-01-29 09:23:18', '127.0.0.1', 1),
	(484, 1, '2014-01-29 09:43:59', '127.0.0.1', 1),
	(485, 1, '2014-01-29 09:56:18', '127.0.0.1', 1),
	(486, 1, '2014-01-29 11:00:36', '127.0.0.1', 1),
	(487, 1, '2014-01-29 11:03:58', '127.0.0.1', 1),
	(488, 1, '2014-01-29 11:04:20', '127.0.0.1', 1),
	(489, 1, '2014-01-29 11:09:13', '127.0.0.1', 1),
	(490, 1, '2014-01-30 15:59:58', '127.0.0.1', 1),
	(491, 1, '2014-02-03 09:24:36', '127.0.0.1', 1),
	(492, 1, '2014-02-03 10:27:06', '127.0.0.1', 1),
	(493, 1, '2014-02-11 21:37:52', '127.0.0.1', 1),
	(494, 1, '2014-02-11 23:49:54', NULL, 0),
	(495, 1, '2014-02-11 23:50:30', '127.0.0.1', 1),
	(496, 1, '2014-02-12 15:04:41', '127.0.0.1', 1),
	(497, 1, '2014-02-12 15:09:21', '127.0.0.1', 1),
	(498, 1, '2014-02-13 12:32:40', '127.0.0.1', 1),
	(499, 1, '2014-02-13 13:56:08', '127.0.0.1', 1),
	(500, 1, '2014-02-13 15:04:53', '127.0.0.1', 1),
	(501, 1, '2014-02-13 15:11:14', '127.0.0.1', 1),
	(502, 1, '2014-02-14 07:59:26', '127.0.0.1', 1),
	(503, 1, '2014-02-14 08:31:37', '127.0.0.1', 1),
	(504, 1, '2014-02-14 15:08:44', '127.0.0.1', 1),
	(505, 1, '2014-02-14 17:41:20', '127.0.0.1', 1),
	(506, 1, '2014-02-14 20:03:58', '127.0.0.1', 1),
	(507, 1, '2014-02-15 21:20:44', '127.0.0.1', 0),
	(508, 1, '2014-02-15 21:20:53', '127.0.0.1', 0),
	(509, 1, '2014-02-15 21:22:32', '127.0.0.1', 1),
	(510, 1, '2014-02-17 21:03:46', '127.0.0.1', 1),
	(511, 1, '2014-02-17 21:43:00', '127.0.0.1', 1),
	(512, 1, '2014-02-20 12:51:30', '127.0.0.1', 1),
	(513, 1, '2014-03-01 18:52:08', '127.0.0.1', 1),
	(514, 1, '2014-03-01 20:15:04', '127.0.0.1', 1),
	(515, 1, '2014-03-01 23:22:58', '127.0.0.1', 1),
	(516, 1, '2014-03-02 12:32:24', '127.0.0.1', 1),
	(517, 1, '2014-03-02 19:44:36', '127.0.0.1', 1),
	(518, 1, '2014-03-02 20:55:00', '127.0.0.1', 1),
	(519, 1, '2014-03-02 23:32:34', '127.0.0.1', 1),
	(520, 1, '2014-03-02 23:33:15', '127.0.0.1', 1),
	(521, 1, '2014-03-03 00:32:06', '127.0.0.1', 1),
	(522, 1, '2014-03-03 10:52:07', '127.0.0.1', 1),
	(523, 1, '2014-03-03 11:05:40', '127.0.0.1', 1),
	(524, 1, '2014-03-03 11:52:21', '127.0.0.1', 1),
	(525, 1, '2014-03-03 12:28:27', '127.0.0.1', 1),
	(526, 1, '2014-03-03 12:28:40', '127.0.0.1', 0),
	(527, 1, '2014-03-03 12:28:49', '127.0.0.1', 1),
	(528, 1, '2014-03-03 16:33:30', '127.0.0.1', 1),
	(529, 1, '2014-03-03 21:13:02', '10.0.0.12', 0),
	(530, 1, '2014-03-04 17:03:13', '127.0.0.1', 1),
	(531, 1, '2014-03-04 18:04:23', '127.0.0.1', 1),
	(532, 1, '2014-03-04 18:08:50', '127.0.0.1', 1),
	(533, 1, '2014-03-04 18:54:59', '127.0.0.1', 1),
	(534, 1, '2014-03-06 21:55:50', '127.0.0.1', 1),
	(535, 1, '2014-03-06 22:21:27', '127.0.0.1', 1),
	(536, 1, '2014-03-06 23:49:34', '127.0.0.1', 1),
	(537, 1, '2014-03-06 23:51:29', '127.0.0.1', 1),
	(538, 1, '2014-03-07 11:49:04', '0.0.0.0', 1),
	(539, 1, '2014-03-18 13:28:27', '0.0.0.0', 1),
	(540, 1, '2014-03-25 13:38:04', '0.0.0.0', 1),
	(541, 1, '2014-03-26 08:19:50', '0.0.0.0', 1),
	(542, 1, '2014-03-26 09:59:19', '0.0.0.0', 1),
	(543, 1, '2014-03-26 10:15:23', '0.0.0.0', 0),
	(544, 1, '2014-03-26 10:17:39', '0.0.0.0', 0),
	(545, 1, '2014-03-26 10:22:22', '0.0.0.0', 1),
	(546, 1, '2014-03-26 10:37:39', '0.0.0.0', 1),
	(547, 1, '2014-03-26 10:41:51', '0.0.0.0', 1),
	(548, 1, '2014-03-26 10:45:41', '0.0.0.0', 1),
	(549, 1, '2014-03-26 10:45:58', '0.0.0.0', 1),
	(550, 1, '2014-03-26 10:51:11', '0.0.0.0', 1),
	(551, 1, '2014-03-26 10:52:13', '0.0.0.0', 1),
	(552, 1, '2014-03-26 10:59:31', '0.0.0.0', 1),
	(553, 1, '2014-03-26 10:59:45', '0.0.0.0', 1),
	(554, 1, '2014-03-26 11:36:21', '0.0.0.0', 1),
	(555, 1, '2014-03-26 11:54:51', '0.0.0.0', 1),
	(556, 1, '2014-03-26 12:10:19', '0.0.0.0', 1),
	(557, 1, '2014-03-27 08:21:03', '0.0.0.0', 1),
	(558, 1, '2014-03-27 11:09:37', '0.0.0.0', 1),
	(559, 1, '2014-03-28 08:15:22', '0.0.0.0', 1),
	(560, 1, '2014-03-28 10:33:06', '0.0.0.0', 1),
	(561, 1, '2014-03-29 01:03:16', '127.0.0.1', 0),
	(562, 1, '2014-03-29 01:03:27', '127.0.0.1', 0),
	(563, 1, '2014-03-29 01:04:02', '127.0.0.1', 0),
	(564, 1, '2014-03-29 01:08:10', '127.0.0.1', 1),
	(565, 1, '2014-03-29 10:26:32', '127.0.0.1', 1),
	(566, 1, '2014-03-29 11:58:44', '127.0.0.1', 1),
	(567, 1, '2014-03-29 14:51:49', '127.0.0.1', 1),
	(568, 1, '2014-03-30 00:03:57', '127.0.0.1', 1),
	(569, 1, '2014-03-30 00:38:39', '127.0.0.1', 1),
	(570, 1, '2014-03-30 14:08:23', '127.0.0.1', 1),
	(571, 1, '2014-04-02 17:14:13', '127.0.0.1', 1);
/*!40000 ALTER TABLE `hits_usuarios_auditar` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_usuarios_estados
DROP TABLE IF EXISTS `hits_usuarios_estados`;
CREATE TABLE IF NOT EXISTS `hits_usuarios_estados` (
  `idEstado` int(10) NOT NULL auto_increment,
  `nombreEstado` varchar(50) default '0',
  PRIMARY KEY  (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_usuarios_estados: 3 rows
/*!40000 ALTER TABLE `hits_usuarios_estados` DISABLE KEYS */;
INSERT INTO `hits_usuarios_estados` (`idEstado`, `nombreEstado`) VALUES
	(1, 'Habilitado'),
	(2, 'Bloqueado'),
	(3, 'Deshabilitado');
/*!40000 ALTER TABLE `hits_usuarios_estados` ENABLE KEYS */;


-- Dumping structure for table rosobe.hits_usuarios_roles
DROP TABLE IF EXISTS `hits_usuarios_roles`;
CREATE TABLE IF NOT EXISTS `hits_usuarios_roles` (
  `idRol` int(10) NOT NULL auto_increment,
  `nombreRol` varchar(50) default '0',
  `descripcionRol` varchar(255) default '0',
  PRIMARY KEY  (`idRol`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table rosobe.hits_usuarios_roles: 5 rows
/*!40000 ALTER TABLE `hits_usuarios_roles` DISABLE KEYS */;
INSERT INTO `hits_usuarios_roles` (`idRol`, `nombreRol`, `descripcionRol`) VALUES
	(1, 'Administrador', '0'),
	(2, 'Supervision', '0'),
	(3, 'Recursos Humanos', '0'),
	(4, 'Jefatura', '0'),
	(5, 'Usuario', '0');
/*!40000 ALTER TABLE `hits_usuarios_roles` ENABLE KEYS */;


-- Dumping structure for view rosobe.hits_view_categorias
DROP VIEW IF EXISTS `hits_view_categorias`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `hits_view_categorias` (
	`idCategoria` INT(10) NOT NULL DEFAULT '0',
	`nombreCategoria` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`pathCategoria` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`uriCategoria` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rosobe.hits_view_categorias_productos
DROP VIEW IF EXISTS `hits_view_categorias_productos`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `hits_view_categorias_productos` (
	`idCategoria` INT(10) NOT NULL DEFAULT '0',
	`nombreCategoria` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`checked` INT(1) NOT NULL DEFAULT '0',
	`idProducto` INT(10) NULL DEFAULT '0'
) ENGINE=MyISAM;


-- Dumping structure for view rosobe.hits_view_galeria
DROP VIEW IF EXISTS `hits_view_galeria`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `hits_view_galeria` (
	`idGaleria` INT(10) NOT NULL DEFAULT '0',
	`nombreGaleria` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`pathGaleria` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`thumbGaleria` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`descripcionGaleria` TEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`estadoGaleria` VARCHAR(12) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rosobe.hits_view_login
DROP VIEW IF EXISTS `hits_view_login`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `hits_view_login` (
	`idUsuario` INT(10) NOT NULL DEFAULT '0',
	`nombreUsuario` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`passwordUsuario` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`intentosUsuario` INT(10) NOT NULL DEFAULT '0',
	`ultimoLoginUsuario` DATETIME NOT NULL,
	`idRol` INT(10) NOT NULL DEFAULT '0',
	`nombreRol` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`idEstado` INT(10) NOT NULL DEFAULT '0',
	`nombreEstado` VARCHAR(50) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`idPersona` INT(10) NOT NULL DEFAULT '0',
	`dniPersona` INT(10) NULL DEFAULT '0',
	`idTipoDni` INT(10) NULL DEFAULT '0',
	`apellidoPersona` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`nombrePersona` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rosobe.hits_view_personas
DROP VIEW IF EXISTS `hits_view_personas`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `hits_view_personas` (
	`idPersona` INT(10) NOT NULL DEFAULT '0',
	`dniPersona` INT(10) NULL DEFAULT '0',
	`idTipoDni` INT(10) NULL DEFAULT '0',
	`apellidoPersona` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`nombrePersona` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`cuilPersona` BIGINT(20) NULL DEFAULT '0',
	`cuitPersona` BIGINT(20) NULL DEFAULT '0',
	`nacimientoPersona` DATE NULL DEFAULT NULL,
	`idSexo` INT(11) NULL DEFAULT NULL,
	`idEcivil` INT(11) NULL DEFAULT NULL,
	`domicilioPersona` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`telefonoPersona` BIGINT(20) NULL DEFAULT NULL,
	`celularPersona` BIGINT(20) NULL DEFAULT NULL,
	`laboralPersona` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
	`internoPersona` INT(10) UNSIGNED NULL DEFAULT NULL,
	`emailPersona` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`nacionalidadPersona` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`busqueda` LONGBLOB NULL DEFAULT NULL,
	`completoPersona` VARCHAR(512) NULL DEFAULT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rosobe.hits_view_productos
DROP VIEW IF EXISTS `hits_view_productos`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `hits_view_productos` (
	`idProducto` INT(10) NOT NULL DEFAULT '0',
	`nombreProducto` VARCHAR(255) NOT NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`codigoProducto` VARCHAR(255) NOT NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`precioProducto` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
	`descripcionProducto` VARCHAR(255) NOT NULL DEFAULT '0' COLLATE 'utf8_general_ci',
	`uriProducto` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`publicadoProducto` TINYINT(4) NULL DEFAULT NULL,
	`estadoProducto` TINYINT(4) NULL DEFAULT NULL,
	`idProductoImagen` INT(10) NOT NULL DEFAULT '0',
	`pathProductoImagen` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`thumbProductoImagen` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`detailProductoImagen` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`thumbdetailProductoImagen` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`checkProductoImagen` TINYINT(1) NULL DEFAULT NULL,
	`idCategoriaProducto` INT(10) NOT NULL DEFAULT '0',
	`idCategoria` INT(10) NOT NULL DEFAULT '0',
	`nombreCategoria` VARCHAR(255) NULL DEFAULT '0' COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view rosobe.hits_view_categorias
DROP VIEW IF EXISTS `hits_view_categorias`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `hits_view_categorias`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hits_view_categorias` AS select `hits_categorias`.`idCategoria` AS `idCategoria`,`hits_categorias`.`nombreCategoria` AS `nombreCategoria`,`hits_categorias`.`pathCategoria` AS `pathCategoria`,`hits_categorias`.`uriCategoria` AS `uriCategoria` from `hits_categorias`;


-- Dumping structure for view rosobe.hits_view_categorias_productos
DROP VIEW IF EXISTS `hits_view_categorias_productos`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `hits_view_categorias_productos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hits_view_categorias_productos` AS select `c`.`idCategoria` AS `idCategoria`,`c`.`nombreCategoria` AS `nombreCategoria`,if(isnull(`cp`.`idCategoriaProducto`),0,1) AS `checked`,`cp`.`idProducto` AS `idProducto` from (`hits_categorias` `c` left join `hits_categorias_productos` `cp` on(((`c`.`idCategoria` = `cp`.`idCategoria`) and (`cp`.`idProducto` = 1))));


-- Dumping structure for view rosobe.hits_view_galeria
DROP VIEW IF EXISTS `hits_view_galeria`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `hits_view_galeria`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hits_view_galeria` AS select `g`.`idGaleria` AS `idGaleria`,`g`.`nombreGaleria` AS `nombreGaleria`,`g`.`pathGaleria` AS `pathGaleria`,`g`.`thumbGaleria` AS `thumbGaleria`,`g`.`descripcionGaleria` AS `descripcionGaleria`,if((`g`.`estadoGaleria` = 1),_utf8'Publicado',_utf8'Sin publicar') AS `estadoGaleria` from `hits_galeria` `g`;


-- Dumping structure for view rosobe.hits_view_login
DROP VIEW IF EXISTS `hits_view_login`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `hits_view_login`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hits_view_login` AS select `u`.`idUsuario` AS `idUsuario`,`u`.`nombreUsuario` AS `nombreUsuario`,`u`.`passwordUsuario` AS `passwordUsuario`,`u`.`intentosUsuario` AS `intentosUsuario`,`u`.`ultimoLoginUsuario` AS `ultimoLoginUsuario`,`r`.`idRol` AS `idRol`,`r`.`nombreRol` AS `nombreRol`,`e`.`idEstado` AS `idEstado`,`e`.`nombreEstado` AS `nombreEstado`,`p`.`idPersona` AS `idPersona`,`p`.`dniPersona` AS `dniPersona`,`p`.`idTipoDni` AS `idTipoDni`,`p`.`apellidoPersona` AS `apellidoPersona`,`p`.`nombrePersona` AS `nombrePersona` from (((`hits_usuarios` `u` join `hits_usuarios_roles` `r` on((`u`.`idRol` = `r`.`idRol`))) join `hits_usuarios_estados` `e` on((`u`.`idEstado` = `e`.`idEstado`))) join `hits_personas` `p` on((`u`.`idPersona` = `p`.`idPersona`)));


-- Dumping structure for view rosobe.hits_view_personas
DROP VIEW IF EXISTS `hits_view_personas`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `hits_view_personas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rosobe`.`hits_view_personas` AS select `jose`.`hits_personas`.`idPersona` AS `idPersona`,`jose`.`hits_personas`.`dniPersona` AS `dniPersona`,`jose`.`hits_personas`.`idTipoDni` AS `idTipoDni`,`jose`.`hits_personas`.`apellidoPersona` AS `apellidoPersona`,`jose`.`hits_personas`.`nombrePersona` AS `nombrePersona`,`jose`.`hits_personas`.`cuilPersona` AS `cuilPersona`,`jose`.`hits_personas`.`cuitPersona` AS `cuitPersona`,`jose`.`hits_personas`.`nacimientoPersona` AS `nacimientoPersona`,`jose`.`hits_personas`.`idSexo` AS `idSexo`,`jose`.`hits_personas`.`idEcivil` AS `idEcivil`,`jose`.`hits_personas`.`domicilioPersona` AS `domicilioPersona`,`jose`.`hits_personas`.`telefonoPersona` AS `telefonoPersona`,`jose`.`hits_personas`.`celularPersona` AS `celularPersona`,`jose`.`hits_personas`.`laboralPersona` AS `laboralPersona`,`jose`.`hits_personas`.`internoPersona` AS `internoPersona`,`jose`.`hits_personas`.`emailPersona` AS `emailPersona`,`jose`.`hits_personas`.`nacionalidadPersona` AS `nacionalidadPersona`,concat_ws(_utf8' ',lcase(`jose`.`hits_personas`.`dniPersona`),lcase(`jose`.`hits_personas`.`apellidoPersona`),lcase(`jose`.`hits_personas`.`nombrePersona`)) AS `busqueda`,concat_ws(_utf8', ',`jose`.`hits_personas`.`apellidoPersona`,`jose`.`hits_personas`.`nombrePersona`) AS `completoPersona` from `jose`.`hits_personas`;


-- Dumping structure for view rosobe.hits_view_productos
DROP VIEW IF EXISTS `hits_view_productos`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `hits_view_productos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hits_view_productos` AS select `p`.`idProducto` AS `idProducto`,`p`.`nombreProducto` AS `nombreProducto`,`p`.`codigoProducto` AS `codigoProducto`,`p`.`precioProducto` AS `precioProducto`,`p`.`descripcionProducto` AS `descripcionProducto`,`p`.`uriProducto` AS `uriProducto`,`p`.`publicadoProducto` AS `publicadoProducto`,`p`.`estadoProducto` AS `estadoProducto`,`pi`.`idProductoImagen` AS `idProductoImagen`,`pi`.`pathProductoImagen` AS `pathProductoImagen`,`pi`.`thumbProductoImagen` AS `thumbProductoImagen`,`pi`.`detailProductoImagen` AS `detailProductoImagen`,`pi`.`thumbdetailProductoImagen` AS `thumbdetailProductoImagen`,`pi`.`checkProductoImagen` AS `checkProductoImagen`,`cp`.`idCategoriaProducto` AS `idCategoriaProducto`,`c`.`idCategoria` AS `idCategoria`,`c`.`nombreCategoria` AS `nombreCategoria` from (((`hits_productos` `p` join `hits_productos_imagenes` `pi` on((`p`.`idProducto` = `pi`.`idProducto`))) join `hits_categorias_productos` `cp` on((`p`.`idProducto` = `cp`.`idProducto`))) join `hits_categorias` `c` on((`cp`.`idCategoria` = `c`.`idCategoria`)));
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
