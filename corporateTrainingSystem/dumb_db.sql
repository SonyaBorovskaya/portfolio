-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 10 2023 г., 19:27
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `curser`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `answer` varchar(255) NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `score`) VALUES
(185, 66, '4', 0),
(186, 66, '3-5', 5),
(187, 66, 'до 4', 0),
(188, 67, '70', 0),
(189, 67, '120', 0),
(190, 67, '60', 5),
(191, 67, '100', 0),
(192, 68, 'Это система размещения контекстной рекламы на сайтах и в мобильных приложениях. ', 5),
(193, 68, 'Набор надежных, разнообразных по тематике интернет-сайтов, страницы которых Яндекс. Директ и Яндекс. ', 0),
(194, 69, 'Способ показа рекламы, действующий по принципу оплаты за 1000 показов', 0),
(195, 69, 'Способ показа рекламы, с помощью которой можно повторно обратиться к пользователю', 5),
(196, 70, 'Для автоматического составления объявлений на основе ключевых слов', 0),
(197, 70, 'Для подбора вариантов ключевых слов, а также для оценки их эффективности', 5),
(198, 71, '1 реквизита-признака', 0),
(199, 71, ' 2 графических элементов;', 0),
(200, 71, '5 реквизита-основания; ', 0),
(201, 71, ' 6 одного реквизита-основания и относящихся к нему реквизитов-признаков', 5),
(202, 72, 'Реквизит-основание определяет качественную сторону предмета или процесса ', 0),
(203, 72, 'Реквизит-основание определяет количественную сторону предмета или процесса', 5),
(204, 72, ' Реквизит-основание определяет временную характеристику предмета или процесса', 0),
(205, 72, 'Реквизит-основание определяет связь между процессами', 0),
(206, 73, '1 для идентификации структурных подразделений, генерирующих управленческие документы', 0),
(207, 73, '2 стремлением к правильной формализации расчетов и выполнения логических операций', 5),
(208, 73, ' 3 необходимостью защиты информации', 0),
(209, 74, 'Реквизит-признак определяет качественную сторону предмета или процесса', 5),
(210, 74, ' Реквизит-признак определяет количественную сторону предмета или процесса ', 0),
(211, 74, ' Реквизит-признак определяет временную характеристику предмета или процесса', 0),
(212, 75, 'Клиенты, свой продукт, конкуренты.', 0),
(213, 75, 'Сегментация рынка, SWOT-анализ, ABC анализ.', 5),
(214, 75, 'Цены на нефть, политическая ситуация, сезонность', 0),
(215, 76, 'Продажа', 0),
(216, 76, 'Создание благоприятного впечатления о себе и своей компании.', 0),
(217, 76, 'Достижение договоренности о дальнейшем взаимодействии.', 5),
(218, 77, 'Это удобно, так как можно наглядно показать все в картинках и цифрах.', 0),
(219, 77, 'Так надежнее, клиент сам сможет во всем разобраться и не риска что-либо забыть.', 0),
(220, 77, ' Реклама - двигатель торговли. Их нужно оставить после встречи у клиента как напоминание.', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `author_name`) VALUES
(1, 'Васильева Дарья Дмитриевна'),
(2, 'Воронков Максим Игоревич'),
(3, 'Соколова Елизавета Алексеевна'),
(4, 'Демин Даниил Петрович');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Маркетинг'),
(2, 'Экономика\r\n'),
(3, 'Реклама\r\n'),
(4, 'Производственные бизнес-процессы\r\n'),
(5, 'Работа с персоналом\r\n'),
(6, 'Новости ООО \"МоноПлюс\"');

-- --------------------------------------------------------

--
-- Структура таблицы `competency`
--

DROP TABLE IF EXISTS `competency`;
CREATE TABLE IF NOT EXISTS `competency` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `competency`
--

