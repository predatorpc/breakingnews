--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.4

-- Started on 2018-10-01 06:16:30

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 199 (class 1259 OID 16461)
-- Name: category; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.category (
    id integer NOT NULL,
    parentid bigint,
    title text NOT NULL,
    status bigint
);


ALTER TABLE public.category OWNER TO admin;

--
-- TOC entry 198 (class 1259 OID 16459)
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public.category_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_id_seq OWNER TO admin;

--
-- TOC entry 2181 (class 0 OID 0)
-- Dependencies: 198
-- Name: category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public.category_id_seq OWNED BY public.category.id;


--
-- TOC entry 196 (class 1259 OID 16417)
-- Name: news; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public.news (
    "ID" integer NOT NULL,
    title text NOT NULL,
    anounce text,
    body text,
    catid bigint,
    status smallint,
    created_at abstime
);


ALTER TABLE public.news OWNER TO admin;

--
-- TOC entry 201 (class 1259 OID 16486)
-- Name: newsComments; Type: TABLE; Schema: public; Owner: admin
--

CREATE TABLE public."newsComments" (
    id integer NOT NULL,
    newsid bigint NOT NULL,
    comment text,
    commentator text,
    status smallint,
    created_at abstime
);


ALTER TABLE public."newsComments" OWNER TO admin;

--
-- TOC entry 200 (class 1259 OID 16484)
-- Name: newsComments_id_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public."newsComments_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."newsComments_id_seq" OWNER TO admin;

--
-- TOC entry 2182 (class 0 OID 0)
-- Dependencies: 200
-- Name: newsComments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public."newsComments_id_seq" OWNED BY public."newsComments".id;


--
-- TOC entry 197 (class 1259 OID 16420)
-- Name: news_ID_seq; Type: SEQUENCE; Schema: public; Owner: admin
--

CREATE SEQUENCE public."news_ID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."news_ID_seq" OWNER TO admin;

--
-- TOC entry 2183 (class 0 OID 0)
-- Dependencies: 197
-- Name: news_ID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public."news_ID_seq" OWNED BY public.news."ID";


--
-- TOC entry 2040 (class 2604 OID 16464)
-- Name: category id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.category ALTER COLUMN id SET DEFAULT nextval('public.category_id_seq'::regclass);


--
-- TOC entry 2039 (class 2604 OID 16422)
-- Name: news ID; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.news ALTER COLUMN "ID" SET DEFAULT nextval('public."news_ID_seq"'::regclass);


--
-- TOC entry 2041 (class 2604 OID 16489)
-- Name: newsComments id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public."newsComments" ALTER COLUMN id SET DEFAULT nextval('public."newsComments_id_seq"'::regclass);


--
-- TOC entry 2172 (class 0 OID 16461)
-- Dependencies: 199
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.category (id, parentid, title, status) FROM stdin;
3	1	Основные новости	1
6	5	Сообщения о пропаже	1
7	5	Бюро находок	1
8	5	Интересная работа	1
9	2	Добровольцы	1
11	7	Новости добра	1
12	7	Миллион алых роз	1
13	12	Парня в горы тяни - рискни	1
14	12	Ленинград - Дорожная	1
1	0	Главные новости	1
5	0	Дополнительные новости	1
15	1	Управление по управлению всеми управлениями	1
16	10	Стоматология	1
17	10	Хирургия	1
18	10	Патологоанатомия	1
19	16	Терапия	1
20	16	Протезирование	1
21	15	Доп Категория	1
22	15	Дополнительные интересы	1
10	3	Медицина	1
23	18	Мухология	1
4	5	Железная дорога	1
24	4	Проктология	1
2	1	Тестовые задания	1
25	\N	Первая настоящая категория	1
26	\N	Первая настоящая категория	1
27	1	Подподтестовые задания	1
29	27	Подтекстовые задания	1
28	1	Подтестовые задания	1
30	2	Ужасы нашего городка	1
31	27	Подподподтестовые задания	1
\.


