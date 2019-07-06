--
-- PostgreSQL database dump
--

-- Dumped from database version 10.8 (Ubuntu 10.8-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.8 (Ubuntu 10.8-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: centro_ayudas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.centro_ayudas (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    name character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    open_daily character varying(255) NOT NULL,
    latitude character varying(255) NOT NULL,
    longitude character varying(255) NOT NULL,
    average_general character varying(255) NOT NULL,
    voters character varying(255) NOT NULL
);


ALTER TABLE public.centro_ayudas OWNER TO postgres;

--
-- Name: centro_ayudas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.centro_ayudas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.centro_ayudas_id_seq OWNER TO postgres;

--
-- Name: centro_ayudas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.centro_ayudas_id_seq OWNED BY public.centro_ayudas.id;


--
-- Name: cuestionarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cuestionarios (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    name character varying(255) NOT NULL
);


ALTER TABLE public.cuestionarios OWNER TO postgres;

--
-- Name: cuestionarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cuestionarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cuestionarios_id_seq OWNER TO postgres;

--
-- Name: cuestionarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cuestionarios_id_seq OWNED BY public.cuestionarios.id;


--
-- Name: digitecas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.digitecas (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    name character varying(255) NOT NULL,
    web_site character varying(255) NOT NULL
);


ALTER TABLE public.digitecas OWNER TO postgres;

--
-- Name: digitecas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.digitecas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.digitecas_id_seq OWNER TO postgres;

--
-- Name: digitecas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.digitecas_id_seq OWNED BY public.digitecas.id;


--
-- Name: favoritos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.favoritos (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id integer NOT NULL,
    centro_ayuda_id integer NOT NULL
);


ALTER TABLE public.favoritos OWNER TO postgres;

--
-- Name: favoritos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.favoritos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.favoritos_id_seq OWNER TO postgres;

--
-- Name: favoritos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.favoritos_id_seq OWNED BY public.favoritos.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: noticias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.noticias (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    title character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    date_at date NOT NULL
);


ALTER TABLE public.noticias OWNER TO postgres;

--
-- Name: noticias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.noticias_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.noticias_id_seq OWNER TO postgres;

--
-- Name: noticias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.noticias_id_seq OWNED BY public.noticias.id;


--
-- Name: novedads; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.novedads (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    title text NOT NULL,
    description text NOT NULL,
    date_at date NOT NULL,
    address character varying(255),
    "isNew" boolean DEFAULT false NOT NULL
);


ALTER TABLE public.novedads OWNER TO postgres;

--
-- Name: novedads_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.novedads_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.novedads_id_seq OWNER TO postgres;

--
-- Name: novedads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.novedads_id_seq OWNED BY public.novedads.id;


--
-- Name: oauth_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.oauth_access_tokens (
    id character varying(100) NOT NULL,
    user_id integer,
    client_id integer NOT NULL,
    name character varying(255),
    scopes text,
    revoked boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone
);


ALTER TABLE public.oauth_access_tokens OWNER TO postgres;

--
-- Name: oauth_auth_codes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.oauth_auth_codes (
    id character varying(100) NOT NULL,
    user_id integer NOT NULL,
    client_id integer NOT NULL,
    scopes text,
    revoked boolean NOT NULL,
    expires_at timestamp(0) without time zone
);


ALTER TABLE public.oauth_auth_codes OWNER TO postgres;

--
-- Name: oauth_clients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.oauth_clients (
    id integer NOT NULL,
    user_id integer,
    name character varying(255) NOT NULL,
    secret character varying(100) NOT NULL,
    redirect text NOT NULL,
    personal_access_client boolean NOT NULL,
    password_client boolean NOT NULL,
    revoked boolean NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.oauth_clients OWNER TO postgres;

--
-- Name: oauth_clients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.oauth_clients_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.oauth_clients_id_seq OWNER TO postgres;

--
-- Name: oauth_clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.oauth_clients_id_seq OWNED BY public.oauth_clients.id;


--
-- Name: oauth_personal_access_clients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.oauth_personal_access_clients (
    id integer NOT NULL,
    client_id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.oauth_personal_access_clients OWNER TO postgres;

--
-- Name: oauth_personal_access_clients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.oauth_personal_access_clients_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.oauth_personal_access_clients_id_seq OWNER TO postgres;

--
-- Name: oauth_personal_access_clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.oauth_personal_access_clients_id_seq OWNED BY public.oauth_personal_access_clients.id;


--
-- Name: oauth_refresh_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.oauth_refresh_tokens (
    id character varying(100) NOT NULL,
    access_token_id character varying(100) NOT NULL,
    revoked boolean NOT NULL,
    expires_at timestamp(0) without time zone
);


ALTER TABLE public.oauth_refresh_tokens OWNER TO postgres;

--
-- Name: opinions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.opinions (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    name character varying(255) NOT NULL,
    comments character varying(255) NOT NULL,
    average double precision NOT NULL,
    user_id integer NOT NULL,
    centro_ayuda_id integer NOT NULL
);


ALTER TABLE public.opinions OWNER TO postgres;

--
-- Name: opinions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.opinions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.opinions_id_seq OWNER TO postgres;

--
-- Name: opinions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.opinions_id_seq OWNED BY public.opinions.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- Name: preguntas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.preguntas (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    description character varying(255) NOT NULL,
    cuestionario_id integer NOT NULL
);


ALTER TABLE public.preguntas OWNER TO postgres;

--
-- Name: preguntas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.preguntas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.preguntas_id_seq OWNER TO postgres;

--
-- Name: preguntas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.preguntas_id_seq OWNED BY public.preguntas.id;


--
-- Name: respuestas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.respuestas (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_id integer NOT NULL,
    cuestionario_id integer NOT NULL,
    date_at date,
    semaforo_activo character varying(255),
    c_amarillas character varying(255),
    c_naranjas character varying(255),
    c_rojas character varying(255)
);


ALTER TABLE public.respuestas OWNER TO postgres;

--
-- Name: respuestas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.respuestas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.respuestas_id_seq OWNER TO postgres;

--
-- Name: respuestas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.respuestas_id_seq OWNED BY public.respuestas.id;


--
-- Name: rols; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rols (
    id integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    description character varying(255) NOT NULL,
    cod_rol integer NOT NULL
);


ALTER TABLE public.rols OWNER TO postgres;

--
-- Name: rols_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rols_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rols_id_seq OWNER TO postgres;

--
-- Name: rols_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rols_id_seq OWNED BY public.rols.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    nickname character varying(255),
    neighborhood character varying(255),
    addresss character varying(255),
    phone character varying(255),
    cellphone character varying(255),
    rol_id integer
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: centro_ayudas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.centro_ayudas ALTER COLUMN id SET DEFAULT nextval('public.centro_ayudas_id_seq'::regclass);


--
-- Name: cuestionarios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuestionarios ALTER COLUMN id SET DEFAULT nextval('public.cuestionarios_id_seq'::regclass);


--
-- Name: digitecas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.digitecas ALTER COLUMN id SET DEFAULT nextval('public.digitecas_id_seq'::regclass);


--
-- Name: favoritos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.favoritos ALTER COLUMN id SET DEFAULT nextval('public.favoritos_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: noticias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticias ALTER COLUMN id SET DEFAULT nextval('public.noticias_id_seq'::regclass);


--
-- Name: novedads id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.novedads ALTER COLUMN id SET DEFAULT nextval('public.novedads_id_seq'::regclass);


--
-- Name: oauth_clients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oauth_clients ALTER COLUMN id SET DEFAULT nextval('public.oauth_clients_id_seq'::regclass);


--
-- Name: oauth_personal_access_clients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oauth_personal_access_clients ALTER COLUMN id SET DEFAULT nextval('public.oauth_personal_access_clients_id_seq'::regclass);


--
-- Name: opinions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.opinions ALTER COLUMN id SET DEFAULT nextval('public.opinions_id_seq'::regclass);


--
-- Name: preguntas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.preguntas ALTER COLUMN id SET DEFAULT nextval('public.preguntas_id_seq'::regclass);


--
-- Name: respuestas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.respuestas ALTER COLUMN id SET DEFAULT nextval('public.respuestas_id_seq'::regclass);


--
-- Name: rols id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rols ALTER COLUMN id SET DEFAULT nextval('public.rols_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: centro_ayudas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.centro_ayudas (id, created_at, updated_at, name, address, phone, open_daily, latitude, longitude, average_general, voters) FROM stdin;
2	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°1	Primera Junta 2454	4577040	24 Hs.	-31.648003	-60.7059869999999	0	0
3	2019-01-11 08:19:06	2019-01-11 08:19:06	Fiscalia Especializada en Violencia de Genero	1° De Mayo 2820	4573464	Lunes A Viernes De 7 A 19 Hs.	-31.642389	-60.7093209999999	0	0
4	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Asistencia A La Víctima Y Al Testigo Del Delito	Eva Perón 2726, 2º Piso	4573910	Lunes A Viernes De 8 A 18 Hs.	-31.644145	-60.7077019999999	0	0
5	2019-01-11 08:19:06	2019-01-11 08:19:06	Delegación Ministerio De Trabajo Y Seguridad Social	Rivadavia 3049	4573335	Lunes A Viernes De 7 A 15:15 Hs.	-31.6410969	-60.7029400999999	0	0
6	2019-01-11 08:19:06	2019-01-11 08:19:06	Dirección De Adultos Mayores	Salta 3211	4589408	Lunes A Viernes De 7 A 13 Hs.	-31.648736	-60.7157449999999	0	0
7	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Referencia	Avenida 27 De Febrero 2161	4560993	Lunes A Viernes De 7 A 15 Hs.	-31.6515531	-60.7057876	0	0
8	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro Integrador Comunitario	Facundo Zuviría 8002	4579214	Lunes A Viernes De 7 A 18 Hs.	-31.5925146	-60.6987639999999	0	0
9	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro Integrador Comunitario	J. Civils 6539	4579262	Lunes A Viernes De 7 A 16 Hs.	-31.6106578	-60.697294	0	0
10	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°10	Zeballos 4207	4578905	24 Hs.	31.6009837999999	-60.7152439	0	0
11	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°11	Aristobulo Del Valle 4806	4572896	24 Hs.	-31.6236742	-60.6993249999999	0	0
12	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°2	General López 3299	4573246	24 Hs.	-31.6555132	-60.7187926999999	0	0
13	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°24 	Manzana 5 Pasaje 13 – Barrio Alto Verde	4847772	24 Hs.	-31.6582100506983	-60.69792001766	0	0
14	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°25	Alejandro Greca 1133	4577000	24 Hs.	-31.6356804526903	-60.6594149920654	0	0
15	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°26	San Lorenzo 8228, Barrio Pompey	4578910	24 Hs.	-31.5901259	-60.7011704	0	0
16	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°28	Av. Presidente Perón e Iturraspe	4831959	24 Hs.	-31.6257847999999	-60.7186634999999	0	0
17	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°3	Lavalle 340	4572806	24 Hs.	-31.6192339	-60.6845180999999	0	0
18	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°4	Tucumán 3595	4572846	24 Hs.	-31.643819	-60.719376	0	0
19	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°5	S. Del Carril 2027	4579099	24 Hs.	-31.619594	-60.691753	0	0
20	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°6	Lopez Y Planes 4328	4572801	24 Hs.	-31.6255381	-60.7134502999999	0	0
21	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°7	Mansilla 9700	4578908	24 Hs.	-32.9490917	-60.690192	0	0
22	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°8	General Paz 7374	4578900	24 Hs.	-31.6043214999999	-60.6750147999999	0	0
23	2019-01-11 08:19:06	2019-01-11 08:19:06	Comisaría N°9	Facundo Zuviría 5802	4578909	24 Hs.	-31.6101317	-60.7043443999999	0	0
24	2019-01-11 08:19:06	2019-01-11 08:19:06	Destacamento	Hospital Mira Y López	4579229	24 Hs.	-31.5821671	-60.7267201999999	0	0
25	2019-01-11 08:19:06	2019-01-11 08:19:06	Destacamento	Laprida 5020	4577002	24 Hs.	31.6256429	-60.6802970999999	0	0
26	2019-01-11 08:19:06	2019-01-11 08:19:06	Destacamento	Manzana 3 – Barrio Alto Verde	4572808	24 Hs.	31.6570091425343	-60.6974479488734	0	0
27	2019-01-11 08:19:06	2019-01-11 08:19:06	Destacamento	Parque Garay	4577006	24 Hs.	-31.6348514310646	-60.7199333121643	0	0
28	2019-01-11 08:19:06	2019-01-11 08:19:06	Destacamento Mercado de Abasto	Teniente Loza 7100	4579106	24 Hs.	-31.5640288	-60.7477844999999	0	0
29	2019-01-11 08:19:06	2019-01-11 08:19:06	Destacamento N°10	Matheu 6250	4579112	24 Hs.	-31.5843206	-60.7372256999999	0	0
30	2019-01-11 08:19:06	2019-01-11 08:19:06	Destacamento N°9	Blas Parera 8430	4847624	24 Hs.	-31.5817556	-60.7264014999999	0	0
31	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría	Padre Quiroga 2215	4572803	24 Hs.	-31.644698	-60.7339849999999	0	0
32	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría	Pasaje Alfonso 10500	4848443	24 Hs.	-31.6376553	-60.7239527	0	0
33	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría	Ruta Provincia 1 Km 2,5 – Barrio Colastine	4982127	24 Hs.	-31.6239188	-60.5996685999999	0	0
34	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N° 17	Gorriti 5600 -Barrio Loyola	4845412	24 Hs.	-31.5832017	-60.7253395	0	0
35	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N° 18	Blas Parera 10299	4579296	24 Hs.	31.5707486	-60.7295487999999	0	0
36	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N°1	Manzana 6 Barrio Centenario	4572831	24 Hs.	-31.6648884319941	-60.7287294650898	0	0
37	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N°10	Amenábar 4300	4572836	24 Hs.	-31.6556496	-60.7316726	0	0
38	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N°12	Furlong 8100	4578903	24 Hs.	-31.5828455	-60.7464074999999	0	0
39	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N°14	Combatiente Malvinas 4487	4579282	24 Hs.	-31.5733725475263	-60.7111127841308	0	0
40	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N°2	Europa 2250	4572803	24 Hs	-31.6549416999999	-60.7369939999999	0	0
41	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N°3	Lamadrid 7600	4578906	24 Hs.	-31.5936209	-60.7129582	0	0
42	2019-01-11 08:19:06	2019-01-11 08:19:06	Subcomisaría N°6	Zona Urbana – Barrio La Guardia	4577014	24 Hs.	-31.6438983584151	-60.6347515833493	0	0
43	2019-01-11 08:19:06	2019-01-11 08:19:06	Centros De Asistencia A La Víctima De Violencia Familiar Y Sexual	Lisandro De La Torre 2665	461-9923	24 Hs.	-31.6513229	-60.7088908	0	0
44	2019-01-11 08:19:06	2019-01-11 08:19:06	Instituto Nacional Contra La Discriminación, La Xenofobia Y El Racismo (Inadi)	San Jerónimo 3622	4563295	Lunes A Viernes De 8 A 16 Hs.	-31.633606	-60.7041209999999	0	0
45	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Acceso A La Justicia	Facundo Zuviría 8020	0800-222-3425	Lunes A Viernes De 8 A 16 Hs.	-31.5924108	-60.698729	0	0
46	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Asistencia Judicial	Salta 2483	0800-555-8632	Lunes A Viernes De 8 A 13 Hs.	-31.6506084	-60.7064998	0	0
47	2019-01-11 08:19:06	2019-01-11 08:19:06	Ministerio Público De Acusación - N1 Circunscripción - Sede 2	Obispo Gelabert 2837/39	 4574749	Lunes A Viernes De 7 A 19 Hs.	-31.6362204	-60.7067273	0	0
48	2019-01-11 08:19:06	2019-01-11 08:19:06	Unidad de Información y Atención de Víctimas y Denunciantes del Ministerio Público Fiscal	Urquiza 2463	4572700	Lunes A Viernes De 7:15 A 12:45 Y De 14 A 20 Hs.	-31.6456463	-60.7131934	0	0
49	2019-01-11 08:19:06	2019-01-11 08:19:06	Guardería	25 De Mayo 3445	 4572387	Lunes A Viernes De 8 A 13 Hs.	-31.6364088	-60.7028469	0	0
50	2019-01-11 08:19:06	2019-01-11 08:19:06	Servicio Local De Promoción Y Protección De Derechos De Niños, Niñas Y Adolescentes - Ecina	25 De Mayo 2884	 4571666	Lunes A Viernes De 7:30 A 18 Hs.	-31.6425636	-60.7045592	0	0
51	2019-01-11 08:19:06	2019-01-11 08:19:06	Subsecretaría de De Niñez adolescencia y Familia	San Luis 3135	 4815580 	Lunes A Viernes De 7 A 13 Hs. Guardia 24 Hs.	-31.6404057	-60.7013643999999	0	0
52	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	Alfonsina Storni 3100	 4579277	24 Hs.	-31.5836384	-60.6927144999999	0	0
54	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	Facundo Zuviria 8200	 4805810	24 Hs.	-31.5910118	-60.6985045	0	0
55	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	José Cibilis 6539	 4579262	24 Hs.	-31.5810634	-60.7268158	0	0
56	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	Predio ATE UNL	 4571216	24 Hs.	-31.6390752	-60.6774391	0	0
57	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	Lamadrid 10590 esquina Pje. Malaver	 4800311	24 Hs.	-31.5662144999999	-60.7047332999999	0	0
58	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	Amenabar 4070	 4573369	24 Hs.	-31.6558495	-60.7295814	0	0
59	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	Artigas 4100	 4572505	24 Hs.	-31.6206101999999	-60.718522	0	0
60	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	Avellaneda 4800	 4521292	24 Hs.	-31.6268831	-60.6844909999999	0	0
61	2019-01-11 08:19:06	2019-01-11 08:19:06	Centro De Salud	Avenida 12 De Octubre 9791	 4579138	24 Hs.	-31.5673661	-60.7388541999999	0	0
62	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Avenida Vera Peñaloza 8230	 4579293	24 Hs.	-31.5876064	-60.7115158999999	0	0
63	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Blas Parera 6000	 4579279	24 Hs.	-31.6171096	-60.7178423	0	0
64	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Calle Principal S/N	 4589428	24 Hs.	-31.6694376993932	-60.7349689940928	0	0
65	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Callejón Roca S/N	 4579140	24 Hs.	-31.5785070845455	-60.6844520961461	0	0
66	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Camino Viejo Esperanza 7000	Sin Teléfono De Línea	24 Hs.	-31.5963316141633	-60.7355873508827	0	0
67	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Carranza Y Monseñor Rodríguez	 4805052	24 Hs.	-31.5608656	-60.7323833	0	0
68	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Casanello 1515	 4579102	24 Hs.	-31.611825	-60.683755	0	0
69	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Colastine Sur Km 480 Ruta 168 – Barrio Colastine	 155736018	24 Hs.	-31.6425127	-60.6251245	0	0
70	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Colastine Norte Km 3 Ruta 1Barrio Colastine	 4574927	24 Hs.	-31.623439270291	-60.6028389930725	0	0
71	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Pedro De Vega 3865	 4579244	24 Hs.	-31.6075468	-60.7118136	0	0
72	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Diagonal Avispones 1080	 4579133	24 Hs.	-38.416097	-63.6166719999999	0	0
73	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Diez De Andino Y Aguado	 4579132	24 Hs.	-31.5708471	-60.7107876	0	0
74	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	E. J. Rosas 10300 Y P. Espinoza 5800	 4579219	24 Hs.	-31.610988	-60.6916984999999	0	0
75	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Estrada Y Alberti	 4579234	24 Hs.	-31.596783	-60.7167273	0	0
76	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Facundo Zuviría 5859	 4579241	24 Hs.	-31.6123036	-60.7052075999999	0	0
77	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Facundo Zuviria 5889	 4579144	24 Hs.	-31.6120114999999	-60.7051411999999	0	0
78	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Francia 4020 Y Domingo Silva	 4573799	24 Hs.	-31.629185	-60.709777	0	0
79	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Bv. Gálvez 1563	 4572873	24 Hs.	-31.6382749	-60.6919144999999	0	0
80	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Javier De La Rosa 1055	 4190419	24 Hs.	-31.602994	-60.6755469999999	0	0
81	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Km 0 Ruta Provincial 1 – Barrio La Guardia	 4577013	24 Hs.	-31.6383261068432	-60.6261892898878	0	0
82	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Lamadrid 7689	 4579278	24 Hs.	-31.5926704	-60.7129798999999	0	0
83	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Lehman 7695	 4579290	24 Hs.	-31.5751508	-60.7259434	0	0
84	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Libertad 3730	 4572523	24 Hs.	-31.5855109	-60.7238016	0	0
86	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Los Azucenas 10300	 4579217	24 Hs.	-31.5712395999999	-60.6839773	0	0
87	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Manzana 10 - Barrio Alto Verde	0342 156152067	24 Hs.	-31.6635755127779	-60.7007193925101	0	0
88	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Manzana 13 - Barrio Alto Verde	 4571942	24 Hs.	-31.6674986294745	-60.6996365378374	0	0
89	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Manzana 2 - Barrio Alto Verde	 4571978	24 Hs.	-31.6592212250212	-60.6996194343578	0	0
90	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Mariano Cabal 3951	 4583634	24 Hs.	-31.6618186955202	-60.7289079326978	0	0
91	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Matheu 6250	 4579101	24 Hs.	-31.5843206	-60.7372256999999	0	0
92	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Mendoza 4519	 4573367	24 Hs.	-31.6428035	-60.7321978999999	0	0
93	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Padre Catena 4389	 4574894	24 Hs.	-31.6315789	-60.7221046999999	0	0
94	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Pasaje Leiva 6859	 4579263	24 Hs.	-31.6054825	-60.6914609	0	0
95	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Piedrabuena 6040	 4579288	24 Hs.	-31.5790502	-60.7274082999999	0	0
96	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Pietranera 3164	 4592315	24 Hs.	-31.6631699	-60.7190431999999	0	0
97	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	R. S. Peña 2020	 4572525	24 Hs.	-31.6488744	-60.726631	0	0
98	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Río Bamba Y French	 4579038	24 Hs.	-31.5981396	-60.6650841	0	0
99	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Risso 1745	 4579209	24 Hs.	-31.6030849	-60.6836672	0	0
100	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Ruta Provincial 1 – Barrio Colastine	 4574927	24 Hs.	-31.6216635	-60.5962476	0	0
101	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Salvador Del Carril 2240	 4579206	24 Hs.	-31.6189966	-60.6940776999999	0	0
102	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	San José 7040	 4579220	24 Hs.	-31.5999161	-60.7094452	0	0
103	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Teniente Loza 7100	 4579299	24 Hs.	-31.5640288	-60.7477844999999	0	0
104	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Troncoso 8183	 4579292	24 Hs.	-31.5825789	-60.7451280999999	0	0
105	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro De Salud	Zavalía 342	 4572524	24 Hs.	-31.668652	-60.7263163	0	0
106	2019-01-11 08:19:07	2019-01-11 08:19:07	Hospital "Sayago"	French 5090	 4579226	24 Hs.	-31.5862142	-60.722201	0	0
107	2019-01-11 08:19:07	2019-01-11 08:19:07	Hospital “Dr. J. B. Iturraspe”	Pellegrini 3551	 4575712	24 Hs.	-31.6330171	-60.7155414999999	0	0
108	2019-01-11 08:19:07	2019-01-11 08:19:07	Hospital “Dr. José María Cullen”	Avenida Freyre 2150	 4573357	24 Hs.	-31.648704	-60.7188729999999	0	0
85	2019-01-11 08:19:07	2019-02-18 22:45:51	Centro De Salud	Alejandro Creta 1117	 4577008	24 hs	-31.6357260265956	-60.658945441246	3.5	3
109	2019-01-11 08:19:07	2019-01-11 08:19:07	Hospital De Niños “Dr. Orlando Alassia”	Mendoza 4151	 4505900	24 Hs.	-31.6445485	-60.7274867999999	0	0
110	2019-01-11 08:19:07	2019-01-11 08:19:07	Hospital Dr. Mira y López	Blas Parera 8430	 4579236	24 hs	-31.5822828102082	-60.7268804311752	0	0
111	2019-01-11 08:19:07	2019-01-11 08:19:07	Hospital Vera Candioti	Monseñor Zaspe 3738	 4573500	24 hs	-31.6534479	-60.7243575999999	0	0
112	2019-01-11 08:19:07	2019-01-11 08:19:07	Subsecretaría De Coordinación Para El Trabajo Decente	Crespo 2239	 4573182	Lunes A Viernes De 7:30 A 13:30 Hs.	-31.642192	-60.7007345	0	0
113	2019-01-11 08:19:07	2019-01-11 08:19:07	Subsecretaría de Políticas de Género	Corrientes 2879	 4572888	Lunes a Viernes de 8 a 14 Hs.	-31.6531382	-60.7122259	0	0
114	2019-01-11 08:19:07	2019-01-11 08:19:07	Colegio de Abogados de Santa Fe 1º Circunscripción Judicial	3 de Febrero 2743	 4592700	Martes, Miércoles y viernes de 9 a 10:30 hs Lunes a Viernes de 16 a 19 hs	-31.657787	-60.7118719999999	0	0
115	2019-01-11 08:19:07	2019-01-11 08:19:07	Gobiernos de la Ciudad de Santa Fe y UNL	Cándido Pujato 2751 Piso 1	 4571194		-31.633958	-60.704959	0	0
116	2019-01-11 08:19:07	2019-01-11 08:19:07	Gobiernos de la Ciudad de Santa Fe y UNL	Pasaje Vecinal y Padre Catena, Barrio Villa del Parque	-	Lunes de 10 a 12 hs	-31.6320840504225	-60.7231078470463	0	0
117	2019-01-11 08:19:07	2019-01-11 08:19:07	Gobiernos de la Ciudad de Santa Fe y UNL	Mariano Cabal 3951Barrio Chalet	-	Lunes de 14 a 16 hs	-31.6618186955202	-60.7289079326978	0	0
118	2019-01-11 08:19:07	2019-01-11 08:19:07	Gobiernos de la Ciudad de Santa Fe y UNL	Av. Facundo Zuviría 8002	-	Martes de 8 a 10 hs	-31.5925146	-60.6987639999999	0	0
119	2019-01-11 08:19:07	2019-01-11 08:19:07	Gobiernos de la Ciudad de Santa Fe y UNL	Bv. Gálvez 1150	-	Martes de 10 a 12 hs	-31.6385835	-60.6873828999999	0	0
120	2019-01-11 08:19:07	2019-01-11 08:19:07	Gobiernos de la Ciudad de Santa Fe y UNL	Gaboto 7381	-	Miércoles 10 a 12 hs	-31.5953785	-60.7150389999999	0	0
121	2019-01-11 08:19:07	2019-01-11 08:19:07	Gobiernos de la Ciudad de Santa Fe y UNL	Faustino Miguez y Fco. de Aroca Barrio San Agustin	-	Miércoles de 15 a 17 hs	-31.564821148557	-60.7437265790098	0	0
122	2019-01-11 08:19:07	2019-01-11 08:19:07	Gobiernos de la Ciudad de Santa Fe y UNL	Oficina de Distrito Cementerio Municipal	-	Jueves 13 a 15 hs	-31.6159705	-60.7183026999999	0	0
123	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro de Acceso a la Justicia (CAJ Nación)	Milenio de Polonia 3642	 4899853	Lunes a Viernes de 8 a 16 hs	-31.6152816999999	-60.7116114	0	0
124	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro de Asistencia Judicial (CAJ Provincia Santa Fe)	Salta 2483	 4619911	Lunes a Viernes 7 a 13:30 hs	-31.6506084	-60.7064998	0	0
125	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro Territorial de Denuncias CTD Distrito Centro	Predio Ferial Municipal, Las Heras 2883	 4831820	Lunes a Viernes de 8 a 20 hs	-31.6434185999999	-60.6994834999999	0	0
126	2019-01-11 08:19:07	2019-01-11 08:19:07	Centro Territorial de Denuncias CTD Distrito Norte	Aristobulo del Valle 7401	 4833446	Lunes a Viernes de 8 a 20 hs	-31.6002296	-60.6919077999999	0	0
1	2019-01-11 08:18:07	2019-02-18 22:26:19	Area Mujer y Diversidad Sexual	25 De mayo 2884	4571525	Lunes A Viernes De 7 A 20 Hs.	-31.64256	-60.70456	3.6666666666667	3
53	2019-01-11 08:19:06	2019-02-19 23:10:04	Centro De Salud	Diagonal Avipones 12500	 4579133	24 Hs.	-31.5600461796458	-60.7422181957684	3.7857142857143	7
\.


--
-- Data for Name: cuestionarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cuestionarios (id, created_at, updated_at, name) FROM stdin;
1	2019-01-11 08:22:58	2019-01-11 08:22:58	Test sobre violencia
\.


--
-- Data for Name: digitecas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.digitecas (id, created_at, updated_at, name, web_site) FROM stdin;
1	2019-01-21 21:30:31	2019-01-21 21:33:41	ONU Mujeres	http://http://www.unwomen.org/es
\.


--
-- Data for Name: favoritos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.favoritos (id, created_at, updated_at, user_id, centro_ayuda_id) FROM stdin;
12	2019-02-19 23:28:18	2019-02-19 23:28:18	4	3
13	2019-02-19 23:28:20	2019-02-19 23:28:20	4	4
14	2019-02-19 23:28:23	2019-02-19 23:28:23	4	5
15	2019-02-19 23:28:27	2019-02-19 23:28:27	4	6
16	2019-02-20 22:03:23	2019-02-20 22:03:23	4	2
17	2019-02-20 22:04:12	2019-02-20 22:04:12	4	1
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2016_06_01_000001_create_oauth_auth_codes_table	1
4	2016_06_01_000002_create_oauth_access_tokens_table	1
5	2016_06_01_000003_create_oauth_refresh_tokens_table	1
6	2016_06_01_000004_create_oauth_clients_table	1
7	2016_06_01_000005_create_oauth_personal_access_clients_table	1
8	2019_01_17_212004_create_cuestionarios_table	2
9	2019_01_17_212221_create_preguntas_table	3
10	2019_01_17_212350_create_digitecas_table	4
11	2019_01_17_212415_create_novedads_table	5
12	2019_01_17_212443_create_noticias_table	6
13	2019_01_17_212508_create_centro_ayudas_table	7
14	2019_01_17_212540_create_rols_table	8
15	2019_01_17_212616_add_colum_user	9
16	2019_01_17_212645_create_opinions_table	10
17	2019_01_17_212710_create_favoritos_table	11
18	2019_01_21_215315_edit_colum_novedads	12
19	2019_06_04_220326_create_respuestas_table	12
20	2019_06_04_231227_add_colums	13
\.


--
-- Data for Name: noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.noticias (id, created_at, updated_at, title, description, date_at) FROM stdin;
1	2019-01-22 22:17:27	2019-01-22 22:17:27	Mi noticia de prueba	" esto es una descripcion para mi noticia de prueba"	2019-01-22
2	2019-01-22 22:18:47	2019-01-22 22:18:47	Mi noticia de prueba	" esto es una descripcion para mi noticia de prueba"	2019-01-22
3	2019-01-22 22:18:48	2019-01-22 22:18:48	Mi noticia de prueba	" esto es una descripcion para mi noticia de prueba"	2019-01-22
4	2019-01-22 22:18:49	2019-01-22 22:18:49	Mi noticia de prueba	" esto es una descripcion para mi noticia de prueba"	2019-01-22
5	2019-01-22 22:18:49	2019-01-22 22:18:49	Mi noticia de prueba	" esto es una descripcion para mi noticia de prueba"	2019-01-22
6	2019-01-22 22:18:49	2019-01-22 22:18:49	Mi noticia de prueba	" esto es una descripcion para mi noticia de prueba"	2019-01-22
7	2019-01-22 22:18:50	2019-01-22 22:18:50	Mi noticia de prueba	" esto es una descripcion para mi noticia de prueba"	2019-01-22
8	2019-01-22 22:27:38	2019-01-22 22:27:38	Mi noticia de prueba	" esto es una descripcion para mi noticia de prueba"	2019-01-22
\.


--
-- Data for Name: novedads; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.novedads (id, created_at, updated_at, title, description, date_at, address, "isNew") FROM stdin;
1	2019-02-28 08:18:07	2019-02-28 08:18:07	Nacimiento de Simone de Beauvoir, precursora de un nuevo feminismo. Visibilizó la opresión de género (1908).	Nacimiento de Simone de Beauvoir, precursora de un nuevo feminismo. Visibilizó la opresión de género (1908).	2019-01-07	-	f
2	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace Virginia Woolf, escritora (1882).	Nace Virginia Woolf, escritora (1882).	2019-01-24	-	f
3	2019-02-28 08:18:07	2019-02-28 08:18:07	Día mundial contra la mutilación femenina.	Día mundial contra la mutilación femenina.	2019-02-05	-	f
4	2019-02-28 08:18:07	2019-02-28 08:18:07	Día de la mujer de las Américas. Creación de la Comisión Interamericana de Mujeres  de la OEA (CIM) en La Habana, Cuba. 	Día de la mujer de las Américas. Creación de la Comisión Interamericana de Mujeres  de la OEA (CIM) en La Habana, Cuba. 	2019-02-18	-	f
5	2019-02-28 08:18:07	2019-02-28 08:18:07	Día de la Visibilidad Lésbica: en conmemoración del crimen de odio que mató a Natalia “La Pepa” Gaitán.	Día de la Visibilidad Lésbica: en conmemoración del crimen de odio que mató a Natalia “La Pepa” Gaitán.	2019-03-07	-	f
6	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de la Mujer: En 1908, obreras textiles en Nueva York, en huelga por mejores salarios y condiciones de trabajo fueron quemadas vivas en un incendio provocado por el empresario.	Día Internacional de la Mujer: En 1908, obreras textiles en Nueva York, en huelga por mejores salarios y condiciones de trabajo fueron quemadas vivas en un incendio provocado por el empresario. 	2019-03-08	-	f
7	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Nacional de la Lucha contra la Violencia de Género en los Medios de Comunicación. 	Día Nacional de la Lucha contra la Violencia de Género en los Medios de Comunicación. 	2019-03-11	-	f
8	2019-02-28 08:18:07	2019-02-28 08:18:07	Día de los derechos de las personas Trans: En conmemoración del fallecimiento de la activista Claudia Pía Baudracco.	Día de los derechos de las personas Trans: En conmemoración del fallecimiento de la activista Claudia Pía Baudracco.	2019-03-18	-	f
9	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de la Eliminación de la Discriminación Racial.	Día Internacional de la Eliminación de la Discriminación Racial.	2019-03-21	-	f
10	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Mundial contra la prostitución infantil	Día Mundial contra la prostitución infantil	2019-04-04	-	f
11	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace en París Flora Tristán. Fue una escritora, pensadora socialista y feminista francesa de ascendencia peruana. Fue una de las grandes fundadoras del feminismo de la tercera ola. (1803).	Nace en París Flora Tristán. Fue una escritora, pensadora socialista y feminista francesa de ascendencia peruana. Fue una de las grandes fundadoras del feminismo de la tercera ola. (1803).	2019-04-07	-	f
12	2019-02-28 08:18:07	2019-02-28 08:18:07	Día de la Salud.	Día de la Salud.	2019-04-07	-	f
13	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace en Chile Gabriela Mistral, premio Nobel en 1945 (1889).	Nace en Chile Gabriela Mistral, premio Nobel en 1945 (1889).	2019-04-07	-	f
14	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace Victoria Ocampo, escritora (1870).	Nace Victoria Ocampo, escritora (1870).	2019-04-07	-	f
15	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de las Trabajadoras y Trabajadores.	Día Internacional de las Trabajadoras y Trabajadores.	2019-05-01	-	f
16	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace Eva Perón (1919).	Nace Eva Perón (1919).	2019-05-07	-	f
17	2019-02-28 08:18:07	2019-02-28 08:18:07	Día que se conmemora la sanción de la ley de identidad de género y atención sanitaria para personas trans.	Día que se conmemora la sanción de la ley de identidad de género y atención sanitaria para personas trans.	2019-05-09	-	f
18	2019-02-28 08:18:07	2019-02-28 08:18:07	Muere Alicia Moreau de Justo a los 100 años. Médica y pionera del feminismo en la Argentina (1986).	Muere Alicia Moreau de Justo a los 100 años. Médica y pionera del feminismo en la Argentina (1986).	2019-05-12	-	f
19	2019-02-28 08:18:07	2019-02-28 08:18:07	Se celebra el Día Internacional de la Enfermera  en homenaje a la fundadora de la enfermería moderna Florencia Nightingale.	Se celebra el Día Internacional de la Enfermera  en homenaje a la fundadora de la enfermería moderna Florencia Nightingale.	2019-05-12	-	f
20	2019-02-28 08:18:07	2019-02-28 08:18:07	Por Ley 23.179, el Congreso de la Nación Argentina ratificó la Convención por la Eliminación de todas las Formas de Discriminación contra la Mujer (1985).	Por Ley 23.179, el Congreso de la Nación Argentina ratificó la Convención por la Eliminación de todas las Formas de Discriminación contra la Mujer (1985).	2019-05-20	-	f
21	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional contra la Discriminación por Orientación Sexual e Identidad de Género: conmemorar el “Día contra la Homofobia y la Transfobia” porque ese día, en 1990, la Organización Mundial de la Salud (OMS) decidió retirar la homosexualidad de la lista de desórdenes mentales y aceptarla oficialmente como una variación natural de la sexualidad humana.	Día Internacional contra la Discriminación por Orientación Sexual e Identidad de Género: conmemorar el “Día contra la Homofobia y la Transfobia” porque ese día, en 1990, la Organización Mundial de la Salud (OMS) decidió retirar la homosexualidad de la lista de desórdenes mentales y aceptarla oficialmente como una variación natural de la sexualidad humana.	2019-05-17	-	f
22	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de la Mujer por la Paz y el Desarme: las mujeres se opusieron a la OTAN y sus bases militares en suelo europeo. 	Día Internacional de la Mujer por la Paz y el Desarme: las mujeres se opusieron a la OTAN y sus bases militares en suelo europeo. 	2019-05-24	-	f
23	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de Acción por la Salud de las Mujeres: primera Campaña para la Prevención de la Mortalidad y Morbilidad Maternas fue vital para impulsar a los gobiernos y organismos internacionales a prestar mayor atención a las diversas causas de enfermedades y muertes relacionadas con el embarazo y el parto, incluyendo las complicaciones del aborto clandestino. 	Día Internacional de Acción por la Salud de las Mujeres: primera Campaña para la Prevención de la Mortalidad y Morbilidad Maternas fue vital para impulsar a los gobiernos y organismos internacionales a prestar mayor atención a las diversas causas de enfermedades y muertes relacionadas con el embarazo y el parto, incluyendo las complicaciones del aborto clandestino. 	2019-05-28	-	f
24	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace Alfonsina Storni, poeta, autora teatral, educadora (1892).3º Semana: Mundial por un Parto Respetado	Nace Alfonsina Storni, poeta, autora teatral, educadora (1892).3º Semana: Mundial por un Parto Respetado	2019-05-29	-	f
25	2019-02-28 08:18:07	2019-02-28 08:18:07	Por Ley 23.515 se sancionó el divorcio vincular. Impulsado por la Multisectorial de la Mujer y la colaboración de diversas organizaciones de mujeres se obtiene la reforma del Código Civil (1987).	Por Ley 23.515 se sancionó el divorcio vincular. Impulsado por la Multisectorial de la Mujer y la colaboración de diversas organizaciones de mujeres se obtiene la reforma del Código Civil (1987).	2019-06-03	-	f
26	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional por la Educación no sexista	Día Internacional por la Educación no sexista	2019-06-21	-	f
27	2019-02-28 08:18:07	2019-02-28 08:18:07	En Buenos Aires nace Juana Manso, primera voz a favor de las mujeres del siglo XIX. Educadora, periodista, escritora (1819).	En Buenos Aires nace Juana Manso, primera voz a favor de las mujeres del siglo XIX. Educadora, periodista, escritora (1819).	2019-06-26	-	f
28	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional del Orgullo LGBT, también conocido como Día del Orgullo Gay o simplemente Orgullo Gay, es una serie de actos que cada año los colectivos LGBT celebran de forma pública para instar por la tolerancia y la igualdad de los gais, lesbianas, bisexuales y transexuales.	Día Internacional del Orgullo LGBT, también conocido como Día del Orgullo Gay o simplemente Orgullo Gay, es una serie de actos que cada año los colectivos LGBT celebran de forma pública para instar por la tolerancia y la igualdad de los gais, lesbianas, bisexuales y transexuales.	2019-06-28	-	f
29	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace en México Frida Kahlo, pintora (1907).	Nace en México Frida Kahlo, pintora (1907).	2019-07-06	-	f
30	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace Juana Azurduy, heroína de las guerras de la Independencia en el Alto Perú y jefa de una tropa de amazonas (1780).	Nace Juana Azurduy, heroína de las guerras de la Independencia en el Alto Perú y jefa de una tropa de amazonas (1780).	2019-07-12	-	f
31	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace en Salta Juana Manuela Gorriti, escritora y periodista (1816).	Nace en Salta Juana Manuela Gorriti, escritora y periodista (1816).	2019-07-15	-	f
32	2019-02-28 08:18:07	2019-02-28 08:18:07	Fecha en que se conmemora la aprobación del matrimonio igualitario: reivindica la lucha del colectivo LGBT contra la discriminación por orientación sexual e identidad de género.	Fecha en que se conmemora la aprobación del matrimonio igualitario: reivindica la lucha del colectivo LGBT contra la discriminación por orientación sexual e identidad de género.	2019-07-15	-	f
33	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional del Amigo/a.	Día Internacional del Amigo/a.	2019-07-20	-	f
34	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional del Trabajo Doméstico.	Día Internacional del Trabajo Doméstico.	2019-07-23	-	f
35	2019-02-28 08:18:07	2019-02-28 08:18:07	Muere Eva Perón (1952).	Muere Eva Perón (1952).	2019-07-26	-	f
36	2019-02-28 08:18:07	2019-02-28 08:18:07	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	2019-08-01	-	f
37	2019-02-28 08:18:07	2019-02-28 08:18:07	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	2019-08-02	-	f
38	2019-02-28 08:18:07	2019-02-28 08:18:07	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	2019-08-03	-	f
39	2019-02-28 08:18:07	2019-02-28 08:18:07	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	2019-08-04	-	f
40	2019-02-28 08:18:07	2019-02-28 08:18:07	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	2019-08-05	-	f
41	2019-02-28 08:18:07	2019-02-28 08:18:07	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	2019-08-06	-	f
42	2019-02-28 08:18:07	2019-02-28 08:18:07	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	Semana Mundial de la Lactancia Materna: Semana dirigida a promover, fomentar y divulgar la lactancia materna, o natural, y a mejorar la salud de los bebés de todo el mundo.	2019-08-07	-	f
43	2019-02-28 08:18:07	2019-02-28 08:18:07	Creación del Consejo Nacional de la Mujer (1992).	Creación del Consejo Nacional de la Mujer (1992).	2019-08-07	-	f
44	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Mundial de la Salud Sexual.	Día Mundial de la Salud Sexual.	2019-09-04	-	f
45	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Mundial del Sexo Oral: la igualdad del goce entre las personas.	Día Mundial del Sexo Oral: la igualdad del goce entre las personas.	2019-09-06	-	f
46	2019-02-28 08:18:07	2019-02-28 08:18:07	Ley 11.357 de Equiparación de Derechos Civiles de la Mujer (1926).	Ley 11.357 de Equiparación de Derechos Civiles de la Mujer (1926).	2019-09-14	-	f
47	2019-02-28 08:18:07	2019-02-28 08:18:07	Día de la Imagen de la Mujer en los medios.	Día de la Imagen de la Mujer en los medios.	2019-09-14	-	f
48	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de la Paz	Día Internacional de la Paz	2019-09-21	-	f
49	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Nacional de los Derechos Políticos de la Mujer: en septiembre de 1947 el Congreso Argentino aprueba la Ley 13.010, que instituye el voto femenino. 	Día Nacional de los Derechos Políticos de la Mujer: en septiembre de 1947 el Congreso Argentino aprueba la Ley 13.010, que instituye el voto femenino. 	2019-09-23	-	f
50	2019-02-28 08:18:07	2019-02-28 08:18:07	Se aprobó la Ley 23.592 que tipifica y sanciona todo acto discriminatorio (1988).	Se aprobó la Ley 23.592 que tipifica y sanciona todo acto discriminatorio (1988).	2019-09-23	-	f
51	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional contra la Explotación Sexual,  y la trata de mujeres, niños y niñas: Se conmemora a nivel mundial la primera ley aprobada en el mundo contra la trata de personas. Fue la ley argentina número 9.143, promulgada el 23 de septiembre de 1913, conocida como “Ley Palacios”. 	Día Internacional contra la Explotación Sexual,  y la trata de mujeres, niños y niñas: Se conmemora a nivel mundial la primera ley aprobada en el mundo contra la trata de personas. Fue la ley argentina número 9.143, promulgada el 23 de septiembre de 1913, conocida como “Ley Palacios”. 	2019-09-23	-	f
52	2019-02-28 08:18:07	2019-02-28 08:18:07	Día internacional de la visibilidad sexual. 	Día internacional de la visibilidad sexual.	2019-09-23	-	f
53	2019-02-28 08:18:07	2019-02-28 08:18:07	Aprobación de la Ley 23.264 de patria potestad compartida. Triunfo a medias, pues se pedía la patria potestad indistinta (1985).	Aprobación de la Ley 23.264 de patria potestad compartida. Triunfo a medias, pues se pedía la patria potestad indistinta (1985).	2019-09-24	-	f
54	2019-02-28 08:18:07	2019-02-28 08:18:07	Creación del primer Consejo de Mujeres de la Argentina, por A.VanPraet.	Creación del primer Consejo de Mujeres de la Argentina, por A.VanPraet.	2019-09-25	-	f
55	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de los Derechos de niño, niña y adolescente.	Día Internacional de los Derechos de niño, niña y adolescente.	2019-09-27	-	f
56	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de la Salud Mental	Día Internacional de la Salud Mental	2019-10-10	-	f
57	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de la Mujer Rural. Este día se denuncia con diferentes acciones en todo el mundo la dureza en la que viven muchas mujeres en el mundo rural, especialmente en los países del segundo y tercer mundo.	Día Internacional de la Mujer Rural. Este día se denuncia con diferentes acciones en todo el mundo la dureza en la que viven muchas mujeres en el mundo rural, especialmente en los países del segundo y tercer mundo.	2019-10-15	-	f
58	2019-02-28 08:18:07	2019-02-28 08:18:07	Nace Mariquita Sánchez de Thompson, colaboradora de innumerables empresas patrióticas y libertarias del país (1786).	Nace Mariquita Sánchez de Thompson, colaboradora de innumerables empresas patrióticas y libertarias del país (1786).	2019-11-01	-	f
59	2019-02-28 08:18:07	2019-02-28 08:18:07	Por Ley 24.012, las mujeres obtienen la posibilidad de ocupar el 30% de los cargos electivos y figurar en los lugares expectables (1991).	Por Ley 24.012, las mujeres obtienen la posibilidad de ocupar el 30% de los cargos electivos y figurar en los lugares expectables (1991).	2019-11-06	-	f
60	2019-02-28 08:18:07	2019-02-28 08:18:07	Primera elección en que votan las mujeres a nivel nacional, gracias a la Ley 13.010 (Ley Evita) aprobada en 1947, que otorga plenitud de derechos políticos a las mujeres (1951).	Primera elección en que votan las mujeres a nivel nacional, gracias a la Ley 13.010 (Ley Evita) aprobada en 1947, que otorga plenitud de derechos políticos a las mujeres (1951).	2019-11-11	-	f
61	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Mundial de la prevención del Abuso Sexual Infantil	Día Mundial de la prevención del Abuso Sexual Infantil	2019-11-19	-	f
62	2019-02-28 08:18:07	2019-02-28 08:18:07	La Asamblea de la ONU aprueba la Convención sobre los Derechos del Niñx (1989).	La Asamblea de la ONU aprueba la Convención sobre los Derechos del Niñx (1989).	2019-11-20	-	f
63	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de Lucha contra la Violencia hacia la Mujer: Instaurado a partir del martirio de las hermanas Mirabal, de Santo Domingo, muertas por la dictadura de Trujillo. La Asamblea General de las Naciones Unidas designó el 25 de noviembre como Día Internacional de Lucha contra la Violencia hacia las Mujeres a partir de una petición de la República Dominicana, que contó con el apoyo de más de sesenta gobiernos. 	Día Internacional de Lucha contra la Violencia hacia la Mujer: Instaurado a partir del martirio de las hermanas Mirabal, de Santo Domingo, muertas por la dictadura de Trujillo. La Asamblea General de las Naciones Unidas designó el 25 de noviembre como Día Internacional de Lucha contra la Violencia hacia las Mujeres a partir de una petición de la República Dominicana, que contó con el apoyo de más de sesenta gobiernos. 	2019-11-25	-	f
64	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Internacional de la Lucha Contra el SIDA.	Día Internacional de la Lucha Contra el SIDA.	2019-12-01	-	f
65	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Nacional de la personas con discapacidad	Día Nacional de la personas con discapacidad	2019-12-03	-	f
66	2019-02-28 08:18:07	2019-02-28 08:18:07	Día Universal de los Derechos Humanos.	Día Universal de los Derechos Humanos.	2019-12-10	-	f
\.


--
-- Data for Name: oauth_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.oauth_access_tokens (id, user_id, client_id, name, scopes, revoked, created_at, updated_at, expires_at) FROM stdin;
d565e2daae59139d5c19f6c6108b84d700e69f84e4f24b00f1f40a9c091e482c5e8ba03a135f0498	1	1	MyApp	[]	f	2019-01-17 23:11:52	2019-01-17 23:11:52	2020-01-17 23:11:52
bcfa5bd7e481a93d6c5bd4b2dfc49ddec53e24ae3f815001748ded0926a9fb9d785d3ea088a25a86	2	1	MyApp	[]	f	2019-01-17 23:16:14	2019-01-17 23:16:14	2020-01-17 23:16:14
83d7796c1b95305a7fe4701cb717ca16729494932eed8e6e9d28bd8391cdb9458074a835d9f7e689	3	1	MyApp	[]	f	2019-01-17 23:20:43	2019-01-17 23:20:43	2020-01-17 23:20:43
9cb9c765cf933a0cb518a9d9c3ed56ca6f606c48dbd2ebd01dbfe78fbdaa4e878643d54106acf359	4	1	MyApp	[]	f	2019-02-20 22:43:30	2019-02-20 22:43:30	2020-02-20 22:43:30
6baa645cf5adbf2a7c8794ee544270e002e87cad785a1d17ad324c4145c55f2d613b3d7f35c1874b	9	1	MyApp	[]	f	2019-02-19 02:03:26	2019-02-19 02:03:26	2020-02-19 02:03:26
d2e58800e1983a12cd1c992fc07fb0178413da210a9e0977348b1c866896e7c6af3eed169e75171f	9	1	MyApp	[]	f	2019-02-19 02:04:15	2019-02-19 02:04:15	2020-02-19 02:04:15
ee18de6e4b1b4ce19c3d3a0215bfe32abdcf78c0d13674c58d9afe66ffb0157826882f929180f382	13	1	MyApp	[]	f	2019-02-19 02:06:57	2019-02-19 02:06:57	2020-02-19 02:06:57
\.


--
-- Data for Name: oauth_auth_codes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.oauth_auth_codes (id, user_id, client_id, scopes, revoked, expires_at) FROM stdin;
\.


--
-- Data for Name: oauth_clients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.oauth_clients (id, user_id, name, secret, redirect, personal_access_client, password_client, revoked, created_at, updated_at) FROM stdin;
1	\N	Laravel Personal Access Client	H8tycPKRfAY9G6X7NGqYGus9cVMIQvcVhyDGcNae	http://localhost	t	f	f	2019-01-16 21:19:51	2019-01-16 21:19:51
2	\N	Laravel Password Grant Client	j9VzqWJTLPRpYU3GFCa7gDwGcRjzzUs5pxTEfQAO	http://localhost	f	t	f	2019-01-16 21:19:51	2019-01-16 21:19:51
\.


--
-- Data for Name: oauth_personal_access_clients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.oauth_personal_access_clients (id, client_id, created_at, updated_at) FROM stdin;
1	1	2019-01-16 21:19:51	2019-01-16 21:19:51
\.


--
-- Data for Name: oauth_refresh_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.oauth_refresh_tokens (id, access_token_id, revoked, expires_at) FROM stdin;
\.


--
-- Data for Name: opinions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.opinions (id, created_at, updated_at, name, comments, average, user_id, centro_ayuda_id) FROM stdin;
2	2019-01-22 23:43:05	2019-01-23 00:00:37	Area Mujer y Diversidad Sexual	pesima atencion	1	4	4
1	2019-01-22 23:40:19	2019-02-18 22:26:18	Area mujer y diversidad sexual	excelente	1	4	1
4	2019-02-18 22:42:54	2019-02-18 22:45:50	Area mujer y diversidad sexual	excelente	3.5	4	85
3	2019-02-18 22:32:07	2019-02-18 22:45:50	Area mujer y diversidad sexual	excelente	3.5	4	85
5	2019-02-18 22:47:23	2019-02-19 22:58:34	Area mujer y diversidad sexual	excelente	5	4	53
7	2019-02-19 23:10:04	2019-02-19 23:10:04	Centro De Salud	mas o menos	5	4	53
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: preguntas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.preguntas (id, created_at, updated_at, description, cuestionario_id) FROM stdin;
2	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Sentís que tu pareja o compañere te miente o quiere convencerte de cosas que no son?	1
3	2019-01-11 08:37:20	2019-01-11 08:37:20	¿En alguna oportunidad sentiste que tu pareja o compañere te hizo “bromas” que te lastimaron, te dolieron internamente, y que aún diciéndole que no lo haga más lo sigue haciendo?	1
4	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tu pareja o compañere ha manifestado molestia si haces actividades de manera independiente como trabajar, visitar amigos, ir al gimnasio?	1
5	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Te sentís que sos una torpe, inútil, cuando estás con tu pareja o compañere?	1
6	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tu pareja o compañere te acompaña a comprar ropa y cuando elegís lo que te querés poner te dice que eso no es para vos, que querés provocar a otres?	1
7	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Cuando salen juntos tu pareja o compañere juzga la forma en que te vestís, y esto te incomoda tanto que te cambias para no tener problemas?	1
8	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tú pareja o compañere manifiesta celos de tu familia/amigues/hijes?	1
9	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Has sentido que sos la culpable de provocar el enojo en tu pareja o compañere?	1
10	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Sentís que están en permanentemente tensión con tu pareja o compañere y que hagas lo que hagas, se irrita o te culpabiliza de sus cambios de humor?	1
11	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tu pareja o compañere menosprecia tu opinión o no reconoce tus esfuerzos y dedicaciones?	1
12	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Has sentido que tu pareja o compañere te ridiculiza en público o privado?	1
13	2019-01-11 08:37:20	2019-01-11 08:37:20	¿En alguna oportunidad te has sentido con miedo frente a la presencia de tu pareja o compañere o ante cosas que te dijo?	1
14	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tu pareja compañere controla tu dinero o con quien sale o a dónde vas o con quién hablas?	1
15	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tu pareja o compañere te dice en qué gastar el dinero y en qué no?	1
16	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tu pareja o compañere tiene la contraseña de tu red social, aún vos no queriendo dársela?	1
17	2019-01-11 08:37:20	2019-01-11 08:37:20	¿En alguna discusión, tu pareja o compañere ha roto cosas que para vos eran importantes aunque no tuvieran valor económico?	1
18	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tu pareja o compañere te ha amenazado con lastimarte/lastimarse si planteas terminar la relación?	1
19	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Alguna vez te pasó que tuviste que tener relaciones sexuales aún no queriendo o hacer una determinada práctica que vos no querías/no te gustaba?	1
20	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Tu pareja o compañere te impide uses un método anticonceptivo?	1
21	2019-01-11 08:37:20	2019-01-11 08:37:20	¿Durante las discusiones tu pareja o compañere te arrojó algún objeto pudiéndote lastimar o habiéndolo hecho?	1
22	2019-01-11 08:37:22	2019-01-11 08:37:22	¿Tu pareja o compañere te ha golpeado, lastimado, empujado?	1
1	2019-01-11 08:34:50	2019-01-11 08:34:50	¿Sentís que tu pareja o compañere por momentos te ignora o no registra lo que sentís o pensas?	1
\.


--
-- Data for Name: respuestas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.respuestas (id, created_at, updated_at, user_id, cuestionario_id, date_at, semaforo_activo, c_amarillas, c_naranjas, c_rojas) FROM stdin;
\.


--
-- Data for Name: rols; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rols (id, created_at, updated_at, description, cod_rol) FROM stdin;
1	2019-01-10 19:56:49	2019-01-10 19:56:49	administrador	1
2	2019-01-10 19:57:04	2019-01-10 19:57:04	voluntario	2
3	2019-01-10 19:57:15	2019-01-10 19:57:15	colaborador	3
4	2019-01-10 19:57:22	2019-01-10 19:57:22	ayuda	4
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, password, remember_token, created_at, updated_at, nickname, neighborhood, addresss, phone, cellphone, rol_id) FROM stdin;
9	santiago calamari	santi.calamari2@gmail.com	$2y$10$Zb/nKTAE8h9/CeIdCp/NnOjL1wsEkGXQYMsP1rpqOuzb89.gwyQm6	\N	2019-02-19 02:03:26	2019-02-19 02:03:26	scalamari2	\N	\N	\N	\N	\N
13	santiago calamari3	santi.calamari3@gmail.com	$2y$10$ZDOwMinYsXuVDmbf/Yk.weCFqKK3hT4jSx.wELwYBZSlxlG9vCaU6	\N	2019-02-19 02:06:57	2019-02-19 02:06:57	scalamari3	\N	\N	\N	\N	\N
4	Santiago Calamari	santi.calamari@gmail.com	$2y$10$mbF5wb6XVKfY.roBfEPzkugOEM37G6Xnq5T0T0dCnPkQuN.74UNCK	\N	2019-01-17 23:26:26	2019-02-20 22:43:30	scalamari	barranquitas	\N	155135137	\N	1
\.


--
-- Name: centro_ayudas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.centro_ayudas_id_seq', 1, false);


--
-- Name: cuestionarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cuestionarios_id_seq', 1, false);


--
-- Name: digitecas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.digitecas_id_seq', 3, true);


--
-- Name: favoritos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.favoritos_id_seq', 17, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 20, true);


--
-- Name: noticias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.noticias_id_seq', 8, true);


--
-- Name: novedads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.novedads_id_seq', 1, false);


--
-- Name: oauth_clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.oauth_clients_id_seq', 2, true);


--
-- Name: oauth_personal_access_clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.oauth_personal_access_clients_id_seq', 1, true);


--
-- Name: opinions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.opinions_id_seq', 7, true);


--
-- Name: preguntas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.preguntas_id_seq', 1, false);


--
-- Name: respuestas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.respuestas_id_seq', 1, false);


--
-- Name: rols_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rols_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 13, true);


--
-- Name: centro_ayudas centro_ayudas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.centro_ayudas
    ADD CONSTRAINT centro_ayudas_pkey PRIMARY KEY (id);


--
-- Name: cuestionarios cuestionarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuestionarios
    ADD CONSTRAINT cuestionarios_pkey PRIMARY KEY (id);


--
-- Name: digitecas digitecas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.digitecas
    ADD CONSTRAINT digitecas_pkey PRIMARY KEY (id);


--
-- Name: favoritos favoritos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.favoritos
    ADD CONSTRAINT favoritos_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: noticias noticias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticias
    ADD CONSTRAINT noticias_pkey PRIMARY KEY (id);


--
-- Name: novedads novedads_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.novedads
    ADD CONSTRAINT novedads_pkey PRIMARY KEY (id);


--
-- Name: oauth_access_tokens oauth_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oauth_access_tokens
    ADD CONSTRAINT oauth_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: oauth_auth_codes oauth_auth_codes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oauth_auth_codes
    ADD CONSTRAINT oauth_auth_codes_pkey PRIMARY KEY (id);


--
-- Name: oauth_clients oauth_clients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oauth_clients
    ADD CONSTRAINT oauth_clients_pkey PRIMARY KEY (id);


--
-- Name: oauth_personal_access_clients oauth_personal_access_clients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oauth_personal_access_clients
    ADD CONSTRAINT oauth_personal_access_clients_pkey PRIMARY KEY (id);


--
-- Name: oauth_refresh_tokens oauth_refresh_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oauth_refresh_tokens
    ADD CONSTRAINT oauth_refresh_tokens_pkey PRIMARY KEY (id);


--
-- Name: opinions opinions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.opinions
    ADD CONSTRAINT opinions_pkey PRIMARY KEY (id);


--
-- Name: preguntas preguntas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.preguntas
    ADD CONSTRAINT preguntas_pkey PRIMARY KEY (id);


--
-- Name: respuestas respuestas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.respuestas
    ADD CONSTRAINT respuestas_pkey PRIMARY KEY (id);


--
-- Name: rols rols_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rols
    ADD CONSTRAINT rols_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: oauth_access_tokens_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX oauth_access_tokens_user_id_index ON public.oauth_access_tokens USING btree (user_id);


--
-- Name: oauth_clients_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX oauth_clients_user_id_index ON public.oauth_clients USING btree (user_id);


--
-- Name: oauth_personal_access_clients_client_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX oauth_personal_access_clients_client_id_index ON public.oauth_personal_access_clients USING btree (client_id);


--
-- Name: oauth_refresh_tokens_access_token_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX oauth_refresh_tokens_access_token_id_index ON public.oauth_refresh_tokens USING btree (access_token_id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: favoritos favoritos_centro_ayuda_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.favoritos
    ADD CONSTRAINT favoritos_centro_ayuda_id_foreign FOREIGN KEY (centro_ayuda_id) REFERENCES public.centro_ayudas(id);


--
-- Name: favoritos favoritos_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.favoritos
    ADD CONSTRAINT favoritos_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: opinions opinions_centro_ayuda_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.opinions
    ADD CONSTRAINT opinions_centro_ayuda_id_foreign FOREIGN KEY (centro_ayuda_id) REFERENCES public.centro_ayudas(id);


--
-- Name: opinions opinions_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.opinions
    ADD CONSTRAINT opinions_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: preguntas preguntas_cuestionario_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.preguntas
    ADD CONSTRAINT preguntas_cuestionario_id_foreign FOREIGN KEY (cuestionario_id) REFERENCES public.cuestionarios(id);


--
-- Name: respuestas respuestas_cuestionario_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.respuestas
    ADD CONSTRAINT respuestas_cuestionario_id_foreign FOREIGN KEY (cuestionario_id) REFERENCES public.cuestionarios(id);


--
-- Name: respuestas respuestas_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.respuestas
    ADD CONSTRAINT respuestas_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: users users_rol_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_rol_id_foreign FOREIGN KEY (rol_id) REFERENCES public.rols(id);


--
-- PostgreSQL database dump complete
--

