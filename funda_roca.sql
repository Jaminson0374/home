-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2023 a las 00:46:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `funda_roca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acompanantes`
--

CREATE TABLE `acompanantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipodocumento_id` bigint(20) UNSIGNED NOT NULL,
  `num_documento` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo_id` bigint(20) UNSIGNED NOT NULL,
  `direccion_res` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonos` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentezco` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `acompanantes`
--

INSERT INTO `acompanantes` (`id`, `tipodocumento_id`, `num_documento`, `nombre`, `apellidos`, `sexo_id`, `direccion_res`, `telefonos`, `email`, `parentezco`, `fecha_creacion`, `observacion`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '500000', 'karla', 'martha', 1, 'gffg', '121', 'jj@hotmail.com', 'hijo', '2023-06-06', 'ok', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_medic_user`
--

CREATE TABLE `admin_medic_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datosbasicos_id` bigint(20) UNSIGNED NOT NULL,
  `articulos_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_tratamiento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duracion_dias` int(11) DEFAULT NULL,
  `indefinido` int(11) DEFAULT NULL COMMENT 'si el micamento hay que admnistrar indefinidamente',
  `dosis` float NOT NULL,
  `unimedidas_id` bigint(20) UNSIGNED NOT NULL,
  `pososlogia_t` int(11) NOT NULL COMMENT 'cada cuanto hay que admin el medicaento',
  `pososlogia_h_d` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'si es en horas o días',
  `tipoadmin_med_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL COMMENT 'fecha en la que inicia el tratamiento',
  `fecha_finalizacion` date DEFAULT NULL COMMENT 'fecha en la que inicia el tratamiento',
  `hora_administracion` time DEFAULT NULL,
  `suspendido` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ON = no suspendido, OFF = si suspendido',
  `motivo_suspen` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finalizar_admin` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicaciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empleados_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admin_medic_user`
--

INSERT INTO `admin_medic_user` (`id`, `datosbasicos_id`, `articulos_id`, `nombre_tratamiento`, `duracion_dias`, `indefinido`, `dosis`, `unimedidas_id`, `pososlogia_t`, `pososlogia_h_d`, `tipoadmin_med_id`, `fecha_inicio`, `fecha_finalizacion`, `hora_administracion`, `suspendido`, `motivo_suspen`, `finalizar_admin`, `indicaciones`, `observacion`, `anulado`, `user_id`, `created_at`, `updated_at`, `empleados_id`) VALUES
(5, 1, 1, 'fsdfsdfdsgfsdgsgsgs gsdgsdgsgsd', 8, NULL, 5, 7, 8, 'Horas', 2, '2023-08-01', NULL, '02:00:48', 'on', NULL, NULL, 'gdsfhhf dhdfhdh dhdhd dhdhdhd', NULL, NULL, 1, '2023-08-02 10:02:03', '2023-08-02 10:02:03', 7),
(6, 1, 1, 'JJGJHG', 8, NULL, 5, 7, 8, 'Horas', 2, '2023-08-02', NULL, '10:30:42', 'on', NULL, NULL, 'OIUOPUOIUOIPUIUIOU', NULL, NULL, 1, '2023-08-02 18:31:27', '2023-08-02 18:31:27', 7),
(7, 1, 1, 'jgjigjghghgh', 8, NULL, 5, 7, 8, 'Horas', 2, '2023-08-08', NULL, '10:00:13', 'on', NULL, NULL, 'kjkjkjk', NULL, NULL, 1, '2023-08-02 18:54:21', '2023-08-02 18:54:21', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camas`
--

CREATE TABLE `camas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cubiculo_id` bigint(20) UNSIGNED NOT NULL,
  `num_cama` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `funciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `codigo`, `descripcion`, `categoria_id`, `funciones`, `created_at`, `updated_at`) VALUES
(6, '001', 'Auxiliar de enfermería', 2, NULL, NULL, NULL),
(7, '0002', 'Jefa(a) de enfermería', 2, NULL, NULL, NULL),
(8, '003', 'Auxiliar de sistemas', 1, NULL, NULL, NULL),
(9, '', 'Contador público', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_empleado`
--

CREATE TABLE `categoria_empleado` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_empleado`
--

INSERT INTO `categoria_empleado` (`id`, `descripcion`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 'Area Administrativa', NULL, NULL, NULL),
(2, 'Area de la salud', NULL, NULL, NULL),
(3, 'Area de Manipulación de Alimentos', NULL, NULL, NULL),
(4, 'Area de Aseo', NULL, NULL, NULL),
(5, 'Area de Mantenimiento', NULL, NULL, NULL),
(6, 'Area de Mensajería', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_medicas`
--

CREATE TABLE `citas_medicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datosbasicos_id` bigint(20) UNSIGNED NOT NULL,
  `tiposcita_id` bigint(20) UNSIGNED NOT NULL,
  `especialidades_id` bigint(20) UNSIGNED NOT NULL,
  `tipoatencion_id` bigint(20) UNSIGNED NOT NULL,
  `medico_remite_id` bigint(20) UNSIGNED NOT NULL,
  `riesgo_cita` int(11) NOT NULL COMMENT 'bajo, medio, alto ',
  `fecha_pedido_cita` date NOT NULL COMMENT 'fecha en la que pidió la cita medica',
  `fecha_cita` date NOT NULL,
  `comentario_cita` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Acerca de la solicitud d ela cita',
  `hora_cita` time DEFAULT NULL COMMENT 'hora que tiene programada la cita',
  `hora_ingreso_cita` time DEFAULT NULL,
  `hora_salida_cita` time DEFAULT NULL,
  `duracion_cita` int(11) DEFAULT NULL,
  `Procedimiento_realizado` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proxima_cita` date DEFAULT NULL,
  `formulacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Descripcion de la formula',
  `archivo_cita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'puede ser una imagen o Pdf',
  `recomendaciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cumplio_cita` int(11) DEFAULT NULL COMMENT 'si=1, No=2 y motivo',
  `motivo_nocumplimiento` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'se activa si no cumplió la cita',
  `cita_cercana` int(11) DEFAULT NULL,
  `estado_citas` int(11) NOT NULL,
  `total_citas` int(11) DEFAULT NULL,
  `citas_pendientes` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinica_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `citas_medicas`
--

INSERT INTO `citas_medicas` (`id`, `datosbasicos_id`, `tiposcita_id`, `especialidades_id`, `tipoatencion_id`, `medico_remite_id`, `riesgo_cita`, `fecha_pedido_cita`, `fecha_cita`, `comentario_cita`, `hora_cita`, `hora_ingreso_cita`, `hora_salida_cita`, `duracion_cita`, `Procedimiento_realizado`, `proxima_cita`, `formulacion`, `archivo_cita`, `recomendaciones`, `cumplio_cita`, `motivo_nocumplimiento`, `cita_cercana`, `estado_citas`, `total_citas`, `citas_pendientes`, `user_id`, `deleted_at`, `created_at`, `updated_at`, `clinica_id`) VALUES
(1, 1, 5, 1, 2, 1, 1, '2023-07-18', '2023-07-05', 'aaaaaaaaaaaaaaaaaa', '13:57:13', '13:57:13', NULL, 20, 'aaaaaaaaaaaa', NULL, NULL, NULL, 'aaaaaaaaaaaaaaa', NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-20 09:55:22', '2023-07-21 08:28:33', 2),
(2, 1, 1, 6, 3, 1, 1, '2023-07-18', '2023-07-05', 'bine okgggfgdsgd', '05:00:13', '13:57:13', NULL, 51, 'detodoggg5545', NULL, NULL, NULL, 'xxxxxxxxxxxgggggxxx', NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-20 09:55:23', '2023-07-21 05:08:43', 3),
(3, 1, 2, 3, 2, 1, 2, '2023-06-27', '2023-07-03', 'gdfgsdgsgsdgdsgdsgdsgsdgds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-21 11:14:18', '2023-07-21 11:14:18', 1),
(4, 1, 2, 3, 1, 1, 1, '2023-07-05', '2023-07-03', 'fdgdgsdfgsdgsgs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-21 11:30:51', '2023-07-21 11:30:51', 1),
(5, 1, 2, 4, 2, 1, 1, '2023-07-05', '2023-07-10', 'vczxcvzxvx<', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-21 12:21:49', '2023-07-21 12:21:49', 2),
(6, 1, 1, 2, 2, 1, 1, '2023-07-26', '2023-07-31', 'HFDGHFSHGDFHDFHD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-26 23:26:41', '2023-07-26 23:26:41', 1),
(7, 1, 1, 2, 3, 1, 1, '2023-07-28', '2023-08-02', 'asdsadfsafsafsa', '16:00:12', NULL, NULL, 30, 'hdhdfhfdhshasdfsdfhdsf', NULL, NULL, 'C:\\xampp\\tmp\\phpD29F.tmp', 'fasfasfafas fafafa afafaf afsfasfafa asfasfasfasfasfafafafafa fafaf', NULL, NULL, NULL, 2, NULL, NULL, 1, NULL, '2023-07-28 23:54:29', '2023-07-28 23:59:39', 1),
(8, 1, 1, 2, 1, 1, 1, '2023-07-28', '2023-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-07-29 00:21:20', '2023-07-29 00:21:20', 1),
(9, 1, 1, 2, 2, 1, 1, '2023-08-01', '2023-09-05', 'VZXVZV', '16:50:38', NULL, NULL, 30, 'VVXCVXCVXCVXCVX', NULL, NULL, 'C:\\xampp\\tmp\\php89BA.tmp', 'C<C<C<C<C<C<C<', NULL, NULL, NULL, 2, NULL, NULL, 1, NULL, '2023-08-02 09:44:40', '2023-08-02 09:46:58', 1),
(10, 1, 1, 2, 2, 1, 1, '2023-08-02', '2023-09-05', 'FFDGFDFDFDFDFDFDFFFD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-08-02 18:25:54', '2023-08-02 18:25:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL,
  `departamento_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `descripcion`, `created_at`, `updated_at`, `pais_id`, `departamento_id`) VALUES
