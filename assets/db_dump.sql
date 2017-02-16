-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 192.168.0.56:3306
-- Время создания: Фев 17 2017 г., 01:15
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `fresh-news.com`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id_c` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id_c`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_c`, `name`) VALUES
(6, 'Авто'),
(9, 'За границей'),
(8, 'Здоровье'),
(5, 'Наука'),
(3, 'Общество'),
(1, 'Политика'),
(11, 'События'),
(7, 'Спорт'),
(4, 'Технологии'),
(10, 'Шоу-бизнес'),
(2, 'Экономика');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_n` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_c` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  PRIMARY KEY (`id_n`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_n`, `title`, `content`, `id_u`, `id_c`, `datetime`) VALUES
(1, 'В НАПК должны прийти профессионалы, чтобы агентство действительно заработало – Чумак', 'В Национальном агентстве по вопросам предотвращения коррупции (НАПК) не хватает профессионалов. Об этом заявил председатель комитета Верховной Рады по вопросам борьбы с организованной преступностью и коррупцией, внефракционный народный депутат Виктор Чумак в эфире телеканала "112 Украина".\r\n"НАПК – это наиболее сильный антикоррупционный инструмент, который был создан за последние годы в Украине", – отметил он.\r\nПо его словам, чтобы агентство действительно заработало, туда должны прийти люди, которые "смогут его запустить".\r\n"На сегодняшний день из тех четырех членов есть полтора человека, которые профессионально подготовлены", – добавил нардеп.\r\nКабинет Министров создал Национальное агентство по предотвращению коррупции в марте 2015 года. В декабре того же года правительство утвердило трех из пяти членов агентства – Наталию Корчак, Александра Скопича и Виктора Чумака, но позже Чумак отказался от должности. 16 марта 2016 года Кабмин утвердил еще двух избранных членов НАПК – Руслана Рябошапку и Руслана Радецкого. После этого в агентстве сформировался кворум, и оно приступило к работе. Главой Нацагентства была избрана Наталия Корчак.\r\nЗапуск НАПК являлся одним из условий получения Украиной безвизового режима с ЕС. Агентство, среди прочего, должно заниматься сбором анализом электронных деклараций о доходах государственных служащих.', 1, 1, 1486934209),
(2, 'Кличко запевнив, що Київ не повторить помилки Львова', 'Місто проводить переговори з інвесторами щодо будівництва сучасних заводів із сортування та переробки сміття, щоб вже за 2 роки такі заводи почали працювати у столиці. Про це Київський міський голова Віталій Кличко заявив в інтерв’ю «Радіо Свобода».\r\nВіталій Кличко наголосив, що місто проводить переговори з інвесторами щодо будівництва заводів із сортування та переробки сміття.\r\n- Ми зараз ведемо переговори про те, щоб збудувати два таких комбінати. Один – ближче до Києва, а інший – на полігоні, на який вивозиться сміття, де ситуація також дуже критична. Ні в якому разі ми не хочемо потрапити в таку ж складну ситуацію, в яку потрапив Львів, – зазначив мер Києва.\r\nМіський голова підкреслив, що переговори з інвесторами мають завершитися до кінця поточного року.\r\n- Після цього нам потрібно буде 1,5 – 2 роки для того, щоб заводи почали працювати, – сказав Віталій Кличко.\r\nВін додав, що в планах міської влади також модернізація заводу «Енергія».\r\n- Ми ведемо переговори з інвесторами щодо модернізації заводу «Енергія», куди зможемо поставити нове, сучасне обладнання. Так сталося, що завод вже опинився в зоні проживання киян, бо поруч – Харківський масив. І на оновленому підприємстві ніяких шкідливих викидів не буде, завод не завдаватиме шкоди мешканцям цього району, – наголосив Віталій Кличко.\r\nНагадаємо, сучасний сміттєспалювальний завод може з''явитися на Троєщині.', 1, 2, 1486934408),
(3, 'У Насирова утверждают, что у скандальной взяточницы из Одессы «не было никакой взятки»', 'Начальник управления внутренней безопасности Государственной фискальной службы Юрий Шеремет заявил, что не видит правонарушений в работе заместителя руководителя Одесской таможни Ларисы Арефьевой, которую задержали на взятке в сумме $50 тыс. осенью 2015 года.\r\n\r\nОб этом говорится в сюжете программы «Наші гроші» проекта «Bihus info».\r\n\r\nПо словам начальника управления внутренней безопасности ГФС, история с задержанием на взятке «не имеет подтверждений».\r\n\r\n«Когда мы начали разбираться, то ни подозрений, ни денег никаких, ни меченых, насколько мне известно никто не изымал, сколько я пытался получить информацию — мне не предоставляли», — заявил Шеремет.\r\n\r\nТакже он заявил, что дело со взяткой Арефьевой не имело продолжения, поскольку прокуратура не начала производство и Арефьева не находилась в розыске. При этом Шеремет отметил, что внутренняя безопасность ГФС не стала подробно разбираться в ситуации, потому что производство было не у данного управления, а у СБУ.\r\n\r\n«Это не наше производство было, а производство СБУ … Мы разбирались, подозрения ей никакой никто не предъявлял», — отметил Шеремет.\r\n\r\nРанее в комментарии Слідство.інфо в октябре 2015 глава ГФС Роман Насиров также отрицал информацию о взятке Арефьевой. На официальный запрос относительно комментария Арефьевой в ГФС посоветовали обращаться непосредственно к ней, но Арефьева не изъявила желания общаться с журналистами.\r\n\r\nНапомним, недавно сообщалось, что взяточница из одесской таможни, сбежавшая от правоохранителей, получила руководящую должность в Киеве.', 1, 11, 1486934458),
(4, 'Разработана гибкая солнечная батарея толщиной с лист бумаги', 'На днях стало известно, что компания mPower Technology смогла создать уникальную солнечную батарею, которая предлагает высокую гибкость, является очень тонкой и легкой.\r\nИз-за того, что материал очень напоминает чешую, он получил название Dragon SCALE. По задумке разработчиков, настолько гибкой солнечной батареей можно с легкостью покрыть корпус дрона или других гаджетов. Ею даже можно обернуть обычные трубы или столбы деревьев, а также прилепить на крышу здания или автомобиля.\r\nDragon SCALE имеет толщину, как у обычной бумаги, а стоимость ее производства существенно ниже обычных солнечных батарей. Элементы, разработанные по этой технологии, являются более надёжными и эффективными.', 1, 4, 1486934668),
(5, 'Сергій Кандауров: "Не варто перетворювати футбол на хокей!"', 'Генеральний директор ФІФА з технічного розвитку Марко Ван Бастен оприлюднив потенційні зміни правил та регламенту у футболі. Легендарний голландець озвучив ідеї, які спровокували гостру дискусію у футбольному середовищі. Зокрема, серію післяматчевих пенальті пропонують замінити на аналог хокейних буллітів - атакувальний гравець стартуватиме із відстані 25 метрів до воріт і матиме вісім секунд доля того, щоб засмутити голкіпера. Також Ван Бастен висуває ідею змінити або взагалі відмінити правило офсайду. Третя ініціатива - за фол останньої надії карати жовтою карткою або тимчасовим вилученням на п’ять чи десять хвилин. Топ-менеджер ФІФА також воліє запровадити систему підрахунку фолів і вилучати футболістів після п’ятого порушення правила. Цю норму Ван Бастен запозичує у баскетболу. А от у регбі хочуть перейняти правило спілкування з арбітрами, де лише капітан команди має право розмовляти зі суддями. Також Марко ван Бастен пропонує збільшити число замін до п’яти в одному поєдинку. На думку топ-менеджера ФІФА, кількість матчів за сезон варто скоротити до 50. Майже вся футбольна еліта, українська зокрема, нищівно розкритикувала ці наміри. "Я не підтримую жодного із семи пунктів, - сказав Плюс Спорту Сергій Кандауров, відомий в минулому футболіст, - Нам пропонують щось щипнути з інших видів спорту. Але це може призвести до негативних наслідків. Усім відомо, навіщо хочуть відмінити правило "положення поза грою" - щоб збільшити кількість забитих голів. Не варто перетворювати футбол на хокей! Сам забитий гол може втратити цінність. Вони пропонують лічити фоли і вилучати після п’ятого порушення. Ні, почнеться безлад, почнуть зупиняти час, і футбол втратить ритм. Я категорично навіть проти того, щоб переймати досвід регбі і забороняти гравцям спілкуватися з рефері. За таких обставин футбол втратить емоції. Я вважаю, що будь-які зміни - не на часі".', 1, 7, 1486969801),
(6, 'Жгучая брюнетка: Вера Брежнева изменилась до неузнаваемости', 'Веру Брежневу жестко раскритиковали за темный цвет волос, передает Хроника.инфо со ссылкой на tochka.net.\r\n\r\nВместо роскошных белокурых локонов, в которые влюблены все поклонники Веры Брежневой, певица появилась вчера, 11 февраля, со строгим каре смоляного цвета на концерте "Big Love Show" в Москве. На смену сексуальной блондинке пришла роковая брюнетка, доказывая, что Брежнева – девушка невероятно смелая и не боящаяся кардинальных перемен.\r\n\r\nФото и видео знаменитости в неожиданном образе моментально попали в Сеть и вызвали очень противоречивые мнения у поклонников певицы. Не все они оказались готовыми принимать смелые эксперименты Веры Брежневой над внешностью. \r\n\r\nК слову, многие поняли, что столь кардинального преображения певица добилась, всего лишь надев парик, под которым она спрятала свои роскошные волосы. Кроме того, часть преданных поклонников поддержала Веру Брежневу в её стремлении примерять на себя неожиданные амплуа.', 1, 10, 1486970162),
(14, 'В школе под Харьковом массовое отравление детей, питавшихся в школьной столовой', 'В Купянске Харьковской области за последние несколько дней было зарегистрировано 13 случаев отравления детей из общеобразовательной местной школы №1. Об этом сообщает "Укринформ" со ссылкой на Харьковский лабораторный центр.\r\n\r\nПредварительный диагноз - острый гастроэнтероколит средней тяжести.\r\n\r\nДевять детей госпитализированы в инфекционное отделение Купянской городской больницы, они получают соответствующее лечение. Еще четверо детей лечатся амбулаторно.\r\n\r\n"Продолжается исследование материала от больных детей и людей, которые были с ними в контакте, а также пищевых продуктов, воды, смывов с объектов внешней среды. Противоэпидемические мероприятия в школе №1 проводятся", - добавили в центре.\r\n\r\nПрокуратура уже открыла уголовное производство по факту массового отравления.\r\n\r\nУстановлено, что все дети, в возрасте от 7 до 14 лет, питались в школьной столовой.\r\n\r\nПродолжается расследование. Также проводится проверка в отношении врачей, которые не сообщили правоохранителям о факте массового отравления детей. В других школах Купянска ситуация нормальная.\r\n\r\nНапомним, что ранее в Харьковской области от отравления неизвестным веществом умерла 7-месячная малышка.\r\n\r\nРанее в Харькове семья с ребенком отравилась неизвестным газом.', 1, 6, 1487282993),
(15, 'Новую команду для подготовки «Евровидения» собрали за 72 часа', 'В Киеве собрали новую команду, которая будет заниматься подготовкой музыкального конкурса «Евровидение-2017». Об этом в четверг, 16 февраля, сообщил заместитель главы Национальной общественной телерадиокомпании Украины (НТКУ) Павел Грицак, передает РИА Новости, информирует news.eizvestia.com.\r\n\r\n«Это заняло у нас около 72 часов. Связано это с двумя причинами: значительная поддержка со стороны всех властных структур Украины и города Киева. Вторая причина — люди, которые ушли, не телевизионно-производственная команда. Покинули проект люди из ивент-команды и коммерческой части команды, кто непосредственно не влияет на телевизионное шоу и подготовку», — отметил Грицак.\r\n\r\n13 февраля команду работников НТКУ, занимавшуюся подготовкой «Евровидения» в Киеве, лишили полномочий. Двумя днями позже специализированная антикоррупционная прокуратура Украины призвала ушедших сотрудников рассказать о злоупотреблениях в ходе подготовки к проведению музыкального соревнования.\r\n\r\nПо словам участников коллектива, назначение нового руководства и связанные с ним действия заблокировали работу по подготовке конкурса на два месяца. При этом работники пытались вести переговоры с руководством НТКУ, руководством Госкомтелерадио, представителями Кабмина.\r\n\r\nЧитать полностью на http://news.eizvestia.com/news-culture/full/748-novuyu-komandu-dlya-podgotovki-evrovideniya-sobrali-za-72-chasa', 1, 3, 1487283040),
(16, 'На Титане есть признаки жизни', 'На поверхности спутника Сатурна уже найдены моря и водоемы, на дне которых могут находиться бактерии и прочие простейшие существа.\r\nАмериканские специалисты заявили, что спутник Сатурна может быть аналогом Земли в древности. На поверхности Титана есть водная оболочка и живые организмы. По словам учёных, подобных такому спутнику в Солнечной системе нет.\r\n\r\nНесмотря на это, подробности формообразования Титана специалисты смогут выяснить только к 2029 году. Тогда учёные отправят на Титан модуль TSSM, разработанный научными сотрудниками NASA и EKA.\r\n\r\nБлагодаря этому в дальнейшем можно будет узнать о существовании живых организмов на других планетах и небесных телах Солнечной системы.', 1, 5, 1487283076),
(17, 'Новый заряженный Honda Civic движется в Женеву', 'Honda сохранила технические детали концепта, показанного в Париже, и подтвердила, что Type-R останется переднеприводным спорткаром в классе, в котором все больше и больше доминируют полноприводные модели. Эту спортивную машину японцы рассчитывают продавать на американском рынка, под него она, собственно говоря, и была «заточена». Чтобы улучшить сцепление с дорогой и стабильность передвижения, новый Civic получил широкое шасси, а также новый аэродинамический пакет, в том числе два задних спойлера и передний сплиттер.', 1, 6, 1487283201),
(18, 'Названа диета, которая снижает давление', 'Многие женщины ограничивают употребление картофеля, чтобы не прибавить в весе, передает Хроника.инфо со ссылкой на Телеграф.\r\n\r\nОднако ученые опровергают стереотип о том, что картофель вредит фигуре! Две порции картофеля в день могут снизить кровяное давление, говорят ученые. Более того, это никак не отразится на вашей фигуре. Все дело в том, в каком виде его употреблять. Картофель может супер продуктом для вас, если вы будете его правильно готовить — варить в кожуре, запекать, и употреблять без масла или кетчупа.\r\n\r\nТакой вывод сделали ученые из университета в Пенсильвании. В ходе исследования 18 мужчин и женщин ели от шести до восьми небольших картофелин на обед и ужин в рамках своей обычной диеты.\r\n\r\nБольшинство добровольцев имели избыточный вес или страдали ожирением, а также принимали таблетки для снижения кровяного давления. После месяца картофельной диеты их показания артериального давления значительно снизились. Оказывается, картофель содержит химические вещества, сходные по действию с таблетками от повышенного кровяного давления. Кроме того, ни один из добровольцев не набрал вес.', 1, 8, 1487283243),
(19, 'Беременная Ирина Шейк поразила сказочным образом', 'Ирина Шейк снялась для юбилейного выпуска американского Vogue\r\n\r\nРоссийская супермодель Ирина Шейк в своем Instagram-аккаунте поделилась снимком из фотосессии, посвященной 125-летию легендарного Vogue USA. \r\n\r\nОб этом пишет Хроника.инфо со ссылкой на sunny7.\r\n\r\nВ этом году знаменитый американкий Vogue празднует свой юбилей – 125-летние с момента выпуска первого номера. В честь такой значимой даты редакторы журнала готовят что-то грандиозное. В своем Instagram модель Ирина Шейк приоткрыла завесу тайны и показала, что мы увидим на страницах нового выпуска "модной библии".\r\nНа фото, которое модель распространила в сети, она предстает в образе лесной нимфы. Она сидит за черным роялем в сказочном лесу, одетая в воздушное платье, которое немного приоткрывает вид на ее округлившийся животик. Автором фотосессии стал знаменитый дуэт фешен-фотографов Mert & Markus (Мерт Алас и Маркус Пиггот).\r\n\r\nПоклонники модели оставили множество восторженных комментариев под записью, на которые сама Ирина Шейк еще никак не ответила. Но это можно списать на занятость знаменитости: все-таки сейчас 31-летняя модель ждет первенца от актера Брэдли Купера и готовится к свадьбе.', 1, 10, 1487283281);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `reg_datetime` int(11) NOT NULL,
  PRIMARY KEY (`id_u`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_u`, `name`, `email`, `password`, `reg_datetime`) VALUES
(1, 'Роман', 'roman.dubovoy7@gmail.com', 'a17444550e2c127b02ea1c197bcffa422c21713040f53d5c2ca7925419bccf7f', 1487282719);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;