--
-- TOC entry 2169 (class 0 OID 16417)
-- Dependencies: 196
-- Data for Name: news; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.news ("ID", title, anounce, body, catid, status, created_at) FROM stdin;
16	Корова родила жирафа и крокодила	Это полный улет	Текест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекстТекест етекст	22	1	2018-09-30 23:44:28+07
15	Доп категория	Доп категория	Доп категория	15	1	2018-09-30 23:31:21+07
9	Корова родила жирафа и крокодила 3	Корова родила жирафа и крокодила продолжение	Юные натуралисты обнаружили медведку	3	1	2018-09-28 20:30:51+07
1	Юные натуралисты обнаружили медведку	Юные натуралисты обнаружили медведку	Текст Юные натуралисты обнаружили медведку\n	2	1	2018-09-28 12:30:51+07
2	Комар стал просить о помощи	Комар стал просить о помощи	Юные натуралисты обнаружили медведку	1	1	2018-09-28 14:30:51+07
4	Камаз вьехал в море	Камаз вьехал в море	Юные натуралисты обнаружили медведку	1	1	2018-09-28 15:30:51+07
18	Доп новость	Доп новость	Доп новость	23	1	2018-10-01 02:04:41+07
8	Корова родила жирафа и крокодила 2	Корова родила жирафа и крокодила 2	Юные натуралисты обнаружили медведку	2	1	2018-09-28 14:30:51+07
7	Корова родила жирафа и крокодила 1	Корова родила жирафа и крокодила 1	Юные натуралисты обнаружили медведку	12	1	2018-09-28 11:30:51+07
10	Это стендап и хендехох	Это стендап и хендехох	Юные натуралисты обнаружили медведку	3	1	2018-09-28 12:30:51+07
17	Мрсье Женеманш Па сис жур	Мрсье Женеманш Па сис жур	Мрсье Женеманш Па сис жур	7	1	2018-10-01 01:50:35+07
11	Валера	Николай Валерьевич Бузь	Юные натуралисты обнаружили медведку	18	1	2018-09-28 14:30:51+07
3	Бэнтли сделает самый дешевый спорткар	Бэнтли сделает самый дешевый спорткар	Юные натуралисты обнаружили медведку	1	1	2018-09-28 10:30:51+07
14	Пропала муха	Пропала муха	Пропала муха	5	1	2018-09-28 16:04:11+07
19	ывапывап	пывап	ыапвыавыыва	5	1	2018-10-01 02:35:09+07
12	На проклятом месте лежала клеенка	На проклятом месте лежала клеенка	На проклятом месте лежала клеенка	18	1	2018-09-28 09:30:51+07
5	Бабушка получала пенсию после смерти	Бабушка получала пенсию после смерти	Юные натуралисты обнаружили медведку	1	1	2018-09-28 14:30:51+07
13	Поезд взлетел на гору	Поезд взлетел на гору	Поезд взлетел на гору	4	1	2018-09-28 16:01:18+07
6	Корова родила жирафа	Корова родила жирафа	Юные натуралисты обнаружили медведку	15	1	2018-09-28 14:30:51+07
20	выапывапывап	фыва	ыва	1	0	2018-10-01 02:45:58+07
21	Новая новость	Новая новость	Новая новость	14	1	2018-10-01 02:53:16+07
22	Евросоюз предостерегли от уподобления СССР	Министр иностранных дел Великобритании Джереми Хант предостерег Евросоюз (ЕС) от превращения в СССР. Об этом он заявил, выступая на съезде Консервативной партии в Бирмингеме, передает Telegraph.	По его словам, если ЕС начнет создавать препятствия для выхода членов из объединения, то желание стран его покинуть будет только расти. Он добавил, что отказ Брюсселя принять «руку дружбы, протянутую премьер-министром [Терезой Мэй]», приведет к трагическим последствиям для Европы.\r\n\r\nДва года для развода\r\nСколько времени понадобится Британии, чтобы выйти из ЕС\r\n«Что случилось с верой в европейскую мечту и ее идеалами? ЕС был создан для того, чтобы защищать свободу. Это Советский Союз никому не давал его покинуть», — отметил политик. ЕС борется лишь со следствием Brexit, а не с причиной, которая заключается в неспособности европейских элит справиться с вызовами в сфере миграционной политики, заявил он.\r\n\r\nРанее 30 сентября Хант пообещал очистить Великобританию от русских шпионов, добавив, что цена за несоблюдение международных правил будет очень высока.\r\n\r\nПереговоры Лондона и Брюсселя о выходе Великобритании из ЕС начались летом 2017 года после того, как в 2016 году на референдуме в Соединенном Королевстве победу с результатом 51,9 процента против 48,1 процента одержали противники евроинтеграции. Brexit должен состояться 29 марта 2019 года, затем начнется переходный период.	1	1	2018-10-01 02:59:20+07
24	В США допустили возможность морской блокады России	ВМС США могут заблокировать морские пути для России в случае необходимости — чтобы помешать поставкам энергоресурсов на Ближний Восток. Об этом заявил министр внутренних дел страны Райан Зинке, передает Washington Examiner.	«У Соединенных Штатов, с нашим флотом, есть возможность следить за тем, чтобы морские пути были открыты, и, если необходимо, блокировать их, чтобы быть уверенным, что [российские] энергоресурсы не выйдут на рынок», — сказал он.\r\n\r\nПо словам главы американского МВД, экономика России строится на энергопоставках. «Я считаю, что она [Москва] сейчас действует на Ближнем Востоке в надежде наладить торговлю энергией, как в Европе», — отметил Зинке.\r\n\r\nАдминистрация президента США Дональда Трампа выступает против российских энергетических проектов в Европе, таких как «Северный поток-2», так как, по мнению Вашингтона, это превратится в рычаг воздействия на регион. Трамп стремится к тому, чтобы Европейский союз приобретал больше природного газа США.\r\n\r\n«Северный поток-2» из России в Германию должен быть построен к концу 2019 года. В это же время истечет срок соглашения «Газпрома» с украинским «Нафтогазом» о транзите газа через территорию этой страны. Новый газопровод должен заменить старый маршрут через Украину.\r\n\r\n	1	1	2018-10-01 03:08:26+07
23	«Малоимущий» депутат призналась в бедности из-за благотворительности	РИА Новости\r\nДепутат Государственной Думы от КПРФ Вера Ганзя ответила благотворительному фонду «Человечек», который организовал для нее сбор средств после того, как парламентарий пожаловалась на низкую зарплату. Об этом пишет РИА Новости.	Ганзя посоветовала фонду направить собранные деньги на помощь детскому дому, детскому саду или школе. «Я буду им очень признательна, потому как я свою зарплату, не всю конечно, но достаточно большую ее часть направляю именно на эти нужды. Пусть собирают, для детей эти деньги лишними не будут», — рассказала она.\r\n\r\nКровные есть\r\nПочему депутаты всегда готовы поднять себе зарплату\r\nПарламентарий отметила, что не примет пожертвованные ей средства. «Я не согласна получить эту сумму. <...> Мне достаточно того, что я помогаю, что я делаю из своей заработной платы», — утверждает депутат. Она добавила, что слова о низкой зарплате «перевернули», и на самом деле ей не хватает депутатской зарплаты, чтобы помочь всем обратившимся к ней россиянам.\r\n\r\nРанее 30 сентября сообщалось, что благотворительный фонд «Человечек» открыл сбор средств для депутата Ганзи, которая пожаловалась на низкий доход. Парламентарий заявила, что ей и коллегам не компенсируют представительские расходы, и от депутатской зарплаты почти ничего не остается.\r\n\r\n27 сентября жительница города Ленинск-Кузнецкий Алевтина Макарова пожаловалась депутату Николаю Валуеву на бедность. В ответ он процитировал Шукшина: «Бедным быть не стыдно, стыдно быть дешевым».	1	1	2018-10-01 03:04:04+07
25	Один американец засунул в стрелку палец	Один американец засунул в стрелку палец	Один американец засунул в стрелку палец	24	1	2018-10-01 03:29:11+07
26	sdfsdf		sdfsdf	0	0	2018-10-01 06:00:37+07
27	!!!!	!!!	!!!!	0	1	2018-10-01 06:02:14+07
28	Супер главная новость	Супер главная новость	Супер главная новость	1	1	2018-10-01 06:04:16+07
29	Тестовое задание №1	Тестовое задание №1	Тестовое задание №1	2	1	2018-10-01 06:04:54+07
30	Из-за больших объемов рекламной корреспонденции	Из-за больших объемов рекламной корреспонденции заполненность почтовых ящиков в Москве перестала являться для домушников маркером временного отсутствия хозяев. Теперь, как говорит Гришаков, воры активно используют рекламные флаеры, чтобы выявить пустующие квартиры.\r\n\r\n«Как правило, граждане этого не замечают, потому что эти специалисты действуют очень аккуратно, — говорит бывший оперативник. — Например, вас смутит реклама пиццы, засунутая во входную дверь вашей квартиры? Вот большинство граждан — нет. А при этом именно так воры прощупывают почву: если на следующий день флаер будет торчать в двери — значит, квартира пустовала».	$model = new SomeModelName();\r\n\r\nif ($model->load(Yii::$app->request->post()) && $model->save()) {\r\n    return $this->redirect(['view', 'id' => $model->group_id]);\r\n } else {\r\n    $model->hidden1 = 'your value';\r\n    return $this->render('create', [\r\n        'model' => $model,\r\n    ]);\r\n }	27	1	2018-10-01 06:09:30+07
31	Монголы пожаловались на гонения в Бурятии	Солист Бурятского государственного академического театра оперы и балета (БГАТОиБ) Ариунбаатар Ганбаатар объявил об уходе из учреждения из-за действий главы Бурятии Алексея Цыденова. Об этом сообщает местный портал ARD.	Певец написал в Twitter (публикация удалена, но ARD приводит ее скриншот и перевод текста), что в театр приходил глава республики и «практически выгнал нас». «Говорит, не позволит работать в этом театре монголам», — отметил Ганбаатар.\r\n\r\nПо его словам, в случившемся Минкульт республики винит худрука оперной труппы Дариму Линховоин, которая на собрании 23 сентября с участием Цыденова пригрозила уйти из театра, если на должность директора «поставят другого человека» вместо уволенной без объяснения причин Аюны Цыбикдоржиевой, семь лет возглавлявшей БГАТОиБ.\r\n\r\nВстреча была посвящена увольнению Цыбикдоржиевой. Коллектив выступил в ее поддержку, пишет «Байкал-Daily», однако власти не изменили свое решение. Объяснений также не последовало, но в ходе собрания Цыденов, как передает агентство «Байкал Медиа Консалтинг», обратил внимание на «достаточно скандальные» вещи в работе театра, в частности на большой разрыв в заработных платах и многочисленные финансовые нарушения, выявленные Счетной палатой. Линховоин поставила в заслугу уволенному директору высокие зарплаты сотрудников учреждения, на что глава республики ответил, что это заслуга не Цыбикдоржиевой или местных властей, а результат исполнения майских указов президента России.\r\n\r\nПо итогам скандала театр также покинул его ведущий солист Михаил Пирогов.\r\n\r\nПресс-секретарь главы Бурятии в комментарии ARD повторил призыв Цыденова к театру чаще привлекать к сотрудничеству сторонних артистов, чтобы «не опуститься на уровень местной самодеятельности».	28	1	2018-10-01 06:10:08+07
32	Ужас 1	Ужас 2	Ужас 3	30	1	2018-10-01 06:11:24+07
33	Корова родила жирафа и крокодила	ываыва	ываыва	31	1	2018-10-01 06:12:28+07
\.