(1, 'MEDELLIN', NULL, NULL, 1, 1),
(2, 'BARRANQUILLA', NULL, NULL, 1, 2),
(3, 'MONTERIA', NULL, NULL, 1, 3),
(4, 'SINCELEJO', NULL, NULL, 1, 4),
(5, 'ALBANIA', NULL, NULL, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datosbasicos_id` bigint(20) UNSIGNED NOT NULL,
  `tiposervicio_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_afiliacion_id` bigint(20) UNSIGNED NOT NULL,
  `rango_eps_id` bigint(20) UNSIGNED NOT NULL,
  `cubiculos_id` bigint(20) UNSIGNED NOT NULL,
  `medico_remite_id` bigint(20) UNSIGNED NOT NULL,
  `acompanantes_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `num_dias` int(11) DEFAULT NULL,
  `empleado_id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'OF: inactivo y ON:activo',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citas_pendientes` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empresa_remite_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `datosbasicos_id`, `tiposervicio_id`, `tipo_afiliacion_id`, `rango_eps_id`, `cubiculos_id`, `medico_remite_id`, `acompanantes_id`, `fecha_ingreso`, `fecha_retiro`, `num_dias`, `empleado_id`, `estado`, `user_id`, `observacion`, `anulado`, `citas_pendientes`, `deleted_at`, `created_at`, `updated_at`, `empresa_remite_id`) VALUES
