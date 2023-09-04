-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para constructora
CREATE DATABASE IF NOT EXISTS `constructora` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `constructora`;

-- Volcando estructura para tabla constructora.administradores
CREATE TABLE IF NOT EXISTS `administradores` (
  `IdAdministrador` int NOT NULL AUTO_INCREMENT,
  `NumDocumento` varchar(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `CorreoElectronico` varchar(50) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdAdministrador`),
  CONSTRAINT `ckAdminCorreo` CHECK ((`CorreoElectronico` like _utf8mb4'%@%'))
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.administradores: ~10 rows (aproximadamente)
INSERT INTO `administradores` (`IdAdministrador`, `NumDocumento`, `Nombre`, `Apellido`, `Telefono`, `CorreoElectronico`, `FechaNacimiento`, `created_at`, `updated_at`) VALUES
	(1, '78901234567', 'José', 'Fernández', '3125553652', 'jose.fernandez@ejemplo.com', '1988-01-23', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(2, '89012345678', 'Laura', 'Torres', '3225554679', 'laura.torres@ejemplo.com', '1992-06-14', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(3, '90123456789', 'Manuel', 'Díaz', '3335558890', 'manuel.diaz@ejemplo.com', '1976-03-25', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(4, '01234567890', 'Sofía', 'García', '3445551122', 'sofia.garcia@ejemplo.com', '1995-12-19', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(5, '12345678901', 'Carlos', 'Hernández', '3555553344', 'carlos.hernandez@ejemplo.com', '1987-08-08', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(6, '23456789012', 'Ana', 'López', '3665555566', 'ana.lopez@ejemplo.com', '1993-07-03', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(7, '34567890123', 'Pedro', 'Martínez', '3775557788', 'pedro.martinez@ejemplo.com', '1981-09-12', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(8, '45678901234', 'María', 'Pérez', '3885559900', 'maria.perez@ejemplo.com', '1989-11-29', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(9, '56789012345', 'Andrés', 'Ramírez', '3995551122', 'andres.ramirez@ejemplo.com', '1984-10-17', '2023-08-30 22:05:35', '2023-08-30 22:05:35'),
	(10, '67890123456', 'Carolina', 'Rodríguez', '3005553344', 'carolina.rodriguez@ejemplo.com', '1991-04-21', '2023-08-30 22:05:35', '2023-08-30 22:05:35');

-- Volcando estructura para tabla constructora.aportes
CREATE TABLE IF NOT EXISTS `aportes` (
  `IdAporte` int NOT NULL AUTO_INCREMENT,
  `IdSocio` int NOT NULL,
  `IdProyecto` int NOT NULL,
  `AporteUnitario` decimal(9,0) NOT NULL DEFAULT '0',
  `Fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdAporte`),
  KEY `fkAporteSocio` (`IdSocio`),
  KEY `fkAporteProyecto` (`IdProyecto`),
  CONSTRAINT `fkAporteProyecto` FOREIGN KEY (`IdProyecto`) REFERENCES `proyectos` (`IdProyecto`),
  CONSTRAINT `fkAporteSocio` FOREIGN KEY (`IdSocio`) REFERENCES `socios` (`IdSocio`),
  CONSTRAINT `ckAporteUnitario` CHECK ((`AporteUnitario` >= 0))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.aportes: ~4 rows (aproximadamente)
INSERT INTO `aportes` (`IdAporte`, `IdSocio`, `IdProyecto`, `AporteUnitario`, `Fecha`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 50000000, '2022-08-01', '2023-08-28 18:58:49', '2023-08-28 18:58:49'),
	(2, 3, 2, 40000000, '2022-07-15', '2023-08-28 18:58:49', '2023-08-28 18:58:49'),
	(3, 4, 1, 75000000, '2022-09-20', '2023-08-28 18:58:49', '2023-08-28 18:58:49'),
	(4, 2, 3, 50000000, '2022-10-05', '2023-08-28 18:58:49', '2023-08-28 18:58:49');

-- Volcando estructura para tabla constructora.ciudades
CREATE TABLE IF NOT EXISTS `ciudades` (
  `IdCiudad` int NOT NULL AUTO_INCREMENT,
  `IdDepartamento` int NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdCiudad`),
  KEY `fkCiudadDepartamento` (`IdDepartamento`),
  CONSTRAINT `fkCiudadDepartamento` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamentos` (`IdDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.ciudades: ~10 rows (aproximadamente)
INSERT INTO `ciudades` (`IdCiudad`, `IdDepartamento`, `Nombre`, `created_at`, `updated_at`) VALUES
	(1, 10, 'Popayán', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(2, 2, 'Medellín', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(3, 3, 'Arauca', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(4, 4, 'Barranquilla', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(5, 5, 'Cartagena', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(6, 6, 'Tunja', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(7, 7, 'Manizales', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(8, 8, 'Florencia', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(9, 9, 'Yopal', '2023-08-10 22:50:16', '2023-08-10 22:50:16'),
	(10, 1, 'Leticia', '2023-08-10 22:50:16', '2023-08-10 22:50:16');

-- Volcando estructura para tabla constructora.conceptos
CREATE TABLE IF NOT EXISTS `conceptos` (
  `IdConcepto` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdConcepto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.conceptos: ~10 rows (aproximadamente)
INSERT INTO `conceptos` (`IdConcepto`, `Nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Servicios de seguridad', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(2, 'Suministro de materiales de construcción', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(3, 'Servicios de transporte', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(4, 'Honorarios profesionales', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(5, 'Pago de nómina', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(6, 'Alquiler de equipos', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(7, 'Impuestos y tasas', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(8, 'Publicidad y marketing', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(9, 'Investigación y desarrollo', '2023-08-30 22:02:10', '2023-08-30 22:02:10'),
	(10, 'Gastos generales', '2023-08-30 22:02:10', '2023-08-30 22:02:10');

-- Volcando estructura para tabla constructora.contratos
CREATE TABLE IF NOT EXISTS `contratos` (
  `IdContrato` int NOT NULL AUTO_INCREMENT,
  `IdProyecto` int NOT NULL,
  `IdTrabajador` int NOT NULL,
  `TipoContrato` varchar(50) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `Valor` decimal(11,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdContrato`),
  KEY `fkContratoProyecto` (`IdProyecto`),
  KEY `fkContratoTrabajador` (`IdTrabajador`),
  CONSTRAINT `fkContratoProyecto` FOREIGN KEY (`IdProyecto`) REFERENCES `proyectos` (`IdProyecto`),
  CONSTRAINT `fkContratoTrabajador` FOREIGN KEY (`IdTrabajador`) REFERENCES `trabajadores` (`IdTrabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.contratos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla constructora.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `IdDepartamento` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.departamentos: ~10 rows (aproximadamente)
INSERT INTO `departamentos` (`IdDepartamento`, `Nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Amazonas', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(2, 'Antioquia', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(3, 'Arauca', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(4, 'Atlántico', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(5, 'Bolívar', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(6, 'Boyacá', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(7, 'Caldas', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(8, 'Caquetá', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(9, 'Casanare', '2023-08-10 22:49:53', '2023-08-10 22:49:53'),
	(10, 'Cauca', '2023-08-10 22:49:53', '2023-08-10 22:49:53');

-- Volcando estructura para tabla constructora.detallepedidos
CREATE TABLE IF NOT EXISTS `detallepedidos` (
  `IdDetallePedido` int NOT NULL AUTO_INCREMENT,
  `IdPedido` int NOT NULL,
  `IdMateriaPrima` int NOT NULL,
  `IdMedida` int NOT NULL,
  `ValorUnitario` decimal(8,2) NOT NULL DEFAULT '0.00',
  `Cantidad` int NOT NULL DEFAULT '0',
  `Total` decimal(11,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdDetallePedido`),
  KEY `fkDetallePedidoPedido` (`IdPedido`),
  KEY `fkDetallePedidoMateriaPrima` (`IdMateriaPrima`),
  KEY `fkDetallePedidoMedida` (`IdMedida`),
  CONSTRAINT `fkDetallePedidoMateriaPrima` FOREIGN KEY (`IdMateriaPrima`) REFERENCES `materiaprimas` (`IdMateriaPrima`),
  CONSTRAINT `fkDetallePedidoMedida` FOREIGN KEY (`IdMedida`) REFERENCES `medidas` (`IdMedida`),
  CONSTRAINT `fkDetallePedidoPedido` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`),
  CONSTRAINT `ckDetallePedidoCantidad` CHECK ((`Cantidad` >= 0)),
  CONSTRAINT `ckDetallePedidoTotal` CHECK ((`Total` >= 0)),
  CONSTRAINT `ckDetallePedidoValoruni` CHECK ((`ValorUnitario` >= 0))
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.detallepedidos: ~25 rows (aproximadamente)
INSERT INTO `detallepedidos` (`IdDetallePedido`, `IdPedido`, `IdMateriaPrima`, `IdMedida`, `ValorUnitario`, `Cantidad`, `Total`, `created_at`, `updated_at`) VALUES
	(1, 5, 1, 1, 130000.00, 60, 7800000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(2, 2, 2, 1, 140000.00, 40, 5600000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(3, 3, 3, 1, 2000.00, 3000, 6000000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(4, 1, 4, 1, 150000.00, 50, 7500000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(5, 5, 5, 1, 80000.00, 100, 8000000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(6, 4, 2, 2, 130000.00, 150, 19500000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(7, 2, 3, 2, 2000.00, 30, 60000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(8, 3, 4, 2, 2000.00, 3000, 6000000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(9, 3, 5, 2, 150000.00, 50, 7500000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(10, 1, 1, 3, 130000.00, 20, 2600000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(11, 2, 2, 3, 140000.00, 10, 1400000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(12, 4, 3, 3, 2000.00, 200, 400000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(13, 5, 4, 3, 150000.00, 25, 3750000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(14, 2, 5, 3, 80000.00, 50, 4000000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(15, 3, 1, 4, 130000.00, 10, 1300000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(16, 4, 2, 4, 140000.00, 20, 2800000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(17, 4, 3, 4, 2000.00, 1000, 2000000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(18, 5, 4, 4, 150000.00, 30, 4500000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(19, 1, 5, 4, 80000.00, 10, 800000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(20, 3, 1, 5, 130000.00, 40, 5200000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(21, 4, 2, 5, 140000.00, 30, 4200000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(22, 5, 3, 5, 2000.00, 1500, 3000000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(23, 2, 4, 5, 150000.00, 20, 3000000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(24, 1, 5, 5, 80000.00, 5, 400000.00, '2023-09-03 05:20:08', '2023-09-03 05:20:08'),
	(25, 1, 1, 1, 100000.00, 20, 2000000.00, NULL, NULL);

-- Volcando estructura para tabla constructora.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla constructora.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla constructora.materiaprimas
CREATE TABLE IF NOT EXISTS `materiaprimas` (
  `IdMateriaPrima` int NOT NULL AUTO_INCREMENT,
  `IdTipoMateriaPrima` int NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Cantidad` int NOT NULL DEFAULT '0',
  `Descripcion` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdMateriaPrima`),
  KEY `fkTipoMateria` (`IdTipoMateriaPrima`),
  CONSTRAINT `fkTipoMateria` FOREIGN KEY (`IdTipoMateriaPrima`) REFERENCES `tipomateriaprimas` (`IdTipoMateriaPrima`),
  CONSTRAINT `ckMateriaPrimaCantidad` CHECK ((`Cantidad` >= 0))
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.materiaprimas: ~12 rows (aproximadamente)
INSERT INTO `materiaprimas` (`IdMateriaPrima`, `IdTipoMateriaPrima`, `Nombre`, `Cantidad`, `Descripcion`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Arena', 60, 'Se compraron 60 mts de Arena', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(2, 1, 'Gravilla', 40, 'Se compraron 40 mts de Gravilla', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(3, 1, 'Bloques', 3000, 'Se compraron 3000 bloques', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(4, 4, 'Tuberias', 50, 'Se compraron 50 tuberias', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(5, 5, 'Tejas', 100, 'Se compraron 100 tejas', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(6, 6, 'Vidrios Aislantes', 150, 'Se compraron 150 vidrios aislantes', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(7, 7, 'Madera', 30, 'Se compraron 30 palos de maderas', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(8, 6, 'Poliestireno Expandido', 50, 'Se compraron 50 cuadros de Poliestireno Expandido', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(9, 2, 'Perfiles de acero', 35, 'Se compraron 35 perfiles de acero', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(10, 2, 'Láminas de acero', 20, 'Se compraron 20 láminas de acero', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(11, 8, 'Poliuretano', 20, 'Se compraron 20 mts de poliuretano', '2023-09-03 05:15:50', '2023-09-03 05:15:50'),
	(12, 8, 'Travertino', 1000, 'Se compraron 1000 travertinos', '2023-09-03 05:15:50', '2023-09-03 05:15:50');

-- Volcando estructura para tabla constructora.medidas
CREATE TABLE IF NOT EXISTS `medidas` (
  `IdMedida` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Simbolo` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdMedida`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.medidas: ~0 rows (aproximadamente)
INSERT INTO `medidas` (`IdMedida`, `Nombre`, `Simbolo`, `created_at`, `updated_at`) VALUES
	(1, 'Metros', 'mts', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(2, 'Centimetro cubico', 'cm3', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(3, 'Pie', 'ft', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(4, 'Pulgada', 'In', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(5, 'Metro cuadrado', 'm2', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(6, 'Metro cubico', 'm3', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(7, 'Kilogramo', 'kg', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(8, 'Libra', 'lb', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(9, 'Segundos', 'Seg', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(10, 'Minutos', 'Min', '2023-09-03 05:12:12', '2023-09-03 05:12:12'),
	(11, 'Unidad', 'Unidad', '2023-09-03 05:12:12', '2023-09-03 05:12:12');

-- Volcando estructura para tabla constructora.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla constructora.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Volcando estructura para tabla constructora.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla constructora.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla constructora.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `IdPedido` int NOT NULL AUTO_INCREMENT,
  `IdProveedor` int NOT NULL,
  `IdProyecto` int NOT NULL,
  `IdConcepto` int NOT NULL,
  `FechaHora` date NOT NULL,
  `Evidencia` varchar(500) DEFAULT NULL,
  `ValorTotal` decimal(11,0) NOT NULL DEFAULT '0',
  `Descripcion` varchar(500) DEFAULT NULL,
  `IdAdministrador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdPedido`),
  KEY `fkPedidoAdministrador` (`IdAdministrador`),
  KEY `fkPedidoProveedor` (`IdProveedor`),
  KEY `fkPedidoProyecto` (`IdProyecto`),
  KEY `fkPedidoConcepto` (`IdConcepto`),
  CONSTRAINT `fkPedidoAdministrador` FOREIGN KEY (`IdAdministrador`) REFERENCES `administradores` (`IdAdministrador`),
  CONSTRAINT `fkPedidoConcepto` FOREIGN KEY (`IdConcepto`) REFERENCES `conceptos` (`IdConcepto`),
  CONSTRAINT `fkPedidoProveedor` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedores` (`IdProveedor`),
  CONSTRAINT `fkPedidoProyecto` FOREIGN KEY (`IdProyecto`) REFERENCES `proyectos` (`IdProyecto`),
  CONSTRAINT `ckPedidoValorTotal` CHECK ((`ValorTotal` >= 0))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.pedidos: ~5 rows (aproximadamente)
INSERT INTO `pedidos` (`IdPedido`, `IdProveedor`, `IdProyecto`, `IdConcepto`, `FechaHora`, `Evidencia`, `ValorTotal`, `Descripcion`, `IdAdministrador`, `created_at`, `updated_at`) VALUES
	(1, 2, 10, 8, '2023-08-30', 'Certificado.pdf', 7200000, 'Compra de materiales\r\n', 1, '2023-08-30 22:09:24', '2023-08-30 22:09:25'),
	(2, 1, 1, 1, '2023-05-02', 'Certificado de Medidas Correctivas.pdf', 12500000, 'Compra de materiales para la construcción de complejo turístico en Leticia', 3, '2023-08-30 22:16:17', '2023-08-30 22:16:17'),
	(3, 5, 3, 2, '2023-06-15', 'ruta/evidencia3.pdf', 3800000, 'Compra de materiales para construcción de viviendas sociales en Medellín', 1, '2023-08-30 22:17:25', '2023-08-30 22:17:25'),
	(4, 2, 5, 5, '2023-04-08', 'ruta/evidencia4.pdf', 9800000, 'Compra de materiales para ampliación de carretera en Tunja', 2, '2023-08-30 22:17:25', '2023-08-30 22:17:25'),
	(5, 4, 4, 4, '2023-05-21', 'ruta/evidencia5.pdf', 5600000, 'Compra de materiales para proyecto Plaza Bolívar en Barranquilla', 1, '2023-08-30 22:17:25', '2023-08-30 22:17:25');

-- Volcando estructura para tabla constructora.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla constructora.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla constructora.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `IdProveedor` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `CorreoElectronico` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdProveedor`),
  CONSTRAINT `ckProveedorCorreo` CHECK ((`CorreoElectronico` like _utf8mb4'%@%'))
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.proveedores: ~10 rows (aproximadamente)
INSERT INTO `proveedores` (`IdProveedor`, `Nombre`, `Direccion`, `Telefono`, `CorreoElectronico`, `created_at`, `updated_at`) VALUES
	(1, 'Proveedor A', 'Calle 1, Ciudad A', '555-1234', 'proveedora@proveedora.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(2, 'Proveedor B', 'Calle 2, Ciudad B', '555-5678', 'proveedorb@proveedorb.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(3, 'Proveedor C', 'Calle 3, Ciudad C', '555-2468', 'proveedorc@proveedorc.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(4, 'Proveedor D', 'Calle 4, Ciudad D', '555-3698', 'proveedord@proveedord.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(5, 'Proveedor E', 'Calle 5, Ciudad E', '555-6789', 'proveedore@proveedore.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(6, 'Proveedor F', 'Calle 6, Ciudad F', '555-1248', 'proveedorf@proveedorf.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(7, 'Proveedor G', 'Calle 7, Ciudad G', '555-3652', 'proveedorg@proveedorg.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(8, 'Proveedor H', 'Calle 8, Ciudad H', '555-4679', 'proveedorh@proveedorh.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(9, 'Proveedor I', 'Calle 9, Ciudad I', '555-8890', 'proveedori@proveedori.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20'),
	(10, 'Proveedor J', 'Calle 10, Ciudad J', '555-2234', 'proveedorj@proveedorj.com', '2023-08-30 22:01:20', '2023-08-30 22:01:20');

-- Volcando estructura para tabla constructora.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `IdProyecto` int NOT NULL AUTO_INCREMENT,
  `IdCiudad` int NOT NULL,
  `IdDepartamento` int NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Imagen` varchar(500) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `AporteTotal` int NOT NULL,
  PRIMARY KEY (`IdProyecto`),
  KEY `fkProyectoCiudad` (`IdCiudad`),
  KEY `fkProyectoDepartamento` (`IdDepartamento`),
  CONSTRAINT `fkProyectoCiudad` FOREIGN KEY (`IdCiudad`) REFERENCES `ciudades` (`IdCiudad`),
  CONSTRAINT `fkProyectoDepartamento` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamentos` (`IdDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.proyectos: ~16 rows (aproximadamente)
INSERT INTO `proyectos` (`IdProyecto`, `IdCiudad`, `IdDepartamento`, `Nombre`, `Direccion`, `Imagen`, `Estado`, `created_at`, `updated_at`, `AporteTotal`) VALUES
	(1, 10, 1, 'Construcción de complejo turístico en Leticia', 'Kilómetro 11 vía Tarapacá', '1692726607edificio1.png', 'En planeación', '2023-08-10 22:54:51', '2023-09-02 06:14:47', 850000000),
	(2, 5, 3, 'Proyecto Parque de las Artes', 'Carrera 26 # 15-25', 'proyectosejecutados2.png', 'En planeación', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 500000000),
	(3, 10, 1, 'Construcción de viviendas sociales en Yopal', 'Calle 23 # 19-12', 'proyectosejecutados3.png', 'En planeación', '2023-08-10 22:54:51', '2023-09-01 08:22:37', 400000000),
	(4, 2, 2, 'Construcción de edificio empresarial en Medellín', 'Carrera 43A # 16 Sur - 38', 'proyectosejecutados1.png', 'Finalizado', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 950000000),
	(5, 10, 6, 'Proyecto Ciudadela Universitaria', 'Calle 18 # 11-05', 'proyectosejecutados2.png', 'En ejecución', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 780000000),
	(6, 5, 3, 'Construcción de centro comercial en Arauca', 'Carrera 19 # 12-35', 'proyectosejecutados3.png', 'Finalizado', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 650000000),
	(7, 6, 7, 'Proyecto Altos de la Quinta', 'Calle 23 # 45-60', 'proyectosejecutados1.png', 'En ejecución', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 450000000),
	(8, 1, 1, 'Construcción de parque temático en Leticia', 'Kilómetro 12 vía Tarapacá', 'proyectosejecutados2.png', 'En planeación', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 850000000),
	(9, 4, 3, 'Construcción de un hospital', 'Carrera 23 # 56-78', 'proyectosejecutados3.png', 'En planeación', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 600000000),
	(10, 3, 2, 'Construcción de un centro deportivo', 'Carrera 12 #34-56', 'proyectosejecutados1.png', 'En ejecución', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 700000000),
	(11, 3, 6, 'Construcción de viviendas campestres en Duitama', 'Kilómetro 2 vía Paipa', 'proyectosejecutados2.png', 'Finalizado', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 800000000),
	(12, 1, 10, 'Proyciudadesecto Renacer Popayan', 'Calle 16 # 23-15', 'proyectosejecutados3.png', 'En ejecución', '2023-08-10 22:54:51', '2023-08-10 22:54:51', 955000000),
	(13, 6, 6, 'Construccion en cali', 'Kilometro 4 #25', '1692300878proyectosejecutados1.png', 'En planeación', '2023-08-18 00:34:38', '2023-08-18 00:34:38', 760000000),
	(14, 6, 6, 'Proyecto Sena', 'Kilometro 4 #25', '1692301024proyectosejecutados3.png', 'En planeacion', '2023-08-18 00:37:04', '2023-08-18 00:37:04', 720000000),
	(15, 2, 2, 'Construccion Medellin', 'Kilometro 4 #33-44', '1692812250proyectosejecutados3.png', 'finalizado', '2023-08-23 22:37:30', '2023-08-23 22:37:30', 600000000),
	(16, 10, 1, 'Proyecto casa sebastian', 'Kilometro 4 #33-44', '1693709930proyectosejecutados1.png', 'En planeación', '2023-09-03 07:53:51', '2023-09-03 08:00:17', 950000000);

-- Volcando estructura para tabla constructora.socios
CREATE TABLE IF NOT EXISTS `socios` (
  `IdSocio` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdSocio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.socios: ~4 rows (aproximadamente)
INSERT INTO `socios` (`IdSocio`, `Nombre`, `Apellido`, `created_at`, `updated_at`) VALUES
	(1, 'Carla', 'Díaz', '2023-08-10 22:49:26', '2023-08-10 22:49:26'),
	(2, 'Jorge', 'Gutiérrez', '2023-08-10 22:49:26', '2023-08-10 22:49:26'),
	(3, 'Lucía', 'Sánchez', '2023-08-10 22:49:26', '2023-08-10 22:49:26'),
	(4, 'Gabriel', 'Castillo', '2023-08-10 22:49:26', '2023-08-10 22:49:26');

-- Volcando estructura para tabla constructora.tipomateriaprimas
CREATE TABLE IF NOT EXISTS `tipomateriaprimas` (
  `IdTipoMateriaPrima` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdTipoMateriaPrima`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.tipomateriaprimas: ~0 rows (aproximadamente)
INSERT INTO `tipomateriaprimas` (`IdTipoMateriaPrima`, `Nombre`, `created_at`, `updated_at`) VALUES
	(1, 'Petreo', '2023-09-03 05:15:13', '2023-09-03 05:15:13'),
	(2, 'Acabado', '2023-09-03 05:15:13', '2023-09-03 05:15:13'),
	(3, 'Estructural', '2023-09-03 05:15:13', '2023-09-03 05:15:13'),
	(4, 'Metalico', '2023-09-03 05:15:13', '2023-09-03 05:15:13'),
	(5, 'Ceramico', '2023-09-03 05:15:13', '2023-09-03 05:15:13'),
	(6, 'Aislante', '2023-09-03 05:15:13', '2023-09-03 05:15:13'),
	(7, 'Ecológico', '2023-09-03 05:15:13', '2023-09-03 05:15:13'),
	(8, 'Protección', '2023-09-03 05:15:13', '2023-09-03 05:15:13');

-- Volcando estructura para tabla constructora.trabajadores
CREATE TABLE IF NOT EXISTS `trabajadores` (
  `IdTrabajador` int NOT NULL AUTO_INCREMENT,
  `NumDocumento` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdTrabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla constructora.trabajadores: ~0 rows (aproximadamente)

-- Volcando estructura para tabla constructora.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla constructora.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
