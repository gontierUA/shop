-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 03 2014 г., 01:09
-- Версия сервера: 5.5.37-log
-- Версия PHP: 5.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` varchar(32) NOT NULL,
  `items` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `items`) VALUES
('0sh9hhrk050midpcp4a6o1bk71', '6;9;'),
('mgtsp3eaas9dvcoahm2394pat5', '4;1;');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `trade_mark` varchar(255) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `description` text,
  `watched` int(11) NOT NULL,
  `in_cart` int(11) NOT NULL,
  `bought` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `sku`, `title`, `image`, `price`, `code`, `trade_mark`, `material`, `package`, `description`, `watched`, `in_cart`, `bought`) VALUES
(1, 75051, 'Кожаный браслет с замком \nиз серебра №1', '/web/upload/1.jpg', '2074', 200001, 'Ирис', 'Доломит', 3, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(2, 75052, 'Кожаный браслет с замком \nиз серебра №2', '/web/upload/2.jpg', '2074', 200002, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(3, 75053, 'Кожаный браслет с замком \r\nиз серебра №3', '/web/upload/3.jpg', '2074', 200003, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(4, 75054, 'Кожаный браслет с замком \r\nиз серебра №4', '/web/upload/4.jpg', '2074', 200004, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(5, 75055, 'Кожаный браслет с замком \r\nиз серебра №5', '/web/upload/5.jpg', '2075', 200005, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(6, 75056, 'Кожаный браслет с замком \r\nиз серебра №6', '/web/upload/6.jpg', '2075', 200006, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(7, 75057, 'Кожаный браслет с замком \r\nиз серебра №7', '/web/upload/7.jpg', '2075', 200007, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(8, 75058, 'Кожаный браслет с замком \r\nиз серебра №8', '/web/upload/8.jpg', '2075', 200008, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(9, 75059, 'Кожаный браслет с замком \r\nиз серебра №9', '/web/upload/9.jpg', '2075', 200009, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(10, 75060, 'Кожаный браслет с замком \r\nиз серебра №10', '/web/upload/1.jpg', '2075', 200010, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(11, 75061, 'Кожаный браслет с замком \r\nиз серебра №11', '/web/upload/2.jpg', '2075', 200011, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(12, 75062, 'Кожаный браслет с замком \r\nиз серебра №12', '/web/upload/3.jpg', '2075', 200012, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(13, 75063, 'Кожаный браслет с замком \r\nиз серебра №13', '/web/upload/4.jpg', '2075', 200013, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(14, 75064, 'Кожаный браслет с замком \r\nиз серебра №14', '/web/upload/5.jpg', '2075', 200014, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(15, 75065, 'Кожаный браслет с замком \r\nиз серебра №15', '/web/upload/6.jpg', '2075', 200015, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(16, 75066, 'Кожаный браслет с замком \r\nиз серебра №16', '/web/upload/7.jpg', '2075', 200016, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(17, 75067, 'Кожаный браслет с замком \r\nиз серебра №17', '/web/upload/8.jpg', '2075', 200017, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(18, 75068, 'Кожаный браслет с замком \r\nиз серебра №18', '/web/upload/9.jpg', '2075', 200018, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(19, 75069, 'Кожаный браслет с замком \r\nиз серебра №19', '/web/upload/1.jpg', '2075', 200019, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(20, 75070, 'Кожаный браслет с замком \r\nиз серебра №20', '/web/upload/2.jpg', '2075', 200020, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(21, 75071, 'Кожаный браслет с замком \r\nиз серебра №21', '/web/upload/3.jpg', '2075', 200021, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(22, 75072, 'Кожаный браслет с замком \r\nиз серебра №22', '/web/upload/4.jpg', '2075', 200022, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(23, 75073, 'Кожаный браслет с замком \r\nиз серебра №23', '/web/upload/3.jpg', '2075', 200023, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(24, 75074, 'Кожаный браслет с замком \r\nиз серебра №24', '/web/upload/4.jpg', '2075', 200024, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(25, 75075, 'Кожаный браслет с замком \r\nиз серебра №25', '/web/upload/5.jpg', '2075', 200025, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(26, 75076, 'Кожаный браслет с замком \r\nиз серебра №26', '/web/upload/6.jpg', '2075', 200026, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(27, 75077, 'Кожаный браслет с замком \r\nиз серебра №27', '/web/upload/7.jpg', '2075', 200027, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(28, 75078, 'Кожаный браслет с замком \r\nиз серебра №28', '/web/upload/8.jpg', '2075', 200028, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(29, 75079, 'Кожаный браслет с замком \r\nиз серебра №29', '/web/upload/9.jpg', '2075', 200029, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0),
(30, 75080, 'Кожаный браслет с замком \r\nиз серебра №30', '/web/upload/1.jpg', '2075', 200030, 'Ирис', 'Серебро', 2, 'Тоненький, нежный браслет из красного золота обовьёт собой вашу женскую руку, подчёркивая грациозность и утончённость пальцев. Такой браслет прекрасно подойдёт девушке с изящным запястьем. Он будет красиво скользить по руке, делая вас более изысканной, женственной и привлекательной. Браслет из благородного металла – украшение, неподвластное моде.', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `recommend`
--

CREATE TABLE IF NOT EXISTS `recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_1` int(11) NOT NULL,
  `item_2` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` varchar(32) NOT NULL,
  `item_1` int(11) NOT NULL,
  `item_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `session`
--

INSERT INTO `session` (`id`, `item_1`, `item_2`) VALUES
('0sh9hhrk050midpcp4a6o1bk71', 0, 0),
('ep7sb0thrks09k1nmkor0csd07', 0, 0),
('mgtsp3eaas9dvcoahm2394pat5', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