(12, 43, 3, 1, 1, 1, 1, 1, '2023-08-09', '2023-08-07', 30, 7, 'on', 1, 'JPOOPIOPOPOPOPOPUPUPOUPIUIU', NULL, NULL, NULL, '2023-08-02 18:23:57', '2023-08-02 18:23:57', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_datosbasicos`
--

CREATE TABLE `cliente_datosbasicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipodoc` bigint(20) UNSIGNED NOT NULL,
  `num_documento` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo_id` bigint(20) UNSIGNED NOT NULL,
  `grupoSanguineo_id` bigint(20) UNSIGNED NOT NULL,
  `nacionalidad_id` bigint(20) UNSIGNED NOT NULL,
  `departamento_id` bigint(20) UNSIGNED NOT NULL,
  `ciudad_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_res` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonos_user` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `estado_user` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'OF: inactivo y ON:activo',
  `citas_pendte` int(11) DEFAULT NULL,
  `tiposervicio_id` bigint(20) UNSIGNED NOT NULL,
  `diagnostico` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ult_fecha_evo` date DEFAULT NULL,
  `ult_hora_evo` time DEFAULT NULL,
  `ult_evolucion` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ult_fecha_admin_med` date DEFAULT NULL,
  `ult_hora_admin_med` time DEFAULT NULL,
  `ult_fecha_requisicion` date DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citas_pendientes` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente_datosbasicos`
--

INSERT INTO `cliente_datosbasicos` (`id`, `id_tipodoc`, `num_documento`, `nombre`, `apellidos`, `sexo_id`, `grupoSanguineo_id`, `nacionalidad_id`, `departamento_id`, `ciudad_id`, `fecha_nacimiento`, `edad`, `direccion_res`, `telefonos_user`, `email_user`, `fecha_creacion`, `estado_user`, `citas_pendte`, `tiposervicio_id`, `diagnostico`, `ult_fecha_evo`, `ult_hora_evo`, `ult_evolucion`, `ult_fecha_admin_med`, `ult_hora_admin_med`, `ult_fecha_requisicion`, `observacion`, `anulado`, `citas_pendientes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '72197877', 'Jaminson', 'Herrera', 1, 2, 1, 1, 1, '2023-06-12', '30', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-23', 'on', 10, 15, 'Usuario con epilepcia', '2023-07-28', '15:25:28', NULL, NULL, NULL, '2023-08-02', 'ok', NULL, NULL, NULL, '2023-06-26 10:32:41', '2023-08-02 18:25:54'),
(2, 2, '32889264', 'JUANA', 'OCHOA', 2, 3, 2, 6, 5, '2023-06-06', '15', 'CALLE DE LAS VACAS', '3188122565', 'JM@HOTMAIL.COM', '2023-06-22', 'on', NULL, 15, 'nada1', NULL, NULL, NULL, NULL, NULL, '2023-07-06', 'nada2', NULL, NULL, NULL, '2023-06-26 12:06:56', '2023-07-31 01:17:55'),
(3, 1, '1007071192', 'MAICOL ANDERSON', 'HERRERA SILVERA', 1, 3, 1, 1, 1, '2001-07-24', '21', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-14', 'on', NULL, 15, '1midi21', NULL, NULL, NULL, NULL, NULL, '2023-07-27', '1modi21', NULL, NULL, NULL, '2023-06-29 10:20:49', '2023-07-31 01:40:33'),
(4, 1, '32664485', 'JOSE GUILLERMO', 'HERRERA FLOREZ', 1, 2, 1, 1, 1, '2023-05-30', '30', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-14', 'on', NULL, 15, 'modificaco', NULL, NULL, NULL, NULL, NULL, NULL, 'actualk', NULL, NULL, NULL, '2023-06-29 13:17:25', '2023-06-29 13:17:25'),
(5, 1, '72165896', 'MANUEL ANTONIO', 'HERRERA SILVERA', 1, 1, 1, 2, 2, '2023-05-30', '30', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-14', 'on', NULL, 15, 'modificaco', NULL, NULL, NULL, NULL, NULL, NULL, 'actualk', NULL, NULL, NULL, '2023-06-29 13:17:25', '2023-06-29 13:17:25'),
(6, 1, '1007071192', 'MAICOL ANDERSON', 'HERRERA SILVERA', 1, 3, 1, 1, 1, '2023-05-30', '21', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-14', 'on', NULL, 15, '1gdfgf', NULL, NULL, NULL, NULL, NULL, NULL, '1dgdfg', NULL, NULL, NULL, '2023-07-01 00:29:37', '2023-07-01 00:29:37'),
(8, 1, '72165896', 'MANUEL ANTONIO', 'HERRERA SILVERA', 1, 1, 1, 1, 1, '2023-05-30', '53', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-14', 'on', NULL, 15, 'modificaco 2 veces', NULL, NULL, NULL, NULL, NULL, NULL, 'actualk 2 veces', NULL, NULL, NULL, '2023-07-01 01:23:10', '2023-07-01 01:23:10'),
(9, 1, '52452', 'PRUEBA PRUEBA', 'PRUEBA 2 PRUEBA2', 2, 1, 1, 1, 1, '2023-06-05', '30', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-15', 'on', NULL, 15, 'ghkhgk', NULL, NULL, NULL, NULL, NULL, NULL, 'ghkghkhg', NULL, NULL, NULL, '2023-07-01 03:45:13', '2023-07-12 07:36:23'),
(10, 2, '1007071189', 'ANGELICA JULIETH', 'HERRERA SILVERA', 2, 1, 1, 1, 1, '2023-05-30', '28', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-21', 'on', NULL, 15, 'dfhdfh OK', NULL, NULL, NULL, NULL, NULL, NULL, 'dfhdfhd OK', NULL, NULL, NULL, '2023-07-01 03:50:26', '2023-07-01 03:53:44'),
(11, 2, '1007071192', 'ELICER ANTONIO', 'SILVERA MARRIAGA', 1, 2, 1, 2, 2, '2004-05-09', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-06', 'on', NULL, 15, 'ELIECER', NULL, NULL, NULL, NULL, NULL, NULL, 'ELIECER2', NULL, NULL, NULL, '2023-07-10 08:11:37', '2023-07-10 08:11:37'),
(14, 1, '70198721', 'MANUEL DE JESUS', 'SILVERA MARRIAGA', 1, 3, 1, 2, 2, '1996-01-09', '27 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-12', 'on', NULL, 15, 'MAÑE', NULL, NULL, NULL, NULL, NULL, NULL, 'MAÑE', NULL, NULL, NULL, '2023-07-10 08:14:41', '2023-07-10 08:14:41'),
(16, 2, '10248587952', 'LILIANA MARIA', 'SILVERA MARRIAGA', 2, 2, 1, 1, 1, '1991-05-09', '32 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-12', 'on', NULL, 15, 'LILIANA', NULL, NULL, NULL, NULL, NULL, NULL, 'LILIANA2', NULL, NULL, NULL, '2023-07-10 08:23:39', '2023-07-10 08:23:39'),
(18, 1, '8254896', 'LUIS ANGULO', 'SILVERA MARRIAGA', 1, 2, 1, 2, 2, '2023-07-12', '-1 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-04', 'on', NULL, 15, 'DFDFD', NULL, NULL, NULL, NULL, NULL, NULL, 'DFDSF', NULL, NULL, NULL, '2023-07-10 08:28:58', '2023-07-10 08:28:58'),
(19, 2, '1007071188', 'ISAAC JOSE', 'CONDE HERRERA', 1, 2, 1, 1, 1, '1994-02-09', '16 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-02', 'on', NULL, 15, 'OK', NULL, NULL, NULL, NULL, NULL, NULL, 'OK', NULL, NULL, NULL, '2023-07-10 08:31:17', '2023-07-10 08:31:17'),
(21, 3, 'RGHJK121212', 'MARGARITA MARIA', 'HERRERA FLOREZ', 2, 3, 1, 1, 1, '2023-07-02', '29 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-27', 'on', NULL, 15, 'DSFSDF', NULL, NULL, NULL, NULL, NULL, NULL, 'SDFSDFS', NULL, NULL, NULL, '2023-07-10 08:32:40', '2023-07-10 08:32:40'),
(24, 3, 'RC7899333', 'MERLINA ANTONIA', 'SIMANCA SEPULVEDA', 2, 2, 2, 6, 5, '2023-07-10', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-20', 'on', NULL, 15, 'ASDASD', NULL, NULL, NULL, NULL, NULL, NULL, 'ASDASDAS', NULL, NULL, NULL, '2023-07-10 08:33:55', '2023-07-10 08:33:55'),
(28, 1, '711084758', 'MARTA JOSE', 'ARAGON JOTA', 2, 3, 1, 1, 1, '2000-02-10', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-11', 'on', NULL, 15, 'FGSG', NULL, NULL, NULL, NULL, NULL, NULL, 'DFASGFADSFA', NULL, NULL, NULL, '2023-07-10 09:20:30', '2023-07-10 09:20:30'),
(29, 2, '701017879', 'MARTA JOSE', 'PALOMINO LASCARRO', 2, 3, 1, 1, 1, '1984-09-09', '38 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-06-26', 'on', NULL, 15, 'A', NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, '2023-07-10 09:23:05', '2023-07-10 09:23:05'),
(30, 1, '95878789', 'VIVIANA MARIA', 'JOSEFA MATIA', 2, 3, 1, 1, 1, '2023-07-04', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-04', 'on', NULL, 15, 'ASDSD', NULL, NULL, NULL, NULL, NULL, NULL, 'ASDSADSA', NULL, NULL, NULL, '2023-07-10 09:35:49', '2023-07-10 09:35:49'),
(31, 1, '545484848484', 'nkncfkas askfdhsakhf', 'kashdksa asjhsaf', 1, 2, 2, 6, 5, '2023-07-11', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-19', 'on', NULL, 15, 'vsdfsf', NULL, NULL, NULL, NULL, NULL, NULL, 'sgsdgsd', NULL, NULL, NULL, '2023-07-10 10:37:11', '2023-07-10 10:37:11'),
(32, 1, '545484848484', 'nkncfkas askfdhsakhf', 'kashdksa asjhsaf', 1, 2, 2, 6, 5, '2023-07-11', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-19', 'on', NULL, 15, 'vsdfsf', NULL, NULL, NULL, NULL, NULL, NULL, 'sgsdgsd', NULL, NULL, NULL, '2023-07-10 10:37:11', '2023-07-10 10:37:11'),
(34, 2, '222222222222222', 'jota jota', 'jota jo', 1, 2, 1, 1, 1, '2023-07-04', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-04', 'on', NULL, 15, 'gfsdfgsdg', NULL, NULL, NULL, NULL, NULL, NULL, 'sgsdgs', NULL, NULL, NULL, '2023-07-10 16:44:45', '2023-07-10 16:44:45'),
(35, 2, '999999999999', 'MMMMMMM', 'MMMMMMMMM', 1, 3, 1, 1, 1, '2023-07-04', '0 Años', 'KHFKHZXKFH', '3133313', 'JAMIN@GMAIL.COM', '2023-07-12', 'on', NULL, 15, 'ddd', NULL, NULL, NULL, NULL, NULL, NULL, 'ddd', NULL, NULL, NULL, '2023-07-10 17:01:53', '2023-07-10 17:01:53'),
(37, 1, '88888888888', 'jjjjjjjjj', 'jjjjjjjjj', 1, 3, 1, 1, 1, '2023-06-26', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-18', 'on', NULL, 15, 'gfgdg', NULL, NULL, NULL, NULL, NULL, NULL, 'sgsgsgsd', NULL, NULL, NULL, '2023-07-10 17:42:01', '2023-07-10 17:42:01'),
(39, 2, '666666666666666', '66666666', '6666666', 1, 3, 2, 6, 5, '2023-07-11', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-19', 'on', NULL, 15, 'ncvncn', NULL, NULL, NULL, NULL, NULL, NULL, 'bnxdbxbx', NULL, NULL, NULL, '2023-07-10 17:54:04', '2023-07-10 17:54:04'),
(40, 2, '7000000', 'JUANA MARIA', 'DE ARCOS TILAN', 1, 3, 1, 1, 1, '2023-07-04', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-05', 'on', NULL, 15, 'ADFASDAS', NULL, NULL, NULL, NULL, NULL, NULL, 'ASDASDAS', NULL, NULL, NULL, '2023-07-11 03:36:54', '2023-07-11 03:36:54'),
(41, 3, 'RC7000000', 'MARIA DE ARCO', 'GONZALEZ GONZALEZ', 1, 3, 2, 6, 5, '2023-07-11', '0 Años', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-28', 'on', NULL, 15, 'FGSDGDSG', NULL, NULL, NULL, NULL, NULL, NULL, 'SGSDGSD', NULL, NULL, NULL, '2023-07-11 03:38:22', '2023-07-11 03:38:22'),
(42, 2, '32889264', 'Jaminson', 'Herrera', 1, 1, 1, 2, 2, '2023-07-03', '0', 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-07-21', 'on', NULL, 15, 'EL PACIENTE SUFRE ALERGIAS', NULL, NULL, NULL, NULL, NULL, NULL, 'ASDASDSADAS', NULL, NULL, NULL, '2023-07-26 23:07:36', '2023-07-26 23:07:36'),
(43, 1, 'JKLJKJ', 'Jaminson', 'Herrera', 1, 1, 1, 2, 2, '2003-05-02', NULL, 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', '2023-08-16', 'on', NULL, 3, 'JKJKJHKJ', NULL, NULL, NULL, NULL, NULL, NULL, 'LKLKLK', NULL, NULL, NULL, '2023-08-02 18:22:35', '2023-08-02 18:23:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinicas`
--

CREATE TABLE `clinicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidad` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observación` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clinicas`
--

INSERT INTO `clinicas` (`id`, `nombre`, `nit`, `direccion`, `telefono`, `representante`, `especialidad`, `observación`, `created_at`, `updated_at`) VALUES
(1, 'CLÍNICA GENERAL DEL NORTE ', '9008005456', 'CARRERA 54 # 80-12', '3114802556', 'XXXXXXXX', 'XXXXXXXXXXXX', 'XXXXXXXXXXXX', NULL, NULL),
(2, 'CLINICA PORTO AZUL', '9008005456', 'CORREDOR UNIVERSITARIO', '3114802556', 'XXXXXXXX', 'XXXXXXXXXXXX', 'XXXXXXXXXXXX', NULL, NULL),
(3, 'CLÍNICA GENERAL DEL REINA CATALINA ', '9008005456', 'CARRERA 54 # 80-12', '3114802556', 'XXXXXXXX', 'XXXXXXXXXXXX', 'XXXXXXXXXXXX', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecutivos`
--

CREATE TABLE `consecutivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consecutivo` int(11) DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `consecutivos`
--

INSERT INTO `consecutivos` (`id`, `codigo`, `descripcion`, `consecutivo`, `anulado`, `created_at`, `updated_at`) VALUES
(1, '0001', 'REQUISICIONES DE MEDICAMENTOS', 149, NULL, NULL, '2023-08-02 10:06:07'),
(2, '0002', 'REMISIONES', 100, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cubiculos`
--

CREATE TABLE `cubiculos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasillo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cubiculos`
--

INSERT INTO `cubiculos` (`id`, `codigo`, `descripcion`, `pasillo`, `seccion`, `observacion`, `created_at`, `updated_at`) VALUES
(1, '10', 'CUADRADO', '1', '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_auxiliares`
--

CREATE TABLE `datos_auxiliares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_tabla` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruta` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_formulario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos_auxiliares`
--

INSERT INTO `datos_auxiliares` (`id`, `descripcion`, `nombre_tabla`, `ruta`, `nombre_formulario`, `anulado`, `created_at`, `updated_at`) VALUES
(1, 'EPS', 'empresa_remite', 'epsCreate', 'eps', NULL, NULL, NULL),
(2, 'CLINICAS', NULL, NULL, '', NULL, NULL, NULL),
(3, 'TIPO DE SERVICIOS', NULL, NULL, '', NULL, NULL, NULL),
(4, 'GRUPO O RANGOS DE EPS', NULL, NULL, '', NULL, NULL, NULL),
(5, 'TIPO DE AFILIACION', NULL, NULL, '', NULL, NULL, NULL),
(6, 'CUBICULOS', NULL, NULL, '', NULL, NULL, NULL),
(7, 'CAMAS', NULL, NULL, '', NULL, NULL, NULL),
(8, 'GENERO ', NULL, NULL, '', NULL, NULL, NULL),
(9, 'GRUPO RH ', NULL, NULL, '', NULL, NULL, NULL),
(10, 'ESTADOS DE CITA', NULL, NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pais_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `descripcion`, `created_at`, `updated_at`, `pais_id`) VALUES
(1, 'ANTIOQUIA', NULL, NULL, 1),
(2, 'ATLANTICO', NULL, NULL, 1),
(3, 'CORDOBA', NULL, NULL, 1),
(4, 'SUCRE', NULL, NULL, 1),
(5, 'CESAR', NULL, NULL, 1),
(6, 'TACHIRA', NULL, NULL, 2),
(7, 'CARACAS', NULL, NULL, 2),
(8, 'MARACAIBO', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipodocumento_id` bigint(20) UNSIGNED NOT NULL,
  `num_documento` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo_id` bigint(20) UNSIGNED NOT NULL,
  `gruposanguineo_id` bigint(20) UNSIGNED NOT NULL,
  `nacionalidad_id` bigint(20) UNSIGNED NOT NULL,
  `departamento_id` bigint(20) UNSIGNED NOT NULL,
  `ciudad_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_ncmto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_res` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonos` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre_familiar` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentezco_familiar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_familiar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_famliar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipocontrato_id` bigint(20) UNSIGNED NOT NULL,
  `profesion_id` bigint(20) UNSIGNED NOT NULL,
  `hoja_vida` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `estado` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'OF: inactivo y ON:activo',
  `funciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profesiones_id` bigint(20) UNSIGNED DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `tipodocumento_id`, `num_documento`, `nombre`, `apellidos`, `foto`, `sexo_id`, `gruposanguineo_id`, `nacionalidad_id`, `departamento_id`, `ciudad_id`, `fecha_nacimiento`, `lugar_ncmto`, `edad`, `direccion_res`, `telefonos`, `email`, `cargo_id`, `categoria_id`, `nombre_familiar`, `parentezco_familiar`, `telefono_familiar`, `email_famliar`, `salario`, `tipocontrato_id`, `profesion_id`, `hoja_vida`, `fecha_inicio`, `estado`, `funciones`, `profesiones_id`, `observacion`, `anulado`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 1, '1007071192', 'JUAN', 'PREZ', 'C:\\xampp\\tmp\\php9B6C.tmp', 1, 1, 1, 1, 1, '2000-06-01', 'Caucasia Antioquia', NULL, 'Calle 98 # 59 - 65', '3114201137', 'jaminson1374@gmail.com', 6, 2, '4444444444444', 'dhdfhd', '3114201137', 'jaminson1374@gmail.com', NULL, 4, 1, 'C:\\xampp\\tmp\\php9B6D.tmp', '2023-08-01', 'on', 'RGSGSDGSD', NULL, 'FASFASFAS', NULL, NULL, '2023-08-02 09:25:12', '2023-08-02 09:25:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_razon_Social` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_representante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolucion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consecutivo_inicio` int(11) NOT NULL,
  `consecutivo_final` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_remite`
--

CREATE TABLE `empresa_remite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_empresa_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresa_remite`
--

INSERT INTO `empresa_remite` (`id`, `descripcion`, `direccion`, `telefono`, `contacto`, `anulado`, `observacion`, `created_at`, `updated_at`, `tipo_empresa_id`) VALUES
(4, 'SURA EPS S.A.', 'XXXXXXX', 'XXXXXXXXXX', 'XXXXXXXXXXX', NULL, NULL, NULL, NULL, 1),
(5, 'MUTUALSER EPS S.A.', 'XXXXXXX', 'XXXXXXXXXX', 'XXXXXXXXXXX', NULL, NULL, NULL, NULL, 1),
(6, 'SALUT TOTAL EPS S.A.', 'XXXXXXX', 'XXXXXXXXXX', 'XXXXXXXXXXX', NULL, NULL, NULL, NULL, 1),
(7, 'SALUCOP EPS S.A.', 'XXXXXXX', 'XXXXXXXXXX', 'XXXXXXXXXXX', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `descripcion`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 'MEDICINA GENERAL', 'XXXXXXXXX', NULL, NULL),
(2, 'LABORATORIO', 'XXXXXXXXX', NULL, NULL),
(3, 'ESPECIALISTA', 'XXXXXXXXX', NULL, NULL),
(4, 'ODONTOLOGIA', 'XXXXXXXXX', NULL, NULL),
(5, 'FISIOTERAPIA', 'XXXXXXXXX', NULL, NULL),
(6, 'CIRUGIA', 'XXXXXXXXX', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_sigvitales`
--

CREATE TABLE `estado_sigvitales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_sigvitales`
--

INSERT INTO `estado_sigvitales` (`id`, `descripcion`, `anulado`, `created_at`, `updated_at`) VALUES
(1, 'Mormal', NULL, NULL, NULL),
(2, 'Regular', NULL, NULL, NULL),
(3, 'Deficiente', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion`
--

CREATE TABLE `evolucion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evolucion`
--

INSERT INTO `evolucion` (`id`, `descripcion`, `observacion`, `created_at`, `updated_at`) VALUES
(1, 'Positiva', NULL, NULL, NULL),
(2, 'Estacionaria', NULL, NULL, NULL),
(3, 'Gegativa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion_diaria`
--

CREATE TABLE `evolucion_diaria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datosbasicos_id` bigint(20) UNSIGNED NOT NULL,
  `empleado_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `subjetivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `objetivo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diag_signos_vit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apreciacion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evolucion_final` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signosv_ta` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signosv_pc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signosv_fr` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signosv_t` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signosv_p` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `evolucion_id` bigint(20) UNSIGNED NOT NULL,
  `recomendaciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs_general` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado_sigvitales_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'MENSUAL', NULL, NULL),
(2, 'QUINCENAL', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grp_sangre`
--

CREATE TABLE `grp_sangre` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grp_sangre`
--

INSERT INTO `grp_sangre` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'O+', NULL, NULL),
(2, 'A+', NULL, NULL),
(3, 'B+', NULL, NULL),
(4, 'AB+', NULL, NULL),
(5, 'A-', NULL, NULL),
(6, 'O-', NULL, NULL),
(7, 'B-', NULL, NULL),
(8, 'AB', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hitorial_cita_med`
--

CREATE TABLE `hitorial_cita_med` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `citamed_id` bigint(20) UNSIGNED NOT NULL,
  `datosbasicos_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_articulos`
--

CREATE TABLE `inv_articulos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referencia` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `linea_id` bigint(20) UNSIGNED NOT NULL,
  `unimedidas_id` bigint(20) UNSIGNED NOT NULL,
  `proveedor_id` bigint(20) UNSIGNED NOT NULL,
  `stock_min` double DEFAULT NULL,
  `stock_max` double DEFAULT NULL,
  `inv_inicial` double DEFAULT NULL,
  `cant_entrada` double DEFAULT NULL,
  `cant_salidas` double DEFAULT NULL,
  `cant_ajustes` double DEFAULT NULL,
  `existencia` double DEFAULT NULL,
  `pcosto` double DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `pventa` double DEFAULT NULL,
  `fecha_ingreso` double DEFAULT NULL,
  `ult_fecha_compra` double DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inv_articulos`
--

INSERT INTO `inv_articulos` (`id`, `referencia`, `descripcion`, `abreviatura`, `categoria_id`, `linea_id`, `unimedidas_id`, `proveedor_id`, `stock_min`, `stock_max`, `inv_inicial`, `cant_entrada`, `cant_salidas`, `cant_ajustes`, `existencia`, `pcosto`, `iva`, `pventa`, `fecha_ingreso`, `ult_fecha_compra`, `anulado`, `imagen`, `created_at`, `updated_at`) VALUES
(1, '1010', 'Captopril (Capoten)', 'CP', 1, 1, 1, 1, 10, 30, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'JHJHJH41FGHFG', 'FGHJFGJFGJ', 'FJFGJ', 1, 1, 1, 1, 10, 19, NULL, NULL, NULL, NULL, NULL, 1000, 19, 3000, NULL, NULL, NULL, NULL, '2023-07-31 05:22:54', '2023-07-31 05:22:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_categorias`
--

CREATE TABLE `inv_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inv_categorias`
--

INSERT INTO `inv_categorias` (`id`, `descripcion`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'MEDICAMENTOS', 'MED', NULL, NULL),
(2, 'ASEO', '', NULL, NULL),
(3, 'ALIMENTOS', 'ALI', NULL, NULL),
(4, 'PAÑALERIA', '', NULL, NULL),
(5, 'LVANDERIA', 'LAV', NULL, NULL),
(6, 'SABANAS', 'SAB', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_ccostos`
--

CREATE TABLE `inv_ccostos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inv_ccostos`
--

INSERT INTO `inv_ccostos` (`id`, `codigo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '01', 'BODEGA', NULL, NULL),
(2, '02', 'ENFERMERIA', NULL, NULL),
(3, '03', 'COCINA', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_conceptos`
--

CREATE TABLE `inv_conceptos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_documentos`
--

CREATE TABLE `inv_documentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuenta_afectada` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_inventario`
--

CREATE TABLE `inv_inventario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consecutivo` int(11) DEFAULT NULL,
  `articulo_id` bigint(20) UNSIGNED NOT NULL,
  `cant_entrada` double DEFAULT NULL,
  `cant_salida` double DEFAULT NULL,
  `fecha_ing_sal` date DEFAULT NULL,
  `documento_ing_sal` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentos_id` bigint(20) UNSIGNED NOT NULL,
  `conceptos_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_lineas`
--

CREATE TABLE `inv_lineas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inv_lineas`
--

INSERT INTO `inv_lineas` (`id`, `codigo`, `categoria_id`, `descripcion`, `anulado`, `created_at`, `updated_at`) VALUES
(1, '01', 1, 'PASTILLAS', NULL, NULL, NULL),
(2, '02', 1, 'JARABES', NULL, NULL, NULL),
(3, '03', 2, 'JABONES', NULL, NULL, NULL),
(4, '04', 3, 'HARINAS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_proveedores`
--

CREATE TABLE `inv_proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nit_cedula` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representante` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupo_credito` int(11) DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inv_proveedores`
--

INSERT INTO `inv_proveedores` (`id`, `nit_cedula`, `nombre`, `direccion`, `telefono`, `representante`, `cupo_credito`, `plazo`, `anulado`, `created_at`, `updated_at`) VALUES
(1, '30154785', 'JOTA JOTA', '', '', '', 0, 0, NULL, NULL, NULL),
(2, '52897561', 'MARIA URRUTIA', '', '', '', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_unimedidas`
--

CREATE TABLE `inv_unimedidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inv_unimedidas`
--

INSERT INTO `inv_unimedidas` (`id`, `descripcion`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Unidad', 'Un', NULL, NULL),
(2, 'Libra', 'Lb', NULL, NULL),
(3, 'Kilogramos', 'Kg', NULL, NULL),
(4, 'Gramos', 'Gs', NULL, NULL),
(5, 'Miligramos ', 'Mg', NULL, NULL),
(6, 'Litro', 'Lt', NULL, NULL),
(7, 'Centimetros cúbicos (C3)', 'C3', NULL, NULL),
(8, 'Metro', 'Mt', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos_externos`
--

CREATE TABLE `medicos_externos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_identidad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizacion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'organizacion a la que pertenece',
  `direccion_residencial` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_laboral` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo_id` bigint(20) UNSIGNED NOT NULL,
  `telefono` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidad` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tprofesional` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicos_externos`
--

INSERT INTO `medicos_externos` (`id`, `doc_identidad`, `nombre`, `organizacion`, `direccion_residencial`, `direccion_laboral`, `sexo_id`, `telefono`, `especialidad`, `tprofesional`, `created_at`, `updated_at`) VALUES
(1, '1012545115', 'JOSEFA MARIA DE LOS RAMOS', 'SURA', 'BARRANQUILLA', 'BARRANQUILLA', 2, '45545555', 'GINECOLOGA', 'MPY4554545', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_04_07_181057_create_cargos_table', 3),
(8, '2023_04_07_180252_create_tipo_servicios_table', 4),
(10, '2014_10_12_000000_create_users_table', 5),
(20, '2023_04_09_210736_create_tipo_documentos_table', 6),
(23, '2023_04_24_033236_create_tiposervicios_table', 8),
(28, '2023_06_05_112336_create_sexo_table', 12),
(29, '2023_06_05_113040_create_pais_table', 12),
(30, '2023_06_05_113413_create_departamentos_table', 12),
(31, '2023_06_05_114455_create_ciudades_table', 12),
(32, '2023_06_05_115004_create_grp_sangre_table', 12),
(33, '2023_06_05_122000_create_tipo_empresa_remite_table', 13),
(36, '2023_06_05_145225_create_empresa_remite_table', 15),
(38, '2023_06_06_034150_create_rango_eps_table', 16),
(39, '2023_06_06_034245_create_cubiculos_table', 16),
(42, '2023_06_06_160140_create_empresas_table', 17),
(44, '2023_06_06_033931_create_tipo_afiliacion_table', 18),
(45, '2023_06_06_163111_create_forma_pago_table', 19),
(50, '2023_06_06_035059_create_acompanantes_table', 20),
(51, '2023_06_06_043402_create_empleados_table', 20),
(55, '2023_06_05_133517_create_cliente_datosbasicos_table', 22),
(57, '2023_07_06_032959_create_medicos_externos_table', 23),
(61, '2023_07_06_034949_create_clientes_table', 24),
(62, '2023_07_15_003010_create_tipo_atencion_table', 25),
(63, '2023_07_15_003136_create_tipos_cita_table', 25),
(64, '2023_07_15_003202_create_clinicas_table', 25),
(65, '2023_07_15_033710_create_especialidades_table', 26),
(66, '2023_07_15_033748_create_citas_medicas_table', 26),
(67, '2023_07_15_040332_create_tipo_atencion_table', 27),
(68, '2023_07_15_040557_create_tipos_cita_table', 27),
(69, '2023_07_15_040649_create_especialidades_table', 27),
(70, '2023_07_15_040728_create_clinicas_table', 27),
(71, '2023_07_15_040838_create_citas_medicas_table', 27),
(72, '2023_07_15_115553_add_profession_to_empresa_remite', 28),
(73, '2023_07_15_121108_add_nuevascolumnas_to_empresa_remite', 29),
(74, '2023_07_15_121428_add_eliminarcolumnas_to_empresa_remite', 30),
(75, '2023_07_15_121941_delete_eliminarcolumnas_to_empresa_remite', 31),
(76, '2023_07_15_121941_add_eliminarcolumnas_to_empresa_remite', 32),
(77, '2023_07_15_125218_add_adicionacolumna_to_empresa_remite', 33),
(78, '2023_07_15_125559_add_adiciona_tipo_empresa_id_to_empresa_remite', 34),
(79, '2023_07_15_131543_add_adiciona_empresa_remite_id_to_clientes', 35),
(80, '2023_07_15_143438_add_clientes_to_clientes', 36),
(81, '2023_07_15_144321_add_clientesservicios_to_clientes_datosbasicos', 37),
(82, '2023_07_15_144620_add_columnas_to_citas_medicas', 38),
(83, '2023_07_15_150200_add_columnas_to_citas_medicas', 39),
(84, '2023_07_15_155730_add_columnas_to_citas_medicas', 40),
(85, '2023_07_17_165353_create_hitorial_cita_med_table', 41),
(86, '2023_07_17_171842_add_columna_to_citas_medicas_table', 41),
(87, '2023_07_19_011444_add_columna_estado_to_citas_medicas', 42),
(88, '2023_07_20_020946_drop_clientes_service_id_column_on_citas_medicas_table', 43),
(89, '2023_07_20_041415_add_columncitas_to_citas_medicas_table', 44),
(90, '2023_07_20_042007_drop_fecha_reprograma_cita_column_on_citas_medicas_table', 45),
(91, '2023_07_21_021218_add_columdbasico_to_cliente_datosbasicos_table', 46),
(92, '2023_07_22_183751_create_evolucion_table', 47),
(93, '2023_07_22_194135_create_camas_table', 47),
(94, '2023_07_22_195129_create_evolucion_diaria_table', 48),
(97, '2023_07_24_033155_create_categoria_empleado_table', 51),
(98, '2023_07_24_034717_add_categoria_to_empleados_table', 52),
(99, '2023_07_24_034936_add_colapoyo_to_evolucion_diaria_table', 53),
(100, '2023_07_24_183948_add_anulado_to_evolucion_diaria_table', 54),
(101, '2023_07_24_184027_add_anulado_to_empleados_table', 54),
(102, '2023_07_24_184332_add_anulado_to_cliente_datosbasicos_table', 54),
(103, '2023_07_24_184543_add_anulado_to_clientes_table', 54),
(104, '2023_07_24_184719_add_anulado_to_empresa_remite_table', 54),
(105, '2023_07_25_071208_add_signosv_p_to_evolucion_diaria_table', 55),
(106, '2023_07_25_205449_create_estado_sigvitales_table', 56),
(107, '2023_07_26_190333_create_inv_categorias_table', 57),
(108, '2023_07_26_190518_create_inv_unimedidas_table', 57),
(109, '2023_07_26_190632_create_inv_ccostos_table', 57),
(110, '2023_07_26_190912_create_inv_proveedores_table', 57),
(111, '2023_07_26_195930_create_inv_documentos_table', 57),
(112, '2023_07_26_200040_create_inv_conceptos_table', 57),
(116, '2023_07_26_233714_create_inv_inventario_table', 59),
(117, '2023_07_26_232812_create_inv_lineas_table', 60),
(118, '2023_07_26_233607_create_inv_articulos_table', 61),
(119, '2023_07_27_065048_create_reaccion_medicamento_table', 62),
(120, '2023_07_27_072346_create_tipo_admin_med_user_table', 62),
(121, '2023_07_27_130855_create_admin_medic_user_table', 63),
(122, '2023_07_27_132156_create_mov_admin_medic_user_table', 64),
(123, '2023_07_28_050504_add_empleado_id_to_admin_medic_user_table', 65),
(125, '2023_07_29_031728_create_consecutivos_table', 66),
(126, '2023_07_29_032036_create_requisicion_medicamento_table', 67),
(127, '2023_07_31_193319_create_tipo_contrato_table', 68),
(128, '2023_07_31_193344_create_profesiones_table', 68),
(129, '2023_08_02_154826_create_datos_auxiliares_table', 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mov_admin_medic_user`
--

CREATE TABLE `mov_admin_medic_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_medicamento_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_admin` date NOT NULL,
  `hora_admin` date NOT NULL,
  `dosis_admin` date NOT NULL,
  `reacionmedica_id` bigint(20) UNSIGNED NOT NULL,
  `oservacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'COLOMBIA', NULL, NULL),
(2, 'VEBEZUELA', NULL, NULL),
(3, 'BRASIL', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE `profesiones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`id`, `descripcion`, `anulado`, `created_at`, `updated_at`) VALUES
(1, 'MEDICO', NULL, NULL, NULL),
(2, 'AUXILIAR DE ENFERMERIA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango_eps`
--

CREATE TABLE `rango_eps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rango_eps`
--

INSERT INTO `rango_eps` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'R1', NULL, NULL),
(2, 'R2', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reaccion_medicamento`
--

CREATE TABLE `reaccion_medicamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisicion_medicamento`
--

CREATE TABLE `requisicion_medicamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consecutivo` int(11) NOT NULL,
  `datosbasicos_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_requisicion` date NOT NULL,
  `articulos_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` double NOT NULL,
  `unimedidas_id` bigint(20) UNSIGNED NOT NULL,
  `existencia_hasta` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `empleados_id` bigint(20) UNSIGNED NOT NULL,
  `lote` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remision` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ccosto_id` bigint(20) UNSIGNED NOT NULL,
  `codigo_conse` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consecutivo_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `requisicion_medicamento`
--

INSERT INTO `requisicion_medicamento` (`id`, `consecutivo`, `datosbasicos_id`, `fecha_requisicion`, `articulos_id`, `cantidad`, `unimedidas_id`, `existencia_hasta`, `fecha_vencimiento`, `empleados_id`, `lote`, `remision`, `ccosto_id`, `codigo_conse`, `consecutivo_id`, `user_id`, `anulado`, `created_at`, `updated_at`) VALUES
(51, 149, 1, '2023-08-02', 1, 10, 1, '2023-08-30', '2023-08-07', 7, '54545', '4524224', 2, '0001', 1, 1, NULL, '2023-08-02 10:06:07', '2023-08-02 10:06:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'MASCULINO', NULL, NULL),
(2, 'FEMENINO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdoc`
--

CREATE TABLE `tdoc` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tdoc`
--

INSERT INTO `tdoc` (`id`, `codigo`, `descripcion`, `create_at`, `update_at`) VALUES
(1, 'CC', 'CC - Cédula de ciudadanía', NULL, NULL),
(2, 'TI', 'TI - Tarjeta de Identidad', NULL, NULL),
(3, 'CE', 'CE - Cédula de Extrenjería', NULL, NULL),
(4, 'P', 'P   - Pasaporte', NULL, NULL),
(5, 'RC', 'RC - Registro Civil', NULL, NULL),
(6, 'NUIP', 'NUIP - No. Unico de Id Personal', NULL, NULL),
(7, 'ASI', 'ASI - Adulto sin Identificación', NULL, NULL),
(8, 'MSI', 'MSI - Menor sin Identificación', NULL, NULL),
(9, 'CD', 'CD - Carnert Diplomático', NULL, NULL),
(10, 'CNV', 'CNV - Certificado Nacido Vivo', NULL, NULL),
(11, 'SC', 'SC - Salvo Conducto', NULL, NULL),
(12, 'PEP', 'PEP - Per Especial Permanencia', NULL, NULL),
(13, 'PPT', 'PPT - Permiso de Protección Especial', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervicios`
--

CREATE TABLE `tiposervicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalles_servicio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tiposervicios`
--

INSERT INTO `tiposervicios` (`id`, `descripcion`, `codigo`, `detalles_servicio`, `created_at`, `updated_at`, `iduser`) VALUES
(1, 'VIVIENDA ASISTIDA', '1', NULL, NULL, NULL, 1),
(2, 'HOGAR DE PASO INSTITUCIONAL', '2', NULL, NULL, NULL, 1),
(3, 'PASADIAS / GUARDERIA', '3', NULL, NULL, NULL, 1),
(4, 'SERVICIO DE ATENCIÓN DOMI BAJA COMPLEJIDAD', '4', NULL, NULL, NULL, 1),
(5, 'CUIDADOS DOMICILIARIOS', '5', NULL, NULL, NULL, 1),
(6, 'SERVICIO 6', '6', 'SE USA COMO FILTRO PARA LA CONSULTA', NULL, NULL, 1),
(7, 'SERVICIO 7', '7', 'Servicio por determinar', NULL, NULL, 1),
(8, 'SERVICIO 8', '8', 'Servicio por determinar', NULL, NULL, 1),
(9, 'SERVICIO 9', '9', 'Servicio por determinar', NULL, NULL, 1),
(10, 'SERVICIO 10', '10', 'Servicio por determinar', NULL, NULL, 1),
(11, 'SERVICIO 11', '11', 'Servicio por determinar', NULL, NULL, 1),
(12, 'SERVICIO 12', '12', 'Servicio por determinar', NULL, NULL, 1),
(13, 'SERVICIO 13', '13', 'Servicio por determinar', NULL, NULL, 1),
(14, 'SERVICIO 14', '14', 'Servicio por determinar', NULL, NULL, 1),
(15, 'PENDIENTE POR ASIGNAR', '15', 'PARA CONTROL DEL SISTEMA', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_cita`
--

CREATE TABLE `tipos_cita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observación` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_cita`
--

INSERT INTO `tipos_cita` (`id`, `descripcion`, `observación`, `created_at`, `updated_at`) VALUES
(1, 'CONTROL MEDICO', 'XXXXXXXXXXXXX', NULL, NULL),
(2, 'PREOPERATORIA', 'XXXXXXXXXXXXX', NULL, NULL),
(3, 'SEGUIMIENTO', 'XXXXXXXXXXXXX', NULL, NULL),
(4, 'DOLENCIAS', 'XXXXXXXXXXXXX', NULL, NULL),
(5, 'URGENCIA', 'XXXXXXXXXXXXX', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_admin_med_user`
--

CREATE TABLE `tipo_admin_med_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_admin_med_user`
--

INSERT INTO `tipo_admin_med_user` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Aplicación cutanea', NULL, NULL),
(2, 'Via Oral', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_afiliacion`
--

CREATE TABLE `tipo_afiliacion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_afiliacion`
--

INSERT INTO `tipo_afiliacion` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'COTIZANTE', NULL, NULL),
(2, 'BENEFICIARIO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_atencion`
--

CREATE TABLE `tipo_atencion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observación` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_atencion`
--

INSERT INTO `tipo_atencion` (`id`, `descripcion`, `observación`, `created_at`, `updated_at`) VALUES
(1, 'EN CLÍNICA', 'XXXXXXXXXX', NULL, NULL),
(2, 'DOMICILIARIA', 'XXXXXXXXXX', NULL, NULL),
(3, 'VIRTUAL', 'XXXXXXXXXX', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anulado` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id`, `descripcion`, `anulado`, `created_at`, `updated_at`) VALUES
(1, 'Termino fijo', NULL, NULL, NULL),
(2, 'Termino indefinido', NULL, NULL, NULL),
(3, 'Obra por labor', NULL, NULL, NULL),
(4, 'De Aprendizaje', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documentos`
--

CREATE TABLE `tipo_documentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_documentos`
--

INSERT INTO `tipo_documentos` (`id`, `codigo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'CC', 'Cedula', NULL, NULL),
(2, 'TI', 'Tarje de identidad', NULL, NULL),
(3, 'RC', 'Registro Civil', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empresa_remite`
--

CREATE TABLE `tipo_empresa_remite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_empresa_remite`
--

INSERT INTO `tipo_empresa_remite` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'EPS', NULL, NULL),
(2, 'CLINICA PARITUCULAR', NULL, NULL),
(3, 'PERSONAL', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_doc` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_doc` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_sangre` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(65) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_familiar` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentezco_fami` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_familiar` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cargo` bigint(11) UNSIGNED DEFAULT NULL,
  `hoja_vida` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `tipo_doc`, `num_doc`, `name`, `tipo_sangre`, `direccion`, `telefono_contacto`, `nombre_familiar`, `parentezco_fami`, `telefono_familiar`, `id_cargo`, `hoja_vida`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'JAMINSON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jaminson1374@gmail.com', 'Administrador', NULL, '$2y$10$gu20DXORZEYQ6DCIo4pWiuqxARlHi/1Q7X1f5JN6/aLJIHGpoBSFu', NULL, '2023-04-08 01:10:01', '2023-04-08 01:10:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acompanantes`
--
ALTER TABLE `acompanantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acompanantes_tipodocumento_id_foreign` (`tipodocumento_id`),
  ADD KEY `acompanantes_sexo_id_foreign` (`sexo_id`);

--
-- Indices de la tabla `admin_medic_user`
--
ALTER TABLE `admin_medic_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_medic_user_datosbasicos_id_foreign` (`datosbasicos_id`),
  ADD KEY `admin_medic_user_articulos_id_foreign` (`articulos_id`),
  ADD KEY `admin_medic_user_unimedidas_id_foreign` (`unimedidas_id`),
  ADD KEY `admin_medic_user_tipoadmin_med_id_foreign` (`tipoadmin_med_id`),
  ADD KEY `admin_medic_user_empleados_id_foreign` (`empleados_id`),
  ADD KEY `admin_medic_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `camas`
--
ALTER TABLE `camas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `camas_cubiculo_id_foreign` (`cubiculo_id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `categoria_empleado`
--
ALTER TABLE `categoria_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citas_medicas_datosbasicos_id_foreign` (`datosbasicos_id`),
  ADD KEY `citas_medicas_tiposcita_id_foreign` (`tiposcita_id`),
  ADD KEY `citas_medicas_especialidades_id_foreign` (`especialidades_id`),
  ADD KEY `citas_medicas_tipoatencion_id_foreign` (`tipoatencion_id`),
  ADD KEY `citas_medicas_medico_remite_id_foreign` (`medico_remite_id`),
  ADD KEY `citas_medicas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudades_pais_id_foreign` (`pais_id`),
  ADD KEY `ciudades_departamento_id_foreign` (`departamento_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_datosbasicos_id_foreign` (`datosbasicos_id`),
  ADD KEY `clientes_tiposervicio_id_foreign` (`tiposervicio_id`),
  ADD KEY `clientes_tipo_afiliacion_id_foreign` (`tipo_afiliacion_id`),
  ADD KEY `clientes_rango_eps_id_foreign` (`rango_eps_id`),
  ADD KEY `clientes_cubiculos_id_foreign` (`cubiculos_id`),
  ADD KEY `clientes_medico_remite_id_foreign` (`medico_remite_id`),
  ADD KEY `clientes_acompanantes_id_foreign` (`acompanantes_id`),
  ADD KEY `clientes_empleado_id_foreign` (`empleado_id`),
  ADD KEY `clientes_user_id_foreign` (`user_id`),
  ADD KEY `clientes_empresa_remite_id_foreign` (`empresa_remite_id`);

--
-- Indices de la tabla `cliente_datosbasicos`
--
ALTER TABLE `cliente_datosbasicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_datosbasicos_id_tipodoc_foreign` (`id_tipodoc`),
  ADD KEY `cliente_datosbasicos_sexo_id_foreign` (`sexo_id`),
  ADD KEY `cliente_datosbasicos_gruposanguineo_id_foreign` (`grupoSanguineo_id`),
  ADD KEY `cliente_datosbasicos_nacionalidad_id_foreign` (`nacionalidad_id`),
  ADD KEY `cliente_datosbasicos_departamento_id_foreign` (`departamento_id`),
  ADD KEY `cliente_datosbasicos_ciudad_id_foreign` (`ciudad_id`),
  ADD KEY `cliente_datosbasicos_tiposervicio_id_foreign` (`tiposervicio_id`);

--
-- Indices de la tabla `clinicas`
--
ALTER TABLE `clinicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consecutivos`
--
ALTER TABLE `consecutivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cubiculos`
--
ALTER TABLE `cubiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_auxiliares`
--
ALTER TABLE `datos_auxiliares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamentos_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleados_sexo_id_foreign` (`sexo_id`),
  ADD KEY `empleados_gruposanguineo_id_foreign` (`gruposanguineo_id`),
  ADD KEY `empleados_nacionalidad_id_foreign` (`nacionalidad_id`),
  ADD KEY `empleados_departamento_id_foreign` (`departamento_id`),
  ADD KEY `empleados_ciudad_id_foreign` (`ciudad_id`),
  ADD KEY `empleados_cargo_id_foreign` (`cargo_id`),
  ADD KEY `tipocontrato_id` (`tipocontrato_id`),
  ADD KEY `profesion_id` (`profesion_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `empleados_profesiones_id_foreign` (`profesiones_id`),
  ADD KEY `empleados_tipodocumento_id_foreign` (`tipodocumento_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa_remite`
--
ALTER TABLE `empresa_remite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_remite_tipo_empresa_id_foreign` (`tipo_empresa_id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_sigvitales`
--
ALTER TABLE `estado_sigvitales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evolucion_diaria`
--
ALTER TABLE `evolucion_diaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evolucion_diaria_datosbasicos_id_foreign` (`datosbasicos_id`),
  ADD KEY `evolucion_diaria_empleado_id_foreign` (`empleado_id`),
  ADD KEY `evolucion_diaria_evolucion_id_foreign` (`evolucion_id`),
  ADD KEY `evolucion_diaria_evolucion_estado_sigvitales_id_foreign` (`estado_sigvitales_id`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grp_sangre`
--
ALTER TABLE `grp_sangre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hitorial_cita_med`
--
ALTER TABLE `hitorial_cita_med`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hitorial_cita_med_citamed_id_foreign` (`citamed_id`),
  ADD KEY `hitorial_cita_med_datosbasicos_id_foreign` (`datosbasicos_id`);

--
-- Indices de la tabla `inv_articulos`
--
ALTER TABLE `inv_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_articulos_linea_id_foreign` (`linea_id`),
  ADD KEY `inv_articulos_unimedidas_id_foreign` (`unimedidas_id`),
  ADD KEY `inv_articulos_proveedor_id_foreign` (`proveedor_id`),
  ADD KEY `inv_articulos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `inv_categorias`
--
ALTER TABLE `inv_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_ccostos`
--
ALTER TABLE `inv_ccostos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_conceptos`
--
ALTER TABLE `inv_conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_documentos`
--
ALTER TABLE `inv_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_inventario`
--
ALTER TABLE `inv_inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_inventario_articulo_id_foreign` (`articulo_id`),
  ADD KEY `inv_inventario_documentos_id_foreign` (`documentos_id`),
  ADD KEY `inv_inventario_conceptos_id_foreign` (`conceptos_id`);

--
-- Indices de la tabla `inv_lineas`
--
ALTER TABLE `inv_lineas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inv_lineas_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `inv_proveedores`
--
ALTER TABLE `inv_proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inv_unimedidas`
--
ALTER TABLE `inv_unimedidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicos_externos`
--
ALTER TABLE `medicos_externos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicos_externos_sexo_id_foreign` (`sexo_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mov_admin_medic_user`
--
ALTER TABLE `mov_admin_medic_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mov_admin_medic_user_admin_medicamento_id_foreign` (`admin_medicamento_id`),
  ADD KEY `mov_admin_medic_user_reacionmedica_id_foreign` (`reacionmedica_id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rango_eps`
--
ALTER TABLE `rango_eps`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reaccion_medicamento`
--
ALTER TABLE `reaccion_medicamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `requisicion_medicamento`
--
ALTER TABLE `requisicion_medicamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisicion_medicamento_datosbasicos_id_foreign` (`datosbasicos_id`),
  ADD KEY `requisicion_medicamento_articulos_id_foreign` (`articulos_id`),
  ADD KEY `requisicion_medicamento_unimedidas_id_foreign` (`unimedidas_id`),
  ADD KEY `requisicion_medicamento_empleados_id_foreign` (`empleados_id`),
  ADD KEY `requisicion_medicamento_consecutivo_id_foreign` (`consecutivo_id`),
  ADD KEY `requisicion_medicamento_user_id_foreign` (`user_id`),
  ADD KEY `ccosto_id` (`ccosto_id`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tdoc`
--
ALTER TABLE `tdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposervicios`
--
ALTER TABLE `tiposervicios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_servicios_codigo_unique` (`codigo`);

--
-- Indices de la tabla `tipos_cita`
--
ALTER TABLE `tipos_cita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_admin_med_user`
--
ALTER TABLE `tipo_admin_med_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_afiliacion`
--
ALTER TABLE `tipo_afiliacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_atencion`
--
ALTER TABLE `tipo_atencion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_empresa_remite`
--
ALTER TABLE `tipo_empresa_remite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acompanantes`
--
ALTER TABLE `acompanantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `admin_medic_user`
--
ALTER TABLE `admin_medic_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `camas`
--
ALTER TABLE `camas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categoria_empleado`
--
ALTER TABLE `categoria_empleado`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente_datosbasicos`
--
ALTER TABLE `cliente_datosbasicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `clinicas`
--
ALTER TABLE `clinicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consecutivos`
--
ALTER TABLE `consecutivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cubiculos`
--
ALTER TABLE `cubiculos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_auxiliares`
--
ALTER TABLE `datos_auxiliares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa_remite`
--
ALTER TABLE `empresa_remite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado_sigvitales`
--
ALTER TABLE `estado_sigvitales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evolucion_diaria`
--
ALTER TABLE `evolucion_diaria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grp_sangre`
--
ALTER TABLE `grp_sangre`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `hitorial_cita_med`
--
ALTER TABLE `hitorial_cita_med`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_articulos`
--
ALTER TABLE `inv_articulos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inv_categorias`
--
ALTER TABLE `inv_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inv_ccostos`
--
ALTER TABLE `inv_ccostos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inv_conceptos`
--
ALTER TABLE `inv_conceptos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_documentos`
--
ALTER TABLE `inv_documentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_inventario`
--
ALTER TABLE `inv_inventario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inv_lineas`
--
ALTER TABLE `inv_lineas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inv_proveedores`
--
ALTER TABLE `inv_proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inv_unimedidas`
--
ALTER TABLE `inv_unimedidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `medicos_externos`
--
ALTER TABLE `medicos_externos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `mov_admin_medic_user`
--
ALTER TABLE `mov_admin_medic_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rango_eps`
--
ALTER TABLE `rango_eps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reaccion_medicamento`
--
ALTER TABLE `reaccion_medicamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requisicion_medicamento`
--
ALTER TABLE `requisicion_medicamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tdoc`
--
ALTER TABLE `tdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tiposervicios`
--
ALTER TABLE `tiposervicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `tipos_cita`
--
ALTER TABLE `tipos_cita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_admin_med_user`
--
ALTER TABLE `tipo_admin_med_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_afiliacion`
--
ALTER TABLE `tipo_afiliacion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_atencion`
--
ALTER TABLE `tipo_atencion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_empresa_remite`
--
ALTER TABLE `tipo_empresa_remite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acompanantes`
--
ALTER TABLE `acompanantes`
  ADD CONSTRAINT `acompanantes_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `sexo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acompanantes_tipodocumento_id_foreign` FOREIGN KEY (`tipodocumento_id`) REFERENCES `tipo_documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `admin_medic_user`
--
ALTER TABLE `admin_medic_user`
  ADD CONSTRAINT `admin_medic_user_articulos_id_foreign` FOREIGN KEY (`articulos_id`) REFERENCES `inv_articulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_medic_user_datosbasicos_id_foreign` FOREIGN KEY (`datosbasicos_id`) REFERENCES `cliente_datosbasicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_medic_user_empleados_id_foreign` FOREIGN KEY (`empleados_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_medic_user_tipoadmin_med_id_foreign` FOREIGN KEY (`tipoadmin_med_id`) REFERENCES `tipo_admin_med_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_medic_user_unimedidas_id_foreign` FOREIGN KEY (`unimedidas_id`) REFERENCES `inv_unimedidas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_medic_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `camas`
--
ALTER TABLE `camas`
  ADD CONSTRAINT `camas_cubiculo_id_foreign` FOREIGN KEY (`cubiculo_id`) REFERENCES `cubiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_categoria_id_Forikey` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_empleado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  ADD CONSTRAINT `citas_medicas_datosbasicos_id_foreign` FOREIGN KEY (`datosbasicos_id`) REFERENCES `cliente_datosbasicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_medicas_especialidades_id_foreign` FOREIGN KEY (`especialidades_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_medicas_medico_remite_id_foreign` FOREIGN KEY (`medico_remite_id`) REFERENCES `medicos_externos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_medicas_tipoatencion_id_foreign` FOREIGN KEY (`tipoatencion_id`) REFERENCES `tipo_atencion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_medicas_tiposcita_id_foreign` FOREIGN KEY (`tiposcita_id`) REFERENCES `tipos_cita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_medicas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudades_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ciudades_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_acompanantes_id_foreign` FOREIGN KEY (`acompanantes_id`) REFERENCES `acompanantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_cubiculos_id_foreign` FOREIGN KEY (`cubiculos_id`) REFERENCES `cubiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_datosbasicos_id_foreign` FOREIGN KEY (`datosbasicos_id`) REFERENCES `cliente_datosbasicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_empresa_remite_id_foreign` FOREIGN KEY (`empresa_remite_id`) REFERENCES `empresa_remite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_medico_remite_id_foreign` FOREIGN KEY (`medico_remite_id`) REFERENCES `medicos_externos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_rango_eps_id_foreign` FOREIGN KEY (`rango_eps_id`) REFERENCES `rango_eps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_tipo_afiliacion_id_foreign` FOREIGN KEY (`tipo_afiliacion_id`) REFERENCES `tipo_afiliacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_tiposervicio_id_foreign` FOREIGN KEY (`tiposervicio_id`) REFERENCES `tiposervicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_datosbasicos`
--
ALTER TABLE `cliente_datosbasicos`
  ADD CONSTRAINT `cliente_datosbasicos_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_datosbasicos_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_datosbasicos_gruposanguineo_id_foreign` FOREIGN KEY (`grupoSanguineo_id`) REFERENCES `grp_sangre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_datosbasicos_id_tipodoc_foreign` FOREIGN KEY (`id_tipodoc`) REFERENCES `tipo_documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_datosbasicos_nacionalidad_id_foreign` FOREIGN KEY (`nacionalidad_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_datosbasicos_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `sexo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_datosbasicos_tiposervicio_id_foreign` FOREIGN KEY (`tiposervicio_id`) REFERENCES `tiposervicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleado_profesion_id_foreing` FOREIGN KEY (`profesion_id`) REFERENCES `profesiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_tipo_contrato_id_foreing` FOREIGN KEY (`tipocontrato_id`) REFERENCES `tipo_contrato` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_ciudad_id_foreign` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_gruposanguineo_id_foreign` FOREIGN KEY (`gruposanguineo_id`) REFERENCES `grp_sangre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_nacionalidad_id_foreign` FOREIGN KEY (`nacionalidad_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_profesiones_id_foreign` FOREIGN KEY (`profesiones_id`) REFERENCES `profesiones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `sexo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_tipodocumento_id_foreign` FOREIGN KEY (`tipodocumento_id`) REFERENCES `tipo_documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa_remite`
--
ALTER TABLE `empresa_remite`
  ADD CONSTRAINT `empresa_remite_tipo_empresa_id_foreign` FOREIGN KEY (`tipo_empresa_id`) REFERENCES `tipo_empresa_remite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evolucion_diaria`
--
ALTER TABLE `evolucion_diaria`
  ADD CONSTRAINT `evolucion_diaria_datosbasicos_id_foreign` FOREIGN KEY (`datosbasicos_id`) REFERENCES `cliente_datosbasicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evolucion_diaria_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evolucion_diaria_evolucion_estado_sigvitales_id_foreign` FOREIGN KEY (`estado_sigvitales_id`) REFERENCES `estado_sigvitales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evolucion_diaria_evolucion_id_foreign` FOREIGN KEY (`evolucion_id`) REFERENCES `evolucion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hitorial_cita_med`
--
ALTER TABLE `hitorial_cita_med`
  ADD CONSTRAINT `hitorial_cita_med_citamed_id_foreign` FOREIGN KEY (`citamed_id`) REFERENCES `citas_medicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hitorial_cita_med_datosbasicos_id_foreign` FOREIGN KEY (`datosbasicos_id`) REFERENCES `cliente_datosbasicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inv_articulos`
--
ALTER TABLE `inv_articulos`
  ADD CONSTRAINT `inv_articulos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `inv_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inv_articulos_linea_id_foreign` FOREIGN KEY (`linea_id`) REFERENCES `inv_lineas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inv_articulos_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `inv_proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inv_articulos_unimedidas_id_foreign` FOREIGN KEY (`unimedidas_id`) REFERENCES `inv_unimedidas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inv_inventario`
--
ALTER TABLE `inv_inventario`
  ADD CONSTRAINT `inv_inventario_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `inv_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inv_inventario_conceptos_id_foreign` FOREIGN KEY (`conceptos_id`) REFERENCES `inv_conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inv_inventario_documentos_id_foreign` FOREIGN KEY (`documentos_id`) REFERENCES `inv_documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inv_lineas`
--
ALTER TABLE `inv_lineas`
  ADD CONSTRAINT `inv_lineas_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `inv_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicos_externos`
--
ALTER TABLE `medicos_externos`
  ADD CONSTRAINT `medicos_externos_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `sexo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mov_admin_medic_user`
--
ALTER TABLE `mov_admin_medic_user`
  ADD CONSTRAINT `mov_admin_medic_user_admin_medicamento_id_foreign` FOREIGN KEY (`admin_medicamento_id`) REFERENCES `admin_medic_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mov_admin_medic_user_reacionmedica_id_foreign` FOREIGN KEY (`reacionmedica_id`) REFERENCES `reaccion_medicamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `requisicion_medicamento`
--
ALTER TABLE `requisicion_medicamento`
  ADD CONSTRAINT `requisicion_medicamento_articulos_id_foreign` FOREIGN KEY (`articulos_id`) REFERENCES `inv_articulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requisicion_medicamento_ccosto_id_foreign` FOREIGN KEY (`ccosto_id`) REFERENCES `inv_ccostos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requisicion_medicamento_consecutivo_id_foreign` FOREIGN KEY (`consecutivo_id`) REFERENCES `consecutivos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requisicion_medicamento_datosbasicos_id_foreign` FOREIGN KEY (`datosbasicos_id`) REFERENCES `cliente_datosbasicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requisicion_medicamento_empleados_id_foreign` FOREIGN KEY (`empleados_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requisicion_medicamento_unimedidas_id_foreign` FOREIGN KEY (`unimedidas_id`) REFERENCES `inv_unimedidas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requisicion_medicamento_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