INSERT INTO `competency` (`id`, `name`, `description`) VALUES
(1, 'Знание техник продаж', 'Знание последовательности шагов, с помощью которых можно сделать потенциальных покупателей реальными, подведя их к заключению сделки. '),
(2, 'Безовые навыки работы с CRM-системой', 'Знания и умение работать с современными технологиями B2B, B2C бизнеса'),
(3, 'Построение долгосрочных отношений с клиентами', 'Построение долгосрочных отношений с клиентами'),
(8, 'работа с офисным ПО', 'MS Office'),
(10, 'Формирование отчетов', 'MS Report Builder'),
(11, 'Управление ресурсами проекта', 'Обеспечение доступности необходимых ресурсов');

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_course` int NOT NULL,
  `id_comp` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_course` (`id_course`),
  KEY `id_comp` (`id_comp`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`id`, `id_course`, `id_comp`) VALUES
(1, 1, 1),
(4, 2, 3),
(11, 4, 11),
(12, 5, 1),
(13, 6, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `img` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `img`) VALUES
(1, 'Введение в статистику', 'Цель курса - предоставить полноценный комплекс знаний по статистике, необходимых для успешного применения мощного инструмента статистического анализа.', 'img/1.png'),
(2, 'Управление информационными ресурсами', 'Руководитель информационного ресурса – востребованная современная профессия. Опытные специалисты, умеющие управлять информационными ресурсами (новостные сайты, интернет-магазины, страницы компаний и госучреждений и т.д.), ценятся на рынке труда и мог', 'img/2.png'),
(3, 'Введение в контекстную рекламу', 'Контекстная реклама - один из самых эффективных инструментов современного интернет-маркетинга. Однако, как и любой высоко эффективный метод, контекстная реклама имеет множество профессиональных хитростей, знать которые необходимо, чтобы не «слить» бю', 'img/1.png'),
(4, 'Сторителлинг для бизнеса', 'На этом курсе вы узнаете, как убеждать, учить, вдохновлять, мотивировать с помощью историй. Курс полезен не только специалистам пишущих профессий (копирайтерам, таргетологам, SMM-менеджерам), но и руководителям, HR-специалистам.', 'img/3.png'),
(5, 'Управление продажами. ', 'На занятиях курса Вы познакомитесь с современными технологиями управления продажами. Вы получите навыки разработки и внедрения стратегии продаж, построения эффективных систем продаж и мотивации сотрудников. Вы научитесь ориентироваться в современных ', 'img/4.png'),
(6, 'Продуктовый маркетинг', 'Продуктовый маркетинг – это маркетинг XXI века. Его используют акулы мирового рынка, региональные компании и даже бизнесмены-одиночки. Он представляет собой комплекс мероприятий по омниканальному маркетингу, что предполагает представление продукта им', 'img/6.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `course_status`
--

DROP TABLE IF EXISTS `course_status`;
CREATE TABLE IF NOT EXISTS `course_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `course_status`
--

INSERT INTO `course_status` (`id`, `name`) VALUES
(1, 'активный'),
(2, 'заблокирован'),
(3, 'отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `course_theme`
--

DROP TABLE IF EXISTS `course_theme`;
CREATE TABLE IF NOT EXISTS `course_theme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_course` int NOT NULL,
  `id_theme` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_theme` (`id_theme`),
  KEY `id_course` (`id_course`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `course_theme`
--

INSERT INTO `course_theme` (`id`, `id_course`, `id_theme`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `grade`
--

INSERT INTO `grade` (`id`, `name`) VALUES
(1, 'Тестирование успешно пройдено!'),
(2, 'Тестирование пройдено удовлетворительно'),
(3, 'Тестирование не пройдено');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_area`
--

DROP TABLE IF EXISTS `personal_area`;
CREATE TABLE IF NOT EXISTS `personal_area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_staff` int NOT NULL,
  `id_course` int NOT NULL,
  `cope` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personal_area_fk0` (`id_staff`),
  KEY `personal_area_fk1` (`id_course`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `personal_area`
--

INSERT INTO `personal_area` (`id`, `id_staff`, `id_course`, `cope`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 2, 1, 0),
(4, 2, 2, 0),
(5, 3, 1, 0),
(6, 3, 2, 0),
(7, 4, 2, 0),
(8, 4, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'Менеджер по персоналу'),
(2, 'Менеджер по рекламе'),
(3, 'Инженер по организации труда'),
(4, 'Специалист по кадрам'),
(5, 'Экономист по сбыту'),
(6, 'Экономист по планированию'),
(7, 'Менеджер по закупкам'),
(8, 'Менеджер по маркетингу'),
(9, 'Системный администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_course` int NOT NULL,
  `question` varchar(250) DEFAULT NULL,
  `correct` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_fk0` (`id_course`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `id_course`, `question`, `correct`) VALUES
(1, 1, 'Метод шифрования RSA является ли симмитричным', 'нет'),
(2, 1, 'Сколько комбинаций у 8-битного ключа', '256'),
(3, 1, 'Что такое Принцип Керкгоффса', 'при оценке надёжности шифрования предполагаем, что противник знает об используемой системе шифрования всё, кроме применяемых ключей'),
(4, 2, 'Что такое массив', 'структура данных, хранящая набор значений, идентифицируемых по индексу'),
(5, 2, 'Что такое бинарное дерево', 'иерархическая структура данных, в которой каждый узел имеет не более двух потомков'),
(6, 2, 'Что такое алгоритм Хаффмана', 'жадный алгоритм оптимального префиксного кодирования алфавита с минимальной избыточностью'),
(7, 3, 'Что такое СУБД', 'Система управления базами данных'),
(8, 3, 'Что такое SQL', 'язык структурированных запросов'),
(9, 3, 'Что такое первичный ключ', 'это комбинация полей, которые однозначно определяют строку');

-- --------------------------------------------------------

--
-- Структура таблицы `questionss`
--

DROP TABLE IF EXISTS `questionss`;
CREATE TABLE IF NOT EXISTS `questionss` (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `question` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `questionss`
--

INSERT INTO `questionss` (`id`, `test_id`, `question`) VALUES
(66, 46, 'Сколько рекламных объявлений показывается в спецразмещении?'),
(67, 46, 'Какое максимальное число символов в заголовке объявления Google AdWords?'),
(68, 46, 'Что такое Рекламная Сеть Яндекса?'),
(69, 46, 'Что такое ремаркетинг и ретаргетинг?'),
(70, 46, 'Для чего нужен инструмент \"Планировщик ключевых слов\" в Google ADWARDS?'),
(71, 47, 'Экономический показатель состоит из:'),
(72, 47, 'Укажите правильную характеристику реквизита-основания экономического показателя'),
(73, 47, 'Чем продиктована необходимость выделения из управленческих документов экономических показателей в процессе постановки за'),
(74, 47, ' Укажите правильную характеристику реквизита-признака экономического показателя '),
(75, 48, 'Что наиболее важно менеджеру по продажам при анализе ситуации на рынке?'),
(76, 48, '  Какова может быть цель первого телефонного контакта с потенциальным клиентом:'),
(77, 48, 'Для чего нужны менеджеру по продажам демонстрационные материалы в процессе общения с клиентом?');

-- --------------------------------------------------------

--
-- Структура таблицы `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `score_min` int NOT NULL,
  `score_max` int NOT NULL,
  `result` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `result` (`result`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `results`
--

INSERT INTO `results` (`id`, `test_id`, `score_min`, `score_max`, `result`) VALUES
(41, 46, 20, 40, 1),
(42, 46, 10, 15, 2),
(43, 46, 0, 5, 3),
(44, 47, 0, 10, 3),
(45, 47, 10, 20, 2),
(46, 47, 20, 60, 1),
(47, 48, 0, 5, 3),
(48, 48, 5, 10, 2),
(49, 48, 10, 15, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `singles`
--

DROP TABLE IF EXISTS `singles`;
CREATE TABLE IF NOT EXISTS `singles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` datetime NOT NULL,
  `views` int NOT NULL,
  `category_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `singles`
--

INSERT INTO `singles` (`id`, `title`, `text`, `img`, `date`, `views`, `category_id`, `staff_id`) VALUES
(1, 'Что такое точки контакта с клиентом и как их улучшить?\r\n', 'Точки контакта - это ситуации, в которых клиент взаимодействует с бизнесом, продуктом, брендом или сервисом.\r\nЭто может быть пост в социальных сетях, сообщение в Директ, лендинг, реклама, отзыв на сайте и т. д…\r\nТочки контакта влияют на восприятие клиентом компании и могут мотивировать к покупке или заказу.\r\nПопулярные точки контакта:\r\n• Фасад здания и офис\r\n• Сайт и социальные сети\r\n• Логотип и фирменный стиль\r\n• Визитка и другая печатная продукция\r\n• Реклама (наружная, печатная, баннерная, контекстная и т. д.)\r\n• Коммерческое предложение и презентация\r\n• Общение по телефону, мессенджерам и т. п.\r\n• Персонал (продавцы, консультанты, менеджеры и т. д.)\r\n• Отзывы клиентов\r\n• Бизнес-процессы (заказ, оплата, доставка, гарантия и т. д.)\r\n', 'img/1.jpg', '2022-05-13 20:56:42', 22, 1, 1),
(2, 'Работа в команде: как выстроить эффективные коммуникации', 'Чем выше вы поднимаетесь по карьерной лестнице, тем сложнее проекты, в которых вы участвуете, и тем сложнее выстраивать рабочие коммуникации. На этом курсе вы узнаете, как привести команду к достижению общей цели через коммуникацию.', 'img/3.png', '2022-04-14 13:37:28', 6, 5, 2),
(3, 'Особенности промышленного маркетинга', 'На промышленном рынке действуют организации и предприятия,\r\nпродающие и приобретающие товары и услуги для осуществления своей\r\nпроизводственной деятельности, продукция которых затем реализуется\r\nдругим организациям и предприятиям (“BtоB”). Конечный покупатель на\r\nпромышленном рынке не действует.\r\nГлавная особенность промышленного маркетинга товаров производственного назначения связана с тем, что он определяется потребностями\r\nпроизводственного назначения, и в первую очередь потребностью самой\r\nтехнологии производства, повышения эффективности производственного\r\nпроцесса, экономии денежных средств и времени.\r\nОсобенностью спроса на товары производственного назначения\r\nявляется то, что он носит вторичный, промежуточный характер, поскольку\r\nв значительной мере связан и, по существу, обеспечивает спрос, предъявляемый конечным потребителем.\r\nСпрос на товары промышленного назначения является слабо эластичным. Так, если повышаются цены на строительные материалы, то это, как\r\nправило, не приведет к снижению спроса на них со стороны компании-\r\nпокупателя, а лишь увеличивает общую стоимость работ строительных\r\nкомпаний.\r\nПокупателем на промышленном рынке выступает не частное лицо, а\r\nгруппа специалистов, представляющая интересы производственной компании. Поэтому в данном случае покупательские мотивы и выгоды более\r\nрациональны и оптимальны, чем эмоциональны. В этом состоит одна из\r\nсложностей промышленного маркетинга.\r\nЗначительную роль на промышленном рынке играют партнерские\r\nотношения. Взаимоотношения здесь носят непосредственный характер,\r\nчисло участников ограничено, взаимопроникновение в потребности партнеров очень высокое, особенно развиты личные контакты. Это дает определенные преимущества. Для компании-покупателя в течение длительного\r\nвремени обеспечиваются гарантированное качество и цена. Для компании-\r\n36\r\nпроизводителя гарантируется долговременная загрузка производственных\r\nмощностей. Осуществляется принцип взаимовыгоды.\r\nНа промышленном рынке действуют компании и организации,\r\nприобретающие продукцию для своей производственной коммерческой и\r\nнекоммерческой деятельности. Принято различать следующие группы\r\nпокупателей [64, с.46]:\r\n промышленные компании, приобретающие сырьё и материалы\r\nнепосредственно для производства материальных благ (производственные\r\nпредприятия);\r\n посреднические компании, приобретающие готовую продукцию\r\nдля последующей перепродажи (предприятия оптовой и розничной\r\nторговли);\r\n государственные и частные управленческие организации, при-\r\nобретающие товары и услуги для обеспечения своей деятельности (учреждения, офисы и др.);\r\n неприбыльные организации, приобретающие товары и услуги в\r\nбольших объёмах для выполнения своих миссий и обеспечения людей,\r\nпринятых на их попечение (армия, тюрьмы, больницы и др.).', 'img/2.png', '2023-05-14 18:34:59', 4, 1, 17),
(12, 'Что такое юнит-экономика и зачем ее считать', 'Юнит-экономика позволяет посчитать, сколько бизнес зарабатывает или теряет на одном юните. В зависимости от специфики бизнеса юнитом может быть единичный товар, услуга, сделка, клиент — все, что компания продает или что может принести ей прибыль либо убытки. От того, каких юнитов больше — прибыльных или убыточных, — во многом зависит успешность компании.\r\n\r\nСчитать юнит-экономику можно:\r\n\r\n    для оценки рентабельности текущих проектов;\r\n\r\n    для оценки инвестиционной привлекательности проектов, которые находятся в разработке;\r\n\r\n    перед запуском маркетинговой кампании;\r\n\r\n    перед масштабированием бизнеса.\r\n\r\nЧтобы понять, может ли компания заработать на конкретном юните, нужно выяснить, сколько примерно придется в него вложить и какую отдачу это принесет. Иными словами, нужно посчитать:\r\n\r\n    Customer Acquisition Cost (CAC) — стоимость привлечения клиента.\r\n\r\n    Lifetime Value (LTV) — прибыль, полученную от клиента за все время взаимодействия с ним;\r\n\r\n    объем рынка — сколько таких клиентов вы сможете найти.\r\n\r\nТакие подсчеты можно проводить с любыми проектами, даже если вам кажется, что на привлечение клиентов ничего не тратится. Скорее всего, в этом случае вы упускаете какие-то расходы.', 'img/unit.jpg', '2022-01-20 14:51:14', 30, 2, 17),
(13, 'Инструмент для достижения целей: что такое OKR и как его внедрять', 'OKR — универсальный инструмент для компаний, которые хотят добиваться качественных целей и делать так, чтобы каждая команда видела результаты своих усилий. Он обеспечивает гибкость в бизнес-среде, позволяет раскрывать потенциал сотрудников и поднимать командный дух. Пол Нивен и Бен Ламорт обстоятельно рассказывают, что такое OKR и как его внедрять. Т&Р публикуют отрывок из книги «Цели и ключевые результаты. Полное руководство по внедрению OKR», в котором авторы рассказывают о сути OKR и развеивают мифы о его реализации.\r\nСогласитесь, для надписи на футболке это не годится. Однако важно дать четкое определение этой модели: когда вы начнете внедрять ее и делиться ею со своими командами, под термином OKR вы должны понимать одно и то же. Терминология, а точнее, отсутствие конкретики — одна из важнейших проблем, с которой мы сталкиваемся при реализации программ изменений.\r\n\r\nПутаница в словах дезориентирует сотрудников и снижает прогнозируемость результатов в рамках организации. Вот почему так важно использовать согласованные определения терминов и понятий OKR. Мы рекомендуем использовать понятия, описанные в этой книге. Хотя это не принципиально — вспомните слова Шекспира: «Что значит имя? Роза пахнет розой, хоть розой назови ее, хоть нет».', 'img/okr.jpg', '2023-02-01 14:53:41', 2, 5, 17),
(14, 'Какие мягкие навыки стоит развивать сотрудникам', 'В кризис многие компании сокращают затраты на обучение сотрудников. Однако такая экономия работает только в краткосрочном периоде. Во времена турбулентности мягкие навыки выходят на первый план. Именно они позволяют сотрудникам быстро обучаться новому и адаптироваться к стремительно меняющимся условиям. В такие времена особенно важно учиться управлять стрессом, лидировать проекты, эмпатично относиться к окружающим и оказывать поддержку.\r\nРезультаты исследования указывают на растущую значимость социальных навыков. Компьютеризация приводит к тому, что квалифицированные рабочие оказываются в гибких командных условиях, которые требуют навыков адаптивности и группового решения проблем. В разных отраслях и профессиях структура должностей сместилась от жесткой категоризации к большей ротации должностей и многозадачности работников. Наиболее важные для развития навыки носят социальный и эмоциональный характер. Это, например, эмпатия, лидерство и адаптивность.', 'img/soft.jpg', '2022-11-16 14:54:41', 0, 5, 16),
(19, 'XSS-атака', '&lt;html&gt;rn&lt;body&gt;rn&lt;div style=&quot;width:100%; height:100% ;color:black;background-color: red;&quot;&gt;rnАТАКАrn&lt;/div&gt;rn&lt;/body&gt;rn&lt;/html&gt;', '&lt;style&gt;* transform: rota', '2023-06-01 11:50:32', 1, 6, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(50) DEFAULT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `t_name` varchar(50) DEFAULT NULL,
  `id_position` int NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `userPhone` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `pwdUsers` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_position` (`id_position`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id`, `s_name`, `f_name`, `t_name`, `id_position`, `email`, `userPhone`, `uidUsers`, `pwdUsers`) VALUES
(1, 'Лукин', 'Савелий', 'Андреевич', 4, 'savva@mail.ru', '+7 (432) 63-53-642', 'LukinSA', ''),
(2, 'Бессонова', 'Варвара', 'Ильинична', 1, 'varvara1992@yandex.ru', '+7 (931) 33-15-517', 'BesonovaVI', ''),
(16, 'admin', 'admin', 'admin', 9, 'admin@mail.ru', '+7 (111) 11-11-560', 'admin', '$2y$10$CfV0lHRcGhR3Xj0V078FZenlQ9Ft9fzJlrSPjSdzRqKyGgZ0EgFf6'),
(17, 'Иван', 'Дорохедов', 'Васильевич', 7, 'doroh@mail.ru', '+7 (915) 63-78-678', 'DorohedovIV', '$2y$10$yuVUYfnVJ/r1bjC.mrSLaehn6aX8O8hDvZ7uBMzZDI64ze2URFUBS'),
(18, 'Плетенева', 'Анастасия', 'Михайловна', 4, 'plt@mail.ru', '+7 (432) 42-34-234', 'PletenevaMN', '$2y$10$KdqGf5pIiB/rleRjYPw6SeFPIo169POZu8TeqSWSPb6gxQtNmjv66'),
(19, 'Королев', 'Михаил', 'Николаевич', 5, 'korolev@mail.ru', '+7 (565) 45-35-454', 'KorolevMN', '$2y$10$ERY3M7krpUzmWrtYfY/f3e/X3sssNmzhLvNOOLBh0/MGzCo1/9G8i'),
(21, 'Фадеев', 'Глеб', 'Артемович', 8, 'fadeev@mail.ru', '+7 (333) 33-33-333', 'FadeevGA', '$2y$10$MmORA2eW6BAoaqZk.2uo1eDC4UaeCMnUm23BztRUOA0/kenN2squi');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `testing`
--

DROP TABLE IF EXISTS `testing`;
CREATE TABLE IF NOT EXISTS `testing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_question` int NOT NULL,
  `id_staff` int NOT NULL,
  `id_grade` int NOT NULL,
  `date_akt` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testing_fk0` (`id_question`),
  KEY `testing_fk1` (`id_staff`),
  KEY `testing_fk2` (`id_grade`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `testing`
--

INSERT INTO `testing` (`id`, `id_question`, `id_staff`, `id_grade`, `date_akt`) VALUES
(1, 1, 1, 4, '2022-12-24'),
(2, 1, 2, 3, '2022-12-24'),
(3, 1, 3, 2, '2022-12-24'),
(4, 2, 3, 5, '2022-12-22'),
(5, 2, 4, 2, '2022-12-22'),
(6, 2, 2, 3, '2022-12-21'),
(7, 3, 1, 1, '2022-12-21'),
(8, 3, 5, 2, '2022-12-21'),
(9, 3, 2, 3, '2022-12-14'),
(10, 4, 4, 5, '2022-12-14');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `curse_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curse_id` (`curse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `title`, `curse_id`) VALUES
(46, 'Контекстная реклама ', 3),
(47, 'Информационные технологии в управлении', 2),
(48, 'Управление продажами', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `test_staff`
--

DROP TABLE IF EXISTS `test_staff`;
CREATE TABLE IF NOT EXISTS `test_staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `result_id` int NOT NULL,
  `date_test` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`),
  KEY `test_id` (`test_id`),
  KEY `result_id` (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `test_staff`
--

INSERT INTO `test_staff` (`id`, `test_id`, `staff_id`, `result_id`, `date_test`) VALUES
(18, 46, 17, 2, '2022-05-27'),
(19, 47, 16, 3, '2023-05-31'),
(20, 48, 17, 1, '2022-05-31'),
(21, 46, 17, 1, '2023-05-31'),
(22, 46, 21, 2, '2023-06-15');

-- --------------------------------------------------------

--
-- Структура таблицы `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `theme`
--

INSERT INTO `theme` (`id`, `name`, `text`) VALUES
(1, 'Введение в статистику: предмет и метод статистики', 'В настоящее время данный термин употребляется в 4 значениях:\r\n\r\n    Наука, изучающая количественную и качественную сторону массовых общественных явлений и процессов, исследует количественное выражение закономерностей их развития в конкретных условиях места и времени, учебный предмет в ВУЗах;\r\n    Цифры, характеризующие массовые общественные явления и процессы;\r\n    Деятельность по сбору, обработке, анализу и публикации цифровых данных о самых различных явлениях и процессах общественной жизни;\r\n    Параметры рядов случайных величин, рассчитываемые по результатам наблюдений и применяющиеся для проверки различных гипотез преимущественно в математической статистике (например, F-статистика).\r\nСовокупность приемов, пользуясь которыми статистика исследует свой предмет, составляет метод статистики. Можно выделить 3 группы статистических методов (этапов статистического исследования):\r\n    Статистическое наблюдение — это сбор всех существенных фактов об изучаемом явлении и научно организованная их регистрация;\r\n    Сводка и группировка — это систематизация и классификация собранных статистических данных;\r\n    Статистический анализ — это расчет статистических показателей, позволяющий описать изучаемое явление, выявить его динамику, структуру, взаимосвязь с другими явлениями, закономерности, сделать прогнозы на будущее.\r\n\r\nКроме методов статистика использует 5 категорий (ключевых понятий):\r\n\r\n    Статистическая совокупность — это массовое общественное явление, которое необходимо исследовать;\r\n    Единица статистической совокупности — это составной элемент статистической совокупности, являющийся носителем изучаемых признаков;\r\n    Признак единицы статистической совокупности — свойства единицы совокупности, которые различаются способами их измерения и другими особенностями;\r\n    Статистический показатель – рассчитываемое статистикой значение, характеризующее количественные характеристики изучаемого явления;\r\n    Система статистических показателей – набор статистических показателей, отражающий взаимосвязи, существующие между явлениями.\r\n'),
(2, 'Абсолютные и относительные статистические величины', 'Абсолютные величины — это результаты статистических наблюдений. В статистике в отличие от математики все абсолютные величины имеют размерность (единицу измерения), а также могут быть положительными и отрицательными.\r\n\r\nЕдиницы измерения абсолютных величин отражают свойства единиц статистической совокупности и могут быть простыми, отражая 1 свойство (например, масса груза измеряется в тоннах) или сложными, отражая несколько взаимосвязанных свойств (например, тонно-километр или киловатт-час).\r\n\r\nЕдиницы измерения абсолютных величин могут быть 3 видов:\r\n\r\n    Натуральные — применяются для исчисления величин с однородными свойствами (например, штуки, тонны, метры и т.д.). Их недостаток состоит в том, что они не позволяют суммировать разнородные величины.\r\n    Условно-натуральные — применяются к абсолютным величинам с однородными свойствами, но проявляющим их по-разному. Например, общая масса энергоносителей (дрова, торф, каменный уголь, нефтепродукты, природный газ) измеряется в т.у.т. — тонны условного топлива, поскольку каждый его вид имеет разную теплотворную способность, а за стандарт принято 29,3 мДж/кг. Аналогично общее количество школьных тетрадей измеряется в у.ш.т. — условные школьные тетради размером 12 листов. Аналогично продукция консервного производства измеряется в у.к.б. — условные консервные банки емкостью 1/3 литра. Аналогично продукция моющих средств приводится к условной жирности 40%.\r\n    Стоимостные единицы измерения выражаются в рублях или в иной валюте, представляя собой меру стоимости абсолютной величины. Они позволяют суммировать даже разнородные величины, но их недостаток состоит в том, что при этом необходимо учитывать фактор инфляции, поэтому статистика стоимостные величины всегда пересчитывает в сопоставимых ценах.\r\n\r\nАбсолютные величины могут быть моментными или интервальными. Моментные абсолютные величины показывают уровень изучаемого явления или процесса на определенный момент времени или дату (например, количество денег в кармане или стоимость основных фондов на первое число месяца). Интервальные абсолютные величины — это итоговый накопленный результат за определенный период (интервал) времени (например, зарплата за месяц, квартал или год). Интервальные абсолютные величины, в отличие от моментных, допускают последующее суммирование.\r\n\r\nАбсолютная статистическая величина обозначается X, а их общее число в статистической совокупности — N.\r\n\r\nКоличество величин с одинаковым значением признака обозначается f и называется частота (повторяемость, встречаемость).\r\n\r\nCами по себе абсолютные статистические величины не дают полного представления об изучаемом явлении, так как не показывают его динамику, структуру, соотношение между частями. Для этих целей служат относительные статистические величины.'),
(3, 'Средние величины и показатели вариации', 'Средняя величина - это обобщающий показатель статистической совокупности, который погашает индивидуальные различия значений статистических величин, позволяя сравнивать разные совокупности между собой.\r\n\r\nСуществует 2 класса средних величин: степенные и структурные.\r\n\r\nК структурным средним относятся мода и медиана, но наиболее часто применяются степенные средние различных видов.\r\nСтепенные средние могут быть простыми и взвешенными.\r\n\r\nПростая средняя величина рассчитывается при наличии двух и более несгруппированных статистических величин, расположенных в произвольном порядке по следующей общей формуле:');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int NOT NULL AUTO_INCREMENT,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'admin', 'admin@mail.ru', '$2y$10$vLsgJuxfNJq/jKm2fG1Fmult/d/vsgmT2PF6toX5zy9329SN2Eix6'),
(2, 'bfbb', 'mail@mail.ru', '$2y$10$oAFYYh58WXPizv.QvnQsOOgODdAk5M8Q/5eQyz5kZylt54D3ruPba');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questionss` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`id_comp`) REFERENCES `competency` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `course_theme`
--
ALTER TABLE `course_theme`
  ADD CONSTRAINT `course_theme_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `course_theme_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `questionss`
--
ALTER TABLE `questionss`
  ADD CONSTRAINT `questionss_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`result`) REFERENCES `grade` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `singles`
--
ALTER TABLE `singles`
  ADD CONSTRAINT `singles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `singles_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`);

--
-- Ограничения внешнего ключа таблицы `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`curse_id`) REFERENCES `courses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `test_staff`
--
ALTER TABLE `test_staff`
  ADD CONSTRAINT `test_staff_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `test_staff_ibfk_2` FOREIGN KEY (`result_id`) REFERENCES `results` (`result`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
