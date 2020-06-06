--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5
-- Dumped by pg_dump version 11.5

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

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: airplane; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.airplane (
    id integer NOT NULL,
    type character varying(5) NOT NULL,
    airline character varying(20) NOT NULL
);


ALTER TABLE public.airplane OWNER TO postgres;

--
-- Name: airport; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.airport (
    code character varying(10) NOT NULL,
    name character varying(100) NOT NULL
);


ALTER TABLE public.airport OWNER TO postgres;

--
-- Name: book; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.book (
    id integer NOT NULL,
    "time" character varying(30) NOT NULL,
    date character varying(30) NOT NULL,
    fnum integer NOT NULL,
    username character varying(20) NOT NULL,
    classtype character(20) NOT NULL,
    paid boolean
);


ALTER TABLE public.book OWNER TO postgres;

--
-- Name: book_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.book_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.book_id_seq OWNER TO postgres;

--
-- Name: book_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.book_id_seq OWNED BY public.book.id;


--
-- Name: flights; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.flights (
    air_id integer NOT NULL,
    source character varying NOT NULL,
    destination character varying NOT NULL,
    d_time character varying NOT NULL,
    a_time character varying NOT NULL,
    fnum integer NOT NULL
);


ALTER TABLE public.flights OWNER TO postgres;

--
-- Name: flights_number_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.flights_number_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.flights_number_seq OWNER TO postgres;

--
-- Name: flights_number_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.flights_number_seq OWNED BY public.flights.fnum;


--
-- Name: passenger; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.passenger (
    username character varying(20) NOT NULL,
    fname character(30) NOT NULL,
    lname character(30) NOT NULL,
    email character varying(30),
    mobile numeric(10,0),
    gender character(10) NOT NULL,
    dob character varying(30) NOT NULL
);


ALTER TABLE public.passenger OWNER TO postgres;

--
-- Name: price; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.price (
    fnum integer NOT NULL,
    name character(15) NOT NULL,
    capacity integer NOT NULL,
    cost numeric(10,0) NOT NULL
);


ALTER TABLE public.price OWNER TO postgres;

--
-- Name: register; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.register (
    username character varying(50) NOT NULL,
    password character varying(15) NOT NULL
);


ALTER TABLE public.register OWNER TO postgres;

--
-- Name: book id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.book ALTER COLUMN id SET DEFAULT nextval('public.book_id_seq'::regclass);


--
-- Name: flights fnum; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.flights ALTER COLUMN fnum SET DEFAULT nextval('public.flights_number_seq'::regclass);


--
-- Data for Name: airplane; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.airplane VALUES (1100, 'A320', 'Air India');
INSERT INTO public.airplane VALUES (1101, 'A321', 'Air India');
INSERT INTO public.airplane VALUES (1102, 'A321', 'IndiGO');
INSERT INTO public.airplane VALUES (1103, 'ATR72', 'IndiGO');
INSERT INTO public.airplane VALUES (1104, 'B737', 'Spice Jet');
INSERT INTO public.airplane VALUES (1105, 'BQ400', 'Spice Jet');


--
-- Data for Name: airport; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.airport VALUES ('BLR', 'Bangalore Bengaluru International Airport');
INSERT INTO public.airport VALUES ('HYD', 'Hyderabad Rajiv Gandhi International Airport');
INSERT INTO public.airport VALUES ('MAA', 'Chennai Meenambarkkam International Airport');
INSERT INTO public.airport VALUES ('CCU', 'Kolkata Netaji Subhash Chandra Bose');
INSERT INTO public.airport VALUES ('DEL', 'New Delhi Indira Gandhi International Airport');
INSERT INTO public.airport VALUES ('AMD', 'Ahmedabad SD Vallabhbhai Patel International Airport');
INSERT INTO public.airport VALUES ('GOI', 'Dabolim Goa International Airport');
INSERT INTO public.airport VALUES ('COK', 'Cochin Airport, Kerala Cochin International Airport');
INSERT INTO public.airport VALUES ('BOM', 'Mumbai Chattrapathi Shivaji International Airport');


--
-- Data for Name: book; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: flights; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.flights VALUES (1102, 'MAA', 'GOI', '01:00', '12:02', 20);
INSERT INTO public.flights VALUES (1100, 'BLR', 'BOM', '01:01', '15:02', 22);
INSERT INTO public.flights VALUES (1100, 'BLR', 'BOM', '01:01', '15:02', 23);
INSERT INTO public.flights VALUES (1100, 'BLR', 'CCU', '00:01', '03:01', 24);
INSERT INTO public.flights VALUES (1103, 'BOM', 'BLR', '12:01', '14:01', 25);


--
-- Data for Name: passenger; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: price; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.price VALUES (20, 'Economy        ', 200, 1500);
INSERT INTO public.price VALUES (20, 'Business       ', 25, 4000);
INSERT INTO public.price VALUES (24, 'Economy        ', 200, 1500);
INSERT INTO public.price VALUES (24, 'Business       ', 50, 2500);
INSERT INTO public.price VALUES (25, 'Economy        ', 200, 1500);
INSERT INTO public.price VALUES (25, 'Business       ', 25, 2500);


--
-- Data for Name: register; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.register VALUES ('ADMIN', 'hawaiadda@srs');
INSERT INTO public.register VALUES ('shoaib.shaikh@somaiya.edu', '123');


--
-- Name: book_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.book_id_seq', 1, false);


--
-- Name: flights_number_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.flights_number_seq', 25, true);


--
-- Name: airplane airplane_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.airplane
    ADD CONSTRAINT airplane_pkey PRIMARY KEY (id);


--
-- Name: airport airport_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.airport
    ADD CONSTRAINT airport_pkey PRIMARY KEY (code);


--
-- Name: book book_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.book
    ADD CONSTRAINT book_pkey PRIMARY KEY (id);


--
-- Name: flights flights_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.flights
    ADD CONSTRAINT flights_pkey PRIMARY KEY (fnum);


--
-- Name: passenger passenger_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.passenger
    ADD CONSTRAINT passenger_pkey PRIMARY KEY (username);


--
-- Name: register register_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.register
    ADD CONSTRAINT register_pkey PRIMARY KEY (username);


--
-- Name: passenger fk1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.passenger
    ADD CONSTRAINT fk1 FOREIGN KEY (username) REFERENCES public.register(username);


--
-- Name: flights fk2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.flights
    ADD CONSTRAINT fk2 FOREIGN KEY (air_id) REFERENCES public.airplane(id);


--
-- Name: price fk3; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.price
    ADD CONSTRAINT fk3 FOREIGN KEY (fnum) REFERENCES public.flights(fnum) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

