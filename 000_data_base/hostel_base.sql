-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2024 a las 03:13:41
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
-- Base de datos: `hostel_base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bed_booking`
--

CREATE TABLE `bed_booking` (
  `id_bed_booking` int(254) NOT NULL,
  `booking_year` varchar(4) NOT NULL,
  `id_hostel` int(128) NOT NULL,
  `id_room` int(64) NOT NULL,
  `id_room_bed` int(128) NOT NULL,
  `date_range` varchar(40) NOT NULL,
  `booking_status` int(6) NOT NULL DEFAULT 1,
  `date_in` varchar(20) NOT NULL,
  `date_out` varchar(20) NOT NULL,
  `nights` varchar(20) NOT NULL,
  `arreglo_d` varchar(2054) NOT NULL,
  `codigo_amistades` varchar(40) NOT NULL,
  `amistad_rey` int(128) DEFAULT NULL,
  `id_guests` int(254) NOT NULL,
  `month_ini` varchar(20) NOT NULL,
  `month_end` varchar(20) NOT NULL,
  `hora_rey` datetime NOT NULL,
  `id_payment_huesped` int(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bed_kind`
--

CREATE TABLE `bed_kind` (
  `id_bed_kind` int(3) NOT NULL,
  `name_bed_kind` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bed_kind`
--

INSERT INTO `bed_kind` (`id_bed_kind`, `name_bed_kind`) VALUES
(1, 'Single'),
(2, 'Double'),
(3, 'None');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bed_number`
--

CREATE TABLE `bed_number` (
  `id_bed_number` int(6) NOT NULL,
  `name_bed_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bed_number`
--

INSERT INTO `bed_number` (`id_bed_number`, `name_bed_number`) VALUES
(1, 'F6-1'),
(2, 'F6-2'),
(3, 'F6-3'),
(4, 'F6-4'),
(5, 'F6-5'),
(6, 'F6-6'),
(10, 'None'),
(12, 'F7-1'),
(13, 'F7-2'),
(14, 'F7-3'),
(15, 'F7-4'),
(16, 'F7-5'),
(17, 'F7-6'),
(18, 'F3-1'),
(19, 'F3-2'),
(20, 'F3-3'),
(21, 'F3-4'),
(22, 'F3-5'),
(23, 'F3-6'),
(24, 'M1-1'),
(25, 'M1-2'),
(26, 'M1-3'),
(27, 'M1-4'),
(28, 'M1-5'),
(29, 'M1-6'),
(30, 'M4-1'),
(31, 'M4-2'),
(32, 'M4-3'),
(33, 'M4-4'),
(34, 'M4-5'),
(35, 'M4-6'),
(36, 'M9-1'),
(37, 'M9-2'),
(38, 'M9-4'),
(39, 'M9-5'),
(40, 'M9-6'),
(41, 'P8-1'),
(42, 'P8-2'),
(43, 'P2-1'),
(44, 'P2-2'),
(45, 'M9-3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bed_status`
--

CREATE TABLE `bed_status` (
  `id_bed_status` int(11) NOT NULL,
  `name_bed_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bed_status`
--

INSERT INTO `bed_status` (`id_bed_status`, `name_bed_status`) VALUES
(1, 'Available'),
(7, 'Unavailable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `behaviors`
--

CREATE TABLE `behaviors` (
  `id_behaviors` int(11) NOT NULL,
  `name_behaviors` varchar(20) NOT NULL,
  `color_back` varchar(10) NOT NULL DEFAULT '#25e557',
  `color_text` varchar(10) NOT NULL DEFAULT '#000000',
  `icon_behaviors` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `behaviors`
--

INSERT INTO `behaviors` (`id_behaviors`, `name_behaviors`, `color_back`, `color_text`, `icon_behaviors`) VALUES
(1, 'Normal', '#d0f514', '#000000', '<i class=\"fa-regular fa-face-meh\"></i>'),
(2, 'Challenging', '#e59524', '#000000', '<i class=\"fa-regular fa-face-angry\"></i>'),
(3, 'Addicted', '#d07225', '#000000', '<i class=\"fa-regular fa-face-flushed\"></i>'),
(4, 'Unhygienic', '#d07225', '#000000', '<i class=\"fa-regular fa-face-tired\"></i>'),
(5, 'Problematic', '#fa0000', '#ffffff', '<i class=\"fa-regular fa-face-grimace\"></i>'),
(6, 'Swindler', '#fa0000', '#ffffff', '<i class=\"fa-regular fa-face-meh-blank\"></i>'),
(7, 'Thief', '#fa0000', '#ffffff', '<i class=\"fa-regular fa-face-rolling-eyes\"></i>'),
(8, 'Excellent', '#24d8e5', '#000000', '<i class=\"fa-regular fa-face-grin-beam\"></i>'),
(9, 'Gentile', '#25e557', '#000000', '<i class=\"fa-regular fa-face-grin-wink\"></i>'),
(10, 'Collaborator', '#25e557', '#000000', '<i class=\"fa-regular fa-face-laugh-wink\"></i>'),
(11, 'Very Good', '#24d8e5', '#000000', '<i class=\"fa-regular fa-face-smile-beam\"></i>'),
(12, 'Good', '#d0f514', '#000000', '<i class=\"fa-regular fa-face-smile-wink\"></i>'),
(13, 'Awesome', '#24d8e5', '#000000', '<i class=\"fa-regular fa-face-grin-stars\"></i>'),
(14, 'Gratifying', '#25e557', '#000000', '<i class=\"fa-regular fa-face-grin\"></i>'),
(16, 'Disorderly', '#e59524', '#000000', '<i class=\"fa-regular fa-face-dizzy\"></i>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `booking_status`
--

CREATE TABLE `booking_status` (
  `id_booking_status` int(11) NOT NULL,
  `name_booking_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `booking_status`
--

INSERT INTO `booking_status` (`id_booking_status`, `name_booking_status`) VALUES
(1, 'Reserved'),
(2, 'In Use'),
(3, 'Available'),
(4, 'Not Available');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bunk_level`
--

CREATE TABLE `bunk_level` (
  `id_bunk_level` int(2) NOT NULL,
  `name_bunk_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bunk_level`
--

INSERT INTO `bunk_level` (`id_bunk_level`, `name_bunk_level`) VALUES
(1, 'Bunk 1'),
(2, 'Bunk 2'),
(3, 'Bunk 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `name_country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id_country`, `name_country`) VALUES
(1, 'USA'),
(7, 'Mexico'),
(8, 'Venezuela'),
(9, 'Colombia'),
(10, 'Argentina'),
(11, 'Australia'),
(12, 'Austria'),
(13, 'Madagascar'),
(14, 'Malaysia'),
(15, 'Malta'),
(16, 'Monaco'),
(17, 'Morocco'),
(18, 'Bahamas'),
(19, 'Barbados'),
(20, 'Belgium'),
(21, 'Belize'),
(22, 'Bolivia'),
(23, 'Nepal'),
(24, 'Netherlands'),
(25, 'New Zealand'),
(26, 'Nicaragua'),
(27, 'Nigeria'),
(28, 'Norway'),
(29, 'North Macedonia'),
(30, 'Brazil'),
(31, 'Brunei'),
(32, 'Bulgaria'),
(33, 'Cabo Verde'),
(34, 'Cambodia'),
(35, 'Cameroon'),
(36, 'Canada'),
(37, 'Cayman Islands'),
(38, 'Pakistan'),
(39, 'Panama'),
(40, 'Papua New Guinea'),
(41, 'Paraguay'),
(42, 'Peru'),
(43, 'Philippines'),
(44, 'Poland'),
(45, 'Portugal'),
(46, 'Central African Rep'),
(47, 'Chile'),
(48, 'China'),
(49, 'Costa Rica'),
(50, 'Cote d’Ivoire'),
(51, 'Croatia'),
(52, 'Cuba'),
(53, 'Czechia'),
(54, 'Czechoslovakia'),
(55, 'Qatar'),
(56, 'South Korea'),
(57, 'Denmark'),
(58, 'Republic of the Con'),
(59, 'Romania'),
(60, 'Russia'),
(61, 'Rwanda'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'Saint Lucia'),
(65, 'Samoa'),
(66, 'San Marino'),
(67, 'Saudi Arabia'),
(68, 'Senegal'),
(69, 'Serbia'),
(70, 'Sierra Leone'),
(71, 'Singapore'),
(72, 'Slovakia'),
(73, 'Slovenia'),
(74, 'Somalia'),
(75, 'South Africa'),
(76, 'Ecuador'),
(77, 'Egypt'),
(78, 'El Salvador'),
(79, 'Equatorial Guinea'),
(80, 'Estonia'),
(81, 'Ethiopia'),
(82, 'Fiji'),
(83, 'Finland'),
(84, 'France'),
(85, 'South Sudan'),
(86, 'Spain'),
(87, 'Sri Lanka'),
(88, 'Sudan'),
(89, 'Suriname'),
(90, 'Sweden'),
(91, 'Switzerland'),
(92, 'Syria'),
(93, 'Georgia'),
(94, 'Germany'),
(95, 'Ghana'),
(96, 'Greece'),
(97, 'Grenada'),
(98, 'Guatemala'),
(99, 'Guinea'),
(100, 'Guyana'),
(101, 'Tanzania'),
(102, 'Thailand'),
(103, 'Trinidad and Tobago'),
(104, 'Turkey'),
(105, 'Haiti'),
(106, 'Hawaii'),
(107, 'Honduras'),
(108, 'Hungary'),
(109, 'Uganda'),
(110, 'Ukraine'),
(111, 'United Arab Emirate'),
(112, 'United Kingdom'),
(113, 'Uruguay'),
(114, 'Uzbekistan'),
(115, 'Iceland'),
(116, 'India'),
(117, 'Indonesia'),
(118, 'Iran'),
(119, 'Iraq'),
(120, 'Ireland'),
(121, 'Israel'),
(122, 'Italy'),
(123, 'Jamaica'),
(124, 'Vietnam'),
(125, 'Japan'),
(126, 'Jordan'),
(127, 'Yemen'),
(128, 'Zambia'),
(129, 'Zimbabwe'),
(130, 'Kazakhstan'),
(131, 'Kenya'),
(132, 'Korea'),
(133, 'Kosovo'),
(134, 'Kuwait'),
(135, 'Laos'),
(136, 'Latvia'),
(137, 'Liberia'),
(138, 'Libya'),
(139, 'Lithuania'),
(140, 'Luxembourg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `currency`
--

CREATE TABLE `currency` (
  `id_currency` int(11) NOT NULL,
  `name_currency` varchar(20) NOT NULL,
  `symbol_currency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `currency`
--

INSERT INTO `currency` (`id_currency`, `name_currency`, `symbol_currency`) VALUES
(1, 'Dollar', 'US$'),
(2, 'Peso Mexicano', 'MXN$'),
(3, 'Euro', '€');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

CREATE TABLE `discounts` (
  `id_discounts` int(3) NOT NULL,
  `name_discounts` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `discounts`
--

INSERT INTO `discounts` (`id_discounts`, `name_discounts`) VALUES
(1, '0'),
(2, '5'),
(3, '10'),
(4, '15'),
(5, '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exchange_rates`
--

CREATE TABLE `exchange_rates` (
  `id_exchange_rates` int(64) NOT NULL,
  `id_hostel` int(11) NOT NULL,
  `id_hostel_currency` int(11) NOT NULL,
  `id_currency_A` int(11) NOT NULL,
  `currency_A_value` decimal(20,2) NOT NULL,
  `id_currency_B` int(11) NOT NULL,
  `currency_B_value` decimal(20,2) NOT NULL,
  `id_currency_C` int(11) DEFAULT NULL,
  `currency_C_value` decimal(20,2) DEFAULT NULL,
  `id_currency_D` int(11) DEFAULT NULL,
  `currency_D_value` decimal(20,2) DEFAULT NULL,
  `id_currency_E` int(11) DEFAULT NULL,
  `currency_E_value` decimal(20,2) DEFAULT NULL,
  `all_set_this_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `exchange_rates`
--

INSERT INTO `exchange_rates` (`id_exchange_rates`, `id_hostel`, `id_hostel_currency`, `id_currency_A`, `currency_A_value`, `id_currency_B`, `currency_B_value`, `id_currency_C`, `currency_C_value`, `id_currency_D`, `currency_D_value`, `id_currency_E`, `currency_E_value`, `all_set_this_time`) VALUES
(30, 17, 2, 1, 17.10, 3, 18.20, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-18 18:27:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `floors`
--

CREATE TABLE `floors` (
  `id_floors` int(3) NOT NULL,
  `name_floors` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `floors`
--

INSERT INTO `floors` (`id_floors`, `name_floors`) VALUES
(1, 'Ground Floor'),
(2, 'First Floor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id_forma_pago` int(11) NOT NULL,
  `name_forma_pago` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id_forma_pago`, `name_forma_pago`) VALUES
(1, 'Cash'),
(2, 'Debit'),
(3, 'Credit Card'),
(4, 'Wire Transfer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hostel_area`
--

CREATE TABLE `hostel_area` (
  `id_hostel_area` int(11) NOT NULL,
  `name_hostel_area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hostel_area`
--

INSERT INTO `hostel_area` (`id_hostel_area`, `name_hostel_area`) VALUES
(1, 'Unique');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents_beds`
--

CREATE TABLE `incidents_beds` (
  `id_incidents_beds` int(22) NOT NULL,
  `name_incidents_beds` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incidents_beds`
--

INSERT INTO `incidents_beds` (`id_incidents_beds`, `name_incidents_beds`) VALUES
(1, 'No incidents'),
(2, 'Messy'),
(3, 'Other'),
(4, 'The Lights Do Not Work'),
(5, 'Requires Complete Cleaning'),
(6, 'Electrical Outlets Do Not Work'),
(7, 'USB Charger Not Working'),
(8, 'Change Sheets Urgently'),
(9, 'Very Disorganized');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents_rooms`
--

CREATE TABLE `incidents_rooms` (
  `id_incidents_rooms` int(22) NOT NULL,
  `name_incidents_rooms` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incidents_rooms`
--

INSERT INTO `incidents_rooms` (`id_incidents_rooms`, `name_incidents_rooms`) VALUES
(1, 'No incidents'),
(2, 'Messy'),
(3, 'Air Conditioning Does Not Work'),
(4, 'Other'),
(5, 'The Lights Do Not Work'),
(6, 'The Pot Does Not Work'),
(7, 'The Shower Does Not Work'),
(8, 'Requires Complete Cleaning'),
(9, 'Very Disorganized');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incident_b_status`
--

CREATE TABLE `incident_b_status` (
  `id_incident_b_status` int(11) NOT NULL,
  `name_incident_b_status` varchar(20) NOT NULL,
  `color_back` varchar(20) NOT NULL DEFAULT '#25e557',
  `color_text` varchar(20) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incident_b_status`
--

INSERT INTO `incident_b_status` (`id_incident_b_status`, `name_incident_b_status`, `color_back`, `color_text`) VALUES
(1, 'Pending', '#ff7452', '#000000'),
(2, 'Solved', '#1cce00', '#000000'),
(3, 'Researching', '#8bc7e5', '#000000'),
(4, 'Repairing', '#99e5e4', '#000000'),
(5, 'Resolved', '#1cce00', '#000000'),
(6, 'Observing', '#e1ff28', '#000000'),
(7, 'Unsolved', '#ff9500', '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incident_r_status`
--

CREATE TABLE `incident_r_status` (
  `id_incident_r_status` int(11) NOT NULL,
  `name_incident_r_status` varchar(20) NOT NULL,
  `color_back` varchar(20) NOT NULL DEFAULT '#25e557',
  `color_text` varchar(20) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incident_r_status`
--

INSERT INTO `incident_r_status` (`id_incident_r_status`, `name_incident_r_status`, `color_back`, `color_text`) VALUES
(1, 'Pending', '#ff7452', '#000000'),
(2, 'Solved', '#1cce00', '#000000'),
(3, 'Researching', '#8bc7e5', '#000000'),
(4, 'Repairing', '#99e5e4', '#000000'),
(5, 'Resolved', '#1cce00', '#000000'),
(6, 'Observing', '#e1ff00', '#000000'),
(7, 'Unsolved', '#ff9500', '#000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nationality`
--

CREATE TABLE `nationality` (
  `id_nationality` int(11) NOT NULL,
  `name_nationality` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nationality`
--

INSERT INTO `nationality` (`id_nationality`, `name_nationality`) VALUES
(1, 'American'),
(7, '.'),
(9, 'Afghan'),
(10, 'Albanian'),
(11, 'Algerian'),
(12, 'Andorran'),
(13, 'Angolan'),
(14, 'Australian'),
(15, 'Argentine'),
(16, 'Austrian'),
(17, 'Bahamian'),
(18, 'Bangladeshi'),
(19, 'Barbadian'),
(20, 'Belarusian'),
(21, 'Belgian'),
(22, 'Beninese'),
(23, 'Bermudian'),
(24, 'Bolivian'),
(25, 'Brazilian'),
(26, 'British'),
(27, 'Bruneian'),
(28, 'Bulgarian'),
(29, 'Burmese'),
(30, 'Cambodian'),
(31, 'Cameroonian'),
(32, 'Canadian'),
(33, 'Cape Verdean'),
(34, 'Cayman Islander'),
(35, 'Central African'),
(36, 'Chilean'),
(37, 'Chinese'),
(38, 'Colombian'),
(39, 'Comoran'),
(40, 'Cook Islander'),
(41, 'Costa Rican'),
(42, 'Croatian'),
(43, 'Cuban'),
(44, 'Cymraes'),
(45, 'Czech'),
(46, 'Danish'),
(47, 'Dominican'),
(48, 'Dutch'),
(49, 'East Timorese'),
(50, 'Ecuadorean'),
(51, 'Egyptian'),
(52, 'Emirati'),
(53, 'English'),
(54, 'Estonian'),
(55, 'Ethiopian'),
(56, 'Fijian'),
(57, 'Filipino'),
(58, 'French'),
(59, 'Georgian'),
(60, 'German'),
(61, 'Greek'),
(62, 'Greenlandic'),
(63, 'Grenadian'),
(64, 'Guatemalan'),
(65, 'Guinean'),
(66, 'Guyanese'),
(67, 'Haitian'),
(68, 'Honduran'),
(69, 'Hong Konger	'),
(70, 'Hungarian'),
(71, 'Icelandic'),
(72, 'Indian'),
(73, 'Indonesian'),
(74, 'Iranian'),
(75, 'Iraqi'),
(76, 'Irish'),
(77, 'Israeli'),
(78, 'Italian'),
(79, 'Ivorian'),
(80, 'Jamaican'),
(81, 'Japanese'),
(82, 'Jordanian'),
(83, 'Kazakh'),
(84, 'Kenyan'),
(85, 'Citizen of Kiribati'),
(86, 'Kosovan'),
(87, 'Kuwaiti'),
(88, 'Lao'),
(89, 'Latvian'),
(90, 'Lebanese'),
(91, 'Liberian'),
(92, 'Other'),
(93, 'Libyan'),
(94, 'Lithuanian'),
(95, 'Luxembourger'),
(96, 'Macanese'),
(97, 'Macedonian'),
(98, 'Malawian'),
(99, 'Malagasy'),
(100, 'Malaysian'),
(101, 'Maldivian'),
(102, 'Maltese'),
(103, 'Marshallese'),
(104, 'Mauritian'),
(105, 'Mexican'),
(106, 'Moldovan'),
(107, 'Mongolian'),
(108, 'Montserratian'),
(109, 'Moroccan'),
(110, 'Mozambican'),
(111, 'Namibian'),
(112, 'Nepalese'),
(113, 'New Zealander'),
(114, 'Nicaraguan'),
(115, 'Nigerian'),
(116, 'Nigerien'),
(117, 'North Korean'),
(118, 'Northern Irish'),
(119, 'Norwegian'),
(120, 'Omani'),
(121, 'Qatari'),
(122, 'Pakistani'),
(123, 'Palauan'),
(124, 'Palestinian'),
(125, 'Panamanian'),
(126, 'Paraguayan'),
(127, 'Peruvian'),
(128, 'Polish'),
(129, 'Portuguese'),
(130, 'Puerto Rican'),
(131, 'Romanian'),
(132, 'Russian'),
(133, 'Rwandan'),
(134, 'Salvadorean'),
(135, 'Samoan'),
(136, 'Saudi Arabian'),
(137, 'Scottish'),
(138, 'Senegalese'),
(139, 'Serbian'),
(140, 'Sierra Leonean'),
(141, 'Singaporean'),
(142, 'Slovak'),
(143, 'Slovenian'),
(144, 'Somali'),
(145, 'South African'),
(146, 'South Korean'),
(147, 'South Sudanese'),
(148, 'Spanish'),
(149, 'Sri Lankan'),
(150, 'St Lucian'),
(151, 'Sudanese'),
(152, 'Surinamese'),
(153, 'Swedish'),
(154, 'Swiss'),
(155, 'Syrian'),
(156, 'Taiwanese'),
(157, 'Tajik'),
(158, 'Tanzanian'),
(159, 'Thai'),
(160, 'Tongan'),
(161, 'Trinidadian'),
(162, 'Tristanian'),
(163, 'Tunisian'),
(164, 'Turkish'),
(165, 'Ugandan'),
(166, 'Ukrainian'),
(167, 'Uruguayan'),
(168, 'Uzbek'),
(169, 'Vatican citizen'),
(170, 'Venezuelan'),
(171, 'Vietnamese'),
(172, 'Wallisian'),
(173, 'Welsh'),
(174, 'Yemeni'),
(175, 'Zambian'),
(176, 'Zimbabwean');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `name_producto` varchar(20) NOT NULL,
  `en_check_in` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `name_producto`, `en_check_in`) VALUES
(2, 'French Fries', 2),
(3, 'Bath Soap', 3),
(4, 'Bicycle', 2),
(5, 'Breakfast', 3),
(6, 'Towel', 3),
(7, 'Laundry', 2),
(8, 'Café ', 1),
(10, 'Water Bottle', 3),
(11, 'Te', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_kind`
--

CREATE TABLE `product_kind` (
  `id_product_kind` int(11) NOT NULL,
  `name_product_kind` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `product_kind`
--

INSERT INTO `product_kind` (`id_product_kind`, `name_product_kind`) VALUES
(1, 'Edible'),
(2, 'Personal Cleanlines'),
(3, 'Recreation');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quien_y_cuando_host`
--

CREATE TABLE `quien_y_cuando_host` (
  `id_q_y_c_host` int(48) NOT NULL,
  `id_quien_open_o_close` int(11) NOT NULL,
  `id_host_open_o_close` int(24) NOT NULL,
  `fecha_open_o_close` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text_open_o_close` varchar(110) NOT NULL,
  `historial_status_host` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quien_y_cuando_per`
--

CREATE TABLE `quien_y_cuando_per` (
  `id_q_y_c_per` int(48) NOT NULL,
  `id_quien_act_o_desact` int(11) NOT NULL,
  `id_per_act_o_desact` int(24) NOT NULL,
  `fecha_act_o_desact` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text_act_o_desact` varchar(110) NOT NULL,
  `historial_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `quien_y_cuando_per`
--

INSERT INTO `quien_y_cuando_per` (`id_q_y_c_per`, `id_quien_act_o_desact`, `id_per_act_o_desact`, `fecha_act_o_desact`, `text_act_o_desact`, `historial_status`) VALUES
(13, 26, 27, '2024-04-18 19:17:27', '', 0),
(14, 26, 27, '2024-04-18 19:17:58', '', 1),
(15, 26, 27, '2024-04-18 19:21:00', 'aaa', 0),
(16, 26, 27, '2024-04-18 19:21:14', 'aaaa', 1),
(17, 26, 27, '2024-04-18 19:22:27', 'ssss', 0),
(18, 26, 27, '2024-04-18 19:26:13', 'sss', 1),
(19, 26, 27, '2024-04-18 19:26:27', 'ee', 0),
(20, 26, 27, '2024-04-18 22:12:57', 'ddd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quien_y_cuando_room`
--

CREATE TABLE `quien_y_cuando_room` (
  `id_q_y_c_room` int(48) NOT NULL,
  `id_quien_permite_o_no` int(11) NOT NULL,
  `id_room_activ_or_deac` int(24) NOT NULL,
  `fecha_perm_o_no` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text_perm_o_no` varchar(110) NOT NULL,
  `historico_de_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_incidencias_b`
--

CREATE TABLE `reporte_incidencias_b` (
  `id_reporte_incidencias_b` int(250) NOT NULL,
  `id_quien_reporto_b` int(24) NOT NULL,
  `id_de_la_bed_b` int(250) NOT NULL,
  `fecha_incidencia_b` datetime NOT NULL,
  `id_de_incidencia_b` int(250) NOT NULL,
  `id_incidencia_b_status` int(250) NOT NULL,
  `id_quien_actualizo_b` int(120) DEFAULT NULL,
  `update_fecha_inc_b` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_incidencias_r`
--

CREATE TABLE `reporte_incidencias_r` (
  `id_reporte_incidencias_r` int(120) NOT NULL,
  `id_quien_reporto_r` int(24) NOT NULL,
  `id_de_la_room_r` int(24) NOT NULL,
  `fecha_incidencia_r` datetime NOT NULL,
  `id_de_incidencia_r` int(110) NOT NULL,
  `id_incidencia_r_status` int(110) NOT NULL,
  `id_quien_actualizo_r` int(24) DEFAULT NULL,
  `update_fecha_inc_r` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol_per` int(11) NOT NULL,
  `name_rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol_per`, `name_rol`) VALUES
(1, 'Super Admin'),
(2, 'Volunteer'),
(3, 'Guest Only'),
(4, 'Admin'),
(5, 'Chief of Volunteers'),
(6, 'Collaborator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_kind`
--

CREATE TABLE `room_kind` (
  `id_room_kind` int(4) NOT NULL,
  `name_room_kind` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `room_kind`
--

INSERT INTO `room_kind` (`id_room_kind`, `name_room_kind`) VALUES
(1, 'Feminine'),
(3, 'Mixed'),
(4, 'Private');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_number`
--

CREATE TABLE `room_number` (
  `id_room_number` int(8) NOT NULL,
  `name_room_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `room_number`
--

INSERT INTO `room_number` (`id_room_number`, `name_room_number`) VALUES
(1, 'FEM-3'),
(2, 'FEM-6'),
(3, 'MIX-9'),
(4, 'MIX-1'),
(5, 'MIX-4'),
(6, 'PRI-8'),
(14, 'FEM-7'),
(15, 'PRI-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_status`
--

CREATE TABLE `room_status` (
  `id_room_status` int(11) NOT NULL,
  `name_room_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `room_status`
--

INSERT INTO `room_status` (`id_room_status`, `name_room_status`) VALUES
(1, 'Available'),
(2, 'Unavailable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sex`
--

CREATE TABLE `sex` (
  `id_sex` int(2) NOT NULL,
  `name_sex` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sex`
--

INSERT INTO `sex` (`id_sex`, `name_sex`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, '.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taxes`
--

CREATE TABLE `taxes` (
  `id_taxes` int(3) NOT NULL,
  `name_taxes` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `taxes`
--

INSERT INTO `taxes` (`id_taxes`, `name_taxes`) VALUES
(1, '0'),
(2, '9'),
(3, '10'),
(4, '11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_address`
--

CREATE TABLE `tb_address` (
  `id_address` int(64) NOT NULL,
  `city_address` varchar(20) NOT NULL,
  `id_country` int(11) NOT NULL,
  `post_code_address` int(11) DEFAULT NULL,
  `name_address` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_address`
--

INSERT INTO `tb_address` (`id_address`, `city_address`, `id_country`, `post_code_address`, `name_address`) VALUES
(47, 'Tulum', 7, 0, ''),
(48, 'Caracas', 8, 1010, ''),
(49, 'Caracas', 8, 1050, 'San Martín'),
(51, '', 84, 95880, ''),
(52, '', 94, 0, ''),
(53, 'Tulum', 7, 77760, '361 Calle Beta Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_data_guests`
--

CREATE TABLE `tb_data_guests` (
  `id_data_guests` int(250) NOT NULL,
  `guests_doc_id_pic` varchar(60) NOT NULL,
  `id_nation_g` int(60) NOT NULL DEFAULT 7,
  `guests_email` varchar(60) DEFAULT NULL,
  `guests_phone` varchar(20) DEFAULT NULL,
  `guests_behaviors` int(60) NOT NULL DEFAULT 12,
  `guests_observ` varchar(200) DEFAULT NULL,
  `id_guests` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_data_personal`
--

CREATE TABLE `tb_data_personal` (
  `id_data_per` int(16) NOT NULL,
  `a_phone_per` varchar(40) DEFAULT NULL,
  `b_phone_per` varchar(40) DEFAULT NULL,
  `email_per` varchar(40) NOT NULL,
  `pic_per` varchar(60) DEFAULT NULL,
  `pic_doc_per` varchar(60) DEFAULT NULL,
  `pic_passport_per` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_data_personal`
--

INSERT INTO `tb_data_personal` (`id_data_per`, `a_phone_per`, `b_phone_per`, `email_per`, `pic_per`, `pic_doc_per`, `pic_passport_per`) VALUES
(26, '04241198683', '', 'jczhotbull@gmail.com', 'img_per/26_13137951.png', 'img_doc_per/26_13137951.png', 'img_passport_per/26_13137951.png'),
(27, '04242772573', '', 'sinaiguerrero@gmail.com', 'img_per/27_17720914.png', NULL, NULL),
(29, '+33644075884', '', 's@s.com', 'img_per/29_17AD64721.png', NULL, 'img_passport_per/29_17.png'),
(30, '+4915779803814', '', 'i@i.com', 'img_per/30_C89391K8X.png', NULL, 'img_passport_per/30_C89391K8X.png'),
(31, '+13129535926', '+12243003903', 'JorgeBustillos9@gmail.com', 'img_per/31_19589342.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_guests`
--

CREATE TABLE `tb_guests` (
  `id_guests` int(250) NOT NULL,
  `guests_doc_id` varchar(30) NOT NULL,
  `p_name_g` varchar(20) DEFAULT NULL,
  `s_name_g` varchar(20) DEFAULT NULL,
  `p_surname_g` varchar(20) DEFAULT NULL,
  `s_surname_g` varchar(20) DEFAULT NULL,
  `guests_pic` varchar(60) DEFAULT NULL,
  `guests_pass` varchar(60) NOT NULL,
  `guests_status` int(1) NOT NULL DEFAULT 1,
  `guests_register_by` int(64) NOT NULL,
  `guests_birth` date DEFAULT NULL,
  `guests_mod` int(1) NOT NULL DEFAULT 0,
  `guests_sex` int(12) NOT NULL DEFAULT 3,
  `guests_today` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_guests_services_check_in`
--

CREATE TABLE `tb_guests_services_check_in` (
  `id_guests_services_check_in` int(254) NOT NULL,
  `id_hostel` int(11) NOT NULL,
  `id_bed_booking` int(250) NOT NULL,
  `id_del_servicio_check_in` int(24) NOT NULL,
  `id_service_price_check_in` int(125) NOT NULL,
  `adquirido_el_check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cant_adquirida` int(11) NOT NULL,
  `service_note` varchar(250) NOT NULL,
  `cant_recibida` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_guests_services_regulares`
--

CREATE TABLE `tb_guests_services_regulares` (
  `id_guests_services_regulares` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historial_servicios_dados`
--

CREATE TABLE `tb_historial_servicios_dados` (
  `id_historial_servicios_dados` int(250) NOT NULL,
  `id_guests_services_check_in` int(250) NOT NULL,
  `cantidad_dada` int(11) NOT NULL,
  `nota_de_entrega` varchar(100) DEFAULT NULL,
  `fecha_entrega` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_quien_entrego` int(128) NOT NULL,
  `id_del_booking` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_payment_hospedaje`
--

CREATE TABLE `tb_payment_hospedaje` (
  `id_payment_hospedaje` int(254) NOT NULL,
  `id_hostel` int(64) NOT NULL,
  `tot_hospedaje_tax_cero` decimal(30,2) NOT NULL DEFAULT 0.00,
  `tot_hospedaje_con_tax` decimal(30,2) NOT NULL DEFAULT 0.00,
  `tot_services_tax_cero` decimal(30,2) NOT NULL DEFAULT 0.00,
  `tot_services_con_tax` decimal(30,2) NOT NULL DEFAULT 0.00,
  `id_tax_no_cero` int(11) NOT NULL DEFAULT 1,
  `monto_hospedaje_total` decimal(40,2) NOT NULL DEFAULT 0.00,
  `monto_servicio_total` decimal(40,2) NOT NULL DEFAULT 0.00,
  `primer_pago_hospedaje` decimal(40,2) NOT NULL DEFAULT 0.00,
  `id_primer_pago_forma` int(11) NOT NULL DEFAULT 1,
  `primer_pago_fecha` date DEFAULT NULL,
  `primer_pago_recibo` varchar(30) DEFAULT NULL,
  `segundo_pago_hospedaje` decimal(40,2) NOT NULL DEFAULT 0.00,
  `id_segundo_pago_forma` int(11) NOT NULL DEFAULT 1,
  `segundo_pago_fecha` date DEFAULT NULL,
  `segundo_pago_recibo` varchar(30) DEFAULT NULL,
  `tercer_pago_hospedaje` decimal(40,2) NOT NULL DEFAULT 0.00,
  `id_tercer_pago_forma` int(11) NOT NULL DEFAULT 1,
  `tercer_pago_fecha` date DEFAULT NULL,
  `tercer_pago_recibo` varchar(30) DEFAULT NULL,
  `cuarto_pago_hospedaje` decimal(40,2) NOT NULL DEFAULT 0.00,
  `id_cuarto_pago_forma` int(11) NOT NULL DEFAULT 1,
  `cuarto_pago_fecha` date DEFAULT NULL,
  `cuarto_pago_recibo` varchar(30) DEFAULT NULL,
  `quinto_pago_hospedaje` decimal(40,2) NOT NULL DEFAULT 0.00,
  `id_quinto_pago_forma` int(11) NOT NULL DEFAULT 1,
  `quinto_pago_fecha` date DEFAULT NULL,
  `quinto_pago_recibo` varchar(30) DEFAULT NULL,
  `sexto_pago_hospedaje` decimal(40,2) NOT NULL DEFAULT 0.00,
  `id_sexto_pago_forma` int(11) NOT NULL DEFAULT 1,
  `sexto_pago_fecha` date DEFAULT NULL,
  `sexto_pago_recibo` varchar(30) DEFAULT NULL,
  `comentario_hospedaje` varchar(200) DEFAULT NULL,
  `link_payment` varchar(1500) DEFAULT NULL,
  `deuda_hospedaje` decimal(40,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_personal`
--

CREATE TABLE `tb_personal` (
  `id_per` int(11) NOT NULL,
  `doc_per` varchar(30) NOT NULL,
  `passport_per` varchar(30) DEFAULT NULL,
  `p_name_per` varchar(20) NOT NULL,
  `s_name_per` varchar(20) DEFAULT NULL,
  `p_surname_per` varchar(20) NOT NULL,
  `s_surname_per` varchar(20) DEFAULT NULL,
  `birth_per` date NOT NULL,
  `id_address` int(16) NOT NULL,
  `id_sex` int(2) NOT NULL,
  `id_nationality` int(11) NOT NULL,
  `password_per` varchar(60) NOT NULL,
  `id_rol_per` int(11) NOT NULL,
  `info_send_per` varchar(3) NOT NULL DEFAULT 'No',
  `id_hostel` int(11) NOT NULL,
  `id_data_per` int(16) NOT NULL,
  `per_was_mod` int(1) NOT NULL DEFAULT 0,
  `per_registered_by` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `pass_was_mod` int(1) NOT NULL DEFAULT 0,
  `creado_el` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_personal`
--

INSERT INTO `tb_personal` (`id_per`, `doc_per`, `passport_per`, `p_name_per`, `s_name_per`, `p_surname_per`, `s_surname_per`, `birth_per`, `id_address`, `id_sex`, `id_nationality`, `password_per`, `id_rol_per`, `info_send_per`, `id_hostel`, `id_data_per`, `per_was_mod`, `per_registered_by`, `status`, `pass_was_mod`, `creado_el`) VALUES
(26, '13137951', 'VZ13137VEN', 'Juan', '', 'Zuñiga', '', '1978-11-24', 48, 1, 170, '6bcdabbf45e8b873e4cb460082c4da0d', 1, 'No', 17, 26, 1, 26, 1, 1, '2024-04-18 18:32:04'),
(27, '17720914', 'VZ17720VEN', 'Sinai', '', 'Guerrero', 'Salazar', '0986-06-24', 49, 2, 170, 'b4b5c31027a3b50933bab16b64fea76b', 5, 'No', 17, 27, 0, 26, 1, 0, '2024-04-18 22:12:57'),
(29, '17AD64721', '17AD64721', 'Salomé', '', 'Gardrat', '', '1998-03-16', 51, 2, 58, 'acce43367b4ed9fdc4779840759e1202', 2, 'No', 17, 29, 0, 26, 1, 0, '2024-04-19 13:13:20'),
(30, 'C89391K8X', 'C89391K8X', 'Irmela', 'Leni', 'Pferffermann', '', '2004-02-03', 52, 2, 60, '6bf4c173eea40977d42f7199749f542c', 2, 'No', 17, 30, 0, 26, 1, 0, '2024-04-19 13:21:23'),
(31, '19589342', '19589342', 'Jorge', 'Luis', 'Bustillos', 'Chavez', '1989-06-17', 53, 1, 170, '47040f38d51053bda04ad2eef026ae3d', 1, 'No', 17, 31, 0, 26, 1, 0, '2024-04-19 19:08:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_prices_beds`
--

CREATE TABLE `tb_prices_beds` (
  `id_prices_beds` int(64) NOT NULL,
  `id_hostel` int(48) NOT NULL,
  `id_room_kind` int(16) NOT NULL,
  `name_prices_beds` decimal(20,2) NOT NULL,
  `taxes_beds` int(32) NOT NULL DEFAULT 1,
  `discount_beds` int(32) NOT NULL DEFAULT 1,
  `set_prices_date_b` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prices_set_by_who_b` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_prices_beds`
--

INSERT INTO `tb_prices_beds` (`id_prices_beds`, `id_hostel`, `id_room_kind`, `name_prices_beds`, `taxes_beds`, `discount_beds`, `set_prices_date_b`, `prices_set_by_who_b`) VALUES
(17, 17, 1, 90.00, 2, 3, '2024-04-18 18:47:49', 26),
(18, 17, 3, 100.00, 2, 1, '2024-04-18 18:48:04', 26),
(19, 17, 4, 140.00, 2, 3, '2024-04-18 18:48:19', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_prices_rooms`
--

CREATE TABLE `tb_prices_rooms` (
  `id_prices_rooms` int(64) NOT NULL,
  `id_hostel` int(48) NOT NULL,
  `id_room_kind` int(16) NOT NULL,
  `name_prices_rooms` decimal(20,2) NOT NULL,
  `taxes_room` int(16) NOT NULL DEFAULT 1,
  `discount_room` int(32) NOT NULL DEFAULT 1,
  `set_prices_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prices_set_by_who` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_prices_rooms`
--

INSERT INTO `tb_prices_rooms` (`id_prices_rooms`, `id_hostel`, `id_room_kind`, `name_prices_rooms`, `taxes_room`, `discount_room`, `set_prices_date`, `prices_set_by_who`) VALUES
(20, 17, 1, 600.00, 2, 5, '2024-04-18 18:49:45', 26),
(21, 17, 3, 600.00, 2, 1, '2024-04-18 18:49:57', 26),
(22, 17, 4, 700.00, 2, 1, '2024-04-18 18:50:08', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_room`
--

CREATE TABLE `tb_room` (
  `id_room` int(6) NOT NULL,
  `id_hostel` int(32) NOT NULL,
  `id_room_kind` int(11) NOT NULL,
  `id_room_number` int(11) NOT NULL,
  `id_floors` int(11) NOT NULL,
  `id_hostel_area` int(11) NOT NULL,
  `creada_por` int(11) NOT NULL,
  `room_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_status` int(1) NOT NULL DEFAULT 1,
  `room_observ` varchar(111) DEFAULT NULL,
  `room_status_temp` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_room`
--

INSERT INTO `tb_room` (`id_room`, `id_hostel`, `id_room_kind`, `id_room_number`, `id_floors`, `id_hostel_area`, `creada_por`, `room_date`, `room_status`, `room_observ`, `room_status_temp`) VALUES
(66, 17, 1, 1, 1, 1, 26, '2024-04-18 18:37:12', 1, '', 1),
(67, 17, 1, 2, 2, 1, 26, '2024-04-18 18:42:25', 1, '', 1),
(68, 17, 1, 14, 2, 1, 26, '2024-04-18 18:43:12', 1, '', 1),
(69, 17, 3, 4, 1, 1, 26, '2024-04-18 18:44:14', 1, '', 1),
(70, 17, 3, 5, 1, 1, 26, '2024-04-18 18:45:03', 1, '', 1),
(71, 17, 3, 3, 2, 1, 26, '2024-04-18 18:45:45', 1, '', 1),
(72, 17, 4, 15, 1, 1, 26, '2024-04-18 18:46:21', 1, '', 1),
(73, 17, 4, 6, 2, 1, 26, '2024-04-18 18:46:42', 1, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rooms_beds`
--

CREATE TABLE `tb_rooms_beds` (
  `id_rooms_beds` int(64) NOT NULL,
  `id_hostel` int(64) NOT NULL,
  `id_room` int(14) NOT NULL,
  `id_room_kind` int(64) NOT NULL,
  `id_bed_kind` int(10) NOT NULL,
  `id_bed_number` int(10) NOT NULL,
  `note` varchar(70) DEFAULT NULL,
  `bed_status_temp` int(32) NOT NULL DEFAULT 1,
  `id_bunk_level` int(24) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_rooms_beds`
--

INSERT INTO `tb_rooms_beds` (`id_rooms_beds`, `id_hostel`, `id_room`, `id_room_kind`, `id_bed_kind`, `id_bed_number`, `note`, `bed_status_temp`, `id_bunk_level`) VALUES
(215, 17, 66, 1, 1, 18, '', 1, 1),
(216, 17, 66, 1, 1, 19, '', 1, 1),
(217, 17, 66, 1, 1, 20, '', 1, 1),
(218, 17, 66, 1, 1, 21, '', 1, 2),
(219, 17, 66, 1, 1, 22, '', 1, 2),
(220, 17, 66, 1, 1, 23, '', 1, 2),
(221, 17, 67, 1, 1, 1, '', 1, 1),
(222, 17, 67, 1, 1, 2, '', 1, 1),
(223, 17, 67, 1, 1, 3, '', 1, 1),
(224, 17, 67, 1, 1, 4, '', 1, 2),
(225, 17, 67, 1, 1, 5, '', 1, 2),
(226, 17, 67, 1, 1, 6, '', 1, 2),
(227, 17, 68, 1, 1, 12, '', 1, 1),
(228, 17, 68, 1, 1, 13, '', 1, 1),
(229, 17, 68, 1, 1, 14, '', 1, 1),
(230, 17, 68, 1, 1, 15, '', 1, 2),
(231, 17, 68, 1, 1, 16, '', 1, 2),
(232, 17, 68, 1, 1, 17, '', 1, 2),
(233, 17, 69, 3, 1, 24, '', 1, 1),
(234, 17, 69, 3, 1, 25, '', 1, 1),
(235, 17, 69, 3, 1, 26, '', 1, 1),
(236, 17, 69, 3, 1, 27, '', 1, 2),
(237, 17, 69, 3, 1, 28, '', 1, 2),
(238, 17, 69, 3, 1, 29, '', 1, 2),
(239, 17, 70, 3, 1, 30, '', 1, 1),
(240, 17, 70, 3, 1, 31, '', 1, 1),
(241, 17, 70, 3, 1, 32, '', 1, 1),
(242, 17, 70, 3, 1, 33, '', 1, 2),
(243, 17, 70, 3, 1, 34, '', 1, 2),
(244, 17, 70, 3, 1, 35, '', 1, 2),
(245, 17, 71, 3, 1, 36, '', 1, 1),
(246, 17, 71, 3, 1, 37, '', 1, 1),
(247, 17, 71, 3, 1, 45, '', 1, 1),
(248, 17, 71, 3, 1, 38, '', 1, 2),
(249, 17, 71, 3, 1, 39, '', 1, 2),
(250, 17, 71, 3, 1, 40, '', 1, 2),
(251, 17, 72, 4, 2, 43, '', 1, 1),
(252, 17, 72, 4, 2, 44, '', 1, 1),
(253, 17, 73, 4, 2, 41, '', 1, 1),
(254, 17, 73, 4, 2, 42, '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_services`
--

CREATE TABLE `tb_services` (
  `id_services` int(32) NOT NULL,
  `id_hostal` int(32) NOT NULL,
  `id_product_kind` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `creado_por_el` int(11) NOT NULL,
  `service_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `service_status` int(1) NOT NULL DEFAULT 1,
  `service_charac` varchar(111) NOT NULL,
  `sale_kind` int(1) NOT NULL DEFAULT 1,
  `service_qty` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_services_prices`
--

CREATE TABLE `tb_services_prices` (
  `id_services_prices` int(128) NOT NULL,
  `id_hostel` int(64) NOT NULL,
  `id_services` int(250) NOT NULL,
  `id_product_kind` int(64) NOT NULL,
  `id_product` int(32) NOT NULL,
  `the_price` decimal(18,2) NOT NULL,
  `tax_services` int(16) NOT NULL DEFAULT 1,
  `discount_type` int(64) NOT NULL DEFAULT 1,
  `set_this_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `set_by_this_per` int(32) NOT NULL,
  `my_cost` decimal(20,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_data_hostel`
--

CREATE TABLE `z_data_hostel` (
  `id_data_hostel` int(16) NOT NULL,
  `a_phone_hostel` varchar(20) DEFAULT NULL,
  `b_phone_hostel` varchar(20) DEFAULT NULL,
  `c_phone_hostel` varchar(20) DEFAULT NULL,
  `a_web_hostel` varchar(40) DEFAULT NULL,
  `b_web_hostel` varchar(40) DEFAULT NULL,
  `reg_number_hostel` varchar(20) DEFAULT NULL,
  `ranking_hostel` varchar(9) DEFAULT NULL,
  `a_email_hostel` varchar(40) DEFAULT NULL,
  `b_email_hostel` varchar(40) DEFAULT NULL,
  `c_email_hostel` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `z_data_hostel`
--

INSERT INTO `z_data_hostel` (`id_data_hostel`, `a_phone_hostel`, `b_phone_hostel`, `c_phone_hostel`, `a_web_hostel`, `b_web_hostel`, `reg_number_hostel`, `ranking_hostel`, `a_email_hostel`, `b_email_hostel`, `c_email_hostel`) VALUES
(17, '+529841652384', '', '', '', '', '', '1', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `z_hostel`
--

CREATE TABLE `z_hostel` (
  `id_hostel` int(11) NOT NULL,
  `name_hostel` varchar(50) NOT NULL,
  `nick_name_hostel` varchar(11) DEFAULT NULL,
  `code_hostel` varchar(20) NOT NULL,
  `id_address` int(16) NOT NULL,
  `id_data_hostel` int(11) DEFAULT NULL,
  `logo_hostel` varchar(60) DEFAULT NULL,
  `hostel_was_mod` int(1) NOT NULL DEFAULT 0,
  `hostel_registered_by` int(16) DEFAULT NULL,
  `status_hostel` int(1) NOT NULL DEFAULT 1,
  `abierto_el` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_currency` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `z_hostel`
--

INSERT INTO `z_hostel` (`id_hostel`, `name_hostel`, `nick_name_hostel`, `code_hostel`, `id_address`, `id_data_hostel`, `logo_hostel`, `hostel_was_mod`, `hostel_registered_by`, `status_hostel`, `abierto_el`, `id_currency`) VALUES
(17, 'Freelance Hostel', '', 'FL001', 47, 17, NULL, 1, 26, 1, '2024-04-18 18:26:28', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bed_booking`
--
ALTER TABLE `bed_booking`
  ADD PRIMARY KEY (`id_bed_booking`),
  ADD KEY `los_hosteless` (`id_hostel`),
  ADD KEY `cuartillos` (`id_room`),
  ADD KEY `camacama` (`id_room_bed`),
  ADD KEY `pagos_huesped` (`id_payment_huesped`),
  ADD KEY `book_statutos` (`booking_status`);

--
-- Indices de la tabla `bed_kind`
--
ALTER TABLE `bed_kind`
  ADD PRIMARY KEY (`id_bed_kind`);

--
-- Indices de la tabla `bed_number`
--
ALTER TABLE `bed_number`
  ADD PRIMARY KEY (`id_bed_number`);

--
-- Indices de la tabla `bed_status`
--
ALTER TABLE `bed_status`
  ADD PRIMARY KEY (`id_bed_status`);

--
-- Indices de la tabla `behaviors`
--
ALTER TABLE `behaviors`
  ADD PRIMARY KEY (`id_behaviors`);

--
-- Indices de la tabla `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`id_booking_status`);

--
-- Indices de la tabla `bunk_level`
--
ALTER TABLE `bunk_level`
  ADD PRIMARY KEY (`id_bunk_level`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indices de la tabla `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id_currency`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id_discounts`);

--
-- Indices de la tabla `exchange_rates`
--
ALTER TABLE `exchange_rates`
  ADD PRIMARY KEY (`id_exchange_rates`),
  ADD KEY `hostal_exchange` (`id_hostel`),
  ADD KEY `currency_Selected` (`id_hostel_currency`),
  ADD KEY `curremcy_aa` (`id_currency_A`),
  ADD KEY `curremcy_bb` (`id_currency_B`);

--
-- Indices de la tabla `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id_floors`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id_forma_pago`);

--
-- Indices de la tabla `hostel_area`
--
ALTER TABLE `hostel_area`
  ADD PRIMARY KEY (`id_hostel_area`);

--
-- Indices de la tabla `incidents_beds`
--
ALTER TABLE `incidents_beds`
  ADD PRIMARY KEY (`id_incidents_beds`);

--
-- Indices de la tabla `incidents_rooms`
--
ALTER TABLE `incidents_rooms`
  ADD PRIMARY KEY (`id_incidents_rooms`);

--
-- Indices de la tabla `incident_b_status`
--
ALTER TABLE `incident_b_status`
  ADD PRIMARY KEY (`id_incident_b_status`);

--
-- Indices de la tabla `incident_r_status`
--
ALTER TABLE `incident_r_status`
  ADD PRIMARY KEY (`id_incident_r_status`);

--
-- Indices de la tabla `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id_nationality`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `product_kind`
--
ALTER TABLE `product_kind`
  ADD PRIMARY KEY (`id_product_kind`);

--
-- Indices de la tabla `quien_y_cuando_host`
--
ALTER TABLE `quien_y_cuando_host`
  ADD PRIMARY KEY (`id_q_y_c_host`),
  ADD KEY `host_open_or` (`id_host_open_o_close`);

--
-- Indices de la tabla `quien_y_cuando_per`
--
ALTER TABLE `quien_y_cuando_per`
  ADD PRIMARY KEY (`id_q_y_c_per`),
  ADD KEY `el_activado_o_desact` (`id_per_act_o_desact`);

--
-- Indices de la tabla `quien_y_cuando_room`
--
ALTER TABLE `quien_y_cuando_room`
  ADD PRIMARY KEY (`id_q_y_c_room`);

--
-- Indices de la tabla `reporte_incidencias_b`
--
ALTER TABLE `reporte_incidencias_b`
  ADD PRIMARY KEY (`id_reporte_incidencias_b`),
  ADD KEY `reportado_por_b` (`id_quien_reporto_b`),
  ADD KEY `La_cama_tal` (`id_de_la_bed_b`),
  ADD KEY `la_incidcencia_b` (`id_de_incidencia_b`),
  ADD KEY `status_incidencia_b` (`id_incidencia_b_status`);

--
-- Indices de la tabla `reporte_incidencias_r`
--
ALTER TABLE `reporte_incidencias_r`
  ADD PRIMARY KEY (`id_reporte_incidencias_r`),
  ADD KEY `reportado_por_r` (`id_quien_reporto_r`),
  ADD KEY `en_el_cuarto` (`id_de_la_room_r`),
  ADD KEY `la_incidcencia_r` (`id_de_incidencia_r`),
  ADD KEY `status_incidencia` (`id_incidencia_r_status`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol_per`);

--
-- Indices de la tabla `room_kind`
--
ALTER TABLE `room_kind`
  ADD PRIMARY KEY (`id_room_kind`);

--
-- Indices de la tabla `room_number`
--
ALTER TABLE `room_number`
  ADD PRIMARY KEY (`id_room_number`);

--
-- Indices de la tabla `room_status`
--
ALTER TABLE `room_status`
  ADD PRIMARY KEY (`id_room_status`);

--
-- Indices de la tabla `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id_sex`);

--
-- Indices de la tabla `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id_taxes`);

--
-- Indices de la tabla `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `country` (`id_country`);

--
-- Indices de la tabla `tb_data_guests`
--
ALTER TABLE `tb_data_guests`
  ADD PRIMARY KEY (`id_data_guests`),
  ADD KEY `g_nacionalidad` (`id_nation_g`),
  ADD KEY `g_ranking` (`guests_behaviors`);

--
-- Indices de la tabla `tb_data_personal`
--
ALTER TABLE `tb_data_personal`
  ADD PRIMARY KEY (`id_data_per`);

--
-- Indices de la tabla `tb_guests`
--
ALTER TABLE `tb_guests`
  ADD PRIMARY KEY (`id_guests`),
  ADD KEY `registrado_g_por` (`guests_register_by`),
  ADD KEY `sexoi` (`guests_sex`);

--
-- Indices de la tabla `tb_guests_services_check_in`
--
ALTER TABLE `tb_guests_services_check_in`
  ADD PRIMARY KEY (`id_guests_services_check_in`),
  ADD KEY `servicial` (`id_del_servicio_check_in`),
  ADD KEY `precioso` (`id_service_price_check_in`),
  ADD KEY `book_in_in` (`id_bed_booking`);

--
-- Indices de la tabla `tb_guests_services_regulares`
--
ALTER TABLE `tb_guests_services_regulares`
  ADD PRIMARY KEY (`id_guests_services_regulares`);

--
-- Indices de la tabla `tb_historial_servicios_dados`
--
ALTER TABLE `tb_historial_servicios_dados`
  ADD PRIMARY KEY (`id_historial_servicios_dados`);

--
-- Indices de la tabla `tb_payment_hospedaje`
--
ALTER TABLE `tb_payment_hospedaje`
  ADD PRIMARY KEY (`id_payment_hospedaje`),
  ADD KEY `pago_a` (`id_primer_pago_forma`),
  ADD KEY `pago_b` (`id_segundo_pago_forma`),
  ADD KEY `pago_c` (`id_tercer_pago_forma`);

--
-- Indices de la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD PRIMARY KEY (`id_per`),
  ADD KEY `sex` (`id_sex`),
  ADD KEY `nacionality` (`id_nationality`),
  ADD KEY `hostel` (`id_hostel`),
  ADD KEY `address_per` (`id_address`),
  ADD KEY `data_per` (`id_data_per`),
  ADD KEY `roles` (`id_rol_per`);

--
-- Indices de la tabla `tb_prices_beds`
--
ALTER TABLE `tb_prices_beds`
  ADD PRIMARY KEY (`id_prices_beds`),
  ADD KEY `eltiporoom` (`id_room_kind`),
  ADD KEY `descuentos_bed` (`discount_beds`),
  ADD KEY `el_tax` (`taxes_beds`);

--
-- Indices de la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  ADD PRIMARY KEY (`id_prices_rooms`),
  ADD KEY `tipo_room` (`id_room_kind`),
  ADD KEY `descuento_r` (`discount_room`),
  ADD KEY `taxes_r` (`taxes_room`);

--
-- Indices de la tabla `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `room_kindd` (`id_room_kind`),
  ADD KEY `rrom_nummm` (`id_room_number`),
  ADD KEY `hostel_areasss` (`id_hostel_area`),
  ADD KEY `hostales_con_room` (`id_hostel`),
  ADD KEY `floorsss` (`id_floors`),
  ADD KEY `room_stado` (`room_status_temp`);

--
-- Indices de la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  ADD PRIMARY KEY (`id_rooms_beds`),
  ADD KEY `tipo_cama` (`id_bed_kind`),
  ADD KEY `num_cama` (`id_bed_number`),
  ADD KEY `el_id_room` (`id_room`),
  ADD KEY `estado_b` (`bed_status_temp`),
  ADD KEY `level_cama` (`id_bunk_level`);

--
-- Indices de la tabla `tb_services`
--
ALTER TABLE `tb_services`
  ADD PRIMARY KEY (`id_services`),
  ADD KEY `tipodeproducto` (`id_product_kind`),
  ADD KEY `elproducto` (`id_producto`),
  ADD KEY `elhostel` (`id_hostal`);

--
-- Indices de la tabla `tb_services_prices`
--
ALTER TABLE `tb_services_prices`
  ADD PRIMARY KEY (`id_services_prices`),
  ADD KEY `el_hostel` (`id_hostel`),
  ADD KEY `tipo_pproducc` (`id_product_kind`),
  ADD KEY `el_produccc` (`id_product`),
  ADD KEY `descuento` (`discount_type`),
  ADD KEY `tax_Service` (`tax_services`);

--
-- Indices de la tabla `z_data_hostel`
--
ALTER TABLE `z_data_hostel`
  ADD PRIMARY KEY (`id_data_hostel`);

--
-- Indices de la tabla `z_hostel`
--
ALTER TABLE `z_hostel`
  ADD PRIMARY KEY (`id_hostel`),
  ADD KEY `address` (`id_address`),
  ADD KEY `data` (`id_data_hostel`),
  ADD KEY `money` (`id_currency`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bed_booking`
--
ALTER TABLE `bed_booking`
  MODIFY `id_bed_booking` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT de la tabla `bed_kind`
--
ALTER TABLE `bed_kind`
  MODIFY `id_bed_kind` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bed_number`
--
ALTER TABLE `bed_number`
  MODIFY `id_bed_number` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `bed_status`
--
ALTER TABLE `bed_status`
  MODIFY `id_bed_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `behaviors`
--
ALTER TABLE `behaviors`
  MODIFY `id_behaviors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `id_booking_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bunk_level`
--
ALTER TABLE `bunk_level`
  MODIFY `id_bunk_level` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `currency`
--
ALTER TABLE `currency`
  MODIFY `id_currency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id_discounts` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `exchange_rates`
--
ALTER TABLE `exchange_rates`
  MODIFY `id_exchange_rates` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `floors`
--
ALTER TABLE `floors`
  MODIFY `id_floors` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `hostel_area`
--
ALTER TABLE `hostel_area`
  MODIFY `id_hostel_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `incidents_beds`
--
ALTER TABLE `incidents_beds`
  MODIFY `id_incidents_beds` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `incidents_rooms`
--
ALTER TABLE `incidents_rooms`
  MODIFY `id_incidents_rooms` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `incident_b_status`
--
ALTER TABLE `incident_b_status`
  MODIFY `id_incident_b_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `incident_r_status`
--
ALTER TABLE `incident_r_status`
  MODIFY `id_incident_r_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id_nationality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `product_kind`
--
ALTER TABLE `product_kind`
  MODIFY `id_product_kind` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `quien_y_cuando_host`
--
ALTER TABLE `quien_y_cuando_host`
  MODIFY `id_q_y_c_host` int(48) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `quien_y_cuando_per`
--
ALTER TABLE `quien_y_cuando_per`
  MODIFY `id_q_y_c_per` int(48) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `quien_y_cuando_room`
--
ALTER TABLE `quien_y_cuando_room`
  MODIFY `id_q_y_c_room` int(48) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reporte_incidencias_b`
--
ALTER TABLE `reporte_incidencias_b`
  MODIFY `id_reporte_incidencias_b` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reporte_incidencias_r`
--
ALTER TABLE `reporte_incidencias_r`
  MODIFY `id_reporte_incidencias_r` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `room_kind`
--
ALTER TABLE `room_kind`
  MODIFY `id_room_kind` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `room_number`
--
ALTER TABLE `room_number`
  MODIFY `id_room_number` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `room_status`
--
ALTER TABLE `room_status`
  MODIFY `id_room_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sex`
--
ALTER TABLE `sex`
  MODIFY `id_sex` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id_taxes` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `id_address` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `tb_data_guests`
--
ALTER TABLE `tb_data_guests`
  MODIFY `id_data_guests` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `tb_data_personal`
--
ALTER TABLE `tb_data_personal`
  MODIFY `id_data_per` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tb_guests`
--
ALTER TABLE `tb_guests`
  MODIFY `id_guests` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT de la tabla `tb_guests_services_check_in`
--
ALTER TABLE `tb_guests_services_check_in`
  MODIFY `id_guests_services_check_in` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `tb_guests_services_regulares`
--
ALTER TABLE `tb_guests_services_regulares`
  MODIFY `id_guests_services_regulares` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_historial_servicios_dados`
--
ALTER TABLE `tb_historial_servicios_dados`
  MODIFY `id_historial_servicios_dados` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tb_payment_hospedaje`
--
ALTER TABLE `tb_payment_hospedaje`
  MODIFY `id_payment_hospedaje` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tb_prices_beds`
--
ALTER TABLE `tb_prices_beds`
  MODIFY `id_prices_beds` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  MODIFY `id_prices_rooms` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `id_room` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  MODIFY `id_rooms_beds` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de la tabla `tb_services`
--
ALTER TABLE `tb_services`
  MODIFY `id_services` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tb_services_prices`
--
ALTER TABLE `tb_services_prices`
  MODIFY `id_services_prices` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `z_data_hostel`
--
ALTER TABLE `z_data_hostel`
  MODIFY `id_data_hostel` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `z_hostel`
--
ALTER TABLE `z_hostel`
  MODIFY `id_hostel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bed_booking`
--
ALTER TABLE `bed_booking`
  ADD CONSTRAINT `book_statutos` FOREIGN KEY (`booking_status`) REFERENCES `booking_status` (`id_booking_status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `camacama` FOREIGN KEY (`id_room_bed`) REFERENCES `tb_rooms_beds` (`id_rooms_beds`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuartillos` FOREIGN KEY (`id_room`) REFERENCES `tb_room` (`id_room`) ON UPDATE CASCADE,
  ADD CONSTRAINT `los_hosteless` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pagos_huesped` FOREIGN KEY (`id_payment_huesped`) REFERENCES `tb_payment_hospedaje` (`id_payment_hospedaje`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `exchange_rates`
--
ALTER TABLE `exchange_rates`
  ADD CONSTRAINT `curremcy_aa` FOREIGN KEY (`id_currency_A`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE,
  ADD CONSTRAINT `curremcy_bb` FOREIGN KEY (`id_currency_B`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE,
  ADD CONSTRAINT `currency_Selected` FOREIGN KEY (`id_hostel_currency`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hostal_exchange` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `quien_y_cuando_host`
--
ALTER TABLE `quien_y_cuando_host`
  ADD CONSTRAINT `host_open_or` FOREIGN KEY (`id_host_open_o_close`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `quien_y_cuando_per`
--
ALTER TABLE `quien_y_cuando_per`
  ADD CONSTRAINT `el_activado_o_desact` FOREIGN KEY (`id_per_act_o_desact`) REFERENCES `tb_personal` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte_incidencias_b`
--
ALTER TABLE `reporte_incidencias_b`
  ADD CONSTRAINT `La_cama_tal` FOREIGN KEY (`id_de_la_bed_b`) REFERENCES `tb_rooms_beds` (`id_rooms_beds`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `la_incidcencia_b` FOREIGN KEY (`id_de_incidencia_b`) REFERENCES `incidents_beds` (`id_incidents_beds`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reportado_por_b` FOREIGN KEY (`id_quien_reporto_b`) REFERENCES `tb_personal` (`id_per`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_incidencia_b` FOREIGN KEY (`id_incidencia_b_status`) REFERENCES `incidents_beds` (`id_incidents_beds`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte_incidencias_r`
--
ALTER TABLE `reporte_incidencias_r`
  ADD CONSTRAINT `en_el_cuarto` FOREIGN KEY (`id_de_la_room_r`) REFERENCES `tb_room` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `la_incidcencia_r` FOREIGN KEY (`id_de_incidencia_r`) REFERENCES `incidents_rooms` (`id_incidents_rooms`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reportado_por_r` FOREIGN KEY (`id_quien_reporto_r`) REFERENCES `tb_personal` (`id_per`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_incidencia` FOREIGN KEY (`id_incidencia_r_status`) REFERENCES `incident_r_status` (`id_incident_r_status`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_address`
--
ALTER TABLE `tb_address`
  ADD CONSTRAINT `country` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_data_guests`
--
ALTER TABLE `tb_data_guests`
  ADD CONSTRAINT `g_nacionalidad` FOREIGN KEY (`id_nation_g`) REFERENCES `nationality` (`id_nationality`) ON UPDATE CASCADE,
  ADD CONSTRAINT `g_ranking` FOREIGN KEY (`guests_behaviors`) REFERENCES `behaviors` (`id_behaviors`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_guests`
--
ALTER TABLE `tb_guests`
  ADD CONSTRAINT `registrado_g_por` FOREIGN KEY (`guests_register_by`) REFERENCES `tb_personal` (`id_per`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sexoi` FOREIGN KEY (`guests_sex`) REFERENCES `sex` (`id_sex`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_guests_services_check_in`
--
ALTER TABLE `tb_guests_services_check_in`
  ADD CONSTRAINT `book_in_in` FOREIGN KEY (`id_bed_booking`) REFERENCES `bed_booking` (`id_bed_booking`) ON UPDATE CASCADE,
  ADD CONSTRAINT `precioso` FOREIGN KEY (`id_service_price_check_in`) REFERENCES `tb_services_prices` (`id_services_prices`) ON UPDATE CASCADE,
  ADD CONSTRAINT `servicial` FOREIGN KEY (`id_del_servicio_check_in`) REFERENCES `tb_services` (`id_services`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_payment_hospedaje`
--
ALTER TABLE `tb_payment_hospedaje`
  ADD CONSTRAINT `pago_a` FOREIGN KEY (`id_primer_pago_forma`) REFERENCES `forma_pago` (`id_forma_pago`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_b` FOREIGN KEY (`id_segundo_pago_forma`) REFERENCES `forma_pago` (`id_forma_pago`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_c` FOREIGN KEY (`id_tercer_pago_forma`) REFERENCES `forma_pago` (`id_forma_pago`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD CONSTRAINT `address_per` FOREIGN KEY (`id_address`) REFERENCES `tb_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_per` FOREIGN KEY (`id_data_per`) REFERENCES `tb_data_personal` (`id_data_per`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostel` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nationality` FOREIGN KEY (`id_nationality`) REFERENCES `nationality` (`id_nationality`) ON UPDATE CASCADE,
  ADD CONSTRAINT `roles` FOREIGN KEY (`id_rol_per`) REFERENCES `roles` (`id_rol_per`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sex` FOREIGN KEY (`id_sex`) REFERENCES `sex` (`id_sex`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_prices_beds`
--
ALTER TABLE `tb_prices_beds`
  ADD CONSTRAINT `descuentos_bed` FOREIGN KEY (`discount_beds`) REFERENCES `discounts` (`id_discounts`) ON UPDATE CASCADE,
  ADD CONSTRAINT `el_tax` FOREIGN KEY (`taxes_beds`) REFERENCES `taxes` (`id_taxes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `eltiporoom` FOREIGN KEY (`id_room_kind`) REFERENCES `room_kind` (`id_room_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_prices_rooms`
--
ALTER TABLE `tb_prices_rooms`
  ADD CONSTRAINT `descuento_r` FOREIGN KEY (`discount_room`) REFERENCES `discounts` (`id_discounts`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taxes_r` FOREIGN KEY (`taxes_room`) REFERENCES `taxes` (`id_taxes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_room` FOREIGN KEY (`id_room_kind`) REFERENCES `room_kind` (`id_room_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_room`
--
ALTER TABLE `tb_room`
  ADD CONSTRAINT `floorsss` FOREIGN KEY (`id_floors`) REFERENCES `floors` (`id_floors`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hostales_con_room` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostel_areasss` FOREIGN KEY (`id_hostel_area`) REFERENCES `hostel_area` (`id_hostel_area`),
  ADD CONSTRAINT `room_kindd` FOREIGN KEY (`id_room_kind`) REFERENCES `room_kind` (`id_room_kind`) ON UPDATE CASCADE,
  ADD CONSTRAINT `room_stado` FOREIGN KEY (`room_status_temp`) REFERENCES `room_status` (`id_room_status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rrom_nummm` FOREIGN KEY (`id_room_number`) REFERENCES `room_number` (`id_room_number`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_rooms_beds`
--
ALTER TABLE `tb_rooms_beds`
  ADD CONSTRAINT `el_id_room` FOREIGN KEY (`id_room`) REFERENCES `tb_room` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estado_b` FOREIGN KEY (`bed_status_temp`) REFERENCES `bed_status` (`id_bed_status`) ON UPDATE CASCADE,
  ADD CONSTRAINT `level_cama` FOREIGN KEY (`id_bunk_level`) REFERENCES `bunk_level` (`id_bunk_level`) ON UPDATE CASCADE,
  ADD CONSTRAINT `num_cama` FOREIGN KEY (`id_bed_number`) REFERENCES `bed_number` (`id_bed_number`),
  ADD CONSTRAINT `tipo_cama` FOREIGN KEY (`id_bed_kind`) REFERENCES `bed_kind` (`id_bed_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_services`
--
ALTER TABLE `tb_services`
  ADD CONSTRAINT `elhostel` FOREIGN KEY (`id_hostal`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elproducto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipodeproducto` FOREIGN KEY (`id_product_kind`) REFERENCES `product_kind` (`id_product_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_services_prices`
--
ALTER TABLE `tb_services_prices`
  ADD CONSTRAINT `descuento` FOREIGN KEY (`discount_type`) REFERENCES `discounts` (`id_discounts`) ON UPDATE CASCADE,
  ADD CONSTRAINT `el_hostel` FOREIGN KEY (`id_hostel`) REFERENCES `z_hostel` (`id_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `el_produccc` FOREIGN KEY (`id_product`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tax_Service` FOREIGN KEY (`tax_services`) REFERENCES `taxes` (`id_taxes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_pproducc` FOREIGN KEY (`id_product_kind`) REFERENCES `product_kind` (`id_product_kind`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `z_hostel`
--
ALTER TABLE `z_hostel`
  ADD CONSTRAINT `address` FOREIGN KEY (`id_address`) REFERENCES `tb_address` (`id_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data` FOREIGN KEY (`id_data_hostel`) REFERENCES `z_data_hostel` (`id_data_hostel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `money` FOREIGN KEY (`id_currency`) REFERENCES `currency` (`id_currency`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
