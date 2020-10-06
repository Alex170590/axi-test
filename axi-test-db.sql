SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `axi_questionnaires` (
  `id` bigint(20) NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_qualities` text COLLATE utf8mb4_unicode_ci,
  `skills` longtext COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci,
  `data_birth` timestamp NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `axi_questionnaires` (`id`, `gender`, `surname`, `name`, `middle`, `color`, `personal_qualities`, `skills`, `avatar`, `photo`, `data_birth`, `date`) VALUES
(17, 'Мужской', 'Пупкин', 'Генадий', 'Владиславович', 'Пурпурный', 'Мы искали, искали файл, который вы указали, но так и не нашли. Это может быть в одном из двух случаев:', '[\"опрятность\",\"самообучаемость\"]', '/upload/57b0e537c2e5689ae7e598ca9a71d485.jpeg', '[\"/upload/8d3ec7833ba03ac7f6e7bc47e50fe1d0.jpeg\",\"/upload/076c028ceedb2f281a1dd0329d41630a.jpeg\",\"/upload/9bc01f07e4ba1d04057e9109153d503e.jpeg\"]', '1990-05-16 17:00:00', '2020-10-06 04:49:41'),
(18, 'Мужской', 'Педро', 'Дмитрий', 'Ефремович', 'Бордовый', 'Фотографии в итоге должны быть обрезаны пропорционально: 700 px (по высоте) или 600 px (по\r\nширине), в зависимости от того, какая из сторон фотографии, загружаемая пользователем, будет\r\nнаибольшей ', '[\"усидчивость\",\"самообучаемость\",\"трудолюбие\"]', '/upload/a519576c94b77a8e60e6fcf2f28122a9.jpeg', '[\"/upload/d6a2dc3b8c827114e44a963867953451.jpeg\",\"/upload/df73ef3500d7c625b3b6c4fe9927a8ac.jpeg\",\"/upload/94dc40ffd4cd8f60e56559007277a0a2.jpeg\"]', '1990-04-21 17:00:00', '2020-10-06 06:37:21'),
(19, 'Женский', 'Мартышкина', 'Юлия', 'Дмитревна', 'Красный', 'Решение отправить в виде архива или ссылки на публичный git-репозиторий (должен быть дамп\r\nбазы данных с демо данными) ', '[\"усидчивость\",\"опрятность\"]', '/upload/4d9a3e43fbf80527b2ec404a8beb2159.jpeg', '[\"/upload/0f7193962148fd149860ff35b8bf8b6b.jpeg\",\"/upload/e3e33464f2ed997008249882f7b39321.jpeg\",\"/upload/0251649493c158d2641ed688345b8f36.png\"]', '1995-09-17 17:00:00', '2020-10-06 05:07:57'),
(22, 'Женский', 'Горилова', 'Анастасия', 'Геннадьевна', 'Белый', 'Необходимо использовать PHP 7.2+, СУБД MySQL 5.6+ или MariaDB 10+ ', '[\"опрятность\",\"самообучаемость\"]', '/upload/2f62d34755c1a8ff5b9ca568df9417d5.jpeg', '[\"/upload/7ad9d84613328dc230582d676e1ddfef.png\",\"/upload/70a4f94536f8c06993da426354d4ed9c.png\",\"/upload/d83d87097ef64409b07e9954d6eb4768.png\",\"/upload/067842f5dbe01ad2f7a71a7ee36c7c37.png\"]', '1999-11-06 17:00:00', '2020-10-06 05:11:18'),
(23, 'Мужской', 'Павлов', 'Алексей', 'Михайлович', 'Черный', 'Нельзя использовать CMS, фреймворки, библиотеки, конструкторы. Весь код должен быть свой', '[\"опрятность\",\"самообучаемость\",\"трудолюбие\"]', '/upload/23c9f3d68c0eba35f5890ab44715a2ca.jpeg', '[\"/upload/24b5b714b61343f44d698febd70b3d6d.png\",\"/upload/31e7c3aa0d128c224dd72426c2f1fcd4.png\",\"/upload/fe1c24d06fb56bd4257850ddc6524676.png\",\"/upload/86ff4de7c0262c2f4072e9e8f2ff9888.png\",\"/upload/fc4a448a19877cb39c8908af54a4afca.png\"]', '1989-09-21 17:00:00', '2020-10-06 05:12:36'),
(24, 'Мужской', 'Василевский', 'Максим', 'Дмитриевич', 'Серебряный', 'Необходимо обеспечить безопасность и удобство вводимых данных пользователем ', '[\"усидчивость\"]', '/upload/bc338e77c254ad8c83f0800df1aec360.jpeg', '[\"/upload/e10ccdf6feb59a7079e346a4bb1bd2a3.png\",\"/upload/7e7d9796fe2702eac5fdc857f90353b3.png\",\"/upload/ddeb12bcd47f492031c863f057e38adf.png\",\"/upload/70f4a61b53805bd24119b72c97331db5.png\",\"/upload/1b95cd251c3c21bd261ce1eba472e7e8.png\"]', '1988-05-19 17:00:00', '2020-10-06 05:15:05');


ALTER TABLE `axi_questionnaires`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `axi_questionnaires`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