--
-- TOC entry 2174 (class 0 OID 16486)
-- Dependencies: 201
-- Data for Name: newsComments; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public."newsComments" (id, newsid, comment, commentator, status, created_at) FROM stdin;
1	25	Что за новости? давайте уже нормально что то	Евгений	1	2018-10-01 04:29:09+07
2	25	Скажи Гиви Зурабович давай уже нормально, давай дорогой!	Гиви	1	2018-10-01 04:29:09+07
3	25	I wanna talk to you FUBARs, so if the uncle SAM told us to do it, we will do it!	Nikita	1	2018-10-01 04:29:09+07
4	25	Жорик хотел что то сказать	Жорик	1	2018-10-01 05:07:56+07
5	25	Жорик хотел что то сказать	Жорик	1	2018-10-01 05:09:21+07
6	25	Жорик хотел что то сказать	Жорик	1	2018-10-01 05:09:38+07
7	25	Жорик хотел что то сказать	Жорик	1	2018-10-01 05:09:59+07
8	25	Автор жжот	Автор	1	2018-10-01 05:10:15+07
9	25			1	2018-10-01 05:11:45+07
10	25			1	2018-10-01 05:12:39+07
11	25			1	2018-10-01 05:13:46+07
12	25	sdfsdf	sdfsdf	1	2018-10-01 05:23:01+07
13	25	sdfsdf	sdfsdf	1	2018-10-01 05:23:35+07
14	25	sdfsdf	sdfsdf	1	2018-10-01 05:24:59+07
15	25	sd	sdfsdf	1	2018-10-01 05:26:50+07
16	25	sdfsdfsd	sdfsdf	1	2018-10-01 05:26:55+07
17	25	sdfsdfsd	sdfsdf	1	2018-10-01 05:27:01+07
18	25	dsf	sdfsdfffffffffffffffffffffffffffffffff	1	2018-10-01 05:27:35+07
19	25	sdfsd	s	1	2018-10-01 05:29:35+07
20	25	444	!!!	1	2018-10-01 05:30:09+07
21	25	dfdf	dfdf	1	2018-10-01 05:30:46+07
22	25	sdfsdfsdf	sdfsdf	1	2018-10-01 05:39:44+07
23	25	f	sdfsd	1	2018-10-01 05:40:12+07
24	25	sdfsdfsdf	sdfsdf	1	2018-10-01 05:40:18+07
25	25	sdfsdfsdf	afasdfds	1	2018-10-01 05:40:41+07
26	23	Первый нах!!!	Первый нах	1	2018-10-01 05:43:16+07
27	24	Комент 	Комент 	1	2018-10-01 05:44:19+07
28	24	Комент 2	Комент2	1	2018-10-01 05:44:30+07
29	25	Первый нормальный коментарий для теста	Василий	1	2018-10-01 05:45:25+07
30	25	Все 2ой коментарий для теста	Алепксей	1	2018-10-01 05:45:42+07
31	2	)))))))))))))))))))))))))))))))))))))))))))))\r\n	Мухахаха	1	2018-10-01 05:46:04+07
32	2	первый нах!	Артур	1	2018-10-01 05:46:36+07
33	31	рапрап	апрап	1	2018-10-01 06:13:12+07
34	31	Уралвагонзавод	Уралвагонзавод	1	2018-10-01 06:13:20+07
\.


--
-- TOC entry 2184 (class 0 OID 0)
-- Dependencies: 198
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.category_id_seq', 31, true);


--
-- TOC entry 2185 (class 0 OID 0)
-- Dependencies: 200
-- Name: newsComments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public."newsComments_id_seq"', 34, true);


--
-- TOC entry 2186 (class 0 OID 0)
-- Dependencies: 197
-- Name: news_ID_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public."news_ID_seq"', 33, true);


--
-- TOC entry 2045 (class 2606 OID 16469)
-- Name: category category_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- TOC entry 2047 (class 2606 OID 16494)
-- Name: newsComments newsComments_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public."newsComments"
    ADD CONSTRAINT "newsComments_pkey" PRIMARY KEY (id);


--
-- TOC entry 2043 (class 2606 OID 16430)
-- Name: news news_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_pkey PRIMARY KEY ("ID");


-- Completed on 2018-10-01 06:16:30

--
-- PostgreSQL database dump complete
--
