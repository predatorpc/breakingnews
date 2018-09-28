--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.4

-- Started on 2018-09-28 16:48:24

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
-- TOC entry 2169 (class 0 OID 0)
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
-- TOC entry 2170 (class 0 OID 0)
-- Dependencies: 197
-- Name: news_ID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: admin
--

ALTER SEQUENCE public."news_ID_seq" OWNED BY public.news."ID";


--
-- TOC entry 2033 (class 2604 OID 16464)
-- Name: category id; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.category ALTER COLUMN id SET DEFAULT nextval('public.category_id_seq'::regclass);


--
-- TOC entry 2032 (class 2604 OID 16422)
-- Name: news ID; Type: DEFAULT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.news ALTER COLUMN "ID" SET DEFAULT nextval('public."news_ID_seq"'::regclass);


--
-- TOC entry 2162 (class 0 OID 16461)
-- Dependencies: 199
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.category (id, parentid, title, status) FROM stdin;
2	1	Тестовые задания	1
3	1	Основные новости	1
4	1	Железная дорога	1
6	5	Сообщения о пропаже	1
7	5	Бюро находок	1
8	5	Интересная работа	1
9	2	Добровольцы	1
10	3	Медицина	1
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
\.


--
-- TOC entry 2159 (class 0 OID 16417)
-- Dependencies: 196
-- Data for Name: news; Type: TABLE DATA; Schema: public; Owner: admin
--

COPY public.news ("ID", title, anounce, body, catid, status, created_at) FROM stdin;
14	Пропала муха	Пропала муха	Пропала муха	5	1	2018-09-28 16:04:11+07
9	Корова родила жирафа и крокодила 3	Корова родила жирафа и крокодила продолжение	Юные натуралисты обнаружили медведку	3	1	2018-09-28 20:30:51+07
1	Юные натуралисты обнаружили медведку	Юные натуралисты обнаружили медведку	Текст Юные натуралисты обнаружили медведку\n	2	1	2018-09-28 12:30:51+07
2	Комар стал просить о помощи	Комар стал просить о помощи	Юные натуралисты обнаружили медведку	1	1	2018-09-28 14:30:51+07
4	Камаз вьехал в море	Камаз вьехал в море	Юные натуралисты обнаружили медведку	1	1	2018-09-28 15:30:51+07
7	Корова родила жирафа и крокодила 1	Корова родила жирафа и крокодила 1	Юные натуралисты обнаружили медведку	12	1	2018-09-28 11:30:51+07
8	Корова родила жирафа и крокодила 2	Корова родила жирафа и крокодила 2	Юные натуралисты обнаружили медведку	2	1	2018-09-28 14:30:51+07
10	Это стендап и хендехох	Это стендап и хендехох	Юные натуралисты обнаружили медведку	3	1	2018-09-28 12:30:51+07
11	Валера	Николай Валерьевич Бузь	Юные натуралисты обнаружили медведку	18	1	2018-09-28 14:30:51+07
3	Бэнтли сделает самый дешевый спорткар	Бэнтли сделает самый дешевый спорткар	Юные натуралисты обнаружили медведку	1	1	2018-09-28 10:30:51+07
12	На проклятом месте лежала клеенка	На проклятом месте лежала клеенка	На проклятом месте лежала клеенка	18	1	2018-09-28 09:30:51+07
5	Бабушка получала пенсию после смерти	Бабушка получала пенсию после смерти	Юные натуралисты обнаружили медведку	1	1	2018-09-28 14:30:51+07
13	Поезд взлетел на гору	Поезд взлетел на гору	Поезд взлетел на гору	4	1	2018-09-28 16:01:18+07
6	Корова родила жирафа	Корова родила жирафа	Юные натуралисты обнаружили медведку	15	1	2018-09-28 14:30:51+07
\.


--
-- TOC entry 2171 (class 0 OID 0)
-- Dependencies: 198
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public.category_id_seq', 3, true);


--
-- TOC entry 2172 (class 0 OID 0)
-- Dependencies: 197
-- Name: news_ID_seq; Type: SEQUENCE SET; Schema: public; Owner: admin
--

SELECT pg_catalog.setval('public."news_ID_seq"', 14, true);


--
-- TOC entry 2037 (class 2606 OID 16469)
-- Name: category category_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- TOC entry 2035 (class 2606 OID 16430)
-- Name: news news_pkey; Type: CONSTRAINT; Schema: public; Owner: admin
--

ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_pkey PRIMARY KEY ("ID");


-- Completed on 2018-09-28 16:48:25

--
-- PostgreSQL database dump complete
--

